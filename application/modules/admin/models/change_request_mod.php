<?php 
class  Change_request_mod extends CI_Model
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
	  
  
    function request_list_ajax()
    {
            $requestData = $_REQUEST;
            $columns = array(
                '',
                'id',
			   'first_name',
				'name',
				'vendor_name',
				'created_date',
                'reason_of_change',
				'status',
				 ''
            );
 
            $sql=$this->db->select('c.id,k.id as kid_id,u.first_name,k.name,v.vendor_name,c.vendor_id,c.created_date,c.reason_of_change,c.status,c.id, c.request_type')
						  ->from('vendor_change_request c')
						  ->join('kids k','k.id= c.kid_id','left')
						  ->join('users u','u.id= c.parent_id','left')
						  ->join('vendor_details v','v.id= c.vendor_id','left');

                  
            if (!empty($requestData['search']['value'])) {
                $ser = strtolower($requestData['search']['value']);
                   if($ser=='pending'){
					    $sql->where('c.status','1');
				   }else if($ser=='disapproved'){
					    $sql->where('c.status','2');
				   }else if($ser=='approved'){
					    $sql->where('c.status','3');
				   }else if($ser=='change request'){
					    $sql->where('c.request_type','1');
				   }
				   else if($ser=='discontinue request'){
					    $sql->where('c.request_type','2');
				   }else{
					$sql->where("(LOWER(u.first_name) like '%$ser%'");
					$sql->or_where("LOWER(k.name) like '%$ser%' ");
					$sql->or_where("LOWER(c.reason_of_change) like '%$ser%' ");
					$sql->or_where("LOWER(v.vendor_name) like '%$ser%')");
				
			  }
			}
        
             $sql->order_by('id', 'desc');
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);
             }
             
            $query = $sql->get()->result(); 
 // echo $this->db->last_query(); die;    
            $totalData = $totalFiltered = $sql1->get()->num_rows();    
            $data = array();
            $sr_no = $requestData['start'];
             $request_type_array=array('1'=>'Change Request', '2'=>'Discontinue Request');
            foreach ($query as $row) {
				$reason_of_change = $row->reason_of_change;
				$a = mb_strimwidth($reason_of_change, 0, 100);
				$reason_of_change_limit = mb_strimwidth($a, 0, 30, '...');
            
			   $approve= '<a  onclick="approveChangeRequest('.$row->id.','.$row->vendor_id.','.$row->request_type.')" class="Edit" title="Edit" href="#" data-toggle="tooltip" data-placement="top">Approve</a>&nbsp;&nbsp;&nbsp;' ;
			   
			   $disapprove= '<a onclick="return disapproveValidate()"  class="Edit" title="Edit" href="'.base_url().'admin/change_request/change_request_disapprove/'.ID_encode($row->id).'"  data-toggle="tooltip" data-placement="top">Disapprove</a>&nbsp;&nbsp;&nbsp;' ;
				
				  $created_date = $row->created_date;
			      $created_date = date("d-m-y", strtotime($created_date));
                
                 if($row->status=='1'){
					$stat_sstr= '<span class="label label-sm label-danger"> Pending </span>';
				}else if($row->status=='2'){
					   $disapprove="";
					$stat_sstr= '<span class="label label-sm label-danger"> Disapprove </span>';
				}else if($row->status=='3'){
					 $approve="";
					$stat_sstr= '<span class="label label-sm label-success"> Approved </span>';
				}    
                $action=($row->status=='1')? $approve.$disapprove:'';
				 
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
				// $nestedData[] =$row->id;
				$nestedData[] =  ucwords($row->first_name);
				$nestedData[] =  ucwords($row->name);
				$nestedData[] =  ucwords($row->vendor_name);
                $nestedData[] =  $created_date;
				$nestedData[] =  $reason_of_change_limit;
				$nestedData[] =  $request_type_array[$row->request_type];
			    $nestedData[] = $stat_sstr;
			    
				$action=($this->isDisplayAction($row->id,$row->kid_id))?'':$action;
				
				$nestedData[] = $action;
                
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
 
	   //=================Download sheet of Payroll input data  sheet========================//
function export_request()
{
    $data=array();
	   $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	    if(!empty($all_id))
		{
			$this->db->where_in('c.id',$all_id);
		}
            $qry=$this->db->select('c.id,k.id as kid_id,u.first_name,k.name,v.vendor_name,c.vendor_id,c.created_date,c.reason_of_change,c.status,c.id, c.request_type')
						  ->from('vendor_change_request c')
						  ->join('kids k','k.id= c.kid_id','left')
						  ->join('users u','u.id= c.parent_id','left')
						  ->join('vendor_details v','v.id= c.vendor_id','left')
						  ->order_by('c.id','desc')
                          ->get();
             $VendorChangeRequest = ($qry->num_rows()>0)? $qry->result() :array();

 // pr($qry->result());die;
	 if(isset($VendorChangeRequest) && !empty($VendorChangeRequest))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"S.No.",
                        'first_name' =>  "Parent Name",
						'name' =>  "Kid Name",
					    'vendor_name' =>  "Vendor Name",
						'requested_date' =>  "Requested Date",
					    'reason_of_change'=>  "Comment",
						'request_type'=>'Request Type',
						'status'=>"Status"
                        ),
                    );
    

                   $i=1; 
				     $request_type_array=array('1'=>'Change Request', '2'=>'Discontinue Request');
                    foreach($VendorChangeRequest as $value)
                    { 
					  $created_date = $value->created_date;
					  $created_date = date("d-m-y", strtotime($created_date));
				
					if($value->status =='1')
					{
						$status = 'Pending';
					}else if($value->status =='2')
					{
						$status = 'Disapprove';
					}else if($value->status =='3')
					{
						$status = 'Approve';
					}
                        $data['VendorChangeRequest'][$i]['id']=+$i;
                        // $data['VendorChangeRequest'][$i]['parent_id']=$value->parent_id;
						$data['VendorChangeRequest'][$i]['first_name']=ucwords($value->first_name);
						$data['VendorChangeRequest'][$i]['name']=ucwords($value->name);
						$data['VendorChangeRequest'][$i]['vendor_name']=ucwords($value->vendor_name);
						$data['VendorChangeRequest'][$i]['requested_date']=$created_date;
						$data['VendorChangeRequest'][$i]['reason_of_change']=$value->reason_of_change;
						$data['VendorChangeRequest'][$i]['request_type']=$request_type_array[$value->request_type];
					    $data['VendorChangeRequest'][$i]['status'] = $status;
                        $i++;
                  }
           }
 
   return $data;   
}
//=================Download sheet of Payroll input data  
  /*
  @return :boolean
  @desc: used to check weather kid is exist in vendor_change_request with status pending
  */
  public function isDisplayAction($row_id,$kid_id)
  {
	//SELECT * FROM `vendor_change_request` WHERE (id>1 and status=1 and kid_id=1)
	$whr="(id>'$row_id' and (status=1 || status=2 ||status=3) and kid_id='$kid_id')";
    $rows=$this->db->select('id')->from('vendor_change_request')->where($whr,null,false)->get()->num_rows();
    $flag=($rows>0)?true:false;
	return $flag;
  }
}
