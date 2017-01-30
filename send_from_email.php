<<?php
  if(isset($_POST['email'])) {

    $email_to = $_POST['email'];
    $email_subject = "Your booking details: ";

    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $date = $_POST['date'];
    $count = $_POST['count'];
    $time = date("D G:i:s A");
    $email_from = "thegrund@thegrund.ro";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $email_message = '<html><body>';
    $email_message .= "<h1>Booking details below: </h1>\n\n";
    $email_message .= "<ul><li><h3>First Name: ".clean_string($first_name)."</h3></li>\n";
    $email_message .= "<li><h3>Last Name: ".clean_string($last_name)."</h3></li>\n";
    $email_message .= "<li><h3>Email: ".clean_string($email_to)."</h3></li>\n";
    $email_message .= "<li><h3>Reservation time: ".clean_string($time)."</h3></li>\n";
    $email_message .= "<li><h3>Date Of Your Booking: ".clean_string($date)."</h3></li>\n";
    $email_message .= "<li><h3>Number of guests: ".clean_string($count)."</h3></li></ul>\n";
    $email_message .= "<h2>Activate your booking by clicking this link bellow: </h2>\n";
    $email_message .= "<h2>http://urban.esy.es/verify.php?verification-key=A1B2C3 </h2>\n";
    $email_message .= "</body></html>";

    $retval = @mail($email_to, $email_subject, $email_message, $headers);

    if($retval == true) {
      header('Location: index.php');
    } else {
      echo "Msg was NOT sent";
    }

  }


?>
