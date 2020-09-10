<script type="text/javascript" src="<?php echo BASE_URL; ?>frontend/js/materialize.js"></script>
<script src="<?php echo BASE_URL; ?>js/jquery.validate.js"></script>
<script src="<?php echo BASE_URL; ?>js/nj_form.js"></script>
<script>
    $("#searchform").validate({
         errorPlacement: function(error,element) {
    return true;
  }
    });
</script>
<style> 
    .sr-msg-error {
        border: 1px solid red;
        color: red !important;   
    }
  #search_term label .sr-msg-error {
      display: none !important;
  }
</style>
    <div id="loading-overlay" class="loading-overlay"></div>     
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <h4>Jwellery</h4>
                <div class="full-width margintop30">
                    <div class="col-md-1 col-sm-1">
                        <div class="row">
                            <img src="<?php echo BASE_URL; ?>frontend/img/location.png">
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 col-md-offset-1">
                        <p> Mangal Nagar 108, First Floor Sai Ram Plaza Bhawarkuwa Main Road Indore - 452001 (M.P)</p>
                    </div>
                </div>

                <div class="full-width margintop10">
                    <div class="col-md-1 col-sm-1">
                        <div class="row">
                            <img src="<?php echo BASE_URL; ?>frontend/img/phone.png">
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 col-md-offset-1">
                        <p>+91 000-000-0000</p>
                    </div>
                </div>

                <div class="full-width margintop10">
                    <div class="col-md-1 col-sm-1">
                        <div class="row">
                            <img src="<?php echo BASE_URL; ?>frontend/img/email.png">
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 col-md-offset-1">
                        <p>demo@gmail.com</p>
                    </div>
                </div>


            </div>


            <div class="col-md-2 col-sm-2">
                <h4>Main Menu</h4>
                <div class="full-width margintop30">
                    <p><a href="<?php echo BASE_URL; ?>">Home</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">About us</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Our Product</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Our Brand</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Blog</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">FAQs</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Contact Us</a></p>
                    <p><a href="<?php echo BASE_URL; ?>/contest.php">Contest</a></p>
                  
                </div>
            </div>

            <div class="col-md-2 col-sm-2">
                <h4>Shoping Info</h4>
                <div class="full-width margintop30">
                    <p><a href="<?php echo BASE_URL; ?>">Returns</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Delivery</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Services</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Gift Card</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Manufacture</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Discount Code</a></p>
                </div>
            </div>

            <div class="col-md-2 col-sm-2">
                <h4>Userful Links</h4>
                <div class="full-width margintop30">
                    <p><a href="<?php echo BASE_URL; ?>">Site Map</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Searc Terms</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Advanced Search</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Mobile</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Contact Us</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Address</a></p>
                    <p><a href="<?php echo BASE_URL; ?>openyourshop/">Open Your Shop</a></p>

                </div>
            </div>

            <div class="col-md-2 col-sm-2">
                <h4>Policies</h4>
                <div class="full-width margintop30">
                    <p><a href="<?php echo BASE_URL; ?>">Terms of Services</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Privacy</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Security</a></p>
                    <p><a href="<?php echo BASE_URL; ?>">Terms of Use</a></p>
					<p>
					    <a href="javascript::;"><div class="facebook-hover social-slide"></div></a> 
						  <a href="javascript::;"><div class="google-hover social-slide"></div></a>   
						  <a href="javascript::;"><div class="linkedin-hover social-slide"></div></a> 
						  <a href="javascript::;"><div class="instagram-hover social-slide"></div></a> 
						 <a href="javascript::;"><div class="pinterest-hover social-slide"></div></a> 
					</p> 
                </div>
            </div>


        </div>
    </div>
</div>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <p>Copyright &copy; MarketPlace <?php echo date('Y'); ?>. All right reserved. </p>
            </div>
            <div class="col-md-6 col-sm-6 text-right">
                <p><i class="fa fa-credit-card-alt"></i></p>
                <p><i class="fa fa-cc-visa"></i></p>
                <p><i class="fa fa-cc-mastercard"></i></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>