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
        //print_r($post=$this->input->post());

        $qrlang=$this->web->getDataWhere(LANG,array('active'=>0));
        if($post=$this->input->post()){
            extract($post);
            if($save=='selectmenu'){
                if($this->web->updateData(PAGEMENUS,array('active'=>0),array('active'=>1))){
                    
                           if($this->web->updateData(PAGEMENUS,array('active'=>1),array('page_menu_id'=>$menus))){
                             redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
                             
                             }
                             
                   }
            }

            if($save=='addnew'){
                
                 $ins=array(
                     'page_menu_name'=>$menuname,
                   );
             $id=$this->web->insertData(PAGEMENUS,$ins); 
 
             if(!empty($id)){
   
                if($this->web->updateData(PAGEMENUS,array('active'=>0),array('active'=>1))){
                    
                           if($this->web->updateData(PAGEMENUS,array('active'=>1),array('page_menu_id'=>$id))){
                             redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
                             
                             }
                             
                   }
                          
              }
             }

            if($save=='acpages'){
            
             if(sizeof($page)>0){

            foreach($page as $val){
              if($this->web->CheckData(PAGEMENUSLIST,array('page_menu_id'=>$menuid,'ref_id'=>$val,'menulist_type'=>'Page'))==0){
                $ins=array(
                    'page_menu_id'=>$menuid,
                    'menulist_type'=>'Page',
                    'ref_id'=>$val

                );
                foreach ($qrlang as $key => $value) {
                    $ins['menulist_name_'.$value->lang_iso]=$this->web->getDatafields(PAGE,'page_name_'.$value->lang_iso,array('pages_id'=>$val));
               }   
               
            $id=$this->web->insertData(PAGEMENUSLIST,$ins); 
            }
            }

            if(!empty($id)){
  
              redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
                         
             }
            } 
            }

            if($save=='accategory'){
                
                 if(sizeof($category)>0){
    
                foreach($category as $val){
                  if($this->web->CheckData(PAGEMENUSLIST,array('page_menu_id'=>$menuid,'ref_id'=>$val,'menulist_type'=>'Category'))==0){
                    $ins=array(
                        'page_menu_id'=>$menuid,
                        'menulist_type'=>'Category',
                        'ref_id'=>$val
    
                    );
                    foreach ($qrlang as $key => $value) {
                        $ins['menulist_name_'.$value->lang_iso]=$this->web->getDatafields(CATEGORY,'cat_name_'.$value->lang_iso,array('cat_id'=>$val));
                   }   
                   
                $id=$this->web->insertData(PAGEMENUSLIST,$ins); 
                }
                }
    
                if(!empty($id)){
      
                  redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
                             
                 }
                } 
                }


                if($save=='acposts'){
                    
                     if(sizeof($posts)>0){
        
                    foreach($posts as $val){
                      if($this->web->CheckData(PAGEMENUSLIST,array('page_menu_id'=>$menuid,'ref_id'=>$val,'menulist_type'=>'Post'))==0){
                        $ins=array(
                            'page_menu_id'=>$menuid,
                            'menulist_type'=>'Post',
                            'ref_id'=>$val
        
                        );
                        foreach ($qrlang as $key => $value) {
                            $ins['menulist_name_'.$value->lang_iso]=$this->web->getDatafields(POSTS,'posts_name_'.$value->lang_iso,array('posts_id'=>$val));
                       }   
                       
                    $id=$this->web->insertData(PAGEMENUSLIST,$ins); 
                    }
                    }
        
                    if(!empty($id)){
          
                      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
                                 
                     }
                    } 
                    }

           if($save=='accustomlink'){
                    
          
                     if($this->web->CheckData(PAGEMENUSLIST,array('page_menu_id'=>$menuid,'menulist_name_'.$this->session->configlang=>$title,'menulist_type'=>'Customlink'))==0){
                        $ins=array(
                            'page_menu_id'=>$menuid,
                            'menulist_link'=>$url,
                            'menulist_type'=>'Customlink',
                            'ref_id'=>0
        
                        );
                        foreach ($qrlang as $key => $value) {
                            $ins['menulist_name_'.$value->lang_iso]=$title;
                       }   
                       
                    $id=$this->web->insertData(PAGEMENUSLIST,$ins); 
                    }
                      
                    if(!empty($id)){
          
                      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
                                 
                     }
                    }         
                
           }
      
         
        $data = array(
            'res' => $this->web->getDataAll(BANNER,$this->input->post('search_keyword'),array('slideImage','slideLink')),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(28),
            'cat' =>$this->web->getDataWhere(CATEGORY,'',2),
            'page' =>$this->web->getDataWhere(PAGE,'',2),
            'post' =>$this->web->getDataWhere(POSTS,'',2),
            'pagemenus' =>$this->web->getDataWhere(PAGEMENUS,'',2),
            'optionmenu'=>$this->web->getDataWhere(PAGEMENUSOPTION,'',2),
            'res' => $this->web->getDataOne(PAGEMENUS,array('active' =>1),2),
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
     'page_menu_name' => $name,
      );
     
      if($this->web->updateData(PAGEMENUS,$ins,array('page_menu_id'=>$menuid))){

        if(sizeof($optionmenu)>0){
            $this->web->updateData(PAGEMENUSOPTION,array('page_menu_id'=>0),array('page_menu_id'=>$menuid));
            foreach ($optionmenu as $key => $value) {
                $this->web->updateData(PAGEMENUSOPTION,array('page_menu_id'=>$value),array('menu_option_key'=>$key));
            }
        }
           

         if(!empty($save)){
         $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         
         }

     }
    
  print_r($this->input->post());
  } 

}



public function delete($id)
{

   if($this->web->deleteData(PAGEMENUS,array('page_menu_id' =>$id))>0){

    $this->web->deleteData(PAGEMENUSLIST,array('page_menu_id' =>$id)); 

    $rs=$this->web->getDataOne(PAGEMENUS,array('active' =>0),2);

    $this->web->updateData(PAGEMENUS,array('active'=>1),array('page_menu_id'=>$rs['page_menu_id']));

    $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3); 
   
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');     

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);  
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh'); 
   }
}

public function del($id)
{

   if($this->web->deleteData(PAGEMENUSLIST,array('menulist_id' =>$id))>0){

    $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3); 
   
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');     

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);  
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh'); 
   }
}


public function saveListdata()
{
    if ($_POST) {
        $this->saveList($_POST['list']);
        exit;
    }
}

function saveList($list, $parent_id = 0, &$m_order = 0) {
    foreach($list as $item) {
        $m_order++;

        $update= array(
            'menulist_parent' => $parent_id,
            'menulist_order' =>$m_order,

        );

        $this->web->updateData(PAGEMENUSLIST,$update,array('menulist_id'=>$item["id"]));

        if (array_key_exists("children", $item)) {
            $this->saveList($item["children"], $item["id"], $m_order);
        }
    }
}


}
