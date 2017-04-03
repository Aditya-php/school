<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Database helper
 *
 * @package		Helpers
 * @category            database helper
 * @author		Ankit Rajput
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc 
 * @since		Version 1.0
*/

/**
 * is_protected
 *
 * This function check user already login or not
 * 
 * @access	public
 * @return	boolean
*/ 
if (!function_exists('is_protected')){
    function is_protected(){
        $CI     =   &get_instance();
        if ($CI->session->userdata('isLogin') != 'yes'){
            if(uri_segment(1)   ==  'admin'){
                redirect('/admin/auth');
            }else{
                redirect(base_url());
            }
        }else{
            check_permission();
        }
    }
    }
	
	if (!function_exists('is_protect')){
    function is_protect($user_type){
        $CI     =   &get_instance();
		 if ($CI->session->userdata('isLogin') == 'yes'){
	    $curr_type= $CI->session->userdata("userinfo")->user_type ;
        if(!in_array($curr_type,$user_type)){
           switch($curr_type){
			   case 1: redirect('admin/dashboard');
						break;
				case 2: redirect('admin/dashboard');
						break;
				case 3: redirect('parents');
						break;		
				case 4: redirect('vendors');
						break;		
			   
		       }
           
            }
         }
	else{
	           
                redirect('/admin/auth');
            }
	  }
    }


    function is_bothprotected(){
        $CI     =   &get_instance();
        if ($CI->session->userdata('superadminLogin') != 'yes' && $CI->session->userdata('isLogin') != 'yes'){
            redirect(base_url());
        }else{
            check_permission();
        }
    }

/*End of Function*/

/**
 * @Function _layout
 * @purpose load layout page 
 * @created  2 dec 2014
 */
if (!function_exists('_layout')) {
    function _layout($data = null) {
        $CI     =   &get_instance();
        $CI->load->view('layout', $data);
    }
}


if (!function_exists('_layout_parent')) {
    function _layout_parent($data = null) {
        $CI     =   &get_instance();
        $CI->load->view('layout_parent', $data);
    }
}

if (!function_exists('_layout_vendor')) {
    function _layout_vendor($data = null) {
        $CI     =   &get_instance();
        $CI->load->view('layout_vendor', $data);
    }
}

if (!function_exists('_front_layout')) {
    function _front_layout($data = null) {
        $CI     =   &get_instance();
        $CI->load->view('front_layout', $data);
    }
}
/*End of Function*/

/**
* set_flashdata
*
* This function set falsh message value
* 
* @access	public
* 
*/ 
if (!function_exists('set_flashdata')) {
    function set_flashdata($type, $msg) {
        $CI = &get_instance();
        $CI->session->set_flashdata($type, $msg);
    }
}
/*End of Function*/

if(!function_exists('get_flashmsg')) 
{
    function get_flashmsg() 
    {
        $CI =& get_instance();
        $type = $CI->session->flashdata("flash_msg_type");
        $text = $CI->session->flashdata("flash_msg_text");
        if(!$type)
            return;
        if(strpos($type,'failure') !== false || strpos($type,'error') !== false)
        {
            $class='alert alert-danger';
        } 
        else 
        {
            $class='alert alert-success';
        }
        $temp = '<div class="row-fluid"><div class="'.$class.'" role="alert" id="flash_id"><button type="button" class="close" data-dismiss="alert" style="right: 0px;"><span class="sr-only"></span></button>'.$text.'</div></div>';
        return $temp;
    }
}


if(!function_exists('generate_salt')) {
	function generate_salt($length = 12,$salts = 'TEK@sunnyv75') {
		$str = '';
		$lim = 0;
		$CI =& get_instance();
		while ($lim<$length) {
			$lim = strlen($str);
			$str .= hash('sha512', $CI->config->item('encryption_key') . time() . uniqid(true) . $salts);
		}
		$str = base64_encode($str);
		$str = strlen($str) > $length ? substr($str, 0, $length) : $str;
		return trim(strtr($str, '/+=', '   '));
	}
}
/**
* get_flashdata
*
* This function give custome flash message formate
* 
* @access	public
* @return	html data
*/
if (!function_exists('get_flashdata')){
    function get_flashdata()
    {
        $CI         =   &get_instance();
        $success    =   $CI->session->flashdata('success') ? $CI->session->flashdata('success') : '';
        $error      =   $CI->session->flashdata('error') ? $CI->session->flashdata('error') : '';
        $warning    =   $CI->session->flashdata('warning') ? $CI->session->flashdata('warning') : '';
        $msg        =   '';
        if($success){
            $msg    =   '<div class="alert alert-success flash-row">
                            <button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>
                            ' . $success . ' </div>';
        }elseif($error){
            $msg    =   '<div class="alert alert-danger flash-row">
			<button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button><i class="ace-icon fa fa-check green"></i>
			<strong>Error!</strong> ' . $error . ' </div>';
        }elseif($warning){
            $msg    =   '<div class="alert alert-warning flash-row">
			<button class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
			' . $warning . '</div>';
        }
        return $msg;
    }
}
/*End of Function*/

