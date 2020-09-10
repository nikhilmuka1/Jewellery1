<?php
include '../../page_fragment/define.php'; 
include '../../page_fragment/topScript.php';
$mode = $_GET['a'];
switch ($mode) {

    case 'list':
        
        $table = "users";
        $condition = " 1 and roll_type = '1' order by id desc";
        $result = $dbComObj->viewData($conn, $table, "*", $condition);
        $num = $dbComObj->num_rows($result);
        if ($num > 0) 
        {
            $i = 0;
            while($data = $dbComObj->fetch_object($result))
            {
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
                  if($data->roll_type == 1){ $roll_type = 'Buyer'; }else{  $roll_type = 'Seller';}
                $buttons = '<li><a href="'.ADMIN_URL.'users/new-user/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'"><i class="fa fa-edit"></i> Edit </a></li>'
                        . '<li><a href="javascript:;" onclick="return UserDelete('.$data->id.');"><i class="fa fa-trash-o"></i> Delete </a></li>
                <li><a href="javascript:;" onclick="return UserManageByAdmin('.$data->id.','.$data->status.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>';
                $i++;
                
                if ($data->image == '' || $data->image == null) {
                    $profileImage = BASE_URL.'img/user-images/avatar.jpg';
                } else {
                    $profileImage = BASE_URL.'images/user/'.$data->image;
                }
                
                $c['id'] = $i;
                $c['email'] = $data->email;
                $c['name'] = $data->name;
                $c['profile'] = '<img src="'.$profileImage.'" style="width: 50px;border: 1px solid #ccc;border-radius: 5px;padding: 1px;"/>';
                 $c['roll_type'] = $roll_type;
                $c['added_on'] = date('d M Y', strtotime($data->added_on));
                $c['status'] = $content;
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
        else
        {
            echo "No record found";
        }
    break;
    //Sellerlist
     case 'Sellerlist':
        
        $table = "users";
        $condition = " 1 and roll_type = '2' ORDER BY approved ASC , id DESC  ";
        $result = $dbComObj->viewData($conn, $table, "*", $condition);
        $num = $dbComObj->num_rows($result);
        if ($num > 0) 
        {   
            $i = 0;
            while($data = $dbComObj->fetch_object($result))
            {
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
                  if($data->approved == 1)
                  {
                        $texttapproved = 'Decline';
                        $contentapproved = '<span class="label label-sm label-success"> Approved </span>';
                  }
                  else
                  {
                        $texttapproved = 'Approved';
                        $contentapproved = '<span class="label label-sm label-danger">Decline </span>';
                  }
                  if($data->roll_type == 1){ $roll_type = 'Buyer'; }else{  $roll_type = 'Seller';}
                $buttons = '<li><a href="'.ADMIN_URL.'seller/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'"><i class="fa fa-eye"></i> View </a></li>'
                        . '<li><a href="'.ADMIN_URL.'users/new-user/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'&type=sellers"><i class="fa fa-edit"></i> Edit </a></li>'
                        . '<li><a href="javascript:;" onclick="return UserDelete('.$data->id.');"><i class="fa fa-trash-o"></i> Delete </a></li>
                <li><a href="javascript:;" onclick="return UserManageByAdmin('.$data->id.','.$data->status.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>'
                        . '<li><a href="javascript:;" onclick="return UserManageByAdmin1('.$data->id.','.$data->approved.');"><i class="fa fa-ban"></i> '.$texttapproved.' </a></li>';
                $i++;
                
                if ($data->image == '' || $data->image == null) {
                    $profileImage = BASE_URL.'img/user-images/avatar.jpg';
                } else {
                    $profileImage = BASE_URL.'images/user/'.$data->image;
                }
                
                $c['id'] = $i;
                $c['email'] = $data->email;
                $c['name'] = '<a href="'.ADMIN_URL.'seller/?session_uid='.$njEncryptionObj->safe_b64encode($data->id).'">'.$data->name.'</a>';
                $c['profile'] = '<img src="'.$profileImage.'" style="width: 50px;border: 1px solid #ccc;border-radius: 5px;padding: 1px;"/>';
                 $c['roll_type'] = $roll_type;
                $c['added_on'] = date('d M Y', strtotime($data->added_on));
                $c['status'] = $content;
                 $c['approved'] = $contentapproved;
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
        else
        {
            echo "No record found";
        }
    break;
    case 'sub_category':
    $getGenres = mysql_query("select * from `sub_category` where 1");
    if(mysql_num_rows($getGenres) > 0)
        {
            while($data = mysql_fetch_object($getGenres))
            {
                $getCategory = mysql_fetch_object(mysql_query("select * from `category` where 1 and id = '".$data->category_id."'"));
                $buttons = '<li><a href="add_sub_category.php?a='.$data->id.'#category"><i class="fa fa-edit"></i> Edit </a></li>'
                        . '<li><a href="javascript:;" onclick="return SubCategoryDelete('.$data->id.');"><i class="fa fa-trash-o"></i> Delete </a></li>';
                $i++;
                $c['id'] = $data->id;
                $c['name'] = base64_decode($data->name);
                $c['description'] = base64_decode($data->description);
                $c['category'] = base64_decode($getCategory->name);
                $c['cover_image'] = '<img style="width: 100px;" src="'.image_PATH.$data->cover_image.'" />';
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
    break;
    
    
    case 'Business':
        $getVendor = mysql_query("select * from `business` where 1 ");
        if(mysql_num_rows($getVendor) > 0)
        {
            while($data = mysql_fetch_object($getVendor))
            {
                if($data->status == 1){$textt = 'De-active';$content = '<span class="label label-sm label-success"> Active </span>';}
                    else{$textt = 'Active';$content = '<span class="label label-sm label-danger"> De-active </span>';}
                  
                if($data->approve_admin == '1'){$approval = '<span class="label label-sm label-success"> Approved </span>';$statusTitle='Un-approve';$st_color = 'red';}
                    else{$approval = '<span class="label label-sm label-info"> Un-approve </span>';$statusTitle='Approve';$st_color = 'green';}
        
                $buttons = '<li><a href="vendor_business_update.php?a='.$data->id.'#vendor"><i class="fa fa-edit"></i> Edit Business </a></li>'
        . '<li><a href="javascript:;" onclick="return BusinessDelete('.$data->id.');"><i class="fa fa-trash-o"></i> Delete </a></li>
        <li><a href="javascript:;" onclick="return BusinessManageByAdmin('.$data->id.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>';
                
                $i++;
                $c['id'] = $data->id;
                $c['name'] = '<a href="vendor_business_portfolio.php?a='.$data->id.'">'.base64_decode($data->business_name).'</a>';
                $c['email'] = $data->business_email;
                $c['phone'] = $data->business_phone;
                $c['address'] = base64_decode($data->business_address);
                $c['state'] = $data->business_state;
                $c['country'] = $data->business_country;
                $c['status'] = $content;
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
    break;

    case 'BusinessMenu':
        $getVendor = mysql_query("select * from `business` where 1 ");
        if(mysql_num_rows($getVendor) > 0)
        {
            while($data = mysql_fetch_object($getVendor))
            {
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

                $buttons = '<li><a href="manage_food_resturant.php?a='.$data->id.'#food"><i class="icon-diamond"></i> Linked Menus </a></li>';
        
                  
                $i++;
                $c['id'] = $data->id;
                $c['name'] = '<a href="vendor_business_portfolio.php?a='.$data->id.'">'.base64_decode($data->business_name).'</a>';
                $c['email'] = $data->business_email;
                $c['phone'] = $data->business_phone;
                $c['address'] = base64_decode($data->business_address);
                $c['state'] = $data->business_state;
                $c['country'] = $data->business_country;
                $c['status'] = $content;
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
    break;
    
    
     case 'userList':
        $getUsers = mysql_query("select * from `web_register` where 1 AND type='7' order by id");
        if(mysql_num_rows($getUsers) > 0)
        {
            while($data = mysql_fetch_object($getUsers))
            {
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
                $buttons = '<li><a href="javascript:;" onclick="return userDelete('.$data->id.');"><i class="fa fa-trash-o"></i> Delete </a></li>
                <li><a href="javascript:;" onclick="return userManageByAdmin('.$data->id.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>';
                
                $getUserOrder = mysql_query("SELECT * FROM order_detail WHERE user_id = '".$data->id."'");
                $totalOrders = mysql_num_rows($getUserOrder);
                
                $i++;
                $c['id'] = $data->id;
                $c['name'] = $data->name;
                if($data->mobile!=''){
                    $c['contact'] = $data->mobile;
                }else{
                    $c['contact'] = '';
                }
                $c['totalNum'] = $totalOrders;
                $c['added_on'] = date('d M Y', strtotime($data->addedon));
                $c['status'] = $content;
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
    break;
    // Guest user List
    case 'guestUserList':
        $getUsers = mysql_query("select * from `web_register` where 1 AND type='9' order by id");
        if(mysql_num_rows($getUsers) > 0)
        {
            while($data = mysql_fetch_object($getUsers))
            {
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
                $buttons = '<li><a href="javascript:;" onclick="return userDelete('.$data->id.');"><i class="fa fa-trash-o"></i> Delete </a></li>
                <li><a href="javascript:;" onclick="return userManageByAdmin('.$data->id.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>';
                
                $getUserOrder = mysql_query("SELECT * FROM order_detail WHERE user_id = '".$data->id."'");
                $totalOrders = mysql_num_rows($getUserOrder);
                
                $i++;
                $c['id'] = $data->id;
                $c['name'] = $data->name;
                if($data->mobile!=''){
                    $c['contact'] = $data->mobile;
                }else{
                    $c['contact'] = '';
                }
                $c['email'] = $data->email;
                $c['totalNum'] = $totalOrders;
                $c['added_on'] = date('d M Y', strtotime($data->addedon));
                $c['status'] = $content;
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
    break;
    // User OTP List
    case 'userOTPList':
        $getUsers = mysql_query("select * from `user` where 1 AND type='7' order by id");
        if(mysql_num_rows($getUsers) > 0)
        {
            while($data = mysql_fetch_object($getUsers))
            {
                if($data->otp_status == 1)
                  {
                        $textt = 'OTP Matched';
                        $content = '<span class="label label-sm label-success"> OTP Matched </span>';
                  }
                  else
                  {
                        $textt = 'OTP Not Matched';
                        $content = '<span class="label label-sm label-danger"> OTP Not Matched </span>';
                  }
                /*$buttons = '<li><a href="javascript:;" onclick="return userDelete('.$data->id.');"><i class="fa fa-trash-o"></i> Delete </a></li>
                <li><a href="javascript:;" onclick="return userManageByAdmin('.$data->id.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>';*/
                
              
                
                $i++;
                $c['id'] = $data->id;
                $c['name'] = $data->name;
                if($data->mobile!=''){
                    $c['contact'] = $data->mobile;
                }else{
                    $c['contact'] = '';
                }
                $c['Email'] = $data->email_id;
                $c['otp'] = $data->otp_number;
                $c['contact'] = $data->mobile;
                $c['added_on'] = date('d M Y', strtotime($data->added_on));
                $c['status'] = $content;
               // $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
    break;
    
    case 'ordersList':
        $getOrders = mysql_query("select * from `order_detail` where 1 ORDER BY id DESC");
        if(mysql_num_rows($getOrders) > 0)
        {
            while($data = mysql_fetch_object($getOrders))
            {
                if($data->status == 100)
                {
                    $textt = 'Accepted';
                    $content = '<span class="label label-sm label-info"> Booked </span>';
                }
                elseif($data->status == 200)
                {
                    $textt = 'Delivered';
                    $content = '<span class="label label-sm label-success"> Accepted </span>';
                }
                elseif($data->status == 300)
                {                      
                    //$textt = 'Delivered';
                    $content = '<span class="label label-sm label-success"> Delivered </span>';
                }else{
                    $content = '<span class="label label-sm label-danger"> Cancled </span>'; 
                }
                $order_view  = 'order_view.php?id='.$data->id;
                
                $buttons = '<li><a href="'.$order_view.'" ><i class="icon-diamond"></i> View </a></li>';
                if($data->status =='100'){
                $buttons .= '<li><a href="javascript:void();" onclick="return orderCancel('.$data->id.');"><i class="fa fa-trash-o"></i> Cancel </a></li>';
                }
                if($data->status !='300'){
                $buttons .= '<li><a href="javascript:;" onclick="return orderManageByAdmin('.$data->id.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>';
                }
                
                $getOrderMenu = mysql_fetch_object(mysql_query("SELECT business_id FROM order_menus_detail WHERE order_id = '".$data->id."' GROUP BY order_id"));
                
                
                $getUserName = mysql_fetch_object(mysql_query("SELECT name,id FROM web_register WHERE id = '".$data->user_id."'"));
                $getBussName1 = mysql_fetch_object(mysql_query("SELECT business_name,id FROM business WHERE id = '".$getOrderMenu->business_id."'"));
                $getBussName2 = mysql_fetch_object(mysql_query("SELECT business_name,id FROM business WHERE id = '".$data->business_id2."'"));
                
                
                if($data->business_id2){$bus_name2 =  ','.base64_decode($getBussName2->business_name);}
                $address = base64_decode($data->address);
                $add_dec = substr($address, 0, 100);
                
                $i++;
                $c['idd'] = $data->id;
                $c['name'] = $getUserName->name;
                $c['business_name'] = base64_decode($getBussName1->business_name);
                $c['amount'] = $data->amount.'  <i class="fa fa-rupee"></i>';
                $c['address'] = $add_dec;
                $c['contact'] = $data->mobile_number;
                $c['added_on'] = date('d M Y h:i:A', strtotime($data->added_on));
                $c['status'] = $content;
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
    break;
    // Today Order List by AK
    case 'ordersListToday':
        $todayDate = date('Y-m-d');
        $getOrders = mysql_query("select * from `order_detail` where 1 AND `added_on` LIKE  '%$todayDate%' ORDER BY id DESC");
        if(mysql_num_rows($getOrders) > 0)
        {
            while($data = mysql_fetch_object($getOrders))
            {
                if($data->status == 100)
                {
                    $textt = 'Accepted';
                    $content = '<span class="label label-sm label-info"> Booked </span>';
                }
                elseif($data->status == 200)
                {
                    $textt = 'Delivered';
                    $content = '<span class="label label-sm label-success"> Accepted </span>';
                }
                elseif($data->status == 300)
                {                      
                    //$textt = 'Delivered';
                    $content = '<span class="label label-sm label-success"> Delivered </span>';
                }else{
                    $content = '<span class="label label-sm label-danger"> Cancled </span>'; 
                }
                $order_view  = 'order_view.php?id='.$data->id;
                
                $buttons = '<li><a href="'.$order_view.'" ><i class="icon-diamond"></i> View </a></li>';
                if($data->status =='100'){
                $buttons .= '<li><a href="javascript:void();" onclick="return orderCancel('.$data->id.');"><i class="fa fa-trash-o"></i> Cancel </a></li>';
                }
                if($data->status !='300'){
                $buttons .= '<li><a href="javascript:;" onclick="return orderManageByAdmin('.$data->id.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>';
                }
                
                $getOrderMenu = mysql_fetch_object(mysql_query("SELECT business_id FROM order_menus_detail WHERE order_id = '".$data->id."' GROUP BY order_id"));
                
                
                $getUserName = mysql_fetch_object(mysql_query("SELECT name,id FROM web_register WHERE id = '".$data->user_id."'"));
                $getBussName1 = mysql_fetch_object(mysql_query("SELECT business_name,id FROM business WHERE id = '".$getOrderMenu->business_id."'"));
                $getBussName2 = mysql_fetch_object(mysql_query("SELECT business_name,id FROM business WHERE id = '".$data->business_id2."'"));
                
                
                if($data->business_id2){$bus_name2 =  ','.base64_decode($getBussName2->business_name);}
                $address = base64_decode($data->address);
                $add_dec = substr($address, 0, 100);
                
                $i++;
                $c['idd'] = $data->id;
                $c['name'] = $getUserName->name;
                $c['business_name'] = base64_decode($getBussName1->business_name);
                $c['amount'] = $data->amount.'  <i class="fa fa-rupee"></i>';
                $c['address'] = $add_dec;
                $c['contact'] = $data->mobile_number;
                $c['added_on'] = date('d M Y h:i:A', strtotime($data->added_on));
                $c['status'] = $content;
                $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;">'.$buttons.'</ul>';

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
    break;
    case 'inquiresList':
        $getInquiries = mysql_query("select * from `inquiry_detail` where 1 order by id");
        if(mysql_num_rows($getInquiries) > 0)
        {
            while($data = mysql_fetch_object($getInquiries))
            {
               
                
                
                $i++;
                $c['id'] = $data->id;
                $c['name'] = $data->name;
                $c['email'] = $data->email;;
                $c['contact'] = $data->contact;
                $comment = base64_decode($data->comment);
                $commentss = substr($comment, 0, 100);
                $c['message'] = $commentss;
                $c['added_on'] = date('d M Y', strtotime($data->added_on));
                

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
    break;
    case 'slider':
        $getSlider = mysql_query("select * from `home_page_slider` where 1");
        if(mysql_num_rows($getSlider) > 0)
        {
            while($data = mysql_fetch_object($getSlider))
            {
                $i++;
                $c['id'] = $data->id;
                $c['title1'] = base64_decode($data->title_1);
                $c['title2'] = base64_decode($data->title_2);
                $c['image1'] = '<img src ="'.image_PATH.$data->image_1.'" width="100px" height="100px"/>';
                $c['title21'] = base64_decode($data->title_21);
                $c['title22'] = base64_decode($data->title_22);;
                $c['image2'] = '<img src ="'.image_PATH.$data->image_2.'" width="100px" height="100px"/>';
                $c['added_on'] = date('d M Y', strtotime($data->added_on));             

                $nj[] = $c;
            }
            echo json_encode($nj);
        }
    break;
    
}
?>