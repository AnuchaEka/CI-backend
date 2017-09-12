<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
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
            'title' => $this->web->getmenuLable(23),
            'ac'=>'8',
            'sac'=>'23'
        );
        echo $this->blade->view()->make('mt-admin.users.users', $data)->render();
    }

public function add()
{

  if($post=$this->input->post()){
     extract($post);

     if($this->web->CheckData(USERS,array('username'=>$txt_username))>0){
        $this->session->set_tempdata('error', $this->web->getLable('error_username_used'), 3);
        redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3)),'refresh');
    }else if($this->web->CheckData(USERS,array('email'=>$txt_email))>0){
     
        $this->session->set_tempdata('error', $this->web->getLable('error_email_used'), 3);
        redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3)),'refresh');
    

    }else{
     
        $ins=array(
            'name' =>$txt_name, 
            'lastname' =>$txt_lastname, 
            'status' => $status=='on'?0:1, 
            'address' =>$txt_address, 
            'phone' =>$txt_tel, 
            'gender' =>$txt_gender, 
            'email' =>$txt_email, 
            'username' =>$txt_username, 
            'password' =>$this->bcrypt->HashPassword($txt_password), 
            'parent' =>1, 
            'group_id' =>$txt_groupid, 
            'timestamp_create' =>date('Y-m-d H:i:s'),
             'timestamp_update' =>date('Y-m-d H:i:s'),
            'forgotpassword' =>0
             );

             if (isset($_FILES['avatar']['name']) && !empty($_FILES['avatar']['name'])) {
                $cc=$this->web->do_upload('avatar',$_SERVER['DOCUMENT_ROOT'].'/assets/profiles/','avatar_'.$id);
                $ins['avatar']=$cc;
            }
       
            $id=$this->web->insertData(USERS,$ins);
       
            if(!empty($id)){

                if(!empty($save)){
                $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);
                redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
       
                }else{
                $this->session->set_tempdata('msg', $this->web->getLable('msg_save'), 3);
                redirect(base_url('mt-admin/'.$this->uri->segment(2).'/edit/'.$id),'refresh');
       
                }
       
            }

    }
  //print_r($this->input->post());
  }
    $data = array(
            'title' => $this->web->getmenuLable(24),
            'qrgroup' => $this->web->getDataWhere(GROUPS,array('active'=>0)),
            'error' => $this->session->tempdata('error'),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'8',
            'sac'=>'24'
        );
        echo $this->blade->view()->make('mt-admin.users.usersform', $data)->render();
}

public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);
     if($this->web->CheckData(USERS,array('email'=>$txt_email,'id !='=>$id))>0){
        
           $this->session->set_tempdata('error', $this->web->getLable('error_email_used'), 3);
           redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
       
   
       }else{   
     $ins=array(
        'name' =>$txt_name, 
        'lastname' =>$txt_lastname, 
        'status' => $status=='on'?0:1, 
        'address' =>$txt_address, 
        'phone' =>$txt_tel, 
        'gender' =>$txt_gender, 
        'email' =>$txt_email, 
        'username' =>$txt_username, 
        'parent' =>1, 
        'group_id' =>$txt_groupid, 
        'timestamp_update' =>date('Y-m-d H:i:s'), 
        'forgotpassword' =>0
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
         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

         }else{
         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$id),'refresh');

         }

     }
    }


  }

    $data = array(
            'res' => $this->web->getDataOne(USERS,array('id' =>$id)),
            'qrgroup' => $this->web->getDataWhere(GROUPS,array('active'=>0)),
            'title' => $this->web->getmenuLable(23),
            'msg' => $this->session->tempdata('msg'),
             'ac'=>'8',
            'sac'=>'23'
        );
        echo $this->blade->view()->make('mt-admin.users.usersform', $data)->render();
}

public function action()
{
    //print_r($this->input->post());
    if($post=$this->input->post()){
        extract($post);
        if(!empty($action)){
        if($action=='Del'){
            if(count($del)>0){
                foreach ($del as $key => $value) {
                 if($this->web->deleteData(USERS,array('id' =>$value))>0){
                 $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3);
                 }

                }
                 redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
            }else{
                 redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
            }
        }
        }else{
           redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
        }
    }
   //echo "DELETE";
}

public function delete($id)
{

   if($this->web->deleteData(USERS,array('id' =>$id))>0){
         $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3);

    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
   }
}

public function status($id)
{

   if($this->web->updateData(USERS,array('status'=>$this->input->get('status')),array('id'=>$id))){
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');

   }
}

public function deletefile($id)
{
    $res=$this->web->getDataOne(USERS,array('id' =>$id));
    $img=$res->avatar;
    if($this->web->updateData(USERS,array('avatar'=>''),array('id'=>$id))){
    
        $this->web->deleteFiles($_SERVER['DOCUMENT_ROOT'].'/assets/profiles/'.$img);
        redirect(base_url('mt-admin/'.$this->uri->slash_segment(2).'edit/'.$this->uri->segment(4)),'refresh');
    
       }
}


}
