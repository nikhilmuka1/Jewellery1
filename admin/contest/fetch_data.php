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
                  
                 if(base64_decode($data->reward)) {
                     $rewards = base64_decode($data->reward); 
                      $rewards = (strlen($rewards) > 35) ? substr($rewards,0,35).'...' : $rewards;
                 } else {$rewards = '';}
                 if(base64_decode($data->description)) {
                     $description = base64_decode($data->description);
                     $description = (strlen($description) > 38) ? substr($description,0,35).'...' : $description;
                 } else {$description = '';}
                $c['id'] = $i;
                $c['title'] = '<a href="'.ADMIN_URL.'contests/info/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'">'.$data->title.'</a>';
                $c['description'] = $description;
                $c['reward'] =$rewards;
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
    
       case 'contestPendingParticpate':
    
        $table2 = "contests_participate";
        $condition = " 1  and admin_status ='0' order by id desc";
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
    //'<li><a href="'.ADMIN_URL.'contests/info/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'"><i class="fa fa-eye"></i> View </a></li>'.
                $buttons = 
                          '<li><a href="'.ADMIN_URL.'contest/contest_product_participate.php/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'&req=pending"><i class="fa fa-pencil-square-o"></i> Participate Product </a></li>';
                        
                $i++;
                
                if ($data->cover_image == '' || $data->cover_image == null) {
                    $cover_image = BASE_URL.'img/user-images/avatar.jpg';
                } else {
                    $cover_image = BASE_URL.'images/contest/thumb/'.$data->cover_image;
                }
                
                 $c['id'] = $i;
                 $c['contest_name'] =  $ajGenObj->NameById($data->contest_id,'contests','title');//$data->Brand
                 $c['seller'] =  $ajGenObj->NameById($data->seller_id,'users');//$data->Brand
                 $c['title'] = '<a href="'.ADMIN_URL.'contests/info/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'">'.$data->title.'</a>';
                 $c['description'] = ($data->description);
                 $c['product'] = '<a href="'.ADMIN_URL.'contest/contest_product_participate.php/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'">'.count(explode(",",$data->selected_product)).'</b>';
                 
                $c['added_on'] = date('d M Y', strtotime($data->added_on));
                $c['admin_status'] = $content;
              //  contest_product_participate.php
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
                
                $buttons = '<li><a href="'.ADMIN_URL.'contest/contest_product_participate.php/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'&req=participate&cid='.$njEncryptionObj->safe_b64encode($data->contest_id).'"><i class="fa fa-pencil-square-o"></i> Participate Product </a></li>'.
                        '<li><a href="'.ADMIN_URL.'contests/product_votes_contest/?session_uid='.$njEncryptionObj->safe_b64encode($data->contest_id).'"><i class="fa fa-eye"></i> View Product Votes</a></li>'.
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
         $id =   $_GET['b'];
        $table2 = "contest_Votes";
        $condition = "as c INNER JOIN products as p ON c.product_id = p.product_id where contest_id='".$id."' group by c.product_id order by NumberOfVotes desc ";
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
                 $c['products'] =  '<b>'.$data->product_name.'</b>';
                 $c['brand'] =  $ajGenObj->NameById($data->Brand,'brands');//$data->Brand
                 $c['type'] = ($data->product_type);
                 $c['sku'] = ($data->SKU);
                 $c['votes'] = '<i class="fa fa-star" aria-hidden="true"></i> <b>'.($data->NumberOfVotes).'</b>';
             
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