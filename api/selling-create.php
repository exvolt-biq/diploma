<?php
include '../config.php';

print_r($_GET);

if(!isset($_GET['d'])){
  header("location: /index404.php");
  die();
}
if(!isset($_GET['b'])){
  header("location: /index404.php");
  die();
}
if(!isset($_GET['p'])){
  header("location: /index404.php");
  die();
}

$SQL = "INSERT INTO `selling` (`date`, `buyer`, `product`) VALUES ('$_GET[d]','$_GET[b]','$_GET[p]')";


$result = $conn->query($SQL);
if(!$result){
  header("location: /index404.php");
  die();
}


$result->close();
$db->next_result();
?>
