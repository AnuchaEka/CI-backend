<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
use Philo\Blade\Blade;
class MY_Controller extends CI_Controller
{
    protected $blade;
    protected $views = APPPATH . '/views';
    protected  $cache = APPPATH . '/cache';
    public function __construct()
    {
        parent::__construct();
        $this->blade = new Blade($this->views, $this->cache);
        $this->blade->view()->composer("*", function($view)
        {
                
        // $language=$this->session->userdata('language');
        //  if(empty($language)){

        //   $this->lang->load('thailand','thailand');

        //  }else{
        //    $this->lang->load($language,$language);
        //  }
       if(!empty($_GET['lang'])){
            $this->session->set_userdata('configlang',$_GET['lang']); 
            
           }else{
            $this->session->set_userdata('configlang','th'); 
             
           }
 
            $view->with("session", $this->session);
            $view->with("uri", $this->uri);
            $view->with("lang", $this->lang);
            $view->with("web", $this->web);
            $view->with("input", $this->input);
            $view->with("authen", $this->auth);
            
        });
    }
}
