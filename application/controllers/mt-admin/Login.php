<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    $this->load->library('bcrypt');

    }

    public function index()
    {

       if($post=$this->input->post()){
        extract($post);

        $res=$this->web->getDataOne(USERS,array('username'=>$username));
        
        if($res){

         if ($this->bcrypt->check_password($password, $res->password))
        {
           $array=array(
            'userid'=>$res->id,
            'usergroup'=>$res->group_id,
            'userparent'=>$res->parent,
           );
    

           $this->session->set_userdata($array);
           redirect(base_url('mt-admin/dashboard'),'refresh');

        }
        else
        {
           $this->session->set_tempdata('error', 'รหัสผ่านไม่ถูกต้องค่ะ!', 3);
          redirect(base_url('mt-admin'),'refresh');
        }   

        }else{
          $this->session->set_tempdata('error', 'ชื่อผู้ใช้งานไม่ถูกต้องค่ะ!', 3);
          redirect(base_url('mt-admin'),'refresh');
        }


        //echo $this->bcrypt->hash_password($password);
       }

       

        $data = array(
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
         );

           echo $this->blade->view()->make('mt-admin.users.login', $data)->render();
    }

    public function chklogin()
    {
       echo "text";
    }
}
