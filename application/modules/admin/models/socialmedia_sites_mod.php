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

class Socialmedia_sites_mod extends CI_Model {
	
	var $tbl_socialmedia_sites		=	"socialmedia_sites";
	/**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    /*End*/
    
    function save_site($id=null)
    {
	   $data ="";
	   $postdata = $this->input->post(NULL,TRUE);
       if(!empty($postdata)){
        foreach($postdata as $key => $val){
            $f_id=explode("_",$key);
            $qry[]=$this->db->update('socialmedia_sites',array('link'=>$val),array('id'=>$f_id['1']));
        }
       }
       $data=(isset($qry) && !empty($qry)) ? "1" : "0";
	   return $data;
   } 
       
  function get_sites()
  {
    $qry= $this->db->select('*')
            ->from('socialmedia_sites')
            ->get();
    return ($qry->num_rows()>0) ? $qry->result() : array();
  }
}
?>