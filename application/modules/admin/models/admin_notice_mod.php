<?php 
class  Admin_notice_mod extends CI_Model
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
	
	     // $sql = $this->db->select('a.vendor_user_id,v.vendor_id,v.notice_title,v.notice_description,v.start_date,v.end_date,v.image,v.status')
	                // ->from('appointment_schedular a')
					// ->join('vendor_notice v','v.vendor_id = a.vendor_user_id');
    
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
				'image',
				'status',
				''
            );

            $sql=$this->db->select('*')
                          ->from('vendor_notice');
				         
						
             if (!empty($requestData['search']['value'])) {
                $ser = strtolower($requestData['search']['value']);
                   if($ser=='pending'){
					   $sql->where('status','1');
				   }else if($ser=='disapprove'){
					    $sql->where('status','2');
				   }else if($ser=='approved'){
					    $sql->where('status','3');
				   }else{
						$sql->where("(LOWER(notice_title) like '%$ser%'");
						$sql->or_where("LOWER(notice_description) like '%$ser%' ");
						$sql->or_where("start_date like '%$ser%' ");
						$sql->or_where("end_date like '%$ser%' ");
						$sql->or_where("image like '%$ser%')");
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
			
                $approve= '<a class="Edit" title="Edit" href="'.base_url().'admin/admin_notice/approve/'.ID_encode($row->id).'/3/'.ID_encode($row->vendor_id).'" data-toggle="tooltip" data-placement="top">Approve</a>&nbsp;&nbsp;&nbsp;' ;
                
                $disapprove= '<a class="Edit" title="Edit" href="'.base_url().'admin/admin_notice/approve/'.ID_encode($row->id).'/2" data-toggle="tooltip" data-placement="top">Disapprove</a>&nbsp;&nbsp;&nbsp;' ;
				
                   if($row->status=='1'){
					$stat_sstr= '<span class="label label-sm label-danger"> Pending </span>';
				}else if($row->status=='2'){
					$disapprove='';
					$stat_sstr= '<span class="label label-sm label-danger"> Disapprove </span>';
				}else if($row->status=='3'){
					$approve='';
					$stat_sstr= '<span class="label label-sm label-success"> Approved </span>';
				} 
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
			    $nestedData[] = $row->notice_title;
                $nestedData[] = $row->notice_description;
				$nestedData[] = $StartDate;
				 $nestedData[] = $EndDate;
                $nestedData[] = '<a href="'.base_url().'assets/upload_image/'.$row->image.'" download>'.$row->image.'</a>';
			      $nestedData[] = $stat_sstr;
                $nestedData[] = $approve.$disapprove;
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
	
	
	
	 function change_status($id=null,$curr_status,$vendor_id)
	 {
		 // pr(ID_decode($vendor_id));die;
		    if($id)
			 {
				$postdata['status']=$curr_status;
				$qry = $this->db->update('vendor_notice',$postdata,array('id'=>$id));
				// echo $this->db->last_query(); die;
				if($curr_status==3 && !empty($vendor_id)){ //approved
				$sql = $this->db->select('DISTINCT(a.user_id),u.id,u.first_name,u.email,u.profile_image')
	                ->from('appointment_schedular a')
					->join('users u','u.id = a.vendor_user_id','left')
					->where('a.vendor_user_id',ID_decode($vendor_id))
	                ->where_in('appointment_status',array('3','6'))
				    ->get();
				
	      $result = ($sql->num_rows()>0) ? $sql->result() : array();//pr(  $result);die;
					 // echo $this->db->last_query();die;
			if(isset($result) && !empty($result)){
                $email = $result[0]->email; //die;
                $image =  $result[0]->profile_image;
			     $attched_file1= $_SERVER["DOCUMENT_ROOT"]."/c3/assets/upload_image/".$image;
				if(isset($image) && !empty($image) && file_exists($attched_file1)){
				  $attched_file= $_SERVER["DOCUMENT_ROOT"]."/c3/assets/upload_image/".$image;
				  $email_data['file'] =   $attched_file ;
				}
                $email_data['to']           =   $email;
                $email_data['from']         =   ADMIN_EMAIL;
                $email_data['sender_name']  =   ADMIN_NAME;
                $email_data['subject']      =   "Notice Approved";
				
			
                $email_data['message']      =   array('header' => "Notice Approved successfully!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;">Hello'."&nbsp;&nbsp;&nbsp;&nbsp;".ucwords($result[0]->first_name).',<br>   <br><span style=" color:#000"> '.$result[0]->email.'</span><br><span style="color:#000;">');
				// pr($email_data['message']);die;
              _sendEmailNew($email_data);   /*email function for mailjet configuration*/
			  
			    $msg= 'Notice Approval mail has been send......';
					    $this->session->set_flashdata('account_create', $msg);
					    redirect('admin/admin_notice/listing') ; 
          
               }
	          }	
			}
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   } 
	   
	   
	   

	   
	   //=================Download sheet of Payroll input data  sheet========================//
function export_notice()
{
    $data=array();
	  $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	 if(!empty($all_id))
		{
			$this->db->where_in('id',$all_id);
		}
  $AdminNotice=$this->get_vendor_list();

 if(isset($AdminNotice) && !empty($AdminNotice))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"Id",
						 'notice_title' =>  "Title",
                        'notice_description' =>  " Notice Description",
						'start_date' =>  "Start Date",
						'end_date' =>  "End Date",
					    'status'=>  "Status"
                        ),
                    );
    
                    $i=1; 
                    foreach($AdminNotice as $value)
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
                        $data['AdminNotice'][$i]['id']=+$i;
						$data['AdminNotice'][$i]['notice_title']=$value->notice_title;
                        $data['AdminNotice'][$i]['notice_description']=$value->notice_description;
						$data['AdminNotice'][$i]['start_date']=date("d-m-y",strtotime($value->start_date));
						$data['AdminNotice'][$i]['end_date']=date("d-m-y",strtotime($value->end_date));
					    $data['AdminNotice'][$i]['status'] = $status;
                        $i++;
                  }
            }
  return $data;   
}
//=================Download sheet of Payroll input data  sheet========================//
 	   function get_vendor_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			$qry=$this->db->select('*')
					 ->from('vendor_notice')
					 ->order_by('id','desc')
					 ->get();
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   }
function send_notice_mail($notice_id)
{

	$qry = $this->db->select('vendor_id')
	         ->from('vendor_notice')
			 ->where_in('id',$notice_id)
			 ->get();
	$vendor_id =($qry->num_rows()>0) ? $qry->result() : array();
	$vendor_ids = $vendor_id[0]->vendor_id;
		if(!empty($vendor_id)){
	$sql = $this->db->select('DISTINCT(a.user_id),u.id,u.first_name,u.email')
	                ->from('appointment_schedular a')
					->join('users u','u.id = a.vendor_user_id','left')
					->where_in('a.vendor_user_id',$vendor_ids)
	                ->where_in('appointment_status',array('3','6'))
				    ->get();
	 $result = ($sql->num_rows()>0) ? $sql->result() : array();
	 // pr($result);die;
	  if(isset($result) && !empty($result)){
                $email = $result[0]->email; //die;
	            $image =  $result[0]->profile_image;
			    $attched_file1= $_SERVER["DOCUMENT_ROOT"]."/c3/assets/upload_image/".$image;
				if(isset($image) && !empty($image) && file_exists($attched_file1))
				{
				   $attched_file= $_SERVER["DOCUMENT_ROOT"]."/c3/assets/upload_image/".$image;
				   $email_data['file'] =   $attched_file ;
				}
	            $email_data['to']           =   $email;
                $email_data['from']         =   ADMIN_EMAIL;
                $email_data['sender_name']  =   ADMIN_NAME;
                $email_data['subject']      =   "Appointment Asign";
			    $email_data['message']      =   array('header' => "Notice Approved successfully!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;">Hello'."&nbsp;&nbsp;&nbsp;&nbsp;".ucwords($result[0]->first_name).',<br>   <br><span style=" color:#000"> '.$result[0]->email.'</span><br><span style="color:#000;">');
				 _sendEmailNew($email_data); 
            }
		}
		    $data=($qry) ? "1" : "0";
			 return $data;
      }	   

}
