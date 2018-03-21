
<?php
if(isset($_POST['username']) && $_POST['Username'] == !""){
$con->Mode("update")
    ->fromTabelle("User")
    ->Update("Username ='".$_POST['Username']."'")
    ->Where("Id =".$_SESSION["UserId"])
    ->SqlExe();
$_SESSION["User"] = $_POST['Username'];
}

if(isset($_POST['password'])&& $_POST['Password'] == !""){
    $con->Mode("update")
        ->fromTabelle("User")
        ->Update("Password ='".$_POST['Password']."'")
        ->Where("Id =".$_SESSION["UserId"])
        ->SqlExe();
}

if(isset($_POST['zurück'])){
    header('Location: http://localhost:63342/Projekt/Websites/Index.php'); exit;
}
?>

<form method="post" action="Account.php" enctype="multipart/form-data">
   <input type="submit" name="username" value="<?php echo $_SESSION["User"]; ?>" class="btn btn-default btn-block btn-custom" />
   <input type="text" name="Username" placeholder="Username" class="form-control" />
   <input type="submit" name="password" value="<?php echo $con->Mode("select")
       ->Attribut("Password")
       ->fromTabelle("User")
       ->Where("Id =".$_SESSION["UserId"])
       ->SqlExe();  ?>" class="btn btn-default btn-block btn-custom" />
   <input type="text" name="Password" placeholder="Password" class="form-control" />
</form>
<form method="post" action="Account.php" enctype="multipart/form-data">
   <input name="zurück" type="submit" class="btn btn-default btn-block btn-custom" value="Zurück">
</form>
