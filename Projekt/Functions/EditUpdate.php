<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 20.03.2018
 * Time: 10:37
 */
session_start();
$titel = $_POST["titel"];
$beschreibung = $_POST["beschreibung"];

include_once ("DBConnection.php");
$DBhelper = new DBConnection();

$DBhelper->Mode("update")
    ->fromTabelle("Medien")
    ->Update("Name ='".$titel."'")
    ->Update("Beschreibung ='".$beschreibung."'")
    ->Where("Id =".$_SESSION["VideoId"])
    ->SQLExe();

