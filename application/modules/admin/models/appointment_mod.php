<?php 
class  Appointment_mod extends CI_Model
{
	
	
	function __construct() 
	{
		parent::__construct();
		
	}
    

   
	 /**
     * save_city
     *
     * This function check to save city
     * 
     * @access	public
     * @return	boolean
    */
	   function get_city_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			$qry=$this->db->select('id,city_name,status')
					 ->from('city_master')
					 ->order_by('id','desc')
					 ->get();
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   } 
    /*End of Function*/
     /**
     * city_list_ajax
     *
     * This function check to list city
     * 
     * @access	public
     * @return	boolean
    */ 
    // function fetchAppoint($id)
	// {
		 // $sql=$this->db->select('u.first_name,u.email,u.contact_number,u.last_name,v.vendor_name,a.schedule_time,a.remarks,a.id,a.assign_to,a.appointment_status,a.user_id')
                          // ->from('appointment_schedular a')
						  // ->where('a.id',$id)
						  // ->get();
						 // return ($sql->num_rows()>0) ? $sql->result() : array();
	// }
    function appointment_list_ajax()
    {
	
            $requestData = $_REQUEST;
            $columns = array(
                'a.id',
                '',
                'u.first_name',
                'v.vendor_name',
				'u.email',
				'u.contact_number',
				'a.schedule_time',
				'a.remarks',
				'a.appointment_status',
                
            );
            
            $sql=$this->db->select('u.first_name,u.email,u.contact_number,u.last_name,v.vendor_name,a.schedule_time,a.remarks,a.id,a.assign_to,a.appointment_status,a.user_id')
                          ->from('appointment_schedular a')
						  ->join('users u','u.id= a.user_id','left')
						  ->join('vendor_details v','v.id= a.vendor_id','left')
						  ->where('a.appointment_status !=' , '6');
						 // ->get();
						  
                          
                 if (!empty($requestData['search']['value'])) {
                   $ser = strtolower($requestData['search']['value']);
               	   if($ser=='confirm'){
					   $sql->where('a.appointment_status','1');
				   }else if($ser=='done'){
					    $sql->where('a.appointment_status','2');
				   }else if($ser=='closed'){
					    $sql->where('a.appointment_status','3');
				   }else if($ser=='cancelled'){
					    $sql->where('a.appointment_status','7');
				   }
                  else if($ser=='pending'){
					    $sql->where('a.appointment_status','4');
				   }				  
                  else if($ser=='not confirmed'){
					    $sql->where('a.appointment_status','5');
				   }				   
				   else{
					$sql->where("(LOWER(u.first_name) like '%$ser%'");
					$sql->or_where("LOWER(u.last_name) like '%$ser%' ");
					$sql->or_where("LOWER(v.vendor_name) like '%$ser%' ");
					$sql->or_where("u.email like '%$ser%' ");
					$sql->or_where("u.contact_number like '%$ser%' ");
					$sql->or_where("LOWER(a.remarks) like '%$ser%')");
				
                   }
				 }
              if(!empty($columns[$requestData['order'][0]['column']]) && !empty($requestData['order'][0]['dir'])){
                 $sql->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
             }else{
                 $sql->order_by('id', 'desc');
             }
             //$sql->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
             $sql->order_by('a.id','desc');
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
             }
             
            $query = $sql->get()->result();
            $totalData = $totalFiltered = $sql1->get()->num_rows();             
            $data = array();
            $sr_no = $requestData['start'];
           // echo $this->db->last_query();die; 
            foreach ($query as $row) {
				 $remarks =  $row->remarks;//pr($row->remarks);die;
				 if(!empty($remarks)){
					    $b = mb_strimwidth($remarks, 0, 100);
						$remarksData = mb_strimwidth($b, 0, 10, '...');
				 }else{
					 $remarksData ="";
				 }
					
				if(($row->assign_to!=0)){
				$user_name=	get_user_name($row->assign_to);//pr($user_name);die;
				$name_str= (!empty($user_name)) ? ucwords($user_name->first_name.' '.$user_name->last_name) : "";
				}
				else{
					$name_str='Assign';
				}
			
                $status_str = array();
                if($row->appointment_status=='1'){
					$status_str= '<a onclick="status('.ID_encode($row->id).','.$row->appointment_status.','.$row->user_id.')"><span class="label label-sm label-success"> Confirm</span></a>';
				}else if($row->appointment_status=='2'){
					$status_str= '<a onclick="status('.ID_encode($row->id).','.$row->appointment_status.','.$row->user_id.')"><span class="label label-sm label-success"> Done </span></a>';
				}else if($row->appointment_status=='3'){
				
					$status_str= '<a onclick="return alert('."'Status has been closed,cant not changed'".')"><span class="label label-sm label-success"> Closed </span></a>';
				} 
                 else if($row->appointment_status=='4'){
				
					$status_str= '<a onclick="status('.ID_encode($row->id).','.$row->appointment_status.','.$row->user_id.')"><span class="label label-sm label-danger"> Pending </span></a>';
				}  
                else if($row->appointment_status=='5'){
				
					$status_str= '<a onclick="status('.ID_encode($row->id).','.$row->appointment_status.','.$row->user_id.')"><span class="label label-sm label-danger"> Not Confirmed </span></a>';
				}				
                else if($row->appointment_status=='7'){
				
					$status_str= '<a><span class="label label-sm label-danger">Cancelled </span></a>';
				}				

                $schedule_time = $row->schedule_time;
				$schedule_time = date("d-m-y H:i:s",strtotime($schedule_time));
				  
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
			
                $nestedData[] = ++$sr_no;
				$nestedData[] = ucwords($row->first_name." ".$row->last_name);
                $nestedData[] = ucwords($row->vendor_name);
				$nestedData[] = $row->email;
				$nestedData[] = $row->contact_number;
				$nestedData[] = $schedule_time;
				$nestedData[] = '<a onclick="remarkView('.ID_encode($row->id).')">'.$remarksData.'</a>';
			    
				$nestedData[]=($row->appointment_status=='7')?'':'<a onclick="forgotPwd('.ID_encode($row->id).','.$row->assign_to.')">'.$name_str.'</a>';
				
				$nestedData[] = $status_str;
				
				$data[] = $nestedData;
		
           }
            $json_data = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );
            return $json_data;
   }
   
   
   function slectAssign($id=null){
	   
	   
	   $first_name='';
	   $qry = $this->db->select('first_name')
	                  ->from('users u')
					  ->join('appointment_schedular a','u.id=a.assign_to','left')
					  ->where('a.id',$id)
					  ->get();
					  // ->row();
		if($qry->num_rows()>0){
			
			$first_name=$qry->row()->first_name;
		}
		return $first_name;
			
   }

   function get_appointment_list()
   {
	    $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	    if(!empty($all_id))
		{
			$this->db->where_in('a.id',$all_id);
		}
           $sql=$this->db->select('u.first_name,u.email,u.contact_number,u.last_name,v.vendor_name,a.schedule_time,a.remarks,a.id,a.assign_to,a.appointment_status,a.user_id, a.id as app_id')
                          ->from('appointment_schedular a')
						  ->join('users u','u.id= a.user_id','left')
						  ->join('vendor_details v','v.id= a.vendor_id','left')
						  ->where('a.appointment_status !=' , '6')
						   ->order_by('a.id','desc')
						  ->get();
  	return ($sql->num_rows()>0) ? $sql->result() : array();	
	}
	   //=================Download sheet of Payroll input data  sheet========================//
