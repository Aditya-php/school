<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * User Controller
 *
 * @package		User
 * @subpackage          User
 * @category            User 
 * @author		Ankit Rajput
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc
 * @since		Version 1.0
 */

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        is_protected();
        $this->lang->load('tutor', get_language());
        $this->lang->load('menu', get_language());
    }

    /**
     * profile_account
     *
     * this function show user profile info
     * 
     * @access	public
     * @return	html data
     */ 
    public function profile_account()
    {
	    $user_id    =   currentuserinfo()->id;
        $result     =   call_api(array('id'=>$user_id), 'user/profile_info');
       
        $result                 =   json_decode($result);
        $data['profile_info']   =   $result->result['0'];
        $data['title']          =   "Account Setting";
        $data['title']			= 	lang('o_tutor').' | '.lang('account_settings');
        $data['breadcum']       =   array('dashboard' => 'Home', '' => 'Account Setting');
        $data['sub_title']      =   "Change Password";
        $data['page']           =   'change_pwd';
        $this->load->view('layout', $data);
    }
    
    /**
     * Add
     *
     * function add new Tutor
     * 
     * @access	public
     * @return	html data
     */
    public function add() {
        if (isPostBack()) {
            $arr                =   $this->input->post(null, true);
            $arr['category']    =   json_encode($arr['category']);
            $result             =   call_api($arr, 'user/tutor/add');//call_api(): call add() function of lms_api for add new Tutor
            $result             =   json_decode($result);

            if ($result->status === 'success') {
                set_flashdata("success",lang('add_tutor_success'));
                redirect(base_url() . "user/tutor");
            } else {
                //set_flashdata("error", $result->error_msg);
                //redirect(base_url() . "user/tutor/add");
            }
        }
        $data['title']      =   lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'),'user/tutor' => lang('tutor'),'' => lang('add'));

        $data['sub_title']  =   lang('page_subtitle');
        $data['page']       =   'tutor_form';
        $data['action']     =   lang('submit');
        $data['form_title'] =   lang('tutor_add_form');
        $cat                =   json_decode(call_api(array(),'user/tutor/category_list'));//call_api(): call category_list() of lms_api for category list
        $data['categories']     = $cat->result;

        $this->load->view('layout', $data);
    }

    // ------------------------------------------------------------------------
    /**
     * Edit
     *
     * function update Tutor info
     * 
     * @access	public
     */
    public function edit($id = null) {
        if (empty($id)) {
            show_404();
        }

        if (isPostBack()) {
            $arr                =   $this->input->post(null, true); 
            $arr['category']    =   json_encode($arr['category']);
            $result             =   call_api($arr, 'user/tutor/edit'); //call_api(): call edit() of lms_api for update tutor info
            $result             =   json_decode($result);

            if ($result->status === 'success') {
                set_flashdata("success", lang('edit_tutor_success'));
                redirect(base_url() . "user/tutor/view/" . $id);//call_api(): call view() of lms_api for view tutor info
            } else {
                //set_flashdata("error", $result->error_msg);
                //redirect(base_url() . "user/tutor/edit/" . $id);
            }
        }

        $result         =   call_api(array('id' => $id), 'user/tutor/view');//call_api(): call view() of lms_api for view tutor info
        $result         =   json_decode($result);
        if ($result->status === 'success') {
            $data['result'] = $result->result;
        } else {
            show_error($result->error_msg);
        }
        
        $data['categories']     =   json_decode(call_api(array(), 'user/tutor/category_list'))->result;//call_api(): call category_list() of lms_api for tutor's category list

        $data['title']      =   lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'),'user/tutor' => lang('tutor'),'' => lang('add'));
        $data['sub_title']  =   lang('edit_tutor_information');
        $data['page']       =   'tutor_form';
        $data['action']     =   lang('update');
        $data['form_title'] =   lang('tutor_edit_form');
        $this->load->view('layout', $data);
    }

    // ------------------------------------------------------------------------
    /**
     * view
     *
     * function view Tutor info
     * 
     * @access	public
     */
    public function view($id = null) {
        if (empty($id)) {
            show_404();
        }
        $result     =   call_api(array('id' => $id), 'user/tutor/view');//call_api(): call view() of lms_api for view tutor info
        $result     =   json_decode($result);
        if ($result->status === 'success') {
            $data['result'] = $result->result;
        } else {
            show_error($result->error_msg);
        }

        $data['title']      =   lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'),'user/tutor' => lang('tutor'),'' => lang('view'));
        $data['sub_title']  =   lang('view_information');
        $data['page']       =   'tutor_view';
        $this->load->view('layout', $data);
    }

    // ------------------------------------------------------------------------
    /**
     * change_status
     *
     * function Change Tutor Status
     * 
     * @access	public
     */
     public function change_status() {
        is_ajax_post();
        $arr            =   $this->input->post(null, true);
        $arr['status']  =   ($arr['status'] == 'active') ? 'inactive' : 'active';
        echo call_api($arr, 'user/tutor/change_status');//call_api(): call change_status()of lms_api for change tutor status
    }
    
    // ------------------------------------------------------------------------
    /**
     * delete_tutor
     *
     * function delete selected tutor
     * 
     * @access	public
     */

    public function delete_tutor()
    {
        $arr        =   $this->input->post(null,true);
        $result     =   call_api($arr,'user/tutor/delete_tutor');//call_api(): call delete_tutor()of lms_api for delete tutor 
        //echo $result;
        $result     =   json_decode($result);
        /// echo $result;die;
        $msg_del='';
        if($result->status  === "success")
        {
            if($result->tutor_list  !== '')
            {
                $msg_del=ucwords($result->tutor_list).'  '.lang('cont_deleted');
            }
            set_flashdata("success", lang('deleted_tutor_success')."   $msg_del");
        }else if($result->status === "error"){
                if($result->tutor_list !== '')
                {
                    $msg_del=ucwords($result->tutor_list).''.lang('cont_deleted');
                }
                set_flashdata("error", "$msg_del");
        }
        echo $result->status;
    }
	
	/**
     * Index
     *
     * function show all list of Tutor
     * 
     * @access	public
     * @return	html data
     */ 
    public function profile_view() {
        if (isPostBack()) 
		{
            $arr    =   $this->input->post(null, true);
            $result =   call_api($arr, 'user/profile_info');//call_api(): call add() function of lms_api for add new Tutor
            
            $result = json_decode($result);

            if ($result->status === 'success') {
                set_flashdata("success", lang('pass_update'));
                redirect(base_url() . "user/change_pwd");
            } else {
                set_flashdata("error", $result->error_msg);
                redirect(base_url() . "user/change_pwd");
            }
        }
        $arr1       =   array();
        $learner_id =   $this->uri->segment('4');
        
        if($learner_id  !=  '')
        {   
            if($this->uri->segment('5')!='' && $this->uri->segment('5')=='3')
            {
		$arr1['id']     =   $learner_id;
		$arr1['flag']   =   '1';
            }
	}else{
		$arr1['id']     =   currentuserinfo()->id;
		$arr1['flag']   =   '0';
	}
        $result         =   call_api($arr1, 'user/profile_info');
        $result         =   json_decode($result);
        $data['profile_info']   =   $result->result['0'];
        $data['flag']           =   $result->flag;
        $data['title']          =   "Overview";
        $data['breadcum']       =   array('dashboard' => 'Home', '' => 'Overview');
        $data['sub_title']      =   "Overview";
        $data['page']           =   'profile_view';
        $this->load->view('layout', $data);
    }
    
    /**
     * profile_edit
     *
     * this function update user profile info by user id
     * @access	public
     * @return array
     */ 
     public function profile_edit() {

        $arr = $this->input->post(null, true);

        $result = call_api($arr,'user/user/profile_edit');//call_api(): call add() function of lms_api for add new Tutor
         
            $result = json_decode($result);

            if ($result->status === 'success') {
                //set_flashdata("success", "Your profile info updated successfully");
                  if($result->email_verify==='1')
                  {
				  	$email_data['to']            =   $arr['email'];
                  	$email_data['from']          =   ADMIN_EMAIL;
                  	$email_data['sender_name']   =   ADMIN_NAME;
                  	$email_data['subject']       =   lang('registered_account');
                  	$email_data['message']       =   array(
                    'header' => lang('email_verify_header').'!',
                    'body' => '<!DOCTYPE HTML><html><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name = "viewport" content = "width = device-width, user-scalable = no" /><title>'.lang('lms').'</title><body> <div style="width:700px;margin:0 auto;font-family: arial;border:0px solid #ccc;"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="font-size: 14px;font-family:arial;border:1px solid #ccc"><thead><tr><th width="43%" align="left" valign="top" bgcolor="#37444e" style="padding:14px;font-size: 14px;border-bottom: 1px solid #ccc;">'.lang('lms').'</th><th width="57%" align="left" valign="middle" bgcolor="#37444e" style="padding:14px; color:#fff; font-family:arial, helvetica, sans-serif; font-weight:bold; font-size:16px;border-bottom: 1px solid #ccc;"><span style="margin:0px; float:left;"> </span></th></tr></thead><tbody><tr><td style="padding:2px 14px 15px;font-size: 14px;" colspan="2" align="left" valign="top"><font face="Arial, Helvetica, sans-serif;"><br/><br/>'.lang('hi').' '.$arr['first_name'].' '.$arr['last_name'].' !<br><br><h2>'.lang('confirm_your_subcription').'</h2><br>'.lang('please_click').'  <a href="'.base_url().'site/email_verification/'.$result->token."/".$result->site_id.'">'.lang('here').'</a>'.lang('to_confirm_your_subscription').'.<br /><br /></font></td></tr><tr><td style="padding: 14px; font-size: 13px; font-style: italic; font-weight: bold;color: #333;" colspan="2" align="left" valign="top"><font face="Arial, Helvetica, sans-serif">'.lang('happy_o_tutoring').'!<br/><br/>'.lang('the_o_tutor_team').'<br></font></td></tr></tbody></table></div></body></html>');
                    //_sendEmailNew($email_data);   /*email function for mailjet configuration*/
                   
                   _sendEmail($email_data);
                   
                   echo "email_verify";die;
				  }
                  
            } else {
               // set_flashdata("error", $result->error_msg);
            }
           echo  $result->status;
     }	
	
	  /**
     * change_password
     *
     * this function update user password
     * @access	public
     * @return array
     */ 
    public function change_password()
    {
	$arr        =   $this->input->post(null, true);
        $result     =   call_api($arr,'user/user/change_pwd');//call_api(): call add() function of lms_api for add new Tutor
        $result     =   json_decode($result);
        if ($result->status === 'success') {
            // set_flashdata("success", "Your profile info updated successfully");
            echo  $result->status;       
        } else {
            //set_flashdata("error", $result->error_msg);
            if(@$result->err_no==='1')
            {
				 echo  $result->error_msg;
			}else{
				echo lang($result->error_msg);
			}
           
        }
    }
	 
	 /**
     * changeImage
     *
     * this function update user profile image by user id
     * @access	public
     * @return array
     */ 
    public function changeImage()
    {   
        $arr            =   $this->input->post(null, true);
        $arr['site_id'] =   currentuserinfo()->site_id;
        $result         =   call_api($arr,'user/user/changeImage');//call_api(): call add() function of lms_api for add new Tutor
        $result         =   json_decode($result);
        if ($result->status === 'success') {
           // set_flashdata("success", "Your profile info updated successfully");
            echo  lang('img_uploaded');   
        } else {
            //set_flashdata("error", $result->error_msg);
             echo  $result->error_msg;
        }
    }

    /**
     * profile_image
     *
     * this function get user profile image
     * @access	public
     * @return array
     */  
    public function profile_image()
    {
	$arr        =   $this->input->post(null, true);
	$result     =   call_api(array('id'=>$arr['id']),'user/user/profile_image');
	$result=json_decode($result);
        echo $result->img;
    }
	
	/**
     * change_language
     *
     * function update user language
     * 
     * @access	public
     * @return	String data
     */  
    public function change_language()
    {
        $arr    =   $this->input->post(null, true);
        $result =   call_api($arr,'user/user/change_language');//call_api(): call add() function of lms_api for update luange
        $result = json_decode($result);
        if ($result->status === 'success') {  
            $arr1       =   $this->session->userdata("userinfo");
            unset($arr1->language);
            $arr1->language =   $arr['language'];
            $this->session->unset_userdata("userinfo");
            $this->session->set_userdata("userinfo",$arr1);				       
            echo  $result->status;
        } else {   
            echo  $result->error_msg;
        }
    }
	
	public function my_profile()
	{
		
        //--------------------
          	$user_id    =   currentuserinfo()->id;
        	$result     =   call_api(array('id'=>$user_id), 'user/profile_info');       
        	$result                 =   json_decode($result);
        	$data['profile_info']   =   $result->result['0'];
        	$data['title']          =   "Profile overview";
        	$data['breadcum']       =   array('dashboard' => 'Home', '' => 'Account Setting');
        	$data['sub_title']      =   "Change Password";
        	$data['page']           =   'edit_profile';
        	$this->load->view('layout', $data);
        //--------------------
	}
}
