<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *  Site Controller
 *
 * @package		Site
 * @category            Site 
 * @author		Ankit Rajput 
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc
 * @since		Version 1.0
 */

class Site extends CI_Controller {

    private $data = array();

    /**
     * Constructor
     * This function to retrive college instance from url and get instance ID and store in session
     * 
     * @access	public
     * @return	
     */
    function __construct() 
    {
        parent::__construct();
        $this->load->model('site_mod');
        if($this->session->userdata('login_type')   ==  'spadmin')
        {
            redirect('/admin/dashboard');
        }
    }

    /**
     *index
     *
     * This function dispaly main site page
     * 
     * @access	public
     * @return	html data
     */
    public function index() 
    {   
        $data['page']       = 	'site_dashboard';
        /*Fetching US States*/
		$data['services']  = $this->site_mod->fetch_services();
        $data['events']  = $this->site_mod->fetch_events();
        $data['article'] = $this->site_mod->fetch_article();
        $data['states']  = $this->site_mod->fetch_states();
        $data['title']  =   "Directory || A complete Health Directory";
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/    
    
    /**
     *fetch_cities
     *
     * This function dispaly main site page
     * 
     * @access	public
     * @return	html data
     */
    public function fetch_cities() 
    {   
        $cities =   $this->site_mod->fetch_cities();
        $str    =   "<option value=''>Choose City</option>";
        foreach($cities as $c_key   =>  $c_val)
        {
            $str    .=  '<option value="'.$c_val->ID.'">'.$c_val->Name.'</option>';
        }
        $data['status']     =   "success";
        $data['citydata']   =   $str;
        echo json_encode($data);
    }
    /*End of Function*/    
    
     /**
     *sign_up
     *
     * This function register new user
     * 
     * @access	public
     * @return	html data
     */
    public function sign_up()
    {
		 if (isPostBack())
        {
            $arr	=   $this->input->post(NULL,true);
            $_POST['is_service_provider'] = 0;
            $result	=	$this->site_mod->add_user();
            $result	=	json_decode($result);
            if($result->status  === "success")
            {  
               $email_data['to']            =   $arr['email'];
               $email_data['from']          =   ADMIN_EMAIL;
               $email_data['sender_name']   =   ADMIN_NAME;
               $email_data['subject']       =   "Registered Account";
               $email_data['message']       =   array(
                    'header' => 'You have successfully registered !',
               'body' => '<!DOCTYPE HTML><html><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name = "viewport" content = "width = device-width, user-scalable = no" /><title>Health Directory</title><body> <div style="width:700px;margin:0 auto;font-family: arial;border:0px solid #ccc;"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="font-size: 14px;font-family:arial;border:1px solid #ccc"><thead><tr><th width="43%" align="left" valign="top" bgcolor="#37444e" style="padding:14px;font-size: 14px;border-bottom: 1px solid #ccc;">Health Directory</th><th width="57%" align="left" valign="middle" bgcolor="#37444e" style="padding:14px; color:#fff; font-family:arial, helvetica, sans-serif; font-weight:bold; font-size:16px;border-bottom: 1px solid #ccc;"><span style="margin:0px; float:left;"> </span></th></tr></thead><tbody><tr><td style="padding:2px 14px 15px;font-size: 14px;" colspan="2" align="left" valign="top"><font face="Arial, Helvetica, sans-serif;"><br/><br/>Dear'.' '.$arr['first_name'].' '.$arr['last_name'].' '.lang('and_welcome_to_o-tutor').'  !<br/><br/>'.lang('enjoying_otutor_experience_msg').'?<br><br><h2>'.lang('confirm_your_subcription').'</h2><br>Click Here  <a href="'.base_url().'site">Here</a> to login<br /><br /></font></td></tr><tr><td style="padding: 14px; font-size: 13px; font-style: italic; font-weight: bold;color: #333;" colspan="2" align="left" valign="top"><font face="Arial, Helvetica, sans-serif">'.lang('happy_o_tutoring').'!<br/><br/>Health Directory Team<br></font></td></tr></tbody></table></div></body></html>');
               _sendEmailNew($email_data);   /*email function for mailjet configuration*/
               // _sendEmail($email_data);
                
                $res['status']      =   $result->status; 
                $res                =   json_encode($res);  
                echo $res;	
                die;
            }else{
                $res['status']      =   $result->status; 
                $res['error_msg']  	=   $result->error_msg;
				
                $res               =   json_encode($res); 
                echo $res;
                die;
            }
		}
	}
	/*End of Function*/    
	   /**
     *signup_service_provider
     *
     * This function register new service provider
     * 
     * @access	public
     * @return	html data
     */
	function signup_service_provider(){
		if (isPostBack())
        {
            $arr	 =   $this->input->post(NULL,true);
            $_POST['is_service_provider'] = 1;
            $result	=	$this->site_mod->add_user();
            $result	=	json_decode($result);
            if($result->status  === "success")
            {  
               $email_data['to']            =   $arr['email'];
               $email_data['from']          =   ADMIN_EMAIL;
               $email_data['sender_name']   =   ADMIN_NAME;
               $email_data['subject']       =   "Registered Account";
               $email_data['message']       =   array(
                    'header' => 'You have successfully registered !',
               'body' => '<!DOCTYPE HTML><html><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name = "viewport" content = "width = device-width, user-scalable = no" /><title>Health Directory</title><body> <div style="width:700px;margin:0 auto;font-family: arial;border:0px solid #ccc;"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="font-size: 14px;font-family:arial;border:1px solid #ccc"><thead><tr><th width="43%" align="left" valign="top" bgcolor="#37444e" style="padding:14px;font-size: 14px;border-bottom: 1px solid #ccc;">Health Directory</th><th width="57%" align="left" valign="middle" bgcolor="#37444e" style="padding:14px; color:#fff; font-family:arial, helvetica, sans-serif; font-weight:bold; font-size:16px;border-bottom: 1px solid #ccc;"><span style="margin:0px; float:left;"> </span></th></tr></thead><tbody><tr><td style="padding:2px 14px 15px;font-size: 14px;" colspan="2" align="left" valign="top"><font face="Arial, Helvetica, sans-serif;"><br/><br/>Dear'.' '.$arr['first_name'].' '.$arr['last_name'].' '.lang('and_welcome_to_o-tutor').'  !<br/><br/>'.lang('enjoying_otutor_experience_msg').'?<br><br><h2>'.lang('confirm_your_subcription').'</h2><br>Click Here  <a href="'.base_url().'site">Here</a> to login<br /><br /></font></td></tr><tr><td style="padding: 14px; font-size: 13px; font-style: italic; font-weight: bold;color: #333;" colspan="2" align="left" valign="top"><font face="Arial, Helvetica, sans-serif">'.lang('happy_o_tutoring').'!<br/><br/>Health Directory Team<br></font></td></tr></tbody></table></div></body></html>');
               _sendEmailNew($email_data);   /*email function for mailjet configuration*/
               // _sendEmail($email_data);
                
                $res['status']      =   $result->status; 
                $res                =   json_encode($res);  
                echo $res;	
                die;
            }else{
                $res['status']      =   $result->status; 
                $res['error_msg']  	=   $result->error_msg;
				
                $res               =   json_encode($res); 
                echo $res;
                die;
            }
		}
	}
	/*End of Function*/    
}
?>