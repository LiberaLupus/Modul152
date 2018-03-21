<?php

  class LoginTester{

    function INOUT(){
      error_reporting(0);
      if($_SESSION["Login"] == false){
        echo '<li><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
      }else{
          echo '<li><a href="Upload.php"><span class="glyphicon glyphicon-open"></span></a></li>';
          echo '<li><a href="Favoriten.php"><span class="glyphicon">&#xe007;</span></a></li>';
          echo '<li><a href="Account.php"><span></span>'.$_SESSION["User"].'</a></li>';
          echo '<li><a href="Video.php"><span class="glyphicon glyphicon-film"></span> My Videos</a></li>';
          echo '<li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
      }
    }
  }
?>
