<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	const CI_VERSION = '3.2.0'; // Just for tempravary test
	
	
	function __checkAndIncludeApp($fileName){
		if (file_exists(APPPATH.$fileName)){
			require_once(APPPATH.$fileName);
		}
	}
	
	__checkAndIncludeApp('config/'.ENVIRONMENT.'/constants.php');
	__checkAndIncludeApp('config/constants.php');
	
	require_once(BASEPATH.'core/Common.php');
	
	if ( ! is_php('5.4')){
		ini_set('magic_quotes_runtime', 0);
		if ((bool) ini_get('register_globals')){
			$_protected = array('_SERVER','_GET','_POST','_FILES','_REQUEST','_SESSION','_ENV','_COOKIE','GLOBALS','HTTP_RAW_POST_DATA',
				'system_path','application_folder','view_folder','_protected','_registered' );
	
			$_registered = ini_get('variables_order');
			foreach (array('E' => '_ENV', 'G' => '_GET', 'P' => '_POST', 'C' => '_COOKIE', 'S' => '_SERVER') as $key => $superglobal){
				if (strpos($_registered, $key) === FALSE){
					continue;
				}
				foreach (array_keys($$superglobal) as $var){
					if (isset($GLOBALS[$var]) && ! in_array($var, $_protected, TRUE)){
						$GLOBALS[$var] = NULL;
					}
				}
			}
		}
	}
	
	
	
?>