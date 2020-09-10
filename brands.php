<?php
include './include/header.php';
//print_r($_SESSION);
?>
<style>

    .brandSortList {
        margin: 20px 0;
        border-bottom: 2px solid #000;
        min-height: 20px;
        padding-bottom: 10px;
        text-align: right;
        text-transform: uppercase;
        font-weight: bold;
        font-size: 13px;
        color: #000;
    }
    .brandSortList span {
        float: left;
    }
    .brandSortList a {
        color: #000;
        width: 25px;
        cursor: pointer;
        display: inline-block;
    }
    .brandsListing .title {
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
    }
    #brandsListing li {
        list-style: none;
    }#brandsListing li a {
        color: #000;
        font-size: 13px;
    }
    .brandSortList a.active {
        color: #34c5b5;
    }

</style>
<script>$(document).ready(function () {

        $(".filter-button").click(function () {
            var value = $(this).attr('data-filter');

            if (value == "all")
            {
                //$('.filter').removeClass('hidden');
                $('.filter').show('1000');
            }
            else
            {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                $(".filter").not('.' + value).hide('3000');
                $('.filter').filter('.' + value).show('3000');

            }
        });

        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");

    });
</script>
<!-- brands here -->

<div class="container" style="padding-bottom:35px;"> 
    <div class="row">
        <div class="col-md-12 contentRight">                                        
            <h4 class="brandTitle">Shop By Brand</h4>
            <?php
            //SELECT name, LEFT(name, 1) AS first_char FROM brands  WHERE UPPER(name) BETWEEN 'A' AND 'Z' OR name BETWEEN '0' AND '9' ORDER BY name
            $condition_brand = " `delete` = '0' and `status` = '1'  GROUP BY capital ASC ";
            // $colom= 'LOWER( LEFT( brands.name, 1 ) )  "capital", GROUP_CONCAT( brands.name SEPARATOR  "<br/>" )  "name_formatted" ';
            $colom = 'LOWER( LEFT( brands.name, 1 ) )  "capital", GROUP_CONCAT( brands.name,",", brands.id SEPARATOR  ";" )  "name_formatted" ';
            $result_brand = $dbComObj->viewData($conn, "brands", $colom, $condition_brand);
            $result_brand1 = $dbComObj->viewData($conn, "brands", $colom, $condition_brand);
            $num_brand = $dbComObj->num_rows($result_brand);
            /// SELECT UPPER( LEFT( brands.name, 1 ) )  "capital", GROUP_CONCAT( brands.name SEPARATOR  '<br />' )  "name_formatted"  FROM brands
            //GROUP BY capital ASC 

            if ($num_brand > 0) {
                ?> 
                <div class="brandSortList hidden-xs hidden-sm">
                    <span>Top Brands</span>
                    <a onclick="return categoryListLetter('all', this);" class="active">All</a>
                    <?php
                    while ($data_brand = $dbComObj->fetch_assoc($result_brand)) {
                        //    print_r($data_brand);
                        $capital = $data_brand['capital'];
                        ?>
                        <a onclick="return categoryListLetter('<?php echo $capital; ?>', this);" class=""> <?php echo $capital; ?> </a>
                    <?php
                    }
                    echo '</div>';
                }
                if ($num_brand > 0) {
                    $resultmobB = $dbComObj->viewData($conn, "brands", $colom, $condition_brand);
                    ?>          
                    <div class="brandSortList brandSortList-mobile hidden-md hidden-lg">
                        <span>Top Brands</span>
                        <a onclick="return categoryListLetter('all', this);" class="active">All</a>
                        <?php
                        while ($data_brand = $dbComObj->fetch_assoc($resultB)) {
                            //    print_r($data_brand);
                            $capital = $data_brand['capital'];
                            ?>
                            <a onclick="return categoryListLetter('<?php echo $capital; ?>', this);" class=""> <?php echo $capital; ?> </a>
                        <?php
                        }
                        echo '</div>';
                    }
                    ?>            
                            <?php if ($num_brand > 0) { ?>
                        <div id="brandsListing" class="brandsListing">
                            <div class="row">
                                <?php
                                $i = 0;
                                $j = 0;
                                $wrap_count = 3;
                                $wrap_count2 = 6;
                                while ($data_brand = $dbComObj->fetch_assoc($result_brand1)) {
                                    $i++;
                                    $capital = $data_brand['capital'];
                                    $name_formatted = $data_brand['name_formatted'];
                                    $name_arr1 = (explode(";", $name_formatted));
                                    // print_r($name_arr1
                                    ?>   

                                    <div  data-letter="<?php echo $capital; ?>" class="brand-column col-xs-4 col-sm-2" style="display: block;">
                                        <p class="title"><?php echo $capital; ?></p>
                                        <?php
                                        foreach ($name_arr1 as $value) {
                                            $name_arr2 = (explode(",", $value));
                                            $name = $name_arr2[0];
                                            $id = $name_arr2[1];
                                            $url_brand_id = $njEncryptionObj->safe_b64encode($id);
                                            $url_brand_name = $njGenObj->removeSpecialChar($name);
                                            $detail_page = BASE_URL . 'grid/' . $url_brand_id . '/designer/' . $url_brand_name . '/';
                                            ?>  
                                            <li><a href="<?php echo $detail_page ?>"><?php echo $name; ?></a></li>    


                                            <?php
                                        }
                                        echo '  </div> ';
                                        if ($i % $wrap_count2 == 0) {
                                            echo '<div class="row"><hr class="col-xs-12"></div>';
                                        }
                                    }
                                    echo '</div></div>';
                                }
                                ?>

                                <!-- Async Load of Tealium utag.js library -->
                                <script type="text/javascript">
                                    (function (a, b, c, d) {
                                        a = '//tags.tiqcdn.com/utag/loxabeauty/main/prod/utag.js';
                                        b = document;
                                        c = 'script';
                                        d = b.createElement(c);
                                        d.src = a;
                                        d.type = 'text/java' + c;
                                        d.
                                                async = true;
                                        a = b.getElementsByTagName(c)[0];
                                        a.parentNode.insertBefore(d, a);
                                    })();

                                    function categoryListLetter(letter, e) {
                                        jQuery('.brandSortList a').removeClass('active');
                                        if (letter == 'all') {
                                            jQuery(e).addClass('active');
                                            jQuery('#brandsListing .row .row').removeClass('hidden');
                                            jQuery('.brand-column').show();
                                        } else {
                                            jQuery('#brandsListing .row .row').addClass('hidden');
                                            jQuery('.brand-column').each(function () {
                                                if (jQuery(this).attr('data-letter') === letter) {
                                                    jQuery(e).addClass('active');
                                                    jQuery(this).show();
                                                } else {
                                                    jQuery(this).hide();
                                                }
                                            });
                                        }
                                        return false;
                                    }
                                </script>
                            </div>
                        </div>
                    </div>

                    <!-- brands closed here -->

<?php include 'include/footer.php'; ?>