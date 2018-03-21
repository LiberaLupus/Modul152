<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 21.03.2018
 * Time: 17:10
 */


$Videos = $DBhelper->Count("select count(UserFk) as IdC from Medien WHERE UserFk =".$_SESSION["UserId"],"IdC");
$Id = 1;
echo'<form method="post" action="Video.php" enctype="multipart/form-data"/>';
while ($Videos != 0){

        $Name = $DBhelper->Mode("select")->Attribut("Name")->fromTabelle("Medien")->Where("UserFk =".$_SESSION["UserId"])->Where("Id =".$Id)->SQLExe();
        $VideoName = $DBhelper->Mode("select")->Attribut("Video")->fromTabelle("Medien")->Where("UserFk =".$_SESSION["UserId"])->Where("Id =".$Id)->SQLExe();
        $Beschreibung = $DBhelper->Mode("select")->Attribut("Beschreibung")->fromTabelle("Medien")->Where("UserFk =".$_SESSION["UserId"])->Where("Id =".$Id)->SQLExe();
        if($Name != null){
            echo' <input type="submit" name="name'.$Id.'" value="'.$Name.'" class="btn btn-default btn-block btn-custom" />
                  <input type="text" name="Name'.$Id.'" placeholder="Name" class="form-control" />';

            echo' <input type="submit" name="beschreibung'.$Id.'" value="'.$Beschreibung.'" class="btn btn-default btn-block btn-custom" />
                  <input type="text" name="Beschreibung'.$Id.'" placeholder="Beschreibung" class="form-control" />';

            if(isset($_POST['name'.$Id]) && $_POST['Name'.$Id] == !"") {
                $DBhelper->Mode("update")
                    ->fromTabelle("Medien")
                    ->Update("Name ='" . $_POST['Name'.$Id] . "'")
                    ->Where("Id =" . $Id)
                    ->SqlExe();
                header('Location: http://localhost:63342/Projekt/Websites/Video.php'); exit;
            }

            if(isset($_POST['beschreibung'.$Id]) && $_POST['Beschreibung'.$Id] == !"") {
                $DBhelper->Mode("update")
                    ->fromTabelle("Medien")
                    ->Update("Beschreibung ='" . $_POST['Beschreibung'.$Id] . "'")
                    ->Where("Id =" . $Id)
                    ->SqlExe();
                header('Location: http://localhost:63342/Projekt/Websites/Video.php'); exit;
            }

            echo' <input type="submit" name="delete'.$Id.'" value="Löschen" class="btn btn-default btn-block btn-custom" />';

            if(isset($_POST['delete'.$Id])) {
                $DBhelper->Mode("delete")
                    ->fromTabelle("Medien")
                    ->Where("Id =" . $Id)
                    ->SqlExe();
                unlink("../Uploads/".$VideoName);
                header('Location: http://localhost:63342/Projekt/Websites/Video.php'); exit;
            }

            --$Videos;
        }else{

        }
        ++$Id;
}
echo '</form>';

if(isset($_POST['zurück'])){
    header('Location: http://localhost:63342/Projekt/Websites/Index.php'); exit;
}
?>