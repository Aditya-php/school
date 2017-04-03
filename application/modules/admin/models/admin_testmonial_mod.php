<?php 
class  Admin_testmonial_mod extends CI_Model
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
    
    function testmonial_list_ajax()
    {
            $requestData = $_REQUEST;
            $columns = array(
                '',
                'id',
                'parent_id',
				'first_name',
				'last_name',
				'profile_image',
				'description',
				'status',
			     ''
            );
 
             $sql=$this->db->select('test.parent_id,test.description,test.status,test.id,u.first_name,u.last_name,u.profile_image')
						  ->from('testimonial test')
						  ->join('users u','u.id=test.parent_id','left');

                  
            if (!empty($requestData['search']['value'])) {
                $ser = strtolower($requestData['search']['value']);
                   if($ser=='pending'){
					   $sql->where('test.status','1');
				   }else if($ser=='disapprove'){
					    $sql->where('test.status','2');
				   }else if($ser=='approved'){
					    $sql->where('test.status','3');
				   }else{
					$sql->where("(u.id like '%$ser%'");
					$sql->or_where("test.parent_id like '%$ser%' ");
					$sql->or_where("LOWER(u.first_name) like '%$ser%' ");
					$sql->or_where("LOWER(u.last_name) like '%$ser%' ");
					$sql->or_where("LOWER(test.description) like '%$ser%')");
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
				
				 $description =  $row->description;
					    $b = mb_strimwidth($description, 0, 100);
						$descriptionData = mb_strimwidth($b, 0, 50, '...');
                $approve= '<a class="Edit" title="Edit" href="'.base_url().'admin/admin_testmonial/approve/'.ID_encode($row->id).'/3" data-toggle="tooltip" data-placement="top">Approve</a>&nbsp;&nbsp;&nbsp;' ;
              
                $disapprove= '<a class="Edit" title="Edit" href="'.base_url().'admin/admin_testmonial/approve/'.ID_encode($row->id).'/2" data-toggle="tooltip" data-placement="top">Disapprove</a>&nbsp;&nbsp;&nbsp;' ;
				
				 $view= '<a class="Edit" title="View" href="'.base_url().'admin/admin_testmonial/view/'.ID_encode($row->id).'/2" data-toggle="tooltip" data-placement="top"><i class="fa fa-eye" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;' ;
                
                 if($row->status=='1'){
					 
					$stat_sstr= '<span class="label label-sm label-danger"> Pending </span>';
				}else if($row->status=='2'){
					   $disapprove="";
					$stat_sstr= '<span class="label label-sm label-danger"> Disapprove </span>';
				}else if($row->status=='3'){
					 $approve="";
					$stat_sstr= '<span class="label label-sm label-success"> Approved </span>';
				}    
              if(isset($row->profile_image) && !empty($row->profile_image) && file_exists('assets/upload_image/'.$row->profile_image))
			   {
				   $image = '<img src="'.base_url().'/assets/upload_image/'.
				   $row->profile_image.'" height="50px" width="50px">';
			    }else{
			        $image = '<img src="'.base_url().'frontend_assets/img/user-placeholder.png" height="50px" width="50px">';
			    }
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
                $nestedData[] = $row->parent_id;
				 $nestedData[] =ucwords($row->first_name." ".$row->last_name);
				$nestedData[] =  $image;
				
				$nestedData[] = $descriptionData;
                $nestedData[] = $stat_sstr;
                $nestedData[] = $approve.$disapprove.$view;
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
    


	
	
	
	 function change_status($id=null,$curr_status)
	 {
		    if($id)
			 {
				$postdata['status']=$curr_status;
				$qry = $this->db->update('testimonial',$postdata,array('id'=>$id));
				//echo $this->db->last_query(); die;
			} 
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   } 
	   
	   
	   

	   
	   //=================Download sheet of Payroll input data  sheet========================//
function export_testmonial()
{
    $data=array();
	   $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	    if(!empty($all_id))
		{
			$this->db->where_in('test.id',$all_id);
		}
	$qry = $this->db->select('test.parent_id,test.description,test.status,u.id,u.first_name,u.last_name,u.profile_image')
						  ->from('testimonial test')
						  ->join('users u','u.id=test.parent_id','left')
						  ->order_by('test.id','desc')
                           ->get();
						  // echo $this->db->last_query(); die;
             $AdminTestimonial = ($qry->num_rows()>0)? $qry->result() :array();

 // pr($qry->result());die;
	 if(isset($AdminTestimonial) && !empty($AdminTestimonial))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"S.No.",
                        // 'parent_id' =>  " parent id",
						'first_name' =>  "Parent Name",
						'profile_image' =>  "Image",
					    'description' =>  "Description",
					    'status'=>  "Status"
                        ),
                    );
    

                   $i=1; 
                    foreach($AdminTestimonial as $value)
                    { 
					
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
                        $data['AdminTestimonial'][$i]['id']=+$i;
                        // $data['AdminTestimonial'][$i]['parent_id']=$value->parent_id;
						$data['AdminTestimonial'][$i]['first_name']=ucwords($value->first_name);
						$data['AdminTestimonial'][$i]['profile_image']=$value->profile_image;
						$data['AdminTestimonial'][$i]['description']=$value->description;
					    $data['AdminTestimonial'][$i]['status'] = $status;
                        $i++;
                  }
                 
      
         
     }
 
   return $data;   
}
//=================Download sheet of Payroll input data  sheet========================//
	
	   function get_description_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			$qry=$this->db->select('*')
					 ->from('testimonial')
					 ->get();
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   } 
	      function get_data($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('test.id',$id);
			}
 $sql=$this->db->select('test.parent_id,test.description,test.status,test.id,u.first_name,u.last_name,u.profile_image')
						  ->from('testimonial test')
						  ->join('users u','u.id=test.parent_id','left')
						  ->get();
			return ($sql->num_rows()>0) ? $sql->result() : array();
	   }
}