/**
* isPostBack
*
* This function check request send by POST or  not
* 
* @access	public
* @return	html data
 */
if (!function_exists('isPostBack')) {
    function isPostBack()
    {
        if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST')
            return true;
        else
            return false;
    }
}
/*End of Function*/

/**
* Current Date And Time
*
* This function get Current Date And Time
*
* @param	
* @return
 */
if (!function_exists('current_date')){
    function current_date() 
    {
        $dateFormat     =   date("Y-m-d H:i:s", time());
        $timeNdate      =   $dateFormat;
        return $timeNdate;
    }
}
/*End of Function*/

/**
* Current User Info 
* 
* If user loged then returl current user info
*
* @access	public
* @return	mixed	boolean or depends on what the array contains
*/
if (!function_exists('currentuserinfo')){
    function currentuserinfo() 
    {
        $CI     =   &get_instance();
        return $CI->session->userdata("userinfo");
    }
}
/*End of Function*/

/**
* Current User Info 
* 
* If user loged then returl current user Id
*
* @access	public
* @return	string
*/
if (!function_exists('currUserId')){
    function currUserId() 
    {
        $CI     =   &get_instance();
        return $CI->session->userdata("userinfo")->id;
    }
}
/*End of Function*/

/**
 * uri_segment
 * this function give url segment value
 * @param int 
 * @return string
 */
if (!function_exists('uri_segment')){
    function uri_segment($val) 
    {
        $CI     =   &get_instance();
        return $CI->uri->segment($val);
    }
}
/*End of Function*/

/**
 * pr
 * this function print data with <pre> tag
 * @access	public
 */
if (!function_exists('pr')){
    function pr($data = null) 
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
/*End of Function*/


/**
 * is_ajax_post
 *
 * This function check request send by Ajax or not
 *
 *	
 * @return boolean
 */

if (!function_exists('is_ajax_post')){
    function is_ajax_post() 
    {
        $CI     =   &get_instance();
        if (!$CI->input->is_ajax_request()){
            show_error('No direct script access allowed');
            exit;
        }
    }
}
/*End of Function*/


/**
 * @function formatDate
 * @purpose format the date 
 * @created 2 Apr 2015
 */
if (!function_exists('changeDateFormat')){
    function changeDateFormat($str = null) 
    {
        $arr    =   explode('/', $str); //pr($arr);
        return trim($arr[2]) . '-' . trim($arr[0]) . '-' . trim($arr[1]);
    }
}
/*End of Function*/

/**
 * Function to check ajax request
 *
 * @access	public
 */
if (!function_exists('is_ajax_request')){
    function is_ajax_request() 
    {
        $CI     =   &get_instance();
        if (!$CI->input->is_ajax_request()) {
            show_error('No direct script access allowed');
            exit;
        }
    }
}
/*End of Function*/

/**
 * @function _show404
 * @purpose Display error page
 * @created 8Apr2015
 */
if (!function_exists('_show404')) {
    function _show404() {
        $CI                 =   &get_instance();
        $data['title']      =   'Error';
        $data['subTitle']   =   'Wrong Page';
        $data['page']       =   'error';
        _layout($data);
    }
}
/*End of Function*/


/**
 * @Function _ajaxLayout
 * @purpose load layout page 
 * @created  3 dec 2014
 */
if (!function_exists('_ajaxLayout')) {
    function _ajaxLayout($data = null) 
    {
        $CI     =   &get_instance();
        $CI->load->view('ajax_layout', $data);
    }
}
/*End of Function*/


/**
 * _show404
 *
 * This function show error message
 *
 *	
 * @return array 
 */
if (!function_exists('_show404')) {
    function _show404() {
        $CI                 =   &get_instance();
        $data['title']      =   'Error';
        $data['subTitle']   =   'Wrong Page';
        $data['page']       =   'error';
        _layout($data);
    }
}
/*End of Function*/


/**
 * lang
 *
 * This function give laguage variable value
 * @param string
 *	
 * @return string 
 */
if (!function_exists('lang')) {
    function lang($key) 
    {
        $CI = &get_instance();
        $line = $CI->lang->line($key);
        return $line;
    }
}
/*End of Function*/

/**
 * get_language
 *
 * This function give user language name
 * 
 *	
 * @return string 
 */

if (!function_exists('get_language')) {
    function get_language() 
    {
        
        $CI     =   &get_instance();
        if($CI->session->userdata('site_language'))
        {
            $lang   =   $CI->session->userdata('site_language');
        }else{
            $lang   =   'english';
        } 
        
        return $lang;
    }
}
/*End of Function*/

/**
 * get_language
 *
 * This function give user language name
 * 
 *	
 * @return string 
 */

if (!function_exists('get_language')) {
    function get_language() 
    {
        $lang = currentuserinfo() ? currentuserinfo()->language : 'english';
        return $lang;
    }
}
/*End of Function*/

/**
 * profile_image
 *
 * This function give profile image
 * 
 *	
 * @return html data
 */
if (!function_exists('profile_image')) {
    function profile_image($id=null)    
    {    
        $CI     =   &get_instance();
        $CI->db->select("profile_image");
        $CI->db->where("id",$id);
        $query=$CI->db->get("users");
        if($query->num_rows())
        {
			return $query->row()->profile_image;
		}else{
			return '';
		}	
        
    }
}
/*End of Function*/

/**
 * custom_encryption
 *
 * This function encryt and decrypt value on the base action value
 * @param string
 * @param string
 * @param string
 *	
 * @return string
 */
if (!function_exists('custom_encryption')) {
    function custom_encryption($string, $key, $action) 
    {
        if ($action == 'encrypt')
            return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5
                ($key))));
        elseif($action == 'decrypt')
            return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC,
                md5(md5($key))), "\0");
    }
}
/*End of Function*/

