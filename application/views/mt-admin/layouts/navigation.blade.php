@extends('mt-admin.master') @section('css')
<link href="{{base_url('assets/global/plugins/jquery-nestable/jquery.nestable.css')}}" rel="stylesheet" type="text/css" /> @endsection @section('content')
<div class="row">

<form  action="" id="form_sample_1" method="post" enctype="multipart/form-data">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-title">
            <div class="form-group">
            @if(sizeof($pagemenus) >0)
            <label class="control-label col-md-2">เลือกเมนูที่จะแก้ไข </label>
                <div class="col-md-4">
                <select class=" form-control" name="menus">
                          @foreach($pagemenus as $rsmenu)
                         <option @if($rsmenu['active']==1) selected @endif value="{{$rsmenu['page_menu_id']}}">{{$rsmenu['page_menu_name']}}</option>
                         @endforeach
                     </select>
                    
            </div>
            <button class="btn btn-success" type="submit" name="save" value="selectmenu"> {{$web->getLable('select')}}</button>
            @endif


            <a class="btn btn-success" data-toggle="modal" href="#basic">สร้างเมนูใหม่</a>
            </div>
    
            </div>
        </div>
    </div>
    </form>
   
    <form class="form-horizontal" action="" id="form_sample_1" method="post" enctype="multipart/form-data">

        <div class="col-md-4">
            <div class="portlet light">
                <div class="portlet-title">
                <div class="caption">
                <i class="icon-doc"></i>{{$title}} </div>

                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>
                </div>


                <div class="portlet-body">
                <div style="margin-bottom:15px;">
                            <label class="control-label">{{$web->getLable('language_name')}} </label>
                            <select class=" form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                         @foreach($web->getDataWhere(LANG,array('active'=>0),1) as $val)
                         <option @if($session->userdata('configlang')==$val['lang_iso']) selected @endif value="{{'?lang='.$val['lang_iso']}}">{{$val['lang_name']}}</option>
                         @endforeach
                     </select>
                      </div>
                        <div class="panel-heading accordionborder">
                            <h4 class="panel-title">
                            หน้า<a class="accordion-toggle pull-right" data-toggle="collapse" data-parent="#pages" href="#pages"><i class="fa fa-sort-down"></i></a>
                            </h4>
                        </div>
                            <div id="pages" class="panel-collapse collapse">
                            <div class="panel-body" >
                            <div class="portlet-title">

                            <div style="height:200px; overflow-y:auto;">
                            
                            @foreach($page as $rspage)
                            <label class='mt-checkbox mt-checkbox-outline'>{{$rspage['page_name_'.$session->userdata('configlang')]}}<input type='checkbox' name='page[]'  value='{{$rspage["pages_id"]}}'><span></span></label><br>

                            @endforeach
                            </div>

                                <div class="actions btn-set pull-right">

                                    <button class="btn btn-success" type="submit" name="save" value="acpages">
                                                        <i class="fa fa-check"></i> {{$web->getLable('add_menu')}}</button>


                                </div>
                            </div> 
                            </div>
                        </div>
                        <div class="panel-heading accordionborder">
                            <h4 class="panel-title">
                            เรื่อง  <a class="accordion-toggle pull-right" data-toggle="collapse" data-parent="#posts" href="#posts"><i class="fa fa-sort-down"></i></a>
                            </h4>
                        </div>
                        <div id="posts" class="panel-collapse collapse">
                        <div class="panel-body" >
                        <div class="portlet-title ">

                        <div style="height:200px; overflow-y:auto;">
                        @foreach($post as $rspost)
                            <label class='mt-checkbox mt-checkbox-outline'>{{$rspost['posts_name_'.$session->userdata('configlang')]}}<input type='checkbox' name='posts[]'  value='{{$rspost["posts_id"]}}'><span></span></label><br>

                            @endforeach
                        
                        </div>

                            <div class="actions btn-set pull-right">

                                <button class="btn btn-success" type="submit" name="save" value="acposts">
                                                    <i class="fa fa-check"></i> {{$web->getLable('add_menu')}}</button>


                            </div>
                        </div> 
                        </div>
                        </div>

                        <div class="panel-heading accordionborder">
                            <h4 class="panel-title">
                            ปรับแต่งลิงก์  <a class="accordion-toggle pull-right" data-toggle="collapse" data-parent="#customlink" href="#customlink"><i class="fa fa-sort-down"></i></a>
                            </h4>
                        </div>
                        <div id="customlink" class="panel-collapse collapse">
                        <div class="panel-body" >
                        <div class="portlet-title">

                        <div >
                        <div class="form-body">
                    
                        <div class="form-group">
                           <label class="control-label col-md-3">URL </label>
                               <div class="col-md-9">
                                  <input type="url" name="url" data-parsley-type="url"  class="form-control" value="{{($_SERVER['SERVER_PORT'] == 443 ? 'https' : 'http')}}://" required> 
                         </div>
                       </div>
                 
                       <div class="form-group">
                           <label class="control-label col-md-3">หัวข้อ </label>
                               <div class="col-md-9">
                                  <input type="text" name="title"  class="form-control" required> </div>
                       </div>
                       </div>
                        
                        </div>

                            <div class="actions btn-set pull-right">

                                <button class="btn btn-success" type="submit" name="save" value="accustomlink">
                                                    <i class="fa fa-check"></i> {{$web->getLable('add_menu')}}</button>


                            </div>
                        </div> 
                        </div>
                        </div>

                        <div class="panel-heading accordionborder">
                            <h4 class="panel-title">
                            หมวดหมู่  <a class="accordion-toggle pull-right" data-toggle="collapse" data-parent="#category" href="#category"><i class="fa fa-sort-down"></i></a>
                            </h4>
                        </div>
                        <div id="category" class="panel-collapse collapse">
                            <div class="panel-body" >
                            <div class="portlet-title">

                            <div style="height:200px; overflow-y:auto;">
                            @php
                            //print_r($cposts);
                            $tree = $func->buildTree($cat);
                            $func->printTreechekbox($tree,$r = 0, $p = null,$postid);

                            @endphp
                            </div>

                                <div class="actions btn-set pull-right">

                                    <button class="btn btn-success" type="submit" name="save" value="accategory">
                                                        <i class="fa fa-check"></i> {{$web->getLable('add_menu')}}</button>


                                </div>
                            </div> 
                            </div>
                              
                        </div>


                </div>
                
            </div>
            <input type="hidden" name="menuid" id="menuid" value="{{$res['page_menu_id']}}">



        </div>
    </form>
    
    <form  action="{{base_url($uri->slash_segment(1).$uri->slash_segment(2).'add')}}" id="form_sample_1" method="post" enctype="multipart/form-data">
    <div class="col-md-8">
        <div class="portlet light">
            <div class="portlet-title">
            <div class="form-group">
            <label class="control-label pull-left">ชื่อเมนู </label>
                <div class="col-md-4">
                   <input type="text" name="name"  class="form-control input-sm" value="{{$res['page_menu_name']}}"> 
                   <input type="hidden" name="menuid" id="menuid" value="{{$res['page_menu_id']}}">
            </div>
            </div>

    

            </div>

            <div class="portlet-body form">
                @if(!empty($msg))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$msg}} </div>
                @endif @if(!empty($error))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$error}}
                </div>
                @endif

                <div class="dd" id="nestable">

                @php
                 $menus=$web->getDataWhere(PAGEMENUSLIST,array('page_menu_id'=>$res['page_menu_id']),2,array('menulist_order','asc'));
                 $tree = $func->buildTreemenu($menus);
                 $func->printTreemenu($tree);

                 @endphp
         
                </div>

                <h4>ตั้งค่าเมนู</h4>
                @foreach($optionmenu as $rsoptionmenu)

                <label class='mt-checkbox mt-checkbox-outline'>{{$rsoptionmenu['menu_option_name']}}<input type='checkbox' name="optionmenu[{{$rsoptionmenu['menu_option_key']}}]" @if($rsoptionmenu['page_menu_id']==$res['page_menu_id']){{'checked'}} @endif value="{{$res['page_menu_id']}}"><span></span></label><br>

                @endforeach
                

            </div>

            <div class="portlet-title">

                    <div class="actions btn-set">

                        <a class="btn btn-danger" href="{{base_url('mt-admin/'.$uri->segment(2).'/delete/'.$res['page_menu_id'])}}" data-toggle="confirmation"  data-popout="true" data-placement="left" data-singleton="true" data-title="{{$web->getLable('confirm_delete')}}"  data-btn-cancel-label="{{$web->getLable('no')}}" data-btn-ok-label="{{$web->getLable('yes')}}">
                                                <i class="fa fa-close"></i> {{$web->getLable('delete')}}</a>

                        <button class="btn btn-success" type="submit" name="save" value="Publish">
                                                <i class="fa fa-check"></i> {{$web->getLable('save')}}</button>


                    </div>
                </div>

        </div>


    </div>

  
    </form>

