<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgotpassword extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encrypt');
    }

public function index()
{
	if ($this->input->post()) {        
    
    $rs=$this->web->getDataOne(USERS,array('email'=>$this->input->post('email')));
   //print_r($rs);
   
   if($rs){	    
    
    $token=$rs->id;
		$message='<table  border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
      <tr>
        <td  valign="top" width="100%" class="background" style="margin: 0;padding: 0;width: 100% !important;">

            <table cellpadding="0" cellspacing="0" width="80%" class="wrap" style="width: 80%;">
              <tr>
                <td valign="top" class="wrap-cell" style="padding-top:30px; padding-bottom:30px;">
                  <table cellpadding="0" cellspacing="0" class="force-full-width" style="width: 100% !important;">
                    <tr>
                     <td height="60" valign="top" class="header-cell" >
                        <img width="210"  src="'.base_url().'assets/media/mountain-logo.png" alt="logo">
                        <div style="float:right;padding-top:25px;">
                          <a href="'.base_url().'/mt-admin">ล็อคอิน</a>
                        </div>
                        <hr />
                      </td>
                    </tr>
                    <tr>
                      <td valign="top">
                        <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
                          <tr>
                            <td valign="top" style="background-color:#ffffff;">
                              <p>
                                <strong>สวัสดี '.$rs->name.' '.$rs->lastname.'</strong>,
                              </p>
                              เราได้รับคำร้องขอเปลี่ยนแปลงรหัสผ่านจากคุณ.
                            </td>
                          </tr>
                          <tr>
                            <td valign="top" style=" background-color:#ffffff;">
                              <p>ท่านสามารถตั้งรหัสผ่านใหม่สำหรับใช้งาน โดยคลิกที่ลิงค์ด้านล่างนี้เพื่อเปลี่ยนหรัสผ่านบัญชีของคุณ</p>
                              <a href="'.base_url().'mt-admin/resetpassword?token='.base64_encode(base64_encode(base64_encode($token))).'">'.base_url().'mt-admin/resetpassword?token='.base64_encode(base64_encode(base64_encode($token))).'</a><br>
                              <p>
                                หากมีข้อสงสัยใดๆ หรือ ต้องการความช่วยเหลือ ติดต่อเราได้ทันทีที่เบอร์ 090-971-9345 หรืออีเมล์มาได้ที่ keadipot@gmail.com
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
                                <tr>

                                  <td width="360" style="background-color:#ffffff; font-size:0; line-height:0;">&nbsp;</td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding-top:20px;background-color:#ffffff;">
                              ขอบคุณค่ะ,<br>
                            ทีมงาน  MOUNTAIN STUDIO 
                            </td>

                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr >
                      <td valign="top" class="footer-cell" style="font-size: 13px;padding-top: 30px;padding-bottom: 30px;">
                           <hr />
                        <p style="">Copyright © 2017 2017 © BACKEND SYSTEM BY MOUNTAIN STUDIO.</p>
                     </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>

        </td>
      </tr>
    </table>

';
$this->load->library('email');
		//$config['protocol'] = 'sendmail';
    $config = array(
      'protocol'  => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'Your Gmail address',
      'smtp_pass' => 'Your Gmail password',
      'mailtype'  => 'html',
      'charset'   => 'utf-8'
  );
  $this->email->initialize($config);
  $this->email->set_mailtype("html");
  $this->email->set_newline("\r\n");


  $this->email->from('keadipot@gmail.com', 'MOUNTAIN STUDIO');
  $this->email->to($rs->email);
// $this->email->cc('another@another-example.com');
// $this->email->bcc('them@their-example.com');

$this->email->subject('ยืนยันคำร้องขอเปลี่ยนแปลงรหัสผ่าน');
$this->email->message($message);

 $this->email->send();

 $this->web->updateData(USERS,array('forgotPassword'=>1),array('id'=>$rs->id));

	//$data['msg']='ข้อมูลการรีเซทได้ถูกส่งไปที่เมล์คุณแล้ว!';
  $this->session->set_tempdata('msg', 'ข้อมูลการรีเซทได้ถูกส่งไปที่เมล์คุณแล้ว', 3);
  
  redirect(base_url('mt-admin/forgotpassword'),'refresh');
   
	}else{
	//$data['error']='อีเมล์ยังไม่ได้ลงทะเบียน';
  $this->session->set_tempdata('error', 'อีเมล์ยังไม่ได้ลงทะเบียน', 3); 
  redirect(base_url('mt-admin/forgotpassword'),'refresh');
	}


}
$data = array(
    'msg' => $this->session->tempdata('msg'),
    'error' => $this->session->tempdata('error'),
 );

   echo $this->blade->view()->make('mt-admin.users.forgotpassword', $data)->render();

}

}
