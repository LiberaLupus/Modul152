<?php
  session_start();

  $TestUsername = $_POST["username"];
  $TestPassword = $_POST["password"];

  include_once ("../Functions/DBConnection.php");
  $con = new DBConnection();
  $LogUser = $con->Mode("select")
      ->Attribut("Username")
      ->fromTabelle("User")
      ->Where(" Username ='".$TestUsername."' ")
      ->Where("Password ='".$TestPassword."' ")
      ->SQLExe();
  error_reporting(0);
  if($LogUser == ""){
    header('Location: http://localhost:63342/Projekt/Websites/Login.php'); exit;
  }else{
    $_SESSION["User"] = $LogUser;
    $_SESSION["UserId"] = $con->Mode("select")
        ->Attribut("Id")
        ->fromTabelle("User")
        ->Where(" Username ='".$_SESSION["User"]."' ")
        ->SQLExe();
    $_SESSION["Login"] = true;
    header('Location: http://localhost:63342/Projekt/Websites/Index.php'); exit;
  }
?>
