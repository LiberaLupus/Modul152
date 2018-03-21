<?php
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>BanaTube</title>
    <link rel="stylesheet" href="../CSS/styles_login.css" type="text/css">
      <link rel="stylesheet" href="../CSS/styles.css" type="text/css">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  </head>
    <body>
        <?php
            include_once ("../Coode/Navbar.php");
            error_reporting(0);
            include_once("../Functions/DBConnection.php");
            $DBhelper = new DBConnection();
            $Favoriten = false;
            $Seite = "Index.php";
        include __DIR__ . '/../Functions/VideoListPrinter.php';
        ?>
    </body>
</html>
