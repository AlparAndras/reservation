<?php
  session_start();

  $mysql_user = "thegrund_admin";
  $mysql_password = "Ridemore#1";
  $mysql_database = "thegrund_auth";
  $user_table = "users";

  //$conn = mysqli_connect("Localhost", $mysql_user, $mysql_password, $mysql_database);

  $localhost = mysqli_connect("localhost", "root", "", "auth");


  if($localhost === false) {
    die("ERROR: could not connect." . mysqli_connect_error());
  }
  // $select = mysqli_select_db($mysql_database, $conn) or die("Opps some thing went wrong");

  if(isset($_POST['register_btn'])) {
    $email = $_POST['email'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];
    $rem = mysql_real_escape_string($_POST['rem']);
    if($pwd == $pwd2) {
      $pwd = md5($pwd);
      $sql = "INSERT INTO $user_table (email, first, last, uid, pwd, rem) VALUES ('$email', '$first', '$last', '$uid', '$pwd', '$rem')";
      if(mysqli_query($localhost, $sql)) {
        header("Location: index.php");
        echo "record added";
      } else {
        //echo "ERROR: could not execute $sql. " . mysqli_error($conn);
      }
      //mysqli_close($conn);
    } else {
      $_SESSION['message'] = "Pass not matched!";
    }
  }






?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>

      body {
        background-color: #153243;
      }
      .register-page {
        width: 360px;
          padding: 8% 0 0;
          margin: auto;
          display: block;
      }

      .register {
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

      #register_btn {
  		  border: 0;
  		  background: #0087cc;
  		  border-radius: 4px;
  		  box-shadow: 0 5px 0 #006599;
  		  color: #fff;
  		  cursor: pointer;
  		  font: inherit;
  		  margin: 0;
  		  outline: 0;
  		  padding: 12px 20px;
  		  transition: all .1s linear;
  		}
  		#register_btn:active {
  		  box-shadow: 0 2px 0 #006599;
  		  transform: translateY(3px);
  		}


    </style>
  </head>
  <body>
    <div class="register">
  		<div class="row">
  			<div class="register-page">
  				<div class="form">
            <div class="jumbotron">
              <img src="img/logo_small.png" alt="logo">
            </div>
  					<form method="POST" action="register.php">
              <table>
                <ul class="nav nav-tabs">
    						  <li role="presentation"><a href="login.php">Login</a></li>
                  <li role="presentation" class="active"><a href="register.php">Register</a></li>
    						</ul>
                <hr>
                <tr>
                  <td><input type="text" name="email" class="textInput" placeholder="E-mail"></td>
                </tr>
                <tr>
                  <td><input type="text" name="first" class="textInput" placeholder="Firstname"></td>
                </tr>
                <tr>
                  <td><input type="text" name="last" class="textInput" placeholder="Lastname"></td>
                </tr>
                <tr>
                  <td><input type="text" name="uid" class="textInput" placeholder="Username"></td>
                </tr>
                <tr>
                  <td><input type="password" name="pwd" class="textInput" placeholder="Password"></td>
                </tr>
                <tr>
                  <td><input type="password" name="pwd2" class="textInput" placeholder="Password Again"></td>
                </tr>
                <tr>
                  <td>
                    <input type="checkbox" name="rem" value="1">Register as <strong>INSIDER</strong>
                  </td>
                </tr>
                <tr>
                  <td>
                    <hr>
                    <input type="submit" id = "register_btn" name = "register_btn" value="Register">
                    <!-- <button>
                      <a href="login.php">
                        User Login
                      </a>
                      <span class="glyphicon glyphicon-user"></span>
                    </button> -->
                  </td>
                </tr>
              </table>


  						<!-- <input type="text" name="txtUserName" id="user" placeholder="username">
  						<input type="password" name="txtPassword" id="password" placeholder="password">
  						<button id="login" class="btn btn-success">Login</button> -->

  					</form>
  				</div>
  			</div>
  		</div>
   	</div>
  </body>
</html>
