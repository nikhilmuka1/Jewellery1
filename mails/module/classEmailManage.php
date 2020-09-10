<?php
	class emailmanage extends connectionMySQL 
	{
		var $recordSet, $emailmanageID, $name, $subject, $description, $active, $position;
		
		/******************* Modify From Table*********************/
		function insertEmailmanage($dumpSQL=true)
		{
			$query 	= " INSERT into ".tblEmailmanage." set "
					. " formName		= '$this->formName', "
					. " email			= '$this->email', "
					. " active			= '$this->active' ";
			
			if($dumpSQL) return $this->insertSQL($query);
			else echo $query;
		}
		
		function updateEmailmanage($emailmanageID, $dumpSQL=true)
		{
			$query 	= "UPDATE ".tblEmailmanage." set "
					. " formName		= '$this->formName', "
					. " email			= '$this->email', "
					. " active			= '$this->active' "
					. " WHERE emailmanageID 	= '$emailmanageID' ";
					
			if($dumpSQL) return $this->updateSQL($query);
			else echo $query;
		}
				
		function updateEmailmanageByEmailmanageID($emailmanageID, $dumpSQL=true)
		{
			$query 	= "UPDATE ".tblEmailmanage." set "
					. " active		= '$this->active' "
					. " WHERE emailmanageID = '$emailmanageID' ";
					
			if($dumpSQL) return $this->updateSQL($query);
			else echo $query;
		}

		function deleteEmailmanageByEmailmanageID($emailmanageID, $dumpSQL=true)
		{
			$query ="DELETE FROM ".tblEmailmanage." WHERE emailmanageID = '$emailmanageID'";
	
			if($dumpSQL) return $this->selectSQL($query);
			else echo $query;
		}		
			
		/******************* Get From Table*********************/
		function getMaxPosition($dumpSQL=true)
		{
			$query ="SELECT max(position) as position FROM ".tblEmailmanage."";
			$this->selectSQL($query);
			$Obj = $this->getRow();
			if($dumpSQL) return ($Obj['position']+1);
			else {echo $query; return ($Obj['position']+1);}
		}

		function getEmailmanageByEmailmanageID($emailmanageID, $dumpSQL=true)
		{
			$query ="SELECT * FROM ".tblEmailmanage." WHERE emailmanageID='$emailmanageID'";
			$this->selectSQL($query);
			
			if($dumpSQL) return $this->getRow();
			else {echo $query; return $this->getRow();}
		}
		
		function getFormNameByEmailID($formName, $dumpSQL=true)
		{
			$query ="SELECT * FROM ".tblEmailmanage." WHERE formName='$formName' AND active='1'";
			$this->selectSQL($query);
			
			if($dumpSQL) return $this->getRow();
			else {echo $query; return $this->getRow();}
		}
				
		function getformNameManageIDByName($formName, $dumpSQL=true)
		{
			$query ="SELECT * FROM ".tblEmailmanage." WHERE formName='$formName'";
			$this->selectSQL($query);
			
			if($dumpSQL) return $this->getRow();
			else {echo $query; return $this->getRow();}
		}
		
		function getAllEmailmanage($dumpSQL=true)
		{
			$query ="SELECT * FROM ".tblEmailmanage." ORDER BY emailmanageID";
			
			if($dumpSQL) return $this->selectSQL($query);
			else {echo $query; return $this->selectSQL($query);}
		}
				
		function getLimitEmailmanage($limitStart, $limit, $orderBy, $dumpSQL=true)
		{
			$query 	= " SELECT * FROM ". tblEmailmanage." WHERE 1 ORDER BY $orderBy LIMIT $limitStart, $limit";
					
			if($dumpSQL) return $this->selectSQL($query);
			else {echo $query; return $this->selectSQL($query);}
		}	

	};
	$EmailmanageObj = new emailmanage();	//	emailmanage
?>