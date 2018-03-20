<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 19.03.2018
 * Time: 19:08
 */
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Modul-152</title>
    <link rel="stylesheet" href="#" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
    <body>
        <?php
            include_once("../Functions/DBConnection.php");
            $DBhelper = new DBConnection();
            $Favoriten = true;
            include __DIR__."/../Functions/VideoListPrinter.php"


        ?>
</body>
</html>