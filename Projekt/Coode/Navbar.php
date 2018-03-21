<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 21.03.2018
 * Time: 09:34
 */

include_once ("../Functions/Navbar.php");
include_once ("../Functions/DBConnection.php");
$Navigon = new Navbar();
$Log = new LoginTester();
$Navigon->navi1();
$Log->INOUT("", "../Functions/");
$Navigon->navi2();