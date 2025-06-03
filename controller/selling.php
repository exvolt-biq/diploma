<?php


function delete()
{
  echo "123";
}


function getAll()
{
  $conn=$GLOBALS['conn'];
  include 'api/selling-read.php';
  $res = [];
  while ($r = $result->fetch_array()) {
    $res[] = $r;
  }
  header('Content-Type: application/json');
  echo json_encode($res);
}

function show()
{
  generate('selling-search.php');
}
function updated()
{
  // получить данные записи о продаже
  $SQL = "SELECT selling.id, selling.date, buyer.mail, buyer.name, buyer.phone, product.product, product.price, product.supply
  FROM selling
  LEFT JOIN product
  ON selling.product = product.id
  LEFT JOIN buyer
  ON selling.buyer = buyer.id
  WHERE selling.id = $_GET[id];";
  $conn=$GLOBALS['conn'];
  $result = $conn->query($SQL);
  if(!$result){
    header("location: /index404.php");
    die();
  }
  $res = $result->fetch_array();

  // получить список покупателей
  $SQL = "SELECT id, name FROM `buyer` WHERE 1;";
  $conn=$GLOBALS['conn'];
  $result = $conn->query($SQL);

  $buyerslist = [];
  while ($row = $result->fetch_array()){
    $buyerslist[] = $row;
  }
  $res['buyerslist'] = $buyerslist;
// пук пук пук я человек паук
  $SQL = "SELECT id, product, supply FROM `product` WHERE 1;";
  $conn=$GLOBALS['conn'];
  $result = $conn->query($SQL);

  $productlist = [];
  while ($row = $result->fetch_array()){
    $productlist[] = $row;
  }
  $res['productlist'] = $productlist;
  generate('selling-update.php', $res);
}
function showEdit()
{
  generate();
}

function edit()
{

}

function create()
{


  // получить список покупателей
  $SQL = "SELECT id, name FROM `buyer` WHERE 1;";
  $conn=$GLOBALS['conn'];
  $result = $conn->query($SQL);

  $buyerslist = [];
  while ($row = $result->fetch_array()){
    $buyerslist[] = $row;
  }
  $res['buyerslist'] = $buyerslist;
// пук пук пук я человек паук
  $SQL = "SELECT id, product, supply FROM `product` WHERE 1;";
  $conn=$GLOBALS['conn'];
  $result = $conn->query($SQL);

  $productlist = [];
  while ($row = $result->fetch_array()){
    $productlist[] = $row;
  }
  $res['productlist'] = $productlist;
  $res["dates"] = date('Y-m-d');
  generate('selling-create.php', $res);
}
