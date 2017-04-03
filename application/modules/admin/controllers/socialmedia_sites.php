<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Socialmedia Controller
 *
 * @package		admin
 * @category	Socialmedia
 * @author		Arvind soni
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */

class Socialmedia_sites extends CI_Controller {
    
     /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
        $user_type=array('1','2'); //allowed user type to access
        is_protect($user_type);
		check_access_prmsn('5');
		$this->load->model('Socialmedia_sites_mod');
    }
    
   /**
     * index
     *
     * This function display list of social media sites
     * 
     * @access	public
     * @return	html data
   */ 
   
	 public function index() {
		
        if (isPostBack()) 
        {
		        $response = $this->Socialmedia_sites_mod->save_site();
                $msg=($response!='' && $response!=0) ? 'Great!! Social Links updated successfully' :  'Some error, try again';
                $this->session->set_flashdata('account_create', $msg);
                redirect('admin/socialmedia_sites/') ; 
           
        }
        $data["site_data"] = $this->Socialmedia_sites_mod->get_sites();
        $data['title'] = "C3 || kids";
        $data['breadcum'] = array("" => "Social Media", "" => "Create Social Media Site");
        $page = 'socialmedia/socialmedia_site_form';
        $data['page'] = $page;
       _layout($data);	
    }
	
}
?>    