<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Blade template engine for Codeigniter 3.0+',
            'content' => 'Blade template engine for Codeigniter'
        );
        $this->blade->view('mt-admin.layouts.login', $data);
    }

    public function chklogin()
    {
       echo "text";
    }
}
