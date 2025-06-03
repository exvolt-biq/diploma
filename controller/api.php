<?php

function deleteSellingId()
{
  header('Content-Type: application/json');
  $res = ['res' => 'ошибка члена'];
  if(!isset($_GET['id'])){
    $res = ['res' => 'нету id'];
    echo json_encode($res);
    die();
  }
  $SQL = "DELETE FROM `selling` WHERE id=$_GET[id]";

  $result = $SQL;
  $conn = $GLOBALS['conn'];
  // $result = $conn->query($SQL);
  $res['res'] = 'пиздато';
  if(!$result){
    $res['res'] = 'ошибка базы данных:'.$conn->error();
    echo json_encode($res);
    die();
  }

  echo json_encode($res);

}


function updateSelling()
{
  header('Content-Type: application/json');
  $res = ['res' => ''];
  // Проверяем ID первым (самое важное условие)
  if(!isset($_GET['id'])) {
    echo json_encode(['res' => 'нету id']);
    die();
  }
  // Проверяем остальные параметры
  if(!isset($_GET['d'])) {
    echo json_encode(['res' => 'ошибка: параметр date отсутствует']);
    die();
  }
  if(!isset($_GET['b'])) {
    echo json_encode(['res' => 'ошибка: параметр buyer отсутствует']);
    die();
  }
  if(!isset($_GET['p'])) {
    echo json_encode(['res' => 'ошибка: параметр product отсутствует']);
    die();
  }
  $SQL = "UPDATE `selling` SET `date`='$_GET[d]',`buyer`='$_GET[b]',`product`='$_GET[p]' WHERE id=$_GET[id]";
  // echo "$SQL<br>";
  $conn=$GLOBALS['conn'];
  $result = $conn->query($SQL);
  // echo mysqli_error($conn);
  $res['res'] = 'пиздато';
  if(!$result){
    header("location: /index404.php");
    $res['res'] = 'ошибка базы данных:'.$conn->error();
    echo json_encode($res);
    die();
  }

  echo json_encode($res);
}


function createSelling()
{
  header('Content-Type: application/json');
  $res = ['res' => ''];
  if(!isset($_GET['d'])) {
    echo json_encode(['res' => 'ошибка: параметр date отсутствует']);
    die();
  }
  if(!isset($_GET['b'])) {
    echo json_encode(['res' => 'ошибка: параметр buyer отсутствует']);
    die();
  }
  if(!isset($_GET['p'])) {
    echo json_encode(['res' => 'ошибка: параметр product отсутствует']);
    die();
  }
  $conn=$GLOBALS['conn'];

  $SQL = "SELECT supply from `product` WHERE id='$_GET[p]'";
  $result = $conn->query($SQL);
  if(!$result){
    $res = ["res" => false, "newid" => -1, "sql" => $SQL, 'sqle' => $conn->error,
    'result' => $result, 'msg' => 'supply update error'];
    echo json_encode($res);
    die();
  }

  $supply = $result->fetch_array()['supply'];
  if ($supply <= 0) {
    $res = ["res" => false, "newid" => -1, "sql" => $SQL, 'sqle' => $conn->error,
    'result' => $result, 'msg' => 'supply level error'];
    echo json_encode($res);
    die();
  }

  // $SQL = "";
  // $result = $conn->query($SQL);
  // if(!$result){
  //   $res = ["res" => false, "newid" => -1, "sql" => $SQL, 'sqle' => $conn->error(),
  //   'result' => $result, 'msg' => 'supply update error'];
  //   echo json_encode($res);
  //   die();
  // }

  $SQL = "INSERT INTO `selling`(`date`, `buyer`, `product`) VALUES ('$_GET[d]','$_GET[b]','$_GET[p]');";
  $SQL = $SQL."UPDATE `product` SET supply=".($supply-1)." WHERE id='$_GET[p]'";
  $result = $conn->multi_query($SQL);
  if(!$result){
    $res = ["res" => false, "newid" => -1, "sql" => $SQL, 'sqle' => $conn->error,
    'result' => $result, 'msg' => 'ошибка базы данных:'];
    echo json_encode($res);
    die();
  } else {
    echo json_encode(["res" => true, "newid" => $conn->insert_id, "sql" => $SQL]);
    die();
  }

}
