<?php
/**
 * Created by PhpStorm.
 * User: Kurt
 * Date: 22.12.2017
 * Time: 10:44
 */

class DBSeed{

    private $servername = "localhost";
    private $username = "root";
    private $password = "gibbiX12345";
    private $dbname = "video";

    public function WakeUpCall(){
        $this->KRONOS();
        $conn = new mysqli($this->servername, $this->username, $this->password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            $sql = "create database video;";
            $conn->query($sql);
            $conn->close();
            $this->GAIA();
        }
    }

    public function GAIA(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            $i = 0;
            while ($i < 2){
                if($i == 0){
                    $FILE = fopen("Create.txt", "r") or die("Unable to open file!");
                }else{
                    $FILE = fopen("Insert.txt", "r") or die("Unable to open file!");
                }
                while(!feof($FILE)) {
                    $sql = fgets($FILE);
                    if ($conn->query($sql) === TRUE) {
                    } else {
                    }
                }
                fclose($FILE);
                ++$i;
            }
        }
        $conn->close();
    }

    public function KRONOS(){
        $conn = new mysqli($this->servername, $this->username, $this->password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
            $sql = "DROP DATABASE IF EXISTS video;";
            $conn->query($sql);
            $conn->close();
        }
    }
}