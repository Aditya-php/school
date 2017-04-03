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
class Role extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('3');
        $this->load->model('role_mod');
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
        //$data['result'] = array(); $this->city_mod->listing();
        $data['title'] = "C3 || Role Listing";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'role/listing';
        $data['page'] = $page;
        _layout($data);
    }
    function role_list_ajax(){
          $res=$this->role_mod->role_list_ajax(); //pending loan list
          echo json_encode($res);
    }
    public function add() {

        if (isPostBack()) 
        {
			
            $this->form_validation->set_rules('name', 'Role Name', 'trim|required|is_unique[roles.name]');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false)
            {
				
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
            else
            { 
                $response = $this->role_mod->save_role();
                $msg=($response!='' && $response!=0) ? 'Great!! Role is created successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/role') ; 
            }
        }
        $data['title'] = "C3 || Create Role";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'role/add';
        $data['page'] = $page;
        _layout($data);
    }

   

    

    public function edit($id = null) {
        
        if ($id != NULL) {
            $id = ID_decode($id);
        }
        if(isPostBack())
         {
			 
			 $this->form_validation->set_rules('name', 'Role Name', 'trim|required|is_unique_edit[roles.name]');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false)
            {	
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
			else{
				 $response = $this->role_mod->save_role($id);
                $msg=($response!='' && $response!=0) ? 'Great!! Role is updated successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/role') ; 
			}
         }
		  $data['data1'] = $this->role_mod->get_role_list($id);
			// pr($data); die;

        $data['title'] = "C3 || Edit Role";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'role/edit';
        $data['page'] = $page;
        _layout($data);
    }

	
	function permission($id = null)
	{
		   if ($id != NULL) {
            $id = ID_decode($id);
        }
			
		  if(isPostBack())
         {
			    $response = $this->role_mod->save($id);//pr($response);die;
                $msg=($response!='' && $response!=0) ? 'Great!! Role permission is updated successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/role') ; 
		 }
		
		$data['data1'] = $this->role_mod->permission();
	    $roledata = $this->role_mod->get_role_list($id); 
		$data['permission']=(isset($roledata[0]->permissions) && !empty($roledata[0]->permissions)) ?explode(',',$roledata[0]->permissions) : array(); //pr($data['permission']);die;
		
		$data['title'] = "C3 || Permission Role";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'role/permission';
        $data['page'] = $page;
        _layout($data);
 
	} 

   public function  delete($id=null)
   {
		if($id!='')
		{  
		    $count=$this->db->select('id')
                          ->from('users')
                          ->where('role_id',ID_decode($id))  
			              ->count_all_results();
            if($count==0){
              $result = $this->role_mod->delete($mytable="roles",ID_decode($id));
              $msg="Roles deleted successfully";    
            }else{
              $msg="This Role has been already assigned to user,so can't delete this..!!";  
            }              
            
				
		}else{
			$msg="Unable to delete,Id not found";
		}
		$this->session->set_flashdata('account_create', $msg);
		redirect('admin/role') ; 
	 
	}
	public function  multi_delete()
	{
		$all_id = $this->input->post('id',true);
        if(!empty($all_id))
		{
			$ids=explode(',',$all_id);
            $ids=array_filter($ids);
            $qry1=$this->db->select('id,role_id')
                              ->from('users')
                              ->where_in('role_id',$ids)
                              ->get();
            if($qry1->num_rows()>0){
                $role_ids=array_column($qry1->result_array(),"role_id");
                $ids=array_diff($ids,$role_ids);
            }
            if(isset($ids) && !empty($ids)){
             $this->db->where_in('id',$ids);
            $result = $this->db->delete("roles"); 
            echo 1; die;   
            }else if(empty($ids)){
                echo 2; die;
            }else{
                echo 0; die;
            }                    
        }else{
			echo 0; die;
		}
	}
	
	//=================Download sheet of Payroll input data  sheet========================//
function export_role()
{
   
        $response= $this->role_mod->export_role();
		if(isset($response['RoleData']) && !empty($response['RoleData'])){
            $datamrg = array_merge( $response['header'] , $response['RoleData'] );
            array_to_csv($datamrg,'Role List-'.date('d-m-y H:i:s').'.csv');
        } else {
         $msg=($response!='' && $response!=0) ? 'Role data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
		redirect('admin/role') ;       
        } 
        
}
function test($id=null){
    
        $id=34;
        $this->load->model('home/home_mod');
	    $data['vendor_details'] = $this->home_mod->getVendorsDetail($id);
        
		//$data['vdetails'] = $this->home_mod->getVendorsDetail($id);
		$data['page']       = 	'role/test';
		$this->load->view('front_layout', $data);
}
//=================Download sheet of Payroll input data  sheet========================//
 
}
