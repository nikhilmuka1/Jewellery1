<?php
	class administrators extends connectionMySQL 
	{
		var $recordSet, $administratorID, $userName, $password, $oldPassword, $name, $type, $active;
		
		/******************* Modify From Table*********************/
		function insertAdministrator($dumpSQL=true)
		{
			$query 	= " INSERT into ".tblAdministrator." set "
					. " userName		= '$this->userName', "
					. " password		= '$this->password', "
					. " name			= '$this->name', "
					. " type			= '$this->type', "	
					. " dateLogin		= '$this->dateLogin', "	
					. " active			= '$this->active' ";
			
			if($dumpSQL) return $this->insertSQL($query);
			else echo $query;
		}
		
		function updateAdministrator($administratorID, $dumpSQL=true)
		{
			$query 	= "UPDATE ".tblAdministrator." set "
					. " userName		= '$this->userName', "
					. " password		= '$this->password', "
					. " name			= '$this->name', "
					. " type			= '$this->type', "	
					. " dateLogin		= '$this->dateLogin', "
					. " active			= '$this->active' "
					. " WHERE administratorID = '$administratorID' ";
					
			if($dumpSQL) return $this->updateSQL($query);
			else echo $query;
		}
		
		function updateAdministratorLoginByAdministratorID($AdministratorID, $dumpSQL=true)
		{
			$query 	= "UPDATE ".tblAdministrator." set "
					. " dateLogin	= '$this->dateLogin' "
					. " WHERE AdministratorID = '$AdministratorID' ";
					
			if($dumpSQL) return $this->updateSQL($query);
			else echo $query;
		}
		
		function updateAdministratorUsernamePassword($administratorID, $dumpSQL=true)
		{
			$query 	= " UPDATE ".tblAdministrator." set "
					. " userName = '".$this->userName."', "
					. " password = '".md5($this->password)."' "
					. " WHERE administratorID = '$administratorID' ";
	
			if($dumpSQL) return $this->updateSQL($query);
			else echo $query;
		}
		
		function updateAdministratorActive($administratorID, $active=0, $dumpSQL=true)
		{
			$query 	= " UPDATE ".tblAdministrator." set "
					. " active	= '$active' "
					. " WHERE administratorID = '$administratorID' ";
	
			if($dumpSQL) return $this->updateSQL($query);
			else echo $query;
		}
		
		function deleteAdministratorByAdministratorID($administratorID, $dumpSQL=true)
		{
			$query ="DELETE FROM ".tblAdministrator." WHERE administratorID = '$administratorID'";
	
			if($dumpSQL) return $this->selectSQL($query);
			else echo $query;
		}		
	
		
		/******************* Get From Table*********************/
		function getAdministratorDetailByAdministratorID($administratorID, $dumpSQL=true)
		{
			$query ="SELECT * FROM ".tblAdministrator." WHERE administratorID='$administratorID'";
			$this->selectSQL($query);
			
			if($dumpSQL) return $this->getRow();
			else {echo $query; return $this->getRow($query);}
		}
		
		function getAdministratorByUserNameAndPassword($userName, $password, $dumpSQL=true)
		{
			$query ="SELECT * FROM ".tblAdministrator." WHERE userName='$userName' AND password='".md5($password)."'";
			$this->selectSQL($query);
	
			if($dumpSQL) return $this->getRow();
			else {echo $query; return $this->getRow();}
		}
		
		function getAdministratorByUserName($userName, $dumpSQL=true)
		{
			$query ="SELECT * FROM ".tblAdministrator." WHERE userName='$userName'";
			$this->selectSQL($query);
			
			if($dumpSQL) return $this->getRow();
			else {echo $query; return $this->getRow($query);}
		}
		
		function getAdministratorByPassword($dumpSQL=true)
		{
			$query ="SELECT administratorID FROM ".tblAdministrator." WHERE password='".md5($this->oldPassword)."'";
			$this->selectSQL($query);
			$Obj = $this->getRow();
			
			if($dumpSQL) return $Obj['administratorID'];
			else {echo $query; return $Obj['administratorID'];}
		}
		
		function getAllAdministrator($dumpSQL=true)
		{
			$query ="SELECT * FROM ".tblAdministrator." ORDER BY administratorID";
			
			if($dumpSQL) return $this->selectSQL($query);
			else {echo $query; return $this->selectSQL($query);}
		}
	
		function getLimitAdministrator($limitStart, $limit, $dumpSQL=true)
		{
			$query 	= " SELECT * FROM ". tblAdministrator." WHERE ORDER BY administratorID LIMIT $limitStart, $limit";
					
			if($dumpSQL) return $this->selectSQL($query);
			else {echo $query; return $this->selectSQL($query);}
		}		
	};
	$AdministratorObj = new administrators();	//Controller
?>