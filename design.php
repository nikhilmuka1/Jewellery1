<?php
include './include/header.php';
//print_r($_SESSION);
?>
<div class="mainsection">
    <img src="<?php echo BASE_URL; ?>frontend/img/design.png" class="img-responsive">
    <div class="slider-postion">
        <h4>Custom Jewelry</h4>
        <h5>Designed by us. Inspired by you.</h5>
        <a href="#" class="btn btn-success margintop10">Design With Us</a>
    </div>
</div>
<div class="icon-section">
    <div class="container">
        <div class="row">
            <div class="full-width postionrl">

                <div class="col-md-4 col-sm-4">
                    <center>
                        <h4>Consult With An Expert</h4>
                        <img src="<?php echo BASE_URL; ?>frontend/img/icon-mobile.png" class="img-responsive margintop30">
                        <p class="margintop30 text-justify">Team up with one of our talented jewelry designers, who will take your ideas and create images of your design concept. Or you can just simply upload a finished design of your own. Our team will help you select the perfect diamond(s) and/or natural AA/AAA gemstone(s) that will perfectly compliment your piece. You can then purchase this unique custom jewelry (should you wish to do so) that will arrive at your doorstep in 2-3 weeks!</p> 
                    </center>
                </div>
                <div class="col-md-4 col-sm-4">
                    <center>
                        <h4>Design With An Artist</h4>
                        <img src="<?php echo BASE_URL; ?>frontend/img/design-1.png" class="img-responsive margintop30">
                        <p class="margintop30 text-justify">Once your design concept has been finalized, our highly skilled jewelry designers will create a detailed computerized (CAD) model which includes multi-angled renderings of your piece. Images of your CAD model will be sent along with a price estimate. You can then approve the design and purchase or request further modifications.</p> 
                    </center>
                </div>
                <div class="col-md-4 col-sm-4">
                    <center>
                        <h4>See Your Design Come To Life</h4>
                        <img src="<?php echo BASE_URL; ?>frontend/img/design-2.png" class="img-responsive margintop30">
                        <p class="margintop30 text-justify">Upon your final approval, our highly-skilled craftsman will handcraft your design in the precious metal of your choice, then meticulously set your chosen precious gemstones into place. Your beautifully finished jewelry is then thoroughly inspected by our Quality Care team, packed into a beautiful gift box and shipped along with free certification.</p> 
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="design-form">
 
    <div class="container">
        <div class="row">
            <h4 class="text-center hadding">You can create the ring, earrings, or pendant of your dreams with our custom design service.<br>
                Work directly with our talented team of designers to bring your imagination to life.</h4>
            <p class="margintop20"> GET STARTED BY SENDING US YOUR</p>
            <p> CUSTOMIZATION REQUEST </p>
               <div id="result_design"></div>
            <form name="design_form" id="design_form" method="post" action="" enctype="multipart/form-data" >
                <div class="full-width margintop30 form-group">
                    <div class="col-md-4 col-sm-4 form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                    </div>
                    <div class="col-md-4 col-sm-4 form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <div class="col-md-4 col-sm-4 form-group">
                        <input type="number" minlength="10"  maxlength="12" class="form-control" placeholder="Phone" name="phone" required>
                    </div>
                    <!--                <div class="col-md-3 col-sm-3">
                                        <div class="input-field">
                                            <select class="icons">
                                                <option value="" disabled selected>Where did you hear about us (optional)?</option>
                                                <option value=""> Blog</option>
                                                <option value=""> Google Ads</option>
                                                <option value=""> Facebook</option>
                                            </select>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                $('select').material_select();
                                            });
                                        </script>
                                    </div>-->

                    <div class="col-md-12 col-sm-12 margintop20 form-group">
                        <textarea class="form-control" placeholder="Descripation" name="description" rows="4" required></textarea>
                    </div>
                    <div class="col-md-2 col-sm-2 margintop20 col-md-offset-3 col-md-offset-3 form-group">
                        <input type="file" name="imageUpload" id="imageUpload" class="hide" required/> 


                        <label for="imageUpload" class="btn btn-success btn-block margintop20">Upload Image</label>
                        <br/><br/><br/>
                        <img src="" id="imagePreview" alt="" width="200px"/>
                    </div>
                    <div class="col-md-4 col-sm-4 margintop40">
                        <button type="button"  name="dsubmit" onclick="formSubmit('design_form', 'result_design', '<?php echo BASE_URL; ?>design_post.php')" class="btn btn-success btn-block">Submit Custom Design Request</button>
                    </div>
                    <script type="text/javascript">
                        $('#imageUpload').change(function () {
                            readImgUrlAndPreview(this);
                            function readImgUrlAndPreview(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();
                                    reader.onload = function (e) {
                                        $('#imagePreview').attr('src', e.target.result);
                                    }
                                }
                                ;
                                reader.readAsDataURL(input.files[0]);
                            }
                        });
                    </script>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>