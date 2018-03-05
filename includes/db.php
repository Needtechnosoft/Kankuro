<?php
$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/env.php";
   include_once($path);
require $path;
$conn =new mysqli($host,$user,$pass,$db); 
if ($conn->connect_error) {
   throw new Exception("Server Cannot be Connected Please check the env file", 1);
   exit;
} 


class dbset{
    public $table;
 function __construct($name) {
$this->table=$name;
 }

 public function tolist(){
     $conn=$GLOBALS['conn'];
     $sql="select * from " . $this->table;
     $data=[];
     $rows=$conn->query($sql);
     if($rows->num_rows>0){
        while($row=$rows->fetch_assoc()){
            array_push($data,(object)$row);
        } 
        return $data;
     }else{
        return null;
     }
 }

 public function where(...$vars){
     
     $conn=$GLOBALS['conn'];
     $sql="select * from " . $this->table ." where ";
     if((count($vars) % 2) == 0 or count($vars)<3 ){
         throw new Exception("Invalid no of key and pair values", 1);
     }
    $n=0;
    while($n<count($vars)-2 ){
          $n = $n+1;
          if($n>2){
              $sql.=$vars[0]." ";
          }
        $sql.=$vars[$n] ."=" ;
      $n = $n+1;
      if(gettype($vars[$n])=='string'){
        $sql.="'".$vars[$n] ."' " ; 
      }else{
        $sql.=$vars[$n] ." " ; 
      }
          
    }
      $data=[];
     $rows=$conn->query($sql);
     if($rows->num_rows>0){
        while($row=$rows->fetch_assoc()){
            array_push($data,(object)$row);
        } 
        return $data;
     }else{
        return null;
     }
     
 }

 public function insert(...$vars){
      $conn=$GLOBALS['conn'];
     $sql="insert into  " . $this->table ." values(";
     if( count($vars)<1 ){
         throw new Exception("Invalid no of values", 1);
     }
    $n=0;

    while($n<count($vars)){
        if($n>0){
              $sql.=",";
          }
              if(gettype($vars[$n])=='string'){
        $sql.="'".$vars[$n] ."'" ; 
      }else{
        $sql.=$vars[$n]; 
      }
       $n = $n+1;
    }
    $sql.=")";
   return $conn->query($sql);
 }

 public function update($set,$where){
           $conn=$GLOBALS['conn'];
     $setval="";
     $updateval="";
     $n=0;
     while($n<=count($set)-2){ 
          if($n>1){
              $setval.=",";
          }
        $setval.=$set[$n] ."=" ;
      $n = $n+1;
      if(gettype($set[$n])=='string'){
        $setval.="'".$set[$n] ."' " ; 
      }else{
        $setval.=$set[$n] ." " ; 
      } 
       $n = $n+1; 
 }

 $n=0;
    while($n<count($where)-2 ){
          $n = $n+1;
          if($n>2){
              $updateval.=$where[0]." ";
          }
        $updateval.=$where[$n] ."=" ;
      $n = $n+1;
      if(gettype($where[$n])=='string'){
        $updateval.="'".$where[$n] ."' " ; 
      }else{
        $updateval.=$where[$n] ." " ; 
      }
    }
 $sql="update ".$this->table ." Set ".$setval." where ".$updateval;
   return $conn->query($sql);
}

public function delete(...$vars){
     
     $conn=$GLOBALS['conn'];
     $sql="delete from " . $this->table ." where ";
     if((count($vars) % 2) == 0 or count($vars)<3 ){
         throw new Exception("Invalid no of key and pair values", 1);
     }
    $n=0;
    while($n<count($vars)-2 ){
          $n = $n+1;
          if($n>2){
              $sql.=$vars[0]." ";
          }
        $sql.=$vars[$n] ."=" ;
      $n = $n+1;
      if(gettype($vars[$n])=='string'){
        $sql.="'".$vars[$n] ."' " ; 
      }else{
        $sql.=$vars[$n] ." " ; 
      }
          
    }
     
     return $conn->query($sql);
    
     
 }
}
?>