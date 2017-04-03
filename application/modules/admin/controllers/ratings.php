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
class Ratings extends CI_Controller {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
		ini_set('post_max_size', '20M');
        $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
        $this->load->model('ratings_mod');
		check_access_prmsn('14');
        $this->load->model('vendor_mod');
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
        $data['title'] = "C3 || Vendor";
        $data['breadcum'] = array("" => "Vendor", "" => "Vendor Listing");
        $page = 'ratings/listing';
        $data['page'] = $page;
        _layout($data);
    }
	

    /**
    *   Create function for add vendor
    *   created by santoh kumar 
    *   date : 02/03/2017
    *
    */

	public function add() {
	
        
        $vendor_ids=$this->input->post('all_user_id',true);
        if(isset($vendor_ids) && !empty($vendor_ids)){
            
            $data['vendor_ids']=$vendor_ids;
            $data['title'] = "C3 || Vendor";
            $data['breadcum'] = array("" => "Dashboard", "" => "Add Ratings");
            $page = 'ratings/add';
            $data['page'] = $page;
            _layout($data);    
        }
        else{
        $this->session->set_flashdata('vendor_create', 'Unable to rate ,vendor id not found');        
        redirect(base_url('admin/vendor'));    
        }
       
    }
    
    function save_ratings(){
        $vendor_ids_post=$this->input->post('vendor_ids');
        if(isset($vendor_ids_post) && !empty($vendor_ids_post)){
            $vendor_id='';$id_is_array=0;
            if(is_string($vendor_ids_post)){
                $vendor_id=explode(',',$vendor_ids_post);
                $id_is_array=1; //if $vendor_id is array type
            }
            else if(is_array($vendor_ids_post)){
                $vendor_id=$vendor_ids_post['0'];
                $id_is_array=2; //if $vendor_id is a single value
            }
            if(!empty($vendor_id)){
                $this->ratings_mod->save_ratings($vendor_id,$id_is_array);
            }
        }
        
        
    }


	
	
	
}
