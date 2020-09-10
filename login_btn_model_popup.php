
<!-- Trigger the modal with a button -->
<!-- Modal -->
<!--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#loginajModel">Follow</button>-->
<div id="loginajModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">   
        <div class="row">
                    <form method="post" id="form-login" class="">
                        <div class="gray-outline-box">
                            <div class="form-group">
                                <div id="errorMessageLog"></div>
                                <p class="margintop10"> Email Address * </p>
                                <input type="text" id="login-email" name="login-email" class="form-control" placeholder="Email" required>
                            </div>      
                            <div class="form-group">        
                                <p class="margintop10"> Password * </p>
                                <input type="password" id="login-password" name="login-password" class="form-control" placeholder="Password" required>
                            </div>
                            <p class="margintop10"><input type="checkbox" id="one">  <label for="one">Remmember Me</label> </p>
                            <div class="full-width paddingtop28r">
                                <input type="hidden" name="reference_url" value="<?php if (isset($_GET['reference']) && $_GET['reference']) {
    echo $_GET['reference'];
} ?>" />
                                <input type="hidden" name="mode" value="<?php echo base64_encode("login"); ?>" />
                                 <input type="hidden" name="QUERY_STRING" value="<?php echo $ajGenObj->curPageURL();?>" />
                                <button type="button" onclick="formSubmit('form-login', 'errorMessageLog', '<?php echo BASE_URL; ?>controller/users_operations.php')" class="btn btn-success margintop30 btn btn-lg"> Login </button>
                                <button type="button" onclick="document.location.href='<?php echo BASE_URL ?>login/'" class="btn btn-success margintop30 btn btn-lg"> Register </button>
                                  
                            </div>
                        </div>
                    </form>
                </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>   