<?php

  $sName = $_GET['name'];
  file_put_contents("messages.txt", $sName);
  echo $sName;


?>
