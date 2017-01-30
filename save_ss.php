<?php

  $sTables = file_get_contents("tables.json");
  $aTables = json_decode($sTables);


  //SAVE

  $newTable = new stdClass();
  $sNrOfTable = $_POST["number"];
  $sSeatNr = $_POST["seatnr"];
  $sAvTables = $_POST["available"];
  $sCount = $_POST["count"];

  $newTable->id = uniqid();
  $newTable->number = $sNrOfTable;
  $newTable->seatnr = $sSeatNr;
  $newTable->available = $sAvTables;
  $newTable->count = $sCount;

  //echo "<pre>" - indented echo ;
  print_r($newTable);

  array_push($aTables, $newTable);
  $sConvertToFile = json_encode($aTables);
  file_put_contents("tables.json", $sConvertToFile);

  echo "saved";

?>
