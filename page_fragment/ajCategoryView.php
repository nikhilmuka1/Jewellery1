<?php

class ajCategoryView  extends dbGeneral  {
    var $skey = "aj"; // you can change it

      function __construct() {
      
      }
      public function CategoryNameById($id) { 
          
          $id_arr = explode(",",trim($id));
           $name_array=array();            
          for ($i = 0; $i < count($id_arr) ; $i++) { 
                     
        $dbConObj = new dbConnect();
        $conn = $dbConObj->dbConnect();
        $condition = " `id` = '".$id_arr[$i]."' and `delete`='0'";
        $result = $this->viewData($conn,"category","*",$condition);
        $num = $this->num_rows($result);
            if ($num) {
                 $row = $this->fetch_assoc($result);
                $name_array[] = $row['name'];
              } else {
                $name_array[] = '-';
              }
        }
           return implode(",",$name_array);
     }
     public function fetchCategoryTree($not_id = '',$parent = 0, $spacing = '', $user_tree_array = '') {
        //   $dbComObj = new dbGeneral();
         $dbConObj = new dbConnect();
         $conn = $dbConObj->dbConnect();
          if (!is_array($user_tree_array))
            $user_tree_array = array(); 
		    if($not_id){
			     $not_parent_con  =	"and `id` <> '".$not_id."'";
			}else {
				$not_parent_con  ='';
			}
             $condition = "1 AND `parent_id` = '".$parent."'  and`delete` = '0' $not_parent_con  ORDER BY id ASC";   
           $result = $this->viewData($conn,"category", "*",$condition);
            $num = $this->num_rows($result);
         if ($num > 0) { 
             while ($data = $this->fetch_assoc($result))
              {  
              $user_tree_array[] = array("id" =>$data['id'],  "status" =>$data['status'], "image" =>$data['image'], "added_on" =>$data['added_on'],"updated_on" =>$data['updated_on'], "name" => $spacing . $data['name']);
              $user_tree_array = $this->fetchCategoryTree($not_id ,$data['id'], $spacing . '&nbsp;&nbsp;', $user_tree_array);
            }
          }
          return $user_tree_array;
        }


