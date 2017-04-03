<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**

 * Permission helper
 *
 * @package		Permission Helper
 * @subpackage          Helpers
 * @auothor	   	Ankit Rajput
 * @website		http://www.tekshapers.com
 * @company             Tekshapers Inc 
 * @since		Version 1.0
 */

/**
 * check_permission
 * this function check permission of access module for the current user
 *
 */
if (!function_exists('check_permission')) {
    function check_permission() 
    {
        $CI = &get_instance();
        
        
    	//create array permission as a key and user type as a value
        $arr        =       array(
            'admin'                 	=>  array('1'),
            'dashboard'             	=>  array('2','3'),
            'site/articles'            	=>  array('2','3'),	
            'site/events'            	=>  array('2','3'),	
			'site/user'                 =>  array('2','3'),
            'site/articles/my_articles'	=>  array('2'),
			'site/articles/add'	        =>  array('2'),
			'site/articles/edit'	    =>  array('2'),
            'site/events/my_events'	    =>  array('2'),
			'site/events/add'	        =>  array('2'),
			'site/events/edit'	        =>  array('2'),
			'site/user/profile'	        =>  array('2','3'),
			'site/user/profile_edit'	=>  array('2','3'),
			'site/user/changeImage'	    =>  array('2','3'),
			'site/user/reset_password'	=>  array('2','3'),
			'site/service/my_services'	=>  array('2'),
			'site/service'	            =>  array('2'),
			'site/user/feedback'	    =>  array('3'),
        );
        $url		=	uri_segment(1);
        $segment0	=	"";
        $segment1	=	uri_segment(1);
        $segment2	=	uri_segment(2);
        $segment3	=	uri_segment(3);
        
        if($segment1 == 'site' && $segment2	==	"articles" && $segment3 ==	"my_articles")
        {
			$url	=	$url.'/'.uri_segment(2).'/'.uri_segment(3); 
		}else if($segment1 == 'site' && $segment2 == "articles" && $segment3 == "add"){
		    $url	=	$url.'/'.uri_segment(2).'/'.uri_segment(3); 
		}else if($segment1 == 'site' && $segment2 == "articles" && $segment3 == "edit"){
		    $url	=	$url.'/'.uri_segment(2).'/'.uri_segment(3); 
		}
		else if($segment1 == 'site' && $segment2	==	"articles"){
			$url	=	$url.'/'.uri_segment(2); 
		}else if($segment1 == 'site' && $segment2 == "events" && $segment3 == "my_events"){
		    $url	=	$url.'/'.uri_segment(2).'/'.uri_segment(3); 
		}else if($segment1 == 'site' && $segment2 == "events" && $segment3 == "add"){
		    $url	=	$url.'/'.uri_segment(2).'/'.uri_segment(3); 
		}else if($segment1 == 'site' && $segment2 == "events" && $segment3 == "edit"){
		    $url	=	$url.'/'.uri_segment(2).'/'.uri_segment(3); 
		}
		else if($segment1 == 'site' && $segment2 == "events" ){
		    $url	=	$url.'/'.uri_segment(2); 
		}else if($segment1 == 'site' && $segment2	==	"user"){
			$url	=	$url.'/'.uri_segment(2); 
		}
	    else if($segment1 == 'site' && $segment2	==	"user" && $segment3 ==	"profile"){
			$url    =  $url.'/'.uri_segment(2).'/'.uri_segment(3);
		}else if($segment1 == 'site' && $segment2	==	"user" && $segment3 ==	"profile_edit"){
			$url    =  $url.'/'.uri_segment(2).'/'.uri_segment(3);
		}else if($segment1 == 'site' && $segment2	==	"user" && $segment3 ==	"reset_password"){
			$url    =  $url.'/'.uri_segment(2).'/'.uri_segment(3);
		} 
		else if($segment1 == 'site' && $segment2	==	"service" && $segment3 ==	"my_services"){
			$url    =  $url.'/'.uri_segment(2).'/'.uri_segment(3);
		}else if($segment1 == 'site' && $segment2	==	"service"){
			$url    =  $url.'/'.uri_segment(2);
		}else if($segment1 == 'site' && $segment2	==	"user" && $segment3 ==	"feedback"){
			$url    =  $url.'/'.uri_segment(2).'/'.uri_segment(3);
		}
        //echo $url;
        
        if(!in_array(currentuserinfo()->user_type,$arr[$url])) //check permission of access module for the current user
        {
            show_error("Permission Denied !!");
        }
    }
}

