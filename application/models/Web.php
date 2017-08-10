<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Model {

public function __construct()
    {
        parent::__construct();
        $this->load->dbforge(); 
    }
  public function getDataAll($table,$keyword=null,$fields=null,$k=0)
  {
   
     if (!empty($table)) {
 
             foreach($fields as $key => $value) {
              if($key == 0) {
                  $this->db->like($value, $keyword);
              } else {
                  $this->db->or_like($value, $keyword);
              }
          }  

        $qr=$this->db->get($table);
        if($k==0){
        return $qr->result();
        }else{
        return $qr->result_array();
        }
        

     }
  }

  public function getDataWhere($table,$object=null,$k=0)
  {
   
     if (!empty($table)) {
 
        $qr=$this->db->where($object)->get($table);
         if($k==0){
        return $qr->result();
        }else{
        return $qr->result_array();
        }

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

    $qr=$this->db->where('menu_parent',$parent)->get(MENUS);
    return $qr->result_array();

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
    return $rs['lang_'.$this->session->userdata('configlang')];
  }


  public function getPeriodeNummer($table,$object=null,$key) {
    $this->db->select_max($key);
    $this->db->where($object);
    $query = $this->db->get($table);

    // fetch first row in object
    $result = $query->row();
    $data = $result->$key + 1;

    return $data;
}

}

/* End of file ModelName.php */


?>