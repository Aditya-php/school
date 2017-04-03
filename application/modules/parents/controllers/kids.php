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
class Kids extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
       $user_type=array('3'); //allowed user type to access
        is_protect($user_type);
       $this->load->model('kids_mod');
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
		
		// $alldata = $this->session->all_userdata("userinfo"); 
	// $id1=$alldata['userinfo']->id;//pr($id1);die;
	// pr($_POST);die;
        if (isPostBack()) 
        {
			
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('dob', 'DOB', 'trim|required');
			$this->form_validation->set_rules('age', 'Age', 'trim|required');
			$this->form_validation->set_rules('liking', 'Liking', 'trim|required');
			$this->form_validation->set_rules('disliking', 'Disliking', 'trim|required');
			$this->form_validation->set_rules('scared_of', 'Scared Of', 'trim|required');
			$this->form_validation->set_rules('allergic_to', 'Allergic To', 'trim|required');
			$this->form_validation->set_rules('doctor_name', 'Doctor Name', 'trim|required');
			$this->form_validation->set_rules('doc_con_num', 'Doctor Contact Number', 'trim|required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
            if ($this->form_validation->run() == false)
            {
				
           $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
            else
            { 	
	
	            $response = $this->kids_mod->save_kids();//pr($response );die;
                $msg=($response!='' && $response!=0) ? 'Great!! kids is created successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
              redirect('parents/kids/kid_listing') ; 
            }
        }
        $data["result"] = array();
        $data['title'] = "C3 || kids";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'parent/kid';
        $data['page'] = $page;
        _layout_parent($data);
    }
	
	
	
     function kid_list_ajax(){
		  $parent_id=currUserId(); 
          $res=$this->kids_mod->kid_list_ajax($parent_id); //sssspr($res);die;//pending loan list
          echo json_encode($res);
    }
	
    public function kid_listing() {
		$parent_id=currUserId(); 
		$data['data1'] = $this->kids_mod->export($parent_id);
        $data["result"] = array();
        $data['title'] = "C3 || Kids";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'parent/kid_listing';
        $data['page'] = $page;
        _layout_parent($data);
    }
	
	 public function edit($id = null) {
       
	 
        if ($id != NULL) {
            $id = ID_decode($id); 
        }
        if(isPostBack())
         {
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('dob', 'DOB', 'trim|required');
			$this->form_validation->set_rules('age', 'Age', 'trim|required');
			$this->form_validation->set_rules('liking', 'Liking', 'trim|required');
			$this->form_validation->set_rules('disliking', 'Disliking', 'trim|required');
			$this->form_validation->set_rules('scared_of', 'Scared Of', 'trim|required');
			$this->form_validation->set_rules('allergic_to', 'Allergic To', 'trim|required');
			$this->form_validation->set_rules('doctor_name', 'Doctor Name', 'trim|required');
			$this->form_validation->set_rules('doc_con_num', 'Doctor Contact Number', 'trim|required|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			
            if ($this->form_validation->run() == false)
            {	
            $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
			else{
				 $response = $this->kids_mod->save_kids($id);
                $msg=($response!='' && $response!=0) ? 'Great!! Kid information is updated successfully.' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('parents/kids/kid_listing') ; 
			}
         }
		 $data['data1'] = $this->kids_mod->get_kid_list($id);
	     $data['title'] = "C3 || Edit kids";
         $data['breadcum'] = array("" => "", "" => " ");
         $page = 'parent/kid_edit';
         $data['page'] = $page;
        _layout_parent($data);
    }
   public function  delete($id=null)
	{
       if($id!='')
		{
		    $kid_id=ID_decode($id);
			$str="FIND_IN_SET($kid_id,assigned_kid_ids)>0";
            $this->db->where($str,null,false);
            $qry=$this->db->select('id')->from('appointment_schedular',false)->get();
            if($qry->num_rows()>0){
              $msg="Unable to delete this kid, as it has been already assigned to a vendor!!";    
            }
            else{
              $result = $this->kids_mod->deletedata($mytable="kids",ID_decode($id));
			  $msg="Kids deleted successfully";  
            }
            	
		}else{
			$msg="Unable to delete,Id not found";
		}
		$this->session->set_flashdata('account_create', $msg);
               redirect('parents/kids/kid_listing') ; 
	}
	
      public function  multi_delete()
	{
		$id = $this->input->post('id');
		if($id!='')
		{
			$result = $this->kids_mod->deletedata($mytable="kids",$id);
			echo 1;
		}else{
			echo 0;
		}
	}
	
		
	
	   
	function export_kid()
{
        $parent_id=currUserId();
        $response= $this->kids_mod->export_kid($parent_id);
		if(isset($response['kidData']) && !empty($response['kidData'])){
            $datamrg = array_merge( $response['header'] , $response['kidData'] );
            array_to_csv($datamrg,'kidData List-'.date('d-m-y H:i:s').'.csv');
        }else{
        $msg=($response!='' && $response!=0) ? 'kids data not found for export......' :  'Some error, try again';
             $this->session->set_flashdata('account_create', $msg);
             redirect('parents/kids/kid_listing') ;      
        } 
        
}

function change_request()
{
	 if (isPostBack()) 
            {
		    $this->form_validation->set_rules('reason_of_change', 'Reason For Change', 'trim|required');
			
            if ($this->form_validation->run() == false)
            {	
            echo validation_errors(); 
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }else{
				
			 $kid_id=$this->input->post('kid_id',true);
			
			 $alldata = $this->session->all_userdata("userinfo"); 
			 $parent_id = $alldata['userinfo']->id;
			 $Parent_name = $alldata['userinfo']->first_name;
			 
	         $sql = $this->db->select('vendor_id, id')
							 ->from('appointment_schedular')
							 ->where("FIND_IN_SET(".$kid_id.",assigned_kid_ids)!=0")
							 ->get();
							
		     $vendor_id =  ($sql->num_rows()>0) ? $sql->row()->vendor_id : 0;
			 $appointment_schedular_id =  ($sql->num_rows()>0) ? $sql->row()->id : 0;
             $reason_of_change=$this->input->post('reason_of_change',true);
			 if($vendor_id!=0){
				if($this->input->post('action') && $this->input->post('action')=="discontinue_sbmt")
				{
				$insert_data=array(
					  'reason_of_change'=>$reason_of_change,
					  'kid_id'=>$kid_id,
					  'parent_id'=>$parent_id,
					  'vendor_id'=>$vendor_id,
					  'app_sc_id'=>$appointment_schedular_id,
					  'request_type'=>'2'
					);		
                $request_type=2;
				}
				else 
				{
				$insert_data=array(
					  'reason_of_change'=>$reason_of_change,
					  'kid_id'=>$kid_id,
					  'parent_id'=>$parent_id,
					  'vendor_id'=>$vendor_id,
					  'app_sc_id'=>$appointment_schedular_id,
					  'request_type'=>'1'
					);			
                $request_type=1;					
				}
			$count_qry= $this->db->select('count(id) as kid_id, request_type')
				                     ->from('vendor_change_request')
						             ->where('kid_id',$kid_id)
									 ->where('status',1)
									 ->where('request_type',$request_type)
							         ->get();
			$kid_count=$count_qry->row()->kid_id;
			if($kid_count  > 0)
			{
					$insert_data['modified_date']=date('Y-m-d h:i:s');
		            $request_type=$count_qry->row()->request_type;
					if($request_type==1)
					{
				    echo  "You have already requested for vendor change!!";
				    die;             
					}
				   else if($request_type==2)
				   {
				    echo  "You have already requested for vendor discontinue!!";
				    die;             
				   }					   
			}else{
				 $insert_data['created_date']=date('Y-m-d h:i:s');
				$qry=$this->db->insert('vendor_change_request',$insert_data);
					if($qry)
				{
					$info=$this->db->select('k.name, k.age, v.vendor_name')
                               ->from('kids k')
					           ->join('appointment_schedular ass','FIND_IN_SET(k.id , ass.assigned_kid_ids)', 'left')
					           ->join('vendor_details v', 'v.id=ass.vendor_id', 'left')
				               ->where('parent_id',$parent_id)
							   ->get();
						 
			     	$vendor_info =	 ($info->num_rows()>0) ? $info->row() : array();
			        $sql = $this->db->select('id,first_name,email')
									->from('users u')
									->where('user_type',1)
									->where('status','active')
									->get();
					 // echo $this->db->last_query();die;
				$result =   ($sql->num_rows()>0) ? $sql->result() : array();
				if(!empty($result) && !empty($vendor_info)){
					
					$lat_name=(isset($result[0]->last_name) && !empty($result[0]->last_name)) ? $result[0]->last_name : "";
                    $parentFullName = $result[0]->first_name.'   '.$lat_name;
				$login_link	=	base_url().'admin/auth';	
                $email = $result[0]->email;
			    $email_data['to']           =   $email;
                $email_data['from']         =   ADMIN_EMAIL;
                $email_data['sender_name']  =   ADMIN_NAME;
                if($request_type==1){
				$email_data['subject']      =   "New Vendor Change Request";
                $email_data['message']      =   array('header' => "Change Vendor Request!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;"><b>Hello'."&nbsp;&nbsp;".ucwords($parentFullName).'</b><b>,</b><br>
			    <span style=" color:#000">There is one Vendor change request from Parent'."&nbsp;".ucwords($Parent_name).'</span>.<br>
			    <span style=" color:#000"> Kindly check more details at:'."&nbsp;".$login_link.'</span>.<br><br><br><b>Regards,<b><br><b>Team C3</b><br><span style="color:#000;">');
				 _sendEmailNew($email_data); 
				}else if($request_type==2){
			    $email_data['subject']      =   " New Discontinue Request";
                $email_data['message']      =   array('header' => " New Discontinue Request!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;"><b>Hello'."&nbsp;&nbsp;".ucwords($parentFullName).'</b><b>,</b><br>
			    <span style=" color:#000">There is one Vendor discontinue from Parent'."&nbsp;".ucwords($Parent_name).'</span>.<br>
			    <span style=" color:#000"> Kindly check more details at:'."&nbsp;".$login_link.'</span>.<br><br><br><b>Regards,</b><br><b>Team C3</b><br><span style="color:#000;">');
				 _sendEmailNew($email_data); 
				}
                  }
				}
				echo ($qry) ? "Your Request saved successfully!!" : "Some error,try again!!";
				die;
			} 
			 }else{
				echo "Vendor has not been assigned to this kid,so can't request for change!!";die;
			     }
			 
			
		}
	}
}

public function view_kids_info($id=null)
	{
       $id = ID_decode($id);
	   // $this->load->model("parents/kids_mod");
	   $data['data1'] = $this->kids_mod->get_kid__view_log($id);
	   // pr($data);
	   $data['title'] = "C3 || View kids";
       $data['breadcum'] = array("" => "", "" => " ");
       $page = 'parent/view_kids_info';
       $data['page'] = $page;
       _layout_parent($data);
	}
		
	function kid_log_list_ajax($kid_id)
	{
		  $res=$this->kids_mod->kid_log_list_ajax(ID_decode($kid_id)); //sssspr($res);die;//pending loan list
          echo json_encode($res);
    }

	    public function view_kid_log($kid_id)
	{
		// echo"fdgdf";die;
		$qry  = $this->db->select('k.name, u.unique_id, u.first_name, u.last_name')
		                ->from('kids k')
						->join('parents_detail p','p.parent_id=k.parent_id')
						->join('users u','u.id=k.parent_id')
	                    ->where('k.id',ID_decode($kid_id))
						->get();
						// echo $this->db->last_query();die;
		$data['data1'] = ($qry->num_rows()>0) ? $qry->result() : array();
		// pr($data['data1']);die;
       
		$data["result"] = array();
        $data['title'] = "C3 || Kids";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'parent/kid_log_listing';
		$data['kid_id']=$kid_id;
        $data['page'] = $page;
        _layout_parent($data);
    }
   function export_log_kids($kid_id)
	{
            $kid_id=ID_decode($kid_id);
			$response= $this->kids_mod->export_kids_log($kid_id);
		    if(isset($response['kidsData']) && !empty($response['kidsData'])){
            $datamrg = array_merge( $response['header'] , $response['kidsData'] );
            array_to_csv($datamrg,'Kids LogData List-'.date('d-m-y H:i:s').'.csv');
              }else{
              $msg=($response!='' && $response!=0) ? 'Kids Log data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
				redirect('parents/kids/view_kid_log/'.ID_encode($kid_id));
               }
    }//end method
	
}
