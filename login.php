<?php
include './include/header.php';
//print_r($_SESSION);
$roll_type = '';
$contact_no = '';
$login_id = '';
if ($_SESSION) {
    if (isset($_SESSION['user_id']))
        $login_id = $_SESSION['user_id'];
    if (isset($_SESSION['DH_seller_id'])) {
        $login_id = $_SESSION['DH_seller_id'];
        $loginSeller = $_SESSION['DH_seller_type_name'];
    }
}
if ($login_id) {
    $redirect_url = BASE_URL;
    ?>
    <script>
        window.location.href = "<?php echo $redirect_url; ?>";
    </script>
    <?php
}
?>
<style>
    .loading-overlay{
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
        background: rgba(183, 173, 173, 0.5) url(<?php echo BASE_URL; ?>img/loading.gif) no-repeat center center;
        /*background: rgba(0,0,0,0.5);*/
        display: none;
    }    .sr-msg-error {
        border: 1px solid red;
        color: red !important;
    }
</style>
<div class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
			<div class="gray-outline-box">
                <h4 class="hadding" style="text-align:center;font-weight:600;">Sign In</h4>
                <div class="">
                    <center>
                        <a href="#" class="btn btn-facebook btn-stm">Login with a facebook &nbsp &nbsp <i class="fa fa-facebook" style="background:#fff; color:#333; padding:3px; font-weight:600;"></i></a>
                    </center> 
                </div>
		      </div>
             </div>
            <div class="full-width">
                <div class="col-md-6 col-sm-6">
                    <form method="post" id="form-login" class="">
                        <div class="gray-outline-box">
                            <div class="form-group">
                                <h4 class="hadding text-left">WELCOME BACK, LOGIN HERE</h4>
                                <div id="errorMessageLog"></div>
                                <p class="margintop10"> Email Address * </p>
                                <input type="text" id="login-email" name="login-email" class="form-control" placeholder="Email" required>
                            </div>      
                            <div class="form-group">        
                                <p class="margintop10"> Password * </p>
                                <input type="password" id="login-password" name="login-password" class="form-control" placeholder="Password" required>
                            </div>
                            <p class="margintop10"><input type="checkbox" name="remember" id="one">  <label for="one">Keep me logged in What is this?</label> </p>
                            <div class="full-width paddingtop28r">
                                <input type="hidden" name="reference_url" value="<?php
                                if (isset($_GET['reference']) && $_GET['reference']) {
                                    echo $_GET['reference'];
                                }
                                ?>" />
                                <input type="hidden" name="mode" value="<?php echo base64_encode("login"); ?>" />
                                <button type="button" onclick="formSubmit('form-login', 'errorMessageLog', '<?php echo BASE_URL; ?>controller/users_operations.php')" class="btn btn-success margintop30 btn btn-lg"> Login </button>
                                <button type="button" onclick="document.location.href = '<?php echo BASE_URL; ?>forgot_password.php'" class="btn btn-success margintop30 btn btn-lg"> Forgot Password </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="gray-outline-box">
                        <div id="userResult"></div>
                        <form class="form-bordered" method="post" id="userForm">
                            <h4 class="hadding text-left">HELLO THERE, SIGNUP HERE</h4>
                            <div class="col-md-6 col-sm-6 form-group">
                                <p class="margintop10"> Name * </p>
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <p class="margintop10"> Contact No * </p>
                                <input type="text" minlength="10" maxlength="12"  placeholder="Contact No" class="form-control" required  name="contact_no">
                            </div>
                            <div class="col-md-12 col-sm-12 form-group">
                                <p class="margintop10"> Email Address * </p>
                                <input type="email" class="form-control" name="email" required placeholder="youremail@example.com">
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <p class="margintop10"> Password * </p>
                                <input type="password" minlength="6" class="form-control" name="password" required placeholder="Password">
                            </div>
                            <div class="col-md-6 col-sm-6 form-group">
                                <p class="margintop10">Confirm  Password * </p>
                                <input type="password" class="form-control" minlength="6" name="C_password" required placeholder="Confirm Password">
                            </div>

                            <!--                            <div class="col-md-6 col-sm-6 form-group">
                                                            <p class="margintop10"> User Type * </p>
                                                            <select class="form-control" id="sel1" name="roll_type" required="">
                                                                <option value=''>Select User Type</option>
                                                                <option value='1' <?php //if ($roll_type == '1') echo 'selected';    ?>> Buyer </option>
                                                                <option value='2' <?php // if ($roll_type == '2') echo 'selected';    ?>> Seller </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 form-group">
                                                            <p class="margintop10"> Image * </p>
                                                            <input type="file" id="image" name="image"  required class="form-control avatar-input">
                                                        </div>-->
                            <div class="col-md-12 col-sm-12 form-group">
                                <p><input type="checkbox" id="foroneregister" class="register-seller" value="2" name="roll_type" onchange="RegSellerValueChanged()" > 
                                    <label for="foroneregister" style="font-size: 14px !important;">Register as a Seller </label></p>
                            </div>
                            <div id="seller_detail_form" style="display:none;">
                                <div class="col-md-12 col-sm-6 form-group">
                                    <p class="margintop10">Address</p>
                                    <textarea class="form-control requiredSeller" id="comment" name="address"  placeholder="Address" ><?php echo $address; ?></textarea>
                                </div>
                                <div class="col-md-6 col-sm-6 form-group">
                                    <p class="margintop10">City</p>
                                    <input type="text" id="city" name="city"  placeholder="city" pattern="^[a-zA-Z]{3,}$" class="form-control requiredSeller" value=""/>
                                </div><!-- /.form-group -->
                                <div class="col-md-6 col-sm-6 form-group">
                                    <p class="margintop10">State</p>
                                    <input type="text" id="state" name="state"  placeholder="State" pattern="^[a-zA-Z]{3,}$" class="form-control requiredSeller" value=""/>
                                </div>
                                <div class="col-md-6 col-sm-6 form-group">
                                    <p class="margintop10">Country</p>
                                    <input type="text" id="country" name="country"  placeholder="Country" pattern="^[a-zA-Z]{3,}$" class="form-control requiredSeller" value=""/> 
                                </div> 
                                <div class="col-md-6 col-sm-6 form-group">
                                    <p class="margintop10">zip Code</p>
                                    <input type="number" minlength="6" maxlength="7"  placeholder="Zip Code" class="form-control requiredSeller"  name="zip_code">
                                </div>  
                            </div>
                            <div class="col-md-12 col-sm-12 margintop10 ">

                                <!--                                <div class="full-width form-group">
                                                                    <p><input type="checkbox" id="forone"> <label for="forone">I want to receive newsletters and updates from Marketplace by email and post</label></p>
                                                                </div>-->
                                <div class="full-width form-group">
                                    <input type="hidden" name="mode" value="<?php echo base64_encode("UserRegister"); ?>" />
                                    <button type="button" onclick="formSubmit('userForm', 'userResult', '<?php echo BASE_URL; ?>controller/users_operations.php')" class="btn btn-success margintop30 btn btn-lg">Register </button>

                                </div> 
                            </div>

                        </form>
                        <div id="loading-overlay" class="loading-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // RegSellerValueChanged
    function RegSellerValueChanged()
    {
        if ($('.register-seller').is(":checked")) {
            $("#seller_detail_form").show(300);
            $("#seller_detail_form").find(".requiredSeller").attr('required', true);
        }
        else {
            $("#seller_detail_form").hide(300);
            $("#seller_detail_form").find(".requiredSeller").attr('required', false);
        }
    }
</script>
<?php include 'include/footer.php'; ?>