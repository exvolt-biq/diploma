
<?php print_r($_SERVER['REQUEST_URI']); ?>
<h1>NOT FOUND page</h1>
<h3><?= $message ?></h3>
<div class="" style="display:flex">
  <div class="">
    <?php
    echo "GET: ";
    print_r($_GET);
    echo "<br>POST: ";
    print_r($_POST);
    echo "<br>REQUEST_URI: ";
    print_r($_SERVER['REQUEST_URI']);
    echo "<br>SESSION: ";
    print_r($_SESSION);
    echo "<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

    ?>
  </div>
    <img class="p404-left" class="logo" src="/img/404.jpg" alt="" style="">
</div>

<style media="screen">
  .p404-left{
    width:33%;
    margin-left: auto;
    margin-right: auto;
  }
  h3{
    text-align: center;
  }
</style>
