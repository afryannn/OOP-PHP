<?php
include('sho.php');
$db = new read();
$datas = $db->tampildata();
// Initialize the session
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    body {
        background-color:#f8f9fa;
        font: 14px sans-serif;
        text-align: center;
    } 
    </style>
</head>

<body>
    <!-- Navigation Bar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#resNav">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="#" class="navbar-brand"  style="margin-left:90px !important;">
   <img src="./avatart.jpeg" class="img-circle"> 
    </a>
    <a href="#" class="navbar-brand">
    <p><b>Hi,</b><?php  echo htmlspecialchars($_SESSION["username"]); ?></p>
    </a>
   
   
</a>
  </div>
  <div class="collapse navbar-collapse" style="margin-right:100px !important;" id="resNav">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Keluar</a></li>
    </ul>
  </div>
</nav>  End of Navigation Bar

<!-- Jumbotron -->
<div class="container">
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>.Welcome to our site.</h1>
      <div class="jumbotron" style="background:#fff !important">
      <div class="wrapper">
        <div class="container">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Salary</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                             $no = 1;
                             if (is_array($datas)){
                             foreach($datas as $row){
                              ?>
                                <tr>
                                 <td><?php echo $no++; ?></td>
                                 <td><?php echo $row['name']; ?></td>
                                 <td><?php echo $row['address']; ?></td>
                                 <td><?php echo $row['salary']; ?></td>
                             </tr>
                             <?php    
                            }
                           }else{
                             ?>
                              <div class="alert alert-info" role="alert">
                              Data Sedang Kosong!
                            </div>
                            <?php
                           }
                            ?>
                                         
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <p>
            <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        </p>
</body> <!-- End of Jumbotron -->
<style>
/* Navigation Bar */
.cc{
    font-size: 25px !important;
  color: white !important;
}
.page-header{
    margin-top:150px;
}
.navbar{
  height:80px;
  padding: 20px 10px 20px 0px;
  background-color: #28a7e9;
  transition: all ease 0.4s;
}
.img-circle{
  border-radius:150px;
  width:80px;
}
.navbar-brand{
  font-size: 23px;
  color: white !important;
}
.navbar .navbar-nav li a{
  font-size: 20px;
  color: white;
}

/* Animation */
.animate{
  padding: 0px 10px 0px 0px;
  transition: all ease 0.4s;
}

/* Jumbotron */
.jumbotron{
  margin-top: 30px;
  box-shadow: 0px 5px 13px rgba(0,0,0,0.44);
}
</style>
</html>