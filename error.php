<?php
header('Content-Type: application/json');

$res['res'] = false;
$res['title'] = "Server Error Ecxeption by PHP!!";
$res['message'] = $e->getMessage();
$res['file'] = $controllerFile;
$res['method'] =  $method;
$res['exception'] = $e->getPrevious();
$res['eprev'] = $e->getPrevious();
$res['ecode'] = $e->getCode();
$res['efile'] = $e->getFile();
$res['eline'] = $e->getLine();
$res['etrace'] = $e->getTrace();
$res['etracestr'] = $e->getTraceAsString();

echo json_encode($res);
