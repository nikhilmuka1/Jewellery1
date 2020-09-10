<?php
require_once '../page_fragment/define.php';
include ('../page_fragment/dbConnect.php');
include ('../page_fragment/dbGeneral.php');
include ('../page_fragment/njGeneral.php');
include ('../page_fragment/njFile.php');
include ('../page_fragment/njEncription.php');
$dbConObj = new dbConnect();
$dbComObj = new dbGeneral();
$njGenObj = new njGeneral();
$njFileObj = new njFile();
$njEncryptionObj = new njEncryption();
$conn = $dbConObj->dbConnect();

$mode = "";
$requestData = array();
if(isset($_POST['mode'])) {
    $mode = base64_decode($_POST['mode']);
    unset($_POST['mode']);
    $requestData = $_POST;
} elseif(isset($_GET['mode'])) {
    $mode = base64_decode($_GET['mode']);
    unset($_GET['mode']);
    $requestData = $_GET;
}
$table = "company";
$i = 1;
//echo $mode;
if ($mode == "getProductData")
{
    $company_id = $_REQUEST['company_id'];
    $perPage = 15;
    $page = 1;
    if(!empty($_GET["page"])) {
        $page = $_GET["page"];
    }
    $start = ($page-1)*$perPage;
    if($start < 0) $start = 0;
    // $query =  $sql_query . " limit " . $start . "," . $perPage;
    $condition = "1 limit " . $start . "," . $perPage;
    if($company_id == '0')
    {
        $condition = "1 limit " . $start . "," . $perPage;
    }
    else
    {
        $condition = "1 and `company_id` = '".$company_id."' limit " . $start . "," . $perPage;
    }
    
    $result = $dbComObj->viewData($conn,"product", "*", $condition);
    $num = $dbComObj->num_rows($result);
    if ($num > 0) {
        
       $message = '';
       while($rows = $dbComObj->fetch_assoc($result))
       {
            $img = BASE_URL.'images/product/thumb/'.$rows['image'];
            $file_exists = checkRemoteFileNj($img);
            if ($file_exists == true) {
              $img = $img;
            } else {
              $img = BASE_URL.'img/medicine-icon-9.png';
            }
            $slug = $njGenObj->removeSpecialChar(trim($rows['name']));
            
            /* For Cart Function */
            $productData = array();
            $productData['productId'] = $rows['id'];
            $productData['slug'] = $slug;
            $productData['companyId'] = $rows['company_id'];
            $productData['sku_product'] = $rows['product_code'];
            $productData['short_description'] = $rows['short_description'];
            $productData['slug'] = $rows['slug'];
            $productData['productName'] = $rows['name'];
            $productData['productImage'] = $img;
            $productData['price'] = $rows['sale_price'];
            $productData['qty'] = '1';
            $productData1 = json_encode($productData);
            
            if($rows['discount'] == '0')
            {
                $pricetag = '<div class="content_price">
                    <span class="price product-price product-price-new"><i class="fa fa-rupee" aria-hidden="true"></i> '.$rows['sale_price'].'</span>
                    </div>';
            }
            else
            {
                $offer = $rows['sale_price'] * $rows['discount'] / 100;
                $actualll = $rows['sale_price'] - $offer;
                $pricetag = '<div class="content_price">
                    <div class="otc_drug_off"><div class="ofr-amt">'.$rows['discount'].'%</div><div class="ofr-txt">OFF</div></div>
                    <span class="price product-price product-price-new"><i class="fa fa-rupee" aria-hidden="true"></i> '.$actualll.'</span>
                    <span class="old-price product-price"><i class="fa fa-rupee" aria-hidden="true"></i> '.$rows['sale_price'].'</span>
                    </div>';
            }
                                                
            $arrayDataHere = "<input type='hidden' name='productData_".$rows['id']."' id='productData_".$rows['id']."' value='".$productData1."'/>";
           if($rows['type'] == '1'){$type='Prescriptions';}else{$type='Non-Prescriptions';}
           $message .= '<li class="ajax_block_product col-xs-6 col-md-3">'.$arrayDataHere.'<div class="product-container" itemscope itemtype="https://schema.org/Product"><div class="left-block"><div class="product-image-container"><div class="tmproductlistgallery rollover"><div class="tmproductlistgallery-images">'
                   . '<a class="cover-image" href="'.BASE_URL.$rows['id'].'/'.$slug.'/" title="'.$rows['name'].'" itemprop="url"><img class="img-responsive" src="'.$img.'" alt="'.$rows['name'].'" title="'.$rows['name'].'" style="width: 45%;"/></a></div></div><a class="new-box" href="#"><span class="new-label">'.$type.'</span></a></div></div><div class="right-block"><h5 itemprop="name"><a class="product-name" href="'.BASE_URL.$rows['id'].'/'.$slug.'/" title="Ricola Cough Suppressant" itemprop="url" ><span class="list-name">'.$rows['name'].'</span><span class="grid-name">'.$rows['name'].'</span></a></h5><p class="product-desc" itemprop="description"><span class="grid-desc">'.html_entity_decode(stripslashes(substr($rows['short_description'], 0, 75))).'...</span></p>'
                   . $pricetag
                   . '<div class="color-list-container">'
                   . '<div class="tovar_item_btns">
                    <div class="open-project-link"><a class="open-project tovar_view" href="'.BASE_URL.$rows['id'].'/'.$slug.'/" >quick view</a></div>
                    <a class="add_bag" href="javascript:void(0);" onclick="return addToCart('.$rows['id'].')"><i class="fa fa-shopping-cart"></i></a>
                    </div>' . '</div>'
                    . '<div class="product-flags"></div></div></div></li>';
       }
       echo $page.'|nj|'.$_GET["total_record"].'|nj|'.$message;
    }
    
} 

?>