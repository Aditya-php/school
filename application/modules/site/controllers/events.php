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

class Events extends CI_Controller {

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
        $this->load->model('event_mod');
		$this->load->model('admin/Category_mod');
		$this->load->library("pagination");
    }

    /**
     * index
     *
     * This function dispaly all events
     * 
     * @access	public
     * @return	html data
     */
    public function index($page_no = NULL) 
    {   
           if($page_no){
            	$page   =   $page_no ;
         }else{
           	 	$page   =   1;
         }
    	 $page_size						 =	 5 ;
         $data['page_size']  			 =	 $_POST['page_size']	=	$page_size;
         $data['page_no']    			 =	 $_POST['page_no']		=	$page;
         $result 	 			         =   $this->event_mod->listing('');
    	 $result						 =   json_decode($result);
    	 //-------------- pa
    	 $config						 =   array();        
         $config["base_url"]			 =   base_url().'site/events/index/';
         $config["per_page"]			 =   $page_size;
         $config['use_page_numbers']     =   TRUE;        
         $config['first_tag_open']       =   $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li aria-controls="sample_2" class="paginate_button ">';
         $config['first_tag_close']      =   $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';        
         $config['cur_tag_open']         =   '<li aria-controls="sample_2" class="paginate_button active"><a><b>';
         $config['cur_tag_close']        =   "</b></a></li>";
         $config['first_link']           =   '<i class="fa fa-angle-double-left"></i>';
         $config['last_link']            =   '<i class="fa fa-angle-double-right"></i>';
         $config['next_link']            =   '<i class="fa fa-angle-right"></i>';
         $config['prev_link']            =   '<i class="fa fa-angle-left"></i>';
        	
         $config['num_links']	=   2;
         $config['uri_segment']	=   4;
         $config["total_rows"]  =	$data['total_data']  	 	=   $result->total_data;
         $this->pagination->initialize($config);
         $data["links"]      		=   $this->pagination->create_links();
         $data['result']         =   $result->status == 'success' ? $result->result : '';
         
        //---------------- 
        $data['page']       = 	'events/list_event';
        $data['breadcum']	=	array('"'.base_url().'"' => "Home",""=>"Events");
        $data['title']  =   "Directory || Events";
        $this->load->view('landing_layout', $data); 
			
	}
    /*End of Function*/    
    
    /**
     *add
     *
     * This function to add events
     * 
     * @access	public
     * @return	html data
     */
        
    public function add() 
    {   
        is_protected();
       //print_r($this->session->userdata('isLogin')) ; die;
		if($this->session->userdata('isLogin') == 'yes')
		{
			if($_POST)
				{
						$this->form_validation->set_rules('event_type_id', 'Event Type', 'trim|required');	
						$this->form_validation->set_rules('title', 'Title', 'trim|required');
						$this->form_validation->set_rules('description', 'Description', 'trim|required');	
						$this->form_validation->set_rules('startdate', 'start date', 'trim|required');
						$this->form_validation->set_rules('enddate', 'end date', 'trim|required');	
						$this->form_validation->set_rules('venue', 'venue', 'trim|required');
						$this->form_validation->set_rules('price', 'price', 'trim|required');	
						$this->form_validation->set_rules('contact_no', 'contact no', 'trim|required');
						$this->form_validation->set_rules('email_id', 'email', 'trim|required');	
						$this->form_validation->set_rules('website', 'website', 'trim|required');
						//print_r($_POST); die;				
					if ($this->form_validation->run() == false)
					{	
						$this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
						validation_errors();
					}
					else
					{
							
							$event_type_id    = $this->input->post('event_type_id');
							$title            = $this->input->post('title');
							$description      = $this->input->post('description');
							$startdate        = $this->input->post('startdate');
							$enddate          = $this->input->post('enddate');
							$venue            = $this->input->post('venue');
							$price            = $this->input->post('price');
							$contact_no       = $this->input->post('contact_no');
							$email            = $this->input->post('email_id');
							$website          = $this->input->post('website');
							$added_by         = currentuserinfo()->id;
							$table            = "manage_event";
							$dbdata           =  array('event_type_id'=>$event_type_id,'title'=>$title,'description'=>                    $description, 'startdate'=>$startdate,'enddate'=>$enddate,'venue'=>$venue,                    'price'=>$price,'contact_no'=>$contact_no,'email'=>$email,'website'=>$website,                    'added_by'=>$added_by,'created_at'=>date("Y-m-d h:i:s"),'status'=>'1');
							
							$result = $this->event_mod->inst($table,$dbdata);
							 if(!empty($result))
							{
									$this->session->set_flashdata('account_create', 'Great!! Event added Successfully ');
									redirect(base_url().'site/events/my_events');	
									//echo $result;
																			 
							} 
					}
				}
		}
		else
		{
			redirect(base_url('site'));
		}
		$data['title']		= 	"Directory || Add Event";
		$data['breadcum']	=	array('".base_url()."'=> "Home","site/events/my_events" => "My Events",""=>"Add New Events");
		$data['page']       = 	'events/add_event';
		$this->load->view('landing_layout', $data);
    }
    
    //==== view event details====//    
    public function view($id=null) 
    {   
		$id1 = ID_decode($id);
		$data["result"] = array();
		$data['result'] = $this->event_mod->detail_view($id1);
		$data['breadcum']	=	array('".base_url()."'=>'Home','site/events' => "Events",""=>"View Event");
		$data['page']       = 	'events/view_event';
                $data['title']  =   "Directory || Events || View";
                $this->load->view('landing_layout', $data);
    }
    /*End of Function*/    
	
	
	//***** listing of particular service provider events*****\\
	
	public function my_events($page_no = NULL)
	{
		is_protected();
		$current_id = currentuserinfo()->id; 
		 if($page_no){
            	$page   =   $page_no ;
         }else{
           	 	$page   =   1;
         }
    	 $page_size						 =	 5 ;
         $data['page_size']  			 =	 $_POST['page_size']	=	$page_size;
         $data['page_no']    			 =	 $_POST['page_no']		=	$page;
         $result 	 			         =   $this->event_mod->listing($current_id);
    	 $result						 =   json_decode($result);
    	 //-------------- pa
    	 $config						 =   array();        
         $config["base_url"]			 =   base_url().'site/events/my_events/';
         $config["per_page"]			 =   $page_size;
         $config['use_page_numbers']     =   TRUE;        
         $config['first_tag_open']       =   $config['last_tag_open']= $config['next_tag_open']= $config['prev_tag_open'] = $config['num_tag_open'] = '<li aria-controls="sample_2" class="paginate_button ">';
         $config['first_tag_close']      =   $config['last_tag_close']= $config['next_tag_close']= $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';        
         $config['cur_tag_open']         =   '<li aria-controls="sample_2" class="paginate_button active"><a><b>';
         $config['cur_tag_close']        =   "</b></a></li>";
         $config['first_link']           =   '<i class="fa fa-angle-double-left"></i>';
         $config['last_link']            =   '<i class="fa fa-angle-double-right"></i>';
         $config['next_link']            =   '<i class="fa fa-angle-right"></i>';
         $config['prev_link']            =   '<i class="fa fa-angle-left"></i>';
        	
         $config['num_links']	=   2;
         $config['uri_segment']	=   4;
         $config["total_rows"]  =	$data['total_data']  	 	=   $result->total_data;
         $this->pagination->initialize($config);
         $data["links"]      		=   $this->pagination->create_links();
         $data['result']         =   $result->status == 'success' ? $result->result : '';
         
        //---------------- 
        $data['page']       = 	'events/my_event';
       $data['breadcum']	=	array('"'.base_url().'"' => "Home",""=>"My Events");
       $data['title']  =   "Directory || My Events";
        $this->load->view('landing_layout', $data); 
	}
	/*End of Function*/  
	
	
	//function for the event delete 
	public function event_delete($id = null)
	 {
	 	 is_protected();
		 $event_id = ID_decode($id);
		 $dbdata  = array('is_delete'=>'1');
		 $this->db->where('id',$event_id);
		 $result = $this->db->update('manage_event', $dbdata);
		 if(!empty($result))
		 {
			$this->session->set_flashdata('account_create', 'Great!! Event Deleted Successfully ');
			redirect(base_url().'site/events/my_events');	
		 } 
	 }
	 /*End of Function*/
	 
	 
	 //function for the event delete 
	 public function edit($id = null)
	 {
	 	 is_protected();
		 $event_id = ID_decode($id);
		 if(!empty($event_id))
		 {
			if($_POST)
				{
						$this->form_validation->set_rules('event_type_id', 'Event Type', 'trim|required');	
						$this->form_validation->set_rules('title', 'Title', 'trim|required');
						$this->form_validation->set_rules('description', 'Description', 'trim|required');	
						$this->form_validation->set_rules('startdate', 'start date', 'trim|required');
						$this->form_validation->set_rules('enddate', 'end date', 'trim|required');	
						$this->form_validation->set_rules('venue', 'venue', 'trim|required');
						$this->form_validation->set_rules('price', 'price', 'trim|required');	
						$this->form_validation->set_rules('contact_no', 'contact no', 'trim|required');
						$this->form_validation->set_rules('email_id', 'email', 'trim|required');	
						$this->form_validation->set_rules('website', 'website', 'trim|required');
						//print_r($_POST); die;				
					if ($this->form_validation->run() == false)
					{	
						$this->form_validation->set_error_delimiters('<div style="color:red">', '</div>');
						validation_errors();
					}
					else
					{
							
							$event_type_id    = $this->input->post('event_type_id');
							$title            = $this->input->post('title');
							$description      = $this->input->post('description');
							$startdate        = $this->input->post('startdate');
							$enddate          = $this->input->post('enddate');
							$venue            = $this->input->post('venue');
							$price            = $this->input->post('price');
							$contact_no       = $this->input->post('contact_no');
							$email            = $this->input->post('email_id');
							$website          = $this->input->post('website');
							$added_by         = currentuserinfo()->id;
							$table            = "manage_event";
							$dbdata           =  array('event_type_id'=>$event_type_id,'title'=>$title,'description'=>                    $description, 'startdate'=>$startdate,'enddate'=>$enddate,'venue'=>$venue,                    'price'=>$price,'contact_no'=>$contact_no,'email'=>$email,'website'=>$website,                    'added_by'=>$added_by,'modified_at'=>date("Y-m-d h:i:s"),'status'=>'1');
							$upwhere_con      = array('id'=>$event_id);
							$result = $this->Category_mod->dbupdate($table,$dbdata,$upwhere_con);
							 if(!empty($result))
							{
									$this->session->set_flashdata('account_create', 'Great!! Event updated Successfully ');
									redirect(base_url().'site/events/my_events');	
									//echo $result;
																			 
							} 
					}
				}
		 }
			$data["result"] = array();
			$table = 'manage_event';
			$row = 'row';
			$where_con = array('id'=>$event_id);
			$data['result'] = $this->Category_mod->get_record($table,$row,'',$where_con);
			
		$data['title']		= 	"Directory || Edit Event";
		$data['breadcum']	=	array('".base_url()."'=>'Home','site/events/my_events' => "My Events",""=>"Edit Event");
		$data['page']       = 	'events/add_event';
		$this->load->view('landing_layout', $data);
		 
	 }
	/*End of Function*/
}
?>