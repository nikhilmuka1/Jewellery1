<?php

include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$mode = $_REQUEST['a'];
   $SID =$_GET['SID'];
$seller_id = $njEncryptionObj->safe_b64decode($SID);
if ($mode == 'orders') { // only Working bookings
   
   $condition = " `seller_id` = '" . $seller_id . "' ORDER BY `id` DESC ";
  $result = $dbComObj->viewData($conn,"`orders`", "*",$condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        $i = 0;
    while ($data = $dbComObj->fetch_assoc($result))
    {
            // print_r($data); die;

            $i++;

            if ($data['paid'] == '1') {
                $textt = 'Done';
                $status = '<span class="label label-sm label-success">Done</span>';
            } else {
                $textt = 'Pending';
                $status = '<span class="label label-sm label-info">Pending</span>';
            }

            if ($data['order_status'] == '1') {
                $ordertext = 'delivered';
                $order_status = '<span class="label label-sm label-success"> Delivered</span>';
            } 
            else if ($data['order_status'] == '2') {
                $ordertext = 'Rejected';
                $order_status = '<span class="label label-sm label-danger"> Rejected</span>';
            }else {
                $ordertext = 'Pending';
                $order_status = '<span class="label label-sm label-info">Pending</span>';
            }
           $viewaction ='<a href="' . ADMIN_URL . 'order/details/?a='. $njEncryptionObj->safe_b64encode($data['id']) . '&mode=' . base64_encode('view') . '">';
            $c['id'] = $i;
            $c['order_no'] = '<a href="'. ADMIN_URL . 'order/details/?a='.$njEncryptionObj->safe_b64encode($data['id']).'&mode='. base64_encode('view').'">'.$data['order_no'].'</a>';
            $c['user_id'] = $ajGenObj->NameById($data['user_id'], '`users`', 'name'); // $data['user_id']; 
            $c['payment_type'] = $data['payment_type'];
            $c['product_name'] = $data['product_name'];
              $c['quantity'] = $data['quantity'];
            $c['ammount'] = CURRENCY_SYMBOL.number_format($data['total_price'], 2);
            $c['order_date'] = date("M j Y g:i a", strtotime($data['added_on']));
            $c['paid'] = $status; 
            $c['order_status'] = $order_status;
              $action = '<select order_id="" name="order_status"  class="form-control" style="width: 140px;" onchange="return changeStatus(this.value,'.$data['id'].');"><option> Manage Order</option><option value="1">Order Complete</option><option value="2">Order Reject</option><option value="0">Order Pending</option></select>';
        
            $c['action'] = $action;
            $nj[] = $c;
        }
    } else {
        $nj = 'No data found.';
    }
    echo json_encode($nj);
} 
if ($mode == 'products') { // only Working bookings
        
       $conditionP = " `delete` = '0' and added_by = '".$seller_id."' and  added_user_type='Seller' order by product_id desc ";
        $resultP = $dbComObj->viewData($conn, "products", "*", $conditionP);
        $numP = $dbComObj->num_rows($resultP);
        if ($numP > 0) 
        {
            $i = 0;
            while($data = $dbComObj->fetch_object($resultP))
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
                
                $buttons = '<li><a href="'.ADMIN_URL.'products/new-product/?session_uid='.$njEncryptionObj->safe_b64encode($data->product_id).'&seller='.$njEncryptionObj->safe_b64encode($seller_id).'"><i class="fa fa-edit"></i> Edit </a></li>'
                        . '<li><a href="javascript:;" onclick="return ProductDelete('.$data->product_id.');"><i class="fa fa-trash-o"></i> Delete </a></li>
                <li><a href="javascript:;" onclick="return ProductManage('.$data->product_id.','.$data->status.');"><i class="fa fa-ban"></i> '.$textt.' </a></li>';
                $i++;
                
                if ($data->image_certificate == '' || $data->image_certificate == null) {
                    $profileImage = BASE_URL.'user-images/avatar.jpg';
                } else {
                    $profileImage = BASE_URL.'images/user/'.$data->image_certificate;
                }
                 if($data->is_in_stock == 1)
                  {
                        $textt_stock = 'In Stock';
                        $content_stock = '<span class="label label-sm label-success"> In Stock </span>';
                  }
                  else
                  {
                        $textt_stock = 'Out of Stock';
                        $content_stock = '<span class="label label-sm label-danger"> Out of Stock </span>';
                  }
                   if($data->price) $data_price=  '$ '.($data->price);else  $data_price= '-';
                $c['product_id'] = '#'.$data->product_id;
                $c['id'] = $i;
                $c['SKU'] = $data->SKU;
                $c['product_name'] = $data->product_name;
               // $c['category'] = $ajCategoryViewObj->CategoryNameById($data->category_id);
                $c['category'] = $data->category_id;
                $c['Brand'] = $ajGenObj->NameById($data->Brand,'brands');//$data->Brand;
                $c['product_type'] = $data->product_type;
                $c['quantity'] = $data->inv_qty;
                $c['unit_price'] = $data->unit_price;
               // $c['price'] = '$ '.number_format($data->price, 2);
                  $c['price'] = $data_price;
                $c['resizable'] = $data->resizable;
                $c['measurement_size'] = $data->measurement_size;
                $c['stone'] = $data->stone;
                $c['profile'] = '<img src="'.$profileImage.'" style="width: 50px;border: 1px solid #ccc;border-radius: 5px;padding: 1px;"/>';
                 $c['is_available'] = $textt_stock;
               
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
}
else {
    
    
}
?>