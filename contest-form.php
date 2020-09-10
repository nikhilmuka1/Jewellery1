<?php
include './include/header.php';
//print_r($_SESSION);
?>
				<style>

				.how-to-apply{
					padding-bottom:40px;
				}
                
				.how-too{
					    background: #f5f5f5;
    margin-bottom: 40px;
    padding: 10px;
				}
					</style>
					<div class="mainsection">
					  <div class="container">
					    <div class="row">
					    <img src="<?php echo BASE_URL; ?>frontend/img/Banner.png" class="img-responsive">
					  </div>
					 </div>
					</div>


					<div class="join">
					  <div class="container">
						<div class="row">
						  <h4 class="hadding"><strong>HOW TO APPLAY</strong></h4>
						  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
						 <hr>
						</div>
					  </div>
					</div>


						<div class="how-to-apply">
						 <div class="container how-too">
						   <div class="col-md-12 col-sm-12">
                            <form name="contact_form"  method="post" action="" enctype="multipart/form-data" >
                                <div class="row">
                                    <div id="result_contact" ></div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <h4>First Name *</h4>
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 form-group">
                                        <h4>Last Name *</h4>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 margintop10 form-group">
                                        <h4>Email Address *</h4>
                                        <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 margintop10 form-group">
                                        <h4>Choose Product</h4>
                                        <select class="form-control">
										 <option> <-- Choose Product--> </option>
										  <option value="" > Loream Ipsaum </option>
										   <option value="" > Dummy product </option>
										   <option value="" > Dummy </option>
										</select>
                                </div>
								<div class="col-md-12 col-sm-12 margintop20" style="padding-bottom:30px;">
                                        <button type="button"  name="csubmit" onclick="formSubmit('contact_form', 'result_contact', '<?php echo BASE_URL; ?> ')" class="btn btn-success">Submit </button>
                                    </div>
                            </form>
                        </div>
					 </div>
					</div>



<?php include 'include/footer.php'; ?>