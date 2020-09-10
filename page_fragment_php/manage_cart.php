<div class="mini-cart">
    <?php
    define('BASE_URLLL','http://www.drugathome.co/');
    $totalCount = 0;
    if (isset($_COOKIE['cartItems']) && !empty($_COOKIE['cartItems'])) {
        if (isset($_COOKIE['cartItems']) && !empty($_COOKIE['cartItems'])) {
            $cartItems1 = $_COOKIE['cartItems'];
            $cartItems = json_decode($cartItems1);
            $njTotal = '';
            foreach ($cartItems as $key => $cartItem1) {
                $cartItem = $cartItem1->productData;
                if(!isset($cartItem->discount))
                {
                    $actualll = $cartItem->price;
                    $actualllQ = $cartItem->price * $cartItem->qty;
                }
                else
                {
                    $offer = $cartItem->price * $cartItem->discount / 100;
                    $actualll = $cartItem->price - $offer;
                    $actualllQ = $actualll * $cartItem->qty;
                }
                $njTotal += $actualllQ; //$cartItem->price;
                $totalCount++;
            }
        }
        ?>
        <div class="basket"> <a href="javascript:0"><span> <?php echo $totalCount; ?> </span></a> </div>
        <div class="fl-mini-cart-content" style="display: none;">
            <div class="block-subtitle">
                <div class="top-subtotal"><?php echo $totalCount; ?> Items and Total Amount <span class="price"><em class="icon-rupee"><i class="fa fa-rupee" aria-hidden="true"></i> </em> <?php echo $njTotal; ?></span> </div>
            </div>
            <ul class="mini-products-list" id="cart-sidebar">
                <?php
                $total = 0;
                if (isset($_COOKIE['cartItems']) && !empty($_COOKIE['cartItems'])) {
                    $cartItems1 = $_COOKIE['cartItems'];
                    $cartItems = json_decode($cartItems1);
                    foreach ($cartItems as $key => $cartItem1) {
                       // print_r($cartItem1);
                        $cartItem = $cartItem1->productData;
                        
                        if(!isset($cartItem->discount))
                        {
                            $actualll = $cartItem->price;
                            $actualllQ = $cartItem->price * $cartItem->qty;
                        }
                        else
                        {
                            $offer = $cartItem->price * $cartItem->discount / 100;
                            $actualll = $cartItem->price - $offer;
                            $actualllQ = $actualll * $cartItem->qty;
                        }
                        ?>
                        <li class="item first">
                            <div class="item-inner">
                            <div class="ps1">
                                <a class="product-image" title="<?php echo $cartItem->productName; ?>" href="javascript:0" onclick="removerCartItem('<?php echo $cartItem->productId;?>');"><i class="fa fa-times-circle-o fa-3" aria-hidden="true" style="font-size:20px;color: #f25a5a;"></i> </a>
                                </div>
                                <div class="ps2">
                                <img alt="<?php echo $cartItem->productName; ?>" style="width: 60px;border: 1px solid #ccc;padding: 1px;margin-top: -20px;" src="<?php echo $cartItem->productImage; ?>">
                                </div>
                                <div class="ps3">
                                <div class="product-details" style="display: inline-block;margin: 0px 10px;max-width: 150px;">
                                    <div class="access"><a class="btn-remove1" title="Remove This Item" href="javascript:0" onclick="removerCartItem('<?php echo $cartItem->productId; ?>');">Remove</a> <a class="btn-edit" title="Edit item" href="#"><i class="icon-pencil"></i><span class="hidden">Edit item</span></a> </div>
                                    <strong><?php echo $cartItem->qty; ?></strong> x <span class="price"><?php echo $actualll; ?></span>
                                    <p class="product-name"><a href="javascript:0"><?php echo $cartItem->productName; ?></a></p>
                                </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                    <?php }
                }
                ?>
            </ul>
            <div class="actions">
                <button class="btn-checkout" title="Checkout" type="button" onClick="window.location.href = '<?php echo BASE_URLLL; ?>checkout/';"><span>Checkout</span></button>
            </div>
        </div>
    <?php } else { ?>
        <div class="basket"> <a href="javascript:0"><span> <?php echo $totalCount; ?> </span></a> </div>
<?php } ?>
</div>
