<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Auth Model 
 *
 * @package		Auth
 * @subpackage	Models
 * @category	Authentication 
 * @author		Arvind Soni
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */

class Auth_mod extends CI_Model {

    var $user_table	=	"users";

    /**
     * Constructor
    */
	function __construct() {
		parent::__construct();
        
	}
    /**
     * End
    */
   
    /**
     * Get User By Id
     *
     * This function get user details filtered by id
     * 
     * @access	public
     * @param   int - user id
     * @return	mixed Array 
     */
	private function get_user_by_id($id = null,$site_id=null) {
		$this->db->where("id", $id);
		$query	=	$this->db->get(DB_PREFIX.$site_id.'.'.$this->user_table);
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return false;
	}

    /**
     * forget
     *
     * This function set password and send verification mail
     * 
     * @access	public
     * @return	mixed Array 
     */

	function forget() 
        {
		$this->form_validation->set_rules('email',lang('email'), 'trim|required|valid_email');
		$email			=	$this->input->post('email', true);
		if ($this->form_validation->run() === false) {
			$return['error_msg']	=	validation_errors();
			$return['valid']		=	false;
			$return['error_lang']	=	"";
			return $return;
		}
                $this->db->where("email", $email);
                $result	=	$this->db->get($this->user_table);	
		if ($result->num_rows > 0) {
                    $userData			=	$result->row();
                    $mail_password		=	random_string('alnum', 6);
                    $username			=	$userData->first_name . ' ' . $userData->last_name;
                    $user_name			=	$userData->user_name;
        //------------- secure encryption-------------------
                    $salt				=	generate_salt();
                    $salt				=	'$6$rounds=5000$'.$salt.'$';
                    $password_encrypt	=	crypt($mail_password,$salt );
                    $arr_encrypt_new	=	explode('$',$password_encrypt);
                    $password			=	$arr_encrypt_new['4']; 
                    $updateData			=	array('password' => $password,'salt'=>$salt);
                    $this->db->where('id', $userData->id);
                    
                    $updatable			=	$this->db->update($this->user_table, $updateData);
                    

                    $return['valid']		=	true;
                    $return['new_password']	=	$mail_password;
                    $return['username']		=	$username;
                    $return['user_name']	=	$user_name;
                    return $return;
                }
		$return['error_msg']        =	"This is not admin's Email Address";
		$return['valid']            =	false;
		return $return;
	}

    /**
     *
     * This function login authenticate 
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */

	function login_authorize() 
        {    
            $this->form_validation->set_rules('email', lang('email'), 'trim|required');
            $this->form_validation->set_rules('password',lang('password'), 'trim|required');

            $email	=	$this->security->xss_clean($this->input->post('email', true));
            $password	=	$this->security->xss_clean($this->input->post('password', true));
        
            if ($this->form_validation->run() === false) {
				// echo validation_errors();die;
				// $data['error_msg']	=	validation_errors();
				$data['status']		=	'error';
				return $data;
            }
           
            $this->db->where("email", $email);
            $query	=	$this->db->get($this->user_table);

            if ($query->num_rows() > 0) 
            {
				$row               	=   $query->row();
                $password_encrypt	=   crypt($password,$row->salt);
                $arr_encrypt		=   explode('$',$password_encrypt);
                $password			=	$arr_encrypt['4'];
		
		if ($password === $row->password) {
                $user_info	=	$row;
                unset($user_info->password);

				$user_info->name	=	$user_info->first_name . ' ' . $user_info->last_name;
                if ($user_info->status === "inactive" || $user_info->is_delete === "1" || $user_info->status === "archieve") 
                {
                    if((int)$user_info->user_type === 1)
                    {
                            $data['error_msg']	=	"Your account has been inactive";
                    }else{
                            $data['error_msg']	=	"Your account has been inactive";
                    }				
                    $data['status']	=	'error';
                    return $data;
                }
                
                /*if((int)$user_info->email_verify === 0 && ((int)$user_info->user_type === 3 || (int)$user_info->user_type === 2))
                {
                        $data['error_msg']	=	"Account under email verification";
                        $data['status']		=	'error';
                        return $data;
                }*/
                
                $data['status']		=	'success';
                $data['user_type']	=	$user_info->user_type;
                $data['result']		=	$user_info;
                return $data;
            }
	}

	$data['error_msg']	=	"Invalid login credential";
    $data['status']		=	'error';
	return $data;
}
    
     /**
     * update_user
     * This function update user last login info
     * @access	public
     */
	private function update_user($token,$id)
	{
		$this->db->where('id',$id);
		$this->db->update($this->user_table,array('token'=>$token,'last_login'=>current_date()));
	}
    
    /**
     * unset_token
     * This function unset token value
     * @access	public
     */
    
	public function unset_token()
	{
		$arr			=	$this->input->post(null, true);
		$dat['token']	=	'';
		$db_name		=	DB_PREFIX.$arr['site_id'];
		$this->db->where('id',$arr['user_id']);
		$this->db->update($db_name.'.users',$dat);
	}
    
