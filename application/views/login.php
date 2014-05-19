
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; Kamahalan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
 
    <!-- Le styles -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form id="form-signin" method ="post" action="/kamahalan/index.php/system/check_database"  class="form-signin">
        <h2  class="form-signin-heading">Welcome</h2>
        <input id="username" name="username" type="text" class="input-block-level" placeholder="Username">
        <input id="password" name="password" type="password" class="input-block-level" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input class="btn btn-primary" type="submit" value="submit"/>
        <!--<button id="loginbtn" class="btn btn-large btn-primary" type="submit">Sign in</button>-->
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
  </body>
</html>
