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
class Kids extends CI_Controller {

    /**
     * Constructor
     */
   function __construct() {
        parent::__construct();
       $user_type=array('4'); //allowed user type to access
        is_protect($user_type);
        $this->load->model('kids_mod');
    }
    /**
     * index
     *
     * This function display user dashboar according to USER TYPE
     * 
     * @access	public
     * @return	html data
     */	
	
	/*
	@desc: display list of assign kids to vendor
	*/
	public function listing()
	{
		$data['title'] = "C3 || Kids";
        $data['breadcum'] = array("" => "Kids");
        $page = 'kids/listing';
        $data['page'] = $page;
	    _layout_vendor($data);
	}

    function kids_list_ajax()
	{
		  // $parent_id=currUserId(); 
          $res=$this->kids_mod->kids_list_ajax(); //sssspr($res);die;//pending loan list
          echo json_encode($res);
    }
	/*
     @desc: Dispaly kids info	
	*/
	public function view_kids_info($id=null)
	{
       $id = ID_decode($id);
	   $this->load->model("parents/kids_mod");
	   $data['data1'] = $this->kids_mod->get_kid_list($id);
	   $data['title'] = "C3 || View kids";
       $data['breadcum'] = array("" => "", "" => " ");
       $page = 'kids/view_kids_info';
       $data['page'] = $page;
       _layout_vendor($data);
	}//end function here
	/**
	
	
	
	*/
    function export_kids()
	{
            $response= $this->kids_mod->export_kids();
		    if(isset($response['kidsData']) && !empty($response['kidsData'])){
            $datamrg = array_merge( $response['header'] , $response['kidsData'] );
            array_to_csv($datamrg,'KidsData List-'.date('d-m-y H:i:s').'.csv');
              }else{
              $msg=($response!='' && $response!=0) ? 'Kids data not found for export......' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
				redirect('vendors/kids/listing');
               } 
    }//end method	
}
