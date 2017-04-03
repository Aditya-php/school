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
class Admin_invoice extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
       $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('9');
        $this->load->model('admin_invoice_mod');
    }

    /**
     * index
     *
     * This function display user dashboar according to USER TYPE
     * 
     * @access	public
     * @return	html data
     */
	function listing(){
	    $data['title'] = "C3 || Listing Invoice";
        $data['breadcum'] = array("" => " ", "" => " ");
        $page = 'manage_invoice/listing';
        $data['page'] = $page;
	 _layout($data);
	}
 
	  function invoice_list_ajax(){
		  // echo "dsfvsdf";die;
		  // $parent_id=currUserId(); 
          $res=$this->admin_invoice_mod->invoice_list_ajax(); //pr($res);die;//pending loan list
          echo json_encode($res);
    }
	
    
		//=================Download sheet of Payroll input data  sheet========================//
function export_invoice()
{
   
        $response= $this->admin_invoice_mod->export_invoice();
		if(isset($response['AdminInvoice']) && !empty($response['AdminInvoice'])){
            $datamrg = array_merge( $response['header'] , $response['AdminInvoice'] );
            array_to_csv($datamrg,'AdminInvoice List-'.date('d-m-y H:i:s').'.csv');
        } else {
        $msg=($response!='' && $response!=0) ? ' Admin Invoice data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
	 redirect('admin/admin_invoice/listing') ;        
        } 
        
}
//=================Download sheet of Payroll input data  sheet========================//

	public function  multi_delete()
	{
		$all_id = $this->input->post('id',true);
        if(!empty($all_id))
		{
			$ids=explode(',',$all_id);
            $this->db->where_in('id',$ids);
            $result = $this->db->delete("vendor_invoice");
           // echo $this->db->last_query(); die;
            echo 1; die;
		}else{
			echo 0; die;
		}
	}
	
	
   	 public function  change_status_multiple()
	{
		$id = $this->input->post('id',true);
		if(!empty($id))
		{
			$ids=explode(',',$id);//pr($ids);die;
			$curr_status=$this->input->post('curr_status');
            $this->db->where_in('id',$ids);
			$result = $this->db->set('approval_status',$curr_status)->update('vendor_invoice'); // echo $this->db->last_query(); die;   
			echo ($result) ? 1 : 0;	die;
		}else{
			echo 0; die;
		}
		
	 
	}
	 public function  approve($id=null,$curr_status)
	{
		if($id!='')
		{
			$result = $this->admin_invoice_mod->change_status(ID_decode($id),$curr_status);
			$msg=($result) ? "Invoice updated successfully" : "Database error try agian";	
		}else{
			$msg="Unable to update,Id not found";
		}
		$this->session->set_flashdata('account_create', $msg);
		 redirect('admin/admin_invoice/listing') ; 
	 
	}
	
	
	 	 // public function  change_paid_status()
	// {
		// $id = $this->input->post('id',true);
		// if(!empty($id))
		// {
			// $ids=explode(',',$id);//pr($ids);die;
			// $curr_status=$this->input->post('curr_status');
            // $this->db->where_in('id',$ids);
			// $result = $this->db->set('invoice_status',$curr_status)->update('vendor_invoice'); // echo $this->db->last_query(); die;   
			// echo ($result) ? 1 : 0;	die;
		// }else{
			// echo 0; die;
		// }
		
	 
	// }
		 // public function  paid_status($id=null,$curr_status)
	// {
		// if($id!='')
		// {
			// $result = $this->admin_invoice_mod->paid_status(ID_decode($id),$curr_status);
			// $msg=($result) ? "Testmonial status update successfully" : "Database error try agian";	
		// }else{
			// $msg="Unable to update,Id not found";
		// }
		// $this->session->set_flashdata('account_create', $msg);
		 // redirect('admin/admin_invoice/listing') ; 
	 
	// }


}