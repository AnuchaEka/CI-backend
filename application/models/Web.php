<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Model {

public function __construct()
    {
        parent::__construct();
        $this->load->dbforge(); 
    }
  public function getDataAll($table,$keyword=null,$fields=null,$k=0,$order=null)
  {
   
     if (!empty($table)) {
      if(!empty($keyword)){
 
             foreach($fields as $key => $value) {
              if($key == 0) {
                  $this->db->like($value, $keyword);
              } else {
                  $this->db->or_like($value, $keyword);
              }
          }
        }
        
        if(!is_null($order)){

          $this->db->order_by($order[0],$order[1]);
        }

        $qr=$this->db->get($table);
        if($k==0){
        return $qr->result();
        }else{
        return $qr->result_array();
        }
        

     }
  }


  public function getDataWhere($table,$object=null,$k=0,$order=null)
  {
   
     if (!empty($table)) {

      if(!empty($object)){
        $this->db->where($object);
      }

      if(!is_null($order)){
         $this->db->order_by($order[0],$order[1]);
        }

        $qr=$this->db->get($table);
         if($k==0){
        return $qr->result();
        }else{
        return $qr->result_array();
        }

     }
  }

  public function getDatafields($table,$fields,$object)
  {
    
     if (!empty($table) and !empty($fields)) {
   
        $qr=$this->db->where($object)->get($table);

        return $qr->row()->$fields;

     }
  }

   public function getDataOne($table,$object,$k=0)
  {
    
     if (!empty($table)) {
   
        $qr=$this->db->where($object)->get($table);
       if($k==0){
        return $qr->row();
        }else{
        return $qr->row_array();
        }

     }
  }

  public function getMenu($parent=0)
  {
    $id = $this->auth->userid();
    $this->load->model('user_model');
    $user = $this->user_model->get('id', $id);

    if($user['group_id']==0){
      $qr=$this->db->where('menu_parent',$parent)->order_by('menu_sorting','asc')->get(MENUS);
      return $qr->result_array();
    }else{
      
      $this->db->select('*');
      $this->db->from(MENUS.' m'); 
      $this->db->join(PERMISION.' p', 'p.menu_id=m.menu_id', 'left');
      $this->db->where('p.groupusers_id',$user['group_id']);
      $this->db->where('m.menu_parent',$parent);
      $this->db->where('m.active',0);
      $this->db->order_by('m.menu_sorting','asc');         
      $query = $this->db->get(); 

      return $query->result_array();

    }

   

  }
  
  public function insertData($table,$data)
  {
    if($this->db->insert($table,$data)){

     return $this->db->insert_id();
      
    }
  }

  public function updateData($table,$data,$offset)
  {
     $query = $this->db->where($offset)->update($table,$data);
      return $query;
     
  }

   public function CheckData($table,$offset)
  {
     if (!empty($table)) {
   
        $qr=$this->db->where($offset)->get($table);
        return $qr->num_rows();

     }
     
  }

 public function deleteData($table,$offset)
  {
     $this->db->delete($table,$offset);
     return $this->db->affected_rows();
  }


  public function AddColumn($table,$fields)
  {
    if($this->dbforge->add_column($table, $fields)){

      return true;
    }else{
       return false;
     }
  }

  public function ModifyColumn($table,$fields)
  {
    if($this->dbforge->modify_column($table, $fields)){

      return true;
    }else{
       return false;
     }
  }

   public function deleteColumn($fields)
  {
     foreach ($fields as $key => $value) {
         $this->dbforge->drop_column($key, $value); 
     }
 
  }

  public function getLable($key)
  {
    $qr=$this->db->where('name',$key)->get(LANGLABEL);
    $rs=$qr->row_array();
    return $rs['lang_'.$this->session->userdata('weblang')];
  }


  public function getPeriodeNummer($table,$key,$object=null) {
    $this->db->select_max($key);
    if(!empty($object)){
    $this->db->where($object);
    }
    $query = $this->db->get($table);

    // fetch first row in object
    $result = $query->row();
    $data = $result->$key + 1;

    return $data;
}

public function checkedrole($table,$obj)
{
   $this->db->where($obj);
    $query = $this->db->get($table);
    if($query->num_rows()>0){
    return "checked";
    }else{
    return "";
    }
}

public function disablerole($table,$obj)
{
   $this->db->where($obj);
    $query = $this->db->get($table);
    if($query->num_rows()>0){
    return "";
    }else{
    return "disabled";
    }
}

public function do_upload($userfile,$path,$new_name='')
{
        $config['file_name']  =$new_name;
        $config['upload_path']          = $path;
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['overwrite']          = TRUE;
       //  $config['max_size']             = 1024;
       // $config['max_width']            = $w;
        //$config['max_height']           = $h;
        //$config['encrypt_name'] = FALSE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ( ! $this->upload->do_upload($userfile))
        {
          return '';
          //$this->upload->display_errors();
        }
        else
        {
             //$data =  $this->upload->data();

             return  $this->upload->data('file_name');


        }
}

public function deleteFiles($file){

    if(is_file($file)){
      unlink($file); // delete file
      return true;
    }else{
      return false;
    }

}

public function getmenuLable($id)
{
  $qr=$this->db->where('menu_id',$id)->get(MENUS);
  $res=$qr->row_array();
  return $res['menu_name_'.$this->session->weblang];
}

public function printTreemenu($tree) {

  foreach ($tree as $i => $t) {

    echo  $t['id'];

    if (isset($t['children'])) {
        $this->printTreemenu($t['children']); 
    }
 
  }



}

}

/* End of file ModelName.php */


?>