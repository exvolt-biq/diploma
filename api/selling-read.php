<?php

$SQL = "SELECT selling.id, selling.date, buyer.mail, buyer.name, buyer.phone, product.product, product.price, product.supply
FROM selling
LEFT JOIN product
ON selling.product = product.id
LEFT JOIN buyer
ON selling.buyer = buyer.id;";

$result = $conn->query($SQL);
if(!$result){
  header("location: /index404.php");
  die();
}

?>
