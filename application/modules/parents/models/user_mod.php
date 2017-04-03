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
	
	   function get_change_password($current_pass,$new_pass)
   {
       $alldata = $this->session->all_userdata("userinfo");
       $user_id=$alldata['userinfo']->id;
	   $this->db->select('*');
	   $this->db->from('users');
       $this->db->where('id', $user_id );
	   $this->db->where('user_type','3');
	   $this->db->where('status','active');
	   $query = $this->db->get();
	   if($query->num_rows() > 0)
	   {
			//match current password 
			$row                  =   $query->row();
			$ck_pass	          =   crypt($current_pass,$row->salt);//pr($ck_pass);
			$ck_encrypt		      =   explode('$',$ck_pass);
			$old_pass		      =	$ck_encrypt['4'];
		
			if($old_pass == $row->password)
			{
		  
	         //------------- secure encryption-------------------//
				$salt				=	generate_salt();
				$salt				=	'$6$rounds=5000$'.$salt.'$';
				$password_encrypt	=	crypt($new_pass,$salt );
				$arr_encrypt_new	=	explode('$',$password_encrypt);
				$password			=	$arr_encrypt_new['4']; 
				$updateData			=	array('password' => $password,'salt'=>$salt);
				$this->db->where('id', $user_id );
				$updatable			=	$this->db->update('users', $updateData);
				
						$return['valid']		=	true;
						$return['new_password']	=	$new_pass;
						$return['username']		=	$row->user_name;
						$return['email']		=	$row->email;
						return $return;
	   
			}
			else
			{
				$return['valid']		=	false;
				return $return;
			}
	   }
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
			echo $this->db->last_query();
		}
	}
		
		public function get_record()
	{
		
		$sql=$this->db->select('u.first_name,u.last_name,u.email,u.contact_number,u.address,u.id,u.city_id,u.area_id,u.profile_image,
							p.father_name,p.father_job_desc,p.father_contact,p.mother_name,p.mother_job_desc,p.mother_contact,p.emergency_no,p.parent_id')
						  ->from('users u')
						  ->join('parents_detail p','u.id= p.parent_id','left')
						  ->where('u.id',currUserId())
						   ->get();
		return	$areadata = ($sql->num_rows()>0)? $sql->result() :array();
	}
	
	
        
	
		public function find_area_list($id,$area_id=null)
	{  	
		$rData = '<option value="">Select Area</option>';
		$this->db->select('id,area_name');  
						$this->db->from('area_master');  
						$this->db->where('city_id',$id);  
		  $query = $this->db->get(); 
		  // echo $this->db->last_query(); die;
		if($query->num_rows>0)
		{
			
			foreach($query->result() as  $value)
			 {	
				$rData .= '<option value="'.$value->id.'" '.set_select('area_id',$value->id,((!empty($area_id) && ( $value->id == $area_id) ) ? TRUE : FALSE )).' >'.$value->area_name.'</option>';
			 }
		}
		else{
			$rData= '<option value="">No Area Found</option>';
		}
		return $rData;  
} 
}
