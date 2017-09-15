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

      public function buildTree(Array $data, $parent = 0) {
          $tree = array();
         
          foreach ($data as $d) {
              if ($d['cat_parent'] == $parent) {
                  $children = $this->buildTree($data, $d['cat_id']);
                  // set a trivial key
                  if (!empty($children)) {
                      $d['_children'] = $children;
                  }
                  $tree[] = $d;
              }
          }
         // print_r($tree);
          return $tree;
      }
      
      public function printTree($tree, $r = 0, $p = null,$parent=null) {
        $CI =& get_instance();
        foreach ($tree as $i => $t) {
            $dash = ($t['cat_parent'] == 0) ? '' : str_repeat('-', $r) .' ';
            
            if($parent == $t['cat_id']){
              printf("\t<option value='%d' selected>%s%s</option>\n", $t['cat_id'], $dash, $t['cat_name_'.$CI->session->userdata('configlang')]);
            }else{
              printf("\t<option value='%d' >%s%s</option>\n", $t['cat_id'], $dash, $t['cat_name_'.$CI->session->userdata('configlang')]);
            }

            if (isset($t['_children'])) {
              $this->printTree($t['_children'], $r+1, $t['cat_parent'],$parent); 
            }
        }
    }

    public function printTreechekbox($tree, $r = 0, $p = null,$parent=0) {
      $CI =& get_instance();
     
      foreach ($tree as $i => $t) {
          $dash = ($t['cat_parent'] == 0) ? '' : str_repeat(' ', $r) .' ';

         $qr= $CI->db->where('post_id',$parent)->where('postmeta_value',$t['cat_id'])->get(POSTMETA)->row();
         //print_r($t['_children']);
         //echo $parent;
        if($t['cat_id']==$qr->postmeta_value){
          echo "<label class='mt-checkbox mt-checkbox-outline' style='margin-left:".$r."em;margin-bottom:10px;'> ".$dash." ".$t['cat_name_'.$CI->session->userdata('configlang')]."<input type='checkbox' name='category[]' checked value='".$t['cat_id']."'><span></span></label>";
        }else{
          echo "<label class='mt-checkbox mt-checkbox-outline' style='margin-left:".$r."em;margin-bottom:10px;'> ".$dash." ".$t['cat_name_'.$CI->session->userdata('configlang')]."<input type='checkbox' name='category[]'  value='".$t['cat_id']."'><span></span></label>";
        }
         
          
          if (isset($t['_children'])) {
            $this->printTreechekbox($t['_children'], $r+1.5, $t['cat_parent'],$parent); 
           
          }

          }
  }

  public function printcattable($tree, $r = 0, $p = null,$parent=null) {
    $CI =& get_instance();
    foreach ($tree as $i => $t) {
        $dash = ($t['cat_parent'] == 0) ? '' : str_repeat('-', $r) .' ';
        
      
         echo '<tr><td>
         <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
             <input type="checkbox" name="del[]" class="checkboxes" value="'.$t["cat_id"].'" />
             <span></span>
         </label>
     </td>
     <td>
          <a href="'.base_url("mt-admin/".$CI->uri->segment(2)."/edit/".$t["cat_id"]).'">'.$dash.' '.$t["cat_name_".$CI->session->userdata("configlang")].'</a>
       
       </td>
     
                               
     <td>
         '.$t["cat_slug_".$CI->session->userdata("configlang")].'
     </td>
     
     
     <td class="text-center">
        <a href="'.base_url("mt-admin/".$CI->uri->segment(2)."/edit/".$t["cat_id"]).'" class="btn btn-outline btn-circle btn-xs dark">
           <i class="fa fa-edit"></i> '.$CI->web->getlable("edit").' </a>
        <a href="'.base_url("mt-admin/".$CI->uri->segment(2)."/delete/".$t["cat_id"]).'" class="btn btn-outline btn-circle red btn-xs blue" data-toggle="confirmation"  data-popout="true" data-placement="left" data-singleton="true" data-title="'.$CI->web->getLable("confirm_delete").'"  data-btn-cancel-label="'.$CI->web->getLable("no").'" data-btn-ok-label="'.$CI->web->getLable("yes").'">
          <i class="fa fa-trash-o"></i> '.$CI->web->getlable("delete").' </a>   
     </td></tr>';
      

        if (isset($t['_children'])) {
          $this->printcattable($t['_children'], $r+1, $t['cat_parent']); 
        }
    }
}

}



?>