<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Smtp extends MY_Controller
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
            'smtp_host'=>$smtp_host,
            'smtp_user'=>$smtp_user,
            'smtp_pass'=>$smtp_pass,
            'smtp_port'=>$smtp_port,
            'smtp_active' => $status=='on'?0:1,
            
            );   
        if($this->web->updateData(SETTING,$ins,array('settings_id' => 1))){   
         $this->session->set_tempdata('msg', 'บันทึกข้อมูลเรียบร้อย', 10);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         }   
        }
        $data = array(
            'title' => 'SMTP Mail',
            'res' => $this->web->getDataOne(SETTING,array('settings_id' =>1)),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'11',
            'sac'=>'38'
        );
        echo $this->blade->view()->make('mt-admin.setting.smtp', $data)->render();
    }


}