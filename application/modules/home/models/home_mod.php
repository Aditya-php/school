<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Auth Model 
 *
 * @package		Auth
 * @subpackage	Models
 * @category	Authentication 
 * @author		Arvind Soni
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */

class Home_mod extends CI_Model {



    /**
     * Constructor
    */
    function __construct() {
            parent::__construct();
    }
    /**
     * End
    */

 
    public function add_user()
    {
		
        $password = $this->security->xss_clean($this->input->post('password', true));
        $salt = '';
        $salt = generate_salt();
        $salt = '$6$rounds=5000$' . $salt . '$';
        $password_encrypt = crypt($password,$salt);
        $arr_encrypt = explode('$', $password_encrypt);
        $password = $arr_encrypt['4'];
        $data['first_name'] = strtolower($this->input->post('first_name', true));
        $data['last_name'] = strtolower($this->input->post('last_name', true));      
        $data['email'] = $this->input->post('email', true);
		$data['contact_number'] = $this->input->post('contact_number', true);
		$data['address'] = $this->input->post('address', true);
		$data['city_id'] = $this->input->post('city_id', true);
		$data['area_id'] = $this->input->post('area_id', true);
        $data['password'] = $password;
        $data['salt'] = $salt;
		$data['created'] 	= current_date();
        $data['last_login'] = current_date();
	    $data['user_type'] 	= 3;			
        $data['status'] 	= 'active';
        $data['unique_id']=generate_id(3);
	
        $this->db->insert("users",$data);
		// echo $this->db->last_query();
        $ins_id = $this->db->insert_id();

        if ($ins_id) {
           $res =$ins_id;
	    }else {
            $res		=	'0';          
        }
		 return $res;
		
        
    }
	
	
	
	
	
	
	
	
	
	public function find_area_list($id,$area_id=null)
	{  	
		$rData = '<option value="">Select Area</option>';
		$this->db->select('id,area_name');  
						$this->db->from('area_master');  
						$this->db->where('city_id',$id);  
						$this->db->where('status','active');  
		  $query = $this->db->get(); 
		  //echo $this->db->last_query(); die;
		if($query->num_rows>0)
		{
			
			foreach($query->result() as  $value)
			 {	
				$rData .= '<option value="'.$value->id.'" '.set_select('area_id',$value->id,((!empty($area_id) && ( $value->id == $area_id) ) ? TRUE : FALSE )).' >'.$value->area_name.'</option>';
			 }
		}
		else{
			$rData= '<option value="">No Area Found</option>';
		}
		return $rData;  
} 
    /*End of function*/
    
     /**
     * add
     * This function add new articles
     * 
     * @access	public
     * @param   String   plain string
     * @return	String   encrypted string
     */
    	function login_authorize() 
        {    
            $this->form_validation->set_rules('email', lang('email'), 'trim|required');
            $this->form_validation->set_rules('password',lang('password'), 'trim|required');

            $email	=	$this->security->xss_clean($this->input->post('email', true));
            $password	=	$this->security->xss_clean($this->input->post('password', true));
        
            if ($this->form_validation->run() === false) {
				$data['error_msg']	=	validation_errors();
				$data['status']		=	'error';
				return $data;
            }
           
            $this->db->where("email", $email);
			 $this->db->from("users");
            $query	=	$this->db->get();
			if ($query->num_rows() > 0) 
            {
				$row               	=   $query->row();
                $password_encrypt	=   crypt($password,$row->salt);
                $arr_encrypt		=   explode('$',$password_encrypt);
                $password			=	$arr_encrypt['4'];
		
		    if ($password === $row->password) {
				$user_info	=	$row;
                unset($user_info->password);

				$user_info->name	=	$user_info->first_name . ' ' . $user_info->last_name;
                if ($user_info->status === "inactive" || $user_info->is_delete === "1" || $user_info->user_type === "1") 
                {
                    if((int)$user_info->user_type === 1)
                    {
                            $data['error_msg']	=	"Invalid login credential";
                    }else{
                            $data['error_msg']	=	"Your account has been inactive";
                    }				
                    $data['status']	=	'error';
                    return $data;
                }
                
                /*if((int)$user_info->email_verify === 0 && ((int)$user_info->user_type === 3 || (int)$user_info->user_type === 2))
                {
                        $data['error_msg']	=	"Account under email verification";
                        $data['status']		=	'error';
                        return $data;
                }*/
                
                $data['status']		=	'success';
                $data['user_type']	=	$user_info->user_type;
                $data['result']		=	$user_info;
                return $data;
            }else{
				
				$data['error_msg']	=	"Invalid login credential";
				 $data['status']		=	'error';
				 return $data; 
			}
	}else{
		 $data['error_msg']	=	"Invalid login credential";
		 $data['status']		=	'error';
		 return $data; 
	}

	// 
	
}


