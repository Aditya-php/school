<?php 
class  Invoice_mod extends CI_Model
{
	
	
	function __construct() 
	{
		parent::__construct();
		
	}
	
   	public function get_record()
	{
		
   $vendor_id=currUserId();
   $whr="k.id not in (select kid_id from vendor_invoice where vendor_id='$vendor_id')";
   $sql=$this->db->select('CONCAT_WS(" ",u.first_name,u.last_name) as parent_name,k.id,
							k.name as kid_name,k.parent_id',false)
						  ->from('kids k')
						  ->join('users u','u.id= k.parent_id')
						  ->join('appointment_schedular as a','FIND_IN_SET(k.id , a.assigned_kid_ids)')
						  ->where(array('u.status'=>'active','k.status'=>'1'))
						  ->where('a.appointment_status','3')
						  ->where('a.vendor_user_id',$vendor_id)
						  ->where($whr,null,false)
						  ->get();
						  //FIND_IN_SET(k.id , ass.assigned_kid_ids)
    //echo $this->db->last_query();
    //die;	
	return ($sql->num_rows()>0)? $sql->result() :array();//pr($areadata);die;
	}
	
	
	  function save_invoice($id=null)
	   {
		    $alldata = $this->session->all_userdata("userinfo"); 
			 $vendor_id = $alldata['userinfo']->id;
		    $data ="";
		    $postdata = $this->input->post(NULL,TRUE);//print_r($postdata);
			$postdata['vendor_id']=$vendor_id;
		    $postdata['invoice_date']=date('Y-m-d',strtotime($this->input->post('invoice_date',true)));
			$postdata['due_date']=date('Y-m-d',strtotime($this->input->post('due_date',true)));
			$kid_detail=explode('_',$postdata['kid_detail']);   
			$postdata['kid_id']=$kid_detail['0'];
			$postdata['parent_id']=$kid_detail['1'];
			
			$file_data=$this->upload_image1();
			if($file_data['status'] == 'success')
			{
				$postdata['image'] = $file_data['upload_data']['file_name'];
			}
			
			if($id){
				$postdata['modified_date']=date('Y-m-d h:i:s');
				$postdata['modified_by']=currUserId();
	         	$qry = $this->db->update('vendor_invoice',$postdata,array('id'=>$id));//echo $this->db->last_query();die;
			}else{
				$postdata['created_by']=currUserId();
				$postdata['created_date']=date('Y-m-d h:i:s');
				$qry = $this->db->insert('vendor_invoice',$postdata);
			}
			$data=($qry) ? "1" : "0";
			return $data;
		
	   }
	   
	    function upload_image1()
		{
			if(!empty($_FILES['image']['name']) )
			{  
					$new_name = time()."_".$_FILES["image"]['name'];
		   
					$config = array(
					'upload_path'   => "./assets/upload_image/",
					'allowed_types' => "jpg|jpeg|png|tif|gif|JPG|JPEG|png|PNG|docx|pdf",
					'file_name'     => $new_name,
					'remove_spaces' => TRUE
					); 

					$this->load->library('upload');
					$this->upload->initialize($config); 
				    if(!$this->upload->do_upload('image'))
						{
							$error = '';
							$this->upload->display_errors('<p>','</p>');
							$errors = $this->upload->display_errors();
							$array = array('status'=>'error','error' => $this->upload->display_errors());
						}
					  else
					   {
						$array = array('status'=>'success','upload_data' => $this->upload->data());
					   }
			}
			   
			return $array;
		}
		
		

 function invoice_list_ajax()
    {
	        $requestData = $_REQUEST;
            $columns = array(
                // '',
                'id',
				'kid_id',
                'name',
			    'image',
				'amount',
                'i.invoice_date',
                'i.due_date',
				'invoice_status',
				'approval_status',
			     ''
            );

			   $sql=$this->db->select('i.image,i.amount,i.invoice_status,i.approval_status,i.id,i.kid_id,
							k.name,i.due_date,i.invoice_date')
						  ->from('vendor_invoice i')
						  ->join('kids k','k.id= i.kid_id','left')
						  ->where('i.vendor_id',currUserId());
            // $sql=$this->db->select('*')
                          // ->from('vendor_invoice');
				         
						
             if (!empty($requestData['search']['value'])) {
              $ser = strtolower($requestData['search']['value']);
                  if($ser=='pending'){
					   $sql->where('i.invoice_status','1');
				   }else if($ser=='unpaid'){
					    $sql->where('i.invoice_status','2');
				   }else if($ser=='paid'){
					    $sql->where('i.invoice_status','3');
				   }else if($ser=='Invoice Raised'){
					    $sql->where('i.approval_status','1');
				   }else if($ser=='disapprove'){
					    $sql->where('i.approval_status','2');
				   }else if($ser=='approve'){
					    $sql->where('i.approval_status','3');
				   }else{
					$sql->where("(i.image like '%$ser%'");
                    $sql->or_where("i.amount like '%$ser%' ");
                    $sql->or_where("i.kid_id like '%$ser%' ");
                    $sql->or_where("LOWER(k.name) like '%$ser%')");
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
		
                $RaiseInvoice= '<a  href="'.base_url().'vendors/invoice/raiseInvoice/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to Raise this Invoie?'".');"  >Raise Invoice</a>' ;
              
                $invoice_status='';    
                   if($row->invoice_status=='1'){
					$invoice_status= '<span class="label label-sm label-success">  Invoice Raised </span>';
					$RaiseInvoice="";
				}else if($row->invoice_status=='2'){
					$RaiseInvoice="";
					$invoice_status= '<span class="label label-sm label-danger"> Unpaid </span>';
				}else if($row->invoice_status=='3'){
					$editstr=$deltr='';
					$invoice_status= '<span class="label label-sm label-success"> Paid </span>';
				}
                  else if($row->invoice_status=='4'){
				   $invoice_status= '<span class="label label-sm label-danger"> Pending </span>';
				} 				
				$approval_status='';    
                   if($row->approval_status=='1'){
					$approval_status= '<span class="label label-sm label-danger"> Pending </span>';
				}else if($row->approval_status=='2'){
					$approval_status= '<span class="label label-sm label-danger"> Disapprove </span>';
				}else if($row->approval_status=='3'){
					$approval_status= '<span class="label label-sm label-success"> Approve </span>';
				}
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = $row->id;
		        $nestedData[] = $row->kid_id;
                $nestedData[] = ucwords($row->name);
				$nestedData[] = '<a href="'.base_url().'assets/upload_image/'.$row->image.'" download>'.$row->image.'</a>';
				$nestedData[] = $row->amount;
                $nestedData[] = date("d-m-y",strtotime($row->invoice_date));
                $nestedData[] = date("d-m-y",strtotime($row->due_date));
				$nestedData[] = $invoice_status;
                $nestedData[] = $approval_status;
			    $nestedData[] = $RaiseInvoice;
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
	   
	 // function fetch_export_details()
	   // {
		    // $alldata = $this->session->all_userdata("userinfo"); $id1=$alldata['userinfo']->id;//pr($id1);die;
		    // $sql=$this->db->select('i.image,i.amount,i.invoice_status,i.approval_status,i.id,i.kid_id,
							// k.name')
						  // ->from('vendor_invoice i')
						  // ->join('kids k','k.id= i.kid_id','left')
						  // ->order_by('i.id','desc')
						   // ->where('i.id',$id1)
						  // ->get();
						  // echo $this->db->last_query();die;
	// return ($sql->num_rows()>0)? $sql->result() :array();//pr($areadata);die;
	   // }
function export_invoice($vendor_id)
{
	
    $data=array();
	   $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	    if(!empty($all_id))
		{
			$this->db->where_in('i.id',$all_id);
		}
    
	$sql=$this->db->select('i.image,i.amount,i.invoice_status,i.approval_status,i.id,i.kid_id,i.invoice_date,
                i.due_date,
							k.name')
						  ->from('vendor_invoice i')
						  ->join('kids k','k.id= i.kid_id','left')
						  ->order_by('i.id','desc')
						   ->where('i.vendor_id',$vendor_id)
						  ->get();
						  // echo $this->db->last_query();die;
$InvoiceData = ($sql->num_rows()>0)? $sql->result() :array();//pr($areadata);die;
	                 // pr($InvoiceData);die;
	  if(isset($InvoiceData) && !empty($InvoiceData))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>" S.No.",
						'kid_id'  =>" Kid Id",
						 'name' =>  "Kid Name",
						'image' =>  "Image",
						'invoice_date' =>  "Invoice Date",
						'due_date' =>  "Due Date",
						'approval_status' =>  "Approval status",
						'invoice_status' =>  "Invoice status",
						   ),
                    );
                   $i=1; 
                    foreach($InvoiceData as $value)
                    { 
					if($value->invoice_status == '1')
					{
						$invoice_status = 'Invoice Raise';
					}else if($value->invoice_status == '2'){
						$invoice_status = 'Unpaid';
					}else if($value->invoice_status == '3'){
						$invoice_status = 'Paid';
					}
					else if($value->invoice_status == '4'){
						$invoice_status = 'Pending';
					}
					if($value->approval_status == '1')
					{
						$approval_status = 'Pending';
					}else if($value->approval_status == '2'){
						$approval_status = 'Disapprove';
					}else if($value->approval_status == '3'){
						$approval_status = 'Approve';
					}
                        $data['InvoiceData'][$i]['id']=+$i;
						 $data['InvoiceData'][$i]['kid_id']=+$value->kid_id;
                        $data['InvoiceData'][$i]['name']=ucwords($value->name);
						$data['InvoiceData'][$i]['image']=$value->image;
						$data['InvoiceData'][$i]['invoice_date']=date("d-m-y",strtotime($value->invoice_date));
					    $data['InvoiceData'][$i]['due_date'] = date("d-m-y",strtotime($value->due_date));
					    $data['InvoiceData'][$i]['approval_status']=$approval_status;
					    $data['InvoiceData'][$i]['invoice_status'] = $invoice_status;
                          $i++;
                       
                  }
                 
     }
 
   return $data;   
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
        $this->db->delete($mytable); //echo $this->db->last_query(); die;
    }  

	
	}

