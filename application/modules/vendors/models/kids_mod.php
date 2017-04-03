<?php 
class  Kids_mod extends CI_Model
{
	function __construct() 
	{
		parent::__construct();
		
	}
	public function kids_list_ajax()
   	{
	        $vendor_id=currUserId();
			$qry1=$this->db->select("id")->from("vendor_details")->where("user_id",$vendor_id)->get()->row();
			
			$vendor_id=$qry1->id;
			
			$requestData = $_REQUEST;
            $columns = array(
                 '',
				'id',
				'Kid ID',
				'Kid Name',
				'Age',
				'Session start date',
				'Session end date',
				'Status'
            );
              //'FIND_IN_SET(k.id , ass.assigned_kid_ids)'
			  $sql=$this->db->select('k.id,k.name,k.age,log.start_date,log.cdate,log.appointment_status,k.unique_id')
                            ->from('appointment_schedular ass')
						    ->join('admin_view_logs log', 'ass.id=log.app_sc_id')
						    ->join('kids k','k.id=log.kid_id')
						    ->where('ass.vendor_id',$vendor_id);
			
	         if (!empty($requestData['search']['value'])) {
              $ser = strtolower($requestData['search']['value']);
                  if($ser=='enrolled')
				  {
				    $sql->where_in('log.appointment_status',array('3','6'));
				  }
                else if($ser=='Discontinued')
				  {
				    $sql->where('log.appointment_status','7');
				  }
				  else
				  {
					$sql->where("(LOWER(k.name) like '%$ser%'");
                    $sql->or_where("k.unique_id like '%$ser%')");
					
					/*$sql->where("(i.image like '%$ser%'");
                    $sql->or_where("i.amount like '%$ser%' ");
                    $sql->or_where("i.kid_id like '%$ser%' ");
                    $sql->or_where("LOWER(k.name) like '%$ser%')");
                    */
				   }
		  }
		  
		  
         $sql->order_by('ass.id', 'desc');
         $sql1 = clone $sql;
         if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
         }
            
         $query = $sql->get()->result();     
        // echo $this->db->last_query(); die;
         $totalData = $totalFiltered = $sql1->get()->num_rows();    
         $data = array();
         $sr_no = $requestData['start'];
		 $status=array("3"=>"Enrolled","6"=>"Enrolled","7"=>"Discontinued", "8"=>"Discontinued");
         foreach($query as $row) 
		 {
			    $age=getAge($row->age);
				$kidsArr=null;
				//$editstr= '<a class="Edit" title="Edit" href="'.base_url().'vendors/invoice/edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;';
				$viewInfo= '<a class="view" title="view" data-toggle="tooltip" href="'.base_url().'vendors/kids/view_kids_info/'.ID_encode($row->id).'" data-placement="top">View Info</a>&nbsp;&nbsp;&nbsp;';
				$nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
				$nestedData[] = ++$sr_no;
				$nestedData[] =$row->unique_id;
				$nestedData[] =ucwords($row->name);
				$nestedData[] =$age;
				$nestedData[] = date('d-m-y',strtotime($row->start_date));
				if(!empty($row->cdate))
				{
					$cancel_date=date('d-m-y',strtotime($row->cdate));
				}
				else 
				{
					$cancel_date='';
				}
				$nestedData[] = $cancel_date;
				$nestedData[] =$status[$row->appointment_status];
				$nestedData[] = $viewInfo;
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
				$this->db->where('k.id',$id);
			}
			$qry=$this->db->select('k.id as kid, k.name as kname, k.dob as kdob, k.age as kage, k.liking as kliking, k.disliking as kdisliking, k.scared_of as kscared_of, k.allergic_to as kallergic_to, k.doctor_name as kdoctor_name, k.doc_con_num as kdoc_con_num, p.father_name as father_name, p.father_job_desc as father_job_desc, p.mother_name as mother_name, p.mother_job_desc as mother_job_desc, p.father_contact as father_contact, p.mother_contact as mother_contact, p.emergency_no as emergency_no ')
					 ->from('kids k')
					 ->join('parents_detail p','p.parent_id=k.parent_id','left')
					 ->get();
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   } 
	   function export_kids()
		{
			$data=array();
		    $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
			if(!empty($all_id))
			{
				//$this->db->where_in('i.id',$all_id);
				$this->db->where_in('b.id',$all_id);
			}
			$kidsData=$this->fetch_export_details();
			if(isset($kidsData) && !empty($kidsData))
			 {   $header2=$newcomp=array();
				 $data['header']=array(
							    '0' =>array(
							    's_no'  =>" S.No.",
								'kid_id'  =>"Kid Id",
								'kid_name' =>  "kid Name",
								'age' =>  "Age",
								'session_start_date' =>  "Session start date",
								'session_end_date' =>  "Session end date",
								'status' =>  "Status",
								),
							);
						   $i=1; 
						     $status=array("3"=>"Enrolled","6"=>"Enrolled","7"=>"Discontinued", "8"=>"Discontinued");
							foreach($kidsData as $value){
								$age=getAge($value->age);
								$data['kidsData'][$i]['s_no']=+$i;
								$data['kidsData'][$i]['kid_id']=$value->unique_id;
								$data['kidsData'][$i]['kid_name']=ucwords($value->name);
								$data['kidsData'][$i]['age']=$age;
								$data['kidsData'][$i]['session_start_date'] = date('d-m-y',strtotime($value->start_date));
								$data['kidsData'][$i]['session_end_date'] = date('d-m-y',strtotime($value->cdate));
								$data['kidsData'][$i]['status'] = $status[$value->appointment_status];
								$i++;
							}
						  }
			 return $data;			 
			 }
		/*
		
		
		*/
     function fetch_export_details()
	   {
	        $vendor_id=currUserId();
			$qry1=$this->db->select("id")->from("vendor_details")->where("user_id",$vendor_id)->get()->row();
			
			$vendor_id=$qry1->id;
			$sql=$this->db->select('k.id,k.name,k.age,log.start_date,log.cdate,log.appointment_status,k.unique_id')
                            ->from('appointment_schedular ass')
						    ->join('admin_view_logs log', 'ass.id=log.app_sc_id')
						    ->join('kids k','k.id=log.kid_id')
						    ->where('ass.vendor_id',$vendor_id)
							->order_by('ass.id','desc')
							->get();


	         return ($sql->num_rows()>0)? $sql->result() :array();//pr($areadata);die;
	   }//end method
}

