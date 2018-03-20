<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 19.03.2018
 * Time: 19:44
 */
?>
<!DOCTYPE html>
<html>
    <body>

        <form action="../Functions/upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="titel" placeholder="Titel" class="form-control" required autofocus/>
            <input type="text" name="beschreibung" placeholder="Beschreibung" class="form-control" required/>
            Select Video to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Video" name="submit">
        </form>

    </body>
</html>