	function forget() 
    {
		$return=array();
		$this->form_validation->set_rules('email',lang('email'), 'trim|required|valid_email');
		$email			=	$this->input->post('email', true);
		if ($this->form_validation->run() === false) {
			$return['error_msg']	=	validation_errors();
			$return['valid']		=	false;
			$return['error_lang']	=	"";
			return $return;
		}
		else
		{
                $this->db->where("email", $email);
				$this->db->from('users');
                $result	=	$this->db->get();	
		          if ($result->num_rows > 0) {
                    $userData			=	$result->row();
                    $mail_password		=	random_string('alnum', 6);
                    $first_name			=	$userData->first_name . ' ' . $userData->last_name;//pr( $first_name	);die;
                    $email			=	$userData->email;
        //------------- secure encryption-------------------
                    $salt				=	generate_salt();
                    $salt				=	'$6$rounds=5000$'.$salt.'$';
                    $password_encrypt	=	crypt($mail_password,$salt );
                    $arr_encrypt_new	=	explode('$',$password_encrypt);
                    $password			=	$arr_encrypt_new['4']; 
                    $updateData			=	array('password' => $password,'salt'=>$salt);
                    $this->db->where('id', $userData->id);
                    
                    $updatable			=	$this->db->update('users', $updateData);//pr($updatable);die;
                    

                    $return['valid']		=	true;
                    $return['new_password']	=	$mail_password;
                    $return['first_name']		=	$first_name;
                    $return['email']	=	$email;
                }else{
					$return['error_msg']        =	"Email Address does exists in our records!!";
					$return['valid']            =	false;
					// pr($return);
				}
				 return $return;
		}
		
		
	}
    /*End of function*/
	
	
	   public function checkfbUser($data = array()) {
      // pr($data);  die;
        $this->tableName = 'users';
        $this->primaryKey = 'id';
        $this->db->select('*');
        $this->db->from($this->tableName);
        $this->db->where(array('email' => $data['email']));
		
		// $this->db->where('status','active');
        $prevQuery = $this->db->get();//pr($prevQuery);die;

        $prevCheck = $prevQuery->num_rows();
       // pr($prevCheck); die;
        if ($prevCheck > 0) {
            //data exists
            $prevResult = $prevQuery->row();//pr($prevResult);die;
//            pr($prevResult->id); die;
            if ($prevResult->status === "inactive") {
                if ($prevResult->user_type === '1') {
                    $data['error_msg'] = "Admin account is inactive.";
                    $data['status'] = 'error';
                    return $data;
                } else {
                    $data['error_msg'] = "Your account has been inactive.";
                    $data['status'] = 'error';
                    return $data;
                }
            } else {

                $data['modified']= date("Y-m-d H:i:s");
                $data['last_login'] = date("Y-m-d H:i:s");

                $update = $this->db->update($this->tableName, $data, array('id' => $prevResult->id,'user_type'=>'1'));
                $ret['status'] = 'success';
                $ret['user_info'] = $prevResult;
//            pr($ret); die;
                return $ret;
            }

//            pr($prevResult); die;
        } else {
            //data not exists
            $data['created'] = date("Y-m-d H:i:s");
            $data['unique_id']=generate_id(3);
            $data['last_login'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName, $data);
            $userID = $this->db->insert_id();

            
                
          //  $update = $this->db->update($this->tableName, $data, array('id' => $userID));
            $getdata = $this->db->select('*')->where('id', "$userID")->where('user_type','3')->get('users')->row();

            $dat['status'] = 'success';
            $dat['user_info'] = $getdata;
            return $dat;
            //pr($data); pr($dat);die;
        }
    }
	
