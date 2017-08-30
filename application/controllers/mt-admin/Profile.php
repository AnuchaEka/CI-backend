<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
        session_start();
        $_SESSION["RF"]["subfolder"] = "flags";
        $this->load->library('bcrypt');
    }

    public function index()
    {

        $data = array(
            'res' => $this->web->getDataAll(USERS,$this->input->post('search_keyword'),array('name','lastname','email','username')),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => 'ผู้ใช้งานทั้งหมด',
            'ac'=>'',
            'sac'=>''
        );
        echo $this->blade->view()->make('mt-admin.users.profile', $data)->render();
    }

    public function editprofile()
    {
        if($post=$this->input->post()){
            extract($post);
            $id = $this->auth->userid();
           if($this->web->CheckData(USERS,array('email'=>$txt_email,'id !='=>$id))>0){
             
                $this->session->set_tempdata('error', 'อีเมลนี้ถูกใช้อยู่แล้วค่ะ!', 3);
                redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
     
            }else{
            $ins=array(
               'name' =>$txt_name, 
               'lastname' =>$txt_lastname, 
               'address' =>$txt_address, 
               'phone' =>$txt_tel, 
               'gender' =>$txt_gender, 
               'email' =>$txt_email, 
              );
       
              if(!empty($txt_password)){
               $ins['password']=$this->bcrypt->HashPassword($txt_password);
              }
       
              if (isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])) {
               $cc=$this->web->do_upload('avatar',$_SERVER['DOCUMENT_ROOT'].'/assets/profiles/','avatar_'.$id);
               $ins['avatar']=$cc;
               }     
         
            if($this->web->updateData(USERS,$ins,array('id'=>$id))){
       
                if(!empty($save)){
                $this->session->set_tempdata('msg', 'แก้ไขข้อมูลเรียบร้อย', 3);
                redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
       
                }
       
            }
        }
       
       
         }
    }

    public function editavatar()
    {
        if($post=$this->input->post()){
            extract($post);
            $id = $this->auth->userid();
    
              if (isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])) {
               $cc=$this->web->do_upload('avatar',$_SERVER['DOCUMENT_ROOT'].'/assets/profiles/','avatar_'.$id);
               $ins['avatar']=$cc;
               }     
         
            if($this->web->updateData(USERS,$ins,array('id'=>$id))){
       
                if(!empty($save)){
                $this->session->set_tempdata('msg', 'แก้ไขข้อมูลเรียบร้อย', 3);
                redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
       
                }else{
                    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');    
                }
       
            }

         }
    }

    public function editpassword()
    {
        if($post=$this->input->post()){
            extract($post);
            $id = $this->auth->userid();
            $this->load->model('user_model');
            $user = $this->user_model->get('id', $id);

            if ($user) {
                // compare passwords
            if ($this->user_model->check_password($this->input->post('txt_currentpassword'), $user['password'])) {

            $ins=array();
       
              if(!empty($txt_password)){
               $ins['password']=$this->bcrypt->HashPassword($txt_password);
              }

         
            if($this->web->updateData(USERS,$ins,array('id'=>$id))){
       
                if(!empty($save)){
                $this->session->set_tempdata('msg', 'แก้ไขข้อมูลเรียบร้อย', 3);
                redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
       
                }
       
            }
        }else{
            $this->session->set_tempdata('error', 'รหัสผ่านปัจจุบันไม่ถูกต้องค่ะ!', 3);
            redirect(base_url('mt-admin/'.$this->uri->segment(2).'#tab_1_3'),'refresh');
        }
    }

         }
    }



}
