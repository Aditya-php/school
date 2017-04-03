<?php 
class  Parents_invoice_mod extends CI_Model
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
    
    function invoice_list_ajax()
    {
		// echo "hiii";
    $requestData = $_REQUEST;
            $columns = array(
                '',
                'id',
			    'id',
				 'vendor_name',
				'amount',
				'invoice_date',
				'due_date',
              
				'image',
			    'invoice_status',
			     'approval_status'
				 // ''
				
            );
 $sql=$this->db->select('i.image,i.amount,i.id,i.invoice_date,i.invoice_status,i.approval_status,i.due_date,i.kid_id,i.parent_id,v.vendor_name,
							k.name,u.first_name')
						  ->from('vendor_invoice i')
						  ->join('kids k','k.id= i.kid_id')
						  ->join('users u','u.id= i.parent_id')
						   ->join('vendor_details v','v.user_id= i.vendor_id')
						   ->where('approval_status','3')
						   ->where('i.parent_id',currUserId());
						  
           if (!empty($requestData['search']['value'])) {
                 $ser = strtolower($requestData['search']['value']);
                  if($ser=='unsent'){
					   $sql->where('i.invoice_status','1');
				   }else if($ser=='unpaid'){
					    $sql->where('i.invoice_status','2');
				   }else if($ser=='paid'){
					    $sql->where('i.invoice_status','3');
				   }else if($ser=='pending'){
					    $sql->where('i.approval_status','1');
				   }else if($ser=='disapprove'){
					    $sql->where('i.approval_status','2');
				   }else if($ser=='approve'){
					    $sql->where('i.approval_status','3');
				   }else{
						$sql->where("(i.image like '%$ser%'");
						$sql->or_where("i.amount like '%$ser%' ");
						$sql->or_where("i.invoice_date like '%$ser%' ");
						$sql->or_where("i.kid_id like '%$ser%' ");
						$sql->or_where("u.first_name like '%$ser%' ");
						$sql->or_where("i.parent_id like '%$ser%' ");
						$sql->or_where("v.vendor_name like '%$ser%' ");
						$sql->or_where("k.name like '%$ser%' ");
						$sql->or_where("i.due_date like '%$ser%')");
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
       
            foreach ($query as $row) {
			// pr($row);die;
                $approve= '<a class="Edit" title="Edit" href="'.base_url().'admin/admin_invoice/approve/'.ID_encode($row->id).'/3" data-toggle="tooltip" data-placement="top">Approve</a>&nbsp;&nbsp;&nbsp;' ;
                
                $disapprove= '<a class="Edit" title="Edit" href="'.base_url().'admin/admin_invoice/approve/'.ID_encode($row->id).'/2" data-toggle="tooltip" data-placement="top">Disapprove</a>&nbsp;&nbsp;&nbsp;' ;

$pay= '<a  href="">Pay</a>&nbsp;&nbsp;&nbsp;' ;				
				
               $invoice_status='';    
                   if($row->invoice_status=='1'){
					$invoice_status= '<span class="label label-sm label-danger"> Unsent </span>';
				}else if($row->invoice_status=='2'){
					$invoice_status= '<span class="label label-sm label-danger"> Unpaid </span>';
				}else if($row->invoice_status=='3'){
					$editstr=$deltr='';
					$invoice_status= '<span class="label label-sm label-success"> Paid </span>';
				} 
				$approval_status='';    
                   if($row->approval_status=='1'){
					$approval_status= '<span class="label label-sm label-danger"> Pending </span>';
				}else if($row->approval_status=='2'){
					$approval_status= '<span class="label label-sm label-danger"> Disapprove </span>';
				}else if($row->approval_status=='3'){
					$editstr=$deltr='';
					$approval_status= '<span class="label label-sm label-success"> Approve </span>';
				} 
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
				  $nestedData[] = $row->id;
				  $nestedData[] = ucwords($row->vendor_name);
				$nestedData[] = $row->amount;
				$nestedData[] = date('d-m-y',strtotime($row->invoice_date));
				$nestedData[] = date('d-m-y',strtotime($row->due_date));
              
				
			    $nestedData[] = '<a href="'.base_url().'assets/upload_image/'.$row->image.'" download>'.$row->image.'</a>';
				$nestedData[] = $invoice_status;
				$nestedData[] = $pay;
			    // $nestedData[] = $approve.$disapprove;
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
	
	
	function fetch_export_data()
	{
		 $sql=$this->db->select('i.image,i.amount,i.id,i.invoice_date,i.invoice_status,i.approval_status,i.due_date,
		 i.kid_id,i.parent_id,v.vendor_name,
							k.name,u.first_name')
						  ->from('vendor_invoice i')
						  ->join('kids k','k.id= i.kid_id')
						  ->join('users u','u.id= i.parent_id')
						   ->join('vendor_details v','v.user_id= i.vendor_id')
						   ->where('approval_status','3')
						   ->where('i.parent_id',currUserId())
						   ->order_by('id','desc')
						  ->get();
	return ($sql->num_rows()>0)? $sql->result() :array();//pr($areadata);die;
	}

	   
	   
	   

	   
	   //=================Download sheet of Payroll input data  sheet========================//
function export_invoice()
{

    $data=array();
     $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	    if(!empty($all_id))
		{
			$this->db->where_in('i.id',$all_id);
		}
     $AdminInvoice=$this->fetch_export_data();//pr($AdminInvoice);die;
	 // $citydata=($qry->num_array()>0)? $qry->result() :array();
     
     if(isset($AdminInvoice) && !empty($AdminInvoice))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'kid_id'  =>" S.No.",
                        'id'  =>" Invoice Id",
						'vendor_name'  =>" Vendor Name",
						'invoice_date' =>  "Invoice Date",
						'due_date' =>  "Due Date",
                        'amount' =>  "amount",
                        'invoice_status' =>  "Invoice Status"
						
						// 'image' =>  "Start Date",
						// 'first_name' =>  "first_name",
						// 'name' =>  "name",
						// 'approval_status' =>  "approval_status",
					
						   ),
                    );
 
 
                   $i=1; 
                    foreach($AdminInvoice as $value)
                    {    	
					if($value->invoice_status == '1')
					{
						$invoice_status = 'Unsent';
					}else if($value->invoice_status == '2'){
						$invoice_status = 'Unpaid';
					}else if($value->invoice_status == '3'){
						$invoice_status = 'Paid';
					}
					if($value->approval_status == '1')
					{
						$approval_status = 'Pending';
					}else if($value->approval_status == '2'){
						$approval_status = 'Disapprove';
					}else if($value->approval_status == '3'){
						$approval_status = 'Approve';
					}
                        $data['AdminInvoice'][$i]['kid_id']=+$i;
						$data['AdminInvoice'][$i]['id']=$value->id;
                        $data['AdminInvoice'][$i]['amount']=$value->vendor_name;
						$data['AdminInvoice'][$i]['image']=$value->amount;
					    $data['AdminInvoice'][$i]['invoice_date']=date('d-m-y',strtotime($value->invoice_date));
					    $data['AdminInvoice'][$i]['due_date'] = date('d-m-y',strtotime($value->due_date));
						// $data['AdminInvoice'][$i]['first_name'] = ucwords($value->first_name);
						// $data['AdminInvoice'][$i]['name'] = ucwords($value->name);
						// $data['AdminInvoice'][$i]['approval_status'] = $approval_status;
						$data['AdminInvoice'][$i]['invoice_status'] = $invoice_status;
                          $i++;
                       
                  }
                 
     }
 
   return $data;   
} 

//=================Download sheet of Payroll input data  sheet========================//
  	   function get_invoice_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			$qry=$this->db->select('*')
					 ->from('vendor_invoice')
					 ->get();
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   } 
	   
	 	 function change_status($id=null,$curr_status)
	 {
		    if($id)
			 {
				$postdata['approval_status']=$curr_status;
				$qry = $this->db->update('vendor_invoice',$postdata,array('id'=>$id));
				// echo $this->db->last_query(); die;
			} 
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   }   
	   
	    	 // function paid_status($id=null,$curr_status)
	 // {
		    // if($id)
			 // {
				// $postdata['invoice_status']=$curr_status;
				// $qry = $this->db->update('vendor_invoice',$postdata,array('id'=>$id));
				//echo $this->db->last_query(); die;
			// } 
			 // $data=($qry) ? "1" : "0";
			 // return $data;
		
	 // }

}
