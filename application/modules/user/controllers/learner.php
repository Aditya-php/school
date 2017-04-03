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

class Learner extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        is_protected();
        $this->lang->load('learner', get_language());
        $this->lang->load('menu', get_language());
    }
    
    /**
     * index
     *
     * This function display all Learner list
     * 
     * @access	public
     * @return	html data
    */
    public function index() 
    {
        $data['title']		= 	lang('o_tutor').' | '.lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'), '' => lang('learner'));
        $data['sub_title']  =   lang('all_learners');
        $data['page']       =   'learner_list';  
        $arr                =   (currentuserinfo()->user_type!='1') ? array('id'=>currentuserinfo()->id) : array();
        $result             =   call_api($arr, 'user/learner/view_all');//call_api(): call view_all() function of lms_api for list all Learner
        $result             =   json_decode($result); 
        $data['result']     =   $result->status == 'success' ? $result->result : '';
        $this->load->view('layout', $data);
    }
    /*End of Function*/

    /**
     * Add
     *
     * function add new Learrner
     * 
     * @access	public
     * @return	html data
    */
    public function add() 
    {
    	$arr	=	array();
        if (isPostBack()){
        	
			$arr        	=   $this->input->post(null, true); 
            $arr['tutor']   =   currentuserinfo()->id;
           
        	$rs    			=   call_api($arr,'user/learner/learner_exist');
        	$rs    			=   json_decode($rs);
       
       		 //----------
        	if($rs->status=="error")
        	{
        	    
				if($rs->err_no==='1')
				{
					   
					 echo lang('learner_addedto_group_error');die;
					 
				}
				else if($rs->err_no==='2')
				{
					 echo lang('learner_available_error');die;
				
					echo $msg;die;
				}
				else if($rs->err_no==='3')
				{
					
					 echo lang('user_exist_error');die;
					 echo $msg;die;
				}
				
				
            	
			}else if($rs->status=="success"){
			    $isEmailExist=call_api(array('email'=>$arr['email']),'user/learner/duplicate_email');
              
                $isEmailExist=json_decode($isEmailExist);
                if ($isEmailExist->id > 0)  
                {
                    echo lang('email_exist_error');die;
                }	
			   $result = call_api($arr, 'user/learner/add');//call_api(): call add function of lms_api for save new Learner
			   
			   $result = json_decode($result);
            	if ($result->status === 'success') 
            	{
                	set_flashdata("success",lang('add_learner_success'));
                	echo $result->status;die;
            	}else{
            		if($result->error_msg!==''){
						 echo $result->error_msg;die;
					}else{
						 echo lang($result->error_lang);die;
					}
               	     
            	}
			}	
           //------------      
              
            
        }
        $data['title']		= 	lang('o_tutor').' | '.lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'),'user/learner' => lang('learner'),'' => lang('add'));
            
        $data['sub_title']  =   lang('page_subtitle');
        $data['page']       =   'learner_form';
        $data['action']     =   lang('submit');
        $data['form_title'] =   lang('learner_add_form');
        $data['tutor_list'] =   json_decode(call_api(array(), 'user/get_tutors'))->result;//call_api(): call get_tutors 
                                                                          //function of lms_api for get all tutor list
        $user_id            =   currentuserinfo()->id;
	$data['categories'] =   categories_list();// call function: categories_list() from helper: function_helper 		
        $this->load->view('layout', $data);
    }
    /*End of Function*/
    
    /**
     * edit
     *
     * function update Learner Info
     * 
     * @access	public
     * @return	html data
     */
    public function edit($id = null) 
    {
        if (empty($id)){
            show_404();
        }
        if (isPostBack()) 
        {
            $arr    =   $this->input->post(null, true);
            if($arr['category'] !=  '')
            {
		$arr['category']    =   json_encode($arr['category']);
            }else{
		$arr['category']    =  '';
            }
            $result     =   call_api($arr,'user/learner/edit');//call_api(): call edit function of lms_api for update Learner
            $result     =   json_decode($result);
            if ($result->status === 'success') {
                set_flashdata("success",lang('edit_learner_success'));
                echo $result->status;die;
            }else{
                echo $result->error_msg;die;
            }
        }

        $pid        =   currentuserinfo()->id;
        $result     =   call_api(array('id' => $id,'parent_id'=>$pid), 'user/learner/view');//call_api(): call view()  of lms_api  for view  Learner info
        $result     =   json_decode($result);
        if ($result->status === 'success'){
            $data['result'] = $result->result;
        } else {
            show_error($result->error_msg);
        }
        $data['tutor_list'] = json_decode(call_api(array(), 'user/get_tutors'))->result;
       
       
        if((int)currentuserinfo()->user_type ===  1)
        {
            $user_id            =   $data['result']->parent_id;
            $data['categories'] =   json_decode(call_api(array('id' => $user_id), 'user/tutor/tutor_category'))->result;
        }else{
            $user_id            =   currentuserinfo()->id;
            $data['categories'] =   categories_list();  // call function: categories_list() from helper: function_helper for get// all active categories list
        }
       

        $data['title']      =   lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'),'user/learner' => lang('learner'),'' => lang('edit'));
        $data['sub_title']  =   lang('learner_tutor_information');
        $data['page']       =   'learner_form';
        $data['action']     =   lang('update');
        $data['form_title'] =   lang('learner_edit_form');
        $this->load->view('layout', $data);
    }
    /*End of Function*/

    /**
     * view
     *
     * function view Learner info
     * 
     * @access	public
     */
    
    public function view($id = null) 
    {
        if (empty($id)){
            show_404();
        }
        $user_id    =   currentuserinfo()->id;
        $result     =   call_api(array('id' => $id,'parent_id'=>$user_id), 'user/learner/view');//call_api(): call view()  of lms_api  for view Learner info
        $result     = json_decode($result);
        if ($result->status === 'success') {
            $data['result']     =   $result->result;
        } else {
            show_error($result->error_msg);
        }

        $data['title']      =   lang('page_title');
        $data['breadcum']   =   array('dashboard' => lang('home'),'user/learner' => lang('learner'),'' => lang('view'));
        $data['sub_title']  =   lang('view_information');
        $data['page']       =   'learner_view';
        $this->load->view('layout', $data);
    }  
    /*End of Function*/

    /**
     *tutor_category
     *
     * This function display Tutor category
     * 
     * @access	public
     * @return	array
    */
    public function tutor_category()
    {
    	$tutor_id   =   $_POST['TUTOR_ID'];	
    	echo call_api(array('id' => $tutor_id), 'user/tutor/tutor_category');
    } 
    /*End of Function*/

    /**
     * delete_learner
     *
     * This function deleted selected learners
     * 
     * @access	public
     * @return	html data
    */
    public function delete_learner()
    {
        $arr        =   $this->input->post(null,true);
        $result     =   call_api($arr,'user/learner/delete_learner');//call_api(): call delete_learner() of lms_api for deleted  selected Learners 
        $result     =   json_decode($result);
        $msg_del    =   '';
        if($result->status  === "success")
        {
            if($result->count > 1)
            {
                set_flashdata("success",lang('deleted_learners_success'));
            }
            else
            {
                set_flashdata("success",lang('deleted_learner_success'));	
            }
        }else if($result->status === "error"){
            set_flashdata("error", $result->error_msg);
        }
        echo $result->status;
    }
    /*End of Function*/
    
      /**
     * Change Status
     *
     * This function change learner status
     * 
     * @access	public
     * @return	html data
    */
    public function change_status()
    {
        is_ajax_post();
        $arr=$this->input->post(null,true);
        $arr['status'] = ($arr['status'] == 'active') ? 'inactive' : 'active' ;
        echo call_api($arr,'user/learner/change_status'); //call_api(): call change_status() of lms_api for Change Learners status
    }
    /*End of Function*/
    
    /**
     * Learner Exist
     *
     * This function  get Learner Exist info
     * 
     * @access	public
     * @return	array
    */
     
    public function learner_exist()
    { 	
        is_ajax_post();
        $arr            =   $this->input->post(null,true);        
        $arr['tutor']   =   currentuserinfo()->id;
        $rs    =   call_api($arr,'user/learner/learner_exist');
        //pr($rs);die;
        $rs    =   json_decode($rs);
       
        //----------
        if($rs->status=="error")
        {
        	    if($rs->err_no==='1'||$rs->err_no==='2') 
        	    {
					   $result     =   call_api(array('learner_id' =>$rs->learner_id), 'user/learner/learner_info');
                      
                       $result     =   json_decode($result);
                       $data['result']     =   $result->result;
                       $data['image_path'] =   profile_image($rs->learner_id);
				}
				
				if($rs->err_no==='1')
				{
					   
					   $msg=lang('learner_addedto_group_error');
				}
				else if($rs->err_no==='2')
				{
					$msg= lang('learner_available_error');
				}
				else if($rs->err_no==='3')
				{
					
					$msg= lang('user_exist_error');
				}
				$data['err_no']    =   $rs->err_no;
				$data['msg']    	=   $msg;
				
            	$data           	=   json_encode($data);
            	echo $data;die;
		}else if($rs->status=="success"){
			$data['err_no']    =   $rs->err_no;
			$data['msg']    =   '';
			$data           	=   json_encode($data);
			echo $data;die;
		}	
       //------------
    } 
    /*End of Function*/
    
    /**
     * email_exist
     *
     * This function  get email Exist info
     * 
     * @access	public
     * @return	array
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
            $data['isExist']    =   0; 
        }
        $data   =   json_encode($data);
        echo $data;
    }
    /*End of Function*/
    
    /**
     * exportexcel
     *
     * This function export excel sheet of learner list
     * 
     * @access	public
     * @return array
    */
    public function exportexcel()
    {
        $result = call_api(array(),'user/learner/view_all');//call_api(): call view_all() function of lms_api for list all Learner
        $result = json_decode($result);
        $arr_colums=array('S.NO','User Name','Tutor Name','First Name','Last Name','Email','Location','Description','Status');
        $filename = tempnam(sys_get_temp_dir(), "csv");
        $file = fopen($filename,"w");
        foreach($arr_colums as $k=>$v)
        {
            $fieldArray[$k] = $v;
        }
        fputcsv($file,$fieldArray);

        /******************** Write data rows***************/
        $sn         =   1;
        $arr_list   =   array();
        foreach($result->result as $k=>$v)
        {
            $arr_list['sn']         =   $sn;
            $arr_list['username']   =   $v->user_name;
            $arr_list['Tutor Name'] =   ucwords($v->tutor_f." ".$v->tutor_l);
            $arr_list['first_name'] =   $v->first_name;
            $arr_list['last_name']  =   $v->last_name;
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
        header("Content-Disposition: attachment;Filename=learner_list.csv");

        /*********send file to browser****************/
        readfile($filename);
        unlink($filename);
    }
    /*End of Function*/
}
