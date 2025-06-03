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
if(!isset($_GET['id'])){
  header("location: /index404.php");
  die();
}
$SQL = "UPDATE `selling` SET `date`='$_GET[d]',`buyer`='$_GET[b]',`product`='$_GET[p]' WHERE id=$_GET[id]";


$result = $conn->query($SQL);
echo "$result";
if(!$result){
  header("location: /index404.php");
  die();
}


$result->close();
$db->next_result();
?>
