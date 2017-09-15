<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(
            'res' => $this->web->getDataAll(POSTS,$this->input->post('search_keyword'),array('posts_name_'.$this->session->configlang),2),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(14),
            'ac'=>'5',
            'sac'=>'14'
        );
        echo $this->blade->view()->make('mt-admin.posts.posts', $data)->render();
    }

public function add()
{

  if($post=$this->input->post()){
     extract($post);

     if($this->web->CheckData(POSTS,array('posts_name_'.$this->session->configlang=>$posts_name))>0){
        $this->session->set_tempdata('error', $this->web->getLable('error_data_used'), 3);
        redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3)),'refresh');
    }else{ 
     
        $ins=array(
            'posts_order' =>$posts_order, 
            'posts_name_'.$this->session->configlang =>$posts_name, 
            'posts_active' => $status=='on'?0:1, 
            'posts_slug_'.$this->session->configlang =>$seo_link, 
            'posts_content_'.$this->session->configlang =>$posts_content, 
            'custom_css' =>base64_encode($code_editor),
            'posts_images' =>$link, 
            'posts_status' =>$save, 
            'timestamp_create' =>date('Y-m-d H:i:s'),
            'timestamp_update' =>date('Y-m-d H:i:s'),  
             );

            $id=$this->web->insertData(POSTS,$ins);
       
            if(!empty($id)){
                $seo=array(
                    'ref_id' =>$id, 
                    'lang_iso'=>$this->session->configlang, 
                    'meta_title' => $meta_title, 
                    'meta_keyword' =>$meta_keywords, 
                    'meta_description' =>$meta_description, 
                    'page_type' =>'posts', 
                    'timestamp_create' =>date('Y-m-d H:i:s'),
                    'timestamp_update' =>date('Y-m-d H:i:s'),  
                );
                $this->web->insertData(SEO,$seo);

                if(sizeof($category)>0){
                   foreach ($category as $key => $value) {
                    $this->web->insertData(POSTMETA,array('post_id'=>$id,'postmeta_value'=>$value));  
                   } 
                   
                }

                $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);
                redirect(base_url('mt-admin/'.$this->uri->segment(2).'/edit/'.$id),'refresh');
              
            }

    }
  //print_r($this->input->post());
  }
    $data = array(
            'title' => $this->web->getmenuLable(15),
            'cat' =>$this->web->getDataWhere(CATEGORY,'',2),
            'error' => $this->session->tempdata('error'),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'5',
            'sac'=>'15'
        );
        echo $this->blade->view()->make('mt-admin.posts.postsform', $data)->render();
}

public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);
     if($this->web->CheckData(POSTS,array('posts_name_'.$this->session->configlang=>$posts_name,'posts_id != '=>$id))>0){
        
           $this->session->set_tempdata('error', $this->web->getLable('error_data_used'), 3);
           redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
       
   
       }else{   
        $ins=array(
            'posts_order' =>$posts_order, 
            'posts_name_'.$this->session->configlang =>$posts_name, 
            'posts_active' => $status=='on'?0:1, 
            'posts_slug_'.$this->session->configlang =>$seo_link, 
            'posts_content_'.$this->session->configlang =>$posts_content, 
            'custom_css' =>base64_encode($code_editor),
            'posts_images' =>$link, 
            'posts_status' =>$save, 
            'timestamp_update' =>date('Y-m-d H:i:s'),   
             );

       if($this->web->updateData(POSTS,$ins,array('posts_id'=>$id))){
        $this->web->deleteData(POSTMETA,array('post_id' =>$id));
        if(sizeof($category)>0){
            foreach ($category as $key => $value) {
             $this->web->insertData(POSTMETA,array('post_id'=>$id,'postmeta_value'=>$value));  
            } 
            
         }


        $seo=array(
            'ref_id' =>$id, 
            'lang_iso'=>$this->session->configlang, 
            'meta_title' => $meta_title, 
            'meta_keyword' =>$meta_keywords, 
            'meta_description' =>$meta_description, 
            'page_type' =>'posts', 
            'timestamp_create' =>date('Y-m-d H:i:s'),
            'timestamp_update' =>date('Y-m-d H:i:s'),  
        );
        if($this->web->CheckData(SEO,array('ref_id'=>$id,'lang_iso'=>$this->session->configlang,'page_type'=>'posts'))>0){
            $this->web->updateData(SEO,$seo,array('ref_id'=>$id,'lang_iso'=>$this->session->configlang,'page_type'=>'posts'));   

        }else{
            $this->web->insertData(SEO,$seo); 
        }


         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$id),'refresh');
     }
    }


  }

    $data = array(
            'res' => $this->web->getDataOne(POSTS,array('posts_id' =>$id),2),
            'seo' => $this->web->getDataOne(SEO,array('ref_id' =>$id,'lang_iso' =>$this->session->configlang,'page_type'=>'posts')),
            'cat' =>$this->web->getDataWhere(CATEGORY,'',2),
            'postid'=>$id,
            'title' => $this->web->getmenuLable(14),
            'msg' => $this->session->tempdata('msg'),
             'ac'=>'5',
            'sac'=>'14'
        );
        echo $this->blade->view()->make('mt-admin.posts.postsform', $data)->render();
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
                 if($this->web->deleteData(POSTS,array('posts_id' =>$value))>0){
                 $this->web->deleteData(SEO,array('ref_id' =>$id,'page_type'=>'posts'));    
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

   if($this->web->deleteData(POSTS,array('posts_id' =>$id))>0){
    $this->web->deleteData(SEO,array('ref_id' =>$id,'page_type'=>'posts'));
    $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3);

    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
   }
}

public function status($id)
{

   if($this->web->updateData(POSTS,array('active'=>$this->input->get('status')),array('posts_id'=>$id))){
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }
}




}
