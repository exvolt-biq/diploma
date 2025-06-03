<?php
include '../config.php';

print_r($_GET);

if(!isset($_GET['n'])){
  header("location: /index404.php");
  die();
}
if(!isset($_GET['m'])){
  header("location: /index404.php");
  die();
}
if(!isset($_GET['p'])){
  header("location: /index404.php");
  die();
}

$SQL = "INSERT INTO `buyer` (`name`, `mail`, `phone`) VALUES ('$_GET[n]','$_GET[m]','$_GET[p]')";


$result = $conn->query($SQL);
if(!$result){
  header("location: /index404.php");
  die();
}


$result->close();
$db->next_result();
?>
