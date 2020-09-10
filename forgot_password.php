<?php
include './include/header.php';
//print_r($_SESSION);
?>
<div class="cart-detail">
    <div class="container">
        <div class="row">
            <div id="frgtresult"></div>
            <div class="col-md-10 col-sm-10 col-md-offset-1 margintop10">
                <form name="frmForgot" id="frmForgot" method="post" action="" enctype="multipart/form-data">
                    <h1>Forgot Password?</h1>
                    <div class="col-md-6 col-sm-6 margintop10 form-group">
                        <h4>Email Address *</h4>
                        <input type="text" class="form-control" name="email" id="email" required="required">
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="mode" value="<?php echo base64_encode("forgotPassword"); ?>" />
                        <button type="button" onclick="formSubmit('frmForgot', 'frgtresult', '<?php echo BASE_URL; ?>controller/users_operations.php'); pagefrgt();" class="btn btn-success margintop30 btn btn-lg">Submit </button>
                    </div>	
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function pagefrgt() {
        var email = $('#email').val();
        if(email != "") {
        window.setTimeout(function () {
            location.href = 'login.php';
         }, 3000 );
     }
    }
</script>
<?php
include 'include/footer.php';
//print_r($_SESSION);
?>