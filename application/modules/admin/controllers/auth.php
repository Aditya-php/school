<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Dashboard Controller
 *
 * @package		Dashboard
 * @category	Dashboard 
 * @author		Kumar Gaurav
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */

class Auth extends CI_Controller {
    
     /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
		// $user_type=array('1','2'); //allowed user type to access
        // is_protect($user_type);
		   $this->load->model('auth_mod');
        if ($this->session->userdata('isLogin') === 'yes')	// if user already login , redirect to user dashboard
        {
           //redirect(base_url('/admin/dashboard'));
        }
    }

     /**
     * index
     *
     * This function display user dashboar according to USER TYPE
     * 
     * @access	public
     * @return	html data
     */ 
    public function index() 
    {
        $data['title']		= 	"C3 || Admin Login";
        $page                   =	'login_admin';
        $data['page']           =	$page;
        $this->load->view('admin_login_layout', $data);
    }
	
	  /*End of Function*/

    /**
     * Login
     *
     * This function display login page
     * 
     * @access	public
     * @return	html data
     */
    public function login() 
    { 
    	
        if ($this->session->userdata('isLogin') === 'yes')	// if user already login , redirect to user dashboard
        {
            	if($this->session->userdata('user_type')=='1'){
            		  redirect('/admin/user'); 
            		}
                else{
             		 redirect(base_url('/admin/dashboard')); 
             	 }  
        }	
        $data['error_msg']  =   null;	
        if (isPostBack()) 
        {
        	$arr=$this->input->post(NULL,true);
   
            $remember       =   $this->input->post('remember',true);
			
            
            $email       =   strtolower($this->input->post('email',true)); 
			
            $password       =   $this->input->post('password',true); 
            
            $result         =   $this->auth_mod->login_authorize();
            $result         =    (object)($result);

	  // $r = $result->user_type;       pr(    $r     );die;	
            if ($result->status === 'success') 
            {
                //@$username1      =   $result->user_name;
				$this->session->set_userdata("userinfo",  $result->result);   
                $this->session->set_userdata("isLogin", 'yes');
                //$this->session->set_userdata("login_type",$login_type);
                $email_enc   =   custom_encryption(@$email,'ak!@#s$on!','encrypt');
                $password_enc   =   custom_encryption($password,'ak!@#s$on!','encrypt');
                if($remember) // set remember email and password in cookie 
                {
                    setcookie('email',$email_enc,time()+(86400 * 30),"/");
                    setcookie('password',$password_enc,time()+(86400 * 30),"/");
                    setcookie('remember',$remember,time()+(86400 * 30),"/");

                }else{
                    setcookie('email','',time()+(86400 * 30),"/");
                    setcookie('password','',time()+(86400 * 30),"/");
                    setcookie('remember',$remember,time()+(86400 * 30),"/");
                }
			    if( $result->user_type != '')
            	{
            		if($result->user_type==1){
            		  redirect('/admin/user'); 
            		}
                    else{
            		 redirect('/admin/dashboard'); 
            		 }  
                     
            	}
               
            }else if($result->status === 'error'){
                    if($result->error_msg !== '')
                    {
                        $this->session->set_flashdata("error",$result->error_msg);
                    }
                    redirect('/admin/auth');     
            }
        }	
    }
    public function forget() 
    {
        $data['title']		= 	"C3 || Forget Password";
        $data['breadcum']	=	array('' => lang('home'));
        $data['sub_title']	=	lang('page_subtitle');
        $page                   =	'forget_password_admin';
        $data['page']           =	$page;
        $this->load->view('admin_login_layout', $data);
    }
    public function permission_denied(){
        $data["result"] = array();
        $data['title'] = "C3 || Permission Denied";
        $data['breadcum'] = array("" => "", "" => "");
        $page = 'access_denied';
        $data['page'] = $page;
        _layout($data);
    }
	
	
}