/**
 * _sendEmail
 *
 * This function send mail to the given email id 
 * @param string
 *	
 */
if (!function_exists('_sendEmail')){
    function _sendEmail($email_data)
    {
        $CI                 =   &get_instance();
        $config['protocol'] =   'sendmail';
        $config['mailpath'] =   '/usr/sbin/sendmail';
        $config['charset']  =   'iso-8859-1';
        $config['wordwrap'] =   true;
        $CI->email->set_mailtype("html");
        $CI->email->initialize($config);
        $CI->email->from($email_data['from'], ucwords($email_data['sender_name']));
        $CI->email->to($email_data['to']);
        if (!empty($email_data['cc']))
        {
            $CI->email->cc($email_data['cc']);
        }
        if (!empty($email_data['bcc']))
        {
            $CI->email->bcc($email_data['bcc']);
        }
        if (!empty($email_data['file']))
        {
            $CI->email->attach($email_data['file']);
        }
        $CI->email->subject(ucfirst($email_data['subject']));
        $data['message']    =   $email_data['message'];
        $msg                =   $CI->load->view('email_template/email', $data, true);
        $CI->email->message($msg);
        if($CI->email->send()){
            return TRUE;
        }else{
           return FALSE;
        }
    }
}
/*End of Function*/

/**
 * get_topics
 *
 * This function give  captcha image
 * 
 * @return html data
 *	
 */
if (!function_exists('getcaptchacode')) {
    function getcaptchacode()
    {
        $CI =& get_instance();
        $CI->load->helper('captcha');
        $listAlpha ='abcdefghijklmnopqrstuvwxyz0123456789';
        $numAlpha=5;
        $captcha=substr(str_shuffle($listAlpha),0,$numAlpha);
       
        $path = config_item('base_url').'captcha/';
        //$fontpath = config_item('base_url').'bucket/frontend/assets/fonts/TitilliumWeb-BoldItalic.ttf';
        $fontpath = 'assets/fonts/verdana.ttf';        
        $vals = array(
			'word'   => $captcha,
			'img_path' => './captcha/',
			'img_url' => $path,
            //'font_path'	 => 'c:/windows/fonts/verdana.ttf',
            'font_path'	 => $fontpath,
			'img_width'	 => '159',
			'img_height' => '32',
			'border' => 0,
			'expiration' => 1800
		);
        $get_captcha = create_captcha($vals); //pr($get_captcha); die;
        $CI->session->set_userdata('codecaptcha',$get_captcha['word']);
        return $get_captcha;
    }
}
/*End of Function*/

 /**
 * obj_to_arr
 *
 * This function convert std object array into array 
 * 
 * @return array
 *	
 */
