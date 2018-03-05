<?php
if(!isset($GLOBALS['on'])){
    die("You do not have permission to read this file");
}

$host='localhost';
$user='root';
$pass='';
$db='test';

$jsdirectory="/views/js/";
$jsbundle=array("/jquery.min.js","bootstrap.min.js");

$styledirectory="/views/css/";


$renderjs=function(){
    foreach($GLOBALS['jsbundle'] as $file) {
  echo  '<script src="'.$GLOBALS['jsdirectory'].$file.'"></script>';
  echo "\n";
}  
}
?>