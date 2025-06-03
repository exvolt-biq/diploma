<?php
include '../config.php';

print_r($_GET);


if(!isset($_GET['id'])){
  header("location: /index404.php");
  die();
}
$SQL = "DELETE FROM `selling` WHERE id=$_GET[id]";


$result = $conn->query($SQL);
echo "$result";
if(!$result){
  header("location: /index404.php");
  die();
}


$result->close();
$db->next_result();
?>
