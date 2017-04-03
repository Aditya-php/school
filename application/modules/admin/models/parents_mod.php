<?php
class  Parents_mod extends CI_Model
{
	
	
	function __construct()
	{
		parent::__construct();
		
	}
    

	   
    /*End of Function*/
    
     /**
     * get_city_list
     *
     * This function check to fetch  city
     *
     * @access	public
     * @return	boolean
    */
	   function get_parents_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			$qry=$this->db->select('*')
					 ->from('users')
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
    
    function parents_list_ajax()
    {
            $requestData = $_REQUEST;
            $columns = array(
                '',
                'id',
				'unique_id',
                'first_name',
				'created',
			    'address',
				'email',
				'contact_number',
				'status',
                'status',
                ''
            );
            
            $sql=$this->db->select('*')
                          ->from('users')
						  ->where('user_type','3');
						  
            if (!empty($requestData['search']['value'])) {
                $ser = strtolower($requestData['search']['value']);
                   if($ser=='active'){
					   $sql->where('status','active');
				   }else if($ser=='inactive'){
					    $sql->where('status','inactive');
				   }else{
					 	$sql->where("(LOWER(unique_id) like '%$ser%'");
						$sql->or_where("LOWER(first_name) like '%$ser%' ");
						$sql->or_where("LOWER(address) like '%$ser%' ");
						$sql->or_where("email like '%$ser%' ");
						$sql->or_where("contact_number like '%$ser%' )");
				   }
			
             
             }
             
              if(!empty($columns[$requestData['order'][0]['column']]) && !empty($requestData['order'][0]['dir'])){
                 $sql->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
             }else{
                 $sql->order_by('id', 'desc');
             }
             $sql->order_by('id', 'desc');
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
             }
             
            $query = $sql->get()->result();
            $totalData = $totalFiltered = $sql1->get()->num_rows();
            $data = array();
            $sr_no = $requestData['start'];
        
            foreach ($query as $row) {
				 $created = $row->created;
				  $createdDate = date("d-m-y",strtotime($created));
				// pr($row);die;
                $editstr= '<a class="Edit" title="Edit" href="'.base_url().'admin/parents/edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>' ;
                $deltr='<a href="'.base_url().'admin/parents/delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>';
                $viewstr= '<a class="View" title="View" href="'.base_url().'admin/parents/kid_listing/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> View </a>';
                $deltr='<a href="'.base_url().'admin/parents/delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>&nbsp;&nbsp';	
                $viewstr= '<a class="View" title="View" href="'.base_url().'admin/parents/kid_listing/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> View </a>';	
                // $archivestr= '<a class="Archive" title="View" href="#" data-toggle="tooltip" data-placement="top"> Archive </a>&nbsp;&nbsp;&nbsp' ;								
                $deltr='<a href="'.base_url().'admin/parents/delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>';	
                $viewstr= '<a class="View" title="View" href="'.base_url().'admin/parents/kid_listing/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-eye" aria-hidden="true"></i></a>';	
                // $archivestr= '<a class="Archive" title="View" href="#" data-toggle="tooltip" data-placement="top"> Archive </a>&nbsp;&nbsp;&nbsp' ;								
                
                $archievestr= '<a class="archive" title="Archive" onclick="return confirmArchieve();" href="'.base_url().'admin/parents/archieve/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"><i class="fa fa-archive" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp';
                // $archivestr= '<a class="Archive" title="View" href="#" data-toggle="tooltip" data-placement="top"> Archive </a>&nbsp;&nbsp;&nbsp' ;
                
                $stat_sstr= ($row->status=='active') ? '<span class="label label-sm label-success"> Active </span> '
                                                  : ' <span class="label label-sm label-danger">  Inactive </span>';

									  
                $flag=$this->isParentsArchieve($row->id);
                if(!$flag)
                {
                    $nestedData = array();
                    $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                    $nestedData[] = ++$sr_no;
    				  $nestedData[] = $row->unique_id;
                    $nestedData[] = ucwords($row->first_name." ".$row->last_name);
    				$nestedData[] = $createdDate;
    				$nestedData[] = $row->address;
    			    $nestedData[] = $row->email;
    				$nestedData[] = $row->contact_number;
                    $nestedData[] = $stat_sstr;
                    $nestedData[] = $editstr.$deltr.$viewstr.$archievestr;
                    $data[] = $nestedData;
                }
           }
            $json_data = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );
            return $json_data;
   }
   /*End of Function*/
    

