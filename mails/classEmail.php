<?php
	/******************************************************************************************
	 File 			classEmail.php
	 Description 	handles email function to send the text mesaage and attachment file.	
	 Copyright(C) 	2009 ABHISHEK KUMAR	  
	 *
	 * This is an example on how to use the mshell_mail class included with this project.
	 * Basically makes attaching files, and sending messages painless.
	 *
	 * Functions:
	 *  # getBody() 				- returns the current message body.
	 *  # getHeader() 				- returns the current header.
	 *  # setHeader($name, $value) 	- alter the value of a header tag or add a new header tag. 
	 *		ie $sendEmail->setHeader("CC", "Carbon Copy <carbon@copy.com>");
	 *
	 *  # attachFile($file, $type) 	- add a file attachment to the message. The default type is 
	 *		"application/octetstream".
	 *
	 *  # bodyText($text) 			- add a plain text entry to the email.
	 *  # htmlText($text) 			- add an html entry to the message.
	 *  # clear_bodyText() 			- remove the plain text entry.
	 *  # clear_htmlText() 			- remove the html text enry.
	 *  # getError() 				- retrieve any error messages.
	 *  # sendMail($to, $subject) 	- Give the headers and body to your default mail program, 
	 *		usually sendmail.  Make sure your settings in php.ini have the correct sendmail location.
	 *
	******************************************************************************************/
	class sendEmail 
	{
	  var $errstr;
	  var $headers;
	  var $textBody;
	  var $htmlBody;
	  var $attachments;
	  var $boundary;
	  var $_body = '';
	
	  // Default constructor, sets up default header and boundary.
	  function sendEmail() 
	  {
		$this->attachments 	= array();
		$this->boundary 	= '_mine_mail_boundary_';
		$semi_rand 			= md5(time()); 
		$this->boundary 	= '==Multipart_Boundary_x{$semi_rand}x'; 
	
		$this->headers 		= array(
							   'MIME-Version' => '1.0',
							   'Content-Type' => "multipart/mixed; boundary=\"$this->boundary\""
							   );
	
		$this->bodyText("Default Mail Message.");
	  }
	
	  // For debugging purposes you can display the body you are about to send.
	  function getBody() 
	  {
		$retval = $textBody;
		$retval .= $htmlBody;
		foreach($this->attachments as $tblck)
		  $retval .= $tblck;
	
		return $retval;
	  }
	
	  // Convert the values in the header array into the correct format.
	  function getHeader() 
	  {
		$retval = "";
		foreach($this->headers as $key => $value)
		  $retval .= "$key: $value\n";
	
		return $retval;
	  }
	
	  // Add your own header entry or modify a header.
	  function setHeader($name, $value) 
	  {
		$this->headers[$name] = $value;
	  }
	
	  // Attach a file to the message.
	  function attachFile($file, $type = "application/octetstream")  
	  {
		if(!($fd = fopen($file, "r"))) 
		{
		  $this->errstr = "Error opening $file for reading.";
		  return 0;
		}
		$_buf = fread($fd, filesize($file));
		fclose($fd);
	
		$fname 		= explode("/", $file);
		$fnameCount = (count($fname) - 1);
		$fname 		= $fname[$fnameCount];

		// Convert to base64 becuase mail attachments are not binary safe.
		$_buf = chunk_split(base64_encode($_buf));
	
		$this->attachments[$file] = "\n--" . $this->boundary . "\n";
		$this->attachments[$file] .= "Content-Type: $type; name=\"$fname\"\n";
		$this->attachments[$file] .= "Content-Transfer-Encoding: base64\n";
		$this->attachments[$file] .= "Content-Disposition: attachment; " .
										 "filename=\"$fname\"\n\n";
		$this->attachments[$file] .= $_buf;
	
		return 1;
	  }  
	  
	  function attachFileImage($file, $type = "application/octetstream")  
	  {
		if(!($fd = fopen($file, "r"))) 
		{
		  $this->errstr = "Error opening $file for reading.";
		  return 0;
		}
		$_buf = fread($fd, filesize($file));
		fclose($fd);
	
		$fname 		= explode("/", $file);
		$fnameCount = (count($fname) - 1);
		$fname 		= $fname[$fnameCount];

		// Convert to base64 becuase mail attachments are not binary safe.
		$_buf = chunk_split(base64_encode($_buf));
	
		$this->attachments[$file] = "\n--" . $this->boundary . "\n";
		$this->attachments[$file] .= "Content-Type: $type; name=\"$fname\"\n";
		$this->attachments[$file] .= "Content-Transfer-Encoding: base64\n";
		$this->attachments[$file] .= "Content-Disposition: attachment; " .
										 "filename=\"$fname\"\n\n";
		$this->attachments[$file] .= $_buf;
	
		return 1;
	  }
	
	  function bodyText($text) 
	  {
		// Set the content type to text/plain for the text message.
		// 7bit encoding is simple ASCII characters, this is default.
		$this->textBody = "\n--" . $this->boundary . "\n";
		$this->textBody .= "Content-Type: text/plain\n";
		$this->textBody .= "Content-Transfer-Encoding: 7bit\n\n";
		$this->textBody .= $text;
	  }
	
	  function htmlText($text) 
	  {
		// Set the content type to text/html for the html message.
		// Also uses 7bit encoding.
		$this->htmlBody = "\n--" . $this->boundary . "\n";
		$this->htmlBody .= "Content-Type: text/html\n";
		$this->htmlBody .= "Content-Transfer-Encoding: 7bit\n\n";
		$this->htmlBody .= $text;
	  }
	
	  function clear_bodyText() { $this->textBody = ""; }
	  function clear_htmlText() { $this->htmlBody = ""; }
	  function getError() 		{ return $this->errstr; }
		
	  // Send the headers and body using php's built in mail.
	  function sendMail($to = "root@localhost", $subject = "Default Subject") 
	  {	
		if(isset($this->textBody)) $this->_body .= $this->textBody;
		if(isset($this->htmlBody)) $this->_body .= $this->htmlBody;
	
		foreach($this->attachments as $tblck)
		  $this->_body .= $tblck;
	
		$this->_body .= "\n--$this->boundary--";
	
		mail($to, $subject, $this->_body, $this->getHeader());
		
		return true;
	  }
	};
	$SendEmail = new sendEmail();
?>