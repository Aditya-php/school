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
class Admin_notice extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
       $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('10');
		$this->load->model('admin_notice_mod');
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
	    $data['title'] = "C3 || Listing Notice";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'manage_notice/listing';
        $data['page'] = $page;
	 _layout($data);
	}
    
	
     function vendor_list_ajax(){
		  // $parent_id=currUserId(); 
          $res=$this->admin_notice_mod->vendor_list_ajax(); //sssspr($res);die;//pending loan list
          echo json_encode($res);
        }
	
    
	 public function  approve($id=null,$curr_status,$vendor_id=null)
	 {
		if($id!='')
		{
			$qry = $this->admin_notice_mod->change_status(ID_decode($id),$curr_status,$vendor_id);
			
       }else{
			 $msg="Unable to update,Id not found";
		}
	
		 redirect('admin/admin_notice/listing') ; 
	 
	 }

  	
   	 public function  change_status_multiple()
	{
		$id = $this->input->post('id',true);
	    if(!empty($id))
		{
			$ids=explode(',',$id);
			$curr_status=$this->input->post('curr_status');
		    $this->db->where_in('id',$ids);
			$result = $this->db->set('status',$curr_status)->update('vendor_notice'); // echo $this->db->last_query(); die;
			
			if($curr_status==3){
			 $data = $this->admin_notice_mod->send_notice_mail($ids);
			 // pr($data);die;
			}
			echo ($result) ? 1 : 0;	die;
		}else{
			echo 0; die;
		}
		
	 
	}

		//=================Download sheet of Payroll input data  sheet========================//
function export_notice()
{
   
        $response= $this->admin_notice_mod->export_notice();
		if(isset($response['AdminNotice']) && !empty($response['AdminNotice'])){
            $datamrg = array_merge( $response['header'] , $response['AdminNotice'] );
            array_to_csv($datamrg,'AdminNotice List-'.date('d-m-y H:i:s').'.csv');
        } else {
        $msg=($response!='' && $response!=0) ? 'Admin Notice data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
	 redirect('admin/admin_notice/listing') ;        
        } 
        
}
//=================Download sheet of Payroll input data  sheet========================//



}
