<?php
if(!isset($GLOBALS['on'])){
    die("You do not have permission to read this file");
}
require "db.php";
class foo{
public function set($key,$value){
    $this->{$key}=$value;
}
}
$GLOBALS['dataset']=new foo();

function view(...$a){
    $GLOBALS['currentview']=$a[0].".php";
    $GLOBALS['viewbag']=null;
    if(count($a)>1){
  $GLOBALS['viewbag']=$a[1];
    }
    require "views/index.php";
}



function get($a){
    if(function_exists($a)){
$func=$a;
$func();
    }elseif($a==""){
    view("home");
    }else{
      $GLOBALS['dataset']->controller=$a;
       view("error");
    }
}
function post($a){
    if(function_exists($a)){
$func=$a;
$func((object)$_POST);
    }elseif($a==""){
    view("home");
    }else{
      $GLOBALS['dataset']->controller=$a;
       view("error");
    }
}

function   getwithargs($a,$g){
     if(function_exists($a)){
$func=$a;
$func($g);
    }else{
      $GLOBALS['dataset']->controller=$a;
       view("error");
    }
}
?>