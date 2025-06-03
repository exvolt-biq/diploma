<?php
include '../config.php';

$SQL = "SELECT product.product, product.price, product.supply
FROM product";

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
