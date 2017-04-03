<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *  Auth Controller
 *
 * @package		Auth
 * @subpackage  Models
 * @category    Authentication 
 * @author		Arvind Soni
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc
 * @since		Version 1.0
 */

class Auth extends CI_Controller {

    private $data	=	array();
    private $user_table =   "users";
    /**
     * Constructor
     */
    function __construct() 
    {
        parent::__construct();
        $this->load->model('auth_mod');
             
    }

    /**
     *index
     *
     * This function dispaly login page
     * 
     * @access	public
     * @return	html data
    */
    public function index() 
    { 
        $page   =   $this->uri->segment(3);
        $arr    =   array();
        if($page === 'forget')
        {   
          
            $this->session->set_flashdata("error",@$this->session->flashdata('error'));
            redirect('/site/forget');
        }
        if ($this->session->userdata('superadminLogin') === 'yes')	// if super admin already login , redirect to super admin dashboard
        {
            redirect(base_url('admin'));
        }else{
            $arr['title']		= 	lang('o_tutor').' | '.lang('login'); 
            $this->load->view('login',$arr);
        }
    }
    /*End of Function*/
	
    /**
     *Forget
     *
     * This function send password to user mail in case forget
     * 
     * @access	public
     * @return	html data
     */
    public function forget() 
    {
        $data['error_msg']  =   null;
        if (isPostBack()) {
            $arr        	=   $this->input->post(null,true);
            $email      	=   $this->input->post('email', true);
            $forget_type	=	"";
            if($this->input->post('forget_type',true) != '' && $this->input->post('forget_type',true)=='spadmin')
            {
                $forget_type =   $this->input->post('forget_type',true);
            }
            $this->form_validation->set_rules('email','Email', 'trim|required|email');
            if ($this->form_validation->run() === false) {
            	if($forget_type=="spadmin")
            	{
					set_flashdata("error", validation_errors());	
                	redirect('admin/auth/forget');
				}else{
					$rs['status']		=	"error";
					$rs['error_msg']	=	validation_errors();
					echo json_encode($rs);die;
				}
                
            }
            $result	=   $this->auth_mod->forget();
            $result     =   (object)$result;//pr($result );die;
            if(!$result->valid)
            {
            	if($forget_type=="spadmin")
            	{
            		set_flashdata("error", $result->error_msg);
                	redirect('admin/auth/forget');
            	}else{
					$rs['status']		=	"error";
					$rs['error_msg']	=	$result->error_msg;
					echo json_encode($rs);
					die;
				}
                
            }else if($result->valid){
                //pr($result);
                if($forget_type=="spadmin")
            	{
            		$login_link	=	base_url().'admin/auth';
            	}else{
					$login_link	=	base_url().'site';
				}
                $email_data['to']           =   $email;
                $email_data['from']         =   ADMIN_EMAIL;
                $email_data['sender_name']  =   ADMIN_NAME;
                $email_data['subject']      =   "New Password";
                $email_data['message']      =   array('header' => "Your Password has been changed successfully!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;">Hello'."&nbsp;&nbsp;&nbsp;&nbsp;".ucwords($result->user_name).',<br><br>   <span style="color:#000;">Please Find your new Password below: </span>   <br><span style=" color:#000"> New Password:'.$result->new_password.'</span><br><span style="color:#000;">','button_link'=>$login_link,"button_content"=>"Click here for login");
               _sendEmailNew($email_data);   /*email function for mailjet configuration*/
                //_sendEmail($email_data);
                if($forget_type=="spadmin")
            	{
            		$this->session->set_flashdata("success","New password have been sent to registered mail address");
                	redirect(base_url().'admin/auth/forget');
            	}else{
					$rs['status']		=	"success";
					$rs['error_msg']	=	"New password have been sent to registered mail address";
					echo json_encode($rs);
					die;
				}
                
              
            }
        }
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
        	if($this->session->userdata('user_type')=='1')
        	{
				redirect(base_url('/admin/dashboard'));
			}else{
				redirect(base_url('site'));
			}
            
        }	
        $data['error_msg']  =   null;	
        if (isPostBack()) 
        {
        	$arr=$this->input->post(NULL,true);
        	
            // $login_type     =   '';
            // if($this->input->post('login_type',true) != '' && $this->input->post('login_type',true)=='spadmin')
            // {
                // $login_type =   $this->input->post('login_type',true);
            // }
			 
            $remember       =   $this->input->post('remember',true);
			
            
            $email       =   strtolower($this->input->post('email',true)); 
			
            $password       =   $this->input->post('password',true); 
            
            $result         =   $this->auth_mod->login_authorize();
            $result         =    (object)($result);
            
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
                if($this->input->post('user_type',true)    !=  '' && $this->input->post('user_type',true)=='1')
            	{
            		 redirect('/admin/dashboard');
            	}else{
					$rs['status']="success";
					$rs['remember']=$remember;
					echo json_encode($rs);die;
					
				}
               
            }else if($result->status === 'error'){
                if($this->input->post('user_type',true)    !=  '' && $this->input->post('user_type',true)=='1')
            	{
                    if($result->error_msg !== '')
                    {
                        $this->session->set_flashdata("error",$result->error_msg);
                    }
                    redirect('/admin/auth');	// if user supper admin ,redirect to supper admin login page
		       }else{
                    
					$rs['status']="error";
					$rs['error_msg']=$result->error_msg;
					echo json_encode($rs);die;	// if user not a supper admin redirect to user login page
				}       
            }
        }	
    }
    /*End of Function*/
    
    /**
     * Logout
     *
     * This function destroy all saved session
     * 
     * @access	public
     * @return	html data
     */

    /*End of Function*/
        
    /**
     * permissionDenied
     *
     * This function to show error on permission denied
     * 
     * @access	public
     * @return	html data
     */
    public function permissionDenied() {
        _show404();
    }
    /*End of Function*/

    /**
     * refreshCaptcha
     *
     * This function generate new captcha image
     * 
     * @access	public
     * @return	html data
     */
    public function refreshCaptcha()
    {	
	$getcaptcha     =   getcaptchacode();   // This helper function generate captcha code image
	echo json_encode($getcaptcha);
    } 
    /*End of Function*/
    
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
        $arr        =   $this->input->post(null,true);
        $result     =   call_api($arr,'auth/login_fb');
        $result     =   json_decode($result);
        
        if ($result->status === 'success') 
        {
            if((int)$result->site_id === 0){
                $this->session->set_userdata("userinfo",  $result->result);
            }else{
                $rs         =   $result->result;
                $rs->id     =   $result->result->id;
                $rs->site_id     =   $result->site_id;
                $rs->isLogin    =   'yes';
                $this->session->set_userdata("userinfo",  $rs);
            }
           // $this->session->set_userdata("userinfo['site_id']", $result->site_id);
            $this->session->set_userdata("isLogin", 'yes');
            //$this->session->set_userdata("login_type",$login_type);

            /*Updating Token in user's own database users table*/
            $asd    =   call_api(array('db_name'=>DB_PREFIX.$result->site_id,'id'=>$result->result->id), 'auth/set_token');
            /**/
            
            /*fetching college data using college id*/
            $college_data   =   call_api(array('college_id'=>@$result->site_id),'site/college_data');
            $college_data   =   json_decode($college_data);
            if($college_data->status    ==  'success')
            {
                $college_data  =   $college_data->result;
            }
            $college_name   =   $college_data[0]->user_name;

            $url = "http://" . $college_name . ".".DOMAIN_NAME;
            
            if((int)$result->result->user_type===2 ||(int)$result->result->user_type===3)
                echo $url.'/dashboard?data='.base64_encode(json_encode($rs));
        }
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
    public function superadmin_login() 
    {
        if ($this->session->userdata('superadminLogin') === 'yes')	// if super admin already login , redirect to super admin dashboard
        {
            redirect(base_url('admin'));
        }
        $data['error_msg']  =   null;	
        if (isPostBack()) 
        {
            $login_type     =   '';
            if($this->input->post('login_type',true) != '' && $this->input->post('login_type',true)=='spadmin')
            {
                $login_type=$this->input->post('login_type',true);
            }
			 
            $remember       =   $this->input->post('remember',true); 
            $username       =   $this->input->post('username',true); 
            $password       =   $this->input->post('password',true); 
            $username_enc   =   custom_encryption($username,'ak!@#s$on!','encrypt');
            $password_enc   =   custom_encryption($password,'ak!@#s$on!','encrypt');
            $result         =   call_api($this->input->post(null,true),'auth/superadmin_login');
            //pr($result);
            //die;
            $result         =   json_decode($result);
            
            if ($result->status === 'success') 
            {
                $this->session->set_userdata("userinfo",  $result->result);
                
                $this->session->set_userdata("superadminLogin", 'yes');
                $this->session->set_userdata("login_type",$login_type);
               
                if($remember) // set remember username and password in cookie 
                {
                    setcookie('username',$username_enc,time()+(86400 * 30),"/");
                    setcookie('password',$password_enc,time()+(86400 * 30),"/");
                    setcookie('remember',$remember,time()+(86400 * 30),"/");

                }else{
                    setcookie('username','',time()+(86400 * 30),"/");
                    setcookie('password','',time()+(86400 * 30),"/");
                    setcookie('remember',$remember,time()+(86400 * 30),"/");
                }
                //echo @$result->site_id;
                
                 
                    redirect(base_url('admin'));	//if user is a admin redirect to supper admin dashboard
            }else if($result->status === 'error'){
            	if($this->input->post('login_type',true)    !=  '' && $this->input->post('login_type',true)=='spadmin')
            	{
                    if($result->error_msg !== '')
                    {
                        $this->session->set_flashdata("error", $result->error_msg);	
                    }else{
                        $this->session->set_flashdata("error",lang("$result->error_lang"));
                    }
                    redirect(base_url().'auth');	// if user supper admin ,redirect to supper admin login page
		}else{
                    if($result->error_msg !== '')
                    {
                        $this->session->set_flashdata("error", $result->error_msg);	
                    }else{
			$this->session->set_flashdata("error",lang("$result->error_lang"));
                    }
                    redirect(base_url().'site/login');	// if user not a supper admin redirect to user login page
		}       
            }
        }	
        redirect($this->input->get('url'));
    }
    /*End of Function*/
	 public function logout() 
    {
	//	echo "cgf";die;
        $this->session->sess_destroy();
        redirect(base_url().'admin/auth');	
    }
	
}

?>