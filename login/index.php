<?php
	if( isset($_GET['username']) AND isset($_GET['pass']) ){
		$user = $_GET['username'];
		$pass = $_GET['pass'];
		//fetch data
		$servername = "localhost";
		$username = "admin";
		$password = "oSDGLO80j2sf";
		$dbname = "stories";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "SELECT email, `password` FROM gatherers WHERE email = '$user' and `password` = '$pass';";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			setcookie('gatherer', $user, time() + (86400 * 30), "/"); // 86400 = 1 day
			header("Location: ../");
		}
		$conn->close();
		// fetch data end
	}
	$appid = "26bc6208-a311-439c-b604-bac4c7868b1a";
	$tennantid = "e1b43892-9a7c-4e7b-9794-d24014da6f25";
	$secret = "~lH8Q~gxqNugqPrUGh~JKXsHPwk3XaEwynoOGdbd";
	$login_url ="https://login.microsoftonline.com/".$tennantid."/oauth2/v2.0/authorize";
	
	session_start ();
	$_SESSION['state']=session_id();

	if (isset ($_SESSION['msatg'])){
		setcookie('gatherer', $_SESSION["uname"], time() + (86400 * 30), "/"); // 86400 = 1 day
		header("Location: ../");
		//echo "<h2>Authenticated ".$_SESSION["uname"]." </h2><br> ";
		//echo '<p><a href="?action=logout">Log Out</a></p>';
	} //end if session
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Save the Children Philippines - Case Stories</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
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
		<!--x
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		-->
		<div class="container-login100" style="background-image: url('https://www.savethechildren.org.ph/__resources/webdata/images/pages/8_og_.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div>
						<p style="text-align:center;">or<br><a href="#"><img src='images/mslogin.png' width="250"></a></p>
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