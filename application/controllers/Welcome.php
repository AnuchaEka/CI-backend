<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'res' => $this->web->getDataAll(LANG,$this->input->post('search_keyword'),array('lang_iso','lang_name','country')),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(33),
            'ac'=>'11',
            'sac'=>'33'
        );
        echo $this->blade->view()->make('frontend.welcome', $data)->render();
 
    }

}