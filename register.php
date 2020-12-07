<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password ,role) VALUES (?, ?,'user')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="icon" type="image/png" href="./asset/images/icons/favicon.ico"/>
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
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
			
					<span class="login100-form-title p-b-33">
						Sign Up
                    </span>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

					<div class="wrap-input100 validate-input <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
						<input class="input100" type="text" name="username" placeholder="username" value="<?php echo $username;?>">
                    </div>
                    <span class="help-block" style="color:red !important;"><?php echo $username_err; ?></span>
                    
                    <div class="wrap-input100 rs1 validate-input  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
                    </div>
                    <span class="help-block" style="color:red !important;"><?php echo $password_err; ?></span>


                    <div class="wrap-input100 rs1 validate-input  <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>" data-validate="Password is required">
						<input class="input100" type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
                    </div>
                    <span class="help-block" style="color:red !important;"><?php echo $confirm_password_err; ?></span>



					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn" value="login">
							Sign up
						</button>
                    </div>
                   </form>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="reset-password.php" class="txt2 hov1">
					      Password?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="login.php" class="txt2 hov1">
							Sigin
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