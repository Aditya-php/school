<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 *  Feedback Controller
 *
 * @package		Site
 * @category            Site 
 * @author		Ankit Rajput 
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc
 * @since		Version 1.0
 */

class Feedback extends CI_Controller {

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
        $this->load->model('feedback_mod');
		
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
		
		$data['breadcum']	=	array('"'.base_url().'"' => "Home",""=>"Categories");
		$data['page']       = 	'category/category';
                $data['title']  =   "Directory || Categories";
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/    
    
	
	public function add()
	{
		if($this->session->userdata('isLogin') == 'yes')
		{
			if (isPostBack())
			{
				$user_id  =  currentuserinfo()->id;
				$name     =  currentuserinfo()->first_name.' '.currentuserinfo()->last_name;
				$email    =  currentuserinfo()->email;
				$arr	          =  $this->input->post(NULL,true);
				$result	          =  $this->feedback_mod->add_feedback($user_id,$name,$email);
				$result	          =  json_decode($result);
				if($result->status  === "success")
				{  
					$res['status']      =   $result->status; 
					$res                =   json_encode($res);  
					echo $res;	
					die;
				}else{
					$res['status']      =   $result->status; 
					$res['error_msg']  	=   $result->error_msg;
					
					$res               =   json_encode($res); 
					echo $res;
					die;
				}
			}
		}
		else
		{
			redirect(base_url('site'));
		}
	}
	
	
	
	
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
	
	
    
	
}  
?>
