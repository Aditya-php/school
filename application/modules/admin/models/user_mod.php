<?php 
class  User_mod extends CI_Model
{
	
	
	function __construct() 
	{
		parent::__construct();
		
	}
    

       /**
     * get_area_list
     *
     * This function check to fetch  city
     * 
     * @access	public
     * @return	boolean
    */ 
	function permission()
{
	$qry =$this->db->select('*')
	           ->from('roles')
			   ->get();
 return ($qry->num_rows()>0) ? $qry->result() : array();
}
	   function get_user_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			}
			$qry=$this->db->select('*')
					 ->from('users')
					 ->get();
							//echo $this->db->last_query();die;
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   } 
	  	function permissionData()
      	{
		$qry = $this->db->select('*')
		           ->from('roles')
					->get();
				 if($qry->num_rows()>0){
				  $data['permissions']=	$qry->row()->permissions;//pr($data['permissions']);die;
				}
				 // $data1 = ($qry->num_rows()>0)? $qry->result() :array();pr($data1);die;
	  }
 public function add_user()
    {
		$password = $this->security->xss_clean($this->input->post('password', true));
		$new_pass     =  $this->security->xss_clean($this->input->post('new_pass',true));
		
		$salt = '';
        $salt = generate_salt();
        $salt = '$6$rounds=5000$' . $salt . '$';
        $password_encrypt = crypt($password,$salt);
        $arr_encrypt = explode('$', $password_encrypt);
        $password = $arr_encrypt['4'];
		
		
        $data['first_name'] = strtolower($this->input->post('first_name', true));
        $data['last_name'] = strtolower($this->input->post('last_name', true));      
        $data['email'] = $this->input->post('email', true);
		$data['contact_number'] = $this->input->post('contact_number', true);
		$data['role_id'] = $this->input->post('role_id', true);
		// $data['permissions'] = $permission;
        $data['password'] = $password;
        $data['salt'] = $salt;
		$data['created'] 	= current_date();
        $data['last_login'] = current_date();
	    $data['user_type'] 	= 2;			
        $data['status'] 	= 'active';
	    $data['created_by']=currUserId();
	     $qry = $this->db->select('*')
		           ->from('roles')
				   ->where('id',$data['role_id'] = $this->input->post('role_id', true))
					->get();
				 if($qry->num_rows()>0){
				  $data['permissions']=	$qry->row()->permissions;//pr($data['permissions']);die;
				}
				
				 $this->db->insert("users",$data);
				
		// echo $this->db->last_query();die;
        $ins_id = $this->db->insert_id();

        if ($ins_id) {
           $res = '1';
	    }else {
            $res		=	'0';          
        }
		 return $res;
	 }

       function user_list_ajax()
    {
            $requestData = $_REQUEST;
            $columns = array(
                '',
				'id',
                'first_name',
				'last_name',
				'email',
				'contact_number',
				'role',
                'status',
                ''
            );
     
            $sql=$this->db->select('u.id,r.name,u.first_name,u.last_name,u.email,u.contact_number,u.status',false)
						  ->from('users u')
						  ->where('u.user_type','2')
                          ->where('u.status','active')
						  ->join('roles r','u.role_id=r.id','left');
				
        
		if (!empty($requestData['search']['value'])) {
                $ser = strtolower($requestData['search']['value']);
                $sql->where("(LOWER(u.first_name) like '%$ser%'");
                $sql->or_where("LOWER(u.last_name) like '%$ser%' ");
                $sql->or_where("u.contact_number like '%$ser%' ");
                $sql->or_where("u.email like '%$ser%' ");
                $sql->or_where("LOWER(r.name) like '%$ser%' ");
			    $sql->or_where("LOWER(u.email) like '%$ser%' ");
                $sql->or_where("LOWER(u.status) like '%$ser%')");
                
             }
             
             //$sql->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
             $sql->order_by('u.id', 'desc'); 
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);   
             }
             
            $query = $sql->get()->result();
            $totalData = $totalFiltered = $sql1->get()->num_rows();             
            $data = array();
            $sr_no = $requestData['start'];
           //  pr($query);die;
            foreach ($query as $row) {
				     // pr($row->id);die;
                $editstr= '<a class="Edit" title="Edit" href="'.base_url().'admin/user/edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;' ;
                $deltr='<a href="'.base_url().'admin/user/delete/'.ID_encode($row->id).'" onclick="return confirm('."'Are you sure to delete this record?'".');" title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id=""><i class="fa fa-trash"></i></a>';        
                
                $stat_sstr= ($row->status=='active') ? '<span class="label label-sm label-success"> Active </span>' 
                                                  : ' <span class="label label-sm label-danger">   Inactive </span> ';         
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
				$nestedData[] = ucwords($row->first_name);
                $nestedData[] = ucwords($row->last_name);
				$nestedData[] = $row->email;
				$nestedData[] = $row->contact_number;
				$nestedData[] = ucwords($row->name);
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
	
	
	
	 function save_user($id=null)
	   {
		   $result ="";
		  $postdata = $this->input->post(NULL,TRUE);//print_r($postdata);
			 if($id)
			 {
				$qry =$this->db->select('permissions')
								->from('roles')
				                ->where('id',$postdata['role_id'])
								->get();
				if($qry->num_rows()>0){
				  $postdata['permissions']=	$qry->row()->permissions;
				}				
			    // $qry = $this->db->update('users',$postdata,array('id'=>$id));
				 
				 // $result['status']=1;
				 // $result['msg']=($qry) ? "Great!! User is updated successfully" : "Some error, try again";
				 
				 $data['data1'] = $this->get_user_list($id);
				 $db_password =  $data['data1'][0]->password;
			     $db_salt =  $data['data1'][0]->salt;
				 $cur_pass = $this->input->post('password');
				 $new_pass = $this->input->post('new_pass');
				 $con_pass = $this->input->post('con_pass');
				 if(!empty($cur_pass) && !empty($new_pass) && !empty($con_pass))
				 {
						//match current password 
						 $ck_pass	          =   crypt($cur_pass,$db_salt);
						 $ck_encrypt		      =   explode('$',$ck_pass);
						 $old_pass		      =	$ck_encrypt['4'];
						if($old_pass == $db_password)
						{
								$salt				=	generate_salt();
								$postdata['salt']				=	'$6$rounds=5000$'.$salt.'$';
								$password_encrypt	=	crypt($new_pass,$postdata['salt'] );
								$arr_encrypt_new	=	explode('$',$password_encrypt);
								$postdata['password']			=	$arr_encrypt_new['4']; 
							
								unset($postdata['new_pass']);
								unset($postdata['con_pass']);
								$this->db->where('id',$id);
								$postdata['modified_by']=currUserId();
								$response = $this->db->update('users',$postdata);
							// echo $this->db->last_query();die;
							   $result['status']=1;
							   $result['msg']=($qry) ? "Great!! User is updated successfully" : "Some error, try again";
							
						}
						else
						{
							 $result['status']=0;
							 $result['msg']= 'Current password does not match';
							
							
						} 					 
				 }	
                else 
				{
					unset($postdata['new_pass']);
					unset($postdata['con_pass']);
					unset($postdata['password']);
					
					$postdata['modified_by']=currUserId();
					$this->db->where('id',$id);
					$response = $this->db->update('users',$postdata);
					// echo $this->db->last_query();die;
					$result['status']=1;
					$result['msg']=($qry) ? "Great!! User is updated successfully" : "Some error, try again";
				}					
			} 
			
			return $result;
		
	   } 
	 
	   //=================Download sheet of Payroll input data  sheet========================//
	   	

function export_user()
{
    // $data=array();
	$all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	 if(!empty($all_id))
		{
			$this->db->where_in('u.id',$all_id);
		}
		$sql=$this->db->select('r.id,r.name,u.first_name,u.last_name,u.email,u.contact_number,u.status')
								  ->from('users u')
								   ->order_by('u.id', 'desc')
								  ->join('roles r','u.role_id=r.id','left')
								   ->where('u.user_type','2')
								   ->where('u.status','active')
								   ->get();
		
    $userdata = ($sql->num_rows()>0)? $sql->result() :array();
		
     if(isset($userdata) && !empty($userdata))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"S.No.",
                        'first_name' =>  "First Name",
						'last_name' =>  "Last Name",
						'email' =>  "Email",
						'contact_number' =>  "Mobile Number",
						'role_id' =>  "Role Name",
						'status'=>  "Status"
                        ),
                    );
    
    
                   $i=1; 
                    foreach($userdata as $value)
                    { 
                     
            
                        $data['userdata'][$i]['id']=+$i;
                        $data['userdata'][$i]['first_name']=ucwords($value->first_name);
						$data['userdata'][$i]['last_name']=ucwords($value->last_name);
                        $data['userdata'][$i]['email'] = $value->email; 
						$data['userdata'][$i]['contact_number'] = $value->contact_number;
						$data['userdata'][$i]['name'] = ucwords($value->name); 
						$data['userdata'][$i]['status'] = $value->status;
                        
                        
                        $i++;
                       
                  }
                 
      
         
 
 }
   return $data;   
}
//=================Download sheet of Payroll input data  sheet========================//
		public function dbupdate($table,$data,$where_con)
	{
		if(!empty($data) && !empty($table))
		{
			if(!empty($where_con))
			{
				foreach($where_con as $key=>$val)
				{
					$this->db->where($key,$val,false);
				}
			}			
			return $this->db->update($table, $data); 
			// echo $this->db->last_query();die;
		}
	}
		
		public function get_record($table,$row,$feild='',$where_con='')
	{
		if(!empty($table) && !empty($row))
		{
			if(!empty($feild))
			{
				$get_feild = implode(',',$feild);
				$this->db->select($get_feild,false);
			}else{
				$this->db->select('*');
			}
			
			if(!empty($where_con))
			{
				foreach($where_con as $key=>$val)
				{
					$this->db->where($key,$val,false);
				}
			}
			$this->db->from($table);
			$query = $this->db->get();
			//echo $this->db->last_query(); die;
			return $row1 = $query->$row();	
			// echo $this->db->last_query();	
		}
	}
	   
}
