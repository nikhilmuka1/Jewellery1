<?php

include '../../page_fragment/define.php';
include '../../page_fragment/topScript.php';
$mode = $_REQUEST['a'];

$seller_id = $_SESSION['DH_seller_id'];

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
                $order_status = '<span class="label label-xs label-success "> Delivered</span>';
            } else if ($data['order_status'] == '2') {
                $ordertext = 'Rejected';
                $order_status = '<span class="label label-sm label-danger"> Rejected</span>';
            } else if ($data['order_status'] == '3') {
                $ordertext = 'Cancel';
                $order_status = '<span class="label label-sm label-danger"> Cancel</span>';
            } else {
                $ordertext = 'Pending';
                $order_status = '<span class="label label-sm label-info">Pending</span>';
            }
           $viewaction ='<a href="' . SELLER_URL . 'order/details/?a='. $njEncryptionObj->safe_b64encode($data['id']) . '&mode=' . base64_encode('view') . '">';
            $c['id'] = $i;
            $c['order_no'] = '<a href="'. SELLER_URL . 'order/details/?a='.$njEncryptionObj->safe_b64encode($data['id']).'&mode='. base64_encode('view').'">'.$data['order_no'].'</a>';
            $c['user_id'] = $ajGenObj->NameById($data['user_id'], '`users`', 'name'); // $data['user_id']; 
            $c['payment_type'] = $data['payment_type'];
            $c['product_name'] = $data['product_name'];
              $c['quantity'] = $data['quantity'];
            $c['ammount'] = CURRENCY_SYMBOL.number_format($data['total_price'], 2);
            $c['order_date'] = date("M j Y g:i a", strtotime($data['added_on']));
            $c['paid'] = $status; 
            $c['order_status'] = $order_status;
            if ($data['order_status'] != '3') {
              $action = '<select order_id="" name="order_status"  class="form-control" style="width: 140px;" onchange="return changeStatus(this.value,'.$data['id'].');"><option> Manage Order</option><option value="1">Order Complete</option><option value="2">Order Reject</option><option value="0">Order Pending</option></select>';
            }else {
                $action ='';
            } 
            $c['action'] = $action;
            $nj[] = $c;
        }
    } else {
        $nj = 'No data found.';
    }
    echo json_encode($nj);
} else {
    
}
?>