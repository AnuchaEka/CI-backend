<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(
            'res' => $this->web->getDataAll(PRODUCT,$this->input->post('search_keyword'),array('product_name_'.$this->session->configlang),2),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(20),
            'ac'=>'7',
            'sac'=>'20'
        );
        echo $this->blade->view()->make('mt-admin.ecommerce.product', $data)->render();
    }

public function add()
{

  if($post=$this->input->post()){
     extract($post);

     if($this->web->CheckData(PRODUCT,array('product_name_'.$this->session->configlang=>$product_name))>0){
        $this->session->set_tempdata('error', $this->web->getLable('error_data_used'), 3);
        redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3)),'refresh');
    }else{ 
     
        $ins=array(
            'product_order' =>$product_order, 
            'product_name_'.$this->session->configlang =>$product_name, 
            'product_active' => $status=='on'?0:1, 
            'product_slug_'.$this->session->configlang =>$seo_link, 
            'product_content_'.$this->session->configlang =>$product_content, 
            'custom_css' =>base64_encode($code_editor),
            'product_images' =>$link, 
            'product_status' =>$save, 
            'timestamp_create' =>date('Y-m-d H:i:s'),
            'timestamp_update' =>date('Y-m-d H:i:s'),  
             );

            $id=$this->web->insertData(PRODUCT,$ins);
       
            if(!empty($id)){
                $seo=array(
                    'ref_id' =>$id, 
                    'lang_iso'=>$this->session->configlang, 
                    'meta_title' => $meta_title, 
                    'meta_keyword' =>$meta_keywords, 
                    'meta_description' =>$meta_description, 
                    'page_type' =>'product', 
                    'timestamp_create' =>date('Y-m-d H:i:s'),
                    'timestamp_update' =>date('Y-m-d H:i:s'),  
                );
                $this->web->insertData(SEO,$seo);

                if(sizeof($category)>0){
                   foreach ($category as $key => $value) {
                    $this->web->insertData(PRODUCTMETA,array('product_id'=>$id,'productmeta_value'=>$value));  
                   } 
                   
                }

                $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);
                redirect(base_url('mt-admin/'.$this->uri->segment(2).'/edit/'.$id),'refresh');
              
            }

    }
  //print_r($this->input->post());
  }
    $data = array(
            'title' => $this->web->getmenuLable(20),
            'cat' =>$this->web->getDataWhere(CATEGORYPRODUCT,'',2),
            'error' => $this->session->tempdata('error'),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'7',
            'sac'=>'20'
        );
        echo $this->blade->view()->make('mt-admin.ecommerce.productform', $data)->render();
}

public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);
     if($this->web->CheckData(PRODUCT,array('product_name_'.$this->session->configlang=>$product_name,'product_id != '=>$id))>0){
        
           $this->session->set_tempdata('error', $this->web->getLable('error_data_used'), 3);
           redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
       
   
       }else{   
        $ins=array(
            'product_order' =>$product_order, 
            'product_name_'.$this->session->configlang =>$product_name, 
            'product_active' => $status=='on'?0:1, 
            'product_slug_'.$this->session->configlang =>$seo_link, 
            'product_content_'.$this->session->configlang =>$product_content, 
            'custom_css' =>base64_encode($code_editor),
            'product_images' =>$link, 
            'product_status' =>$save, 
            'timestamp_update' =>date('Y-m-d H:i:s'),   
             );

       if($this->web->updateData(PRODUCT,$ins,array('product_id'=>$id))){
        $this->web->deleteData(PRODUCTMETA,array('product_id' =>$id));
        if(sizeof($category)>0){
            foreach ($category as $key => $value) {
             $this->web->insertData(PRODUCTMETA,array('product_id'=>$id,'productmeta_value'=>$value));  
            } 
            
         }


        $seo=array(
            'ref_id' =>$id, 
            'lang_iso'=>$this->session->configlang, 
            'meta_title' => $meta_title, 
            'meta_keyword' =>$meta_keywords, 
            'meta_description' =>$meta_description, 
            'page_type' =>'product', 
            'timestamp_create' =>date('Y-m-d H:i:s'),
            'timestamp_update' =>date('Y-m-d H:i:s'),  
        );
        if($this->web->CheckData(SEO,array('ref_id'=>$id,'lang_iso'=>$this->session->configlang,'page_type'=>'product'))>0){
            $this->web->updateData(SEO,$seo,array('ref_id'=>$id,'lang_iso'=>$this->session->configlang,'page_type'=>'product'));   

        }else{
            $this->web->insertData(SEO,$seo); 
        }


         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$id),'refresh');
     }
    }


  }

    $data = array(
            'res' => $this->web->getDataOne(PRODUCT,array('product_id' =>$id),2),
            'seo' => $this->web->getDataOne(SEO,array('ref_id' =>$id,'lang_iso' =>$this->session->configlang,'page_type'=>'product')),
            'cat' =>$this->web->getDataWhere(CATEGORYPRODUCT,'',2),
            'productid'=>$id,
            'title' => $this->web->getmenuLable(20),
            'msg' => $this->session->tempdata('msg'),
             'ac'=>'7',
            'sac'=>'20'
        );
        echo $this->blade->view()->make('mt-admin.ecommerce.productform', $data)->render();
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
                 if($this->web->deleteData(PRODUCT,array('product_id' =>$value))>0){
                 $this->web->deleteData(SEO,array('ref_id' =>$id,'page_type'=>'product'));    
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

   if($this->web->deleteData(PRODUCT,array('product_id' =>$id))>0){
    $this->web->deleteData(SEO,array('ref_id' =>$id,'page_type'=>'product'));
    $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3);

    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
   }
}

public function status($id)
{

   if($this->web->updateData(PRODUCT,array('product_active'=>$this->input->get('status')),array('product_id'=>$id))){
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }
}




}
