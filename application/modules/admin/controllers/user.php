<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User Controller
 *
 * @package		User
 * @category	User 
 * @author		
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */
class User extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('4');
        $this->load->model('user_mod');
    }

    /**
     * index
     *
     * This function display user dashboar according to USER TYPE
     * 
     * @access	public
     * @return	html data
     */
    public function index() {
        $data["result"] = array();
        $data['title'] = "C3 || User Listing";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'user/listing';
        $data['page'] = $page;
        _layout($data);
    }
    
	
	 function user_list_ajax(){
		 // pr($_POST);die;
          $res=$this->user_mod->user_list_ajax(); //pending loan list
          echo json_encode($res);
        }
	

	 public function add(){

	// pr($_POST);die;
       if (isPostBack()) 
        {
		
        $this->form_validation->set_rules('first_name',"First Name", 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name',"Last Name", 'trim|required|xss_clean');
        $this->form_validation->set_rules('email',"email", 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('role_id',"Role", 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_number',"Mobile No.", 'trim|required|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('status',"Status", 'trim|required|xss_clean');
		$this->form_validation->set_rules('password'," Password", 'trim|required|matches[new_pass]');
		$this->form_validation->set_rules('new_pass',"Confirm Password", 'trim|required|xss_clean');
		
            if ($this->form_validation->run() == false)
            {
				// echo validation_errors();
           $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
            else
            { 	
	          
	           $result=$this->user_mod->add_user();//pr($result);
			 
			 $msg=($response!='' && $response!=0) ? '' :  'Great!! User is created successfully';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/user') ; 
            }
        }
		
		 $qry=$this->db->select('id,name,permissions')->get_where('roles',array('status'=>'1'));
		     $data['role_name'] = ($qry->num_rows()>0)? $qry->result() :array();//pr($data);die;
         $data['title'] = "C3 || Create User";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'user/add';
        $data['page'] = $page;
        _layout($data);

    }
	
	
    public function edit($id = null) {
	
        // $id = $this->input->post('id');
        if ($id != NULL) {
			$id_org=$id;
            $id = ID_decode($id);
			
        }
		
        if(isPostBack())
         {	 
	  //  pr($_POST);die;
	    $this->form_validation->set_rules('first_name',"First Name", 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name',"Last Name", 'trim|required|xss_clean');
        $this->form_validation->set_rules('email',"email", 'trim|required|valid_email|is_unique_edit[users.email]');
        $this->form_validation->set_rules('role_id',"Role", 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_number',"Mobile No.", 'trim|required|xss_clean|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('status',"Status", 'trim|required|xss_clean');
		
		////////////////////////////////////
		if(!empty($this->input->post('password')))
		{
		 $this->form_validation->set_rules('password'," Password", 'trim|required');
		 $this->form_validation->set_rules('new_pass',"New Password", 'trim|required|xss_clean|matches[con_pass]');
		 $this->form_validation->set_rules('con_pass',"Confirm Password", 'trim|required|xss_clean');
		}
		//$this->form_validation->set_rules('password'," Password", 'trim|required');
		//$this->form_validation->set_rules('new_pass',"New Password", 'trim|required|xss_clean|matches[con_pass]');
		//$this->form_validation->set_rules('con_pass',"Confirm Password", 'trim|required|xss_clean');
      ///////////////////////
		if ($this->form_validation->run() == false)
            {
				// echo  validation_errors();die;
				$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
			else{
				 
			    $response = $this->user_mod->save_user($id);
				 
				if($response['status']==1){
					$this->session->set_flashdata('account_create', $response['msg']);
                    redirect('admin/user') ; 
				}else if($response['status']==0){
					$this->session->set_flashdata('account_create', $response['msg']);
                    redirect('admin/user/edit/'.$id_org) ; 
				}
				else{
					$this->session->set_flashdata('account_create', 'Some error,try again');
                    redirect('admin/user') ; 
				}
		      
			}
         }
			$qry=$this->db->select('id,name')->get_where('roles',array('status'=>'1'));
		    $data['role_name'] = ($qry->num_rows()>0)? $qry->result() :array();
		    $data['data1'] = $this->user_mod->get_user_list($id);
			
        $data['title'] = "C3 || Edit user";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'user/edit';
        $data['page'] = $page;
        _layout($data);
		
    }

   public function  delete($id=null)
	{
		
		if($id!='')
		{
			$result = $this->user_mod->delete($mytable="users",ID_decode($id));
			$msg="User deleted successfully";	
		}else{
			$msg="Unable to delete,Id not found";
		}
		$this->session->set_flashdata('account_create', $msg);
		redirect('admin/user') ; 
	 
	}

		public function  multi_delete()
	{
		$all_id = $this->input->post('id',true);
        if(!empty($all_id))
		{
			$ids=explode(',',$all_id);
            $this->db->where_in('id',$ids);
            $result = $this->db->delete("users");
            echo ($result) ? 1 : 0; die;
		}else{
			echo 0; die;
		}
        
	}
		//=================Download sheet of Payroll input data  sheet========================//
function export_user()
{
        $response= $this->user_mod->export_user();
		if(isset($response['userdata']) && !empty($response['userdata'])){
            $datamrg = array_merge( $response['header'] , $response['userdata'] );
            array_to_csv($datamrg,'User List-'.date('d-m-y H:i:s').'.csv');
			//echo "1"; die;
        } else {
        $msg=($response!='' && $response!=0) ? 'Some error, try again':  'User data not found for export......';
		//echo $msg; die;
                $this->session->set_flashdata('account_create', $msg);
		redirect('admin/user') ;       
        } 
        
}
//=================Download sheet of Payroll input data  sheet========================//


}
