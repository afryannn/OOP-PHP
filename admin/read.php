<?php
include('../app/Controller.php');
$con = new Controller();
$result = $con->read_data();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Lihat Data Pekerja</title>
    <link rel="icon" type="image/png" href="./asset/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./asset/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./asset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="./asset/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="./asset/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="./asset/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="./asset/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="./asset/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="./asset/css/util.css">
    <link rel="stylesheet" type="text/css" href="./asset/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    <style type="text/css">body {
        background-color: #f8f9fa;
        font: 14px sans-serif;
        text-align: center;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#resNav">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand" style="margin-left:90px !important;">

            </a>
            <a href="#" class="navbar-brand">
                <p>Detail</p>
            </a>
            </a>
        </div>
        <div class="collapse navbar-collapse" style="margin-right:100px !important;" id="resNav">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./app/Route.php?action=logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Keluar</a>
                </li>
            </ul>
        </div>
    </nav> End of Navigation Bar

    <!-- Jumbotron -->
    <div class="container">
        <div class="page-headerr">
            <div class="jumbotron cus-j" style="background:#fff !important; width:500px;">
                  <div class="hhecho $result["name"];-1">
                  <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nama</label>
                        <p class="form-control-static"><?php echo $result["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <p class="form-control-static"><?php echo $result["address"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Gaji</label>
                        <p class="form-control-static"><?php echo $result["salary"]; ?></p>
                    </div>
                   <center><p><a href="index.php" class="btn btn-primary">Kembali</a></p></center>
                </div>
            </div>        
        </div>
            </div></>
        </div>
    </div>
    <script src="./asset/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="./asset/vendor/animsition/js/animsition.min.js"></script>
    <script src="./asset/vendor/bootstrap/js/popper.js"></script>
    <script src="./asset/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./asset/vendor/select2/select2.min.js"></script>
    <script src="./asset/vendor/daterangepicker/moment.min.js"></script>
    <script src="./asset/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="./asset/vendor/countdowntime/countdowntime.js"></script>
    <script src="./asset/js/main.js"></script>
</body>
<style>
/* Navigation Bar */
.cc {
    font-size: 25px !important;
    color: white !important;
}
.hh-1{
   
}
.page-headerr {
    margin-top: 130px;
}
.cus-j{
    margin:0 auto;
}

.navbar {
    height: 80px;
    padding: 20px 10px 20px 0px;
    background-color: #28a7e9;
    transition: all ease 0.4s;
}

.img-circle {
    border-radius: 150px;
    width: 80px;
}

.navbar-brand {
    font-size: 23px;
    color: white !important;
}

.navbar .navbar-nav li a {
    font-size: 20px;
    color: white;
}

/* Animation */
.animate {
    padding: 0px 10px 0px 0px;
    transition: all ease 0.4s;
}

/* Jumbotron */
.jumbotron {
    margin-top: 30px;
    box-shadow: 0px 5px 13px rgba(0, 0, 0, 0.44);
}
</style>

</html>