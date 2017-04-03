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
	
	   function get_user_list($id=null)
	   {
			if(isset($id) && !empty($id))
			{
				$this->db->where('id',$id);
			
			}
			$qry=$this->db->select('*')
					 ->from('users')
					 ->get();
							echo $this->db->last_query();die;
			return ($qry->num_rows()>0) ? $qry->result() : array();
			
	   } 
	   
	   
 public function add_user()
    {
		
        $password = 123456;
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
        $data['password'] = $password;
        $data['salt'] = $salt;
		$data['created'] 	= current_date();
        $data['last_login'] = current_date();
	    $data['user_type'] 	= 2;			
        $data['status'] 	= 'active';
	
        $this->db->insert("users",$data);
		// echo $this->db->last_query();
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
     
            $sql=$this->db->select('u.id,r.name,u.first_name,u.last_name,u.email,u.contact_number,u.status')
						  ->from('users u')
						  ->where('u.user_type','2')
						  ->join('roles r','u.role_id=r.id','left');
				
        
		if (!empty($requestData['search']['value'])) {
                $ser = $requestData['search']['value'];
                $sql->like('CONCAT(r.name,u.first_name,u.last_name,u.contact_number,u.email,status)',"$ser");
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
                
                $stat_sstr= ($row->status=='active') ? '<a href="javascript:void(0);" title="inactive" id="change_status_9795474665" onclick="return active_func_user(9795474665);"><span class="label label-sm label-success"> Active </span> </a>' 
                                                  : ' <a href="javascript:void(0);" title="active" id="change_status_4461475241" onclick="return active_func_user(4461475241);"><span class="label label-sm label-danger">   Inactive </span> </a>';         
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
				$nestedData[] = $row->first_name;
                $nestedData[] = $row->last_name;
				$nestedData[] = $row->email;
				$nestedData[] = $row->contact_number;
				$nestedData[] = $row->name;
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
		   $data ="";
		  $postdata = $this->input->post(NULL,TRUE);//print_r($postdata);
			 if($id)
			 {
				
				$qry = $this->db->update('users',$postdata,array('id'=>$id));
			 } 
			 else 
			 {
				$qry = $this->db->insert('users',$postdata);
			 }
			 $data=($qry) ? "1" : "0";
			 return $data;
		
	   } 
	 
	   //=================Download sheet of Payroll input data  sheet========================//
function export_user()
{
    // $data=array();
	$sql=$this->db->select('r.id,r.name,u.first_name,u.last_name,u.email,u.contact_number,u.status')
						  ->from('users u')
						  ->join('roles r','u.role_id=r.id')
						  ->get();
    $userdata = ($sql->num_rows()>0)? $sql->result() :array();
	 
     if(isset($userdata) && !empty($userdata))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"Id",
                        'first_name' =>  "First Name",
						'last_name' =>  "Last Name",
						'email' =>  "Email",
						'contact_number' =>  "Mobile Number",
						'role_id' =>  "Role Name",
						'status'=>  "Status"
                        ),
                    );
    
    
                   $i=0; 
                    foreach($userdata as $value)
                    { 
                     
            
                        $data['userdata'][$i]['id']=$value->id;
                        $data['userdata'][$i]['first_name']=$value->first_name;
						$data['userdata'][$i]['last_name']=$value->last_name;
                        $data['userdata'][$i]['email'] = $value->email; 
						$data['userdata'][$i]['contact_number'] = $value->contact_number;
						$data['userdata'][$i]['name'] = $value->name; 
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
			// echo $this->db->last_query();
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
			// echo $this->db->last_query(); 
			return $row1 = $query->$row();	
			// echo $this->db->last_query();	
		}
	}
	
	
}
