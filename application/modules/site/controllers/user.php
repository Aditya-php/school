<?php if (!defined('BASEPATH'))
      exit('No direct script access allowed');
/**
 * User Controller
 *
 * @package				Site
 * @subpackage          User
 * @category            User 
 * @author				Arvind Soni
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_mod');
		$this->load->library("pagination");
		is_protected();   
    }
    
    /**
     * reset_password
     *
     * this function update user password
     * @access	public
     * @return array
     */ 
    public function reset_password()
    {
		if (isPostBack())
        {
        	$user_id 	= 	currentuserinfo()->id;
            $_POST['id']	=	$user_id;  
                    
       		$result     =   $this->User_mod->reset_password();
        	$result     =   json_decode($result);
            if ($result->status === 'success') {
                set_flashdata("success", "Your Password reset successfully");
                redirect(base_url() . "site/user/reset_password");
             } else if($result->status === 'error'){
            
                 set_flashdata("error",$result->error_msg);
                 redirect(base_url() . "site/user/reset_password");
            }	
        }
        
        $data['title']			= 	"Health Directory || Reset Password";
		$data['breadcum']		=	array('".base_url()."' => "Home",""=>"Reset Password");
		$page                   =	'user/reset_password_form';
		$data['page']           =	$page;
		$this->load->view('landing_layout', $data);	
		
    }
    /*End Function */
    /**
     * Index
     *
     * function show all list of Tutor
     * 
     * @access	public
     * @return	html data
     */ 
    public function profile() {
    	
    	if (isPostBack())
        {
        	
        	
        }
        $user_id 	= 	currentuserinfo()->id;
        $result     =   $this->User_mod->user_info($user_id);
        $result     =   json_decode($result);
        $data['profile_info']	=	($result->status=="success")?$result->result:'';
    	$data['title']			= 	"Health Directory || Create Category";
		$data['breadcum']		=	array("admin/category" => "Category",""=>"Create Category");
		$page                   =	'user/user_profile';
		$data['page']           =	$page;
		$this->load->view('landing_layout', $data);	
    }
    /*End Function */
    
     /**
     * profile_edit
     *
     * this function update user profile info by user id
     * @access	public
     * @return array
     */ 
     public function profile_edit() {

        if (isPostBack())
        {
        	 $arr = $this->input->post(null, true);
        	 $user_id 	= 	currentuserinfo()->id;
             $_POST['id']	=	$user_id; 
        	 $result     =   $this->User_mod->profile_edit();
        	 $result     =   json_decode($result);
        	 if ($result->status == 'success') {
                set_flashdata("success", "Your Profile info updated successfully");
                redirect(base_url() . "site/user/profile");
             }else if($result->status == 'error'){
            
                 set_flashdata("error",$result->error_msg);
                 redirect(base_url() . "site/user/profile_edit");
            }	
        }
        
        $user_id 	= 	currentuserinfo()->id;
        $result     =   $this->User_mod->user_info($user_id);
        $result     =   json_decode($result);
        $data['profile_info']	=	($result->status=="success")?$result->result:'';
    	$data['title']			= 	"Health Directory || Create Category";
		$data['breadcum']		=	array("admin/category" => "Category",""=>"Create Category");
		$page                   =	'user/profile_form';
		$data['page']           =	$page;
		$this->load->view('landing_layout', $data);	
        
     }
      /*End Function */
     	
	
     
      /**
     * changeImage
     *
     * this function update user profile image by user id
     * @access	public
     * @return array
     */
    public function changeImage(){

        if (@$_FILES['userfile']['name'] !=  '') {

            $path       				= $_FILES['userfile']['name'];
            $ext        				= pathinfo($path, PATHINFO_EXTENSION);
            $name       				= md5(time());
            $file_name 					= $name . "." . $ext;
            $thumb      				= $name . "_thumb." . $ext;
            $_FILES['userfile']['name'] = $file_name;
           
            $config['upload_path']      = "./assets/upload_image/";
            $config['allowed_types']    = 'gif|jpg|png|GIF|JPG|PNG|JPEG|jpeg';
            //$config['max_size'] = '2000';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $error = array('error_msg' => $this->upload->display_errors(), 'status' => 'error');
                echo json_encode($error);
                die;
            } else {
                $config['image_library']    = 'gd2';
                $config['source_image']     = "./assets/upload_image/$file_name";
                $config['create_thumb']     = true;

                $config['width']    		= 200;
                $config['height']   		= 200;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                unlink($config['upload_path'] . $file_name);
            }
            $user_id 	= 	currentuserinfo()->id;
            $_POST['id']	=	$user_id;
            $result = $this->User_mod->changeImage($thumb);
            echo json_encode($result);
        } else {
            $data['status'] = 'error';
            $data['error_msg'] = 'Invalid Request';
            echo json_encode($data);
        }
    }
     /*End Function */
	 
	/*
	function for the feedback
	listing of user
    */	
	 public function feedback($page_no=null)
	 {
		 $current_id = currentuserinfo()->id; 
		 if(@$page_no){
            	$page   =   $page_no ;
         }else{
           	 	$page   =   1;
         }
    	 $page_size						 =	 5 ;
         $data['page_size']  			 =	 $_POST['page_size']	=	$page_size;
         $data['page_no']    			 =	 $_POST['page_no']		=	$page;
         $result 	 			         =   $this->User_mod->listing($current_id);
    	 $result						 =   json_decode($result);
    	 //-------------- pa
    	 $config						 =   array();        
         $config["base_url"]			 =   base_url().'site/user/feedback/';
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
         $config['uri_segment']	=   4;
         $config["total_rows"]  =	$data['total_data']  	 	=   $result->total_data;
         $this->pagination->initialize($config);
         $data["links"]      		=   $this->pagination->create_links();
         $data['result']         =   $result->status == 'success' ? $result->result : '';
        // print_r($data); die;
        //---------------- 
        $data['page']       = 	'user/my_feedback';
       $data['breadcum']	=	array('"'.base_url().'"' => "Home",""=>"My feedback");
       $data['title']  =   "Directory || My feedback";
        $this->load->view('landing_layout', $data); 
	 }
	 
}    
?>   