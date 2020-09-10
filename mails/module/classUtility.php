<?php
/*
 * @author     Abhishek <abhishek@abhianni.com>
 * @file       Utility File
 */

class COMMON
{ 
	/**
	 *		displayWord (string, integer)
	 *		return number of words.
	 */
	function displayWord($str, $wordNo)
	{
		$strArray	= explode(" ", $str);
		$strCount	= count($strArray);
		$display	= "";
		
		if($wordNo <= $strCount)
		{
			for($i = 0; $i < $wordNo; $i++)
				$display .= $strArray[$i] . " ";
			
			$display .= "...";
		}
		else
			$display = $str;
			
		return $display;
	}

	/**
	 *		displayLetter (string, integer)
	 *		return number of words.
	 */
	function displayLetter($str, $letterNo)
	{
		$strLetter	= substr($str, 0, $letterNo);
		$strCount	= strlen($str);
		$display	= "";
		
		if($letterNo <= $strCount)
			$display = $strLetter . "...";		
		else
			$display = $str;
			
		return $display;
	}
	
	/*		
	 *		Remove spacel charector in string(string)
	 */
	
	function clean($string) {
		   $string = str_replace('', '-', $string); // Replaces all spaces with hyphens.
		   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		}
	

	/*		
	 *		scrape (string)
	 */
	function scrape ($str)
	{
		if(get_magic_quotes_gpc()) 
			$str = trim($str);
		else
			$str = addslashes(trim($str));
				
		return $str;
	}

	/*		
	 *		inscape (string)
	 */
	function inscrape ($str)
	{
		if(get_magic_quotes_gpc()) 
			$str = htmlentities(stripslashes($str), ENT_QUOTES);
		else
			$str = htmlentities($str, ENT_QUOTES);
			
		return $str;
	}

	/*		
	 * 		unscape (string)
	 */
	function outscrape ($str)
	{
		if(get_magic_quotes_gpc()) 
			$str = html_entity_decode(stripslashes($str));
		else
			$str = html_entity_decode($str);
			
		return $str;
	}

	/*		
	 * 		getPaging (string)
	 */
	function getPaging($page, $noPage, $limitPage, $link, $linkClass)
	{
		$tmpLink		= explode("?", $link);

		if($tmpLink[1] != "")
			$link		= $link . "&";
		else
			$link		= $link . "?";
			
		$strReturn		= "";
		
		$prevPage		= $page - 1;
		
		if($page > 1)
			$strReturn	.= " <a href=\"" . $link . "page=" . $prevPage . "\" class=\"$linkClass\">&laquo;</a> ";
		else
			$strReturn	.= "&nbsp;&nbsp;";
			
		if($limitPage < $page)
			$startPage	= $page - ($limitPage - 1);
		else
			$startPage	= 1;
			
		$tmpStr			= "";
		
		for($i = 1; ($i <= $limitPage && $i <= $noPage); $i++)
		{
			if($page == $startPage)
				$tmpStr	.= "<span class=\"$linkClass\">$startPage</span>";
			else
				$tmpStr	.= " <a href=\"" . $link . "page=" . $startPage . "\" class=\"$linkClass\">" . $startPage . "</a> ";

			$startPage++;				
		}
		
		$strReturn		.= $tmpStr;
		
		if($page < $noPage)
		{
			$nextPage 	= ($page + 1);
			$strReturn	.= " <a href=\"" . $link . "page=" . $nextPage . "\" class=\"$linkClass\" >&raquo;</a> ";				
		}
		else
			$strReturn	.= "&nbsp;&nbsp;&nbsp;";
				
		return $strReturn;
		
	} 

