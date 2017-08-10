<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Langlable extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
      
    }
    public function index()
    {
      
        $data = array(
            'res' => $this->web->getDataAll(LANGLABEL,$this->input->post('search_keyword'),array('name'),1),
            'reslang' => $this->web->getDataWhere(LANG,array('active'=>0)),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => 'ป้ายกำกับภาษา',
            'ac'=>'11',
            'sac'=>'34'
        );
        echo $this->blade->view()->make('mt-admin.lang.langlable', $data)->render();
    }

public function add()
{

  if($post=$this->input->post()){
     extract($post);

   if($this->web->CheckData(LANGLABEL,array('name'=>$langlable_name))>0){
    $this->session->set_tempdata('error', 'มีชื่ออยู่แล้วค่ะ!', 3);    
    redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3)),'refresh');
    }else{
     $ins=array(
     'name' => $langlable_name,
     'timestamp_update' =>date('Y-m-d H:i:s'),

      );

      foreach ($lang_code as $key => $value) {
       $ins['lang_'.$key]=$value;
      }
     
     $id=$this->web->insertData(LANGLABEL,$ins);

     if(!empty($id)){

   
         if(!empty($save)){
         $this->session->set_tempdata('msg', 'บันทึกข้อมูลเรียบร้อย', 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         
         }else{
         $this->session->set_tempdata('msg', 'บันทึกข้อมูลเรียบร้อย', 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$id),'refresh');   
         
         }

     }
    }
  //print_r($this->input->post());
  }
    $data = array(
            'title' => 'เพิ่มป้ายกำกับภาษา',
            'error' => $this->session->tempdata('error'),
            'reslang' => $this->web->getDataWhere(LANG,array('active'=>0)),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'11',
            'sac'=>'34'
        );
        echo $this->blade->view()->make('mt-admin.lang.langlableform', $data)->render();
}

public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);

     $ins=array(
     'name' => $langlable_name,
     'timestamp_update' =>date('Y-m-d H:i:s'),

      );

      foreach ($lang_code as $key => $value) {
       $ins['lang_'.$key]=$value;
      }
     

     if($this->web->updateData(LANGLABEL,$ins,array('general_label_id'=>$id))){

        if(!empty($save)){
         $this->session->set_tempdata('msg', 'แก้ไขข้อมูลเรียบร้อย', 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         
         }else{
         $this->session->set_tempdata('msg', 'แก้ไขข้อมูลเรียบร้อย', 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$id),'refresh');   
         
         }

     }
    

  }

    $data = array(
            'res' => $this->web->getDataOne(LANGLABEL,array('general_label_id' =>$id),1),
            'title' => 'แก้ไขภาษา',
            'msg' => $this->session->tempdata('msg'),
            'reslang' => $this->web->getDataWhere(LANG,array('active'=>0)),
            'ac'=>'11',
            'sac'=>'34'
        );
        echo $this->blade->view()->make('mt-admin.lang.langlableform', $data)->render();
}

public function delete($id)
{
   if($this->web->deleteData(LANGLABEL,array('general_label_id' =>$id))>0){
    $this->session->set_tempdata('msg', 'ลบข้อมูลเรียบร้อย', 3); 
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');     

   }else{
      $this->session->set_tempdata('error', 'ไม่สามารถลบข้อมูลได้ค่ะ!', 3);  
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh'); 
   }
}


}
