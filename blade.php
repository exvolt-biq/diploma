<?php

class view
{
  function __construct($argument)
  {

  }

}
function generate($view="index.php", $data=NULL, $template='template.php')
{
  $conn = $GLOBALS['conn'];
  if(is_array($data)) {
    extract($data);
  }
  include "view/template.php";
}
