<?php
defined('BASEPATH') or exit('No direct script access allowed');

final class Welcome extends MY_Controller
{
     public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
      //  echo "test";
      $data['name']='pepe';
      $data['users']=array('juan', 'pepe', 'andrés');
      echo $this->blade->view()->make('hello', $data)->render();
    }
}

