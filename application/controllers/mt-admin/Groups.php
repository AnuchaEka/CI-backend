<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Groups extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
        session_start();
        $_SESSION["RF"]["subfolder"] = "flags";
      
    }
    public function index()
    {
      
        $data = array(
            'res' => $this->web->getDataAll(GROUPS,$this->input->post('search_keyword'),array('groupusers_name')),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => 'กลุ่มผู้ใช้งาน',
            'ac'=>'8',
            'sac'=>'25'
        );
        echo $this->blade->view()->make('mt-admin.users.groups', $data)->render();
    }

public function add()
{

  if($post=$this->input->post()){
     extract($post);

     if($this->web->CheckData(GROUPS,array('groupusers_name'=>$group_name))>0){
    $this->session->set_tempdata('error', 'มีกลุ่มผู้ใช้นี้อยู่แล้วค่ะ!', 3);    
    redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3)),'refresh');
    }else{
     $ins=array(
     'groupusers_name' => $group_name,
     'groupusers_url' => $group_url,
     'active' => $status=='on'?0:1,

      );
     
     $id=$this->web->insertData(GROUPS,$ins);

     if(!empty($id)){

         if(!empty($save)){
         $this->session->set_tempdata('msg', 'บันทึกข้อมูลเรียบร้อย', 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         
         }else{
         $this->session->set_tempdata('msg', 'บันทึกข้อมูลเรียบร้อย', 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/edit/'.$id),'refresh'); 
         
         }

     }
    }
  //print_r($this->input->post());
  }
    $data = array(
            'title' => 'เพิ่มกลุ่มผู้ใช้งาน',
            'error' => $this->session->tempdata('error'),
            'msg' => $this->session->tempdata('msg'),
             'ac'=>'8',
            'sac'=>'25'
        );
        echo $this->blade->view()->make('mt-admin.users.groupsform', $data)->render();
}

public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);

     $ins=array(
     'groupusers_name' => $group_name,
     'groupusers_url' => $group_url,
     'active' => $status=='on'?0:1,

      );
     

     if($this->web->updateData(GROUPS,$ins,array('groupusers_id'=>$id))){

         //print_r($this->input->post());
         foreach ($M as $key => $value) {

             echo "TEst";

 
         }

         if(!empty($save)){
         $this->session->set_tempdata('msg', 'แก้ไขข้อมูลเรียบร้อย', 3);    
        // redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         
         }else{
         $this->session->set_tempdata('msg', 'แก้ไขข้อมูลเรียบร้อย', 3);    
        // redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$id),'refresh');   
         
         }

     }
    

  }

    $data = array(
            'res' => $this->web->getDataOne(GROUPS,array('groupusers_id' =>$id)),
            'title' => 'แก้ไขกลุ่มผู้ใช้งาน',
            'msg' => $this->session->tempdata('msg'),
             'ac'=>'8',
            'sac'=>'25'
        );
        echo $this->blade->view()->make('mt-admin.users.groupsform', $data)->render();
}

public function action()
{
    //print_r($this->input->post());
    if($post=$this->input->post()){
        extract($post);
        if(!empty($action)){
        if($action=='Del'){
            if(count($del)>0){
                foreach ($del as $key => $value) {
                 if($this->web->deleteData(GROUPS,array('groupusers_id' =>$value))>0){
                 $this->session->set_tempdata('msg', 'ลบข้อมูลเรียบร้อย', 3);     
                 }

                }
                 redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');     
            }else{
                 redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');  
            }
        }
        }else{
           redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');  
        }
    }
   //echo "DELETE";
}

public function delete($id)
{

   if($this->web->deleteData(GROUPS,array('groupusers_id' =>$id))>0){
         $this->session->set_tempdata('msg', 'ลบข้อมูลเรียบร้อย', 3); 
   
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');     

   }else{
      $this->session->set_tempdata('error', 'ไม่สามารถลบข้อมูลได้ค่ะ!', 3);  
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh'); 
   }
}

public function status($id)
{

   if($this->web->updateData(GROUPS,array('active'=>$this->input->get('status')),array('groupusers_id'=>$id))){
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');     

   }
}


}
