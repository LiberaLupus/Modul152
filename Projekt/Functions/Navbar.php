<?php
include_once("LoginTester.php");
  class Navbar{

    function navi1()
    {
      echo '
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">BanaTube</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
              <li><a href="Index.php"><span class="glyphicon glyphicon-home"></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">';
    }
    function navi2()
    {
      echo '
            </ul>
          </div>
        </div>
      </nav>';
    }
  }




?>
