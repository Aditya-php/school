<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Socialmedia_sites Model
 *
 * @package		admin
 * @category	Socialmedia 
 * @author		Arvind Soni
 * @website		http://www.tekshapers.com
 * @company     Tekshapers Inc
 * @since		Version 1.0
 */

class Vendor_mod extends CI_Model {
	
	//var $tbl_socialmedia_sites		=	"socialmedia_sites";
	/**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    /*End*/
    
    function get_sites()
    {
		$this->db->select("*");
		$query	=	$this->db->get($this->tbl_socialmedia_sites);
		if ($query->num_rows() > 0) {
			$data['status']		=	'success';
            $data['result']		=	$query->result();
		} else {
			$data['status']		=	'error';
			
		}
		return $data;
	}
	
	function edit($siteId = array())
	{
		
		$this->db->set('status','inactive');
		// $users['modified_by']=currUserId();
		$this->db->update($this->tbl_socialmedia_sites);
		if(count($siteId))
		{
			$this->db->where_in("id",$siteId);
			$this->db->set('status','active');
			// $users['modified_by']=currUserId();
			$this->db->update($this->tbl_socialmedia_sites);
			
		}
		$rs['status']	=	"success";
		return $rs;
		
	}
	
	/* *
	*	create function for add vendor in formation
	* 	craeted by santosh kumat
	*	created date : 05/03/2017.
	*/
	
