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
if(!isset($_GET['id'])){
  header("location: /index404.php");
  die();
}
$SQL = "UPDATE `product` SET `product`='$_GET[p]',`price`='$_GET[pr]',`supply`='$_GET[s]' WHERE id=$_GET[id]";


$result = $conn->query($SQL);
echo "$result";
if(!$result){
  header("location: /index404.php");
  die();
}


$result->close();
$db->next_result();
?>
