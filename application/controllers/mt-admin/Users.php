<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{
       public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => 'Blade template engine for Codeigniter 3.0+',
            'content' => 'Blade template engine for Codeigniter'
        );
         echo $this->blade->view()->make('mt-admin.users.users', $data)->render();
    
    }

   
}
