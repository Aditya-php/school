<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * User Model
 *
 * @package		        Site
 * @subpackage          User
 * @category            User 
 * @author				Arvind Soni
 * @website				http://www.tekshapers.com
 * @company             Tekshapers Inc
 * @since				Version 1.0
 */

class User_mod extends CI_Model {
   var $user_table         = "users";
  

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    
    /**
     * change_pwd
     *
     * this function update user password
     * @access	public
     * @return array
     */ 
    function reset_password() {
        $this->form_validation->set_rules('password', 'Password', "trim|required");
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', "trim|required");
        $this->form_validation->set_rules('new_password', 'New Password', "trim|required");
        
        $arr = $this->input->post(null, true);

        if ($this->form_validation->run() == false) {
            $res['error_msg']   = validation_errors();
            $res['status']      = 'error';
            return json_encode($res);
        }
        else if($arr['confirm_password'] != $arr['new_password'])
        {
            $res['error_msg']   = "New Password and Confirm password must be same";
            $res['status']      = 'error';
            return json_encode($res);
        }
        
        
        //----------------------------------------------
        $password       =   $this->security->xss_clean($this->input->post('password', true));
        $new_password   =   $this->security->xss_clean($this->input->post('new_password', true));
        	$old_pwd        =   $this->get_pwd($arr['id']); 
        $salt               =   $this->get_salt($arr['id']);
        $password_encrypt   =   crypt($password,$salt );
        $arr_encrypt        =   explode('$',$password_encrypt);
        $password           =   $arr_encrypt['4']; 
        $old_pwd        =   $this->get_pwd($arr['id']);
        if($old_pwd != $password)
        {
            $res['error_msg']   = "Invalid Password";
            $res['status']      = 'error';
            return json_encode($res);
        }
        //############# generate new password
         $new_salt      =   '';
         $new_salt      =   generate_salt();
         $new_salt      =   '$6$rounds=5000$'.$new_salt.'$';
         $new_password_encrypt  =   crypt($new_password,$new_salt );
         $arr_encrypt_new   =   explode('$',$new_password_encrypt);
         $new_password      =   $arr_encrypt_new['4'];       
      //-----------------------------------------        

        $this->db->where('id', $arr['id']);
        $this->db->update($this->user_table,array('password'=>$new_password,'salt'=>$new_salt));
        $data['status'] = 'success';
        return json_encode($data);
    }
    /*End Function */
    
     /**
     * get_pwd
     *
     * this function give user password by id
     * @access	public
     * @return array
     */ 
    private function get_pwd($user_id)
    {
        $this->db->select("password");
        $this->db->where('id', $user_id);
        return $this->db->get($this->user_table)->row()->password;
    }
     /*End Function */
     
     /**
     * get_salt
     *
     * this function give user salt by id
     * @access	public
     * @return array
     */ 
    private function get_salt($user_id)
    {
        $this->db->select("salt");
        $this->db->where('id', $user_id);
        return $this->db->get($this->user_table)->row()->salt;
    }
    
     /*End Function */
     
     /**
     * user_info
     *
     * this function fatch user info
     * @access	public
     * @return array
     */ 
    public function user_info($user_id)
    {
        $this->db->select("*");
        $this->db->where('id', $user_id);
        $query	=	$this->db->get($this->user_table);
        if ($query->num_rows() > 0) {
            $data['status'] = 'success';
            $data['result'] = $query->row();
        }else{
            $data['status'] = 'success';
            $data['error_msg'] = 'Invalid Request';
        }
        return json_encode($data);
    }
     /*End Function */
    /**
     * profile_edit
     *
     * this function update user profile info by user id
     * @access	public
     * @return array
     */ 
     public function profile_edit() {
     	
     	
        $this->form_validation->set_rules('first_name', 'First Name', "trim|required");
        $this->form_validation->set_rules('last_name', 'Last Name', "trim|required");
        if(currentuserinfo()->user_type == '2')
		{
			$this->form_validation->set_rules('business_name', 'Business Name', "trim|required");
		}
        
        $arr = $this->input->post(null, true);

        if ($this->form_validation->run() == false) {
            $res['error_msg']   = validation_errors();
            $res['status']      = 'error';
            return json_encode($res);
        }
        else if($this->input->post('contact_number',true) != '')
        {
			if (!is_numeric($arr['contact_number']) || (is_numeric($arr['contact_number']) && strlen($arr['contact_number']) < 10)) 
			{
            	
            	$res['status']      = 'error';
            	$res['error_msg'] 	= 'Please Enter Valid Contact Number';
            	return json_encode($res);
        	}
		}
        $updateArr['first_name']    =   @$arr['first_name'];
	    $updateArr['last_name']     =   @$arr['last_name'];
	    $updateArr['contact_number']=   @$arr['contact_number'];
	    $updateArr['address']       =   @$arr['address'];
		if(currentuserinfo()->user_type == '2')
		{
		  $updateArr['business_name'] =   @$arr['business_name'];
		}
        $this->db->where('id', $arr['id']);
        $this->db->update($this->user_table,$updateArr);
        $res['status'] = 'success';
        return json_encode($res);
     }
     /*End Function */
     
    /**
     * changeImage
     *
     * this function update user profile image by user id
     * @access	public
     * @return array
     */  
    function changeImage($thumb)
    {
        $arr        =   $this->input->post(null, true);
	    $updateArr['profile_image'] =   $thumb;
	    $this->db->where('id', $arr['id']);
        $res        =   $this->db->update($this->user_table,$updateArr);  
           
        if($res)
        {
            $data['status'] = 'success';
            $data['img'] 	= $thumb;
		}else{
            $data['status'] = 'error';
            $data['error_msg'] = "Invalid Request";
		}
	 	return $data;
    }
	
	
	/*
	function for the 
	listing of user feedback
	*/
	public function listing($id)
	{
		    $limit		=	$this->input->post('page_size');
		    $page_no	=	$this->input->post('page_no');
			if((int)@$page_no === 1)
			{
				@$start=0;
			}
			else{
				@$start	=	($page_no-1)*@$limit;
			}
			$this->db->select('f.*,m.title,m.id as service_id,u.business_name,u.first_name,u.last_name,u.profile_image',false);
			$this->db->from('feedback f');
			$this->db->join("manage_service as m","m.id =f.manage_service_id","left");
			$this->db->join("users as u","m.service_provider_id = u.id","left");
			$this->db->where('f.user_id',$id);
			$this->db->order_by('id','desc');
			$this->db->limit($limit,$start);
			$query	=	$this->db->get();
			//echo $this->db->last_query(); die;
			if($query->num_rows()>0)
			{
					$rs['result']	=	$query->result();
					$rs['status']	=	"success";
					$this->db->where("user_id",$id);
		            @$num_rows = $this->db->count_all_results('feedback');
					$total_record   = @$num_rows;
					$rs['total_data'] = $total_record;
			}else{
					$rs['result']	=	'';
					$rs['status']	=	"error";
					$rs['total_data'] = 0;
			}
			return json_encode($rs);
		
	}
	
	
	
}
?>	