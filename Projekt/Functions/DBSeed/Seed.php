<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
        <title>Seed</title>
    </head>
    <style>
        body{
            background: url("../../Images/seed.jpg")no-repeat fixed 0 0 / cover;
            background-position: center center;
        }
    </style>
    <body>
        <?php
            include_once ("DBSeed.php");
            $seed = new DBSeed();
            $seed->WakeUpCall();
        ?>
    </body>
</html>

