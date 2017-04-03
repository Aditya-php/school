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
class Parents extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
		 $user_type=array('3'); //allowed user type to access
        is_protect($user_type);
           }

    /**
     * index
     *
     * This function display user dashboar according to USER TYPE
     * 
     * @access	public
     * @return	html data
     */
    public function index() {
        $data["result"] = array();
        $data['title'] = "C3 || Dashboard";
        $data['breadcum'] = array("" => "Dashboard", "" => "Dashboard");
        $page = 'parent/dashboard_admin';
        $data['page'] = $page;
        _layout_parent($data);
    }
	//////////////
   public function new_appointment_list()
	{
		$data['title'] = "C3 || Kids";
        $data['breadcum'] = array("" => "Kids");
        $page = 'parent/new_appointment_listing';
        $data['page'] = $page;
	    _layout_parent($data);
	}
    function new_appointment_list_ajax()
	{
		  //$parent_id=currUserId(); 
		  $this->load->model("new_appointment_mod");
          $res=$this->new_appointment_mod->new_appointment_listing_ajax(); //sssspr($res);die;//pending loan list
          echo json_encode($res);
    }	
  public function appointment_cancel($appointment_schedular_id)
   {
	  $appointment_schedular_id=ID_decode($appointment_schedular_id);
	  $this->db->update('appointment_schedular',array('appointment_status'=>'7'),array('id'=>$appointment_schedular_id));
	  $this->session->set_flashdata('account_create','Your Appointment is cancled');
	  redirect('parents/new_appointment_list');
   }  
}
