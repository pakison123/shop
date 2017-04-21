<?php

namespace lib;
class log
{
     public $path ;  

     public function write($subPath='',$str)
     {
         $this->path= app_path.'/log/';
         $domain = $_SERVER['HTTP_HOST'].'/';
         $fimeName =  date('Y-m-d').'.txt';
         $output =  '['.date('Y-m-d H:i:s').']'. $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."\t\n";
         $output .=  $str;
         $dir = $this->path.$subPath.'/'.$domain;
         if(!is_dir($dir))
         {
             $this->addDir($dir) ;
         }
         file_put_contents($dir.'/'.$fimeName,$output,FILE_APPEND | LOCK_EX);
     }

     public function addDir($dir)
     {
            mkdir($dir,0777,true);
     }

}