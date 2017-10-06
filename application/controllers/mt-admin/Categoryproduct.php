<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categoryproduct extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        
  if($post=$this->input->post()){
    extract($post);


       if($this->web->CheckData(CATEGORYPRODUCT,array('cat_name_'.$this->session->configlang=>$cat_name))>0){
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

           $id=$this->web->insertData(CATEGORYPRODUCT,$ins);
      
           if(!empty($id)){
               $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);
               redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
             
           }

   }
 //print_r($this->input->post());
 }

        $data = array(
            'res' => $this->web->getDataAll(CATEGORYPRODUCT,$this->input->post('search_keyword'),array('cat_name_'.$this->session->configlang),2),
            'cat' =>$this->web->getDataWhere(CATEGORYPRODUCT,'',2),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(22),
            'ac'=>'7',
            'sac'=>'22'
        );
        echo $this->blade->view()->make('mt-admin.ecommerce.category', $data)->render();
    }


public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);
     if($this->web->CheckData(CATEGORYPRODUCT,array('cat_name_'.$this->session->configlang=>$page_name,'cat_id != '=>$id))>0){
        
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

       if($this->web->updateData(CATEGORYPRODUCT,$ins,array('cat_id'=>$id))){
     
         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
     }
    }


  }

    $data = array(
            'res' => $this->web->getDataAll(CATEGORYPRODUCT,$this->input->post('search_keyword'),array('cat_name_'.$this->session->configlang),2),
            'resone' => $this->web->getDataOne(CATEGORYPRODUCT,array('cat_id' =>$id),2),
            'cat' =>$this->web->getDataWhere(CATEGORYPRODUCT,array('cat_id != '=>$id),2),
            'title' => $this->web->getmenuLable(22),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'7',
            'sac'=>'22'
        );
        echo $this->blade->view()->make('mt-admin.ecommerce.category', $data)->render();
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
                 if($this->web->deleteData(CATEGORYPRODUCT,array('cat_id' =>$value))>0){
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

   if($this->web->deleteData(CATEGORYPRODUCT,array('cat_id' =>$id))>0){
         $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3);

    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
   }
}


}