public function delete($mytable,$id,$field=null)
{
        if($field==null)
        {
        $this->db->where('id', $id);
        }
        else{
          $this->db->where($field, $id);
        }
        $this->db->delete($mytable);
}
	
	
	
	 function save_area($id=null)
	 {
		   $data ="";
		   $postdata = $this->input->post(NULL,TRUE);//print_r($postdata);
			 if($id)
			 {
				$postdata['modified_by']=currUserId();
				$postdata['modified']=date('Y-m-d h:i:s');
				$qry = $this->db->update('users',$postdata,array('id'=>$id));
			
			 }
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   }
	   
	   //=================Download sheet of Payroll input data  sheet========================//
function export_parents()
{
    $data=array();
	  $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	 if(!empty($all_id))
		{
			$this->db->where_in('id',$all_id);
		}
	 $qry=$this->db->select('*')
	               ->order_by('id', 'desc')
	               ->get_where('users',array('user_type'=>'3'));
     $parentsdata=($qry->num_rows()>0) ? $qry->result() : array();
	 if(isset($parentsdata) && !empty($parentsdata))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"S.No.",
						 'unique_id'  =>"Parent Id",
                        'first_name' =>  "First Name",
						'last_name' =>  "Last Name",
					     'address' =>  "Address",
					    'email' =>  "Email Address",
					    'contact_number' =>  "Mobile Number",
						'status'=>  "Status"
                        ),
                    );
    

                   $i=1;
                    foreach($parentsdata as $value)
                    {
                        $data['parentsdata'][$i]['id']=+$i;
						$data['parentsdata'][$i]['unique_id']=$value->unique_id;
                        $data['parentsdata'][$i]['first_name']=ucwords($value->first_name);
						$data['parentsdata'][$i]['last_name']=ucwords($value->last_name);
						$data['parentsdata'][$i]['address']=$value->address;
						$data['parentsdata'][$i]['email']=$value->email;
					    $data['parentsdata'][$i]['contact_number']=$value->contact_number;
                        $data['parentsdata'][$i]['status'] = $value->status;
                        $i++;
                  }
                 
      
         
     }
 
   return $data;
}
//=================Download sheet of Payroll input data  sheet========================//
	public function find_area_list($id)
	{
		$rData = '<option>Select Area</option>';
		$this->db->select('id,area_name');
						$this->db->from('area_master');
						$this->db->where('city_id',$id);
		  $query = $this->db->get();
		  //echo $this->db->last_query(); die;
		if($query->num_rows>0)
		{
			
			foreach($query->result() as  $value)
			 {
				$rData .= '<option value="'.$value->id.'">'.$value->area_name.'</option>';
			 }
		}
		else{
			$rData= '<option value="">No Area Found</option>';
		}
		return $rData;
}

   /*End of Function*/
      function get_kid_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			$qry=$this->db->select('*')
					 ->from('kids')
					 ->get();
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   }
function save_kids($id=null)
	   {
	$alldata = $this->session->all_userdata("userinfo");
	// $parant_id=$alldata['userinfo']->id;
		   $data ="";
		   $postdata = $this->input->post(NULL,TRUE);//print_r($postdata);
		   $postdata['dob']=date('Y-m-d',strtotime($this->input->post('dob',true)));
           
           $start_date=date_create($postdata['dob']);
           $end_date=date_create(date('Y-m-d'));
           $diff=date_diff($start_date,$end_date);
           $postdata['age']= $diff->format('%a')+1;
           
			 if($id)
			 {
				
				$postdata['modified_date']=date('Y-m-d h:i:s');
				$postdata['modified_by']=currUserId();
				$qry = $this->db->update('kids',$postdata,array('id'=>$id));
			 }
			 else
			 {
				  
				$postdata['created_date']=date('Y-m-d h:i:s');
				$postdata['parent_id']=currUserId();
				$postdata['created_by']=currUserId();
				$qry = $this->db->insert('kids',$postdata);
			 }
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   }
	
	
	
