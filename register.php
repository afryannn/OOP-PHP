<?php
$username = $password = $confirm_password = "";
$validate_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST['username']))) {
        $validate_err = "msg1";
    } else {
        $username = trim($_POST['username']);

        if (empty(trim($_POST['password']))) {
            $validate_err = "msg2";
        } else {
            $password = trim($_POST['password']);
            if (empty(trim($_POST['confirm_password']))) {
                $validate_err = "msg3";
            } else if ($password !== trim($_POST['confirm_password'])) {
                $validate_err = "msg4";
            } else {
                $confirm_password = trim($_POST['confirm_password']);
                if (empty($validate_err)) {
                    Header(
                        'Location:./app/Route.php?action=register&username=' . $username . '&password=' . $confirm_password
                    );
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
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
    <style type="./asset/text/css">
    <style type="text/css">body {
        font: 14px sans-serif;
    }

    .wrapper {
        width: 350px;
        padding: 20px;
    }
    </style>
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">

                <a href="login.php" style="text-decoration:none !important;"><span class="login100-form-title p-b-33">
                        Register Account
                    </span></a>
                <?php
                    if ($validate_err == "msg1") {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Username Kosong!
                        </div>
                <?php
                    } else if ($validate_err == "msg2") {
                    ?>
                <div class="alert alert-danger" role="alert">
                    Password Kosong!
                </div>
                <?
                }else if($validate_err == "msg3"){
                ?>
                <div class="alert alert-warning" role="alert">
                    Confirm Password Kosong!
                </div>
                <?php
                } else if($validate_err == "msg4") {
                ?>
                <div class="alert alert-warning" role="alert">
                    Password Tidak Cocok!
                </div>
                <?php
                }else if(isset($_GET['err-uat'])){
                    ?>
                    <div class="alert alert-warning" role="alert">
                    Username Sudah Digunakan!
                </div>
                <?php
                }
                ?>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">

                    <div class="wrap-input100 validate-input <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <input value="<?php echo $username ?>" class="input100" type="text" name="username"
                            placeholder="username">
                    </div>
                    <div class="wrap-input100 rs1 validate-input  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"
                        data-validate="Password is required">
                        <input value="<?php echo $password ?>" class="input100" type="password" name="password"
                            placeholder="Password">
                    </div>
                    <div class="wrap-input100 rs1 validate-input  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"
                        data-validate="Password is required">
                        <input value="<?php echo $confirm_password ?>" class="input100" type="password"
                            name="confirm_password" placeholder="Confirm Password">
                    </div>
                    <div class="container-login100-form-btn m-t-20">
                        <button class="login100-form-btn" value="login">
                            Sign in
                        </button>
                    </div>
                    <?php

?>
                </form>

                <div class="text-center p-t-45 p-b-4">
                    <div class="text-center">
                        <span class="txt1">
                            Punya Akun?
                        </span>

                        <a href="login.php" class="txt2 hov1">
                            Sign in
                        </a>
                    </div>

                </div>
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

</html>