<?php
defined('BASEPATH') or exit('No direct script access allowed');

class General extends MY_Controller
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
            'site_name'=>$site_name,
            'site_suffix'=>$site_suffix,
            'site_logo'=>$link,
            'site_favicon'=>$link2,
            'admin_lang'=>$txt_language,
            'lang_switching' => $lang_switching=='on'?0:1,
            
            );   
        if($this->web->updateData(SETTING,$ins,array('settings_id' => 1))){   
         $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 10);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         }   
        }
        $data = array(
            'title' => $this->web->getmenuLable(35),
            'res' => $this->web->getDataOne(SETTING,array('settings_id' =>1)),
            'qrgroup' =>$this->web->getDataAll(LANG),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'11',
            'sac'=>'35'
        );
        echo $this->blade->view()->make('mt-admin.setting.general', $data)->render();
    }


}