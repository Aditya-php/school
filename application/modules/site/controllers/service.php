<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *  Service Controller
 *
 * @package		Service
 * @category    Service 
 * @author		 
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc
 * @since		Version 1.0
 */

class Service extends CI_Controller {

    private $data = array();

    /**
     * Constructor
     * This function to retrive college instance from url and get instance ID and store in session
     * 
     * @access	public
     * @return	
     */
    function __construct() 
    {
        parent::__construct();
        $this->load->model('Service_mod');
		$this->load->library("pagination");
        //is_protected();        
    }

    /**
     * index
     *
     * This function dispaly all events
     * 
     * @access	public
     * @return	html data
     */
    public function index($state_id= NULL ,$city_id= NULL,$string= NULL,$page_no = NULL) 
    {   
        
         $state_id1 = ID_decode($state_id);    
	   
	   if(!empty($string))
		{
			$string1= trim($string);
		}
		else
		{
			$string1= 0;
		}
		
		if($page_no){
            	$page   =   $page_no ;
         }else{
           	 	$page   =   1;
         }
    	 $page_size						 =	 5;
         $data['page_size']  			 =	 $_POST['page_size']	=	$page_size;
         $data['page_no']    			 =	 $_POST['page_no']		=	$page;
         if($state_id!='' && $city_id!='') 
		 {
			
		  $result = $this->Service_mod->fetch_service_list($state_id1,$city_id,$string);
		 }
    	 @$result						 =   json_decode($result);
    	 
    	 $config						 =   array();        
         $config["base_url"]	 =  base_url().'site/service/index/'.$state_id.'/'.$city_id.'/'.$string1;
		 $config["per_page"]			 =   $page_size;
         $config['use_page_numbers']     =   TRUE;        
         $config['first_tag_open']       =   $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li aria-controls="sample_2" class="paginate_button ">';
         $config['first_tag_close']      =   $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';        
         $config['cur_tag_open']         =   '<li aria-controls="sample_2" class="paginate_button active"><a><b>';
         $config['cur_tag_close']        =   "</b></a></li>";
         $config['first_link']           =   '<i class="fa fa-angle-double-left"></i>';
         $config['last_link']            =   '<i class="fa fa-angle-double-right"></i>';
         $config['next_link']            =   '<i class="fa fa-angle-right"></i>';
         $config['prev_link']            =   '<i class="fa fa-angle-left"></i>';
        	
         $config['num_links']	=   2;
         $config['uri_segment']	=   7;
         $config["total_rows"]  =	$data['total_data']  	 	=   @$result->total_data;
         $this->pagination->initialize($config);
         $data["links"]      		=   $this->pagination->create_links();
         $data['result']         =   @$result->status == 'success' ? @$result->result : '';
		//pr($data); die;
		$data['title']		= 	"My Services";
		$data['breadcum']	=	array('"'.base_url().'"' => "Home",""=>"Services");
		$data['page']       = 	'service/list_service';
        $this->load->view('landing_layout', $data); 
	}
    /*End of Function*/    
    
	
	//my services 
	public function my_services() 
    {  
            is_protected();
        if($this->session->userdata('isLogin') == 'yes')
		{
			$sp_id 	= 	currentuserinfo()->id;
			$result['array'] =  '';
			$data['result'] =  $this->Service_mod->listing($sp_id);
			if(!empty($data['result']))
			{
			  $data['button_title']	        =  "Edit";
			}
		}
		$data['title']		= 	"My Services";
		$data['breadcum']	=	array('"'.base_url().'"' => "Home",""=>"My Services");
		$data['page']       = 	'service/my_service';
        $this->load->view('landing_layout', $data); 
	}
	//end 
	
