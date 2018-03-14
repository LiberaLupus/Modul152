<?php
  class DBConnection{
    public $servername = "localhost";
    public $username = "root";
    public $password = "gibbiX12345";
    public $dbname = "webshop";
    public $Artikel = array();

    public function SelectWaren($kategorie, $attribut, $id){
      // Create connection
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      // Create database
      $sql = 'select '."$attribut".' from artikel as a inner join kategorie as k on k.Id = a.KategorieFK where Kategorie = "'.$kategorie.'";';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = $result->fetch_assoc()) {
          ++$i;
          if($id == $i){
            return $row[$attribut];
          }
        }
      } else {
        return "";
      }
      $conn->close();
      return "";
    }

    public function LoginUser($User, $Pass){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      $sql = 'select * from user where Username = "'.$User.'" and Password = "'.$Pass.'";';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row["Username"];
          }
        } else {
        return "";
      }
      $conn->close();
    }

    public function Wunschliste($attribut, $User, $id){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      $sql = 'select '."$attribut".' from artikel as a inner join wunschliste as w on a.Id = w.ArtikelFk inner join user as u on w.UserFk = u.Id where Username = "'.$User.'";';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while($row = $result->fetch_assoc()) {
          ++$i;
          if($id == $i){
            return $row[$attribut];
          }
        }
      } else {
        return "";
      }
      $conn->close();
      return "";
    }

    public function Namenvergleich($attribut, $User, $ArtikelName){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      $sql = 'select '."$attribut".' from artikel as a inner join wunschliste as w on a.Id = w.ArtikelFk inner join user as u on w.UserFk = u.Id where a.ArtikelName = "'.$ArtikelName.'" and u.Username = "'.$User.'";';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row[$attribut];
          }
        } else {
        return "";
      }
      $conn->close();
    }

    public function DBAdd($User, $ArtikelName){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      $sql = 'select Id from User where Username = "'.$User.'";';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $Wert1 = $row["Id"];
          }
        } else {
        return "";
      }
      $sql = 'select Id from Artikel where ArtikelName = "'.$ArtikelName.'";';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $Wert2 = $row["Id"];
          }
        } else {
        return "";
      }
      $sql = 'insert into wunschliste(UserFk, ArtikelFk) values ('.$Wert1.','.$Wert2.');';
      $conn->query($sql);
      $conn->close();
    }

    public function DBRemove($User, $ArtikelName){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      $sql = 'select Id from User where Username = "'.$User.'";';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $Wert1 = $row["Id"];
          }
        } else {
        return "";
      }
      $sql = 'select Id from Artikel where ArtikelName = "'.$ArtikelName.'";';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $Wert2 = $row["Id"];
          }
        } else {
        return "";
      }
      $sql = 'delete from wunschliste where UserFk = '.$Wert1.' and ArtikelFk = '.$Wert2.';';
      $conn->query($sql);
      $conn->close();
    }

    public function Reg($user, $pass, $anrede, $nachname, $vorname, $email, $plz, $strasse, $strasseNr, $ort){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = 'insert into kontakt(Anrede, Nachname,Vorname,Email,PLZ,Strasse,StrasseNr,Ort) values ("'.$anrede.'","'.$nachname.'","'.$vorname.'","'.$email.'",'.$plz.',"'.$strasse.'","'.$strasseNr.'","'.$ort.'");';
        $conn->query($sql);
        $sql = 'select Id from kontakt where Nachname = "'.$nachname.'" and Vorname = "'.$vorname.'";';
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
              $Wert1 = $row["Id"];
            }
          } else {
          return "";
        }
        $FK = 2;
        $sql = 'insert into user(Username, Password, RolleFk, KontaktFk) values ("'.$user.'","'.$pass.'",'.$FK.','.$Wert1.');';
        $conn->query($sql);
        $conn->close();
    }

    public function UsernameTest($user){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      $sql = 'select Username from user where Username = "'.$user.'";';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row["Username"];
          }
        } else {
        return "";
      }
      $conn->close();
    }

    public function getProfileData($user, $attribut){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      $sql = 'select '.$attribut.' from user as u inner join kontakt as k on u.KontaktFk = k.Id where Username = "'.$user.'";';
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            return $row[$attribut];
          }
        } else {
        return "";
      }
      $conn->close();
    }

    public function setProfileData($attribut1, $attribut2, $tabelle, $wert1, $wert2 ){
      $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      $sql = 'update '.$tabelle.' set '.$attribut1.' = "'.$wert1.'" where '.$attribut2.' = "'.$wert2.'";';
      $conn->query($sql);

      $conn->close();
    }

}


?>
