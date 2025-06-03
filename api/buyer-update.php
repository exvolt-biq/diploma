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
if(!isset($_GET['id'])){
  header("location: /index404.php");
  die();
}
$SQL = "UPDATE `buyer` SET `name`='$_GET[n]',`mail`='$_GET[m]',`phone`='$_GET[p]' WHERE id=$_GET[id]";


$result = $conn->query($SQL);
echo "$result";
if(!$result){
  header("location: /index404.php");
  die();
}


$result->close();
$db->next_result();
?>
