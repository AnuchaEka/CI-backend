<?php
if (!defined("BASEPATH"))
exit("No direct script access allowed");

class Func {

    public function createslug($string)
    {
       $string = preg_replace("`\[.*\]`U","",$string);
       $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
       $string = str_replace('%', '-percent', $string);
       $string = htmlentities($string, ENT_COMPAT, 'utf-8');
       $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
       $string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
       return strtolower(trim($string, '-'));
   
    }

    public function sysDatetime($dates){
        if($dates!=""){
          list($d,$t) = explode(' ', $dates);
          list($year,$month ,$day ) = explode('-', $d);
          return $day."/".$month."/".$year." ".$t ;
        }else{
          return "00/00/0000 00:00:00";
        }
     
      }


}

?>