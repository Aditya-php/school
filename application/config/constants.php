<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/

define('DB_SRC_HOST','localhost');
define('DB_SRC_USER','root');
define('DB_SRC_PASS','');

define('DB_PREFIX',     'otutor_');
define('DB_CENTERLIZED',"otutor_centerlized");
define('DB_DUMMY',"otutor_dummy");

define('DOMAIN_NAME',"localhost.com/");
define('ADMIN_EMAIL',"jitender2@tekshapers.com");
define('ADMIN_NAME',"Admin");
define('API_KEY',	'A4646gth5674');



define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');



/*
|--------------------------------------------------------------------------
| user define constants
|--------------------------------------------------------------------------
|
| 
|
*/


/*checking for subdomain*/
$br_url     =   explode(".",$_SERVER['HTTP_HOST']);
$br_total   =   count($br_url);
$username   =   '';
$is_subdomain   =   0;
if($br_total>=3)
{
    $username   =   $br_url[$br_total-3];
    $is_subdomain   =   1;
}

if($is_subdomain && $username != 'projects'){
    define('SITE_PATH',	'http://'.$_SERVER['HTTP_HOST'].'/assets/');
}else{
    define('SITE_PATH',	'http://'.$_SERVER['HTTP_HOST'].'/lms/assets/');
}	
/*End OF checking for subdomain*/


/* End of file constants.php */
/* Location: ./application/config/constants.php */