	/**
     *fetch_cities
     *
     * This function dispaly city for service add
     * 
     * @access	public
     * @return	html data
     */
    public function fetch_cities() 
    {   
        $cities =   $this->Service_mod->fetch_city();
        $str    =   "<option value=''>Choose City</option>";
        foreach($cities as $c_key   =>  $c_val)
        {
            $str    .=  '<option value="'.$c_val->ID.'">'.$c_val->Name.'</option>';
        }
        $data['status']     =   "success";
        $data['citydata']   =   $str;
        echo json_encode($data);
    }
    /*End of Function*/ 
	
	
    /**
     *add
     *
     * This function to add events
     * 
     * @access	public
     * @return	html data
     */
     public function add() 
    {   
         is_protected();
       if($this->session->userdata('isLogin') == 'yes')
	  { 
		if (isPostBack())
        {
        	/// ----- for image------//	
			$file_data=$this->upload_image1();
			$image = $file_data['upload_data']['file_name'];
			
			/// ----- for video------//	
			$file_data1=$this->upload_video();
			$video = $file_data1['upload_data']['file_name'];	
			
			
            $user_id 	= 	currentuserinfo()->id;
            $_POST['service_provider_id']	=	$user_id;
            $result = $this->Service_mod->add($image,$video);
            $result	=	json_decode($result);
            if($result->status == "success")
            {
				 set_flashdata("success","Service added successfully");
				 redirect(base_url().'site/service/my_services');
			}
			else if($result->status == "error")
			{
				 $data['error_msg']	= $result->error_msg;
				 
			}
        }
	  }
		
        $data['title']		= 	"New Service";
		$data['breadcum']	=	array("site/service" => "Service",""=>"Add Service");
		$data['page']       = 	'service/add';
        $this->load->view('landing_layout', $data);
    }
	
	 function upload_image1()
	{
		
        if(!empty($_FILES['service_image']['name']) )
		{   
       // print_r($_FILES); die;
	            $new_name = time().$_FILES["service_image"]['name'];
	   
				$config = array(
				'upload_path'   => "./assets/service_image/",
				'allowed_types' => "jpg|jpeg|png|tif|gif|JPG|JPEG|png|PNG",
				'file_name'     => $new_name,
				'remove_spaces' => TRUE
				); 

				$this->load->library('upload');
                $this->upload->initialize($config); 
                $this->upload->do_upload('service_image');
            
                  if(!$this->upload->data())
					{
				        $error_msg = '';
						$this->upload->display_errors('<p>','</p>');
						$errors = $this->upload->display_errors();
						 // echo $errors;
						//die;
					    @$array = array('error_msg' => $this->upload->display_errors());
						//Here return the image error validation
											
					}
                  else
                   {
                    @$array = array('upload_data' => $this->upload->data());
                   }
        }
           
            return @$array;
    } 
	
	function upload_video()
	{
		//pr($_FILES); 
        if(!empty($_FILES['service_video']['name']) )
		{   
       // print_r($_FILES); die;
	            $new_name = time().$_FILES["service_video"]['name'];
	            $file_type = $_FILES['service_video']['type'];
				$config = array(
				'upload_path'   => "./assets/service_video/",
				'allowed_types' => "mp4",
				'file_name'     => $new_name,
				'remove_spaces' => TRUE
				); 

				$this->load->library('upload');
                $this->upload->initialize($config); 
				
                   if(!$this->upload->do_upload('service_video'))
					{
						//echo "1";
				        $error_msg = '';
						$this->upload->display_errors('<p>','</p>');
						$errors = $this->upload->display_errors();
					    // echo $errors;
						//die;
					   @$array = array('status'=>'error','error_msg' => $this->upload->display_errors());
						//Here return the image error validation
					}
                  else
                   {
					 @$array = array('status'=>'success','upload_data' => $this->upload->data());
					}
				
        }
           
            return @$array;
    }