	/* 
	*	create function for vendor listing.
	*
	*/
	
	public function get_vendor_list($start,$perPage){
		$getData = $this->input->get();
		//pr($getData); die;
		if(isset($getData)){
			$city		= (isset($getData['v_city']))?$getData['v_city']:'';
			$area		= (isset($getData['v_area_id']))?$getData['v_area_id']:'';
			$service	= (isset($getData['v_service_id']))?$getData['v_service_id']:'';
			$budget_type	= (isset($getData['budget_type']))?$getData['budget_type']:'';
			$range_min	= (isset($getData['range_min']))?$getData['range_min']:'';
			$range_max	= (isset($getData['range_max']))?$getData['range_max']:'';
            $distance	= (isset($getData['distance']))?$getData['distance']:'';
            $lat	= (isset($getData['lat']))?$getData['lat']:'';
            $lang	= (isset($getData['lang']))?$getData['lang']:'';
		}
		if(isset($area) && !empty($area)){ 
    	      $loc['area_id']=$area;
              $this->load->model('admin/vendor_mod');
    	      $get_latitude=$this->vendor_mod->get_lat_long($loc);
              if(isset($get_latitude) && !empty($get_latitude)){
    			 $exp_lat = explode(',',$get_latitude);
                 $lat=(isset($exp_lat['0']) && !empty($exp_lat['0'])) ? floatval($exp_lat['0']) : "";
                 $lang=(isset($exp_lat['1']) && !empty($exp_lat['1'])) ? floatval($exp_lat['1']) : ""; 
    	      }
    	} 
		$this->db->select('vd.id,vd.vendor_name,vd.nature_of_vendor,
		vd.year_of_establishment,vd.age_min,vd.age_max,vd.vendor_logo,
		vd.monthly_min,vd.monthly_max,vd.service_id,vd.v_status');
        $this->db->from('vendor_details vd');
		//$this->db->join("services s", "s.id = vd.service_id", "left");
		$this->db->join("vendor_location vl", "vl.vendor_id = vd.id", "left")
		  ->where('vd.v_status','1');
		if($service){
			$this->db->where("FIND_IN_SET('$service',vd.service_id) !=",0);
		}
		if($city){
			$this->db->where('vl.city',$city);
		}
		if($area){
			$this->db->where('vl.area_id',$area);
		}
	
        if(isset($budget_type) && !empty($budget_type)){
            if(!empty($range_min) && !empty($range_max)){
                $this->db->where('vd.'.$budget_type.'_min != ','0');
                $this->db->where('vd.'.$budget_type.'_max != ','0');
                $this->db->where('vd.'.$budget_type.'_min BETWEEN '.$range_min.' AND '.$range_max.'');
            }
            else if(!empty($range_min) && empty($range_max)){
                $this->db->where('vd.'.$budget_type.'_min != ','0');
                $this->db->where('vd.'.$budget_type.'_min >= ',$range_min);
            }
            else if(!empty($range_max) && empty($range_min)){
                $this->db->where('vd.'.$budget_type.'_max != ','0');
                $this->db->where('vd.'.$budget_type.'_max <= ',$range_max);
            }
        }
        
		if(isset($distance) && !empty($distance)){
		  if(!empty($lang) && !empty($lat)){
		      $str="( 3959 * acos( cos( radians(" . $lat . ") ) * cos( radians( vl.latitude ) ) * cos( radians( vl.longitude ) - radians(" . $lang . ") ) + sin( radians(" . $lat . ") ) * sin( radians( latitude ) ) ) ) < " . $distance;
		      $this->db->where($str, NULL, FALSE);  
          }
		}
		
		$this->db->group_by('vl.vendor_id');
		$this->db->limit($perPage,$start);
		$results	=	$this->db->get();
		
		// total
		$this->db->select('vd.id');
        $this->db->from('vendor_details vd');
		$this->db->join("vendor_location vl", "vl.vendor_id = vd.id", "left")
		  ->where('vd.v_status','1');
		if($service){
			$this->db->where("FIND_IN_SET('$service',vd.service_id) !=",0);
		}
		if($city){
			$this->db->where('vl.city',$city);
		}
		if($area){
			$this->db->where('vl.area_id',$area);
		}
		 if(isset($budget_type) && !empty($budget_type)){
            if(!empty($range_min) && !empty($range_max)){
                $this->db->where('vd.'.$budget_type.'_min != ','0');
                $this->db->where('vd.'.$budget_type.'_max != ','0');
                $this->db->where('vd.'.$budget_type.'_min BETWEEN '.$range_min.' AND '.$range_max.'');
            }
            else if(!empty($range_min) && empty($range_max)){
                $this->db->where('vd.'.$budget_type.'_min != ','0');
                $this->db->where('vd.'.$budget_type.'_min >= ',$range_min);
            }
            else if(!empty($range_max) && empty($range_min)){
                $this->db->where('vd.'.$budget_type.'_max != ','0');
                $this->db->where('vd.'.$budget_type.'_max <= ',$range_max);
            }
        }
		if(isset($distance) && !empty($distance)){
		  if(!empty($lang) && !empty($lat)){
		      $str="( 3959 * acos( cos( radians(" . $lat . ") ) * cos( radians( vl.latitude ) ) * cos( radians( vl.longitude ) - radians(" . $lang . ") ) + sin( radians(" . $lat . ") ) * sin( radians( latitude ) ) ) ) < " . $distance;
		      $this->db->where($str, NULL, FALSE);  
          }
		}
		$this->db->group_by('vl.vendor_id');
		$total = $this->db->get()->num_rows();
		
		if($results){
			$data['result'] = $results->result();
			$data['num_rows'] = $total;
		}
		else{
			$data['result'] = array();
		}
		return $data;
	}
	


	function getVendorsDetail($id=null)
	{
		 $sql=$this->db->select('v.*')
						  ->from('vendor_details v')
						  //->join('services s','s.id= v.service_id')
						  // ->join('users u','u.id= v.user_id')
						   ->where('v.id',$id)
						   // ->order_by('id','desc')
						  ->get();
						     //echo $this->db->last_query();die;
	return ($sql->num_rows()>0) ? $sql->row() : array();	
	}
	
	/* 
	* get vendor  list of schedilar
	*/
	function get_vendor_schedular($data)
	{
	   if(!empty($data)){
		    $qry =$this->db->select('id,user_id,vendor_name,vendor_logo')
	           ->from('vendor_details')
			   ->where_in('id',$data)
			   ->get();
			   // echo $this->db->last_query();die;
			  
		   return ($qry->num_rows()>0) ? $qry->result() : array();
		   //return ($qry->num_rows()>0) ? $qry->row() : array();
	   }
		else{
			return array();
		}
	  
	}
	
	/* 
	* add vendor  of schedilar
	*/
	function add_vendor_schedular($data = array())
	{
	
	    $result = $this->db->insert_batch("appointment_schedular",$data);
		return $result;
	}
	
	function TestimonialFetch()
	{
		 $sql=$this->db->select('test.parent_id,test.description,test.status,test.status,test.id,u.first_name,u.last_name,u.profile_image')
						  ->from('testimonial test')
						  ->join('users u','u.id=test.parent_id','left')
					   	   ->where('test.status','3')
						   ->get();
	return ($sql->num_rows()>0) ? $sql->result_array() : array();
	}


}
