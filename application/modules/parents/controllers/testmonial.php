<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * User Controller
 *
 * @package		User
 * @category	User 
 * @author		
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */
class Testmonial extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $user_type=array('3'); //allowed user type to access
        is_protect($user_type);
        $this->load->model('testmonial_mod'); 
	
    }

       
	
public function index() {
		 $this->form_validation->set_rules('description', 'description', 'trim|required|is_unique[testimonial.description]');
		 if ($this->form_validation->run() == false)
		  {
		   $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
		 }else{ 	
	         if (isPostBack()){
			 $alldata = $this->session->all_userdata("userinfo"); 
			 $parent_id = $alldata['userinfo']->id;
			 $sql = $this->db->select('parent_id')
							 ->from('testimonial')
			                 ->where('parent_id',$parent_id)
							 ->get();
							// echo $this->db->last_query();die;
		     $parent_id =  ($sql->num_rows()>0) ? $sql->row()->parent_id : 0;
		
             $description=$this->input->post('description',true);
			 if($parent_id!=0){
				$count_qry= $this->db->select('count(id) as parent_id')
				                     ->from('testimonial')
						             ->where('parent_id',$parent_id)
							         ->get();
				$parent_count=$count_qry->row()->parent_id;
				$insert_data=array(
					  'description'=>$description,
					   'parent_id'=>$parent_id,
					 );					 
			if($parent_count>0)
			{
				// pr($_POST);die;
				$insert_data['modified_by']=currUserId();
			    $insert_data['modified_date']=date('Y-m-d h:i:s');
				$qry= $this->db->update('testimonial',$insert_data,array('parent_id'=>$parent_id));
			    $this->session->set_flashdata('account_create', "Your testimonial already added");
                redirect('parents'); 
				} 
			 }else{
				  $parent_id = $alldata['userinfo']->id;
				 $insert_data=array(
					  'description'=>$description,
					   'parent_id'=>$parent_id,
					 );	
			    $insert_data['created_by']=currUserId();
			    $insert_data['created_date']=date('Y-m-d h:i:s');
				$qry=$this->db->insert('testimonial',$insert_data);
				$this->session->set_flashdata('account_create', "Great!! Testimonial is created successfully");
                redirect('parents/testmonial');
			 }
		  }
	  }
	  	 $alldata = $this->session->all_userdata("userinfo"); 
	    $parent_id = $alldata['userinfo']->id;
	   $data['data1'] = $this->testmonial_mod->get_description_list($parent_id);
	   // pr( $data);die;
	$data["result"] = array();
        $data['title'] = "C3 || Testimonial";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'parent/add';
        $data['page'] = $page;
        _layout_parent($data);
}
      
	
}