if (!function_exists('obj_to_arr')) {
    function obj_to_arr($obj_arr) 
    {
        $obj_arr    =   (array)$obj_arr; 
        $chkey      =   array_keys($obj_arr);
        $chval      =   array_values($obj_arr);                           
        unset($obj_arr);
        $obj_arr    =   array_combine($chkey,$chval);
        return $obj_arr;
    }
}
/*End of Function*/
 
/**
 * _sendEmailNew
 *
 * This function send mail to the given email id 
 * @param string
 *	
 */
if (!function_exists('_sendEmailNew'))
{
    function _sendEmailNew($email_data)
    {
    	$CI = &get_instance();
        $CI->load->library('email');
        $CI->email->set_mailtype("html");
        $CI->email->from($email_data['from'], ucwords($email_data['sender_name']));
        $CI->email->to($email_data['to']);
        if (!empty($email_data['cc']))
        {
            $CI->email->cc($email_data['cc']);
        }
        if (!empty($email_data['bcc']))
        {
            $CI->email->bcc($email_data['bcc']);
        }
        if (!empty($email_data['file']))
        {
            $CI->email->attach($email_data['file']);
        }
        $CI->email->subject(ucfirst($email_data['subject']));
        $data['message']    =   $email_data['message'];
        $msg                =   $CI->load->view('email_template/email', $data, true);
        // pr($msg);die;
		$CI->email->message($msg);
         if($CI->email->send()){
               return TRUE;
          }else{
              return FALSE;
          }
      }
    }
    /*End of function*/
    
    
    
/**
 * Id_encode
 *
 * This function to encode ID by a custom number
 * @param string
 *	
 */
  if (!function_exists('ID_encode')) {
    function ID_encode($id){
        $encode_id  =   '';
        if($id){
            $encode_id  =   rand(1111,9999).(($id+19)).rand(1111,9999);
        }else{
            $encode_id  =   '';
        }
        return $encode_id;
    }
}
/*End of function*/

/**
 * Id_decode
 *
 * This function to decode ID by a custom number
 * @param string
 *	
 */
if (!function_exists('ID_decode')) {
    function ID_decode($encoded_id){
        $id  =   '';
        if($encoded_id){
            $id =   substr($encoded_id,4,strlen($encoded_id)-8);
            $id =   $id-19;
        }else{
            $id  =   '';
        }
        return $id;
    }
}
/*End of function*/

  /**
 * admin_profile_image
 *
 * This function to get image of user/admin
 * @param string
 *	
 */
if (!function_exists('admin_profile_image'))
{
    function admin_profile_image($id=null)    
    {    
            $CI  =   &get_instance();
            $CI->db->select('profile_image');
            $CI->db->from('users');
            $CI->db->where('id',$id);
            $query = $CI->db->get();
            $result = $query->row();
            return @$result->profile_image;
    }
}
/*End of function*/

  /**
 * social_media_link
 *
 * This function to get enable social media.
 * @param string
 *	
 */	
