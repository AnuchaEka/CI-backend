<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menulocation extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
      
    }
    public function index()
    {
      
        $data = array(
            'res' => $this->web->getDataAll(PAGEMENUSOPTION,$this->input->post('search_keyword'),array('menu_option_name','menu_option_key'),1),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(42),
            'ac'=>'11',
            'sac'=>'42'
        );
        echo $this->blade->view()->make('mt-admin.setting.menulocation', $data)->render();
    }

public function add()
{

  if($post=$this->input->post()){
     extract($post);

   if($this->web->CheckData(PAGEMENUSOPTION,array('menu_option_name'=>$menu_option_name))>0){
    $this->session->set_tempdata('error', $this->web->getLable('error_data_used'), 3);    
    redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3)),'refresh');
    }else{
     $ins=array(
     'menu_option_name' => $menu_option_name,
     'menu_option_key'=>$menu_option_key,
     'page_menu_id'=>0,
     'timestamp_create' =>date('Y-m-d H:i:s'),

      );

           
     $id=$this->web->insertData(PAGEMENUSOPTION,$ins);

     if(!empty($id)){

   
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
            'title' => $this->web->getmenuLable(42),
            'error' => $this->session->tempdata('error'),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'11',
            'sac'=>'42'
        );
        echo $this->blade->view()->make('mt-admin.setting.menulocationform', $data)->render();
}

public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);

     $ins=array(
        'menu_option_name' => $menu_option_name,
        'menu_option_key'=>$menu_option_key,
        'page_menu_id'=>0,
        'timestamp_update' =>date('Y-m-d H:i:s'),

      );

     if($this->web->updateData(PAGEMENUSOPTION,$ins,array('menu_option_id'=>$id))){

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
            'res' => $this->web->getDataOne(PAGEMENUSOPTION,array('menu_option_id' =>$id),1),
            'title' => $this->web->getmenuLable(42),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'11',
            'sac'=>'42'
        );
        echo $this->blade->view()->make('mt-admin.setting.menulocationform', $data)->render();
}

public function delete($id)
{
   if($this->web->deleteData(PAGEMENUSOPTION,array('menu_option_id' =>$id))>0){
    $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3); 
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');     

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);  
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh'); 
   }
}


}
