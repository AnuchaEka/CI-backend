<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(
            'res' => $this->web->getDataAll(PAGE,$this->input->post('search_keyword'),array('page_name','lastname','email','username'),2),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(12),
            'ac'=>'4',
            'sac'=>'12'
        );
        echo $this->blade->view()->make('mt-admin.pages.pages', $data)->render();
    }

public function add()
{

  if($post=$this->input->post()){
     extract($post);

     if($this->web->CheckData(PAGE,array('page_name_'.$this->session->configlang=>$page_name))>0){
        $this->session->set_tempdata('error', $this->web->getLable('error_data_used'), 3);
        redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3)),'refresh');
    }else{ 
     
        $ins=array(
            'page_order' =>$page_order, 
            'page_name_'.$this->session->configlang =>$page_name, 
            'active' => $status=='on'?0:1, 
            'page_slug_'.$this->session->configlang =>$seo_link, 
            'page_parent' =>$parent, 
            'page_content_'.$this->session->configlang =>$page_content, 
            'custom_css' =>base64_encode($code_editor),
            'page_image' =>$link, 
            'status' =>$save, 
            'timestamp_create' =>date('Y-m-d H:i:s'),
            'timestamp_update' =>date('Y-m-d H:i:s'),  
             );

            $id=$this->web->insertData(PAGE,$ins);
       
            if(!empty($id)){
                $seo=array(
                    'ref_id' =>$id, 
                    'lang_iso'=>$this->session->configlang, 
                    'meta_title' => $meta_title, 
                    'meta_keyword' =>$meta_keywords, 
                    'meta_description' =>$meta_description, 
                    'page_type' =>'page', 
                    'timestamp_create' =>date('Y-m-d H:i:s'),
                    'timestamp_update' =>date('Y-m-d H:i:s'),  
                );

                $this->web->insertData(SEO,$seo);
                $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);
                redirect(base_url('mt-admin/'.$this->uri->segment(2).'/edit/'.$id),'refresh');
              
            }

    }
  //print_r($this->input->post());
  }
    $data = array(
            'title' => $this->web->getmenuLable(13),
            'page'=>$this->web->getDataWhere(PAGE,array('page_parent'=>0),2),
            'error' => $this->session->tempdata('error'),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'4',
            'sac'=>'13'
        );
        echo $this->blade->view()->make('mt-admin.pages.pagesform', $data)->render();
}

public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);
     if($this->web->CheckData(PAGE,array('page_name_'.$this->session->configlang=>$page_name,'pages_id != '=>$id))>0){
        
           $this->session->set_tempdata('error', $this->web->getLable('error_data_used'), 3);
           redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
       
   
       }else{   
        $ins=array(
            'page_order' =>$page_order, 
            'page_name_'.$this->session->configlang =>$page_name, 
            'active' => $status=='on'?0:1, 
            'page_slug_'.$this->session->configlang =>$seo_link, 
            'page_parent' =>$parent, 
            'page_content_'.$this->session->configlang =>$page_content, 
            'custom_css' =>base64_encode($code_editor), 
            'page_image' =>$link, 
            'status' =>$save, 
            'timestamp_update' =>date('Y-m-d H:i:s'),  
             );

       if($this->web->updateData(PAGE,$ins,array('pages_id'=>$id))){
        $seo=array(
            'ref_id' =>$id, 
            'lang_iso'=>$this->session->configlang, 
            'meta_title' => $meta_title, 
            'meta_keyword' =>$meta_keywords, 
            'meta_description' =>$meta_description, 
            'page_type' =>'page', 
            'timestamp_create' =>date('Y-m-d H:i:s'),
            'timestamp_update' =>date('Y-m-d H:i:s'),  
        );
        if($this->web->CheckData(SEO,array('ref_id'=>$id,'lang_iso'=>$this->session->configlang,'page_type'=>'page'))>0){
            $this->web->updateData(SEO,$seo,array('ref_id'=>$id,'lang_iso'=>$this->session->configlang,'page_type'=>'page'));   

        }else{
            $this->web->insertData(SEO,$seo); 
        }


         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$id),'refresh');
     }
    }


  }

    $data = array(
            'res' => $this->web->getDataOne(PAGE,array('pages_id' =>$id),2),
            'seo' => $this->web->getDataOne(SEO,array('ref_id' =>$id)),
            'title' => $this->web->getmenuLable(12),
            'page'=>$this->web->getDataWhere(PAGE,array('page_parent'=>0),2),
            'msg' => $this->session->tempdata('msg'),
             'ac'=>'4',
            'sac'=>'12'
        );
        echo $this->blade->view()->make('mt-admin.pages.pagesform', $data)->render();
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
                 if($this->web->deleteData(PAGE,array('pages_id' =>$value))>0){
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

   if($this->web->deleteData(PAGE,array('pages_id' =>$id))>0){
         $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3);

    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
   }
}

public function status($id)
{

   if($this->web->updateData(PAGE,array('active'=>$this->input->get('status')),array('pages_id'=>$id))){
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }
}




}
