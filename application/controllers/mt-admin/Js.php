<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Js extends MY_Controller
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
        if($this->web->updateData(SETTING,array('additional_js' =>base64_encode($code_editor)),array('settings_id' => 1))){   
         $this->session->set_tempdata('msg', 'บันทึกข้อมูลเรียบร้อย', 10);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         }   
        }
        $data = array(
            'title' => 'Custom Javascript',
            'res' => $this->web->getDataOne(SETTING,array('settings_id' =>1)),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'10',
            'sac'=>'30'
        );
        echo $this->blade->view()->make('mt-admin.setting.js', $data)->render();
    }


}