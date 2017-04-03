<?php 
class  Kids_mod extends CI_Model
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
    
    function kid_list_ajax($parent_id)
    {
	        $requestData = $_REQUEST;
            $columns = array(
                '',
                '',
                'id',
                'name',
				'age',
				'status',
	            '',
				//'',
				  ''
            );
            
            $sql=$this->db->select('k.parent_id,k.id, k.name, k.age, k.status,k.unique_id, v.vendor_name')
                          ->from('kids k')
						  //->join("kids b","FIND_IN_SET(b.id , a.assigned_kid_ids)>0",false)
						  ->join('appointment_schedular ass','FIND_IN_SET(k.id , ass.assigned_kid_ids)', 'left')
						  //->join('appointment_schedular ass1','k.id , ass.assigned_kid_ids')
						  ->join('vendor_details v', 'v.id=ass.vendor_id', 'left')
				          ->where('parent_id',$parent_id);
						
             if (!empty($requestData['search']['value'])) {
                   $ser = strtolower($requestData['search']['value']);
				   if($ser=='active'){
					   $sql->where('k.status','1');
				   }else if($ser=='inactive'){
					    $sql->where('k.status','2');
				   }else{
					  $sql->where("(LOWER(k.name) like '%$ser%'");
                    $sql->or_where("age like '%$ser%'");
					 $sql->or_where("LOWER(v.vendor_name) like '%$ser%')");
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
            $sr_no = $requestData['start'];
       
            foreach ($query as $row) {
                $msg=getAge($row->age);
                $editstr= '<a class="Edit" title="Edit" href="'.base_url().'parents/kids/edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;' ;
                $deltr='<a href="'.base_url().'parents/kids/delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;';        
                
				$view='<a href="'.base_url().'parents/kids/view_kids_info/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"  id=""><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;';  
				
              			
				  
                $alldata = $this->session->all_userdata("userinfo"); 

 // pr($alldata['userinfo']->id);die;
                  $request = '<a onclick="forgotPwd('.($row->id).','.($alldata['userinfo']->id).','.($alldata['userinfo']->id).')">Change Request</a>&nbsp;&nbsp;&nbsp;';				 
				 
 $request = '<a onclick="forgotPwd('.($row->id).','.($alldata['userinfo']->id).','.($alldata['userinfo']->id).')">Change Request</a>&nbsp;&nbsp;&nbsp;';				 
                 $request = '<a onclick="forgotPwd('.($row->id).','.($alldata['userinfo']->id).','.($alldata['userinfo']->id).')">Change Request</a>&nbsp;&nbsp;&nbsp;';				 
				 $discontinue='<a href="#" onclick="discontinueRequest('.($row->id).','.($alldata['userinfo']->id).','.($alldata['userinfo']->id).')" data-toggle="tooltip" data-placement="top"  id="">Discontinue</a>&nbsp;&nbsp;&nbsp;';    
				     $viewLog='<a href="'.base_url().'parents/kids/view_kid_log/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"  id="">View Log</a>&nbsp;&nbsp;&nbsp;';	
                 
				 $request=$request.$discontinue;
				 
				 $request=(empty($row->vendor_name))?'':$request;
				
				$stat_sstr= ($row->status=='1') ? '<span class="label label-sm label-success"> Active </span>' 
                                                  : ' <span class="label label-sm label-danger">  Inactive </span> ';         
                
                
				$nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
                $nestedData[] = $row->unique_id;
                $nestedData[] = ucwords($row->name);
				$nestedData[] = $msg;
				$nestedData[] = $stat_sstr;
                $nestedData[] = ucwords($row->vendor_name);
			    //$nestedData[] = '';
                $nestedData[] = $editstr.$deltr.$view.$request.$viewLog;
               
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
	
	
	
	function save_kids($id=null)
	   {
	$alldata = $this->session->all_userdata("userinfo");
	$parant_id=$alldata['userinfo']->id;
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
				$postdata['unique_id']=generate_id();
				$qry = $this->db->insert('kids',$postdata);
				// echo $this->db->last_query();die;
			 }
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   } 
	   
	       /*End of Function*/
    
     /**
     * get_description_list
     *
     * This function check to fetch  description
     * 
     * @access	public
     * @return	boolean
    */ 
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
	   


public function deletedata($mytable,$id,$field=null)
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
	
	
	
	   //=================Download sheet of Payroll input data  sheet========================//
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

    $data=array();
     $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	    if(!empty($all_id))
		{
			$this->db->where_in('id',$all_id);
		}
     $kidData=$this->export($parent_id);
	 // $citydata=($qry->num_array()>0)? $qry->result() :array();
     
     if(isset($kidData) && !empty($kidData))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>" Id",
                        'name' =>  "Kids Name",
						'dob' =>  "DOB",
						'age' =>  "Kids Age",
						'liking' =>  "Liking",
						'disliking' =>  "Disliking",
						'scared_of' =>  "Scared Of",
						'allergic_to' =>  "Allergic To",
						'status'=>  "Status",
						"vendor_name"=>'Vendor Name'
                        ),
                    );
 
     
                   $i=1; 
                    foreach($kidData as $value)
                    { 
                        $age=getAge($value->age);
						$status= ($value->status=='1') ? 'Active':'Inactive';         
						
						$data['kidData'][$i]['id']=+$i;
                        $data['kidData'][$i]['name']=ucwords($value->name);
						$data['kidData'][$i]['dob']=$value->dob;
					    $data['kidData'][$i]['age']=$age;
						$data['kidData'][$i]['liking']=$value->liking;
						$data['kidData'][$i]['disliking']=$value->disliking;
					    $data['kidData'][$i]['scared_of']=$value->scared_of;
					    $data['kidData'][$i]['allergic_to']=$value->allergic_to;
					    $data['kidData'][$i]['status'] = $status;
						$data['kidData'][$i]['vendor_name'] =$this->getVendorName($parent_id,$value->id);
                          $i++;
                       
                  }
                 
     }
 
   return $data;   
}
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

  function get_kid__view_log($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('k.id',$id);
			}
			$qry=$this->db->select('k.id as kid, k.name as kname, k.dob as kdob, k.age as kage, k.liking as kliking, k.disliking as kdisliking, k.scared_of as kscared_of, k.allergic_to as kallergic_to, k.doctor_name as kdoctor_name, k.doc_con_num as kdoc_con_num, p.father_name as father_name, p.father_job_desc as father_job_desc, p.mother_name as mother_name, p.mother_job_desc as mother_job_desc, p.father_contact as father_contact, p.mother_contact as mother_contact, p.emergency_no as emergency_no ')
					 ->from('kids k')
					 ->join('parents_detail p','p.parent_id=k.parent_id','left')
					 ->get();
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   }
	   
	    public function isDisplayChangeReason($vid=null)
  {
	  if(!empty($vid))
	  {
		  $status=$this->db->select('status')->from('vendor_change_request')->where('id',$vid)->get()->row()->status;
		  if($status=='3')
		  return true;
	      else
			return false;
	  }
	  else
	  {
		  return false;
	  }
  }

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
				$nestedData[] =  date('d-m-y',strtotime($row->start_date));
				if(!empty($row->cancel_date))
				{
					$cancel_date=date('d-m-y',strtotime($row->cancel_date));
				}
				else 
				{
					$cancel_date='';
				}
				$nestedData[] =  $cancel_date;
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
}
