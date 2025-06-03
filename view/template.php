<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title> <?= (isset($title))? $title : "title"; ?></title>
    <!-- <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script> -->
    <script src="/css/vue.global.js"></script>
    <script src="/css/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="/css/masters.css">

</head>
<body>
  <header>
    <!-- <img src="" alt=""> -->
    <!-- <a href="#"> {{ USERNAME }} </a>
    <button type="button" name="button">Зарегистрироваться</button>
    <button type="button" name="button">Войти</button>
    <button type="button" name="button">Выйти</button> -->
    <a href="/selling/show.php">На главную</a>
    <?php
    session_start();
    // print_r($_SESSION);
    if (isset($_SESSION['id'])) {
      echo "user is $_SESSION[username] ($_SESSION[id])";
      echo "<a href=''>Выйти</a>";
      echo "<a href=''> {{ USERNAME }} </a>";
    } else {
      ?>
        <button type="button" onclick="location.href='/app/reg.php'" name="button">Зарегистрироваться</button>
        <button type="button" onclick="location.href='/app/logs.php'" name="button">Войти</button>
        <button type="button" name="button">Выйти</button>
      <?php } ?>
  </header>
  <?php include $view; ?>
  <br>
  <div class="f">
    <ul>
      <h3>О нас</h3>
      <li>Обратная связь</li>
      <li>Почта</li>
      <li>Почта резерв</li>
    </ul>
  </div>
  <style media="screen">
    .f{
      padding-top: 25px;
      background-color: #215;
      width: 100%;
      height: 100vh;
      margin-top: 50vh;
      color: white;
    }
  </style>
</body>
</html>
