<?php

class read{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "pas";
    var $koneksi = "";

    function __construct(){
        $this->koneksi = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        if($this->koneksi){
        //   echo "MYSQL CONNECTED";
        }else{
            // echo "SOMETHING WRONG :(";
        }
    }
    function tampildata(){
        $data = mysqli_query($this->koneksi,"SELECT * from employees");
        while($row = mysqli_fetch_array($data)){
            $hasil[]=$row;
        }
        return $hasil;
    }
}

$koneksi = new read();
