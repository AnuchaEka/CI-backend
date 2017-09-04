<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seo extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
      
    }

    public function index()
    {
       // print_r($this->input->post());
        if ($post=$this->input->post()) {
            extract($post);
            //echo $code_editor;
        $ins = array(
            'meta_title' =>$meta_title , 
            'meta_keywords'=>$meta_keywords,
            'meta_description'=>$meta_description
            
            );   
        if($this->web->updateData(SETTING,$ins,array('settings_id' => 1))){   
         $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 10);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         }   
        }
        $data = array(
            'title' => $this->web->getmenuLable(36),
            'res' => $this->web->getDataOne(SETTING,array('settings_id' =>1)),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'11',
            'sac'=>'36'
        );
        echo $this->blade->view()->make('mt-admin.setting.seo', $data)->render();
    }


}