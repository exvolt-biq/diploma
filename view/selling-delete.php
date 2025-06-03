<?php
function err($value=' ') {
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <?php echo $value ?>
    </body>
  </html>
  <?php
  die();
}
if(!isset($_GET['id'])){
  header("location: /index404.php");
  die();
}
$SQL = "DELETE FROM `selling` WHERE id=$_GET[id]";
$result = $conn->query($SQL);
echo "$result";
if(!$result){
  header("location: /index404.php");
  die();
}

$result->close();
$db->next_result();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    Вы молодец  <input type="button" class="button" value="выход" onclick="location.href='/'">
  </body>
</html>
