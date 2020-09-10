<?php
	// if $errors is not empty, the form must have failed one or more validation 
	// tests. Loop through each and display them on the page for the user
	if (!empty($errors))
	{
	  echo "<div class='msgError'>&nbsp;&nbsp;Please fix the following errors:\n<ol>";
	  foreach ($errors as $error)
		echo "<li>$error</li>\n";
	
	  echo "</ol></div>"; 
	}
	
	
	if (!empty($message))
	  echo "<div class='msgNotify'>$message</div>";

	if (!empty($messageError))
	  echo "<div class='msgError'>$messageError</div>";

	if (!empty($_REQUEST['mes'] ) )
	{	
		if ($_REQUEST['mes']== 'err')
	  		echo "<div class='msgError'>You are not authorized to view this page.</div>";
	
		if ($_REQUEST['mes']== 'forgotPassword')
	  		echo "<div class='msgNotify'>Username and password has been sent to your e-mail ID.</div>";
	
		if ($_REQUEST['mes']== 'deact')
	  		echo "<div class='msgNotify'>Status has been changed successfully.</div>";
		if ($_REQUEST['mes']== 'act')
	  		echo "<div class='msgNotify'>Status has been changed successfully.</div>";
			


		if ($_REQUEST['mes']== 'login')
	  		echo "<div class='msgNotify'>You have been successfully logged in.</div>";						
		if ($_REQUEST['mes']== 'logout')
	  		echo "<div class='msgNotify'>You have been successfully logged out.</div>";						
		if ($_REQUEST['mes']== 'password')
	  		echo "<div class='msgNotify'>Password has been changed successfully.</div>";

		if ($_REQUEST['mes']== 'editSetting')
	  		echo "<div class='msgNotify'>Setting has been updated successfully.</div>";

		if ($_REQUEST['mes']== 'addCategory')
	  		echo "<div class='msgNotify'>Category has been added successfully.</div>";
		if ($_REQUEST['mes']== 'editCategory' || $_REQUEST['mes']== 'updateCategory')
	  		echo "<div class='msgNotify'>Category has been updated successfully.</div>";
		if ($_REQUEST['mes']== 'delCategory')
	  		echo "<div class='msgNotify'>Category has been deleted successfully.</div>";


		if ($_REQUEST['mes']== 'updateEmailcontent' || $_REQUEST['mes']== 'editEmailcontent')
	  		echo "<div class='msgNotify'>Email content has been updated successfully.</div>";


		if ($_REQUEST['mes']== 'addEmailmanage')
	  		echo "<div class='msgNotify'>Form name has been added successfully.</div>";

		if ($_REQUEST['mes']== 'editEmailmanage' || $_REQUEST['mes']== 'updateEmailmanage')
	  		echo "<div class='msgNotify'>Form name has been updated successfully.</div>";
			
		if ($_REQUEST['mes']== 'Orderkey' || $_REQUEST['mes']== 'Orderkey')
	  		echo "<div class='msgNotify'>Order has been updated successfully.</div>";	

	


	}
	  
?>