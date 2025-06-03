<?php
include '../config.php';

print_r($_GET);

if(!isset($_GET['p'])){
  header("location: /index404.php");
  die();
}
if(!isset($_GET['pr'])){
  header("location: /index404.php");
  die();
}
if(!isset($_GET['s'])){
  header("location: /index404.php");
  die();
}

$SQL = "INSERT INTO `product` (`product`, `price`, `supply`) VALUES ('$_GET[p]','$_GET[pr]','$_GET[s]')";


$result = $conn->query($SQL);
if(!$result){
  header("location: /index404.php");
  die();
}


$result->close();
$db->next_result();
?>