if (!function_exists('social_media_link'))
{
    function social_media_link()    
    {    
            $CI  =   &get_instance();
            $CI->db->select('id');
            $CI->db->from('socialmedia_sites');
            $CI->db->where('status','active');
            $query = $CI->db->get();
            $result = $query->result();
            foreach($result as $result1)
            {
                    $result_new[] = $result1->id;
            }

            return $result_new;
    }
}	
/*End of funtion*/


	
	
	/*End of funtion*/

 /**
     * get_user_name
     * This function to fetch user_name on the basis of id
     * @access	public
     * @return	html data
    */
    if (!function_exists('get_user_name'))
    {
        function get_user_name($id) 
        {
			    $CI  =   &get_instance();
				$CI->db->select('user_name,first_name,last_name,business_name');
				$CI->db->from('users');
				$CI->db->where('status','active');
				$CI->db->where('is_delete','0');
				$CI->db->where('id',$id);
				$query = $CI->db->get();
				$result = $query->row();
				
			return $result;
        }
    }

    /*End of Function*/
   
    /*End of Function*/
	
	/**
     * get_overall rating
     * This function to get  overall rating 
     * @access	public
     * @return	html data
    */
    if (!function_exists('get_overall_rating'))
    {
        function get_overall_rating($service_id = NULL) 
        {
			    $CI  =   &get_instance();
				$CI->db->select_sum("rating");
				$CI->db->from('feedback');
				$CI->db->where("manage_service_id",ID_decode($service_id));
				$CI->db->where("status",'1');
       			$query	=	$CI->db->get();
       			//echo $CI->db->last_query();die;
       			if($query->num_rows()>0)
   				{
					@$result         =  $query->result(); 
					$CI->db->where('manage_service_id', ID_decode($service_id));
					$CI->db->where("status",'1');
					@$num_rows = $CI->db->count_all_results('feedback');
					@$total_rating   =  (round(@$result[0]->rating / @$num_rows,1));
					
					
					$rs['rating']			=	$total_rating;
					$rs['feedbacks']		=	$num_rows;					
					$rs['status']			=	"success";
					
				
				}else{
					$rs['result']	=	'';
					$rs['status']	=	"error";
				}
				
				return $rs;
        }
    }

    /*End of Function*/
	



    /* end */	
	
	/* function 
	for return
	star 
	*/
	if (!function_exists('get_star'))
    {
        function get_star($starNumber) 
        {
			    
				if($starNumber == '1')
				{
					$result = 'star1.png';
				}
				else if($starNumber == '2')
				{
					$result = 'star2.png';
				}
				else if($starNumber == '3')
				{
					$result = 'star3.png';
				}
				else if($starNumber == '4')
				{
					$result = 'star4.png';
				}
				else if($starNumber == '5')
				{
					$result = 'star5.png';
				}
				else if($starNumber == '6')
				{
					$result = 'star6.png';
				}
				else if($starNumber == '7')
				{
					$result = 'star7.png';
				}
				else if($starNumber == '8')
				{
					$result = 'star8.png';
				}
				else if($starNumber == '9')
				{
					$result = 'star9.png';
				}else if($starNumber == '0')
				{
					$result = '';
				}
				
			return @$result;
        }
    }
	
	
	/**************************send mail closed************************/

function array_to_csv($array, $download = "") {
	if ($download != "") {	
		header('Content-Type: application/csv');
		header('Content-Disposition: attachement; filename="' . $download . '"');
	}		
	ob_start();
	$f = fopen('php://output', 'w') or show_error("Can't open php://output");
	$n = 0;		
	foreach ($array as $line) {
		$n++;
		if ( ! fputcsv($f, $line)) {
			show_error("Can't write line $n: $line");
		}
	}
	fclose($f) or show_error("Can't close php://output");
	$str = ob_get_contents();
	ob_end_clean();
	if ($download == "") {
		return $str;	
	} else {	
		echo $str;
	}		
}	

/**************************Get area name ************************/
if (!function_exists('get_area'))
{
	function get_area($id){
		
		$CI  =   &get_instance();
		$CI->db->select("*");
		$CI->db->from('area_master');
		$CI->db->where("city_id",$id);
		$CI->db->where("status",'active');
		$query	=	$CI->db->get();
		//echo $CI->db->last_query();die;
		if($query->num_rows()>0)
		{
							
			$data =	$query->result();
			
		
		}else{
			$data = array();
		}
		
		return $data;		
	}
}
if (!function_exists('generate_id')) {
    function generate_id($user_type = NULL) {
        $CI = &get_instance();
        $code=(isset($user_type) && !empty($user_type) && $user_type=3) ? "CP" : "CK";
        $start=6102016;
		$tot_kids = $CI->db->count_all_results("kids");
		$CI->db->where('user_type','3');
        $tot_prnts = $CI->db->count_all_results("users");         
        $count = $start+$tot_kids+$tot_prnts+1;  
        $user_id = $code.$count; 
        return $user_id;
    }
}

if (!function_exists('get_vendor_location')) {
    function get_vendor_location($id = NULL) {
        $CI = &get_instance();
        $result=array();
        if(!empty($id)){ //find address of vendor
           $qry= $CI->db->select('vl.address,ar.area_name,ct.city_name') //latitude,longitude
                        ->from('vendor_location vl')
                        ->join('area_master ar','vl.area_id=ar.id','left')
                        ->join('city_master ct','vl.city=ct.id','left')
                        ->where('vl.vendor_id',$id)
                        ->get();
           if($qry->num_rows()>0){
                if(isset($qry->row()->address) && !empty($qry->row()->address)){
                    $result['address']=$qry->row()->address;
                }else if(isset($qry->row()->area_name) && !empty($qry->row()->area_name) && isset($qry->row()->city_name) && !empty($qry->row()->city_name) ){
                     $result['address']=$qry->row()->city_name.', '.$qry->row()->area_name;
                }
           }
        }else{ //find address of current log in user
           $id=currUserId();
           $qry= $CI->db->select('u.address,ar.area_name,ct.city_name') //latitude,longitude
                        ->from('users u')
                        ->join('area_master ar','u.area_id=ar.id','left')
                        ->join('city_master ct','u.city_id=ct.id','left')
                        ->where('u.id',$id)
                        ->get();
           if($qry->num_rows()>0){
                if(isset($qry->row()->address) && !empty($qry->row()->address)){
                    $result['address']=$qry->row()->address;
                }else if(isset($qry->row()->area_name) && !empty($qry->row()->area_name) && isset($qry->row()->city_name) && !empty($qry->row()->city_name) ){
                     $result['address']=$qry->row()->city_name.', '.$qry->row()->area_name;
                }
           }  
        }
        return $result;
    }
}
	
