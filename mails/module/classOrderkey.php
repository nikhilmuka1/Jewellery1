<?php
	class Orderkey extends connectionMySQL 
	{
		var $recordSet, $OrderkeyID, $name, $subject, $description, $active, $position;
		
		/******************* Modify From Table*********************/
		
		function updateOrderkey($OrderkeyID, $dumpSQL=true)
		{
			$query 	= "UPDATE ".tblOrderkey." set "
					. " loginName		= '$this->loginName', "
					. " transactionKey	= '$this->transactionKey', "
					. " active			= '$this->active' "
					. " WHERE orderOption 	= '$OrderkeyID' ";
					
			if($dumpSQL) return $this->updateSQL($query);
			else echo $query;
		}
				
		

		function getOrderkeyByOrderkeyID($OrderkeyID, $dumpSQL=true)
		{
			$query ="SELECT * FROM ".tblOrderkey." WHERE orderOption='$OrderkeyID'";
			$this->selectSQL($query);
			
			if($dumpSQL) return $this->getRow();
			else {echo $query; return $this->getRow();}
		}
		
		

	};
	$OrderkeyObj = new Orderkey();	//	Orderkey
?>