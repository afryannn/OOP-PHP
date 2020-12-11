<?php
include('../app/Controller.php');
$func = New Controller();
$datas = $func->tampildata();
$success_add_new_data = "NcLUuyMe22T9BrEg7XvudXcRMpLckcmBcnNGFj7Mh9hFaLkA4auhnjZFnneM9zgZBARSTT6U6JSmkByC37RyzZUbSQoqo3kEvxz5";
$success_reset_password = "3JUEGRhBJ82f9pk9p8iTjRMzxvDoaYKs24n5yQQazjLz8mgAEEnsD6fydsn3ffkdoqbRnZE4sYHrjKD6mEtSX9iRnu28uBEhZkt3CMUAtKmRn6t4jv5xqhLU";
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== "admin"){
    header("location:../error/1.html");
    exit;
}
unset($_SESSION["bind_item_id"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
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
    <style type="text/css">
    <style type="text/css">body {
        background-color: #f8f9fa;
        font: 14px sans-serif;
        text-align: center;
    }
    </style>
    <script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
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
                <img src="../asset/avatart.jpeg" class="img-circle">
            </a>
            <a href="#" class="navbar-brand">
                <p><b>Hi Admin,</b><?php  echo htmlspecialchars($_SESSION["username"]); ?></p>
            </a>
            </a>
        </div>
        <div class="collapse navbar-collapse" style="margin-right:100px !important;" id="resNav">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../app/Route.php?action=logout">
                        <i class="fa fa-sign-out"></i>
                        Keluar
                    </a>
                </li>
            </ul>
        </div>
    </nav> End of Navigation Bar

    <!-- Jumbotron -->
    <div class="container">
        <div class="page-headerr">
            <div class="jumbotron" style="background:#fff !important">
                <div class="wrapper">
                    <div class="container">
                        <div class="card">
                            <?php
                             if(isset($_GET[$success_reset_password])){
                                 ?>
                            <div class="alert alert-success" role="alert">
                               <i class="fa fa-check-square"></i>
                                Password Berhasil Diubah
                            </div>
                            <?php
                             }elseif(isset($_GET[$success_add_new_data])){
                                 ?>
                                 <div class="alert alert-info" role="alert">
                                 <i class="fa fa-database"></i>
                                 Berhasil Menambahkan Employe
                              </div>
                                <?php
                             }
                             ?>
                            <script>
                            $(document).ready(function() {
                                window.setTimeout(function() {
                                    $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                                        $(this).remove();
                                    });
                                }, 5000);
                            });
                            </script>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <center>#</center>
                                            </th>
                                            <th scope="col">
                                                <center>Nama</center>
                                            </th>
                                            <th scope="col">
                                                <center>Alamat</center>
                                            </th>
                                            <th scope="col">
                                                <center>Salary</center>
                                            </th>
                                            <th scope="col">
                                                <center>Lihat</center>
                                            </th>
                                            <th scope="col">
                                                <center>Ubah</center>
                                            </th>
                                            <th scope="col">
                                                <center>Hapus</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                     if(is_array($datas)){
                                         foreach($datas as $datas){
                                        ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $datas['id']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $datas['name']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $datas['address']; ?></center>
                                            </td>
                                            <td>
                                                <center><?php echo $datas['salary']; ?></center>
                                            </td>
                                            <td>
                                                <center><a
                                                        href='../app/Route.php?action=readdatauser&id=<?php echo $datas['id'];?>'
                                                        title='View Record' data-toggle='tooltip'><span
                                                            class='glyphicon glyphicon-eye-open'></span></a></center>
                                            </td>
                                            <td>
                                                <center><a
                                                        href='../app/Route.php?action=update&id=<?php echo $datas['id'];?>'
                                                        title='Update Record' data-toggle='tooltip'><span
                                                            class='glyphicon glyphicon-pencil'></span></a></center>
                                            </td>

                                            <td>
                                                <center>
                                                    <a title='Delete Record'
                                                        href='../app/Route.php?action=deleteitem&d_id=<?php echo $datas['id'];?>'
                                                        data-toggle='tooltip'><span
                                                            class='glyphicon glyphicon-trash'></span>
                                                </center>
                            </div>
                            </td>
                            </tr>
                            <?php
                                         }
                                     }
                                    ?>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <p>
                    <a href="create.php" style="margin-left:13px !important;" class="btn btn-success">Tambah
                        Data</a>
                    <a href="../reset-password.php" style="margin-left:13px !important;" class="btn btn-warning">Reset
                        Password
                        Data</a>
                </p>

</body>
<style>
/* Navigation Bar */
.cc {
    font-size: 25px !important;
    color: white !important;
}

.page-headerr {
    margin-top: 150px;
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