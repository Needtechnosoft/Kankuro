<?php
if(!isset($GLOBALS['on'])){
    die("You do not have permission to read this file");
}

$host='';
$user='';
$pass='';
$db='';

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
