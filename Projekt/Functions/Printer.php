<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 21.03.2018
 * Time: 13:47
 */

class Printer
{
    public function Print($Favoriten, $Seite, $Id, $PX){
        include_once("../Functions/DBConnection.php");
        $DBhelper = new DBConnection();
            if($Favoriten == false){
                $Name = $DBhelper->Mode("select")->Attribut("Name")->fromTabelle("Medien")->Where("Id = ".$Id)->SQLExe();
                $VideoName = $DBhelper->Mode("select")->Attribut("Video")->fromTabelle("Medien")->Where("Id = ".$Id)->SQLExe();
                $Beschreibung = $DBhelper->Mode("select")->Attribut("Beschreibung")->fromTabelle("Medien")->Where("Id = ".$Id)->SQLExe();

            }else{
                $Name = $DBhelper->Mode("select")->Attribut("Name")->fromTabelle("Medien")->Join(" inner join Favoriten on Medien.Id = Favoriten.MedienFk ")->Where("Favoriten.UserFk =".$_SESSION["UserId"])->Where("Medien.Id =".$Id)->SQLExe();
                $VideoName = $DBhelper->Mode("select")->Attribut("Video")->fromTabelle("Medien")->Join(" inner join Favoriten on Medien.Id = Favoriten.MedienFk ")->Where("Favoriten.UserFk =".$_SESSION["UserId"])->Where("Medien.Id =".$Id)->SQLExe();
                $Beschreibung = $DBhelper->Mode("select")->Attribut("Beschreibung")->fromTabelle("Medien")->Join(" inner join Favoriten on Medien.Id = Favoriten.MedienFk ")->Where("Favoriten.UserFk =".$_SESSION["UserId"])->Where("Medien.Id =".$Id)->SQLExe();

            }

            if($Name != null){
                echo '<div id="login-box" style="
                    border-top-width: 1px;
                    margin-top: '.$PX.'px;">
                    <div class="container">
                    <div id="login-box">
                <div class="logo">';
                echo '<div class="controls">
                <form method="post" action="'.$Seite.'" enctype="multipart/form-data">';
                echo '<h2 class="logo-caption">'.$Name.'</h2>
                </div><!-- /.logo -->';
                echo '<br />';
                echo '<video width="320" height="240" controls>
              <source src="../Uploads/'.$VideoName .'" type="video/mp4">
              <source src="#" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <br />';
                $TestId = $DBhelper->Mode("select")
                    ->Attribut("MedienFk")
                    ->fromTabelle("Favoriten")
                    ->Where("MedienFk =".$Id)
                    ->Where("UserFk =".$_SESSION["UserId"])
                    ->SqlExe();
                if($_SESSION["UserId"] > 0){
                    if ($Id != $TestId){
                        echo'<input type="submit" value=" Zu Favoriten hinzufügen" name = "Add'.$Id.'">';

                    }else{
                        echo'<input type="submit" value="Von Favoriten entfernen" name = "Remove'.$Id.'">';
                    }
                }
                echo '<br />';
                echo '<h4 class="logo-caption">'.$Beschreibung.'</h4>';
                echo '<br />';
                echo '</form>';
                echo '            </div><!-- /.controls -->
                     </div><!-- /#login-box -->
        </div><!-- /.container -->';
                if (isset($_POST["Add".$Id])){
                    $DBhelper->Mode("insert")
                        ->fromTabelle("Favoriten")
                        ->InsertAttribut("UserFk")
                        ->InsertAttribut("MedienFk")
                        ->InsertValues($_SESSION["UserId"])
                        ->InsertValues($Id)
                        ->SqlExe();
                    if($Favoriten == false){
                        header('Location: http://localhost:63342/Projekt/Websites/Index.php'); exit;
                    }else{
                        header('Location: http://localhost:63342/Projekt/Websites/Favoriten.php'); exit;
                    }
                }
                if (isset($_POST["Remove".$Id])){
                    $DBhelper->Mode("delete")
                        ->fromTabelle("Favoriten")
                        ->Where("UserFk =".$_SESSION["UserId"])
                        ->Where("MedienFk =".$Id)
                        ->SqlExe();
                    if($Favoriten == false){
                        header('Location: http://localhost:63342/Projekt/Websites/Index.php'); exit;
                    }else{
                        header('Location: http://localhost:63342/Projekt/Websites/Favoriten.php'); exit;
                    }
                }

            }else{

            }
        }
}