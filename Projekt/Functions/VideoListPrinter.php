<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 20.03.2018
 * Time: 19:20
 */


$Id = 1;
//error_reporting(0);

while (true){
    if($Favoriten == false){
        $Name = $DBhelper->Mode("select")->Attribut("Name")->fromTabelle("Medien")->Where("Id = ".$Id)->SQLExe();
        $VideoName = $DBhelper->Mode("select")->Attribut("Video")->fromTabelle("Medien")->Where("Id = ".$Id)->SQLExe();
        $Beschreibung = $DBhelper->Mode("select")->Attribut("Beschreibung")->fromTabelle("Medien")->Where("Id = ".$Id)->SQLExe();
    }else{
        $Name = $DBhelper->Mode("select")->Attribut("Name")->fromTabelle("Medien")->Join(" inner join Favoriten on Medien.Id = Favoriten.MedienFk ")->Where("Favoriten.UserFk =".$_SESSION["UserId"])->Where("Medien.Id =".$Id)->SQLExe();
        $VideoName = $DBhelper->Mode("select")->Attribut("Video")->fromTabelle("Medien")->Join(" inner join Favoriten on Medien.Id = Favoriten.MedienFk ")->Where("Favoriten.UserFk =".$_SESSION["UserId"])->Where("Medien.Id =".$Id)->SQLExe();;
        $Beschreibung = $DBhelper->Mode("select")->Attribut("Beschreibung")->fromTabelle("Medien")->Join(" inner join Favoriten on Medien.Id = Favoriten.MedienFk ")->Where("Favoriten.UserFk =".$_SESSION["UserId"])->Where("Medien.Id =".$Id)->SQLExe();;
    }

    if($Name != null){
        echo '<form method="post" action="'.$Seite.'" enctype="multipart/form-data">';
        echo '---------------------------------------------------------------------';
        echo '<h2>'.$Name.'</h2>';
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
                echo'<input type="submit" value=" Zu Favoriten hinzufügen" name = "Add">';

            }else{
                echo'<input type="submit" value="Von Favoriten entfernen" name = "Remove">';
            }
        }
        echo '<br />';
        echo $Beschreibung;
        echo '<br />';
        echo '---------------------------------------------------------------------';
        echo '</form>';
     if (isset($_POST["Add"])){
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
     if (isset($_POST["Remove"])){
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
        break;
    }
    ++$Id;
}