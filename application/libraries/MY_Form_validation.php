<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public $CI;
   
    function __construct($rules = array()) {
        parent::__construct($rules);
        $this->CI = & get_instance();
    }

    

    public function is_unique_edit($str, $field) {
//        pr(is_numeric(@end($this->CI->uri->segment_array()))); die;
		if( is_numeric(@end($this->CI->uri->segment_array()))){
			$id_val= @end($this->CI->uri->segment_array());
			$id = ID_decode($id_val);
		}else{
			$id = currUserId();
		}
       // $id_val = is_numeric(@end($this->CI->uri->segment_array())) ? (@end($this->CI->uri->segment_array())) : currUserId();
       // $id = ID_decode($id_val);

        sscanf($field, '%[^.].%[^.]', $table, $field);
        $res = $this->CI->db->limit(1)->get_where($table, array($field => $str, "id !=" => $id));
//        pr($res);
//        echo $this->CI->db->last_query();  	die;
        if ($res->num_rows()>0) {
            $this->CI->form_validation->set_message('is_unique_edit', "%s already exists. ");
            return FALSE;
        }
        return TRUE;
        //echo $this->CI->db->last_query();  	die;
    }

    

}
