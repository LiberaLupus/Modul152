<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 20.03.2018
 * Time: 10:35
 */
session_start();
include_once ("../Functions/DBConnection.php");
$DBhelper = new DBConnection();
$name = $DBhelper->Mode("select")
    ->Attribut("Name")
    ->fromTabelle("Medien")
    ->Where("Id = ".$_SESSION["VideoId"])
    ->SQLExe();

$beschreibung = $DBhelper->Mode("select")
    ->Attribut("Beschreibung")
    ->fromTabelle("Medien")
    ->Where("Id = ".$_SESSION["VideoId"])
    ->SQLExe();
?>
<!DOCTYPE html>
<html>
    <body>
        <form action="../Functions/EditUpdate.php" method="post" enctype="multipart/form-data">
            <input type="text" name="titel" placeholder="Titel" value="<?php echo $name; ?>" class="form-control"/>
            <input type="text" name="beschreibung" placeholder="Beschreibung" value="<?php echo $beschreibung; ?>" class="form-control"/>
            <input type="submit" value="Update Video" name="submit">
        </form>
    </body>
</html>