      public  function fetchCategoryTreeList($parent = 0, $user_tree_array = '') {

            $dbConObj = new dbConnect();
            $conn = $dbConObj->dbConnect();

          if (!is_array($user_tree_array))
          $user_tree_array = array();

         $condition = "1 AND `parent_id` = '".$parent."' and`delete` = '0' ORDER BY id ASC";   
         $result = $this->viewData($conn,"category", "*",$condition);
            $num = $this->num_rows($result);
         if ($num > 0) { 
           while ($data = $this->fetch_assoc($result))
            {  
               $user_tree_array[] = "<li>". $data['name']."</li>";
               $user_tree_array = $this->fetchCategoryTreeList($data['id'], $user_tree_array);
            }
           $user_tree_array[] = "</ul>";
        }
      return $user_tree_array;
    } 
      public function fetchCategoryTreeTable($parent = 0, $spacing = '', $user_tree_array = '',$data_tt_id=1,$data_tt_parent_id='' ) {
        //for table tree view 
         //recu
         $dbConObj = new dbConnect();
         $conn = $dbConObj->dbConnect();
          if (!is_array($user_tree_array))
            $user_tree_array = array();
            $condition = "1 AND `parent_id` = '".$parent."' and`delete` = '0' ORDER BY id ASC"; 
           // $condition = "1 AND `parent_id` = '".$parent."'  ORDER BY id ASC";     
           $result = $this->viewData($conn,"category", "*",$condition);
            $num = $this->num_rows($result);
         if ($num > 0) { 
             while ($data = $this->fetch_assoc($result))
              {  

              $user_tree_array[] = array("id" =>$data['id'],  "status" =>$data['status'],
                                        "image" =>$data['image'], "added_on" =>$data['added_on'],
                                        "name" => $spacing . $data['name'], "updated_on" =>$data['updated_on'],
                                        "delete" =>$data['delete'],                     
                                        "data_tt_id" =>$data_tt_id,
                                        "data_tt_parent_id" => $data_tt_parent_id);

              $user_tree_array = $this->fetchCategoryTreeTable($data['id'], $spacing . '', $user_tree_array,$data_tt_id.'.1',$data_tt_id);
               $data_tt_id++;
            }
          }
          return $user_tree_array;
        }
         public function fetchCategoryTreeTableSeller($parent = 0, $spacing = '', $user_tree_array = '',$data_tt_id=1,$data_tt_parent_id='' ) {
        //for table tree view 
         //recu
         $dbConObj = new dbConnect();
         $conn = $dbConObj->dbConnect();
          if (!is_array($user_tree_array))
            $user_tree_array = array();
            $condition = "1 AND `parent_id` = '".$parent."' and`delete` = '0' ORDER BY id ASC"; 
           // $condition = "1 AND `parent_id` = '".$parent."'  ORDER BY id ASC";     
           $result = $this->viewData($conn,"category", "*",$condition);
            $num = $this->num_rows($result);
         if ($num > 0) { 
             while ($data = $this->fetch_assoc($result))
              {  

              $user_tree_array[] = array("id" =>$data['id'],  "status" =>$data['status'],
                                        "image" =>$data['image'], "added_on" =>$data['added_on'],
                                        "name" => $spacing . $data['name'],
                                        "delete" =>$data['delete'],                     
                                        "data_tt_id" =>$data_tt_id,
                                        "data_tt_parent_id" => $data_tt_parent_id);

              $user_tree_array = $this->fetchCategoryTreeTableSeller($data['id'], $spacing . '', $user_tree_array,$data_tt_id.'.1',$data_tt_id);
               $data_tt_id++;
            }
          }
          return $user_tree_array;
        }
       function createTreeViewcheckbox($checkedvalue='',$currentParent, $currLevel = 0, $prevLevel = -1) {
               //print_r($checkedvalue); 
               $checkedvalue= trim($checkedvalue);
            $dbConObj = new dbConnect();
           $conn = $dbConObj->dbConnect();
           $result = $this->viewData($conn,"category", "*","status='1' and `delete` = '0'");
            $num = $this->num_rows($result);
            $arrayCategories = array();
         if ($num > 0) { 
             while ($data = $this->fetch_assoc($result))
              { 
                
               $arrayCategories[$data['id']] = array("parent_id" => $data['parent_id'], "name" =>                       
               $data['name'],"id" => $data['id'],);   
               }
             }
             $array=$arrayCategories;
          foreach ($arrayCategories as $categoryId => $category) {
          $checked='';
          if ($currentParent == $category['parent_id']) {                       
              if ($currLevel > $prevLevel) echo " <ol class='tree'> "; 

              if ($currLevel == $prevLevel) echo " </li> ";
               if($checkedvalue != ''){
               $checked_arr = explode(",",$checkedvalue);  
                  foreach ($checked_arr as $checkkey => $checkvalue) {   
                       if( trim($checked_arr[$checkkey]) ==  $category['id']){
                            $checked = 'checked';
                            }            
                      }
                }
                 ?>
             
               <li><input type="checkbox" class="checkboxaj" name="category_id[]" 
               value="<?php echo $category['id']; ?> " <?php echo $checked; ?> required /> 
                 <label for="subfolder2"> <?php echo $category['name']?> </label>

                <?php 
           //   }
              if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

              $currLevel++; 

              $this->createTreeViewcheckbox($checkedvalue, $categoryId, $currLevel, $prevLevel);

              $currLevel--;               
              }   

          }

          if ($currLevel == $prevLevel) echo " </li>  </ol> ";

          }   

   
}
/*
$qry="SELECT * FROM treeview_items";
$result=mysql_query($qry);
 
 
$arrayCategories = array();
 
while($row = mysql_fetch_assoc($result)){ 
 $arrayCategories[$row['id']] = array("parent_id" => $row['parent_id'], "name" =>                       
 $row['name']);   
  }
?>
<div id="content" class="general-style1">
<?php
if(mysql_num_rows($result)!=0)
{
?>
<?php 
 
createTreeView($arrayCategories, 0); ?>
<?php
}
?>*/
// show html of tree view 
      //$ajCategoryViewObj = new ajCategoryView();
      // $categoryList = $ajCategoryViewObj->fetchCategoryTree();

  // show html of category view List
       /*echo '<ul>';
          // $ajCategoryViewObj = new ajCategoryView();
           $categoryliList = $ajCategoryViewObj->fetchCategoryTreeList();
           foreach ($categoryliList as $r) {
              echo  $r;
            }
        echo   '</ul>';*/
