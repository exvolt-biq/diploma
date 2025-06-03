<?php
include '../config.php';

$SQL = "SELECT buyer.mail, buyer.name, buyer.phone
FROM buyer";

$result = $conn->query($SQL);
if(!$result){
  header("location: /index404.php");
  die();
}

while ($row = $result->fetch_object()){
  print_r($row);
  echo "<br>";
}

$result->close();
$db->next_result();
?>
