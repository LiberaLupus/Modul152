
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <title>My Videos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../CSS/styles.css" type="text/css">
</head>
<body>


<?php
include_once ("../Functions/DBConnection.php");
$DBhelper = new DBConnection();
error_reporting(0);
     ?>
<div class="container">
    <div id="login-box">
        <div class="logo">
            <h1 class="logo-caption">My Videos</h1>
            <br />
            <img src="../Images/profilicon.gif" class="img img-responsive center-block"/>
        </div><!-- /.logo -->
        <div class="controls">
            <?php
                include __DIR__.'/../Coode/VideoEdit.php';
            ?>
            <form method="post" action="Video.php" enctype="multipart/form-data">
                <input name="zurück" type="submit" class="btn btn-default btn-block btn-custom" value="Zurück">
            </form>
        </div><!-- /.controls -->
    </div><!-- /#login-box -->
</div><!-- /.container -->
</body>
</html>