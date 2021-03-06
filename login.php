<?php
	error_reporting(E_ALL);
	ini_set("display_errors", "On");

	if(!session_id()) {
	    session_start();
	}

	$mysql_user = "thegrund_admin";
	$mysql_password = "Ridemore#1";
	$mysql_database = "thegrund_auth";
	$user_table = "auth";

	$conn = mysqli_connect("Localhost", $mysql_user, $mysql_password, $mysql_database);
	// $localhost = mysqli_connect("192.168.1.3", "root", "", "auth");

	// $localhost = mysqli_connect("localhost", "root", "", "auth");

	if(isset($_POST['login_btn'])) {
		if(isset($_POST['email']) && isset($_POST['uid']) && isset($_POST['pwd'])) {
			$email = $_POST['email'];
			$uid = $_POST['uid'];
			$pwd = $_POST['pwd'];

			$pwd = md5($pwd);
			$sql = "SELECT * FROM $user_table WHERE email='$email' AND uid='$uid' AND pwd='$pwd'";
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) == 1) {
				$_SESSION['message'] = "You are now logged in";
				$_SESSION['rem'] = "INSIDER";
				$_SESSION['uid'] = $uid;
				$_SESSION['email'] = $email;
				header("location: index.php");
			} else {
				$_SESSION['message'] = "Username or password is incorrect!";
			}
		}
	}

#	include_once "./fbtest/src/Facebook/Facebook.php";
require_once __DIR__ . '/vendor/autoload.php';

	$fb = new Facebook\Facebook([
		'app_id' => '797324727057589', // Replace {app-id} with your app id
		'app_secret' => 'e05ee133c751d55ba2dc0ee5bc39f210',
		'default_graph_version' => 'v2.2',
	]);

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['public_profile', 'email']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('http://thegrund.ro/facebook_login.php', $permissions);
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<!-- <link rel="shortcut icon" href="img/favicon.png"  type='image/x-icon' /> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="jquery.js"></script> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">

	<style>
		body {
			background: rgba(43, 33, 24, 0.7);
			/*background-color: #153243;*/
		}

		.login-page-user {
			width: 360px;
			padding: 8% 0 0;
			margin: auto;
			display: block;
		}

		.login {
			width: 720px;
			margin: auto;
		}

		.form {
			position: relative;
			z-index: 1;
			background: #FFFFFF;
			max-width: 360px;
			margin: 0 auto 100px;
			padding: 45px;
			text-align: center;
			box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
		}

		.form input {
			font-family: "Roboto", sans-serif;
			outline: 0;
			background: #f2f2f2;
			width: 100%;
			border: 0;
			margin: 0 0 15px;
			padding: 15px;
			box-sizing: border-box;
			font-size: 14px;
		}

		#login_btn {
		  border: 0;
		    background: rgba(43, 33, 24, 1);
		  border-radius: 4px;
		  box-shadow: 0 5px 0 #5C573E;
		  color: #fff;
		  cursor: pointer;
		  font: inherit;
		  margin: 0;
		  outline: 0;
		  padding: 12px 20px;
		  transition: all .1s linear;
		}
		#login_btn:active {
		  box-shadow: 0 2px 0 #5C573E;
		  transform: translateY(3px);
		}

		#error_msg{
			width: 100%;
			margin: 5px auto;
			height: 30px;
			border: 1px solid #FF0000;
			background: #FFB9B8;
			color: #FF0000;
			text-align: center;
			padding-top: 5px;
		}

		.or {
		  position: absolute;
		  top: 480px;
		  left: 280px;
		  width: 40px;
		  height: 40px;
		  background: #DDD;
		  border-radius: 50%;
		  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
		  line-height: 40px;
		  text-align: center;
		}

	</style>

</head>
<body>
	<div class="login">
		<div class="row">
			<div class="login-page-user">
				<div class="form">
					<div class="jumbotron">
						<img src="img/logo_small.png" alt="logo">
					</div>
					<form method="POST" action="login.php">
						<ul class="nav nav-tabs">
						  <li role="presentation" class="active"><a href="login.php">Login</a></li>
						  <li role="presentation"><a href="register.php">Register</a></li>
						</ul>
						<table>
							<?php
              	if (isset($_SESSION['message'])) {
              		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
              		unset($_SESSION['message']);
              	}
              ?>
							<hr>
							<tr class="inputFields">
								<td><input type="text" name="email" placeholder="E-mail"></td>
							</tr>
							<tr class="inputFields">
								<td><input type="text" name="uid" placeholder="Username"></td>
							</tr>
							<tr class="inputFields">
								<td><input type="password" name="pwd" placeholder="Password"></td>
							</tr>
							<!-- <tr>
								<td>
									<input type="checkbox" name="rem" value="1">
									Login as <strong>INSIDER</strong>
								</td>
							</tr> -->
							<tr>
								<td>
									<input type = "submit" id = "login_btn" name = "login_btn" value="Login">
									<div class="or">OR</div>
									<hr>
									<div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false">
									<?php
									echo '<a style="text-decoration:none;" href="' . htmlspecialchars($loginUrl) . '">
									<img src="img/fblogin.png" alt="Facebook Login"/>
									</a>';
									?>
									</div>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
 	</div>
</body>
</html>
