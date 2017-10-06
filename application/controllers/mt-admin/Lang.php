<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lang extends MY_Controller
{

   public function __construct()
    {
        parent::__construct();
        session_start();
        $_SESSION["RF"]["subfolder"] = "flags";
      
    }
    public function index()
    {
      
        $data = array(
            'res' => $this->web->getDataAll(LANG,$this->input->post('search_keyword'),array('lang_iso','lang_name','country')),
            'msg' => $this->session->tempdata('msg'),
            'error' => $this->session->tempdata('error'),
            'title' => $this->web->getmenuLable(33),
            'ac'=>'11',
            'sac'=>'33'
        );
        echo $this->blade->view()->make('mt-admin.lang.lang', $data)->render();
    }

public function add()
{

  if($post=$this->input->post()){
     extract($post);

     if($this->web->CheckData(LANG,array('lang_iso'=>$lang_code))>0){
    $this->session->set_tempdata('error', $this->web->getLable('error_lang_used'), 3);    
    redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3)),'refresh');
    }else{
     $ins=array(
     'lang_name' => $lang_name,
     'lang_iso' => $lang_code,
     'country' => $lang_country,
     'country_iso' => $lang_code,
     'lang_img' => $link,
     'active' => $status=='on'?0:1,
     'timestamp_create' =>date('Y-m-d H:i:s'),
     'timestamp_update' =>date('Y-m-d H:i:s'),
      );
     
     $id=$this->web->insertData(LANG,$ins);

     if(!empty($id)){

              $fields = array(
                    'lang_'.$lang_code => array(
                        'type' => 'VARCHAR',
                        'constraint' => '250',
                        'null' => TRUE,
                ),
        );
              $menus = array(
                    'menu_name_'.$lang_code => array(
                        'type' => 'VARCHAR',
                        'constraint' => '250',
                        'null' => TRUE,
                ),
        );


    $pages = array(
        'page_name_'.$lang_code => array(
            'type' => 'VARCHAR',
            'constraint' => '250',
            'null' => TRUE,
    ),
        'page_content_'.$lang_code => array(
            'type' => 'TEXT',
            'null' => TRUE,
    ),
        'page_slug_'.$lang_code => array(
        'type' => 'VARCHAR',
        'constraint' => '250',
        'null' => TRUE,
    ),
    );

    $category = array(
        'cat_name_'.$lang_code => array(
            'type' => 'VARCHAR',
            'constraint' => '250',
            'null' => TRUE,
    ),
       'cat_slug_'.$lang_code => array(
        'type' => 'VARCHAR',
        'constraint' => '250',
        'null' => TRUE,
    ),
    );

    $posts = array(
        'posts_name_'.$lang_code => array(
            'type' => 'VARCHAR',
            'constraint' => '250',
            'null' => TRUE,
    ),
        'posts_content_'.$lang_code => array(
            'type' => 'LONGTEXT',
            'null' => TRUE,
    ),
        'posts_slug_'.$lang_code => array(
            'type' => 'VARCHAR',
            'constraint' => '250',
            'null' => TRUE,
        ),
    );

    $categoryproduct = array(
        'cat_name_'.$lang_code => array(
            'type' => 'VARCHAR',
            'constraint' => '250',
            'null' => TRUE,
    ),
       'cat_slug_'.$lang_code => array(
        'type' => 'VARCHAR',
        'constraint' => '250',
        'null' => TRUE,
    ),
    );

    $product = array(
        'product_name_'.$lang_code => array(
            'type' => 'VARCHAR',
            'constraint' => '250',
            'null' => TRUE,
    ),
        'product_content_'.$lang_code => array(
            'type' => 'LONGTEXT',
            'null' => TRUE,
    ),
        'product_slug_'.$lang_code => array(
            'type' => 'VARCHAR',
            'constraint' => '250',
            'null' => TRUE,
        ),
    );


    $menulist = array(
        'menulist_name_'.$lang_code => array(
            'type' => 'VARCHAR',
            'constraint' => '250',
            'null' => TRUE,
    )
    );
        
        $this->web->AddColumn(MENUS,$menus);    
        $this->web->AddColumn(LANGLABEL,$fields);
        $this->web->AddColumn(PAGE,$pages);
        $this->web->AddColumn(POSTS,$posts);
        $this->web->AddColumn(CATEGORY,$category);
        $this->web->AddColumn(PAGEMENUSLIST,$menulist);
        $this->web->AddColumn(PRODUCT,$product);
        $this->web->AddColumn(CATEGORYPRODUCT,$categoryproduct);

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
            'title' => $this->web->getmenuLable(33),
            'error' => $this->session->tempdata('error'),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'11',
            'sac'=>'33'
        );
        echo $this->blade->view()->make('mt-admin.lang.langform', $data)->render();
}

