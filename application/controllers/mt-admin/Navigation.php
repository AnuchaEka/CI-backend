<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Navigation extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
      
    }
    public function index()
    {
      
        $data = array(
            'res' => $this->web->getDataAll(BANNER,$this->input->post('search_keyword'),array('slideImage','slideLink')),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(28),
            'ac'=>'10',
            'sac'=>'28'
        );
        echo $this->blade->view()->make('mt-admin.layouts.navigation', $data)->render();
    }

public function add()
{

  if($post=$this->input->post()){
     extract($post);

     $ins=array(
     'slideOrder' => $slideOrder,
     'slideLink' => $protocol.$slideLink,
     'slideImage' => $link,
     'slideprotocol'=>$protocol,
     'active' => $status=='on'?0:1,
     'timestamp_create' =>date('Y-m-d H:i:s'),
      );
     
     $id=$this->web->insertData(BANNER,$ins);

     if(!empty($id)){

         if(!empty($save)){
         $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         
         }else{
         $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/edit/'.$id),'refresh'); 
         
         }

     }
    
  //print_r($this->input->post());
  } 
    $data = array(
            'title' => $this->web->getmenuLable(31),
            'error' => $this->session->tempdata('error'),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'10',
            'sac'=>'31'
        );
        echo $this->blade->view()->make('mt-admin.layouts.bannerslideform', $data)->render();
}

public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);

     $ins=array(
        'slideOrder' => $slideOrder,
        'slideLink' => $slideLink,
        'slideImage' => $link,
        'slideprotocol'=>$protocol,
        'active' => $status=='on'?0:1,
        'timestamp_create' =>date('Y-m-d H:i:s'),
      );
     

     if($this->web->updateData(BANNER,$ins,array('slideID'=>$id))){

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
            'res' => $this->web->getDataOne(BANNER,array('slideID' =>$id)),
            'title' => $this->web->getmenuLable(31),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'10',
            'sac'=>'31'
        );
        echo $this->blade->view()->make('mt-admin.layouts.bannerslideform', $data)->render();
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

                 if($this->web->deleteData(BANNER,array('slideID' =>$value))>0){
      
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

   if($this->web->deleteData(BANNER,array('slideID' =>$id))>0){

    $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3); 
   
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');     

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);  
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh'); 
   }
}
}
