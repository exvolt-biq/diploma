<?php
session_start();
// set_error_handler(function(int $errno, string $errstr, string $errfile = '', int $errline = 0) {
//   echo "123";
//     throw new Exception("$errstr ($errfile, line $errline)");
// });
require_once 'config.php';
// require_once 'controller/view.php';
// require_once 'controller/selling.php';
require_once 'blade.php';
ini_set('display_errors', 1);

$staticRoute = [
  "/" => 'ss',
  "/404.php" => "index404.php",
  "/index404.php" => "index404.php",
];

$requestURI = $_SERVER['REQUEST_URI'] ?? '';

$URI = explode('?', $requestURI)[0];
$routes = explode('/', $URI);

if (isset($staticRoute[$URI])){
  $staticRoute[$URI]();
  die();
}

// print_r($routes);

if (!isset($routes[1]) or !isset($routes[2])){
  http_response_code(404);
  generate('index404.php', ['message' => "not exist path"]);
  die();
}
$controller = $routes[1];

$routes[2] = $routes[2] ?? '';
$method = explode(".", $routes[2])[0];

$controllerFile = "controller/".$controller.".php";
// $view = "controller/".$controller."/".strtolower($routes[1])."";
// echo $controllerFile;

if(file_exists($controllerFile)) {
  require_once $controllerFile;
  if (function_exists($method)) {
    try {
      $method();
      die();
    } catch (\Exception | Error $e) {
      include 'error.php';
    }
  }else {
    http_response_code(404);
    generate('index404.php', ['message' => "not found method"]);
    die();
  }
}
else
{
  http_response_code(404);
  generate('index404.php', ['message' => "not found controller"]);
  die();
}

?>
