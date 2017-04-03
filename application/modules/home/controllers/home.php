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

class Home extends CI_Controller {

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
        $this->load->model('home_mod');
		$this->load->library('pagination');
       
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
		
		$qry=$this->db->select('id,city_name')->get_where('city_master',array('status'=>'active'));
		$data['city_list'] = ($qry->num_rows()>0)? $qry->result() :array();
		
		$sqry=$this->db->select('id,name')->get_where('services');
		$data['services'] = ($sqry->num_rows()>0)? $sqry->result() :array();
		
		$data['testimonialFetch'] = $this->home_mod->TestimonialFetch();
		// pr($data['testimonialFetch']);die;
        $data['page']       = 	'home';
        $this->load->view('front_layout', $data);
    }
    /*End of Function*/    
    
	

	
	public function find_area_list()
	{
		$id=$this->input->post('id',true);
		$area_id=($this->input->post('area_id',true)) ? $this->input->post('area_id',true) : "";
		$result= $this->home_mod->find_area_list($id,$area_id);
		echo $result; die;
    }


	function sign_ajax()
	{
		$data=array();
		$qry=$this->db->select('id,city_name')->get_where('city_master',array('status'=>'active'));
		$data['city_list'] = ($qry->num_rows()>0)? $qry->result() :array();
     	$html=$this->load->view('home/registration',$data,true);
		echo $html; die;
	}
    public function sign_up()
    {
	
          if (isPostBack())
        {
			
	    $this->form_validation->set_rules('first_name',"First Name", 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name',"Last Name", 'trim|required|xss_clean');
        $this->form_validation->set_rules('email',"email", 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password',"password", 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_number',"Mobile No.", 'trim|required|xss_clean|maxlength[10]');
		$this->form_validation->set_rules('city_id',"City", 'trim|required');
		$this->form_validation->set_rules('area_id',"Area", 'trim|required');
		$this->form_validation->set_rules('address',"Address", 'trim|required|xss_clean');
		$this->form_validation->set_rules('term',"Term & Conditions required", 'trim|required|xss_clean');
        if ($this->form_validation->run() === false) {
			// echo validation_errors();
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
			$qry=$this->db->select('id,city_name')->get_where('city_master',array('status'=>'active'));
			$data['city_list'] = ($qry->num_rows()>0)? $qry->result() :array();
			$html=$this->load->view('home/registration',$data,true);	
			echo $html; die;
		}
		else{
			$result	=$this->home_mod->add_user();//pr($result);die;
			if($result != '0')
			{
				$sql = $this->db->select('*')
				                  ->from('users')
								  ->where('id',$result)
								  ->get();
				$data = ($sql->num_rows()>0) ? $sql->row() : array();			    
			 if ($data->status === 'active') 
            {
    			$this->session->set_userdata("userinfo",  $data);   
                $this->session->set_userdata("isLogin", 'yes');
              
			  	echo "1"; die;	
			
			 }
		   }else{
		      echo "error"; die;	
		   }
		 }
	  }
	}      
	/*End of Function*/    
	   /**
     *signup_service_provider
     *
     * This function register new service provider
     * 
     * @access	public
     * @return	html data
     */
	 public function login() 
    { 
    	
        if ($this->session->userdata('isLogin') === 'yes')	// if user already login , redirect to user dashboard
        {
        	if($this->session->userdata('user_type')=='1')
        	{
				redirect(base_url('/admin/dashboard'));
			}else{
				// redirect(base_url('home'));
				// echo "hii";
			}
            
        }	
        $data['error_msg']  =   null;	
        if (isPostBack()) 
        {
        	$arr=$this->input->post(NULL,true);
        	
            $user_type     =   '';
            if($this->input->post('user_type',true) != '' && $this->input->post('user_type',true)=='spadmin')
            {
                $user_type =   $this->input->post('user_type',true);
            }
			 
            $remember       =   $this->input->post('remember',true);
			
            
            $email       =   $this->input->post('email',true); 
			
            $password       =   $this->input->post('password',true); 
            
            $result         =   $this->home_mod->login_authorize();
            $result         =    (object)($result);//pr($result);die;
            
            if ($result->status === 'success') 
            {
                //@$username1      =   $result->user_name;
				$this->session->set_userdata("userinfo",  $result->result);   
                $this->session->set_userdata("isLogin", 'yes');
                $this->session->set_userdata("user_type",$user_type);
            
                $email_enc   =   custom_encryption(@$email,'ak!@#s$on!','encrypt');
                $password_enc   =   custom_encryption($password,'ak!@#s$on!','encrypt');
                if($remember) // set remember username and password in cookie 
                {
                    setcookie('email',$email_enc,time()+(86400 * 30),"/");
                    setcookie('password',$password_enc,time()+(86400 * 30),"/");
                    setcookie('remember',$remember,time()+(86400 * 30),"/");

                }else{
                    setcookie('email','',time()+(86400 * 30),"/");
                    setcookie('password','',time()+(86400 * 30),"/");
                    setcookie('remember',$remember,time()+(86400 * 30),"/");
                }
                if($this->input->post('user_type',true)    !=  '' && $this->input->post('user_type',true)=='spadmin')
            	{
            		 redirect('/admin/dashboard');
            	}else{
					$rs['status']="success";
					$rs['remember']=$remember;
					echo json_encode($rs);die;
					
				}
               
            }else if($result->status === 'error'){
                if($this->input->post('user_type',true)    !=  '' && $this->input->post('user_type',true)=='spadmin')
            	{
                    if($result->error_msg !== '')
                    {
                        $this->session->set_flashdata("error",$result->error_msg);
                    }
                    redirect('/admin/auth');	// if user supper admin ,redirect to supper admin login page
		       }else{
                    
					$rs['status']="error";
					$rs['error_msg']=$result->error_msg;
					echo json_encode($rs);die;	// if user not a supper admin redirect to user login page
				}       
            }
        }	
    }
	
	
	 public function forget() 
    {
        $data['error_msg']  =   null;
        if (isPostBack()) {
            $arr        	=   $this->input->post(null,true);
            $email      	=   $this->input->post('email', true);
            $result	=   $this->home_mod->forget();//pr($result);die;
               if(! $result['valid'])
                {
            	 	echo json_encode($result);
					die;
					
            }else if( $result['valid']){
                $login_link	                =   base_url().'home';
                $email_data['to']           =   $email;
                $email_data['from']         =   ADMIN_EMAIL;
                $email_data['sender_name']  =   ADMIN_NAME;
                $email_data['subject']      =   "New Password";
                $email_data['message']      =  
				
				array('header' => "Your Password has been changed successfully!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;">Hello'."&nbsp;&nbsp;&nbsp;&nbsp;".$result['first_name'].'<br> <br>  <span style="color:#000;">Please Find your new Password below: </span>   <br><span style=" color:#000"> New Password:'.$result['new_password'].'</span><br>
				<span style="color:#000;">','button_link'=>$login_link,"button_content"=>"Click here for login");
				// pr($email_data['message']);die;
               _sendEmailNew($email_data);   /*email function for mailjet configuration*/
                //_sendEmail($email_data);
                //$this->session->set_flashdata("success","New password have been sent to registered mail address");
                	
				$response=array('valid'=>true);
				echo json_encode($response);
					die;	
            }
        }
    }
	/*End of Function*/   
	function logout()
	{
	$this->session->sess_destroy();
	redirect('/home');

	}

   public function fb_login_front() {
  
        $userData['oauth_provider'] = 'facebook';
        $userData['first_name'] = $this->input->post('first_name',true);
        $userData['last_name'] =  $this->input->post('last_name',true);
        $userData['email'] =  $this->input->post('email',true);
	    $userData['user_type'] = '3';
		$userData['status'] = 'active';
        // Insert or update user data

        $userdone = $this->home_mod->checkfbUser($userData);//pr( $userdone );die;
        if (!empty($userdone)) {
            if ($userdone['status'] === 'success') {
                // $userdone['link']     =   base_url().'dashboard/';
                $this->session->set_userdata("userinfo", $userdone['user_info']);
                $this->session->set_userdata("login_type", $userdone['user_info']->user_type);
                $this->session->set_userdata('isLogin', 'yes');
           } else if ($userdone['status'] === 'error') {
                $page = "home/login";
                $userdone['html'] = $this->load->view($page, '', true);
                $userdone['status'] = 'error';
                $userdone['error_msg']  =   $userdone['error_msg'];
           }
        } else {
            $page = "home/login";
            $userdone['html'] = $this->load->view($page, '', true);
            $userdone['status'] = 'error';
            $userdone['error_msg']  =   'Your account has been inactive.!';
        }
        echo json_encode($userdone); die;
    }
    
		public function gp_login_front() {
 // pr($_POST);die;
        $userData['oauth_provider'] = 'googlePlus';
        $userData['first_name'] = $this->input->post('first_name',true);
        $userData['last_name'] =  $this->input->post('last_name',true);
        $userData['email'] =  $this->input->post('email',true);
         $userData['user_type'] = '3';
	      $userData['status'] = 'active';

        $userdone = $this->home_mod->checkfbUser($userData);
        if (!empty($userdone)) {
            if ($userdone['status'] === 'success') {
                $userdone['link']     =   base_url().'dashboard/';
                $this->session->set_userdata("userinfo", $userdone['user_info']);
                $this->session->set_userdata("login_type", $userdone['user_info']->user_type);
                $this->session->set_userdata('isLogin', 'yes');
           } else if ($userdone['status'] === 'error') {
                $page = "home/login";
                $userdone['html'] = $this->load->view($page, '', true);
                $userdone['status'] = 'error';
                $userdone['error_msg']  =   $userdone['error_msg'];
           }
        } else {
            $page = "home/login";
            $userdone['html'] = $this->load->view($page, '', true);
            $userdone['status'] = 'error';
            $userdone['error_msg']  =   'Your account has been inactive.!';
        }
        echo json_encode($userdone); die;
    }
    
    public function linkdin_login() {
  
        $userData['oauth_provider'] = 'linkedin';
        $userData['first_name'] = $this->input->post('first_name',true);
        $userData['last_name'] =  $this->input->post('last_name',true);
        $userData['email'] =  $this->input->post('email',true);
	    $userData['user_type'] = '3';
		$userData['status'] = 'active';
        // Insert or update user data

        $userdone = $this->home_mod->checkfbUser($userData);//pr( $userdone );die;
        if (!empty($userdone)) {
            if ($userdone['status'] === 'success') {
                // $userdone['link']     =   base_url().'dashboard/';
                $this->session->set_userdata("userinfo", $userdone['user_info']);
                $this->session->set_userdata("login_type", $userdone['user_info']->user_type);
                $this->session->set_userdata('isLogin', 'yes');
           } else if ($userdone['status'] === 'error') {
                $page = "home/login";
                $userdone['html'] = $this->load->view($page, '', true);
                $userdone['status'] = 'error';
                $userdone['error_msg']  =   $userdone['error_msg'];
           }
        } else {
            $page = "home/login";
            $userdone['html'] = $this->load->view($page, '', true);
            $userdone['status'] = 'error';
            $userdone['error_msg']  =   'Your account has been inactive.!';
        }
        echo json_encode($userdone); die;
    }
	
	/** 
	*	function for search vendor
	*	created by santosh kumar
	*
	*/
	
	public function search()
	{
		$perPage = 6;
        $page = 1;
		if($this->input->get('page')){
			$page = $this->input->get('page');
		}
		$start = ($page-1)*$perPage;
        $result = $this->home_mod->get_vendor_list($start,$perPage);
		
		$data['pageno'] = $page;
		$data['pages'] = ceil($result['num_rows']/$perPage);
		
		$data['result'] = $result['result'];//pr($data['result'] );die;
		
		$qry=$this->db->select('id,city_name')->get_where('city_master',array('status'=>'active'));
		$data['city_list'] = ($qry->num_rows()>0)? $qry->result() :array();
		
		if(isset($_GET['v_city'])){
			$Aqry=$this->db->select('id,area_name')->get_where('area_master',array('city_id'=>$_GET['v_city'],'status'=>'active'));
			$data['area_list'] = ($Aqry->num_rows()>0)? $Aqry->result() :array();
		}
		else{
			$data['area_list'] = array();
		}
		
		$sqry=$this->db->select('id,name')->get_where('services');
		$data['services'] = ($sqry->num_rows()>0)? $sqry->result() :array();
		
        $config['base_url'] = '';
		$data['page']       = 	'search';
        $this->load->view('front_layout', $data);
	}
	
	public function load_more()
    {
		$perPage = 6;
        $page = 2;
		
		
		if(!empty($_GET["page"])) {
			$page = $_GET["page"];
		}
		$start = ($page-1)*$perPage;
        $result = $this->home_mod->get_vendor_list($start,$perPage);
		$pages  = ceil($result['num_rows']/$perPage);
		$html = '';
		$j = 1;
		foreach($result['result'] as $vendor){ 
			if($j==1){
				$slide = 'slideInLeft';
			}
			else if($j==2){
				$slide = 'fadeInUp';
			}
			else if($j==3){
				$slide = 'slideInRight';
			}
			$html .= '<div class="col-lg-4 col-md-4 text-center wow '.$slide.' data-wow-duration="1s" data-wow-delay="0.2s" style="visibility: visible; animation-name: '.$slide.';">
			<div class="college-box service-box border-radius-8"> ';
			$html .= (!empty($vendor->vendor_logo) &&  file_exists('assets/vendor_image/'.$vendor->vendor_logo))?'<img class="box-img" height="50px" width="50px" src="'. base_url() .'assets/vendor_image/'.$vendor->vendor_logo.'">':'<img height="50px" width="50px" class="box-img" src="'. base_url() .'frontend_assets/img/user-placeholder.png">';
			
			$html .= '<h3>'.$vendor->vendor_name.'</h3>';
			$service_ids = explode(',',$vendor->service_id);
			$sercises = get_vendor_service_offered($service_ids);
			$newArr = array();
			foreach($sercises as $value){
				array_push($newArr,$value->name);
			}
			$html .= '<p class="text-muted text-height-fix">'. implode(',',$newArr) .'</p>';
			if(isset($vendor->age_min)&& !empty($vendor->age_min)){
				$min = $vendor->age_min;
				$max = $vendor->age_max;
			}
			else{
				$min = "N/A";
				$max = "N/A";
			}
			
			$html .= '<p class="text-muted">Age Group : '.$min.' to '. $max .' Years </p>';
			
			$html .= '<p class="text-muted">Monthly: $'.$vendor->monthly_min.' - $'.$vendor->monthly_max.' </p><p class="text-muted">Established in ';
			if(isset($vendor->year_of_establishment) && !empty($vendor->year_of_establishment))
		   {
			   $years = $vendor->year_of_establishment;
		   }
		   else{
			   $years = "N/A";
		   }
			$html .= $years.'</p>';
			if ($this->session->userdata('isLogin') === 'yes'){
				$html .= '<a href="'.base_url().'home/services/'.ID_encode($vendor->id).'" class="btn">view more</a> ';
			}
			else{
				$html .= '<a href="#" data-toggle="modal" data-target="#loginmodel" onclick="set_vendor_id('.ID_encode($vendor->id).')"  class="btn">view more</a>';
			}
			$html .= '</div></div><div style="display:none;"><input type="hidden" class="pagenum" value="'.$page.'" /><input type="hidden" class="total-page" value="'.$pages.'" /></div>';
			$j++;
			if($j ==4){
				$j=1;
			}
		}
		
		echo $html;
		
    }

	public function getAreaName() {
        if (isPostBack()) {
            $city_id = $this->input->post('city_id');
            $data = $this->db->get_where('area_master', ['city_id' => $city_id,'status'=>'active'])->result();
           
            $option = '<option value="">Select Area Name</option>';
            if(!empty($data)){
               foreach($data as $area){
                    $option .= '<option value="'.$area->id.'">'.$area->area_name.'</option>';
                }  
            }
           

            echo $option;
        }
    }
	
	/* 
	*
	*
	*/
	
	public function addToWishlist() {
        if (isPostBack()) {
            $vendor_id = ID_decode($this->input->post('vendor_id'));
			$vendor_arr = array(); 
			$vendor_session = $this->session->userdata("vendor_arr");
			if($vendor_session){
				if($vendor_id){
					if(!in_array($vendor_id,$vendor_session)){
					array_push($vendor_session,$vendor_id);
					$this->session->set_userdata("vendor_arr", $vendor_session);
					echo 1;
					}
					else{
						echo "Already exists";
					}
				}
				else{
					echo "";
				}
				
			}
			else{
				array_push($vendor_arr,$vendor_id);
				$this->session->set_userdata("vendor_arr", $vendor_arr);
				echo 1;
			}
        }
    }
	
	/* 
	*
	*
	*/
	
	public function removeToWishlist() {
        if (isPostBack()) {
            $vendor_id = ID_decode($this->input->post('vendor_id'));
			$vendor_arr = array(); 
			$vendor_session = $this->session->userdata("vendor_arr");
			if($vendor_session){
				if($vendor_id){
					if(in_array($vendor_id,$vendor_session)){
					 $array = array_diff($vendor_session, [$vendor_id]);
					$this->session->set_userdata("vendor_arr", $array);
					echo 1;
					}
					else{
						echo "This vendor does not exist in wish lists!!";
					}
				}
				else{
					echo "";
				}
				
			}
			else{
				array_push($vendor_arr,$vendor_id);
				$this->session->set_userdata("vendor_arr", $vendor_arr);
				echo 1;
			}
        }
    }
	
	/* 
	*
	*
	*/
		function services($id = null)
	{
		if ($id != NULL) {
			$id = ID_decode($id);
		}
		$data['vendor_details'] = $this->home_mod->getVendorsDetail($id);
		// pr($data['vendor_details']->user_id);die;
        $data['page']       = 	'services';
		$this->load->view('front_layout', $data);
	}

	public function schedule_appintment()
	{
	    $is_valid_request=1;
	   if (isPostBack()) {
            $parent_id=currUserId(); 	    
			//'1'=>confirm schedule,'2'=>done,'3'=>closed,4=>pending,'5'=>Not Confirmed,'6'=>admin approved,'7'=>cancelled by parents
             //////////////////////
                $postData = $this->input->post();
				unset($postData['x']);
				unset($postData['y']);
				$i = 0;
				$vendor_id = array();
				$insertData = array();
				$vid_array=array();
				foreach($postData['vendor_id'] as $value){
				$vid_array[]=$value;
				}
             $msg='Sorry, Your appointment could not be scheduled';   
            ///////////////////////////		
			$qry=$this->db->select('count(id) as totals')
					 ->from('appointment_schedular')	
					 ->where_not_in('appointment_status',array('3','7','5','6'))
					 ->where('user_id',$parent_id)
					 //->or_where_in('vendor_id',$vid_array)
					 ->get();
			$total_request=	($qry->num_rows()>0) ?  $qry->row()->totals : 0;	
              
            if($total_request>=3)
            {
                $is_valid_request=0;
                $msg="You have already scheduled 3 appointments!!";
            } 
              
           	if($is_valid_request==1)
            {		 
    			$qry1=$this->db->select('count(id) as totals')
    					 ->from('appointment_schedular')	
    					 ->where_not_in('appointment_status',array('3','7','5','6'))
    					 ->where('user_id',$parent_id)
    					 ->where_in('vendor_id',$vid_array)
    					 ->get();
    		     $request_total=($qry1->num_rows()>0) ?  $qry1->row()->totals : 0; 
                if($request_total>0){
                    $is_valid_request=0; 
                    $msg="You have selected one vendor that has been already requested,but still pending!!";
                }
            }
            if($is_valid_request==1)
            {
                $max_request=3;
                $total_recived=count($vid_array);
                $can_sentrequest=$max_request-$total_request; //request count that are already present without 3,5,6,7
                $msg="You have already scheduled ".$total_request." appointments,now you can schedule only ".$can_sentrequest." appointments!!"; 
                $is_valid_request=($total_recived>$can_sentrequest) ? 0 : 1;
              
            }
         //   echo $is_valid_request."<br/>".$msg; die;
            if( $is_valid_request==0)
			{
			     
                    $this->session->set_flashdata('item',$msg);
					redirect('home/schedule_appintment');
			}
			else 
			   {
				
                    $postData = $this->input->post();
					unset($postData['x']);
					unset($postData['y']);
					$i = 0;
					$vendor_id = array();
					$insertData = array();
					
					foreach($postData['vendor_id'] as $value){
						// pr($value);die;
						$vendor_id[] = $postData['vendor_id'][$i];
						
						$insertData[$i]['user_id'] = $this->session->userdata("userinfo")->id;
						$insertData[$i]['vendor_id'] = $postData['vendor_id'][$i];
						$insertData[$i]['vendor_user_id'] = $postData['vendor_user_id'][$i];
						$insertData[$i]['schedule_time'] = date("Y-m-d H:i:s", strtotime($postData['datetime'][$i]));
						$insertData[$i]['remarks'] = $postData['remark'][$i];
						
						$insertData[$i]['created_date'] = date('Y-m-d H:i:s');
						$i++;
			    }
					// pr($insertData);die;
					$result = $this->home_mod->add_vendor_schedular($insertData);//pr($result);die;
					$vendorArr = $this->session->userdata("vendor_arr");
					$finalArr = array_diff($vendorArr,$vendor_id);
					//pr($finalArr);die;
					$this->session->set_userdata("vendor_arr",$finalArr);
					$this->session->set_flashdata('item','Your appointment request has been sent successfully!!');
					redirect('home/schedule_appintment');
			   }				
			}
					
			$vendor_arr = $this->session->userdata("vendor_arr");
			//pr($vendor_arr);die;
			$data['result'] = $this->home_mod->get_vendor_schedular($vendor_arr);
			// pr($data['result']);die;
			$data['page']       = 	'schedule_appintment';
			$this->load->view('front_layout', $data);
		}
        
        
        function calulate_time_mapapi()
        {
            $parent_org=($this->input->post('org_lat')) ? $this->input->post('org_lat') : "Faridabad";
            $parent_dest=($this->input->post('dest_lat')) ? $this->input->post('dest_lat') : "Delhi";
            $distance=$duration='';
            $url="https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=".str_replace(' ', '+', $parent_org)."&destinations=".str_replace(' ', '+', $parent_dest)."&key=AIzaSyCaTHVp3qCjbztUnybRv3fW_xql-qPgPRA";
          
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $response = curl_exec($ch);
                curl_close($ch);
                $response_all = json_decode($response);
                if(!empty($response_all) && $response_all->status=='OK')
                {
                   $distance=(isset($response_all->rows[0]->elements[0]->distance->text) && !empty($response_all->rows[0]->elements[0]->distance->text)) ? $response_all->rows[0]->elements[0]->distance->text : "";
                   $duration=(isset($response_all->rows[0]->elements[0]->duration->text) && !empty($response_all->rows[0]->elements[0]->duration->text)) ? $response_all->rows[0]->elements[0]->duration->text : "";
                   echo 'Distance : '.$distance.', Estimated Time : '. $duration; 
                } 
                else if(!empty($response_all) && $response_all->status=='NOT_FOUND')
                {
                    echo "The origin and/or destination of this pairing could not be geocoded.";
                 
                }
                else if(!empty($response_all) && $response_all->status=='ZERO_RESULTS')
                {
                    echo "No route could be found between the origin and destination.";
                }
                else{
                    echo "";
                                    
                }                                                    
                die;
          
        }
		public function isVendorExist($vendor_id,$parent_id)
		{
			$qry=$this->db->select('count(id) as totals')
					 ->from('appointment_schedular')	
					 ->where_not_in('appointment_status',array('3','7','5','6'))
					 ->where('user_id',$parent_id)
					 ->where('vendor_id',$vendor_id)
					 ->get()
					 ->row();
			 $flag=($qry->totals>0)?true:false;
			 return $flag;
		}

}
?>