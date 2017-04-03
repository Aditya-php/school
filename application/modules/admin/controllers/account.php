<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Account Controller
 *
 * @package		Account
 * @category	Account 
 * @author		Kumar Gaurav
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */

class Account extends CI_Controller {
    
     /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
       $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		
    }

     /**
     * index
     *
     * This function display user dashboar according to USER TYPE
     * 
     * @access	public
     * @return	html data
     */ 
	 
	 
    /* public function index() 
    {
        $data['title']		= 	"Health Directory || Dashboard";
        $data['breadcum']	=	array("admin/dashboard" => "Home",""=>"Dashboard");
        $page              	=	'dashboard_admin';
        
        
        $data['page']           =	$page;
        _layout($data);
    }
	 */
	
	
	// function of reset password for the admin profile
	public function resetpassword()
	{
		 if($this->input->is_ajax_request())
        {
			$this->load->model('auth_mod');
			$current_pass = $this->input->post('cur_pass');
			$new_pass     = $this->input->post('new_pass');
			
			$data = $this->auth_mod->get_change_password($current_pass,$new_pass);
			$result = (object)$data;
			if($result->valid)
			{
			    echo 1;
				return ;
			}
			else if(!$result->valid)
            {
				echo 2;
				return ;
				
			}
			
		}
		$data['title']		= 	"C3 || Dashboard";
		$data['breadcum']	=	array("admin/dashboard" => "Home",""=>"Reset Password");
		$page              	=	'reset_password';
		$data['page']           =	$page;
		_layout($data);
	}
	
	
	//function for editing the profile of admin 
	public function update_profile()
	{
	$alldata = $this->session->all_userdata("userinfo");// pr($alldata);
	$id1=$alldata['userinfo']->id;
	$user_type =$alldata['userinfo']->user_type;

		$this->load->model('user_mod');
		// pr($_POST);die;
		if($_POST)
			{
			    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique_edit[users.email]');
			$this->form_validation->set_rules('contact_number', 'Mobile Number', 'trim|required');
				              	// echo validation_errors();die;	
			    if ($this->form_validation->run() == false)
			    {
			       $this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
			    }  
				else
				{
					$file_data=$this->upload_image1();
					if($file_data['status'] == 'success')
				     {
				         $dbdata['profile_image'] = $file_data['upload_data']['file_name'];
				     }
				    else if($file_data['status'] == 'error')
				    {
						set_flashdata("account_create",$file_data['error']);
						redirect('admin/account/update_profile/');
						// die; 
				      }
					
					// pr($dbdata);die;
					$dbdata['first_name']    = $this->input->post('first_name');
					$dbdata['last_name']     = $this->input->post('last_name');
					$dbdata['email']    = $this->input->post('email');
					$dbdata['contact_number']    = $this->input->post('contact_number');
				    $dbdata['modified'] = date("Y-m-d h:i:s");
				
					$table1 		= 'users';
					
					
					$upwhere_con = array('id'=>$id1,'user_type'=>$user_type);
					$upid = $this->user_mod->dbupdate($table1,$dbdata,$upwhere_con);
					if($upid)
					{
					$this->session->set_flashdata('account_create', 'Great!! profile updated successfully .');
					redirect(base_url().'admin/dashboard');	
					echo "success";
					}
					
			   }			
			}
	     	
			$data["result"] = array();
			$table = 'users';
			$row = 'row';
			$where_con = array('id'=>$id1,'user_type'=>$user_type);
			$data['result'] = $this->user_mod->get_record($table,$row,'',$where_con);
			// pr($data);die;
		
		$data['title']		= 	"C3 || Edit Profile";
		$data['breadcum']	=	array("admin/dashboard" => "Home");
		$page              	=	'edit_profile';
		$data['page']           =	$page;
		_layout($data);
	}
	
	
	 function upload_image1()
	{
		
        if(!empty($_FILES['image']['name']) )
		{   
       // print_r($_FILES); die;
	            $new_name = time().$_FILES["image"]['name'];
	   
				$config = array(
				'upload_path'   => "./assets/upload_image/",
				'allowed_types' => "jpg|jpeg|png|tif|gif|JPG|JPEG|png|PNG",
				'file_name'     => $new_name,
				'remove_spaces' => TRUE
				); 

				$this->load->library('upload');
                $this->upload->initialize($config); 
                //$this->upload->do_upload('image');
            
                  if(!$this->upload->do_upload('image'))
					{
				        $error = '';
						$this->upload->display_errors('<p>','</p>');
						$errors = $this->upload->display_errors();
						 // echo $errors;
						//die;
					    $array = array('status'=>'error','error' => $this->upload->display_errors());
						//Here return the image error validation
											
					}
                  else
                   {
                    $array = array('status'=>'success','upload_data' => $this->upload->data());
                   }
        }
           
            return $array;
    } 


		 public function logout() 
    {
        $this->session->sess_destroy();
          redirect(base_url().'admin/auth');	
        }
}
