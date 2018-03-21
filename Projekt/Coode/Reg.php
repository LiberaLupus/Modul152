
<?php
if(isset($_POST['registrieren'])){
  if($_POST["username"] == $con->Mode("select")
          ->Attribut("Username")
          ->fromTabelle("User")
          ->Where("Username = '".$_POST["username"]."' ")
          ->SQLExe()){
    header('Location: http://localhost:63342/Projekt/Websites/Registrieren.php'); exit;
  }else{
    $con->Mode("insert")
        ->fromTabelle("User")
        ->InsertAttribut("Username")
        ->InsertAttribut("Password")
        ->InsertValues("'".$_POST["username"]."'")
        ->InsertValues("'".$_POST["password"]."'")
        ->SQLExe();
    header('Location: http://localhost:63342/Projekt/Websites/Login.php'); exit;
  }
}
if(isset($_POST['zurück'])){
    header('Location: http://localhost:63342/Projekt/Websites/Login.php'); exit;
}
?>

<form method="post" action="Registrieren.php" enctype="multipart/form-data">
   <input type="text" name="username" placeholder="Username" class="form-control" required autofocus/>
   <input type="text" name="password" placeholder="Password" class="form-control" required/>
   <input name="registrieren" type="submit" class="btn btn-default btn-block btn-custom" value="Registrieren">
</form>
<form method="post" action="Registrieren.php" enctype="multipart/form-data">
   <input name="zurück" type="submit" class="btn btn-default btn-block btn-custom" value="Zurück">
</form>