	/*		
	 * 		File Download
	 */
	function downloadFile( $fullPath )
	{
	  // Must be fresh start
	  if( headers_sent() )
		die('Headers Sent');
	
	  // Required for some browsers
	  if(ini_get('zlib.output_compression'))
		ini_set('zlib.output_compression', 'Off');
	
	  // File Exists?
	  if( file_exists($fullPath) )
	  {   
		// Parse Info / Get Extension
		$fsize 		= filesize($fullPath);
		$path_parts = pathinfo($fullPath);
		$ext 		= strtolower($path_parts["extension"]);
	   
		// Determine Content Type
		switch ($ext) 
		{
		  case "pdf" : $ctype="application/pdf"; 				break;
		  case "exe" : $ctype="application/octet-stream"; 		break;
		  case "zip" : $ctype="application/zip"; 				break;
		  case "doc" : $ctype="application/msword"; 			break;
		  case "xls" : $ctype="application/vnd.ms-excel"; 		break;
		  case "ppt" : $ctype="application/vnd.ms-powerpoint"; 	break;
		  case "gif" : $ctype="image/gif"; 						break;
		  case "png" : $ctype="image/png"; 						break;
		  case "jpeg":
		  case "jpg" : $ctype="image/jpg"; 						break;
		  default	 : $ctype="application/force-download";
		}
	
		header("Pragma: public"); 												// required
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false); 								// required for certain browsers
		header("Content-Type: $ctype");
		header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".$fsize);
		ob_clean();
		flush();
		readfile($fullPath);
	  } 
	  else
	  { die('File Not Found'); }
			
	} 	
	/*		
	 * 		getCountry List
	 */
	function getAllCountry ($dumpSQL=true)
	{
		$query ="SELECT * FROM ".tblCountry." ORDER BY countryName";
		
		if($dumpSQL) return mysql_query($query);
		else {echo $query; return mysql_query($query);}
	}

	function getCountryNameByCountryISO ($countryISOCode, $dumpSQL=true)
	{
		$query ="SELECT * FROM ".tblCountry." WHERE countryISOCode ='$countryISOCode' ORDER BY countryName";
		
		$Obj = mysql_query($query);
		$Obj = mysql_fetch_array($Obj);
				
		if($dumpSQL) return $Obj['countryName'];
		else {echo $query; return $Obj['countryName'];}		
	}

	/* getState List */
	function getAllState ($dumpSQL=true)
	{
		$query ="SELECT * FROM ".tblState." ORDER BY state";
		
		if($dumpSQL) return mysql_query($query);
		else {echo $query; return mysql_query($query);}
	}



	function getUserName($userName, $dumpSQL=true)
	{
		$query 	= " SELECT buyerID AS ID, CONCAT(firstName, ' ', lastName) AS NAME, CONCAT('Buyer') AS TYPE, active AS ACTIVE  FROM ".tblBuyer." WHERE userName='$userName' "
				. " UNION SELECT sellerID AS ID, CONCAT(firstName, ' ', lastName) AS NAME, CONCAT('Seller') AS TYPE, active AS ACTIVE FROM ".tblSeller." WHERE userName='$userName' ";
		$Obj	= mysql_fetch_array(mysql_query($query), MYSQL_ASSOC);
		
		if($dumpSQL) return $Obj;
		else {echo $query; return $Obj;}
	}
	
	function getUserNameByUserNameAndPassword($userName, $password, $dumpSQL=true)
	{
		$query 	= " SELECT buyerID AS ID, CONCAT(firstName, ' ', lastName) AS NAME, CONCAT('Buyer') AS TYPE, active AS ACTIVE  FROM ".tblBuyer." WHERE userName='$userName' AND password='".$password."' "
				. " UNION SELECT sellerID AS ID, CONCAT(firstName, ' ', lastName) AS NAME, CONCAT('Seller') AS TYPE, active AS ACTIVE FROM ".tblSeller." WHERE userName='$userName' AND password='".$password."' ";
		$Obj	= mysql_fetch_array(mysql_query($query), MYSQL_ASSOC);
	
		if($dumpSQL) return $Obj;
		else {echo $query; return $Obj;}
	}
	

	/* get Price Range List */
	function getSearchByPrice ($dumpSQL=true)
	{
		$query ="SELECT * FROM ".tblPricerange." ORDER BY position";
		
		if($dumpSQL) return mysql_query($query);
		else {echo $query; return mysql_query($query);}
	}

};
$CommanObj = new COMMON();

?>
