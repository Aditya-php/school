<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *  Site Controller
 *
 * @package		Site
 * @category            Site 
 * @author		Ankit Rajput 
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc
 * @since		Version 1.0
 */

class Categories extends CI_Controller {

    private $data = array();

    /**
     * Constructor
     * This function to retrive college instance from url and get instance ID and store in session
     * 
     * @access	public
     * @return	
     */
    function __construct() 
    {
        parent::__construct();
        $this->load->model('category_mod');
		
    }

    /**
     *index
     *
     * This function dispaly main site page
     * 
     * @access	public
     * @return	html data
     */
    public function index() 
    {   
		$arr			=	array();
		if($this->input->get('item'))
		{
			$arr['item']	=	$this->input->get('item');
		}
		$data["result"] = array();
		$data['result'] = $this->category_mod->listing($arr);
		
		$data['breadcum']	=	array('"'.base_url().'"' => "Home",""=>"Category");
		$data['page']       = 	'category/category';
                $data['title']  =   "Directory || Categories";
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/    
    
    /**
     * view
     *
     * This function to view about category
     * 
     * @access	public
     * @return	html data
     */
    public function view($id = null) 
    {   
	    if($id != NULL)
		  {
		  	$id1	=	ID_decode($id);
		  }
	    $data["result"] = array();
        $data['result'] = $this->category_mod->detail_view($id1);
	    $data['breadcum']	=	array('"'.base_url().'"' => "Home","site/categories"=>"Categories",""=>"Service Provider");
		$data['page']       = 	'category/category_details';
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/    
	
	
     /**
     * service_provider
     *
     * This function fatch service provider of selected category
     * 
     * @access	public
     * @return	html data
     */
    public function service_providers($category_id = null) 
    {   
	    if($category_id != NULL)
		{
		  	$category_id		=	ID_decode($category_id);
		}
	    $data["result"] 		=	array();
        $result 				= 	$this->category_mod->get_service_providers_detail($category_id);
        $result					=	json_decode($result);
        $data['result']			=	($result->status=="success")?$result->result:'';
		//$rating 				= 	$this->category_mod->get_service_providers_rating($category_id);
       // $rating					=	json_decode($rating);
		//$data['rating']			=	$rating;
        $data['category_id']	=	$category_id;
	    $data['img_path']		=   base_url()."assets/service_image/";
	    $data['breadcum']		=	array('"'.base_url().'"' => "Home","site/categories"=>"Categories",""=>"Service Providers");
		$data['page']       	= 	'category/category_details';
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/
	
}  
?>
