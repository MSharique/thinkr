<?php
########## MySql details (Replace with yours) #############
$db_username = ""; //Database Username
$db_password = ""; //Database Password
$hostname = ""; //Mysql Hostname
$db_name = ''; //Database Name
###################################################################
$redirectUrl = ''; //path to home page
$logoutUrl = ''; //logout url 
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------
$config =array(
		"base_url" => "http://localhost/ICWeb_31814/hybridauth/hybridauth/", 
		"providers" => array ( 

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "<GOOGLE_API_KEY>", "secret" => "<GOOGLE_API_SECRET_KEY>" ), 
				"access_type" => "online",
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "<FACEBOOK_API_KEY>", "secret" => "<FACEBOOK_API_SECRET_KEY>" ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "XXXXXXXX", "secret" => "XXXXXXX" ) 
			),
		),
		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,
		"debug_file" => "",
	);
?>