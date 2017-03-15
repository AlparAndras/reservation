<?php
if(!session_id()) {
    session_start();
}
  require_once __DIR__ . '/vendor/autoload.php';
  $fb = new Facebook\Facebook([
    'app_id' => '797324727057589', // Replace {app-id} with your app id
    'app_secret' => 'e05ee133c751d55ba2dc0ee5bc39f210',
    'default_graph_version' => 'v2.2',
  ]);

    $helper = $fb->getRedirectLoginHelper();
  $_SESSION['FBRLH_state']=$_GET['state'];

    try {
    $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
    }

    if ( !isset($accessToken) ) {
    if ($helper->getError()) {
      header('HTTP/1.0 401 Unauthorized');
      echo "Error: " . $helper->getError() . "\n";
      echo "Error Code: " . $helper->getErrorCode() . "\n";
      echo "Error Reason: " . $helper->getErrorReason() . "\n";
      echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
      header('HTTP/1.0 400 Bad Request');
      echo 'Bad request';
    }
    exit;
    }

      // The OAuth 2.0 client handler helps us manage access tokens
      $oAuth2Client = $fb->getOAuth2Client();

      // Get the access token metadata from /debug_token
      $tokenMetadata = $oAuth2Client->debugToken($accessToken);

    if( isset($_GET["debug"]) ){
      // Logged in
      echo '<h3>Access Token</h3>';
      var_dump($accessToken->getValue());

      echo '<h3>Metadata</h3>';
      var_dump($accessToken);
    }

      // Validation (these will throw FacebookSDKException's when they fail)
      $tokenMetadata->validateAppId('797324727057589'); // Replace {app-id} with your app id
      // If you know the user ID this access token belongs to, you can validate it here
      //$tokenMetadata->validateUserId('123');
      $tokenMetadata->validateExpiration();

      if (! $accessToken->isLongLived()) {
        // Exchanges a short-lived access token for a long-lived one
        try {
          $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
          echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
          exit;
        }

        echo '<h3>Long-lived</h3>';
        var_dump($accessToken->getValue());
      }

    $_SESSION['fb_access_token'] = (string) $accessToken;


try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,first_name,email,last_name,picture.type(large)', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();


  $mysql_user = "thegrund_admin";
  $mysql_password = "Ridemore#1";
  $mysql_database = "thegrund_auth";
  $user_table = "auth";

  $conn = mysqli_connect("Localhost", $mysql_user, $mysql_password, $mysql_database);

	// $localhost = mysqli_connect("192.168.1.3", "root", "", "auth");

  // $localhost = mysqli_connect("localhost", "root", "", "users");


  if($conn === false) {
    die("ERROR: could not connect." . mysqli_connect_error());
  }
  // $select = mysqli_select_db($mysql_database, $conn) or die("Opps some thing went wrong");

  if($user) {
    $email = $user['email'];
    $first = $user['first_name'];
    $last = $user['last_name'];
    $uid = $user['id'];
    $picture = $user['picture'];
    $picture = json_decode($picture, true)["url"];
    $picture = urldecode($picture);

  $query = "SELECT COUNT('uid') AS `count` FROM $user_table";
  $newuser = mysqli_fetch_assoc(mysqli_query($conn,$query))["count"];

  if( 1==2 && !$newuser ){
    $sql = "INSERT INTO $user_table (email, first, last, uid) VALUES ('$email', '$first', '$last', '$uid')";
    if(mysqli_query($conn, $sql)) {
      header("Location: index.php");
      echo "registered successfully <br/>";
    } else {
      //echo "ERROR: could not execute $sql. " . mysqli_error($conn);
    }
  }

  $picturedata = file_get_contents($picture);
  $picture = explode("?", $picture)[0];
  $userpicext = pathinfo($picture)["extension"];
  $userpic = __DIR__ . "/img/fbimg/".$uid.".".$userpicext;
  file_put_contents($userpic, $picturedata);

      $_SESSION['message'] = "You are now logged in";
      $_SESSION['rem'] = "INSIDER";
      $_SESSION['first_name'] = $user["first_name"];
      $_SESSION['last_name'] = $user["last_name"];
      $_SESSION['uid'] = $user["id"];
      $_SESSION['email'] = $user["email"];
      header("location: index.php");

    //mysqli_close($conn);
  }


?>
