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
		 $user_type=array('4'); //allowed user type to access
        is_protect($user_type);
      	$this->load->model('account_mod');
      	$this->load->model('admin/vendor_mod');
		
    }


		public function resetpassword()
	{
		 if($this->input->is_ajax_request())
        {
	
			$current_pass = $this->input->post('cur_pass');
			$new_pass     = $this->input->post('new_pass');
			
			$data = $this->account_mod->get_change_password($current_pass,$new_pass);
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
		$page              	=	'vandor/reset_password';
		$data['page']           =	$page;
		_layout_vendor($data);
	}
	

		 public function logout() 
    {
        $this->session->sess_destroy();
          redirect(base_url().'admin/auth');	
        }
		
		// function update_profile()
		// {
			 // redirect(base_url().'vendors');
		// }
		
		function update_profile($userid){
			
			$userid = ID_decode($userid);
			
			$Vqry = $this->db->select('id')->get_where('vendor_details', array('user_id' => $userid));
		
			 if($Vqry->num_rows() == 0){ 	
				 $this->session->set_flashdata('item', 'Vendor details does not exists.');
				 redirect(base_url('admin/vendor'));
			 }
		 
			if(empty($userid)){
				redirect(base_url('vendor')); 
			}
			//$id=ID_decode($id);
			$id = $Vqry->row()->id;
			$vendor = $this->vendor_mod->get_vendor($id);
			
			$location_vendor = $this->vendor_mod->get_vendor_location($id);
			$vendor['result']['location_vendor'] = (!empty($location_vendor['result'])) ? $location_vendor['result'] :array();
			$data["result"] = $vendor['result'];
			//pr($data["result"]);die;
			$lqry = $this->db->select('id,city_name')->get_where('city_master', array('status' => 'active'));
			$data['location'] = ($lqry->num_rows() > 0) ? $lqry->result() : array();
			
			$sqry = $this->db->select('id,name')->get_where('services');
			$data['services'] = ($sqry->num_rows() > 0) ? $sqry->result() : array();
			
			if(isPostBack()) {
				//pr($this->input->post());die;
				//$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
				$this->form_validation->set_rules('nature_of_vendor', 'Nature of Vendor', 'required');
				$this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
				$this->form_validation->set_rules('moblie_1', 'Mobile Number', 'required|xss_clean|min_length[10]|max_length[10]');
				$this->form_validation->set_rules('moblie_2', 'Mobile Number', 'required|xss_clean|min_length[10]|max_length[10]');
				$this->form_validation->set_rules('vendor_spoc', 'Vendor SPOC', 'required');
			   
				$this->form_validation->set_rules('area_id', 'Area', 'required');
				$this->form_validation->set_rules('service_id[]', 'Services Offered', 'required');
				
				
				if ($this->form_validation->run() == FALSE) {
					$data['error_msg'] = validation_errors();
				}
				else
				{
					//pr($this->input->post());die;
					$city = $this->input->post('city');
					$area_id = $this->input->post('area_id');
					$address = $this->input->post('address');
					$pin_code = $this->input->post('pin_code');
					$nature_of_location = $this->input->post('nature_of_location');
					$location_other = $this->input->post('location_other');
					
					//pr($this->input->post());die;
					$postData = $this->input->post();
					// vendor image
					if(isset($_FILES['vendor_images']['name'][0]) && !empty($_FILES['vendor_images']['name'][0]))
					{ 
						$filesCount = count($_FILES['vendor_images']['name']);
						$error = array();
						$file_name_image = array();
						for($i = 0; $i < $filesCount; $i++)
						{
							$_FILES['vendorFile']['name'] = time().rand(3,999).'_'.$_FILES['vendor_images']['name'][$i];
							$_FILES['vendorFile']['type'] = $_FILES['vendor_images']['type'][$i];
							$_FILES['vendorFile']['tmp_name'] = $_FILES['vendor_images']['tmp_name'][$i];
							$_FILES['vendorFile']['error'] = $_FILES['vendor_images']['error'][$i];
							$_FILES['vendorFile']['size'] = $_FILES['vendor_images']['size'][$i];

							$uploadPath = './assets/vendor_image/';
							$config['upload_path'] = $uploadPath;
							$config['allowed_types'] = 'gif|jpg|png';
							
							$this->load->library('upload', $config);
							$this->upload->initialize($config);

							array_push($file_name_image,$_FILES['vendorFile']['name']);

							if(!file_exists($uploadPath.$_FILES['vendorFile']['name'])){
								
								if ( ! $this->upload->do_upload('vendorFile'))
								{
									array_push($error,$this->upload->display_errors());
									
								}
							}
							else{
								
								array_push($error,$_FILES['vendorFile']['name']);
								
							}
							
						}
						
						if(!empty($error)){
							//set_flashmsg('error','these files already exists '. implode(',',$error));
							$data['error_msg']   = $this->upload->display_errors();
						}
						
					}
					if(isset($_FILES['vendor_logo']['name']) && !empty($_FILES['vendor_logo']['name'])) 
					{
						$path='./assets/vendor_image/';
						$this->load->library('upload');
						$vendor_logo                       =   time().rand(3,999).'_'.$_FILES['vendor_logo']['name'];
						$config['charset']          =   "UTF-8";
						$config['upload_path']      =    $path;
						$config['allowed_types']    =   'gif|jpg|png';
						$config['file_name']        =    $vendor_logo;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('vendor_logo'))
						{
							$data['error_msg']   = $this->upload->display_errors();
							
						}
					   
					}
					 if(isset($_FILES['v_pan_entity']['name']) && !empty($_FILES['v_pan_entity']['name'])) 
					{
						$path='./assets/vendor_image/';
						$this->load->library('upload');
						$v_pan_entity                       =   time().rand(3,999).'_'.$_FILES['v_pan_entity']['name'];
						$config['charset']          =   "UTF-8";
						$config['upload_path']      =    $path;
						$config['allowed_types']    =   'gif|jpg|png';
						$config['file_name']        =    $v_pan_entity;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('v_pan_entity'))
						{
							$data['error_msg']   = $this->upload->display_errors();
							
						}
					   
					}
					 if(isset($_FILES['v_pan_spoc']['name']) && !empty($_FILES['v_pan_spoc']['name'])) 
					{
						$path='./assets/vendor_image/';
						$this->load->library('upload');
						$v_pan_spoc                       =   time().rand(3,999).'_'.$_FILES['v_pan_spoc']['name'];
						$config['charset']          =   "UTF-8";
						$config['upload_path']      =    $path;
						$config['allowed_types']    =   'gif|jpg|png';
						$config['file_name']        =    $v_pan_spoc;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('v_pan_spoc'))
						{
							$data['error_msg']   = $this->upload->display_errors();
							
						}
					   
					}
					 if(isset($_FILES['v_address_proff_spoc']['name']) && !empty($_FILES['v_address_proff_spoc']['name'])) 
					{
						$path='./assets/vendor_image/';
						$this->load->library('upload');
						$v_address_proff_spoc                       =   time().rand(3,999).'_'.$_FILES['v_address_proff_spoc']['name'];
						$config['charset']          =   "UTF-8";
						$config['upload_path']      =    $path;
						$config['allowed_types']    =   'gif|jpg|png';
						$config['file_name']        =    $v_address_proff_spoc;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('v_address_proff_spoc'))
						{
							$data['error_msg']   = $this->upload->display_errors();
							
						}
					   
					}
					 if(isset($_FILES['v_registration']['name']) && !empty($_FILES['v_registration']['name'])) 
					{
						$path='./assets/vendor_image/';
						$this->load->library('upload');
						$v_registration                       =   time().rand(3,999).'_'.$_FILES['v_registration']['name'];
						$config['charset']          =   "UTF-8";
						$config['upload_path']      =    $path;
						$config['allowed_types']    =   'gif|jpg|png';
						$config['file_name']        =    $v_registration;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('v_registration'))
						{
							$data['error_msg']   = $this->upload->display_errors();
							
						}
					   
					}
					 if(isset($_FILES['v_owner_academic']['name']) && !empty($_FILES['v_owner_academic']['name'])) 
					{
						$path='./assets/vendor_image/';
						$this->load->library('upload');
						$v_owner_academic                       =   time().rand(3,999).'_'.$_FILES['v_owner_academic']['name'];
						$config['charset']          =   "UTF-8";
						$config['upload_path']      =    $path;
						$config['allowed_types']    =   'gif|jpg|png';
						$config['file_name']        =    $v_owner_academic;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('v_owner_academic'))
						{
							$data['error_msg']   = $this->upload->display_errors();
							
						}
					   
					}
					if(isset($_FILES['v_tin_entity']['name']) && !empty($_FILES['v_tin_entity']['name'])) 
					{
						$path='./assets/vendor_image/';
						$this->load->library('upload');
						$v_tin_entity                       =   time().rand(3,999).'_'.$_FILES['v_tin_entity']['name'];
						$config['charset']          =   "UTF-8";
						$config['upload_path']      =    $path;
						$config['allowed_types']    =   'gif|jpg|png';
						$config['file_name']        =    $v_tin_entity;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('v_tin_entity'))
						{
							$data['error_msg']   = $this->upload->display_errors();
							
						}
					   
					}
					if(isset($_FILES['v_adhar']['name']) && !empty($_FILES['v_adhar']['name'])) 
					{
						$path='./assets/vendor_image/';
						$this->load->library('upload');
						$v_adhar                       =   time().rand(3,999).'_'.$_FILES['v_adhar']['name'];
						$config['charset']          =   "UTF-8";
						$config['upload_path']      =    $path;
						$config['allowed_types']    =   'gif|jpg|png';
						$config['file_name']        =    $v_adhar;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('v_adhar'))
						{
							$data['error_msg']   = $this->upload->display_errors();
							
						}
					   
					}
					 if(isset($_FILES['v_bank']['name']) && !empty($_FILES['v_bank']['name'])) 
					{
						$path='./assets/vendor_image/';
						$this->load->library('upload');
						$v_bank                       =   time().rand(3,999).'_'.$_FILES['v_bank']['name'];
						$config['charset']          =   "UTF-8";
						$config['upload_path']      =    $path;
						$config['allowed_types']    =   'gif|jpg|png';
						$config['file_name']        =    $v_bank;
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						if ( ! $this->upload->do_upload('v_bank'))
						{
							$data['error_msg']   = $this->upload->display_errors();
							
						}
					   
					}

					// write session here

					$vendorData = array(
						'nature_of_vendor'=>$postData['nature_of_vendor'],
						'vendor_name'=>$postData['vendor_name'],
						'email'=>$postData['email'],
						'moblie_1'=>$postData['moblie_1'],
						'moblie_2'=>$postData['moblie_2'],
						'landline'=>$postData['landline'],
						'vendor_spoc'=>$postData['vendor_spoc'],
						'location_vendor'	=> json_encode(array('city'=>@array_filter($city),'area_id'=>@array_filter($area_id),'address'=>@array_filter($address),'pin_code'=>@array_filter($pin_code),'nature_of_location'=>@array_filter($nature_of_location),'location_other'=>@array_filter($location_other))),
						'service_id'=>implode(",",$postData['service_id']),
						'year_of_establishment'=>$postData['year_of_establishment'],
						'age_min'=>$postData['age_min'],
						'age_max'=>$postData['age_max'],
						'hourly_min'=>$postData['hourly_min'],
						'hourly_max'=>$postData['hourly_max'],
						'monthly_min'=>$postData['monthly_min'],
						'monthly_max'=>$postData['monthly_max'],
						'v_facebook'=>$postData['v_facebook'],
						'v_linkedin'=>$postData['v_linkedin'],
						'v_google_plus'=>$postData['v_google_plus'],
						'v_status'=>$postData['v_status'],
						'description'=>$postData['description'],
						'vendor_images'=>isset($file_name_image)?json_encode($file_name_image):$vendor['result']['vendor_images'],
						'vendor_logo'=>isset($vendor_logo)?$vendor_logo:$vendor['result']['vendor_logo'],
						'v_pan_entity'=>isset($v_pan_entity)?$v_pan_entity:$vendor['result']['v_pan_entity'],
						'v_pan_spoc'=>isset($v_pan_spoc)?$v_pan_spoc:$vendor['result']['v_pan_spoc'],
						'v_address_proff_spoc'=>isset($v_address_proff_spoc)?$v_address_proff_spoc:$vendor['result']['v_address_proff_spoc'],
						'v_registration'=>isset($v_registration)?$v_registration:$vendor['result']['v_registration'],
						'v_owner_academic'=>isset($v_owner_academic)?$v_owner_academic:$vendor['result']['v_owner_academic'],
						'v_tin_entity'=>isset($v_tin_entity)?$v_tin_entity:$vendor['result']['v_tin_entity'],
						'v_adhar'=>isset($v_adhar)?$v_adhar:$vendor['result']['v_adhar'],
						'v_bank'=>isset($v_bank)?$v_bank:$vendor['result']['v_bank'],

					);
				   
					//pr($vendorData);die;
					
					$result  = $this->vendor_mod->update_vendor($id,$vendorData,$type=1);
					
					$this->session->set_flashdata('item','Your profile has been updated successfully!!');
					redirect(base_url('vendors')); 

				}
			}
			
			
			$data['title'] = "C3 || Vendor";
			$data['breadcum'] = array("" => "Vendor", "" => "Edit Vendor");
			$page = 'vandor/edit';
			$data['page'] = $page;
			_layout_vendor($data);
			
			/* $data['title'] = "C3 || Vendor";
			$data['breadcum'] = array("" => "Vendor", "" => "Edit Vendor");
			$page = 'vandor/dashboard_admin';
			$data['page'] = $page;
			_layout_vendor($data); */
		}
		
		
		
	/* 
	*
	*
	*/
	public function update_profile_final($userid) {
		$userid = ID_decode($userid);
		
		$Vqry = $this->db->select('id')->get_where('vendor_details', array('user_id' => $userid));
	
		 if($Vqry->num_rows() == 0){ 	
			 $this->session->set_flashdata('item','Vendor details does not exists.');
			redirect(base_url('vendors')); 
		 }
	 
		if(empty($userid)){
			redirect(base_url('vendor')); 
		}
		//$id=ID_decode($id);
		
		$id = $Vqry->row()->id;
		
        if(isPostBack()) {
			$postData		= $this->input->post();
			//pr($postData);die;
			$result  = $this->vendor_mod->update_vendor($id,$postData,$type=2);
			if($result){
					
				$this->session->set_flashdata('item','Your profile has been updated successfully!!');
				redirect(base_url('vendors')); 
			}
			else{
				$this->session->set_flashdata('item','Your profile has not been updated successfully');
				redirect(base_url('vendors')); 
			}
		}
		
		$vendor = $this->vendor_mod->get_vendor($id);
        $data["result"] = $vendor['result'];
		//pr($data["result"]);die;
        $data['title'] = "C3 || Vendor";
		$data['breadcum'] = array("" => "Vendor", "" => "Edit Vendor");
		$page = 'vandor/final_edit';
		$data['page'] = $page;
		_layout_vendor($data);
        
    }
		
		public function edit() {
				$alldata = $this->session->all_userdata("userinfo");//pr($alldata);die; 
		// $id = $alldata['userinfo']->id;
		// pr($id);die;
        
		 // $Vqry = $this->db->select('id')->get_where('vendor_details', array('id' => $id));
		// pr($Vqry );die;
		 // if($Vqry->num_rows() == 0){
			 // $this->session->set_flashdata('vendor_create', 'Vendor details does not exists.');
			 // redirect(base_url('admin/vendor'));
		 // }
		 
		// if(empty($id)){
            // redirect(base_url('admin/vendor/add')); 
        // }
		//$id=ID_decode($id);
		//
		// $vendor = $this->account_mod->get_vendor($id);pr($vendor );die;
		
		// $location_vendor = $this->account_mod->get_vendor_location($id);
		// $vendor['result']['location_vendor'] = $location_vendor['result'];
        // $data["result"] = $vendor['result'];
		//pr($data["result"]);die;
	$qry=$this->db->select('id,city_name')->get_where('city_master',array('status'=>'active'));
	pr($qry);die;
        // $data['location'] = ($lqry->num_rows() > 0) ? $lqry->result() : array();
		
		// $sqry = $this->db->select('id,name')->get_where('services');
        // $data['services'] = ($sqry->num_rows() > 0) ? $sqry->result() : array();
		
        if(isPostBack()) {
			
			//$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('nature_of_vendor', 'Nature of Vendor', 'required');
            $this->form_validation->set_rules('vendor_name', 'Vendor Name', 'required');
            $this->form_validation->set_rules('moblie_1', 'Mobile Number', 'required');
            $this->form_validation->set_rules('moblie_2', 'Mobile Number', 'required');
            $this->form_validation->set_rules('vendor_spoc', 'Vendor SPOC', 'required');
           
            $this->form_validation->set_rules('area_id', 'Area', 'required');
            $this->form_validation->set_rules('service_id[]', 'Services Offered', 'required');
            
            
            if ($this->form_validation->run() == FALSE) {
                $data['error_msg'] = validation_errors();
            }
            else
			{
				//pr($this->input->post());die;
				$city = $this->input->post('city');
				$area_id = $this->input->post('area_id');
				$address = $this->input->post('address');
				$pin_code = $this->input->post('pin_code');
				$nature_of_location = $this->input->post('nature_of_location');
				$location_other = $this->input->post('location_other');
				
                //pr($this->input->post());die;
                $postData = $this->input->post();
                // vendor image
                if(isset($_FILES['vendor_images']['name'][0]) && !empty($_FILES['vendor_images']['name'][0]))
                { 
                    $filesCount = count($_FILES['vendor_images']['name']);
                    $error = array();
                    $file_name_image = array();
                    for($i = 0; $i < $filesCount; $i++)
                    {
                        $_FILES['vendorFile']['name'] = time().rand(3,999).'_'.$_FILES['vendor_images']['name'][$i];
                        $_FILES['vendorFile']['type'] = $_FILES['vendor_images']['type'][$i];
                        $_FILES['vendorFile']['tmp_name'] = $_FILES['vendor_images']['tmp_name'][$i];
                        $_FILES['vendorFile']['error'] = $_FILES['vendor_images']['error'][$i];
                        $_FILES['vendorFile']['size'] = $_FILES['vendor_images']['size'][$i];

                        $uploadPath = './assets/vendor_image/';
                        $config['upload_path'] = $uploadPath;
                        $config['allowed_types'] = 'gif|jpg|png';
                        
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);

                        array_push($file_name_image,$_FILES['vendorFile']['name']);

                        if(!file_exists($uploadPath.$_FILES['vendorFile']['name'])){
                            
                            if ( ! $this->upload->do_upload('vendorFile'))
                            {
                                array_push($error,$this->upload->display_errors());
                                
                            }
                        }
                        else{
                            
                            array_push($error,$_FILES['vendorFile']['name']);
                            
                        }
                        
                    }
                    
                    if(!empty($error)){
                        //set_flashmsg('error','these files already exists '. implode(',',$error));
                        $data['error_msg']   = $this->upload->display_errors();
                    }
                    
                }
				if(isset($_FILES['vendor_logo']['name']) && !empty($_FILES['vendor_logo']['name'])) 
				{
					$path='./assets/vendor_image/';
					$this->load->library('upload');
					$vendor_logo                       =   time().rand(3,999).'_'.$_FILES['vendor_logo']['name'];
					$config['charset']          =   "UTF-8";
					$config['upload_path']      =    $path;
					$config['allowed_types']    =   'gif|jpg|png';
					$config['file_name']        =    $vendor_logo;
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('vendor_logo'))
					{
						$data['error_msg']   = $this->upload->display_errors();
						
					}
				   
				}
				 if(isset($_FILES['v_pan_entity']['name']) && !empty($_FILES['v_pan_entity']['name'])) 
				{
					$path='./assets/vendor_image/';
					$this->load->library('upload');
					$v_pan_entity                       =   time().rand(3,999).'_'.$_FILES['v_pan_entity']['name'];
					$config['charset']          =   "UTF-8";
					$config['upload_path']      =    $path;
					$config['allowed_types']    =   'gif|jpg|png';
					$config['file_name']        =    $v_pan_entity;
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('v_pan_entity'))
					{
						$data['error_msg']   = $this->upload->display_errors();
						
					}
				   
				}
				 if(isset($_FILES['v_pan_spoc']['name']) && !empty($_FILES['v_pan_spoc']['name'])) 
				{
					$path='./assets/vendor_image/';
					$this->load->library('upload');
					$v_pan_spoc                       =   time().rand(3,999).'_'.$_FILES['v_pan_spoc']['name'];
					$config['charset']          =   "UTF-8";
					$config['upload_path']      =    $path;
					$config['allowed_types']    =   'gif|jpg|png';
					$config['file_name']        =    $v_pan_spoc;
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('v_pan_spoc'))
					{
						$data['error_msg']   = $this->upload->display_errors();
						
					}
				   
				}
				 if(isset($_FILES['v_address_proff_spoc']['name']) && !empty($_FILES['v_address_proff_spoc']['name'])) 
				{
					$path='./assets/vendor_image/';
					$this->load->library('upload');
					$v_address_proff_spoc                       =   time().rand(3,999).'_'.$_FILES['v_address_proff_spoc']['name'];
					$config['charset']          =   "UTF-8";
					$config['upload_path']      =    $path;
					$config['allowed_types']    =   'gif|jpg|png';
					$config['file_name']        =    $v_address_proff_spoc;
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('v_address_proff_spoc'))
					{
						$data['error_msg']   = $this->upload->display_errors();
						
					}
				   
				}
				 if(isset($_FILES['v_registration']['name']) && !empty($_FILES['v_registration']['name'])) 
				{
					$path='./assets/vendor_image/';
					$this->load->library('upload');
					$v_registration                       =   time().rand(3,999).'_'.$_FILES['v_registration']['name'];
					$config['charset']          =   "UTF-8";
					$config['upload_path']      =    $path;
					$config['allowed_types']    =   'gif|jpg|png';
					$config['file_name']        =    $v_registration;
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('v_registration'))
					{
						$data['error_msg']   = $this->upload->display_errors();
						
					}
				   
				}
				 if(isset($_FILES['v_owner_academic']['name']) && !empty($_FILES['v_owner_academic']['name'])) 
				{
					$path='./assets/vendor_image/';
					$this->load->library('upload');
					$v_owner_academic                       =   time().rand(3,999).'_'.$_FILES['v_owner_academic']['name'];
					$config['charset']          =   "UTF-8";
					$config['upload_path']      =    $path;
					$config['allowed_types']    =   'gif|jpg|png';
					$config['file_name']        =    $v_owner_academic;
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('v_owner_academic'))
					{
						$data['error_msg']   = $this->upload->display_errors();
						
					}
				   
				}
				if(isset($_FILES['v_tin_entity']['name']) && !empty($_FILES['v_tin_entity']['name'])) 
				{
					$path='./assets/vendor_image/';
					$this->load->library('upload');
					$v_tin_entity                       =   time().rand(3,999).'_'.$_FILES['v_tin_entity']['name'];
					$config['charset']          =   "UTF-8";
					$config['upload_path']      =    $path;
					$config['allowed_types']    =   'gif|jpg|png';
					$config['file_name']        =    $v_tin_entity;
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('v_tin_entity'))
					{
						$data['error_msg']   = $this->upload->display_errors();
						
					}
				   
				}
				if(isset($_FILES['v_adhar']['name']) && !empty($_FILES['v_adhar']['name'])) 
				{
					$path='./assets/vendor_image/';
					$this->load->library('upload');
					$v_adhar                       =   time().rand(3,999).'_'.$_FILES['v_adhar']['name'];
					$config['charset']          =   "UTF-8";
					$config['upload_path']      =    $path;
					$config['allowed_types']    =   'gif|jpg|png';
					$config['file_name']        =    $v_adhar;
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('v_adhar'))
					{
						$data['error_msg']   = $this->upload->display_errors();
						
					}
				   
				}
				 if(isset($_FILES['v_bank']['name']) && !empty($_FILES['v_bank']['name'])) 
				{
					$path='./assets/vendor_image/';
					$this->load->library('upload');
					$v_bank                       =   time().rand(3,999).'_'.$_FILES['v_bank']['name'];
					$config['charset']          =   "UTF-8";
					$config['upload_path']      =    $path;
					$config['allowed_types']    =   'gif|jpg|png';
					$config['file_name']        =    $v_bank;
					$this->upload->initialize($config);
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload('v_bank'))
					{
						$data['error_msg']   = $this->upload->display_errors();
						
					}
				   
				}

				// write session here

				$vendorData = array(
					'nature_of_vendor'=>$postData['nature_of_vendor'],
					'vendor_name'=>$postData['vendor_name'],
					'email'=>$postData['email'],
					'moblie_1'=>$postData['moblie_1'],
					'moblie_2'=>$postData['moblie_2'],
					'landline'=>$postData['landline'],
					'vendor_spoc'=>$postData['vendor_spoc'],
					'location_vendor'	=> json_encode(array('city'=>array_filter($city),'area_id'=>array_filter($area_id),'address'=>array_filter($address),'pin_code'=>array_filter($pin_code),'nature_of_location'=>array_filter($nature_of_location),'location_other'=>array_filter($location_other))),
					'service_id'=>implode(",",$postData['service_id']),
					'year_of_establishment'=>$postData['year_of_establishment'],
					'age_min'=>$postData['age_min'],
					'age_max'=>$postData['age_max'],
					'hourly_min'=>$postData['hourly_min'],
					'hourly_max'=>$postData['hourly_max'],
					'monthly_min'=>$postData['monthly_min'],
					'monthly_max'=>$postData['monthly_max'],
					'v_facebook'=>$postData['v_facebook'],
					'v_linkedin'=>$postData['v_linkedin'],
					'v_google_plus'=>$postData['v_google_plus'],
					'v_status'=>$postData['v_status'],
					'description'=>$postData['description'],
					'vendor_images'=>isset($file_name_image)?json_encode($file_name_image):$vendor['result']['vendor_images'],
					'vendor_logo'=>isset($vendor_logo)?$vendor_logo:$vendor['result']['vendor_logo'],
					'v_pan_entity'=>isset($v_pan_entity)?$v_pan_entity:$vendor['result']['v_pan_entity'],
					'v_pan_spoc'=>isset($v_pan_spoc)?$v_pan_spoc:$vendor['result']['v_pan_spoc'],
					'v_address_proff_spoc'=>isset($v_address_proff_spoc)?$v_address_proff_spoc:$vendor['result']['v_address_proff_spoc'],
					'v_registration'=>isset($v_registration)?$v_registration:$vendor['result']['v_registration'],
					'v_owner_academic'=>isset($v_owner_academic)?$v_owner_academic:$vendor['result']['v_owner_academic'],
					'v_tin_entity'=>isset($v_tin_entity)?$v_tin_entity:$vendor['result']['v_tin_entity'],
					'v_adhar'=>isset($v_adhar)?$v_adhar:$vendor['result']['v_adhar'],
					'v_bank'=>isset($v_bank)?$v_bank:$vendor['result']['v_bank'],

				);
			   
				//pr($vendorData);die;
				
				$result  = $this->account_mod->update_vendor($id,$vendorData);
				redirect(base_url('admin/vendor/final_edit/'.ID_encode($id))); 

            }
		}
		
		
        $data['title'] = "C3 || Vendor";
        $data['breadcum'] = array("" => "Vendor", "" => "Edit Vendor");
        $page = 'vandor/edit';
        $data['page'] = $page;
        _layout($data);
    }
	
	
	public function final_edit($id) {
		
		$id = ID_decode($id);
		$Vqry = $this->db->select('id')->get_where('vendor_details', array('id' => $id));
		
		 if($Vqry->num_rows() == 0){
			 $this->session->set_flashdata('vendor_create', 'Vendor details does not exists.');
			 redirect(base_url('admin/vendor'));
		 }
		 
        if(empty($id)){
            redirect(base_url('admin/vendor/add')); 
        }
		
        if(isPostBack()) {
			$postData		= $this->input->post();
			$result  = $this->account_mod->update_vendor($id,$postData);
			if($result){
				$this->session->set_flashdata('item','Your profile has been updated successfully');
				redirect(base_url('admin/vendor'));
			}
			else{
				$this->session->set_flashdata('item','Your profile has not been updated successfully');
				redirect(base_url('admin/vendor'));
			}
		}
		
		$vendor = $this->account_mod->get_vendor($id);
        $data["result"] = $vendor['result'];
		
        $data['title'] = "C3 || Vendor";
        $data['breadcum'] = array("" => "Vendor", "" => "Vendor Final Edit");
        $page = 'vendor/final_edit';
        $data['page'] = $page;
        _layout($data);
    }
	public function isUniqueEmailEdit($id) {
				
		
		if($id){
			$this->db->select('*');
			$this->db->from('vendor_details');
			$this->db->where("id",ID_decode($id));
			$user_id = $this->db->get()->row()->user_id;
		}
		
		$email = $this->input->get('email');
		
		$this->db->select('*');
        $this->db->from('users');
		if(isset($user_id)){
			$this->db->where("id !=",$user_id);
			$this->db->where("email",$email);
		}
		$query = $this->db->get()->result();
        //$query = $this->db->get_where('users', array('email' => $email))->result();
        if (count($query) > 0) {
            echo "false";
        } else {
            echo "true";
        }
    }
	
	public function getAreaName() {
        if (isPostBack()) {
            $city_id = $this->input->post('city_id');
            $data = $this->db->get_where('area_master', ['city_id' => $city_id,'status'=>'active'])->result();
           
            $option = '<option value="">Select Area Name</option>';
            if(!empty($data)){
               foreach($data as $area){
                    $option .= '<option value="'.$area->id.'">'.$area->area_name.'</option>';
                }  
            }
           

            echo $option;
        }
    }
	
	function deleteImage(){
		$newArr = $this->session->userdata('vendorData');
		if (isPostBack()) {
            $filename = $this->input->post('name');
           $path='./assets/vendor_image/';
            if (file_exists($path.$filename)) {
				$image = json_decode($newArr['vendor_images']);
				$imageArr = array();
				foreach($image as $img){
					if($filename != $img){
						array_push($imageArr,$img); 
					}
				}
				if(in_array($filename,$image)){
					$newArr['vendor_images'] = json_encode($imageArr);
				}
				$newArr = array_diff($newArr, array($filename));
				
				$this->session->set_userdata("vendorData", $newArr);
				unlink($path.$filename);
				return true;
			} 
        }
	}
}