public function edit($id)
{
    if($post=$this->input->post()){
     extract($post);

     $ins=array(
     'lang_name' => $lang_name,
     'lang_iso' => $lang_code,
     'country' => $lang_country,
     'country_iso' => $lang_code,
     'lang_img' => $link,
     'active' => $status=='on'?0:1,
     'timestamp_update' =>date('Y-m-d H:i:s'),
      );
     

     if($this->web->updateData(LANG,$ins,array('lang_iso_id'=>$id))){

              $fields = array(
                    'lang_'.$lang_oldcode => array(
                        'name' => 'lang_'.$lang_code,
                        'type' => 'VARCHAR',
                        'constraint' => '250',
                        'null' => TRUE
                ),
        );

          $menus = array(
                    'menu_name_'.$lang_oldcode => array(
                        'name' => 'menu_name_'.$lang_code,
                        'type' => 'VARCHAR',
                        'constraint' => '250',
                        'null' => TRUE
                ),
        );

        $pages = array(
            'page_name_'.$lang_code => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
        ),
            'page_content_'.$lang_code => array(
                'type' => 'TEXT',
                'null' => TRUE,
        ),
            'page_slug_'.$lang_code => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
            ),
        );

        $posts = array(
            'posts_name_'.$lang_code => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
        ),
            'posts_content_'.$lang_code => array(
                'type' => 'LONGTEXT',
                'null' => TRUE,
        ),
            'posts_slug_'.$lang_code => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
            ),
        );

        $category = array(
            'cat_name_'.$lang_code => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
        ),
           'cat_slug_'.$lang_code => array(
            'type' => 'VARCHAR',
            'constraint' => '250',
            'null' => TRUE,
        ),
        );

        $categoryproduct = array(
            'cat_name_'.$lang_code => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
        ),
           'cat_slug_'.$lang_code => array(
            'type' => 'VARCHAR',
            'constraint' => '250',
            'null' => TRUE,
        ),
        );
    
        $product = array(
            'product_name_'.$lang_code => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
        ),
            'product_content_'.$lang_code => array(
                'type' => 'LONGTEXT',
                'null' => TRUE,
        ),
            'product_slug_'.$lang_code => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
            ),
        );

        $menulist = array(
            'menulist_name_'.$lang_code => array(
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => TRUE,
        )
        );

        $this->web->ModifyColumn(MENUS,$menus);
        $this->web->ModifyColumn(LANGLABEL,$fields);
        $this->web->ModifyColumn(PAGE,$pages);
        $this->web->ModifyColumn(POSTS,$posts);
        $this->web->ModifyColumn(CATEGORY,$category);
        $this->web->ModifyColumn(PAGEMENUSLIST,$menulist);
        $this->web->ModifyColumn(PRODUCT,$product);
        $this->web->ModifyColumn(CATEGORYPRODUCT,$categoryproduct);

         if(!empty($save)){
         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');
         
         }else{
         $this->session->set_tempdata('msg', $this->web->getLable('msg_edit'), 3);    
         redirect(base_url('mt-admin/'.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$id),'refresh');   
         
         }

     }
    

  }

    $data = array(
            'res' => $this->web->getDataOne(LANG,array('lang_iso_id' =>$id)),
            'title' => $this->web->getmenuLable(33),
            'msg' => $this->session->tempdata('msg'),
            'ac'=>'11',
            'sac'=>'33'
        );
        echo $this->blade->view()->make('mt-admin.lang.langform', $data)->render();
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
                 $rs=$this->web->getDataOne(LANG,array('lang_iso_id' =>$value));     
                 $lang_iso=$rs->lang_iso;

                 if($this->web->deleteData(LANG,array('lang_iso_id' =>$value,'lang_default !='=>1))>0){
                 $this->dbforge->drop_column(LANGLABEL, 'lang_'.$lang_iso);
                 $this->dbforge->drop_column(MENUS, 'menu_name_'.$lang_iso);
                 $this->dbforge->drop_column(PAGE, 'page_name_'.$lang_iso);
                 $this->dbforge->drop_column(PAGE, 'page_content_'.$lang_iso);
                 $this->dbforge->drop_column(PAGE, 'page_slug_'.$lang_iso);
                 $this->dbforge->drop_column(POSTS, 'posts_name_'.$lang_iso);
                 $this->dbforge->drop_column(POSTS, 'posts_content_'.$lang_iso);
                 $this->dbforge->drop_column(POSTS, 'posts_slug_'.$lang_iso);
                 $this->dbforge->drop_column(CATEGORY, 'cat_name_'.$lang_iso);
                 $this->dbforge->drop_column(CATEGORY, 'cat_slug_'.$lang_iso);
                 $this->dbforge->drop_column(PAGEMENUSLIST, 'menulist_name_'.$lang_iso);
                 $this->dbforge->drop_column(PRODUCT, 'product_name_'.$lang_iso);
                 $this->dbforge->drop_column(PRODUCT, 'product_content_'.$lang_iso);
                 $this->dbforge->drop_column(PRODUCT, 'product_slug_'.$lang_iso);
                 $this->dbforge->drop_column(CATEGORYPRODUCT, 'cat_name_'.$lang_iso);
                 $this->dbforge->drop_column(CATEGORYPRODUCT, 'cat_slug_'.$lang_iso);
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
    $rs=$this->web->getDataOne(LANG,array('lang_iso_id' =>$id));     
    $lang_iso=$rs->lang_iso;
   if($this->web->deleteData(LANG,array('lang_iso_id' =>$id,'lang_default !='=>1))>0){
         $this->dbforge->drop_column(LANGLABEL, 'lang_'.$lang_iso);
         $this->dbforge->drop_column(MENUS, 'menu_name_'.$lang_iso);
         $this->dbforge->drop_column(PAGE, 'page_name_'.$lang_iso);
         $this->dbforge->drop_column(PAGE, 'page_content_'.$lang_iso);
         $this->dbforge->drop_column(PAGE, 'page_slug_'.$lang_iso);
         $this->dbforge->drop_column(POSTS, 'posts_name_'.$lang_iso);
         $this->dbforge->drop_column(POSTS, 'posts_content_'.$lang_iso);
         $this->dbforge->drop_column(POSTS, 'posts_slug_'.$lang_iso);
         $this->dbforge->drop_column(CATEGORY, 'cat_name_'.$lang_iso);
         $this->dbforge->drop_column(CATEGORY, 'cat_slug_'.$lang_iso);
         $this->dbforge->drop_column(PRODUCT, 'product_name_'.$lang_iso);
         $this->dbforge->drop_column(PRODUCT, 'product_content_'.$lang_iso);
         $this->dbforge->drop_column(PRODUCT, 'product_slug_'.$lang_iso);
         $this->dbforge->drop_column(CATEGORYPRODUCT, 'cat_name_'.$lang_iso);
         $this->dbforge->drop_column(CATEGORYPRODUCT, 'cat_slug_'.$lang_iso);
         $this->dbforge->drop_column(PAGEMENUSLIST, 'menulist_name_'.$lang_iso);
         $this->session->set_tempdata('msg', $this->web->getLable('msg_delete'), 3); 
   
    redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh');     

   }else{
      $this->session->set_tempdata('error', $this->web->getLable('error_delete'), 3);  
      redirect(base_url('mt-admin/'.$this->uri->segment(2)),'refresh'); 
   }
}
}
