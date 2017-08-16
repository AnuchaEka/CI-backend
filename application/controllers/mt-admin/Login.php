<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

      

    }

    public function index()
    {

       if ($this->auth->loggedin()) {
        redirect(base_url('mt-admin/dashboard'),'refresh');
        }


       if($post=$this->input->post()){
        extract($post);

        if ($this->input->post('username') && $this->input->post('password')) {
            $remember = $this->input->post('remember') ? TRUE : FALSE;
            
            // get user from database
            $this->load->model('user_model');
            $user = $this->user_model->get('username', $this->input->post('username'));

            if ($user) {
                // compare passwords
                if ($this->user_model->check_password($this->input->post('password'), $user['password'])) {

                    
                    // mark user as logged in
                     $this->auth->login($user['id'], $remember);
                    redirect(base_url('mt-admin/dashboard'),'refresh');
                } else {
                    $this->session->set_tempdata('error', 'รหัสผ่านไม่ถูกต้องค่ะ!', 3);
                    redirect(base_url('mt-admin'),'refresh');
                }
            } else {
                $this->session->set_tempdata('error', 'ชื่อผู้ใช้งานไม่ถูกต้องค่ะ!', 3);
                redirect(base_url('mt-admin'),'refresh');
            }
        }
    }

        $data = array(
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
         );

           echo $this->blade->view()->make('mt-admin.users.login', $data)->render();
  
}

   


}
