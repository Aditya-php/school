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

class Pages extends CI_Controller {

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
        $this->load->model('page_mod');
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
        $data['page']       = 	'site_dashboard';
        /*Fetching US States*/
        $data['states'] =   $this->page_mod->fetch_states();
        $this->load->view('landing_layout', $data);
    }
    /*End of Function*/    
    
    /**
     *fetch_cities
     *
     * This function dispaly main site page
     * 
     * @access	public
     * @return	html data
     */
    public function fetch_cities() 
    {   
        $cities =   $this->site_mod->fetch_cities();
        $str    =   "<option value=''>Choose City</option>";
        foreach($cities as $c_key   =>  $c_val)
        {
            $str    .=  '<option value="'.$c_val->ID.'">'.$c_val->Name.'</option>';
        }
        $data['status']     =   "success";
        $data['citydata']   =   $str;
        echo json_encode($data);
    }
	/*End of Function*/
	
	// function for the about us 
	 public function view($id = null)
	{
		$page_id = ID_decode($this->input->get('id'));
		$data["result"] = array();
		$data['result'] = $this->page_mod->listing($page_id);
		$data['breadcum']	=	array('"'.base_url().'"' => "Home",""=>"About Us");
		$data['page']       = 	'pages/view';
                $title  =   $data['result']->page_name;
                $data['title']  =   "Directory || $title";
                $this->load->view('landing_layout', $data);
	}
    

    //function for the contact us 
	 public function contactus($id = null)
	{
		$page_id = ID_decode($this->input->get('id'));
		$data["result"] = array();
		$data['result'] = $this->page_mod->listing($page_id);
		$data['breadcum']	=	array('"'.base_url().'"' => "Home",""=>"Contact Us");
		$data['page']       = 	'pages/contact_us';
                $data['title']  =   "Directory || Contact Us";
                $this->load->view('landing_layout', $data);
	}
	
	public function add_contact()
	{
		if($_POST)
		{
				$this->form_validation->set_rules('name', 'name', 'trim|required');	
				$this->form_validation->set_rules('email', 'email', 'trim|required');
				$this->form_validation->set_rules('subject', 'subject', 'trim|required');	
				$this->form_validation->set_rules('message', 'message', 'trim|required');
								
			if ($this->form_validation->run() == false)
			{	
				$this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
				validation_errors();
			}
			else
			{
					$name            = $this->input->post('name');
					$email           = $this->input->post('email');
					$subject         = $this->input->post('subject');
					$message         = $this->input->post('message');
					$table = "contact_us";
					$dbdata = array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message);
					
					$result = $this->page_mod->inst($table,$dbdata);
					 if(!empty($result))
					{
							$this->session->set_flashdata('account_create', 'Great!! Successfully Send');
							//echo '<script>alert("Your Details Sent Successfully.");</script>';
							redirect(base_url().'site/pages/contactus');	
							//echo $result;
																	 
					} 
						   
					
		    }
		}
		$data['breadcum']	=	array('"'.base_url().'"' => "Home",""=>"Contact Us");
		$data['page']       = 	'pages/contact_us';
        $this->load->view('landing_layout', $data);
	}
   
}
?>