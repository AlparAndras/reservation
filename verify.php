<?php

  $sKey = $_GET['verification-key'];

  $sData = file_get_contents("verification-code.txt");

  $oData = json_decode($sData);
  $sValidKey = $oData->validKey;
  $iStatus = $oData->verified;

  if ($sKey == $sValidKey && $iStatus == 0) {
    $oData->verified = 1;

    $sFinalData = json_encode($oData);
    file_put_contents("verification-code.txt", $sFinalData);
    header("Location: verified.html");
    exit;
  }
  else if($sKey == $sValidKey && $iStatus == 1){
    header("Location: already-verified.html");
    exit;
  }

  header("Location: not-verified.html");

?>
