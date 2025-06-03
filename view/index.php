<?php

?>
<!DOCTYPE html>
<html dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="/css/master.css">
</head>
<body>
  <h1>учет продаж</h1>
  <ul>
    <li>
      <h3> <a href="/view/selling-search.php"> Продажи </a> </h3>
      <ul>
        <li> <a href="/api/selling-create.php?d=150305&p=1&b=1">Create</a> </li>
        <li> <a href="/api/selling-read.php">Read</a> </li>
        <li> <a href="/api/selling-update.php?d=110305&p=1&b=1&id=7">Update</a> </li>
        <li> <a href="/api/selling-delete.php?id=7">Delete</a> </li>
      </ul>
    </li>
    <li>
      <h3>клиенты</h3>
      <ul>
        <li> <a href="/api/buyer-create.php?n=Игорь Гадов Витальевич&m=mail@mail.ru&p=+79519998877">Create</a> </li>
        <li> <a href="/api/buyer-read.php">Read</a> </li>
        <li> <a href="/api/buyer-update.php?n=Михаил Пригожин Петров&m=mails@mail.ru&p=+7666556663322&id=3">Update</a> </li>
        <li> <a href="/api/buyer-delete.php?id=4">Delete</a> </li>
      </ul>
    </li>
    <li>
      <h3>товары</h3>
      <ul>
        <li> <a href="api/product-create.php?p=дилдо&pr=1000&s=66">Create</a> </li>
        <li> <a href="/api/product-read.php">Read</a> </li>
        <li> <a href="/api/product-update.php?p=дилдос&pr=100&s=10&id=3">Update</a> </li>
        <li> <a href="/api/product-delete.php?id=3">Delete</a> </li>
      </ul>
    </li>
  </ul>
  <h2>Основные формы</h2>
  <ul>
    <li>
      <h3>Продажи</h3>
      <ul>
        <li> <a href="">Создание</a> </li>
        <li> <a href="">Поиск</a> </li>
        <li> <a href="">Изменение</a> </li>
        <!-- <li> <a href="">Удаление</a> </li> -->
      </ul>
    </li>
    <li>
      <h3>клиенты</h3>
      <ul>
        <li> <a href="/api/buyer-create.php?n=Игорь Гадов Витальевич&m=mail@mail.ru&p=+79519998877">Create</a> </li>
        <li> <a href="/api/buyer-read.php">Read</a> </li>
        <li> <a href="/api/buyer-update.php?n=Михаил Пригожин Петров&m=mails@mail.ru&p=+7666556663322&id=3">Update</a> </li>
        <li> <a href="/api/buyer-delete.php?id=4">Delete</a> </li>
      </ul>
    </li>
    <li>
      <h3>товары</h3>
      <ul>
        <li> <a href="api/product-create.php?p=дилдо&pr=1000&s=66">Create</a> </li>
        <li> <a href="/api/product-read.php">Read</a> </li>
        <li> <a href="/api/product-update.php?p=дилдос&pr=100&s=10&id=3">Update</a> </li>
        <li> <a href="/api/product-delete.php?id=3">Delete</a> </li>
      </ul>
    </li>
  </ul>
  <div class="selling">
    dddd
  </div>
  <div class="button">
    dcxc
  </div>
</body>
</html>
