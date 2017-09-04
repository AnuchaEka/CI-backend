<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backupdatabase extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
      
    }
    public function index()
    {
      
        $data = array(
            'res' => $this->web->getDataAll(BACKUPDB,$this->input->post('search_keyword'),array('backup_filename')),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(39),
            'ac'=>'11',
            'sac'=>'39'
        );
        echo $this->blade->view()->make('mt-admin.setting.backupdatabase', $data)->render();
    }

    public function backupDB()
    {
        $this->load->dbutil();
        $prefs = array(     
                'format'      => 'zip',             
                'filename'    => 'my_db_backup.sql'
          );
        $backup =& $this->dbutil->backup($prefs); 
        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $ins= array(
            'backup_filename' => $db_name, 
            'timestamp_create' => date('Y-m-d H:i:s')
        );  
        $id=$this->web->insertData(BACKUPDB,$ins);

        $save = FCPATH.'assets/backupdatabase/'.$db_name;
        $this->load->helper('file');
        write_file($save, $backup); 
        $this->load->helper('download');
        force_download($db_name, $backup); 
        # code...
    }

    public function download($db_name)
    {
        $this->load->helper('download');
        $backup = FCPATH.'assets/backupdatabase/'.base64_decode($db_name);
        force_download($backup,NULL); 
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
                      $this->deletefile($value);      
                     if($this->web->deleteData(BACKUPDB,array('id' =>$value))>0){
                        $this->session->set_tempdata('msg',$this->web->getLable('msg_delete'), 3);
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
        
       if($this->web->deleteData(BACKUPDB,array('id' =>$id))>0){

            $this->deletefile($id);
            $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3);
            redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
    
       }else{
          $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);
          redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
       }
    }

    public function deletefile($id)
    {
        $res=$this->web->getDataOne(BACKUPDB,array('id' =>$id));
        $file=$res->backup_filename;
        
        if(!empty($file)){
        
            $this->web->deleteFiles(FCPATH.'assets/backupdatabase/'.$file);
            return true;
           }
    }

}
