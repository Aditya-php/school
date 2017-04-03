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
class Appointment extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('8');
        $this->load->model('appointment_mod');
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
		$data['all_users'] = $this->appointment_mod->fetchAdmin();
		// $data['remark'] = $this->appointment_mod->fetchAppoint();pr($data['remark']);die;
		$data["result"] = array();
        $data['title'] = "C3 || Appointment";
        $data['breadcum'] = array("" => "", "" => " ");
	    $page = 'appointments/listing';
        $data['page'] = $page;
        _layout($data);
    }
    
	
	   function appointment_list_ajax(){
          $res=$this->appointment_mod->appointment_list_ajax(); 
          echo json_encode($res);
    }
	

    

   
		//=================Download sheet of Payroll input data  sheet========================//
function export_appointment()
{
   
        $response= $this->appointment_mod->export_appointment();
		if(isset($response['AppointmentData']) && !empty($response['AppointmentData'])){
            $datamrg = array_merge( $response['header'] , $response['AppointmentData'] );
            array_to_csv($datamrg,'Appointment List-'.date('d-m-y H:i:s').'.csv');
        } else {
       $msg=($response!='' && $response!=0) ? 'Appointment data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
		redirect('admin/appointment') ;       
        } 
        
}
//=================Download sheet of Payroll input data  sheet========================//

  public function assign($id = null) {
	   
         if (isPostBack()) 
            {
			 $user_id=$this->input->post('assign_to',true);
			 $app_id=$this->input->post('appoint_id',true);
			    if($user_id!='' && $app_id!='')
				{
			   $qry= $this->db->update('appointment_schedular',array('assign_to'=>$user_id,'modifiled'=>date('Y-m-d h:i:s')),array('id'=>ID_decode($app_id)));
           	    }
				if($qry){
				$info=	$this->db->select('u.first_name,u.last_name,u.email,u.contact_number,a.schedule_time,v.vendor_name')
							 ->from('appointment_schedular a')
							 ->join('users u','u.id=a.user_id')
							 ->join('vendor_details v','v.id=a.vendor_id')
							 ->where('a.id',ID_decode($app_id))
							 ->get();	
						 
				$vendor_info =	 ($info->num_rows()>0) ? $info->row() : array();
			    $sql = $this->db->select('id,first_name,email')
	                ->from('users u')
					->where('user_type',2)
					->where('id',$user_id)
					->where('status','active')
					 ->get();
					$result =   ($sql->num_rows()>0) ? $sql->result() : array();
					
		    	if(!empty($result) && !empty($vendor_info)){
                $email = $result[0]->email;
			
	
                $email_data['to']           =   $email;
                $email_data['from']         =   ADMIN_EMAIL;
                $email_data['sender_name']  =   ADMIN_NAME;
                $email_data['subject']      =   "Appointment Asign";
                $email_data['message']      =   array('header' => "New Lead Assignment!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;">Hello'."&nbsp;".ucwords($result[0]->first_name).',<br>
				<br>You have assigned a new lead, please find the details below:<br>
				<span style=" color:#000">Parent Name:'."&nbsp;&nbsp;&nbsp;&nbsp;".ucwords($vendor_info->first_name).'</span><br><span style=" color:#000">Parent Email:'."&nbsp;&nbsp;&nbsp;&nbsp;".$vendor_info->email.'</span><br><span style=" color:#000">Scheduled Date & Time:'."&nbsp;&nbsp;&nbsp;&nbsp;".$vendor_info->schedule_time.'</span><br><span style=" color:#000">Vendor Name:'."&nbsp;&nbsp;&nbsp;&nbsp;".ucwords($vendor_info->vendor_name).'</span><br><br>Regards,<br>Team C3<br><span style="color:#000;">');
			   _sendEmailNew($email_data); 
                  }
				}
				echo ($qry) ? 1 : 0;
			 }
	 }
	 // You have assigned a new lead, please find the details below:
	 // parent Name:
	 // Parent Id: 
	 // Scheduled Date & time:
	 // Vendor Name:
	 // Parent Email:
	 // Regards,
	 // Team C3
	 
	    public function status($id = null) {
			// echo "hii";
			
		 if (isPostBack()) 
            {
              
			 $user_status=$this->input->post('appointment_status',true);
			 $status_id=$this->input->post('status_id',true);//pr($user_status);die;
			 if($user_status!='' && $status_id!='')
			{
			    $kid_ids=($this->input->post('kid_id')) ? implode(",",$this->input->post('kid_id')) : "";
				if($user_status==3 || $user_status==1)
                {
				    
            		 $info=	$this->db->select('a.modifiled as session_start_date,u.first_name,u.last_name,u.email as uemail,u.contact_number,a.schedule_time,v.email as vemail,v.vendor_name')
            							 ->from('appointment_schedular a')
            							 ->join('users u','u.id=a.user_id')
            							 ->join('vendor_details v','v.id=a.vendor_id')
            							 ->where('a.id',ID_decode($status_id))
            							 ->get();	 
        							 // echo $this->db->last_query();die;
        	         $vendor_info =	 ($info->num_rows()>0) ? $info->result() : array();
        		     if(!empty($vendor_info))
                     {
						       $parentFullName = $vendor_info[0]->first_name.'   '.$vendor_info[0]->last_name;
							   
        		                $vendor_info[0]->session_start_date=date('d-M-Y h:i:s A',strtotime($vendor_info[0]->session_start_date));
								
								$vendor_info[0]->schedule_time=date('d-M-Y h:i:s A',strtotime($vendor_info[0]->schedule_time));
								$email = $vendor_info[0]->uemail;
								
                			    $email_data['to']   				=   $email;
                                $email_data['from']         =   ADMIN_EMAIL;
                                $email_data['sender_name']  =   ADMIN_NAME;

                                
                				if($user_status==3) //closed to parent
                                {
                                    $email_data['subject']      =   "Congratulations! on Vendor Assignment";
                                    $email_data['message']      =   
		                             array('header' => "Congratulations! on Vendor Assignment",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;"><b>Hello'."&nbsp;".ucwords($parentFullName).'</b><b>,</b></span><br>
		                          	<span style=" color:#000">Congratulations!    Vendor has been assigned successfully.Kindly find the details below:<br/></span></br>
									<span style=" color:#000"><b>Vendor Name:</b>'."&nbsp;&nbsp;&nbsp;&nbsp;".ucwords($vendor_info[0]->vendor_name).'</span><br>
									<span style=" color:#000"><b>Vendor Email:</b>'."&nbsp;&nbsp;&nbsp;&nbsp;".ucwords($vendor_info[0]->vemail).'</span><br>
									<span style=" color:#000"><b>Session Start Date & Time:</b>'."&nbsp;&nbsp;&nbsp;&nbsp;".$vendor_info[0]->session_start_date.'</span><br>
									<br><b>Regards,</b><br><b>Team C3</b><br><span style="color:#000;">');
                    			    _sendEmailNew($email_data); 
                				}
                                else if($user_status==1) //confirm to parent
                                {
                					$email_data['subject']      =   "Appointment Schedule Confirmation";
                                    $email_data['message']      =   array('header' => " Appointment Schedule Confirmation!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;">
									<b>Hello'."&nbsp;".ucwords($parentFullName).'</b><b>,</b></span><br><span style=" color:#000">Your appointment with'."&nbsp;".ucwords($vendor_info[0]->vendor_name).' has been confirmed on '."&nbsp;".$vendor_info[0]->schedule_time.'</span>.<br><br><br><b>Regards,</b<br><b>Team C3</b><br><span style="color:#000;">');
                			        _sendEmailNew($email_data); 
                				}
                			   // mail send to vendor..................//
                			 
                			   	$email1 = $vendor_info[0]->vemail; 
                				$email_data['to']   				= $email1;
                                $email_data['from']         =   ADMIN_EMAIL;
                                $email_data['sender_name']  =   ADMIN_NAME;
                                if($user_status==3)  //closed to vendor
                                {   
								  if($this->input->post('kid_id')){
									 $kid_id_array=$this->input->post('kid_id'); 
									 $kid_dets=$this->db->select('name')
											  ->from('kids')
											  ->where_in('id',$kid_id_array)
											  ->get();	
// pr($kid_dets);die;											  
									 if($kid_dets->num_rows()>0){
										 $k=0;$kids_html='';
										 foreach($kid_dets->result() as $rec){
											 $kids_html.='<span style=" color:#000"><b>'.++$k.'</b>'."&nbsp;&nbsp;&nbsp;&nbsp;".ucwords($rec->name).'</span><br>';
										 }
									 } 		  
								  }
								
								    $email_data['subject']      =   "Congratulations! on Kids Assignment";
                                    $email_data['message']      =  
									array('header' => "Congratulations! on Kids Assignment",
									'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;"><b>Hello'."&nbsp;".ucwords($vendor_info[0]->vendor_name).'</b><b>,</b></span><br>
									<span style=" color:#000">Congratulations! kid has been assigned successfully<b>.</b>Kindly find the details below:<br/></span></br>
									<span style=" color:#000"><b>Kid Name:</b><br>'."".ucwords($kids_html).'</span><br>
									<span style=" color:#000"><b>Parent Name:</b>'."&nbsp;&nbsp;&nbsp;&nbsp;".ucwords($parentFullName).'</span><br>
									<span style=" color:#000"><b>Parent Email:</b>'."&nbsp;&nbsp;&nbsp;&nbsp;".ucwords($vendor_info[0]->uemail).'</span><br>
									<span style=" color:#000"><b>Session Start Date & Time:</b>'."&nbsp;&nbsp;&nbsp;&nbsp;".$vendor_info[0]->session_start_date.'</span><br>
									<br><b>Regards,</b><br><b>Team C3</b><br><span style="color:#000;">');
                    			    _sendEmailNew($email_data); 
                    			  
                			    }
                                else if($user_status==1) //confirm to vemdor
                                {
                				  $email_data['subject']      =   "Appointment Schedule Confirmation";
                                  $email_data['message']      =   array('header' => " Appointment Schedule Confirmation!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;"><b>Hello'."&nbsp;".ucwords($vendor_info[0]->vendor_name).'</b><b>,</b></span><br><span style=" color:#000">Your appointment with'."&nbsp;".ucwords($parentFullName).' has been confirmed on '."&nbsp;".$vendor_info[0]->schedule_time.'</span>.<br><br><br><b>Regards,</b><br><b>Team C3</b><br><span style="color:#000;">');
                			     _sendEmailNew($email_data);   
                			    }
                      }	
        			 if($user_status == 3){
                        $kid_id_array=$this->input->post('kid_id');  
        				$parent_id= ($this->input->post('parent_id')) ? $this->input->post('parent_id') : ""; 
        				foreach($kid_id_array as $assigned_kid_ids)
        				        {
        						   $this->db->insert("admin_view_logs",array("app_sc_id"=>ID_decode($status_id),"appointment_status"=>'3',"kid_id"=>$assigned_kid_ids,"parent_id"=>$parent_id,"start_date"=>date('Y-m-d h:i:s')));					 
        						}
                            $this->db->where('user_id',$parent_id);
        				    $updb=array('appointment_status'=>$user_status,'assigned_kid_ids'=>$kid_ids,'modifiled'=>date('Y-m-d h:i:s'));
        				   }else{
        				    $updb=array('appointment_status'=>$user_status);
        				   }
                  }
				  else{
				    $updb=array('appointment_status'=>$user_status);
				   }
				   $qry= $this->db->update('appointment_schedular',$updb,array('id'=>ID_decode($status_id)));
			   }
				echo ($qry) ? 1 : 0;
			 }
	  }
      
 function find_kids_detail(){
       $res='';
       $parent_id=$this->input->post('parent_id',true);
       if(!empty($parent_id)){
          $res= $this->appointment_mod->find_kids_detail($parent_id);
       }
       echo $res; die;  
 } 

function remarkData($app_id = null)
	{
		 // pr($_POST);die;
		 $app_id = $this->input->post('app_id',true);
		$sql=$this->db->select('remarks')
                          ->from('appointment_schedular')
						  ->where('id',ID_decode($app_id))
						  ->get();
						  // echo $this->db->last_query();die;
		 $data =  ($sql->num_rows()>0) ? $sql->row() : array();
		 echo  $data->remarks;//die;
}

}
