<?php

class read{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "az";
    var $koneksi = "";

    var $dShow;

    function __construct(){
        $this->koneksi = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        if($this->koneksi){
          //echo "MYSQL CONNECTED";
        }else{
            //echo "SOMETHING WRONG :(";
        }
    }
    function tampildata(){
        $data = mysqli_query($this->koneksi,"SELECT * from employees");
        if(mysqli_num_rows($data)== 0){
           $result = "null";
           return $result;
         }
        else{
          while($row = mysqli_fetch_array($data)){
              $result[]=$row;
            }
            return $result;
        }
    
    }
}

$koneksi = new read();
