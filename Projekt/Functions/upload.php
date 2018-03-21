<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 19.03.2018
 * Time: 19:47
 */
session_start();
include_once ("DBConnection.php");
$DBhelper = new DBConnection();

$titel = $_POST["titel"];
$beschreibung = $_POST["beschreibung"];

$target_dir = "../Uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}



// Allow certain file formats
if($imageFileType != "mpg" && $imageFileType != "mpeg" && $imageFileType != "vob"
    && $imageFileType != "m2p" && $imageFileType != "ts" && $imageFileType != "mp4"
    && $imageFileType != "mov" && $imageFileType != "avi" && $imageFileType != "wmv"
    && $imageFileType != "asf" && $imageFileType != "mkv" && $imageFileType != "flv") {
    echo "Sorry, only Videos files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $DBhelper->Mode("insert")
            ->fromTabelle("Medien")
            ->InsertAttribut("Name")
            ->InsertAttribut("Video")
            ->InsertAttribut("Beschreibung")
            ->InsertAttribut("UserFk")
            ->InsertValues("'".$titel."'")
            ->InsertValues("'".basename($_FILES["fileToUpload"]["name"])."'")
            ->InsertValues("'".$beschreibung."'")
            ->InsertValues($_SESSION["UserId"])
            ->SQLExe();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
header('Location: http://localhost:63342/Projekt/Websites/Index.php'); exit;
?>