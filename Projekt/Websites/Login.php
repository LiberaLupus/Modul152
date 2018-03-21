<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Login</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" href="../CSS/styles_login.css" type="text/css">
      <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  </head>
  <body>
  	<div class="container">
  	   <div id="login-box">
  		    <div class="logo">
      		<h1 class="logo-caption">Login</h1>
                <br />
          <img src="../Images/Camera.gif" class="img img-responsive center-block"/>
       </div><!-- /.logo -->
  		 <div class="controls">
         <?php  include __DIR__.'/../Coode/Log.php'; ?>
  		</div><!-- /.controls -->
  	</div><!-- /#login-box -->
  </div><!-- /.container -->
  <?php
    include_once ("../Functions/AnimationLogin.php");
    $Navigon = new AnimationLogin();
    $Navigon->Animation();
  ?>
  </body>
</html>
