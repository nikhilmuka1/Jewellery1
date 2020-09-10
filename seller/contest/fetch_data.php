<?php
include '../../page_fragment/define.php'; 
include '../../page_fragment/topScript.php';
$mode = $_GET['a'];
switch ($mode) {

    case 'list':
    
         $table = "contests";
        $condition = " 1 and is_delete ='0' order by id desc";
        $result = $dbComObj->viewData($conn, $table, "*", $condition);
         $num = $dbComObj->num_rows($result);
        if ($num > 0) 
        {
            $i = 0;
               $nj = array();
            while($data = $dbComObj->fetch_object($result))
            {
  //  print_r($data);
                if($data->status == 1)
                  {
                        $textt = 'De-active';
                        $content = '<span class="label label-sm label-success"> Active </span>';
                  }
                  else
                  {
                        $textt = 'Active';
                        $content = '<span class="label label-sm label-danger"> De-active </span>';
                  }
                
                $buttons = '<li><a href="'.ADMIN_URL.'contests/info/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'"><i class="fa fa-eye"></i> View </a></li>'
                        . '<li><a href="'.ADMIN_URL.'contests/new-contest/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'"><i class="fa fa-edit"></i> Edit </a></li>'
                        . '<li><a href="javascript:;" onclick="return DeleteContest('.$data->id.');"><i class="fa fa-trash-o"></i> Delete </a></li>
                <li><a href="javascript:;" onclick="return UserManageByAdmin('.$data->id.','.$data->status.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>';
                $i++;
                
                if ($data->cover_image == '' || $data->cover_image == null) {
                    $cover_image = BASE_URL.'img/user-images/avatar.jpg';
                } else {
                    $cover_image = BASE_URL.'images/contest/thumb/'.$data->cover_image;
                }
                
                $c['id'] = $i;
                $c['title'] = '<a href="'.ADMIN_URL.'contests/info/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'">'.$data->title.'</a>';
              // $c['description'] = base64_decode($data->description);
                // $c['reward'] = if(base64_decode($data->reward) ) base64_decode($data->reward);
                $c['cover_image'] = '<a href="'.ADMIN_URL.'contests/info/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'"><img src="'.$cover_image.'" style="width: 75px;border: 1px solid #ccc;border-radius: 5px;padding: 1px;"/></a>';
                $c['added_on'] = date('d M Y', strtotime($data->added_on));
                $c['last_date'] = date('d M Y h:i:sa', strtotime($data->last_date));
                $c['status'] = $content;
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';
    
                $nj[] = $c;
                //    print_r($nj); 
            }
           //   print_r($nj); 
              echo json_encode($nj);
        }
        else
        {
            echo "No record found";
        }
    break;
    
    case 'contestParticipate':
         $id=   $_GET['b'];
        $table2 = "contests_participate";
        $condition = " 1  and admin_status ='1' and contest_id='".$id."' order by id desc";
        $result = $dbComObj->viewData($conn, $table2, "*", $condition);
         $num = $dbComObj->num_rows($result);
        if ($num > 0) 
        {
            $i = 0;
               $nj = array();
            while($data = $dbComObj->fetch_object($result))
            {    //print_r($data);
    
                if($data->admin_status == 1)
                  {
                        $textt = 'Decline';
                        $content = '<span class="label label-sm label-success"> Aprroved </span>';
                  }
                  else
                  {
                        $textt = 'Aprroved';
                        $content = '<span class="label label-sm label-danger"> Decline </span>';
                  }
                
                $buttons = '<li><a href="'.ADMIN_URL.'contest/contest_product_participate.php/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'"><i class="fa fa-eye"></i> Participate Product </a></li>'.
                        '<li><a href="'.ADMIN_URL.'contests/info/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'"><i class="fa fa-eye"></i> View </a></li>'.
                           '<li><a href="javascript:;" onclick="return UserManageByAdmin('.$data->id.','.$data->admin_status.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>';
                $i++;
                
                if ($data->cover_image == '' || $data->cover_image == null) {
                    $cover_image = BASE_URL.'img/user-images/avatar.jpg';
                } else {
                    $cover_image = BASE_URL.'images/contest/thumb/'.$data->cover_image;
                }
                
                $c['id'] = $i;
                 $c['contest_name'] =  $ajGenObj->NameById($data->contest_id,'contests','title');//$data->Brand
                 $c['seller'] =  $ajGenObj->NameById($data->seller_id,'users');//$data->Brand
               // $c['title'] = '<a href="'.ADMIN_URL.'contests/info/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'">'.$data->title.'</a>';
                 $c['title'] = ($data->title);
                 $c['description'] = ($data->description);
                $c['added_on'] = date('d M Y', strtotime($data->added_on));
                $c['admin_status'] = $content;
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';
    
                $nj[] = $c;
                //    print_r($nj); 
            }
           //   print_r($nj); 
              echo json_encode($nj);
        }
        else
        {
            echo "No record found";
        }
    break;
   // product_votes_contest
     case 'contestProductVotes':
        $ss_user_id = $_SESSION['DH_seller_id'];  
        $table2 = "contest_Votes";
        $condition = "as c INNER JOIN products as p ON c.product_id = p.product_id  where c.seller_id = $ss_user_id group by c.product_id order by NumberOfVotes desc ";
        $colom='c.contest_id,c.product_id,c.seller_id, p.SKU, p.Brand , p.product_name,p.product_type,p.slug,p.category_id,COUNT(c.product_id) AS NumberOfVotes';
        $result = $dbComObj->viewJoinData($conn, $table2, $colom, $condition);
         $num = $dbComObj->num_rows($result);
         
        if ($num > 0) 
        {
            $i = 0;
               $nj = array();
            while($data = $dbComObj->fetch_object($result))
            {  //  print_r($data);
    
               $i++;
                
                  $c['id'] = $i;
                 $c['products'] =  '<b class="product_name">'.ucfirst($data->product_name).'</b>';
                 $c['contest_name'] = '<b class="contest_name">'.ucfirst($ajGenObj->NameById($data->contest_id,'contests','title')).'</b>';//$data->Brand
                 $c['brand'] =  $ajGenObj->NameById($data->Brand,'brands');//$data->Brand
                 $c['type'] = ($data->product_type);
                 $c['sku'] = ($data->SKU);
                 $c['votes'] = '<i class="fa fa-star-o" aria-hidden="true"></i> <b> '.($data->NumberOfVotes).'</b>';
             
                $nj[] = $c;
                //    print_r($nj); 
            }
           //   print_r($nj); 
              echo json_encode($nj);
        }
        else
        {
            echo "No record found";
        }
    break;
}
?>