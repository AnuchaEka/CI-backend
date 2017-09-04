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
            'title' => $this->web->getmenuLable(25),
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
    $this->session->set_tempdata('error', $this->web->getLable('error_group_used'), 3);
    redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3)),'refresh');
    }else{
     $ins=array(
     'groupusers_name' => $group_name,
     'groupusers_url' => $group_url,
     'active' => $status=='on'?0:1,

      );

     $id=$this->web->insertData(GROUPS,$ins);

     if(!empty($id)){

            $this->web->deleteData(PERMISION,array('groupusers_id' =>$id));
        if(count($M)>0){
         foreach ($M as $key => $value) {

             $this->web->insertData(PERMISION,array('groupusers_id'=>$id,'menu_id'=>$value,'menu_type'=>'M'));
        if(count($S[$value])>0){
             foreach ($S[$value] as $key2 => $value2) {

                 $this->web->insertData(PERMISION,array('groupusers_id'=>$id,'menu_id'=>$value2,'menu_type'=>'S'));
             }
        }

         }
        }
        

         if(!empty($save)){
         $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

         }else{
         $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/edit/'.$id),'refresh');

         }

     }
    }
  //print_r($this->input->post());
  }
    $data = array(
            'title' => $this->web->getmenuLable(25),
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
        $this->web->deleteData(PERMISION,array('groupusers_id' =>$id));
        if(count($M)>0){
         foreach ($M as $key => $value) {

             $this->web->insertData(PERMISION,array('groupusers_id'=>$id,'menu_id'=>$value,'menu_type'=>'M'));
        if(count($S[$value])>0){
             foreach ($S[$value] as $key2 => $value2) {

                 $this->web->insertData(PERMISION,array('groupusers_id'=>$id,'menu_id'=>$value2,'menu_type'=>'S'));
             }
        }

         }
        }
        
    
         if(!empty($save)){
         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

         }else{
         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$id),'refresh');

         }

     }


  }

    $data = array(
            'res' => $this->web->getDataOne(GROUPS,array('groupusers_id' =>$id)),
            'title' => $this->web->getmenuLable(25),
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
                 $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3);
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
         $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3);

    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);
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
