<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli("mySQL-8.0", "root", "", "dm");
if(mysqli_connect_errno()){
 echo mysqli_connect_error();
 die();
}
?>
