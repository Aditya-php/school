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
       $user_type=array('3'); //allowed user type to access
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
	public function resetpassword()
	{
		 if($this->input->is_ajax_request())
        {
			$this->load->model('user_mod');
			$current_pass = $this->input->post('cur_pass');
			$new_pass     = $this->input->post('new_pass');
			
			$data = $this->user_mod->get_change_password($current_pass,$new_pass);
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
		$page              	=	'parent/reset_password';
		$data['page']           =	$page;
		_layout_parent($data);
	}
	
	
	//function for editing the profile of admin 
public function update_profile()
	{
	$alldata = $this->session->all_userdata("userinfo"); //pr($alldata);die;
	if(!empty($alldata))
	{
	
	$id1=$alldata['userinfo']->id;
	
	// pr($id1);die;

		$this->load->model('user_mod');
		
		if($_POST)
			{
			    $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
				$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('email', 'email', 'trim|required|is_unique_edit[users.email]');
		    	$this->form_validation->set_rules('contact_number', 'mobile', 'trim|required');
				$this->form_validation->set_rules('address', 'address', 'trim|required');
				$this->form_validation->set_rules('area_id', 'Area', 'trim|required');
				$this->form_validation->set_rules('city_id', 'City', 'trim|required');
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
						// redirect('admin/account/update_profile/');
						// die; 
				   }
				   
					//pr($dbdata['profile_image']); die;
					
					$dbdata['first_name']    = $this->input->post('first_name');
					$dbdata['last_name']      = $this->input->post('last_name');
			    	$dbdata['email']     = $this->input->post('email');
			    	$dbdata['contact_number']    = $this->input->post('contact_number');
					$dbdata['address']     = $this->input->post('address');
					$dbdata['city_id']     = $this->input->post('city_id');
					$dbdata['area_id']     = $this->input->post('area_id');
					$dbdata['modified']     = date("Y-m-d h:i:s");
					
					$father_name     = $this->input->post('father_name');
					$father_job_desc     = $this->input->post('father_job_desc');
					$father_contact     = $this->input->post('father_contact');
					$mother_name     = $this->input->post('mother_name');
					$mother_job_desc     = $this->input->post('mother_job_desc');
					$mother_contact     = $this->input->post('mother_contact');
					$emergency_no     = $this->input->post('emergency_no');
					
					
					$table1 		= 'users';
					
					$dbdata2 = array('father_name'=>$father_name,'father_job_desc'=>$father_job_desc,'father_contact'=>$father_contact,'mother_name'=>$mother_name,'mother_job_desc'=>$mother_job_desc,'mother_contact'=>$mother_contact,'emergency_no'=>$emergency_no,'modified_date'=>date("Y-m-d h:i:s"));
					$table12		= ' parents_detail';
					
					$upwhere_con = array('id'=>$id1,'user_type'=>'3');
					$upid = $this->user_mod->dbupdate($table1,$dbdata,$upwhere_con);
					
					$check_parnt=$this->db->select('id')->get_where('parents_detail',array('parent_id'=>currUserId()));
					if($check_parnt->num_rows()>0)
					{
						$upid1 = $this->user_mod->dbupdate('parents_detail',$dbdata2,array('parent_id'=>currUserId()));
					}
					else{
						$dbdata2['parent_id']=currUserId();
						$dbdata2['created_date']=date('Y-m-d h:i:s');
						$upid1 = $this->db->insert('parents_detail',$dbdata2);
					}
					
					if($upid)
					{
					$this->session->set_flashdata('account_create', 'Great!! profile updated successfully .');
					redirect(base_url().'parents');	
					echo "success";
					}
					
			   }			
			}
		    $qry=$this->db->select('id,city_name')->from('city_master')->where('status','active')->get();
	    	$data['city_list'] = ($qry->num_rows()>0)? $qry->result() :array();//pr($data);die;
			$data["result"] = array();
			$table = 'users';
			$row = 'row';
			$where_con = array('id'=>$id1,'user_type'=>'3');
			$data['result'] = $this->user_mod->get_record();
		
		$data['title']		= 	"C3 || Edit Profile";
		$data['breadcum']	=	array("admin/dashboard" => "Home",""=>"Edit Profile");
		$page              	=	'parent/edit_profile';
		$data['page']           =	$page;
		_layout_parent($data);
	}else{
		redirect('admin/auth');
	}
	}

	 function upload_image1()
	{
	  $array=array('status'=>'');
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


	
		public function find_area_list()
	{
				$this->load->model('user_mod');
		$id=$this->input->post('id',true);
		$area_id=($this->input->post('area_id',true)) ? $this->input->post('area_id',true) : "";
		$result= $this->user_mod->find_area_list($id,$area_id);//pr($result);
		echo $result; die;
    }
	

		 public function logout() 
    {
        $this->session->sess_destroy();
          redirect(base_url().'admin/auth');	
        }
}
