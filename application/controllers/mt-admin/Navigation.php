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
               
                $ins=array(
                    'page_menu_id'=>$menuid,
                    'menulist_type'=>'page',
                    'timestamp_create'=>date('Y-m-d H:i:s'),
                    'timestamp_update'=>date('Y-m-d H:i:s'),
                    // 'page_refid'=>,
                    // 'menulist_link'=>,
                    // 'menulist_order'=>,
                    // 'menulist_parent'=>0,
                );
            $id=$this->web->insertData(PAGEMENUSLIST,$ins); 

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


public function delete($id)
{

   if($this->web->deleteData(PAGEMENUS,array('page_menu_id' =>$id))>0){

    $rs=$this->web->getDataOne(PAGEMENUS,array('active' =>0),2);

    $this->web->updateData(PAGEMENUS,array('active'=>1),array('page_menu_id'=>$rs['page_menu_id']));

    $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3); 
   
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');     

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);  
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh'); 
   }
}
}