    /**
     * set_token
     * This function set token value
     * @access	public
     */
	public function set_token()
	{
		$arr			=	$this->input->post(null, true);
		$dat['token']	=	$arr['token'];
		$this->db->where('id',$arr['id']);
		$this->db->update($arr['db_name'].'.users',$dat);
	}
        
     /**
     * login_fb
     *
     * This function to login from Facebook credentials
     * 
     * @access	public
     * @return	html data
     */
    public function login_fb()
    {
        $arr    =   $this->input->post(null,true);
        /*checking either this facebook email exist in system already*/
        $site_id = $this->input->post('site_id', true);
        $db_name	=	DB_PREFIX.$site_id;  	
        $email		=	$this->input->post('email', true);
        $this->db->select('id');
        $this->db->where('email', $arr['email']);
        $query          = $this->db->get($db_name.'.users');
        $row_id         = $query->row();

        if ($query->num_rows() > 0) {   /* If facebook email ID already exist in database for this instance */
            $ins_id = $row_id->id;
            
        } else {                        /* If facebook email ID is not exist in database for this instance */
            $data['first_name']     = $arr['first_name'];
            $data['last_name']      = $arr['last_name'];
            $data['user_name']      = $arr['email'];
            $data['email']          = $arr['email'];
            $data['user_type']      = '3';
            $data['email_verify']   = 1;
            $token                  = md5(time());
            $data['token']          = $token;
            $data['status']         = 'active';
            $data['created']        = current_date();
            $data['modified']       = current_date();       
            $data['status']         = 'active';
            $db_name                = DB_PREFIX.$arr['site_id'];
            /* insert in users table of user's own database */
            $this->db->insert($db_name.'.users', $data);
            $ins_id = $this->db->insert_id();
        }
        $user_info	=	$this->get_user_by_id($ins_id,$arr['site_id']);
        unset($user_info->password);
        $user_info->name	=   $user_info->first_name . ' ' . $user_info->last_name;
        $dat['id']          =   $ins_id;

        $dat['status']      =   'success';
        $dat['site_id']     =   $arr['site_id'];
        $dat['result']	=   $user_info;
        return $dat;
    }
    /*End of Function*/
    
    
    /**
     *
     * This function login authenticate 
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */

	function superadmin_login_authorize() 
        {    
            $this->form_validation->set_rules('username',lang('username'), 'trim|required');
            $this->form_validation->set_rules('password',lang('password'), 'trim|required');

            $username	=	$this->security->xss_clean($this->input->post('username', true));
            $password	=	$this->security->xss_clean($this->input->post('password', true));
        
            if ($this->form_validation->run() === false) {
		$data['error_msg']	=	validation_errors();
		$data['status']		=	'error';
		return $data;
            }
            
            $this->db->where("user_name", $username);
            $query	=	$this->db->get($this->user_table);
            if ($query->num_rows() > 0) 
            {
		$row = $query->row();
                $password_encrypt	=	crypt($password,$row->salt);
                $arr_encrypt		=	explode('$',$password_encrypt);
                $password			=	$arr_encrypt['4'];
			
		if ($password === $row->password) {
                $user_info	=	$row;
                unset($user_info->password);

		$user_info->name	=	$user_info->first_name . ' ' . $user_info->last_name;
                if ($user_info->status === "inactive") 
                {
                    if((int)$user_info->user_type===1)
                    {
                            $data['error_msg']	=	"";
                            $data['error_lang']	=	"admin_account_inactive";
                    }else{
                            $data['error_msg']	=	"";
                            $data['error_lang']	=	"your_account_has_been_inactive";
                    }				
                    $data['status']	=	'error';
                    return $data;
                }
                
                if((int)$user_info->email_verify === 0 && ((int)$user_info->user_type === 3 || (int)$user_info->user_type === 2))
                {
                        $data['error_msg']	=	"";
                        $data['status']		=	'error';
                        $data['error_lang']	=	"account_under_email_varification";
                        return $data;
                }

                $token				=	$this->input->post('token',true);
                $this->update_user($token,$user_info->id);
                $user_info->token	=	$token;


                $data['status']		=	'success';
                
                $data['result']		=	$user_info;
                return $data;
            }
	}

	$data['error_msg']	=	"";
        $data['status']		=	'error';
        $data['error_lang']	=	"invalid_login_credidential";
	return $data;
}

   function get_change_password($current_pass,$new_pass)
   {
	   $this->db->select('*');
	   $this->db->from('users');
	   $this->db->where('user_type','1');
	   $this->db->where('status','active');
	   $query = $this->db->get();
	   if($query->num_rows() > 0)
	   {
			//match current password 
			$row                  =   $query->row();
			$ck_pass	          =   crypt($current_pass,$row->salt);
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
				$this->db->where('id', $row->id);
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
         
}
