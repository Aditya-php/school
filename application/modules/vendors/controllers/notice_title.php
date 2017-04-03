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
class Notice_title extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
      $user_type=array('4'); //allowed user type to access
        is_protect($user_type);
        $this->load->model('notice_title_mod');
		
    }

    /**
     * index
     *
     * This function display user dashboar according to USER TYPE
     * 
     * @access	public
     * @return	html data
     */
	 
	
  public function add() {

  
        if (isPostBack()) 
        {
		
            $this->form_validation->set_rules('notice_title', 'Notice Title', 'trim|required');
			$this->form_validation->set_rules('notice_description', 'Notice Description', 'trim|required');
			$this->form_validation->set_rules('notice_status', 'Status', 'trim|required');
			$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
			$this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
			// $this->form_validation->set_rules('image', 'End Date', 'trim|required');
            if ($this->form_validation->run() == false)
            {
		       $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
            else
            { 	
			    $response = $this->notice_title_mod->save_title();
                $msg=($response!='' && $response!=0) ? 'Great!! Notice is created successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('vendors/notice_title/listing') ; 
            }
		}
		
       $data['title'] = "C3 || Add Notice";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'notice/add';
        $data['page'] = $page;
	   _layout_vendor($data);
    }
	
	

  function vendor_list_ajax(){
		  // $parent_id=currUserId(); 
          $res=$this->notice_title_mod->vendor_list_ajax(); //sssspr($res);die;//pending loan list
          echo json_encode($res);
    }
	
		
	function listing(){
	    $data['title'] = "C3 || List Notice";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'notice/listing';
        $data['page'] = $page;
	 _layout_vendor($data);
	}
	

		function export_vendor()
{
           $vendor_id=currUserId();//pr($parent_id);die;
        $response= $this->notice_title_mod->export_vendor($vendor_id);//pr($response);die;
		if(isset($response['Notice']) && !empty($response['Notice'])){
            $datamrg = array_merge( $response['header'] , $response['Notice'] );
            array_to_csv($datamrg,'Notice List-'.date('d-m-y H:i:s').'.csv');
        } else {
        $msg=($response!='' && $response!=0) ? 'Notice data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
            redirect('vendors/notice_title/listing') ;      
        } 
        
}
	
		public function  multi_delete()
	{
		$all_id = $this->input->post('id',true);
        if(!empty($all_id))
		{
			$ids=explode(',',$all_id);
            $this->db->where_in('id',$ids);
            $result = $this->db->delete("vendor_notice");
         //   echo $this->db->last_query(); die;
            echo 1; die;
		}else{
			echo 0; die;
		}
	}
	
	
	   public function  delete($id=null)
	{
		// $this->load->model('testmonial_mod');
		if($id!='')
		{
			$result = $this->notice_title_mod->deletedata($mytable="vendor_notice",ID_decode($id));
			$msg="Notice deleted successfully";	
		}else{
			$msg="Unable to delete,Id not found";
		}
		$this->session->set_flashdata('account_create', $msg);
         redirect('vendors/notice_title/listing') ; 
	 
	}
	
	
	 public function edit($id = null) {
 
        if ($id != NULL) {
            $id = ID_decode($id);
        }
        if (isPostBack()) 
        {
			$this->form_validation->set_rules('notice_title', 'Notice Title', 'trim|required');
			$this->form_validation->set_rules('notice_description', 'Notice Description', 'trim|required');
			$this->form_validation->set_rules('notice_status', 'Notice Status', 'trim|required');
			$this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');
			$this->form_validation->set_rules('end_date', 'End Date', 'trim|required');
			 if ($this->form_validation->run() == false)
            {
		       $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
            }
            else
            {
	            $response = $this->notice_title_mod->save_title($id);
                $msg=($response!='' && $response!=0) ? 'Great!! Notice is Updated successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('vendors/notice_title/listing') ; 
			}
		}
		$data['data1'] = $this->notice_title_mod->get_vendor_list($id);//pr($data);die;
	    $data['title'] = "C3 || Edit Notice";
        $data['breadcum'] = array("" => "", "" => " ");
        $page = 'notice/edit';
        $data['page'] = $page;
	 _layout_vendor($data);
	}
	
	


}
