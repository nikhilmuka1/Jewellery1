<?php
/**
 * page_footer.php
 *
 * Author: pixelcave
 *
 * The footer of each page
 *
 */
?>
            <!-- Footer -->
            <footer class="clearfix">
                <div class="pull-right">
                    Created by <a href="http://www.mmfinfotech.com/" target="_blank">MMF InfoTech </a>
                </div>
                <div class="pull-left">
                    <span id="year"><?php echo date('Y');?></span> &copy; <a href="http://goo.gl/TDOSuC" target="_blank"><?php echo $template['name'] . ' ' . $template['version']; ?></a>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- BEGIN Logout -->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="<?php echo ADMIN_URL; ?>admin_operations.php?mode=bG9nb3V0" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close" style="position:relative; left:50px !important;padding: 8px;">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
<!-- END Logout -->

