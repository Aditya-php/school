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
class Admin_testmonial extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
       $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('13');
        $this->load->model('admin_testmonial_mod');
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
        $data['title'] = "C3 || Testimonial";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'testmonial/listing';
        $data['page'] = $page;
        _layout($data);
    }
    

	
		 public function view($id = null) {
       
	 
        if ($id != NULL) {
            $id = ID_decode($id); 
        }
		
		 $data['data1'] = $this->admin_testmonial_mod->get_data($id);
		

        $data["result"] = array();
        $data['title'] = "C3 || Testimonial";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'testmonial/view';
        $data['page'] = $page;
        _layout($data);
    }
	
	
	
	
	   function testmonial_list_ajax(){

          $res=$this->admin_testmonial_mod->testmonial_list_ajax(); 
          echo json_encode($res);
    }
	
    
	 public function  approve($id=null,$curr_status)
	{
		
		if($id!='')
		{
			$result = $this->admin_testmonial_mod->change_status(ID_decode($id),$curr_status);
			$msg=($result) ? "Testimonial updated successfully" : "Database error try agian";	
		}else{
			$msg="Unable to update,Id not found";
		}
		$this->session->set_flashdata('account_create', $msg);
		 redirect('admin/admin_testmonial') ; 
	 
	}
  
   	 public function  change_status_multiple()
	{
		$id = $this->input->post('id',true);
		if(!empty($id))
		{
			$ids=explode(',',$id);//pr($ids);die;
			$curr_status=$this->input->post('curr_status');
            $this->db->where_in('id',$ids);
			$result = $this->db->set('status',$curr_status)->update('testimonial'); // echo $this->db->last_query(); die;   
			echo ($result) ? 1 : 0;	die;
		}else{
			echo 0; die;
		}
		
	 
	}

		public function  multi_delete()
	{
		$id = $this->input->post('id');
		if($id!='')
		{
				$result = $this->parents_mod->delete($mytable="users",$id);
			echo 1;
		}else{
			echo 0;
		}
	}
		//=================Download sheet of Payroll input data  sheet========================//
function export_testmonial()
{
   
        $response= $this->admin_testmonial_mod->export_testmonial();
		if(isset($response['AdminTestimonial']) && !empty($response['AdminTestimonial'])){
            $datamrg = array_merge( $response['header'] , $response['AdminTestimonial'] );
            array_to_csv($datamrg,'AdminTestimonial List-'.date('d-m-y H:i:s').'.csv');
        } else {
        $msg=($response!='' && $response!=0) ? 'Admin Testmonial data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
		redirect('admin/parents') ;       
        } 
        
}
//=================Download sheet of Payroll input data  sheet========================//

	

}