function export_appointment()
{
    $data=array();
     $AppointmentData=$this->get_appointment_list();
     if(isset($AppointmentData) && !empty($AppointmentData))
     {   
        $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"S.No.",
                        'first_name' =>  "Parent Name",
						'vendor_name' =>  "Vendor Name",
						'email' =>  "Email",
						'contact_number' =>  "Mobile Number",
						'schedule_time' =>  "Scheduled Date & Time",
						'remarks' =>  "Remarks",
						'assign_to' =>  "Assign To",
						'appointment_status'=>  "Status"
                        ),
                    );
					 
                 $i=1; 
				  foreach($AppointmentData as $value)
                    {
							$status="";
                   $assign_name=(empty($this->slectAssign($value->app_id)))?'':$this->slectAssign($value->app_id);
				   
				   
				 if($value->appointment_status=='1'){
					$status= 'Confirm';
				}else if($value->appointment_status=='2'){
					$status= 'Done';
				}else if($value->appointment_status=='3'){
					$status= 'Closed ';
				}else if($value->appointment_status=='5'){
				   $status= 'Not Confirmed';
				}	
				 $schedule_time = $value->schedule_time;
				$schedule_time = date("d-m-y h:m:s",strtotime($schedule_time));

                      $data['AppointmentData'][$i]['id']=+$i;
                        $data['AppointmentData'][$i]['first_name']=ucwords($value->first_name." ".$value->last_name);
                        $data['AppointmentData'][$i]['vendor_name'] = ucwords($value->vendor_name);
                        $data['AppointmentData'][$i]['email'] = $value->email;
						$data['AppointmentData'][$i]['contact_number'] = $value->contact_number;
						$data['AppointmentData'][$i]['schedule_time'] = $schedule_time;
						$data['AppointmentData'][$i]['remarks'] = $value->remarks;
						$data['AppointmentData'][$i]['assign_to'] = $assign_name;
						$data['AppointmentData'][$i]['appointment_status'] = $status;
				   $i++;
					}
       }
 
   return $data;   
}
//=================Download sheet of Payroll input data  sheet========================//
function fetchAdmin()
{
	$sql = $this->db->select('id,first_name')
	                ->from('users u')
					->where('user_type',2)
					->where('status','active')
					->get();
					return  ($sql->num_rows()>0) ? $sql->result() : array();
}

function find_kids_detail($parent_id)
{
      $kids_row='';
      //find kids who has not been assigned to any other vendor 
      $whr_str="NOT FIND_IN_SET(id,(select GROUP_CONCAT(assigned_kid_ids) from appointment_schedular ))";
      $this->db->where($whr_str,null,false);
      $qry=$this->db->select('id,name,unique_id')
               ->from('kids')
               ->where(array('parent_id'=>$parent_id,'status'=>'1'))
               ->get();   
      if($qry->num_rows()>0){
        $i=0;
        foreach($qry->result() as $rec){
            $kids_row.='<tr><td class="control-label col-md-1"><input style="margin: 0px 0px 0px -2px !important;" type="checkbox" name="kid_id[]" class="select_all_kids" value="'.$rec->id.'" /></td>';
		
            $kids_row.='<td>'.++$i.'</td>';
        	$kids_row.='<td>'.$rec->unique_id.'</td>';
            $kids_row.='<td>'.ucwords($rec->name).'</td></tr>';
        }
      }
      else{
        $kids_row.='<tr ><td colspan="4">No kids of this parent</td></tr>';
      }
      return $kids_row;
}


}
