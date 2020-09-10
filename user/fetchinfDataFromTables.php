<?php
include('../page_fragment/define.php');
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
include ('../page_fragment/njEncription.php');
include ('../page_fragment/ajCategoryView.php');
include ('../page_fragment/ajGeneral.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$njFileObj = new njFile();
$ajGenObj = new ajGeneral();
$ajCategoryViewObj = new ajCategoryView();
$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect();
$mode = $_REQUEST['a'];
$login_id = "";
if ($_SESSION) {
    if (isset($_SESSION['user_id'])) {
        $login_id = $_SESSION['user_id'];
        $login_name = $_SESSION['user_name'];
    }
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $login_name = $_SESSION['DH_seller_name'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
    $login_name = $njGenObj->removeSpecialChar($login_name);
}

//echo $login_id;
if ($mode == 'upload_prescription') { // only Working upload_prescription
    $result = $dbComObj->viewData($conn, "upload_prescription", "*", "1 and `user_id`='" . $login_id . "' order by id DESC");
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        $i = 0;
        while ($data = $dbComObj->fetch_assoc($result)) {
            $i++;
            if ($data['status'] == '1') {
                $status = '<span class="label label-sm label-success">Complete</span>';
            } elseif ($data['status'] == '0') {
                $status = '<span class="label label-sm label-warning">Pending</span>';
            } elseif ($data['status'] == '1') {
                $status = '<span class="label label-sm label-danger">Reject</span>';
            }

            if ($data['location'] == '1') {
                $location = "At Home";
            } else {
                $location = "At Shop";
            }
            $c['id'] = $i;
            $c['address'] = html_entity_decode(stripslashes($data['address']));
            $c['image'] = '<a href="' . BASE_URL . 'images/upload_prescription/' . $data['image'] . '" target="_blank"><img src="' . BASE_URL . 'images/upload_prescription/thumb/' . $data['image'] . '" style="width: 50%;"/></a>';
            $c['location'] = $location;
            $c['payment'] = 'Cash';

            $c['status'] = $status;
            $c['addedOn'] = date("F j, Y g:i a", strtotime($data['added_on']));
            $c['action'] = '<div class="actions"><div class="btn-group"><a class="btn green-haze btn-outline btn-circle btn-sm" href="' . BASE_URL . 'category/?a=' . $data['id'] . '&b=' . $data['status'] . '" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <i class="fa fa-cogs"></i><i class="fa fa-angle-down"></i></a><ul class="dropdown-menu" style="min-width: 100px !important;"><li><a href="' . BASE_URL . 'category/add-category/?a=' . $data['id'] . '&mode=' . base64_encode('editCategory') . '"><i class="fa fa-file-text-o"></i> Edit </a></li><li><a href="javascript:0" onclick="return deleteCategory(' . $data['id'] . ');"><i class="fa fa-file-text-o"></i> Delete </a></li></ul></div>';
            $nj[] = $c;
        }
    } else {
        $nj = 'No data found.';
    }
    echo json_encode($nj);
}
else if ($mode == 'orders') { // only Working bookings
    $result = $dbComObj->viewData($conn, "`orders`", "*", "1 and `user_id`='" . $login_id . "' order by id DESC");
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        $i = 0;
        while ($data = $dbComObj->fetch_assoc($result)) {
            $i++;
            if ($data['status'] == '1') {
                $action = '---';
                $status = '<span class="label label-sm label-success" style="padding: 5px !important;">Complete</span>';
            } elseif ($data['status'] == '0') {
                $action = '<select name="" onchange="return changeStatus(this.value,' . $data['order_id'] . ');"><option> Manage Prescrition</option><option value="1">Order Complete</option><option value="7">Order Reject</option></select>';
                $status = '<span class="label label-sm label-warning" style="padding: 5px !important;">Pending</span>';
            } else {
                $action = '<select order_id="" name="" onchange="return changeStatus(this.value,' . $data['order_id'] . ');"><option> Manage Prescrition</option><option value="1">Order Complete</option><option value="7">Order Reject</option></select>';
                $status = '<span class="label label-sm label-danger" style="padding: 5px !important;">Reject</span>';
            }
            if ($data['paid'] == '1') {
                $textt = 'Done';
                $paid = '<span class="label label-xs label-success" style="padding: 5px !important;">Done</span>';
            } else {
                $textt = 'Pending';
                $paid = '<span class="label label-xs label-warning" style="padding: 5px !important;">Pending</span>';
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
            $dataUser = $dbComObj->fetch_assoc($dbComObj->viewData($conn, "users", "*", "`id` = '" . $data['user_id'] . "'"));

            $c['id'] = $i;
            //  $c['order_no'] = $data['order_no'];
            $c['order_no'] = '<u id="ordernoA'.$data['id'].'"><a href="' . BASE_URL . 'user/' . $login_name . '/my-order/details/?a=' . $njEncryptionObj->safe_b64encode($data['id']) . '&mode=' . base64_encode('view') . '">' . $data['order_no'] . '</a></u>';

            $c['payment_type'] = $data['payment_type'];
            $c['order_date'] = date("F j Y g:i a", strtotime($data['added_on']));
            $c['paid'] = $status;
            $c['order_status'] ='<div id="orderajstatus'.$data['id'].'">'. $order_status.'<div>';
            $c['location'] = $location;
            $c['address'] = $address; 
            $c['product_name'] = $data['product_name'];
            $c['ammount'] = CURRENCY_SYMBOL . number_format($data['total_price'], 2);
            $c['quantity'] = '<div id="orderQTY'.$data['id'].'">'.$data['quantity'].'</div>';
//      $c['image'] = $img;
            $c['payment'] = 'Cash';
            $c['name'] = $dataUser['name'];
            $c['status'] = $status;
            $c['via'] = $via;
            $c['addedOn'] = date("M j, Y g:i a", strtotime($data['added_on']));
             if ($data['order_status'] != '3' && $data['order_status'] != '1') {
            $action = ' <input type="hidden"  id="sidA'.$data['id'].'"  value="'.$data['seller_id'].'">'
                    . ' <input type="hidden"  id="pidA'.$data['id'].'"  value="'.$data['product_id'].'">'
                    .'  <div id="orderajbtn'.$data['id'].'"><a data-toggle="modal" data-id="'. $data['id'].'" title="Add this item" class="open-cancelDialog btn btn-primary" href="#ORderCancelDialog">  Order Cancel</a></div>'
                          // . '<div id="orderajbtn'.$data['id'].'"><a href="javascript:;" onclick="return OrderCancel(' . $data['id'] . ','.$data['product_id'].')" class="btn btn-danger"> Order Cancel </a></div>'
                   ;
             }else{
                 $action ='';
             }
            $c['action'] = $action;
//           $c['view'] = '<a href="' . BASE_URL . 'user/' . $login_name . '/my-order/details/?a=' . $njEncryptionObj->safe_b64encode($data['id']) . '&mode=' . base64_encode('view') . '">View Details</a>';
            // $c['action'] = $action;
            $nj[] = $c;
        }
    } else {
        $nj = 'No data found.';
    }
    echo json_encode($nj);
} else {
    
}
?>
