<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *  Site Controller
 *
 * @package		Site
 * @category            Site 
 * @author		Ankit Rajput 
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc
 * @since		Version 1.0
 */

class Articles extends CI_Controller {

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
        $this->load->model('article_mod');
        $this->load->library("pagination"); 
        //is_protected();
    }

    /**
     *index
     *
     * This function dispaly main site page
     * 
     * @access	public
     * @return	html data
     */
    public function index($page_no = NULL) 
    {
    	//-----------
    	 if($page_no){
            	$page   =   $page_no ;
         }else{
           	 	$page   =   1;
         }
    	 $page_size						 =	 5 ;
         $data['page_size']  			 =	 $_POST['page_size']	=	$page_size;
         $data['page_no']    			 =	 $_POST['page_no']		=	$page;
         $_POST['status']		         =	 array('1');
         $result 	 			         =   $this->article_mod->get_articles_list();
    	 $result						 =   json_decode($result);
    	 //-------------- pa
    	 $config						 =   array();        
         $config["base_url"]			 =   base_url().'site/articles/index/';
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
         $data['img_path']       =   base_url()."assets/article_image/";  
        //---------------- 
         $data['page']       = 	'articles/list_article';
         $data['title']  =   "Directory || Articles";
         $data['breadcum']	=	array('".base_url()."'=> "Home",""=>"My Articles");
        /*Fetching US States*/
        $data['states'] =   $this->article_mod->fetch_states();
      
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/    
    
     /**
     *add
     *
     * This function to add article
     * 
     * @access	public
     * @return	html data
     */
        
    public function my_articles($page_no = NULL) 
    { 
         is_protected();
    	 if($page_no){
            	$page   =   $page_no ;
         }else{
           	 	$page   =   1;
         }
    	 $page_size						 =	 5 ;
         $data['page_size']  			 =	 $_POST['page_size']	=	$page_size;
         $data['page_no']    			 =	 $_POST['page_no']		=	$page;
         $user_id 						 = 	 currentuserinfo()->id;
         $_POST['added_by']		         =	 $user_id;
         $_POST['status']		         =	 array('0','1');				 	
         $result 	 			         =   $this->article_mod->get_articles_list();
    	 $result						 =   json_decode($result);
    	 //-------------- pagination-------------------
    	 $config						 =   array();        
         $config["base_url"]			 =   base_url().'site/articles/my_articles/';
         $config["per_page"]			 =   $page_size;
         $config['use_page_numbers']     =   TRUE;        
         $config['first_tag_open']       =   $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li aria-controls="sample_2" class="paginate_button">';
         $config['first_tag_close']      =   $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';        
         $config['cur_tag_open']         =   '<li aria-controls="sample_2" class="active"><a><b>';
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
         //------------------ end ------------------------------------------------------
         $data['result']         =   $result->status == 'success' ? $result->result : '';
         $data['img_path']       =   base_url()."assets/article_image/";  
        //---------------- 
         $data['page']       = 	'articles/list_my_article';
         $data['breadcum']	=	array('".base_url()."'=> "Home",""=>"My Articles");
         $data['title']  =   "Directory || My Articles";
        /*Fetching US States*/
        $data['states'] =   $this->article_mod->fetch_states();
      
        $this->load->view('landing_layout', $data);
    }
     /*End of Function*/    
    
    
    /**
     *add
     *
     * This function to add article
     * 
     * @access	public
     * @return	html data
     */
        
    public function add() 
    {   is_protected();
        if (isPostBack())
        {
        	$arr	=	$this->input->post(NULL,TRUE);
        	if(@$_FILES['article_image']['name'] !=  '') 
        	{
            $path	=	$_FILES['article_image']['name'];
            $ext	=	pathinfo($path, PATHINFO_EXTENSION);
            $name	=	md5(time());
            $file_name	= $name . "." . $ext;
            $thumb	= $name . "_thumb." . $ext;
            $_FILES['article_image']['name'] = $file_name;
           
            $config['upload_path']      = "./assets/article_image/";
            $config['allowed_types']    = 'gif|jpg|png|GIF|JPG|PNG|JPEG|jpeg';
            //$config['max_size'] = '2000';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('article_image')) {
                $error = array('error_msg' => $this->upload->display_errors(), 'status' => 'error');
                echo json_encode($error);
                die;
            } else {
                $config['image_library']    = 'gd2';
                $config['source_image']     = "./assets/article_image/$file_name";
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
            }else{
                $thumb  =   '';
            }
            
            $user_id 	= 	currentuserinfo()->id;
            $_POST['user_id']	=	$user_id;
            $result = $this->article_mod->add($thumb);
            $result	=	json_decode($result);
            if($result->status == "success")
            {
				 set_flashdata("success","Article added successfully");
				 redirect(base_url().'site/articles/my_articles');
			}
			else if($result->status == "error"){
				 //set_flashdata("error",$result->error_msg);
				 $data['error_msg']	= $result->error_msg;
				 
			}
            
         
        	
        }
        $rescat	=	$this->article_mod->get_article_categories('1');
        $rescat	=	json_decode($rescat);
        $data['articles_cat']	=	($rescat->status=="success")?$rescat->result:'';
        $data['title']		= 	"Directory || Add Articles";
        $data['breadcum']	=	array('"'.base_url().'"' => "Home","site/articles/my_articles" => "My Articles",""=>"Add New Article");
        $data['page']       = 	'articles/add_article';
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/  
    
    /**
     *edit
     *
     * This function to edit article
     * 
     * @access	public
     * @return	html data
     */
        
    public function edit($id = NULL) 
    {   is_protected();
        $id	=	ID_decode($id);
        if (isPostBack())
        {
        	$arr	=	$this->input->post(NULL,TRUE);
        	if(@$_FILES['article_image']['name'] !=  '') 
        	{
            $path	=	$_FILES['article_image']['name'];
            $ext	=	pathinfo($path, PATHINFO_EXTENSION);
            $name	=	md5(time());
            $file_name	= $name . "." . $ext;
            $thumb	= $name . "_thumb." . $ext;
            $_FILES['article_image']['name'] = $file_name;
           
            $config['upload_path']      = "./assets/article_image/";
            $config['allowed_types']    = 'gif|jpg|png|GIF|JPG|PNG|JPEG|jpeg';
            //$config['max_size'] = '2000';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('article_image')) {
                $error = array('error_msg' => $this->upload->display_errors(), 'status' => 'error');
                echo json_encode($error);
                die;
            } else {
                $config['image_library']    = 'gd2';
                $config['source_image']     = "./assets/article_image/$file_name";
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
            }else{
                $thumb  =   '';
            }
            
            $user_id 	= 	currentuserinfo()->id;
            $_POST['user_id']	=	$user_id;
            $_POST['id']	=	$id;
            $result = $this->article_mod->edit($thumb);
            $result	=	json_decode($result);
            if($result->status == "success")
            {
				 set_flashdata("success","Article updated Successfully");
				 redirect(base_url().'site/articles/my_articles');
			}
			else if($result->status == "error"){
				 //set_flashdata("error",$result->error_msg);
				 $data['error_msg']	= $result->error_msg;
				 
			}
            
         
        	
        }
        $result	=	$this->article_mod->get_article_view($id);
        $result	=	json_decode($result);
        if($result->status == "success")
        {
			$data['article_result']	=	$result->result;	
		}else{
			$data['article_result']	=	'';
		}
		$data['id']		=	$id;        
        $rescat	=	$this->article_mod->get_article_categories('1');
        $rescat	=	json_decode($rescat);
        $data['articles_cat']	=	($rescat->status=="success")?$rescat->result:'';
        $data['breadcum']	=	array('"'.base_url().'"' => "Home","site/articles/my_articles" => "My Articles",""=>"Edit Article");
        $data['title']		= 	"Directory || Edit Articles";
        $data['page']       = 	'articles/add_article';
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/     
    
    /**
     * view
     *
     * This function to view article
     * 
     * @access	public
     * @return	html data
     */
        
    public function view($id=null)
    {   
        $id	=	ID_decode($id);
        $result	=	$this->article_mod->get_article_view($id);
        $result	=	json_decode($result);
        if($result->status  ===  'success')
        {
        	$data['result']		=	$result->result;
            
        }
        $data['img_path']       =   base_url()."assets/article_image/";    
        $data['title']		= 	"Directory || View Article";
		$data['breadcum']	=	array('"'.base_url().'"' => "Home","site/articles/" => "Articles",""=>"View Article");
        $data['page']       = 	'articles/view_article';
        
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/   
    
    //
    /**
     * delete_article 
     *
     * This function to delete_article 
     * 
     * @access	public
     * @return	html data
     */
        
    public function delete_article()
    { 
        is_protected();
    	$arr	=	$this->input->post(NULL,TRUE);
    	$arr['id']	=	ID_decode($arr['id']);
        $result	=	$this->article_mod->delete_article($arr['id']);
        $result	=	json_decode($result);
       
        if($result->status  ===  'success')
        {
        	set_flashdata("success","Article deleted successfully");		            
            echo $result->status;die;
            
        }else if($result->status  ===  'error'){ 
            
			set_flashdata("error",$result->error_msg);
            echo $result->status;die;  
        }
    }
    /*End of Function*/ 
}
?>