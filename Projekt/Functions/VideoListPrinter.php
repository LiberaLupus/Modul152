<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 20.03.2018
 * Time: 19:20
 */

$Id = 1;
error_reporting(0);

while (true){
    if($Favoriten == false){
        $Name = $DBhelper->Mode("select")->Attribut("Name")->fromTabelle("Medien")->Where("Id = ".$Id)->SQLExe();
        $VideoName = $DBhelper->Mode("select")->Attribut("Video")->fromTabelle("Medien")->Where("Id = ".$Id)->SQLExe();
        $Beschreibung = $DBhelper->Mode("select")->Attribut("Beschreibung")->fromTabelle("Medien")->Where("Id = ".$Id)->SQLExe();
    }else{
        $Name = $DBhelper->Mode("select")->Attribut("Name")->fromTabelle("Medien")->Join(" inner join Favoriten on Medien.Id = Favoriten.MedienFk ")->Where("Favoriten.UserFk = 1")->Where("Medien.Id =".$Id)->SQLExe();
        $VideoName = $DBhelper->Mode("select")->Attribut("Video")->fromTabelle("Medien")->Join(" inner join Favoriten on Medien.Id = Favoriten.MedienFk ")->Where("Favoriten.UserFk = 1")->Where("Medien.Id =".$Id)->SQLExe();;
        $Beschreibung = $DBhelper->Mode("select")->Attribut("Beschreibung")->fromTabelle("Medien")->Join(" inner join Favoriten on Medien.Id = Favoriten.MedienFk ")->Where("Favoriten.UserFk = 1")->Where("Medien.Id =".$Id)->SQLExe();;
    }

    if($Name != null){
    echo '<h2>'.$Name.'</h2>';
     echo '<br />
            <video width="320" height="240" controls>
              <source src="../Uploads/'.$VideoName .'" type="video/mp4">
              <source src="#" type="video/ogg">
              Your browser does not support the video tag.
            </video>
            <br />';
     echo $Beschreibung;
     echo '<br />';
     echo '---------------------------------------------------------------------';
    }else{
        break;
    }
    ++$Id;
}