<?php 
class  Notice_title_mod extends CI_Model
{
	
	
	function __construct() 
	{
		parent::__construct();
		
	}
   
		  function save_title($id=null)
	   {
		   $alldata = $this->session->all_userdata("userinfo"); 
			 $vendor_id = $alldata['userinfo']->id;
		    $data ="";
		    $postdata = $this->input->post(NULL,TRUE);
			$postdata['vendor_id']=$vendor_id;//print_r($postdata);
		    $postdata['start_date']=date('Y-m-d',strtotime($this->input->post('start_date',true)));
			$postdata['end_date']=date('Y-m-d',strtotime($this->input->post('end_date',true)));
			  
			$file_data=$this->upload_image1();
			if($file_data['status'] == 'success')
			{
				$postdata['image'] = $file_data['upload_data']['file_name'];
			}
			
			if($id){
					$postdata['modified_by']=currUserId();
				$postdata['modified_date']=date('Y-m-d h:i:s');
	         	$qry = $this->db->update('vendor_notice',$postdata,array('id'=>$id));//echo $this->db->last_query();die;
			}else{
					$postdata['created_by']=currUserId();
				$postdata['created_date']=date('Y-m-d h:i:s');
				$qry = $this->db->insert('vendor_notice',$postdata);
			}
			$data=($qry) ? "1" : "0";
			return $data;
		
	   }
	   
	    function upload_image1()
		{
			if(!empty($_FILES['image']['name']) )
			{  
					$new_name = time().'_'.$_FILES["image"]['name'];
		   
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
		
		
 function vendor_list_ajax()
    {
	        $requestData = $_REQUEST;
            $columns = array(
                '',
                'id',
				'notice_title',
                'notice_description',
			    'start_date',
				'end_date',
					'notice_status',
                    'status',
				  ''
            );

            $sql=$this->db->select('*')
                          ->from('vendor_notice')
						      ->where('vendor_id',currUserId());
				         
						
             if (!empty($requestData['search']['value'])) {
                 $ser = strtolower($requestData['search']['value']);
                   if($ser=='pending'){
					   $sql->where('status','1');
				   }else if($ser=='disapprove'){
					    $sql->where('status','2');
				   }else if($ser=='approved'){
					    $sql->where('status','3');
				   }else if($ser=='active'){
					    $sql->where('notice_status','1');
				   }else if($ser=='inactive'){
					    $sql->where('notice_status','2');
				   }
                   else{
					$sql->where("(LOWER(notice_title) like '%$ser%'");
                    $sql->or_where("LOWER(notice_description) like '%$ser%' ");
                    $sql->or_where("start_date like '%$ser%' ");
                    $sql->or_where("end_date like '%$ser%')");
                   }
				
          
             }
             
         $sql->order_by('id', 'desc');
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
			
			$start_date = $row->start_date;
			$end_date = $row->end_date;
			$StartDate = date("d-m-y",strtotime($start_date));
			$EndDate = date("d-m-y",strtotime($end_date));
			
                $editstr= '<a class="Edit" title="Edit" href="'.base_url().'vendors/notice_title/edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;' ;
                $deltr='<a href="'.base_url().'vendors/notice_title/delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>&nbsp;&nbsp;&nbsp;';    $stat_sstr='';    
                   if($row->status=='1'){
					$stat_sstr= '<span class="label label-sm label-danger"> Pending </span>';
				}else if($row->status=='2'){
					$stat_sstr= '<span class="label label-sm label-danger"> Disapprove </span>';
				}else if($row->status=='3'){
					$editstr=$deltr='';
					$stat_sstr= '<span class="label label-sm label-success"> Approved </span>';
				} 
                 if($row->notice_status=='1'){
					$notice_sstr= '<span class="label label-sm label-success"> Active </span>';
				}else if($row->notice_status=='2'){
					$notice_sstr= '<span class="label label-sm label-danger"> Inactive </span>';
				}
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
				 $nestedData[] = $row->notice_title;		
                $nestedData[] = $row->notice_description;
				$nestedData[] = $StartDate;
				 $nestedData[] = $EndDate;
                 $nestedData[] = $notice_sstr;
			    $nestedData[] = $stat_sstr;
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

   
   	   // function get_vendor_list()
	   // {
			 // $alldata = $this->session->all_userdata("userinfo"); $id1=$alldata['userinfo']->id;//pr($id1);die;
	         // $qry=$this->db->select('*')
					 // ->from('vendor_notice')
					  // ->order_by('id','desc')
					  // ->where('id',$id1)
					 // ->get();
			// return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   // } 
function export_vendor($vendor_id)
{

    $data=array();
     $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	    if(!empty($all_id))
		{
			$this->db->where_in('id',$all_id);
		}
     $qry=$this->db->select('*')
					 ->from('vendor_notice')
					  ->order_by('id','desc')
					  ->where('vendor_id',$vendor_id)
					 ->get();
					 // echo $this->db->last_query();die;
			$Notice = ($qry->num_rows()>0) ? $qry->result() : array();;
	 // $citydata=($qry->num_array()>0)? $qry->result() :array();
     
     if(isset($Notice) && !empty($Notice))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>" Id",
						'notice_title' =>"Notice Title",
                        'notice_description' =>  "Notice Description",
						'start_date' =>  "Start Date",
						'end_date' =>  "End Date",
						'status' =>  "status",
						   ),
                    );
 
     
                   $i=1; 
                    foreach($Notice as $value)
                    { 
					
			if($value->status == '1')
			{
				$status = 'pending';
			}
			else if($value->status == '2')
			{
				$status = 'Disapprove';
			}
			else if($value->status == '3'){
				$status = 'Approved';
			}
                        $data['Notice'][$i]['id']=+$i;
					    $data['Notice'][$i]['notice_title']=$value->notice_title;
                        $data['Notice'][$i]['notice_description']=$value->notice_description;
						$data['Notice'][$i]['start_date']=date("d-m-y",strtotime($value->start_date));
					    $data['Notice'][$i]['end_date']=date("d-m-y",strtotime($value->end_date));
					    $data['Notice'][$i]['status'] = $status;
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
        $this->db->delete($mytable); 
    }  

	
	}

