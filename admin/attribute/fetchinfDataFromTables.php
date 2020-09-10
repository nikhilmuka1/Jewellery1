<?php 
include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$mode = $_REQUEST['a'];

if($mode == 'attribute') // only Working bookings
{
    $result = $dbComObj->viewData($conn,"attribute", "*","1 and `delete` = '0' ");  
      $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        $i = 0;
  while ($data = $dbComObj->fetch_assoc($result))
    //  foreach($categoryList as $data) 
    {
     // print_r($data); die;
      $i++;
       
      if($data['status'] == '1')
      {
         $textt = 'De-active';
          $status = '<span class="label label-sm label-success">Active</span>';
      }
      else
      {
          $textt = 'Active';
          $status = '<span class="label label-sm label-danger">De-active</span>';
      }
      $c['id'] = $i;
      $c['cid'] ='#'.$data['id'];
      $c['title'] = $data['name'];
        $c['input_type'] = $data['input_type'];
          $c['attribute_option'] = '<a class="btn green-haze btn-outline btn-circle btn-sm" href="'.ADMIN_URL.'attributes-value/?a='.$data['id'].'&b='.$data['status'].'"> <i class="fa fa fa-list"></i> View</a>';
     
      $c['addedOn'] = date("F j Y g:i a", strtotime($data['updated_on']));
       $c['status'] = $status;
      $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="'.ADMIN_URL.'attributes/?a='.$data['id'].'&b='.$data['status'].'" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;"><li><a href="'.ADMIN_URL.'attribute/add-attribute/?a='.$njEncryptionObj->safe_b64encode($data['id']).'&mode='.  base64_encode('editAttribute').'"><i class="fa fa-file-text-o"></i> Edit </a></li><li><a href="javascript:0" onclick="return deleteAttribute('.$data['id'].');"><i class="fa fa-file-text-o"></i> Delete </a></li>
      <li><a href="javascript:;" onclick="return ManageByAdmin('.$data['id'].','.$data['status'].');"><i class="fa fa-ban"></i> '.$textt.' </a></li></ul></div>';
      $nj[] = $c;
    }
  }
  else
  {
    $nj = 'No data found.';
  }
  echo json_encode($nj);
}
else
{
}
?>