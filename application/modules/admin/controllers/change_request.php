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
class Change_request extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
       $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('11');
        $this->load->model('change_request_mod');
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
        $page = 'vendor_change_request/listing';
        $data['page'] = $page;
        _layout($data);
    }
    
 function request_list_ajax(){

          $res=$this->change_request_mod->request_list_ajax(); 
		  // pr(          $res);die;
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


		//=================Download sheet of Payroll input data  sheet========================//
function export_request()
{
   
        $response= $this->change_request_mod->export_request();
		if(isset($response['VendorChangeRequest']) && !empty($response['VendorChangeRequest'])){
            $datamrg = array_merge( $response['header'] , $response['VendorChangeRequest'] );
            array_to_csv($datamrg,'VendorChangeRequest List-'.date('d-m-y H:i:s').'.csv');
        } else {
        $msg=($response!='' && $response!=0) ? 'Vendor Change Request data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
		redirect('admin/change_request') ;       
        } 
        
}
//=================Download sheet of Payroll input data  sheet========================//

	/*
     @aditya
	*/
	public function change_request_approve()
	{
		 $action=$this->input->post("action",true);
		 if(!empty($action))
		 {
		 $vendor_change_request_id=$this->input->post("vendor_change_request_id",true);
		 
		 $vendor_id=$this->input->post("vendor_id",true);
		 
		 $assign_date=$this->input->post('assign_date');
		 
		 
		 $vendor_change_request=$this->db->select("app_sc_id, kid_id, parent_id,request_type")->from("vendor_change_request")->where("id",$vendor_change_request_id)->get()->row();
		 
		 
		 $request_type=$vendor_change_request->request_type;
		 if($request_type=='1')
		 {
				 if($this->db->insert("appointment_schedular",array("user_id"=>$vendor_change_request->parent_id,"vendor_id"=>$vendor_id,"appointment_status"=>6,"assigned_kid_ids"=>$vendor_change_request->kid_id,'modifiled'=>date('Y-m-d h:i:s'))))
				 {
						$replace_kid_array=array($vendor_change_request->kid_id);

						$assigned_kid=$this->db->select("assigned_kid_ids")->from("appointment_schedular")->where("id",$vendor_change_request->app_sc_id)->get()->row()->assigned_kid_ids;

						$kid_id_array=explode(",",$assigned_kid);
						$kid_id_array=array_diff($kid_id_array,$replace_kid_array);
						
						if(!empty($kid_id_array)){
						   $all_kids_str=implode(",",$kid_id_array);	
						}
						else
						{
							$all_kids_str='';
						}
						////
						$this->db->update("appointment_schedular",array('assigned_kid_ids'=>$all_kids_str,'modifiled'=>date('Y-m-d h:i:s')),array("id"=> $vendor_change_request->app_sc_id));
						///vendor change_request status change pedning to approved
						$this->db->update('vendor_change_request',array('status'=>3),array('id'=>$vendor_change_request_id));
						//change:$vendor_change_request->kid_id
						$this->db->update('vendor_change_request',array('status'=>2),array('kid_id'=>$vendor_change_request->kid_id, 'status'=>'1'));
						
						///admin view log entry for cancel
							//$this->db->insert("admin_view_logs",array('app_sc_id'=>$vendor_change_request->app_sc_id,'appointment_status'=>'7','kid_id'=>$vendor_change_request->kid_id,'parent_id'=>$vendor_change_request->parent_id,'cdate'=>'now()'));
						 $this->db->update('admin_view_logs',array('appointment_status'=>'7','cdate'=>date('Y-m-d h:i:s')),array('app_sc_id'=>$vendor_change_request->app_sc_id,'kid_id'=>$vendor_change_request->kid_id));
						///admin view log entry for approved
						
						$new_app_sc_id=$this->db->select('max(id) as max_id')->from('appointment_schedular')->get()->row()->max_id;

						$assign_date=date('Y-m-d h:i:s',strtotime($assign_date));
						$this->db->insert("admin_view_logs",array("app_sc_id"=>$new_app_sc_id,"appointment_status"=>'6',"kid_id"=>$vendor_change_request->kid_id,"parent_id"=>$vendor_change_request->parent_id,'start_date'=>$assign_date));
					   
				 }//end insert if 
				 $msg="Change Request is approved successfully";
				 
		 }//end request_type if
		 else if($request_type=='2')
		 {
			  $replace_kid_array=array($vendor_change_request->kid_id);

						$assigned_kid=$this->db->select("assigned_kid_ids")->from("appointment_schedular")->where("id",$vendor_change_request->app_sc_id)->get()->row()->assigned_kid_ids;

						$kid_id_array=explode(",",$assigned_kid);
						$kid_id_array=array_diff($kid_id_array,$replace_kid_array);
						
						if(!empty($kid_id_array)){
						   $all_kids_str=implode(",",$kid_id_array);	
						}
						else
						{
							$all_kids_str='';
						}
						////removing kid from appointment schedular
						$this->db->update("appointment_schedular",array('assigned_kid_ids'=>$all_kids_str,'modifiled'=>date('Y-m-d h:i:s')),array("id"=> $vendor_change_request->app_sc_id));
						///vendor change_request status change pedning to approved
						$this->db->update('vendor_change_request',array('status'=>3),array('id'=>$vendor_change_request_id));
						//change:$vendor_change_request->kid_id
						$this->db->update('vendor_change_request',array('status'=>2),array('kid_id'=>$vendor_change_request->kid_id, 'status'=>'1'));
						
						///update view log to set cancel date and appointment status=8(it's similar to cancel) 
						
						$this->db->update('admin_view_logs',array('appointment_status'=>'8','cdate'=>date('Y-m-d h:i:s')),array('app_sc_id'=>
						
						$vendor_change_request->app_sc_id,'kid_id'=>$vendor_change_request->kid_id));
						
			  $msg="Discontinue Request is approved successfully";
		 }///end request_type else
		 //appointment_schedular
		 $this->session->set_flashdata("msg",$msg);
		 }//end empty if 
		 redirect('admin/change_request');
	
	}//end method
   public function change_request_disapprove($change_request_id)
    {
		$this->db->update("vendor_change_request",array('status'=>'2'),array("id"=>ID_decode($change_request_id)));		 
		///change start
		$kid_id=$this->db->select("kid_id")->from("vendor_change_request")->where("id",ID_decode($change_request_id))->get()->row()->kid_id;
		$this->db->update('vendor_change_request',array('status'=>2),array('kid_id'=>$kid_id, 'status'=>'1'));
		//
		$this->session->set_flashdata("msg","Change Request is Disapproved successfully");
		redirect('admin/change_request');
    }   
}
