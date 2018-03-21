<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 19.03.2018
 * Time: 19:08
 */
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>BanaTube</title>
      <link rel="stylesheet" href="../CSS/styles_login.css" type="text/css">
      <link rel="stylesheet" href="../CSS/styles.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
    <body>
        <?php
            include_once ("../Coode/Navbar.php");
            include_once("../Functions/DBConnection.php");
            $DBhelper = new DBConnection();
            $Favoriten = true;
            $Seite = "Favoriten.php";
            include __DIR__."/../Functions/VideoListPrinter.php"
        ?>
</body>
</html>