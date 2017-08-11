<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

 public function __construct()
    {
        parent::__construct();

    }
    public function index()
    {
         $data = array(
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => 'กลุ่มผู้ใช้งาน',
            'ac'=>'1',
            'sac'=>''
        );
        echo $this->blade->view()->make('mt-admin.users.groups', $data)->render();
    }

}
