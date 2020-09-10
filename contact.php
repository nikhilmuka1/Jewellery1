<?php
include './include/header.php';
//print_r($_SESSION);
?>
<div class="cart-detail">
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-sm-10 col-md-offset-1 margintop10">
                <div class="full-width">
                    <div class="col-md-4 col-sm-4">
                        <div class="row">
                            <div class="gray-outline-box text-center">
                                <h3><a href="#"><i class="fa fa-volume-control-phone"></i>&nbsp; Phone</a></h3>
                                <p>+91 000-000-0000</p> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="row">
                            <div class="gray-outline-box text-center">
                                <h3><a href="#"><i class="fa fa-envelope"></i>&nbsp; Email</a></h3>  
                                <p>demo@gmail.com</p> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="row">
                            <div class="gray-outline-box text-center">
                                <h3><a href="#"><i class="fa fa-commenting-o"></i>&nbsp;Chat</a></h3>
                                <p>click <a href="#">here</a> to open Chat</p> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box ">
                    <div class="full-width">
                        <div class="col-md-12 col-sm-12">
                            <h4 class="text-center hadding margintop10">Demo</h4>
                            <p class="text-center">Love is the Greatest virtue of all. It is at the root of all good things.<br> All humans thrive in a loving environments.<br> And whenever love is in the equation, happiness results.</p>
                            <form name="contact_form" id="contact_form" method="post" action="" enctype="multipart/form-data" >
                                <div class="row">
                                    <div id="result_contact" ></div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <h4>First Name *</h4>
                                        <input type="text" class="form-control" name="first_name" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <h4>Last Name *</h4>
                                        <input type="text" class="form-control" name="last_name" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 margintop10 form-group">
                                        <h4>Email Address *</h4>
                                        <input type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 margintop10 form-group">
                                        <h4>Telephone *</h4>
                                        <input type="number" class="form-control" name="mobile" minlength="10"  maxlength="12" required>
                                    </div>

                                    <div class="col-md-12 col-sm-12 margintop10 form-group">
                                        <h4>Comment *</h4>
                                        <textarea class="form-control" rows="4" name="comment" required></textarea>
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12 margintop20 ">
                                        <button type="button"  name="csubmit" onclick="formSubmit('contact_form', 'result_contact', '<?php echo BASE_URL; ?>contact_operations.php')" class="btn btn-success pull-right">Submit <i class="fa fa-angle-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'include/footer.php';
//print_r($_SESSION);
?>