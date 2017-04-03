<?php
class  New_appointment_mod extends CI_Model
{
	
	
	function __construct()
	{
		parent::__construct();
		
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
 
public function new_appointment_listing_ajax()
  {
   //////////
      $parent_id=currUserId();
		  //$parent_id=136;
			$requestData = $_REQUEST;
            $columns = array(
                 '',
				'id',
				'vendor_name',
				'created_date'
			);
    
            $sql=$this->db->select('a.id, a.created_date, v.vendor_name, a.schedule_time, a.appointment_status,a.remarks')
                          ->from('appointment_schedular as a')
						  ->join('vendor_details as v', 'v.id=a.vendor_id')
						  ->where('a.user_id',$parent_id)
						  ->where('a.appointment_status !=' , '6');
			///////////////////////////
	         if (!empty($requestData['search']['value'])) {
              $ser = strtolower($requestData['search']['value']);
                 //array('1'=>'confirm schedule','2'=>'done','3'=>'closed','4'=>'pending','5'=>'Not Confirmed','6'=>'approved','7'=>'Canceld')
				 if($ser=='confirm schedule')
				  {
				    $sql->where('a.appointment_status','1');
				  }
                  else if($ser=='done')
				  {
				    $sql->where('a.appointment_status','2');
				  }
                  else if($ser=='closed')
				  {
				    $sql->where('a.appointment_status','3');
				  }
                  else if($ser=='pending')
				  {
				    $sql->where('a.appointment_status','4');
				  }
                  else if($ser=='not confirmed')
				  {
				    $sql->where('a.appointment_status','5');
				  }
                  else if($ser=='cancelled')
				  {
				    $sql->where('a.appointment_status','7');
				  }
				  else
				  {
					$sql->where("(LOWER(v.vendor_name) like '%$ser%')");
                   // $sql->or_where("k.unique_id like '%$ser%')");
				   }
		    } //end search if
         $sql->order_by('a.id', 'desc');
         $sql1 = clone $sql;
         if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
         }
            
         $query = $sql->get()->result();
        // echo $this->db->last_query(); die;
         $totalData = $totalFiltered = $sql1->get()->num_rows();
         $data = array();
         $sr_no = $requestData['start'];
		 $status=array('1'=>'confirm schedule','2'=>'done','3'=>'closed','4'=>'pending','5'=>'Not Confirmed','6'=>'approved','7'=>'Cancelled');
		 
         foreach($query as $row)
		 {
				$cancel_str= '<a onclick="return confirmCancelAppointment();" class="Edit" title="Edit" href="'.base_url().'parents/appointment_cancel/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> Cancel</a>&nbsp;&nbsp;&nbsp;';
				$cancel_str=($row->appointment_status=='7' || $row->appointment_status=='3')?'':$cancel_str;
				//$viewInfo= '<a class="view" title="view" data-toggle="tooltip" href="'.base_url().'vendors/kids/view_kids_info/'.ID_encode($row->id).'" data-placement="top">View Info</a>&nbsp;&nbsp;&nbsp;';
				$nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
				$nestedData[] = ++$sr_no;
				$nestedData[] =$row->vendor_name;
				$nestedData[] =date('d-m-y',strtotime($row->schedule_time));
				$nestedData[] =$row->remarks;
				$nestedData[] =$status[$row->appointment_status];
				$nestedData[] =$cancel_str;
				$data[] = $nestedData;
				
           }
            $json_data = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );
            return $json_data;
           
  }//end method
}