	public function add_vendor($data)
	{	//pr($data);die;
		$location	=	$data['location_vendor'];
		unset($data['location_vendor']);
		$data['created_date'] 	= date("Y-m-d h:i:s");
		$data['modified_date'] 	= date("Y-m-d h:i:s");
		
		// user details
		$users['user_name']			=	$data['vendor_name'];
		$users['contact_number']	=	$data['moblie_1'];
		$users['email']				=	$data['email'];
		$users['created']			=	date("Y-m-d h:i:s");
		$users['user_type']			=	4;
		// password generate
		
		if ($users['email']) 
		{
			$mail_password		=	random_string('alnum', 6);
			
			//------------- secure encryption-------------------
			$salt				=	generate_salt();
			$salt				=	'$6$rounds=5000$'.$salt.'$';
			$password_encrypt	=	crypt($mail_password,$salt );
			$arr_encrypt_new	=	explode('$',$password_encrypt);
			$password			=	$arr_encrypt_new['4']; 
			$updateData			=	array('password' => $password,'salt'=>$salt);
			
			$users['password']  = $password;
			$users['salt']  	= $salt;
			$users['status']  	= ($data['v_status'] == 1 && isset($data['v_status']))?'active':'inactive';

			// mail
	        $login_link	=	base_url().'admin/auth';
			$email_data['to']           =   $users['email'];
			$email_data['from']         =   ADMIN_EMAIL;
			$email_data['sender_name']  =   ADMIN_NAME;
			$email_data['subject']      =   "Vendor Login Detail";
			$email_data['message']      =   array('header' => "You have Registered successfully!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;">Hello'."&nbsp;&nbsp;<b>".ucwords($users['user_name']).'</b>,<br> <br>  <span style="color:#000;">Please find your credentials below: </span><br><span style=" color:#000"> Username:'.$users['email'].'</span><br><span style="color:#000;"><span style=" color:#000"> New Password:'.$mail_password.'</span><br><span style="color:#000;">','button_link'=>$login_link,"button_content"=>"Click here for login");
		  
           _sendEmailNew($email_data); 
		}
		$users['created_by']=currUserId();
		$this->db->insert("users",$users);
		$user_id = $this->db->insert_id();
		
		if($user_id){
			$data['user_id'] = $user_id;
			$data['staff_ratio'] = $data['staff_ratio_1'].':'.$data['staff_ratio_2'];
			unset($data['staff_ratio_1']);
			unset($data['staff_ratio_2']);
			$data['created_by']=currUserId();
			$this->db->insert("vendor_details",$data);
			// echo $this->db->last_query();
			$vendor_id = $this->db->insert_id();
			
			if($vendor_id) {
				$vendor_location = json_decode($location,true);
				if(!empty($vendor_location)){
				   	if($vendor_location['city']){
						$i = 0;
						foreach($vendor_location['city'] as $locations){
						    
							$locationData['vendor_id'] 				= $vendor_id;
							$locationData['city'] 				= isset($vendor_location['city'][$i])?$vendor_location['city'][$i]:'';
							$locationData['area_id'] 				= isset($vendor_location['area_id'][$i])?$vendor_location['area_id'][$i]:'';
							$locationData['address'] 				= isset($vendor_location['address'][$i])?$vendor_location['address'][$i]:'';
							$locationData['pin_code'] 				= isset($vendor_location['pin_code'][$i])?$vendor_location['pin_code'][$i]:'';
							$locationData['nature_of_location'] 	= isset($vendor_location['nature_of_location'][$i])?$vendor_location['nature_of_location'][$i]:'';
							$locationData['other'] 				= isset($vendor_location['location_other'][$i])?$vendor_location['location_other'][$i]:'';
							$locationData['created_date'] 			= date("Y-m-d h:i:s");
							$locationData['modified_date'] 		= date("Y-m-d h:i:s");
							
                            $get_latitude=$this->get_lat_long($locationData); 
							if(isset($get_latitude) && !empty($get_latitude)){
    							 $exp_lat = explode(',',$get_latitude);
                                 $locationData['latitude']=(isset($exp_lat['0']) && !empty($exp_lat['0'])) ? $exp_lat['0'] : "";
                                 $locationData['longitude']=(isset($exp_lat['1']) && !empty($exp_lat['1'])) ? $exp_lat['1'] : ""; 
							}
							
							$locationData['created_by']=currUserId();
							$this->db->insert("vendor_location",$locationData);
							$i++;
						}
					}
				}
				
				return $vendor_id;
			  
			}else {
			   return false;          
			}
		}
	}
    
    /* 
	* 	Function create get lat long from address
	*	created by santosh kumar
	*
	*/
    
    //function used for get lat long from address
	function get_lat_long($locationData){
	    
        $address=$location_det='';
        if(isset($locationData['address']) && !empty($locationData['address']))
        {
              $address = str_replace(" ", "+", $locationData['address']);
        }else if(isset($locationData['area_id']) && !empty($locationData['area_id']))
        {
           $qry=$this->db->select('ar.area_name,ct.city_name')
                    ->from('area_master ar')
                    ->join('city_master ct','ar.city_id=ct.id')
                    ->where('ar.id',$locationData['area_id'])
                    ->get();
           if($qry->num_rows()>0){
              $adr_name=$qry->row()->area_name.' '.$qry->row()->city_name;
              $address=str_replace(" ", "+", $adr_name);
           }
        }
        if(isset($address) && !empty($address)){
            	//$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
        		$json = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyCjDNYWR0ufYMSsysFp3I2dpl_4nl1y7iA");
        		$json = json_decode($json);
        		if(isset($json->{'results'}[0]) && !empty($json->{'results'}[0]))
        		{
        			$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        			$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        			$location_det= $lat.','.$long;
        		}
                else
        		{
        			if(isset($locationData['pin_code'] ) && !empty($locationData['pin_code'] ))
        			{
        			    $zipcode=$locationData['pin_code'] ;
                    	$json = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$zipcode&key=AIzaSyCjDNYWR0ufYMSsysFp3I2dpl_4nl1y7iA");
        				$json= json_decode($json);
        				
        				$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        				$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        				$location_det= $lat.','.$long;
        			}
        		}
            
        }
        return $location_det;
		

	
	}
	
	/* 
	* 	Function create for get vendor details
	*	created by santosh kumar
	*
	*/
	
	function get_vendor($id)
    {
		$this->db->select("*");
		$query	=	$this->db->get_where('vendor_details',array('id'=>$id));
		if ($query->num_rows() > 0) {
			$data['status']		=	'success';
            $data['result']		=	(array)$query->row();
		} else {
			$data['status']		=	'error';
			
		}
		return $data;
	}
	
	/* 
	* 	Function create for get vendor location
	*	created by santosh kumar
	*
	*/
	
	function get_vendor_location($id)
    {
		$this->db->select("*");
		$query	=	$this->db->get_where('vendor_location',array('vendor_id'=>$id));
		if ($query->num_rows() > 0) {
			$data['status']		=	'success';
            $data['result']		=	$query->result_array();
		} else {
			$data['status']		=	'error';
			
		}
		return $data;
	}
	
	/* *
	*	create function for update vendor in formation
	* 	craeted by santosh kumat
	*	created date : 07/03/2017.
	*/
	
	public function update_vendor($id,$data,$type=null)
	{	
		if(isset($data['location_vendor'])){
			$location	=	$data['location_vendor'];
			unset($data['location_vendor']);
			$this->db->where('vendor_id',$id);
			$this->db->delete('vendor_location');
		}
			

		$data['modified_date'] 	= date("Y-m-d h:i:s");
		if(isset($data['staff_ratio_1']) && isset($data['staff_ratio_2']))
		{
			$data['staff_ratio'] = $data['staff_ratio_1'].':'.$data['staff_ratio_2'];
			unset($data['staff_ratio_1']);
			unset($data['staff_ratio_2']);
		}
		
		$this->db->where('id',$id);
		$data['modified_by']=currUserId();
		$this->db->update("vendor_details",$data);
		// echo $this->db->last_query();
		
		if($id) 
		{
		     if($type==1){
    		      $qry= $this->db->select('user_id')->get_where('vendor_details',array('id'=>$id));
                 if($qry->num_rows()>0 && !empty($qry->row()->user_id)){
                        $users['user_name']			=	$data['vendor_name'];
                		$users['contact_number']	=	$data['moblie_1'];
                		$users['email']				=	$data['email'];
                        $users['status']         	=   ($data['v_status'] == 1 && !empty($data['v_status']))?'active':'inactive';  	
                		$users['modified']			=	date("Y-m-d h:i:s");
                        $users['modified_by']=currUserId();
                        $this->db->update('users',$users,array('id'=>$qry->row()->user_id));
                 }
		     }
             
			if(isset($location)){
				$vendor_location = json_decode($location,true);
				if(!empty($vendor_location)){
					if($vendor_location['city']){
						$i = 0;
						foreach($vendor_location['city'] as $locations){
							$locationData['vendor_id'] 				= $id;
							$locationData['city'] 				= isset($vendor_location['city'][$i])?$vendor_location['city'][$i]:'';
							$locationData['area_id'] 				= isset($vendor_location['area_id'][$i])?$vendor_location['area_id'][$i]:'';
							$locationData['address'] 				= isset($vendor_location['address'][$i])?$vendor_location['address'][$i]:'';
							$locationData['pin_code'] 				= isset($vendor_location['pin_code'][$i])?$vendor_location['pin_code'][$i]:'';
							$locationData['nature_of_location'] 	= isset($vendor_location['nature_of_location'][$i])?$vendor_location['nature_of_location'][$i]:'';
							$locationData['other'] 				= isset($vendor_location['location_other'][$i])?$vendor_location['location_other'][$i]:'';
							$locationData['created_date'] 			= date("Y-m-d h:i:s");
							$locationData['modified_date'] 		= date("Y-m-d h:i:s");
							  $locationData['created_by']=currUserId();
							    // $locationData['modified_by']=currUserId();
                            $get_latitude=$this->get_lat_long($locationData); 
							if(isset($get_latitude) && !empty($get_latitude)){
    							 $exp_lat = explode(',',$get_latitude);
                                 $locationData['latitude']=(isset($exp_lat['0']) && !empty($exp_lat['0'])) ? $exp_lat['0'] : "";
                                 $locationData['longitude']=(isset($exp_lat['1']) && !empty($exp_lat['1'])) ? $exp_lat['1'] : ""; 
							}
							$this->db->insert("vendor_location",$locationData);
							$i++;
						}
					}
				}
			}
			$userinfo = $this->session->userdata('userinfo');
			// pr($userinfo);die;
			$sql = $this->db->select('id,first_name,email')
									->from('users u')
									->where('user_type',1)
									->where('status','active')
									->get();
					 // echo $this->db->last_query();die;
				$result =   ($sql->num_rows()>0) ? $sql->result() : array();
			if($userinfo->user_type == 4 && $result){
				
				
				/*
				$email_data['to']   		= $result[0]->email;
                $email_data['from']         =   ADMIN_EMAIL;
                $email_data['sender_name']  =   ADMIN_NAME;
                $email_data['subject']      =   "Vendor Profile Change";
				$email_data['message']      =   array('header' => " Vendor Profile Change!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;">Dear Admin</b>,<br> <br>  <span style="color:#000;">Following Vendor has updated their profile, please find the details below: </span><br><span style=" color:#000"> Vendor Name:'.$userinfo->first_name.'</span><br><span style="color:#000;"><span style=" color:#000"> Vendor ID: '.$userinfo->email.'</span><br><span style="color:#000;">','button_link'=>$login_link,"button_content"=>"Click here for login");
			   _sendEmailNew($email_data); */
                $login_link	=	base_url().'admin/auth';
                 $email_data['to']           =  'priya1@tekshapers.com';
                 $email_data['cc']          =    'rk.karshni@gmail.com';
                $email_data['from']         =   ADMIN_EMAIL;
                $email_data['sender_name']  =   ADMIN_NAME;
                $email_data['subject']      =   "Vendor Profile Change";
                $email_data['message']      =   array('header' => " Vendor Profile Change!",'body' =>'<td align="left" style="padding:15px 20px 15px; font-size: 16px; line-height: 30px; font-family: Helvetica, Arial, sans-serif; color: #404041; background-color:#ffffff;">Dear Admin</b>,<br> <br>  <span style="color:#000;">Following Vendor has updated their profile, please find the details below: </span><br><span style=" color:#000"> Vendor Name:'.$userinfo->first_name.'</span><br><span style="color:#000;"><span style=" color:#000"> Vendor ID: '.$userinfo->email.'</span><br><span style="color:#000;">','button_link'=>$login_link,"button_content"=>"Click here for login");
			   
               _sendEmailNew($email_data); 
			   
				// mail end
			}
			return true;
		  
		}else {
		   return false;          
		}
	}
	
	function vendor_list_ajax()
	{
 
	   $requestData = $_REQUEST;
      // pr($requestData); die;
            $columns = array(
                '',   //0
	            'id', //1
                'user_id', //2
				'vendor_name', //3
				'created_date', //4
				'email',  //5
				'moblie_1', //6
                'v_status', //7
				'', //8
                '' //9
            );
     
          $sql=$this->db->select('id,user_id,vendor_name,DATE_FORMAT(created_date,"%d-%b-%Y") as created_date,email,moblie_1,v_status',false)
                           ->from('vendor_details')
						   ->where_in('v_status',array('1','2'));
						   
						   
						  
				
        
		if (!empty($requestData['search']['value'])) {
                       $ser = strtolower($requestData['search']['value']);
                  if($ser=='active'){
					   $sql->where('v_status','1');
				    }else if($ser=='inactive'){
					    $sql->where('v_status','2');
				    }else{
					$sql->where("(user_id like '%$ser%'");
					$sql->or_where("LOWER(vendor_name) like '%$ser%' ");
					$sql->or_where("created_date like '%$ser%' ");
					$sql->or_where("email like '%$ser%' ");
					$sql->or_where("moblie_1 like '%$ser%')");
                }
              }
             if(!empty($columns[$requestData['order'][0]['column']]) && !empty($requestData['order'][0]['dir'])){
                 $sql->order_by($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);
             }else{
                 $sql->order_by('id', 'desc');
             }
            
             
             $sql1 = clone $sql;
             
             if ($requestData['length'] != '-1') {  // for showing all records
                $query = $sql->limit($requestData['length'], $requestData['start']);   
             }
             
            $query = $sql->get()->result();
            $totalData = $totalFiltered = $sql1->get()->num_rows();             
            $data = array();
            $sr_no = $requestData['start'];
			 $status='';
       // echo $this->db->last_query();die;
                foreach ($query as $row) {
				    if($row->v_status == '2') {
						$status= '<span class="label label-sm label-danger"> Inactive </span>';
					 }else if($row->v_status == '1'){
						 $status= '<span class="label label-sm label-success"> Active </span>';
					 }
			   $editstr= '<a class="Edit" title="Edit" href="'.base_url().'admin/vendor/edit/'.ID_encode($row->id).'" data-toggle="tooltip" data-placement="top"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;&nbsp;' ;
                $deltr='<a href="'.base_url().'admin/vendor/delete/'.ID_encode($row->id).'"  title="Delete" data-toggle="tooltip" data-placement="top" class="delete" id="" onclick="return confirm('."'Are you sure to delete this record?'".');"><i class="fa fa-trash"></i></a></a>&nbsp;&nbsp;&nbsp;' ;       
                // $archive='<a href="#"   id="" >Archive</a></a>&nbsp;&nbsp;&nbsp;' ; 
                $archive='<a title="Archive" onclick="return confirm('."'Are you sure want to move vendor to archive?'".');" href="'.base_url().'admin/vendor/archive/'.ID_encode($row->id).'"   id="" ><i class="fa fa-archive" aria-hidden="true"></i></a>';          
                
                $nestedData = array();
                $nestedData[] = '<input type="checkbox" class="select_all" name="all_user_id[]" value="'.$row->id.'" />';
                $nestedData[] = ++$sr_no;
				$nestedData[] = $row->id;
                $nestedData[] = ucwords($row->vendor_name);
				$nestedData[] = date('d-m-y',strtotime($row->created_date));
				$nestedData[] = $row->email;
				$nestedData[] = $row->moblie_1;
                $nestedData[] = $status;
				$nestedData[] = '';
                $nestedData[] = $editstr.$deltr.$archive;
                $data[] = $nestedData;
           }
            $json_data = array(
                "draw" => intval($requestData['draw']),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            );
            return $json_data;	
		
	}
	
	
	function fetch_data()
	{
		$qry=$this->db->select('id,user_id,vendor_name,created_date,email,moblie_1,v_status')
                          ->from('vendor_details')
						  ->order_by('id','desc')
						  ->get();
							return ($qry->num_rows()>0) ? $qry->result() : array();
	}
	function export_vendor()
{
    $data=array();
   $all_id = ($this->input->post('all_user_id',true)) ? $this->input->post('all_user_id',true) : array();
	 if(!empty($all_id))
		{
			$this->db->where_in('id',$all_id);
		}
     $vendor=$this->fetch_data();
	 // $citydata=($qry->num_array()>0)? $qry->result() :array();
     
     if(isset($vendor) && !empty($vendor))
     {   $header2=$newcomp=array();
         $data['header']=array(
                    '0' =>array(
                        'id'  =>"S.No.",
                        'vendor_name' =>  "Vendor Name",
						'created_date'=>  "Created On",
					    'email'=>  "Email",
					    'moblie_1'=>  "Mobile Number",
						'v_status'=>  "Status"
                        ),
                    );
    
     
                   $i=1; 
                    foreach($vendor as $value)
                    { 
                      // $status = array();
                    	 if($value->v_status == '2')
					 {
						 $status = 'Inactive';
					 }else if($value->v_status == '1'){
						  $status = 'Active';
					 }else if($value->v_status == '3'){
						  $status = 'Archive';
					 }
					
					 
                        $data['vendor'][$i]['id']=+$i;
                        $data['vendor'][$i]['vendor_name']=ucwords($value->vendor_name);
                        $data['vendor'][$i]['created_date'] = $value->created_date;
						$data['vendor'][$i]['email'] = $value->email;
					    $data['vendor'][$i]['moblie_1'] = $value->moblie_1;
					    $data['vendor'][$i]['v_status'] = $status;
					 $i++;
                       
                  }
                 
      
         
     }
 
   return $data;   
}

	/* *
	*	create function for delete vendor in formation
	* 	craeted by santosh kumat
	*	created date : 07/03/2017.
	*/
	
	public function delete_vendor($id)
	{	
		$this->db->where('vendor_id',$id);
		$loc = $this->db->delete('vendor_location');
		if($loc){
			$qry=$this->db->select('user_id')->get_where('vendor_details',array('id'=>$id));
			if($qry->num_rows()>0 && !empty($qry->row()->user_id))
			{
			  $this->db->where('id',$qry->row()->user_id);
			  $this->db->delete('users');
			}
			$this->db->where('id',$id);
			$result = $this->db->delete('vendor_details');
			if($result){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
		
		
	}
	
}
?>