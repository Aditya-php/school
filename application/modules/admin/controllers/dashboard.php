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

class Dashboard extends CI_Controller {
    
     /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
	    $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		$this->load->model('Dashboard_mod');
		 if ($this->session->userdata('isLogin') === 'yes')	// if user already login , redirect to user dashboard
        {
			$user_info=$this->session->userdata('userinfo');
        //	pr($this->session->all_userdata());die;
			if(!empty($user_info) &&  $user_info->user_type=='3')
			{
				redirect(base_url('parents'));
			}
			else if( !empty($user_info) &&  $user_info->user_type=='4')
			{
				redirect(base_url('vendors'));
			}
            
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
        
		$result                      =   $this->Dashboard_mod->count_details();
		$result				         =	json_decode($result);
		//pr($result->total_user); die;
        $data['user']		         =	$result->total_user;
		$data['service_provider']    =  $result->total_sp;
		$data['feedback']            =  $result->total_feedback;
		$sp_res                      =  $this->Dashboard_mod->get_sp_list();
		$data['sp_result']           =  json_decode($sp_res);
		$data['title']		         = 	"C3 || Dashboard";
        $data['breadcum']	         =	array("admin/dashboard" => "Home",""=>"Dashboard");
        $page              	         =	'dashboard_admin';
        $data['page']                =	$page;
        _layout($data);
    }
	

}
