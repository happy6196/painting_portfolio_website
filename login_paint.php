<?php 
include('config.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="intenim">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->

        <!-- App title -->
        <title>Aderlin</title>

        <!-- App CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        

        <script src="assets/js/modernizr.min.js"></script>
    </head>
    <body >

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                
                <h5 class="text-muted m-t-0 font-600" Admin Panel Login</h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0"style="font-family: fantasy;">Sign In</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" method="post" action="../admin_login_check.php">
                        <?php echo $_REQUEST['msg']; ?>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="admin" type="text" VALUE="<?php echo $_COOKIE['crmremember_me']; ?>" required="" placeholder="Username">
                            </div>
                        </div>

                        
                     
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="pass" value="<?php echo $_COOKIE['crmpassremember_me']; ?>" required="" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-custom">
                                    <input id="checkbox-signup" name="remember" <?php if($_COOKIE['crmremember_me']!=""){ echo "checked='checked'"; } ?>value="1" type="checkbox">
                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit" style="background-color: #008CBA; color:white;">Log In</button>
                            </div>
                        </div>

                      <!--  <div class="form-group m-t-30 m-b-0">
                            <div class="col-sm-12">
                                <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                        </div>!-->
                    </form>

                </div>
            </div>
            <!-- end card-box-->

            
        </div>
        <!-- end wrapper page -->
        

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	
	</body>
</html>