function export($parent_id)
{
if(isset($parent_id) && !empty($parent_id))
{
	$this->db->where('parent_id',$parent_id);
}
$qry=$this->db->select('*')
		 ->from('kids')
		 ->order_by('id','desc')
		 ->get();
return ($qry->num_rows()>0) ? $qry->result() : array();
}


function export_kid($parent_id)
{
	// pr($parent_id);die;
	
    $data=array();
     $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	 if(!empty($all_id))
		{
			$this->db->where_in('id',$all_id);
		}
     $kidData=$this->export($parent_id);//pr($kidData);die;
	 // $citydata=($qry->num_array()>0)? $qry->result() :array();
     
     if(isset($kidData) && !empty($kidData))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>" S.No.",
                        'kid_id' =>  "Kids ID",
                        'name' =>  "Kids Name",
						'dob' =>  "DOB",
						'age' =>  "Kids Age",
						'liking' =>  "Liking",
						'disliking' =>  "Disliking",
						'scared_of' =>  "Scared Of",
						'allergic_to' =>  "Allergic To",
						'status'=>  "Status",
						'vendor_name'=>"Vendor Name"
                        ),
                    );
 
     
                   $i=1;
                    foreach($kidData as $value)
                    {
                        
						$age=getAge($value->age);
						$status= ($value->status=='1') ? 'Active': 'Inactive';
						$data['kidData'][$i]['id']=+$i;
                        $data['kidData'][$i]['kid_id']=$value->unique_id;
                        $data['kidData'][$i]['name']=ucwords($value->name);
						$data['kidData'][$i]['dob']=$value->dob;
					    $data['kidData'][$i]['age']=$age;
						$data['kidData'][$i]['liking']=$value->liking;
						$data['kidData'][$i]['disliking']=$value->disliking;
					    $data['kidData'][$i]['scared_of']=$value->scared_of;
					    $data['kidData'][$i]['allergic_to']=$value->allergic_to;
					    $data['kidData'][$i]['status'] = $status;
						$data['kidData'][$i]['vendor_name'] = $this->getVendorName($parent_id,$value->id);
                        $i++;
                       
                  }
                 
     }
 
   return $data;
}


  function kid_list_ajax($parent_id)
    {
		
	        $requestData = $_REQUEST;
            $columns = array(
                '',
                'id',
				'unique_id',
                'name',
				'age',
				'status',
	            '',
				'',
				'',
				  ''
            );

            $sql=$this->db->select('k.id, k.name, k.age, k.status, k.unique_id, v.vendor_name')
                          ->from('kids k')
                          ->join('appointment_schedular ass','FIND_IN_SET(k.id , ass.assigned_kid_ids)', 'left')
						  ->join('vendor_details v', 'v.id=ass.vendor_id', 'left')
				          ->where('parent_id',$parent_id);
						
             if (!empty($requestData['search']['value'])) {
             $ser = strtolower($requestData['search']['value']);
                 if($ser=='active'){
					   $sql->where('k.status','1');
				   }else if($ser=='inactive'){
					    $sql->where('k.status','2');
				   }else{
				$sql->where("(k.unique_id like '%$ser%'");
                $sql->or_where("LOWER(k.name) like '%$ser%' ");
				$sql->or_where("LOWER(v.vendor_name) like '%$ser%' ");
                $sql->or_where("k.age like '%$ser%' ");
                $sql->or_where("LOWER(k.status) like '%$ser%')");
             }
			}
             $sql->order_by('k.id', 'desc');
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
             }
            
            $query = $sql->get()->result();
 //echo $this->db->last_query(); die;
            $totalData = $totalFiltered = $sql1->get()->num_rows();
            $data = array();
            $sr_no = 0;
       
            foreach ($query as $row) {
                $msg='';
                if(!empty($row->age)){
                    $convert = $row->age; // days you want to convert

                    $years = ($convert / 365) ; // days / 365 days
                    $years = floor($years); // Remove all decimals
                    
                    $month = ($convert % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
                    $month = floor($month); // Remove all decimals
                    
                    $days = ($convert % 365) % 30.5; // the rest of days
                    $days = floor($days); // Remove all decimals
                     
                     if($years>0){
                                 $msg.= $years." Year";
                     }
                    
                    if($month>0){
                        $msg.= $month. " Month";
                    }
                   
                    if($days>0){
                        $msg.= ($days) ." Days";
                    }
                     
                   } // Echo all information set
			
                $editstr= '<a class="Edit" title="Edit" href="'.base_url().'admin/parents/kid_edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;' ;
                
				$deltr='<a href="'.base_url().'admin/parents/kid_delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;';
                 // $archivestr= '<a class="Archive" title="View" href="#" data-toggle="tooltip" data-placement="top"> Archive </a>&nbsp;&nbsp;&nbsp;' ;
				 
				 $view='<a href="'.base_url().'admin/parents/view_kid_log/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"  id="">View Log</a>&nbsp;&nbsp;&nbsp;';
				  
				     
				   
                $stat_sstr= ($row->status=='1') ? '<span class="label label-sm label-success"> Active </span>'
                                                  : ' <span class="label label-sm label-danger">  Inactive </span> ';
                $kid_info='<a href="'.base_url().'admin/parents/kid_edit/'.ID_encode($row->id).'">View</a>';                                                  
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
				$nestedData[] = $row->unique_id;
                $nestedData[] = ucwords($row->name);
				$nestedData[] = $msg;
				$nestedData[] = $stat_sstr;
                $nestedData[] = ucwords($row->vendor_name);
			    $nestedData[] = $kid_info;
				 $nestedData[] = $view;
                $nestedData[] = $editstr.$deltr;
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
   /*
   @desc:Used to display kids log
   */
  function kid_log_list_ajax($kid_id)
    {
		
		    //$kid_id=42;
	        $requestData = $_REQUEST;
            $columns = array(
				'unique_id',
                'name',
				'age',
				'status',
	           
            );

            $sql=$this->db->select('vc.id as vid,log.id as log_id,log.start_date, ass.vendor_id, vd.vendor_name,log.kid_id, vc.reason_of_change,log.cdate as cancel_date')
						  ->from('admin_view_logs log')
						  ->join('appointment_schedular ass','log.app_sc_id=ass.id')
						  ->join('vendor_details vd','vd.id=ass.vendor_id')
						  ->join('vendor_change_request as vc','vc.app_sc_id=ass.id and vc.kid_id=log.kid_id and vc.status=3','left outer')
						  ->where('log.kid_id',$kid_id)
						  ->where_in("log.appointment_status",array('3','7','6','8'));
						  
					
			if (!empty($requestData['search']['value'])) {
             $ser = strtolower($requestData['search']['value']);
                 /*if($ser=='active'){
					   $sql->where('status','1');
				   }
				   else if($ser=='inactive'){
					    $sql->where('status','2');
				   }
				   else
				   {*/
                $sql->where("(LOWER(vd.vendor_name) like '%$ser%' ");
                $sql->or_where("vc.reason_of_change like '%$ser%')");

				  // }
			}
             $sql->order_by('log.id', 'desc');
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
             }
            
            $query = $sql->get()->result();
            //echo $this->db->last_query(); die;
            $totalData = $totalFiltered = $sql1->get()->num_rows();
            $data = array();
            $sr_no = 0;
       
            foreach ($query as $row) {
				
				$checkbox='<input class="select_all" type="checkbox" name="all_user_id[]" value="'.$row->log_id.'">';
				$reason_of_change=($this->isDisplayChangeReason($row->vid))?$row->reason_of_change:'';
                $nestedData = array();
				$nestedData[]=$checkbox;
                $nestedData[] = ++$sr_no;
				$nestedData[] = ucwords($row->vendor_name);
				$nestedData[] = date('d-m-y',strtotime($row->start_date));
				if(!empty($row->cancel_date))
				{
				$nestedData[] = date('d-m-y',strtotime($row->cancel_date));
				}
				else 
				{
				$nestedData[] = '';
				}
				$nestedData[] = $reason_of_change;
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
////////////
	   function export_kids_log($kid_id)
		{
			$data=array();
		    $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
			if(!empty($all_id))
			{
				//$this->db->where_in('i.id',$all_id);
				$this->db->where_in('log.id',$all_id);
			}
			
			
			$kidsData=$this->fetch_export_kids_log($kid_id);
			
			if(isset($kidsData) && !empty($kidsData))
			 {   $header2=$newcomp=array();
				 $data['header']=array(
							    '0' =>array(
							    's_no'  =>" S.No.",
								'vendor_name'  =>"Vendor Name",
								'session_start_date' =>  "Session Start Date",
								'session_end_date' =>  "Session End Date",
								'reason_for_change' =>  "Reason for change",
								),
							);
						   $i=1;
							foreach($kidsData as $value){
								$reason_of_change=($this->isDisplayChangeReason($value->vid))?$value->reason_of_change:'';
								$data['kidsData'][$i]['s_no']=+$i;
								$data['kidsData'][$i]['vendor_name']=ucwords($value->vendor_name);
								$data['kidsData'][$i]['session_start_date']=$value->start_date;
								$data['kidsData'][$i]['session_end_date']=$value->cancel_date;
								$data['kidsData'][$i]['reason_for_change'] =$reason_of_change;
								$i++;
							}
						  }
			 return $data;
			 }
		/*
		
		
		*/
     public function fetch_export_kids_log($kid_id)
	   {
            $sql=$this->db->select('vc.id as vid,log.id as log_id,log.start_date, ass.vendor_id, vd.vendor_name,log.kid_id, vc.reason_of_change,log.cdate as cancel_date')
						  ->from('admin_view_logs log')
						  ->join('appointment_schedular ass','log.app_sc_id=ass.id')
						  ->join('vendor_details vd','vd.id=ass.vendor_id')
						  ->join('vendor_change_request as vc','vc.app_sc_id=ass.id and vc.kid_id=log.kid_id and vc.status=3','left outer')
						  ->where('log.kid_id',$kid_id)
						  ->where_in("log.appointment_status",array('3','7','6','8'))
                          ->order_by('log.id', 'desc')
                          ->get();			 
			return ($sql->num_rows()>0)? $sql->result() :array();//pr($areadata);die;
	   }//end method

///////////////
  public function getVendorName($parent_id,$kid_id)
  {
          $sql=$this->db->select('v.vendor_name')
                          ->from('kids k')
                          ->join('appointment_schedular ass','FIND_IN_SET(k.id , ass.assigned_kid_ids)', 'left')
						  ->join('vendor_details v', 'v.id=ass.vendor_id', 'left')
				          ->where('parent_id',$parent_id)
						  ->where('k.id',$kid_id)
						  ->get()
						  ->row();
		  $vendor_name=(!empty($sql->vendor_name))?$sql->vendor_name:'';
		  return $vendor_name;
		  
		  
  }//end method
 public function isDisplayChangeReason($vid=null)
  {
	  if(!empty($vid))
	  {
		  $status=$this->db->select('status')->from('vendor_change_request')->where('id',$vid)->get()->row()->status;
		  if($status=='3' || $status=='1' )
		  return true;
	      else
			return false;
	  }
	  else
	  {
		  return false;
	  }
  }
  /*
  return: boolean
  */
  public function isParentsArchieve($id)
  {
    
     $status=$this->db->select('status')->from('users')->where('id', $id)->get()->row()->status;
     if($status=="archieve")
       return true;
     else
       return false;
  }
}
