<?php	
	ob_start();		
	session_start();

	error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED); //E_ALL ^ E_NOTICE ^ E_DEPRECATED
	
	ini_set('memory_limit', '200M');
	ini_set('post_max_size', '200M');
	ini_set('upload_max_filesize', '200M');				
	ini_set("max_execution_time", "0");
	set_time_limit(0);
		
	/*
	 * @author     Abhishek <abhishek@abhianni.com>
	 * @copyright  2010-2012 Abhianni Group.
	 * @link       http://www.abhianni.com
	 * @file       Configuration File
	 */

	$localhost	= array ("localhost", 'aglocalhost');	
	$HTTPS = ($_SERVER['HTTPS']=='on')? 'https://' : 'http://';	
	
	define("HTTP_SERVER", 	$HTTPS . $_SERVER['SERVER_NAME'] . "",	true);
	
	define("DOC_ROOT", 		$_SERVER['DOCUMENT_ROOT'],				true);		
	
	
	// Local configuration 	
	switch( $_SERVER['SERVER_NAME'] )
	{
		// Local configuration
		case "aglocalhost"	:
		case "localhost"	:
			$baseURL				= HTTP_SERVER	. "/gentsplace";
			$baseHOME				= HTTP_SERVER	. "/gentsplace";
			$baseROOT				= DOC_ROOT		. "/gentsplace";
					
			define("dbHostname", 	"localhost",		true);
			define("dbUsername", 	"root",				true);
			define("dbPassword", 	"root",				true);
			define("dbName",		"gentsdeals", 		true);
			
		break;
		
		// My Server abhianni.com configuration
			case "www.gentsdeals.com" :
			case "gentsdeals.com" :
			$baseURL				= HTTP_SERVER	. "/orders";
			$baseROOT				= DOC_ROOT		. "/orders";
			
			define("dbHostname", 	"localhost", 										true);
			define("dbUsername", 	"order1",									true);
			define("dbPassword", 	"FTlW8?Bz8is!",										true);
			define("dbName",		"order",									true);

		break;


	}
	
		
		require_once $baseROOT . "/include/definations.php";
?>