if (!function_exists('get_vendor_service_offered')) {
    function get_vendor_service_offered($data = array()) {
        $CI = &get_instance();
        $result=array();
        if(!empty($data)){ //find address of vendor
           $qry= $CI->db->select('*') //latitude,longitude
                        ->from('services')
                        ->where_in('id',$data)
                        ->get();
           if($qry->num_rows()>0){
               return $qry->result();
           }
        }else{ //find address of current log in user
           return array();
        }
    }
}
//check city exist or not
if (!function_exists('checkCityexist')) {
    function checkCityexist($id=null)    
    {    
        $CI     =   &get_instance();
        $CI->db->select("city_id");
        $CI->db->where("city_id",$id);
        $query=$CI->db->get("users");
		
		$CI->db->select("city_id");
        $CI->db->where("city_id",$id);
        $query1=$CI->db->get("area_master");
        if($query->num_rows())
        {
			//return $query->row()->city_id;
			return true;
		}elseif ($query1->num_rows()){
			//return $query1->row()->city_id;
			return true;
		}else{
			return false;
		}	
        
    }
}
//check city exist or not
if (!function_exists('checkAreaexist')) {
    function checkAreaexist($id=null)    
    {    
        $CI     =   &get_instance();
        $CI->db->select("area_id");
        $CI->db->where("area_id",$id);
        $query=$CI->db->get("users");
		
		
        if($query->num_rows())
        {
			return true;
		}else{
			return false;
		}	
        
    }
}
/*
@param: string(dob)
@desc: return kid date on the basis of date of birth
*/
if (!function_exists('getAge')) {
	function getAge($age=null)
	{
					$msg='';
					if(!empty($age)){
						$convert = $age; // days you want to convert

						$years = ($convert / 365) ; // days / 365 days
						$years = floor($years); // Remove all decimals
						
						$month = ($convert % 365) / 30.5; // I choose 30.5 for Month (30,31) ;)
						$month = floor($month); // Remove all decimals
						
						$days = ($convert % 365) % 30.5; // the rest of days
						 $days = floor($days); // Remove all decimals
					  //  echo $years." ".$month." ".$days; die;
						 
						 if($years>0){
									 $msg.= $years." Year";
						 }
						
						if($month>0){
							$msg.= $month. " Month";
						}
					   
						if($days>0){
							$msg.= $days." Days"; 
						}
						 
				} // Echo all information set
				return $msg;
			
	}//end getAge()
}//end getAge if
	/* end */
if (!function_exists('get_all_vendor')){
	
	function get_all_vendor()	
	{
	  $CI=& get_instance();	
	  $all_vendors=$CI->db->select('v.id,v.vendor_name')
	     ->from('vendor_details v')
		 ->join('users u','u.id=v.user_id')
		 ->where('u.status','active')
		 ->get()
		 ->result_array();
	  return $all_vendors;
	}
	
}//end if	

if (!function_exists('check_access_prmsn')){
	
	function check_access_prmsn($module_id)	
	{
	  $CI=& get_instance();
      $user_id=$CI->session->userdata("userinfo")->id;
      $user_type=$CI->session->userdata("userinfo")->user_type;
      if(!empty($user_type) && $user_type==2){ //check only for subadmin
         $qry= $CI->db->select('permissions')
                      ->get_where('users',array('id'=>$user_id));
         if($qry->num_rows()>0 && !empty($qry->row()->permissions)){
            $module_prmsn=explode(',',$qry->row()->permissions);
            if(!empty($module_prmsn) && in_array($module_id,$module_prmsn)){
                return true;
            }else{
                redirect('admin/auth/permission_denied');
            }
         }else{
                redirect('admin/auth/permission_denied');
         }
                 
      }else{
        return true;
      }
	}
	
}