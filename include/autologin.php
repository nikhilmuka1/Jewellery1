<?php
 $_COOKIE;
// print_r($_COOKIE);  die;
  $Jauth = $_COOKIE['Jauth'];
if(isSet($_COOKIE))
{
	// Check if the cookie exists
     if(isSet($_COOKIE["Jauth"]))
	{
          $Jauth = $_COOKIE['Jauth'];
	 $auth_data = json_decode($Jauth, true);
         $_SESSION= $auth_data;
        }
}
?>