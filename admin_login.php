<?php
$email1 = filter_input(INPUT_POST, 'email1');
$password1 = filter_input(INPUT_POST, 'password1');

$send=$email1;


session_start();
if(isset($_SESSION['color'])){
  header('location:Dashboard/index.php');
}


if ((!empty($email1)) && (!empty($password1)))
{
    $host = "serverxyz";
    $dbusername = "sbn";
    $dbpassword = "passwordxyz";
    $dbname = "xyzabc";
    // Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
        if (mysqli_connect_error())
        {
          die('Connect Error ('. mysqli_connect_errno() .') '
         . mysqli_connect_error());
        }
        else
        {




          $sql = "SELECT id FROM admin_accounts WHERE email = '$email1' and password = '$password1'";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          
          $count = mysqli_num_rows($result);
          
        
          if($count == 1) {
         

			session_start();

             $_SESSION['email'] = "$send";
             $_SESSION["color"]= "blue";

			 if(isset($_SESSION['color'])){
				 header('location:Dashboard/index.php');
			   }



         
          }else 
          {
             $error = "";
             ?>





















<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	











	<div class="limiter">
		
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		





         















			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				
				<div class="text-center">
				<div class="alert text-white bg-danger d-flex align-items-center" role="alert">
				<div class="alert-icon me-2">
				<i class="ti-alert"></i>
				</div>
				<div class="alert-text" style="text-align: center;"> <b>WRONG CREDENTIALS </b><br> Try Using Correct Email & Password</div>
				</div>

          	</div>
				<form class="login100-form validate-form" method="POST" enctype="multipart/form-data" action="login.php">
					<span class="login100-form-title p-b-49">
						ADMIN LOGIN
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Like xyz@gmail.com (Small Letters)" name="email1" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" pattern="[A-Za-z0-9@!_.]{8,30}" title="Don't use Space & Special Characters excpet ( @ ! _ .) & Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password1" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					
					<div class="text-right p-t-8 p-b-31">
											<!--===============================================================================================

						<a href="#">
							Forgot password?
						</a>
											-->

					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn"  type="submit" name="submit">
								Login
							</button>
						</div>
					</div>



	

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>








<?php




          }


        $conn->close();

            }
        
}


else
{


?>



















<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			<form class="login100-form validate-form" method="POST" enctype="multipart/form-data" action="login.php">
					<span class="login100-form-title p-b-49">
					ADMIN LOGIN
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Like xyz@gmail.com (Small Letters)" name="email1" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" pattern="[A-Za-z0-9@!_.]{8,30}" title="Don't use Space & Special Characters excpet ( @ ! _ .) & Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password1" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					
					<div class="text-right p-t-8 p-b-31">
											<!--===============================================================================================

						<a href="#">
							Forgot password?
						</a>
											-->

					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn"  type="submit" name="submit">
								Login
							</button>
						</div>
					</div>



	

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

























<?php
    die();
}
?>