	// function for editing the service
    public function edit($id = NULL) 
    { 
        is_protected();
		  if($this->session->userdata('isLogin') == 'yes')
		{
		  if (isPostBack())
			{
				
				$arr	=	$this->input->post(NULL,TRUE);
				///////*******start image**********\\\\\\\\\\\\\\
				if(@$_FILES['service_image']['name'] !=  '') 
        	   {
					$path	=	$_FILES['service_image']['name'];
					$ext	=	pathinfo($path, PATHINFO_EXTENSION);
					$name	=	md5(time());
					$file_name	= $name . "." . $ext;
					$thumb	= $name . "_thumb." . $ext;
					$_FILES['service_image']['name'] = $file_name;
				   
					$config['upload_path']      = "./assets/service_image/";
					$config['allowed_types']    = 'gif|jpg|png|GIF|JPG|PNG|JPEG|jpeg';
					//$config['max_size'] = '2000';
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('service_image')) 
					{
						set_flashdata("error_msg1",$this->upload->display_errors());
						redirect('site/service/edit/'.$id.'');
						die; 
					} else 
					{
						$config['image_library']    = 'gd2';
						$config['source_image']     = "./assets/service_image/$file_name";
						$config['create_thumb']     = true;

						$config['width']    		= 200;
						$config['height']   		= 200;
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						unlink($config['upload_path'] . $file_name);
					}
                }
				if(@$thumb   !=  '')
				{
				   $thumb  =   $thumb;
				}else
				{
					$thumb  =   '';
				}
				//////////**********end image *********\\\\\\\\\\\\\\\
				
				/// ----- for video------//	
				 $file_data1=$this->upload_video();
				 
				 if($file_data1['status'] == 'success')
				 {
				  $video = $file_data1['upload_data']['file_name']; 
				 }
				 else if($file_data1['status'] == 'error')
				 {
					set_flashdata("error_msg1",$file_data1['error_msg']);
					redirect('site/service/edit/'.$id.'');
					die; 
				 }
				
				
				$user_id 	= 	currentuserinfo()->id;
				$_POST['service_provider_id']	=	$user_id;
				$_POST['id']	=	ID_decode($id);
				@$result = $this->Service_mod->edit($thumb,$video);
				@$result	=	json_decode(@$result);
				if(@$result->status == "success")
				{
					 set_flashdata("success","Service updated successfully");
					 redirect(base_url().'site/service/my_services');
				}
				else if(@$result->status == "error")
				{
					 $data['error_msg']	= $result->error_msg;
					 
				}
			}
		}
		@$service_id = ID_decode($id);
		@$state_id = $_POST['state_id'];
		
		$data["service_result"] = array();
		$data['category']       = $this->Service_mod->get_category_list(@$service_id);
		$data['state_value']         = $this->Service_mod->get_state_list($service_id);
		$data['service_result'] = $this->Service_mod->get_service(@$service_id);
		$data['title']		= 	"Edit Service";
		$data['breadcum']	=	array("site/service" => "Service",""=>"Edit Service");
		$data['page']       = 	'service/add';
        $this->load->view('landing_layout', $data);
    }	
	
	/*End of Function*/
	
	/**
     *view
     *
     * This function to view service info
     * 
     * @access	public
     * @return	html data
     */
        
   
    
	public function view($id = NULL,$category_id = NULL) 
    {   
        $id						=	ID_decode($id);
        if($category_id!='')
        {
			    $category_id			=	ID_decode($category_id);
        		$data['category_id']	=	$category_id;
		}else{
				$data['category_id']	=	'';
		} 
    
        $result 				= 	$this->Service_mod->get_service_info($id);
        $result					=	json_decode($result);
        $data['result']			=	($result->status=="success")?$result->result:'';
		$rating                 =   $this->Service_mod->get_overall_rating($id);
		$data['rating']         =   json_decode($rating);
        $data['img_path']		= 	base_url()."assets/service_image/"; 
        $data['video_path']		= 	base_url()."assets/service_video/";   
        $data['title']			= 	"Directory || View Service";
		$data['breadcum']		=	 array('"'.base_url().'"' => "Home",'site/categories'=>'Categories',""=>"View Service");
		$data['page']       	= 	 'service/service_view';
        $this->load->view('landing_layout', $data);
    }
	
	
	/*End of Function*/
}
?>