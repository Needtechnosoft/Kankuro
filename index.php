<?php
/*
@kankuro framework
@coded by chhatraman shrestha (https://github.com/chhatraman08/)
@contact cms111000111@gmail.com ,chhatramanshrestha@outlook.com, +9779800916365, +977021545815 (Nepal)
@company Need Technosoft (http://www.needtech.com/)
@help by Krishna Rai, Gopal Ghimire (https://github.com/gopalghimire1/)
*/
$GLOBALS['on']=true;
require "env.php";
require "controller.php";
$s=$_SERVER['REQUEST_URI'];
$arr=explode("/",$s);

if($_SERVER['REQUEST_METHOD']==="POST"){
post($arr[1]);
}else{
if(count($arr)>2){
    getwithargs($arr[1],array_slice($arr,2,count($arr)-2));
}else{
 get($arr[1]);
}
   
}

?>