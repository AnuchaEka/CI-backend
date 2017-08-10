<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Blade template engine for Codeigniter 3.0+',
            'content' => 'Blade template engine for Codeigniter'
        );
        $this->blade->view('mt-admin.posts.posts', $data);
    }

public function add()
{
    echo "ADD";
}

public function edit()
{
    echo "EDIT".$_GET['id'];
}

public function delete($id)
{
   echo "DELETE";
}
}