</div>


<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
   <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
         <h4 class="modal-title">สร้างเมนูใหม่</h4>
      </div>
        <div class="modal-body">
        <div class="form-group">
            <label class="control-label col-md-2">ชื่อเมนู </label>
                <div class="col-md-9">
                   <input type="text" name="menuname"  class="form-control input-sm" value=""> 
 
            </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn dark btn-outline" data-dismiss="modal">{{$web->getLable('close')}}</button>
            <button type="submit" name="save" value="addnew" class="btn green">{{$web->getLable('save')}}</button>
        </div>
        </form>
     </div>
                                            <!-- /.modal-content -->
    </div>
                                        <!-- /.modal-dialog -->
  </div>
                                    <!-- /.modal -->

@endsection @section('script')
<script src="{{base_url('assets/global/plugins/jquery-nestable/jquery.nestable.js')}}" type="text/javascript"></script>
<!-- <script src="{{base_url('assets/pages/scripts/ui-nestable.js')}}" type="text/javascript"></script> -->
<script>
$(document).ready(function () {
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target), output = list.data('output');

        $.ajax({
            method: "POST",
            url: baseurl+"mt-admin/navigation/saveListdata",
            data: {
                list: list.nestable('serialize')
            }
        }).fail(function(jqXHR, textStatus, errorThrown){
            alert("Unable to save new list order: " + errorThrown);
        });
    };

    $('#nestable').nestable({
        group: 1,
        maxDepth: 7,
    }).on('change', updateOutput);
});
</script>
@endsection