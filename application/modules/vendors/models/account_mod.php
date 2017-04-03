<?php 
class Account_mod extends CI_Model
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
	   $this->db->where('user_type','4');
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
	
	
	    function get_sites()
    {
		$this->db->select("*");
		$query	=	$this->db->get($this->tbl_socialmedia_sites);
		if ($query->num_rows() > 0) {
			$data['status']		=	'success';
            $data['result']		=	$query->result();
		} else {
			$data['status']		=	'error';
			
		}
		return $data;
	}
	
	function edit($siteId = array())
	{
		
		$this->db->set('status','inactive');
		$this->db->update($this->tbl_socialmedia_sites);
		if(count($siteId))
		{
			$this->db->where_in("id",$siteId);
			$this->db->set('status','active');
			$this->db->update($this->tbl_socialmedia_sites);
			
		}
		$rs['status']	=	"success";
		return $rs;
		
	}
	
	/* *
	*	create function for add vendor in formation
	* 	craeted by santosh kumat
	*	created date : 05/03/2017.
	*/
	
	public function add_vendor($data)
	{	//pr($data);die;
		$location	=	$data['location_vendor'];
		unset($data['location_vendor']);
		$data['created_date'] 	= date("Y-m-d h:i:s");
		$data['modified_date'] 	= date("Y-m-d h:i:s");
		
		// user details
		$users['user_name']			=	$data['vendor_name'];
		$users['contact_number']	=	$data['moblie_1'];
		$users['email']				=	$data['email'];
		$users['created']			=	date("Y-m-d h:i:s");
		$users['user_type']			=	4;
		// password generate
		
		if ($users['email']) 
		{
			$mail_password		=	random_string('alnum', 6);
			
			//------------- secure encryption-------------------
			$salt				=	generate_salt();
			$salt				=	'$6$rounds=5000$'.$salt.'$';
			$password_encrypt	=	crypt($mail_password,$salt );
			$arr_encrypt_new	=	explode('$',$password_encrypt);
			$password			=	$arr_encrypt_new['4']; 
			$updateData			=	array('password' => $password,'salt'=>$salt);
			
			$users['password']  = $password;
			$users['salt']  	= $salt;
			$users['status']  	= ($data['v_status'] == 1 || isset($data['v_status']))?'active':'inactive';

			// mail
			$login_link	                =   base_url().'admin/auth';
			$email_data['to']           =   $users['email'];
			$email_data['from']         =   ADMIN_EMAIL;
			$email_data['sender_name']  =   ADMIN_NAME;
			$email_data['subject']      =   "Vendor Login Detail";
			$email_data['message']      =   array('header' => "Vendor Details created successfully".' !','body' => '<div style="width:700px;margin:0 auto;font-family: arial;border:0px solid #ccc;"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="font-size: 14px;font-family:arial;border:1px solid #ccc"><thead><tr><th width="43%" align="left" valign="top" bgcolor="#37444e" style="padding:14px;font-size: 14px;border-bottom: 1px solid #ccc;">
			<img src="'.base_url().'assets/front/images/logo.png" alt=""/></th><th width="57%" align="left" valign="middle" bgcolor="#37444e" style="padding:14px; color:#fff; font-family:arial, helvetica, sans-serif; font-weight:bold; font-size:16px;border-bottom: 1px solid #ccc;"><span style="margin:0px; float:left;"></span></th></tr></thead><tbody><tr><td style="padding:2px 14px 15px;font-size: 14px;" colspan="2" align="left" valign="top"><font face="Arial, Helvetica, sans-serif;"><br/><br/>Hello' .$data['vendor_name'].'!<br/><br/><br><br>your login detail is <br /><br />Email :'.$data['email'].'<br />  Password: '.$mail_password.'<br><br><a href="'.$login_link.'">Click here for login</a>	</font></td></tr><tr><td style="padding: 14px; font-size: 13px; font-style: italic; font-weight: bold;color: #333;" colspan="2" align="left" valign="top"><font face="Arial, Helvetica, sans-serif">,<br/><br> <br/><br/></font></td></tr></tbody></table></div>');
		   _sendEmailNew($email_data); 
		}
		$this->db->insert("users",$users);
		$user_id = $this->db->insert_id();
		
		if($user_id){
			$data['user_id'] = $user_id;
			$data['staff_ratio'] = $data['staff_ratio_1'].':'.$data['staff_ratio_2'];
			unset($data['staff_ratio_1']);
			unset($data['staff_ratio_2']);
			$this->db->insert("vendor_details",$data);
			// echo $this->db->last_query();
			$vendor_id = $this->db->insert_id();
			
			if($vendor_id) {
				$vendor_location = json_decode($location,true);
				if(!empty($vendor_location)){
					if($vendor_location['city']){
						$i = 0;
						foreach($vendor_location['city'] as $locations){
							$locationData['vendor_id'] 				= $vendor_id;
							$locationData['city'] 				= isset($vendor_location['city'][$i])?$vendor_location['city'][$i]:'';
							$locationData['area_id'] 				= isset($vendor_location['area_id'][$i])?$vendor_location['area_id'][$i]:'';
							$locationData['address'] 				= isset($vendor_location['address'][$i])?$vendor_location['address'][$i]:'';
							$locationData['pin_code'] 				= isset($vendor_location['pin_code'][$i])?$vendor_location['pin_code'][$i]:'';
							$locationData['nature_of_location'] 	= isset($vendor_location['nature_of_location'][$i])?$vendor_location['nature_of_location'][$i]:'';
							$locationData['other'] 				= isset($vendor_location['location_other'][$i])?$vendor_location['location_other'][$i]:'';
							$locationData['created_date'] 			= date("Y-m-d h:i:s");
							$locationData['modified_date'] 		= date("Y-m-d h:i:s");
							//pr($locationData);die;
							$this->db->insert("vendor_location",$locationData);
							$i++;
						}
					}
				}
				
				return true;
			  
			}else {
			   return false;          
			}
		}
	}
	
	/* 
	* 	Function create for get vendor details
	*	created by santosh kumar
	*
	*/
	
	function get_vendor($id)
    {
		$this->db->select("*");
		$query	=	$this->db->get_where('vendor_details',array('id'=>$id));
		if ($query->num_rows() > 0) {
			$data['status']		=	'success';
            $data['result']		=	(array)$query->row();
		} else {
			$data['status']		=	'error';
			
		}
		return $data;
	}
	
	/* 
	* 	Function create for get vendor location
	*	created by santosh kumar
	*
	*/
	
	function get_vendor_location($id)
    {
		$this->db->select("*");
		$query	=	$this->db->get_where('vendor_location',array('vendor_id'=>$id));
		if ($query->num_rows() > 0) {
			$data['status']		=	'success';
            $data['result']		=	$query->result_array();
		} else {
			$data['status']		=	'error';
			
		}
		return $data;
	}
	
	/* *
	*	create function for update vendor in formation
	* 	craeted by santosh kumat
	*	created date : 07/03/2017.
	*/
	
	public function update_vendor($id,$data)
	{	//pr($data);die;
		if(isset($data['location_vendor'])){
			$location	=	$data['location_vendor'];
			unset($data['location_vendor']);
			$this->db->where('vendor_id',$id);
			$this->db->delete('vendor_location');
		}
		
		$data['modified_date'] 	= date("Y-m-d h:i:s");
		if(isset($data['staff_ratio_1']) && isset($data['staff_ratio_2']))
		{
			$data['staff_ratio'] = $data['staff_ratio_1'].':'.$data['staff_ratio_2'];
			unset($data['staff_ratio_1']);
			unset($data['staff_ratio_2']);
		}
		
		$this->db->where('id',$id);
		$this->db->update("vendor_details",$data);
		// echo $this->db->last_query();
		
		if($id) 
		{
			if(isset($location)){
				$vendor_location = json_decode($location,true);
				if(!empty($vendor_location)){
					if($vendor_location['city']){
						$i = 0;
						foreach($vendor_location['city'] as $locations){
							$locationData['vendor_id'] 				= $id;
							$locationData['city'] 				= isset($vendor_location['city'][$i])?$vendor_location['city'][$i]:'';
							$locationData['area_id'] 				= isset($vendor_location['area_id'][$i])?$vendor_location['area_id'][$i]:'';
							$locationData['address'] 				= isset($vendor_location['address'][$i])?$vendor_location['address'][$i]:'';
							$locationData['pin_code'] 				= isset($vendor_location['pin_code'][$i])?$vendor_location['pin_code'][$i]:'';
							$locationData['nature_of_location'] 	= isset($vendor_location['nature_of_location'][$i])?$vendor_location['nature_of_location'][$i]:'';
							$locationData['other'] 				= isset($vendor_location['location_other'][$i])?$vendor_location['location_other'][$i]:'';
							$locationData['created_date'] 			= date("Y-m-d h:i:s");
							$locationData['modified_date'] 		= date("Y-m-d h:i:s");
							//pr($locationData);die;
							$this->db->insert("vendor_location",$locationData);
							$i++;
						}
					}
				}
			}
			
			return true;
		  
		}else {
		   return false;          
		}
	}
	
}
