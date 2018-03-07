<?php
class road{
    private $r;
    private $c;
    function __construct($rou,$con){
$this->r=$rou;
$this->c=$con;
    }

    public function getroad(){
        return array($this->r,$this->c);
    }
}
class router{
    private $_get;
private $_post;
public function __construct(){
    $this->_get=[];
    $this->_post=[];
}
    public function get($rou,$con){
        $arr=explode("/",$rou);
        $temp1 =[];
        foreach($arr as $v){
            if(strlen($v)>0){
                $temp1[]=$v;
            }
        }      
       $temp=new road($temp1,$con);
       $this->_get[]=$temp;
      
    }

    public function post($rou,$con){
     $arr=explode("/",$rou);
        $temp1 =[];
        foreach($arr as $v){
            if(strlen($v)>0){
                $temp1[]=$v;
            }
        }      
       $temp=new road($temp1,$con);
       $this->_post[]=$temp;
    }
    
    public function isget($var){
        
        $arr=explode("/",$var);
        $tempparameter =[];
        $parameterlength=0;
        $data=[];
        foreach($arr as $v){
            if(strlen($v)>0){
                $tempparameter[]=$v;
            }
        }      
        $parameterlength=count($tempparameter);
        foreach($this->_get as $val){
            $tempdata =$val->getroad()[0];
            $datalength= count($tempdata);
           
            if($parameterlength<$datalength){
              
            }else{
                if($parameterlength==$datalength){
                    if($tempdata==$tempparameter){
                        get($val->getroad()[1]);
                        exit;
                    }
                }else{
                $rou=  array_slice($tempparameter,0,$datalength);
             
              if($rou===$tempdata){
               
                $data=array_slice($tempparameter,$datalength,$parameterlength-$datalength);
                try{
                getwithargs($val->getroad()[1],$data);
                jsconsole($val);
                exit;
                }catch(Exception $e){
                    
                   jsconsole($e);
                }
                }
              }
             
              
            }
        }
    }

    public function ispost($var){
       
     $arr=explode("/",$var);
        $tempparameter =[];
        $parameterlength=0;

        foreach($arr as $v){
            if(strlen($v)>0){
                $tempparameter[]=$v;
            }
        }      
        $parameterlength=count($tempparameter);
        foreach($this->_post as $val){
            $tempdata =$val->getroad()[0];
            $datalength= count($tempdata);
            if($tempparameter==$tempdata){
                post($val->getroad()[1]);
                exit;
            }
        }
    }
        
}
?>