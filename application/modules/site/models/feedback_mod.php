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

class Feedback_mod extends CI_Model {

    var $user_table	=	"users";

    /**
     * Constructor
    */
    function __construct() {
            parent::__construct();
    }
    /**
     * End
    */

    
	function add_feedback($user_id = null ,$name = null,$email = null)
	{
		$this->form_validation->set_rules('message',"Feedback", 'trim|required');
		$this->form_validation->set_rules('ratings',"ratings", 'trim|required');
        if ($this->form_validation->run() === false) {
			$res['error_msg']	=	validation_errors();
			$res['status']		=	'error';
			
			return json_encode($res);
		}
		
		$data['message']           = $this->input->post('message', true);
		$data['name']              = $name;
        $data['email']             = $email;
        $data['user_id']           = $user_id;      
        $data['manage_service_id'] = $this->input->post('service_id', true);
		$data['rating']            = $this->input->post('ratings', true);
        $data['created_at'] 	   = current_date();
      // print_r($data); die;
        $this->db->insert("feedback",$data);
        $ins_id = $this->db->insert_id();
        if ($ins_id) {

            $res['status'] = 'success';
            $res['id'] = $ins_id;
        }else {
            $res['error_msg']	=	"Somthing wrong try again";
            $res['status']		=	'error';          
        }
		return json_encode($res);
    }
	
}
