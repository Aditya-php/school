<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Tutor Controller
 *
 * @package		User
 * @subpackage          Tutor
 * @category            Tutor 
 * @author		Ankit Rajput
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc
 * @since		Version 1.0
 */

class Tutor extends CI_Controller {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        is_protected();
        $this->lang->load('tutor', get_language());
        $this->lang->load('menu', get_language());
    }

     
    /**
     * Index
     *
     * function show all list of Tutor
     * 
     * @access	public
     * @return	html data
     */ 
    public function index() 
    {
        $data['title']		= 	lang('o_tutor').' | '.lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'), '' => lang('tutor'));
        $data['sub_title']  =   lang('all_tutors');
        $data['page']       =   'tutor_list';
        $result             =   call_api(array(), 'user/tutor/view_all'); //call_api():call view_all()function of lms_api for all tutor list.
        
        $result             =   json_decode($result);
        $data['result']     =   $result->status == 'success' ? $result->result : '';
        $arr_tlist	=	array();
		if($data['result']!='')
		{
			foreach($data['result'] as $ob)
        	{
				$arr_tlist[]=$ob->id;		
			}
		}
		$this->session->unset_userdata('sess_sem_list');
		$this->session->unset_userdata('sess_cat_list');
		$this->session->unset_userdata('sess_cont_list');
		$this->session->unset_userdata('sess_group_list');
		$this->session->unset_userdata('sess_question_list');
		$this->session->unset_userdata('sess_quiz_list');
		$this->session->unset_userdata('sess_tut_list');
		$this->session->set_userdata('sess_tut_list',$arr_tlist);  
        $this->load->view('layout', $data);
    }
    /*End of Function*/
    
    /**
     * Add
     *
     * function add new Tutor
     * 
     * @access	public
     * @return	html data
     */
    public function add() 
    {
        if (isPostBack()) {
            $arr            =   $this->input->post(null, true);
            $isUserExist    =   call_api(array('username'=>$arr['user_name']),'user/learner/duplicate_user');
            $isUserExist    =   json_decode($isUserExist);
            if ($isUserExist->id > 0)  
            {
                echo lang('user_exist_error');
            }
            $isEmailExist   =   call_api(array('email'=>$arr['email']),'user/learner/duplicate_email');
            $isEmailExist   =   json_decode($isEmailExist);
            if ($isEmailExist->id > 0)  
            {
                echo lang('email_exist_error');die;
            }
            if(@$arr['category'] !=   '')
            {
                $arr['category'] = json_encode($arr['category']);	
            }else{
		$arr['category']='';	
            }
            $result = call_api($arr, 'user/tutor/add'); //call_api(): call add() function of lms_api for add new Tutor
            
            $result = json_decode($result);
            if ($result->status === 'success'){
                set_flashdata("success", lang('add_tutor_success'));
                echo $result->status;die;
            }else{
            	if($result->error_msg!==''){
					 echo $result->error_msg;die;
				}	            
                else{
					 echo lang($result->error_lang);die;
				}               
            }
        }
        $data['title']		= 	lang('o_tutor').' | '.lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'),'user/tutor' => lang('tutor'),'' => lang('add'));
        $data['sub_title']  =   lang('page_subtitle');
        $data['page']       =   'tutor_form';
        $data['action']     =   lang('submit');
        $data['form_title'] =   lang('tutor_add_form');
        $data['categories'] =   categories_list();  // call function: categories_list() from helper: function_helper for get all active categories list
        if($data['categories'])
        {
            $data['categories'] =   $data['categories'];
        }else{
            $data['categories'] =   array();
        }
        $this->load->view('layout', $data);
    }
    /*End of Function*/
    
    /**
     * Edit
     *
     * function update Tutor info
     * 
     * @access	public
    */
    public function edit($id = null) 
    {
        if (empty($id)){
            show_404();
        }
        if (isPostBack()){
            $arr    =   $this->input->post(null, true);
            if($arr['category'] !=  '')
            {
                $arr['category'] = json_encode($arr['category']);	
            }else{
                $arr['category'] ='';
            }
            $result     =   call_api($arr, 'user/tutor/edit');  //call_api(): call edit() of lms_api for update tutor info
            
            $result     =   json_decode($result);
            if ($result->status === 'success') {
                set_flashdata("success",lang('edit_tutor_success'));
                echo $result->status;die;
            }else{
                if($result->error_msg!==''){
					 echo $result->error_msg;die;
				}	            
                else{
					 echo lang($result->error_lang);die;
				} 
            }
        }
        $result     =   call_api(array('id' => $id), 'user/tutor/view');//call_api(): call view() of lms_api for view tutor info
        $result     =   json_decode($result);
        if ($result->status === 'success') {
            $data['result'] = $result->result;
        } else {
            show_error($result->error_msg);
        }
        
        $data['categories'] =   categories_list();    // call function: categories_list() from helper: function_helper for get all active categories list
        $data['title']		= 	lang('o_tutor').' | '.lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'),'user/tutor' => lang('tutor'),'' => lang('add'));
        $data['sub_title']  =   lang('edit_tutor_information');
        $data['page']       =   'tutor_form';
        $data['action']     =   lang('update');
        $data['form_title'] =   lang('tutor_edit_form');
        $this->load->view('layout', $data);
    }
    /*End of Function*/
    
    /**
     * view
     *
     * function view Tutor info
     * 
     * @access	public
    */
    public function view($id = null) 
    {
        if (empty($id)) {
            show_404();
        }
        $result     =   call_api(array('id' => $id), 'user/tutor/view');    //call_api(): call view() of lms_api for view tutor info
        $result     =   json_decode($result);
        if ($result->status === 'success') {
            $data['result']     =   $result->result;
        }else{
            show_error($result->error_msg);
        }

        $data['title']		= 	lang('o_tutor').' | '.lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'),'user/tutor' => lang('tutor'),'' => lang('view'));
        $data['sub_title']  =   lang('view_information');
        $data['page']       =   'tutor_view';
        $data['id']       	=   $id;
        $this->load->view('layout', $data);
    }
    /*End of Function*/

    /**
     * change_status
     *
     * function Change Tutor Status
     * 
     * @access	public
    */
    public function change_status() 
    {
        is_ajax_post();
        $arr            =   $this->input->post(null, true);
        $arr['status']  =   ($arr['status'] == 'active') ? 'inactive' : 'active';
        echo call_api($arr, 'user/tutor/change_status');    //call_api(): call change_status()of lms_api for change tutor status
    }
    /*End of Function*/
    
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
        $result     =   call_api($arr,'user/tutor/delete_tutor');   //call_api(): call delete_tutor()of lms_api for delete tutor 
        $result     =   json_decode($result);
        $msg_del    =   '';
        if($result->status  === "success")
        {
            if($result->tutor_list  !==  '')
            {
                $msg_del    =   ucwords($result->tutor_list).'  '.lang('cont_deleted');
            }
            set_flashdata("success",   lang('deleted_tutor_success')."   $msg_del");
        }else if($result->status ===    "error"){
            if($result->tutor_list  !== '')
            {
                $msg_del=ucwords($result->tutor_list).'  '.lang('cont_deleted');
            }
            set_flashdata("error", "$msg_del");
        }
	echo $result->status;
    }
    /*End of Function*/
	
    /**
     * user_exist
     *
     * function check user exist
     * 
     * @access	public
     * @return array
    */
    public function user_exist()
    {
        is_ajax_post();
        $arr        =   $this->input->post(null,true);
        $isExist    =   call_api($arr,'user/learner/duplicate_user');
        $isExist    =   json_decode($isExist);
        if($isExist->id > 0)
        {
            $data['isExist']    =   $isExist->id; 
            $data['msg']        =   lang('user_exist_error'); 
        }else{
            $data['isExist']=0; 
        }
        $data=json_encode($data);
        echo $data;
    }
    /*End of Function*/
   
    /**
     * email_exist
     *
     * function check email exist
     * 
     * @access	public
     * @return array
    */
    public function email_exist()
    {
        is_ajax_post();
        $arr        =   $this->input->post(null,true);
        $isExist    =   call_api($arr,'user/learner/duplicate_email');
        $isExist    =   json_decode($isExist);
        if($isExist->id > 0)
        {
            $data['isExist']    =   $isExist->id; 
            $data['msg']        =   lang('email_exist_error'); 
        }else{
            $data['isExist']=0; 
        }
        $data=json_encode($data);
        echo $data;
    }
    /*End of Function*/
	
    /**
     * exportexcel
     *
     * This function export excel sheet of tutor list
     * 
     * @access	public
     * @return array
    */
    public function exportexcel()
    {
		$arr    =   $this->input->post(null, true); 
        if(@$arr['tutor_id'] !=  '')
        {
            $tutor_id           =   implode(',',@$arr['tutor_id']);
            $arr['tutor_id']    =   $tutor_id;
        }
		$result     =   call_api($arr, 'user/tutor/view_all'); //call_api():call view_all()function of lms_api for all tutor list.
        $result     =   json_decode($result);
        $arr_colums =   array('S.NO','User Name','First Name','Last Name','Categories','Email','Location','Description','Status');
		$filename   =   tempnam(sys_get_temp_dir(), "csv");
        $file       =   fopen($filename,"w");
        foreach($arr_colums as $k=>$v)
        {
            $fieldArray[$k]     =   $v;
        }
        fputcsv($file,$fieldArray);

        /********** Write data rows*************/
        $sn         =   1;
        $arr_list   =   array();
        foreach($result->result as $k=>$v)
        {
            $category   =   get_categories($v->id);
            $str        =   '';
            if(count($category)>0){
                foreach($category as $ck => $cv){
                    $str    .=  ucwords($cv->category)."|";
                } 
            }
            $arr_list['sn']         =   $sn;
            $arr_list['username']   =   $v->user_name;
            $arr_list['first_name'] =   $v->first_name;
            $arr_list['last_name']  =   $v->last_name;
            $arr_list['category']   =   $str;
            $arr_list['email']      =   $v->email;
            $arr_list['location']   =   $v->location;
            $arr_list['description']=   $v->description;
            $arr_list['status']     =   $v->status;
            $dataArray[$k]          =   $arr_list;
            $sn++;
        }
        foreach ($dataArray as $line) {
           fputcsv($file,$line);
        }
        fclose($file);
        header("Content-Type: application/csv");
        header("Content-Disposition: attachment;Filename=tutors_list.csv");

        /**********send file to browser**********/
        readfile($filename);
        unlink($filename);
    }
    /*End of Function*/
}
