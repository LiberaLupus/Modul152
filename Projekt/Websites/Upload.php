<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 19.03.2018
 * Time: 19:44
 */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modul-152</title>
    <link rel="stylesheet" href="../CSS/styles_login.css" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
    <body>
        <?php
        include_once ("../Coode/Navbar.php");
        error_reporting(0);
        ?>
        <form action="../Functions/upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="titel" placeholder="Titel" class="form-control" required autofocus/>
            <input type="text" name="beschreibung" placeholder="Beschreibung" class="form-control" required/>
            Select Video to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Video" name="submit">
        </form>

    </body>
</html>