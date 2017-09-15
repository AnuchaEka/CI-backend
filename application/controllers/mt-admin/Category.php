<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
  if($post=$this->input->post()){
    extract($post);


       if($this->web->CheckData(CATEGORY,array('cat_name_'.$this->session->configlang=>$cat_name))>0){
       $this->session->set_tempdata('error', $this->web->getLable('error_data_used'), 3);
       redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
   }else{ 
    
       $ins=array(
           'cat_order' =>$cat_order, 
           'cat_name_'.$this->session->configlang =>$cat_name, 
           'cat_slug_'.$this->session->configlang =>!empty($cat_slug)?$this->func->createslug($cat_slug):$this->func->createslug($cat_name), 
           'cat_parent' =>$cat_parent, 
           'timestamp_create' =>date('Y-m-d H:i:s'),
           'timestamp_update' =>date('Y-m-d H:i:s'),  
            );

           $id=$this->web->insertData(CATEGORY,$ins);
      
           if(!empty($id)){
               $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);
               redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
             
           }

   }
 //print_r($this->input->post());
 }

        $data = array(
            'res' => $this->web->getDataAll(CATEGORY,$this->input->post('search_keyword'),array('cat_name_'.$this->session->configlang),2),
            'cat' =>$this->web->getDataWhere(CATEGORY,'',2),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(16),
            'ac'=>'5',
            'sac'=>'16'
        );
        echo $this->blade->view()->make('mt-admin.posts.category', $data)->render();
    }


public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);
     if($this->web->CheckData(CATEGORY,array('cat_name_'.$this->session->configlang=>$page_name,'cat_id != '=>$id))>0){
        
           $this->session->set_tempdata('error', $this->web->getLable('error_data_used'), 3);
           redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
       
   
       }else{   
        $ins=array(
            'cat_order' =>$cat_order, 
            'cat_name_'.$this->session->configlang =>$cat_name, 
            'cat_slug_'.$this->session->configlang =>!empty($cat_slug)?$this->func->createslug($cat_slug):$this->func->createslug($cat_name), 
            'cat_parent' =>$cat_parent, 
            'timestamp_create' =>date('Y-m-d H:i:s'),
            'timestamp_update' =>date('Y-m-d H:i:s'),  
             );

       if($this->web->updateData(CATEGORY,$ins,array('cat_id'=>$id))){
     
         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
     }
    }


  }

    $data = array(
            'res' => $this->web->getDataAll(CATEGORY,$this->input->post('search_keyword'),array('cat_name_'.$this->session->configlang),2),
            'resone' => $this->web->getDataOne(CATEGORY,array('cat_id' =>$id),2),
            'cat' =>$this->web->getDataWhere(CATEGORY,array('cat_id != '=>$id),2),
            'title' => $this->web->getmenuLable(16),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'5',
            'sac'=>'16'
        );
        echo $this->blade->view()->make('mt-admin.posts.category', $data)->render();
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
                 if($this->web->deleteData(CATEGORY,array('cat_id' =>$value))>0){
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

   if($this->web->deleteData(CATEGORY,array('cat_id' =>$id))>0){
         $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3);

    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
   }
}


}
