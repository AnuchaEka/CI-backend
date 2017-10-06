@extends('mt-admin.master') 

@section('content')
<div class="row">
    <form class="" action="" id="form_sample_1" method="post" enctype="multipart/form-data">
        <div class="col-md-9">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-doc"></i>{{$title}} </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>
                    @if(sizeof($res)>0)
                    <div class="actions btn-set">

                        <a href="{{base_url('mt-admin/'.$uri->segment(2).'/add')}}" class="btn default btn-secondary-outline">
                                        {{$web->getLable('add')}} <i class="fa fa-plus"></i></a>


                    </div>
                    @endif

                </div>
                <div class="portlet-body form">
                    @if(!empty($msg))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$msg}} </div>
                    @endif 
                    
                    @if(!empty($error))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$error}}
                    </div>
                    @endif


                    <div class="form-body">

                        <div class="form-group">
                            <label class="control-label">{{$web->getLable('text_name')}}</label>

                            <input type="text" class="form-control" name="product_name" id="product_name" required autocomplete="off" value="{{$res['product_name_'.$session->userdata('configlang')]}}">

                        </div>

                        <div class="form-group">
                            <label class="control-label">{{$web->getLable('detail')}}</label>
                            <textarea class="form-control" name="product_content" id="txteditor">{{$res['product_content_'.$session->userdata('configlang')]}}</textarea>

                        </div>


                    </div>

                </div>

            </div>

            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        {{$web->getLable('custom_seo')}}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>

                </div>
                <div class="portlet-body form">

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">{{$web->getLable('snippet_preview')}}</label>
                            <div class="portlet light portlet-fit bordered">
                                <div class="portlet-title bordernone">
                                    <div class="caption">
                                        <div>
                                            <h4 class="caption-subject bold seo-font-blue" id="seotitle"><span id="seo-title">@if(!empty($seo->meta_title)) {{$seo->meta_title}}  @else {{$res['product_name_'.$session->userdata('configlang')]}} @endif</span> | {{$web->getDatafields(SETTING,'meta_title',array('settings_id'=>1))}}</h4>
                                        </div>

                                        <div>
                                            <span class="seo-font-green">{{base_url()}}<span id="seo-url">{{$res['product_slug_'.$session->userdata('configlang')]}}@if(!empty($res)){{'/'}}@endif</span></span>
                                        </div>

                                        <div class="caption-seo font-grey-cascade"> <span id="seo-description">@if(!empty($seo->meta_description)) {{$seo->meta_description}}  @else {{$web->getDatafields(SETTING,'meta_description',array('settings_id'=>1))}} @endif</span></div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Meta Title:</label>
                            <input type="text" class="form-control maxlength-handler" name="meta_title" id="meta_title" autocomplete="off" maxlength="100"
                                value="{{$seo->meta_title}}">
                            <span class="help-block"> {{$web->getLable('max')}} 100 {{$web->getLable('chars')}} </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Meta Keywords:</label>
                            <textarea class="form-control maxlength-handler" rows="8" name="meta_keywords" id="meta_keywords" maxlength="1000">{{$seo->meta_keyword}}</textarea>
                            <span class="help-block"> {{$web->getLable('max')}} 1000 {{$web->getLable('chars')}} </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Meta Description:</label>
                            <textarea class="form-control maxlength-handler" rows="8" name="meta_description" id="meta_description" maxlength="255">{{$seo->meta_description}}</textarea>
                            <span class="help-block"> {{$web->getLable('max')}} 255 {{$web->getLable('chars')}} </span>
                        </div>


                    </div>
                </div>

            </div>

            <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                   ข้อมูลสินค้า </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    
                </div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-3">
                        <ul class="nav nav-tabs tabs-left">
                            <li class="active">
                                <a href="#tab_6_1" data-toggle="tab"> ทั่วไป </a>
                            </li>
                            <li>
                                <a href="#tab_6_2" data-toggle="tab"> สินค้าคงคลัง </a>
                            </li>
                            <li>
                            <a href="#tab_6_3" data-toggle="tab"> การจัดส่ง </a>
                            </li>
                            <li>
                                <a href="#tab_6_4" data-toggle="tab"> สินค้าที่เชื่อมโยง </a>
                            </li>
                            <li>
                                <a href="#tab_6_1" data-toggle="tab"> คุณสมบัติ </a>
                            </li>
                            <li>
                                <a href="#tab_6_1" data-toggle="tab"> รูปแบบ </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_6_1">
                                <p> Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                                    butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher
                                    voluptate nisi qui. </p>
                            </div>
                            <div class="tab-pane fade" id="tab_6_2">
                                <p> Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table
                                    craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit.
                                    Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel.
                                    Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park. </p>
                            </div>
                            <div class="tab-pane fade" id="tab_6_3">
                                <p> Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone
                                    skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork
                                    biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr. </p>
                            </div>
                            <div class="tab-pane fade" id="tab_6_4">
                                <p> Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party
                                    locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade
                                    thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        CSS</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>


                </div>
                <div class="portlet-body form">

                    <div class="form-body">
                        <textarea id="code_editor" name="code_editor">{{base64_decode($res['custom_css'])}}</textarea>
                    </div>

                </div>

            </div>


        </div>

        <div class="col-md-3">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        {{$web->getLable('publish')}} </div>

                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>
                </div>


                <div class="portlet-body">

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">{{$web->getLable('language_name')}} </label>
                            <select class=" form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            @foreach($web->getDataWhere(LANG,array('active'=>0),1) as $val)
                            <option @if($session->userdata('configlang')==$val['lang_iso']) selected @endif value="{{'?lang='.$val['lang_iso']}}">{{$val['lang_name']}}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                                <label class="control-label">{{$web->getLable('sorting')}} </label>
                                <input type="text" class="form-control" name="product_order" value="@if(!empty($res['product_order'])){{$res['product_order']}}@else{{$web->getPeriodeNummer(POSTS,'product_order')}}@endif">

                            </div>


                        <div class="form-group">
                            <label class="control-label">{{$web->getLable('status')}} </label>
                            <div>
                                <input type="checkbox" name="status" data-on-text="{{$web->getLable('on')}}" data-off-text="{{$web->getLable('off')}}" class="make-switch"
                                    @if($res['product_active']==0) {{'checked'}} @endif data-on-color="success"
                                data-off-color="danger">
                            </div>
                        </div>



                    </div>

                </div>
                <div class="portlet-title">

                    <div class="actions btn-set">

                        <button class="btn btn-success" type="submit" name="save" value="Draft">
                                                <i class="fa fa-check"></i> {{$web->getLable('save_draft')}}</button>

                        <button class="btn btn-success" type="submit" name="save" value="Publish">
                                                <i class="fa fa-check"></i> {{$web->getLable('save')}}</button>


                    </div>
                </div>
            </div>

            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        {{$web->getLable('category')}} </div>

                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>
                </div>


                <div class="portlet-body">

                    <div class="form-body">
                    <div class="form-control height-auto">
                    <div class="scroller" style="height:275px;" data-always-visible="1">
                    
                            @php
                            //print_r($cproduct);
                            $tree = $func->buildTree($cat);
                            $func->chekboxproduct($tree,$r = 0, $p = null,$productid);

                            @endphp
          
                    </div>
                </div>



                    </div>
                </div>

            </div>

 
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        {{$web->getLable('image')}} </div>

                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>
                </div>


                <div class="portlet-body">

                    <div class="form-body">
                        <div class="form-group">
                            @if(!empty($res['product_images']))
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div id="inputimage" class="fileinput-new thumbnail" style="max-width:200px;">
                                    <img src="{{$res['product_images']}}" alt="" id="image_preview" /> </div>
                                <input id="image_link" name="link" type="hidden" value="{{$res['product_images']}}">
                                <div>
                                    <a class="btn iframe-btn default" type="button" href="{{base_url('assets/filemanager/dialog.php?type=1&field_id=image_link&fldr=images')}}">{{$web->getLable('choose_photo')}}</a>

                                    <a class="btn red" type="button" id="removeimages" href="javascript:;">{{$web->getLable('delete_photo')}}</a>
                                </div>
                            </div>
                            @else
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div id="inputimage">
                                    <img src="" style="display:none;" alt="" id="image_preview" /> </div>
                                <input id="image_link" name="link" type="hidden" value="">
                                <div>
                                    <a class="btn iframe-btn default" type="button" href="{{base_url('assets/filemanager/dialog.php?type=1&field_id=image_link&fldr=images')}}">{{$web->getLable('choose_photo')}}</a>

                                    <a class="btn red" type="button" id="removeimages" style="display:none;" href="javascript:;">{{$web->getLable('delete')}}</a>

                                </div>
                            </div>
                            @endif

                        </div>
                       

                    </div>
                </div>

            </div>

            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        {{$web->getLable('gallery')}} </div>

                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>
                </div>


                <div class="portlet-body">

                    <div class="form-body">
                        <div class="form-group">
                        <input type="file" name="files[]" id="filer_input1"
                        multiple="multiple">
                        </div>
                        


                    </div>
                </div>

            </div>

        </div>

        <input type="hidden" name="seo_link" id="seo-link" value="{{$res['product_slug_'.$session->userdata('configlang')]}}">

    </form>
</div>
@endsection 

@section('script')
<script src="{{base_url('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
<script>
    $('.maxlength-handler').maxlength({
        limitReachedClass: "label label-danger",
        alwaysShow: true,
        threshold: 5
    });

    $("#product_name").keyup(function (e) {
        $('#seo-url').html(slugify($(this).val()) + '/');
        $('#seo-link').val(slugify($(this).val()));
        if($("#meta_title").val()==''){
            $('#seo-title').html($(this).val());  
        }else{
            $('#seo-title').html($('#meta_title').val());     
        }
       
        //    alert($(this).val());
    });

    $("#meta_title").keyup(function (e) {
        if($(this).val()==''){
            $('#seo-title').html($('#product_name').val());   
        }else{
           $('#seo-title').html($(this).val());
        }
       
        //    alert($(this).val());
    });

    $("#meta_description").keyup(function (e) {

        if($(this).val()==''){
         $('#seo-description').html("{{$web->getDatafields(SETTING,'meta_description',array('settings_id'=>1))}}");  
        }else{
         $('#seo-description').html($(this).val());
        }
        
        //    alert($(this).val());
    });
</script>
<script>
var fileview = {
        "file": [
            { "name": "1.jpg","type": "image/jpg","file": "http://www.console.projectjaidee.com/assets/media/images/2.jpg"},
            { "name": "1.jpg","type": "image/jpg","file": "http://www.console.projectjaidee.com/assets/media/images/2.jpg"},
            { "name": "1.jpg","type": "image/jpg","file": "http://www.console.projectjaidee.com/assets/media/images/2.jpg"},
        ]
     };
</script>

<script src="{{base_url('assets/plugin/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="{{base_url('assets/pages/scripts/editor.js')}}" type="text/javascript"></script>
<script src="{{base_url('assets/pages/scripts/components-code-css.js')}}" type="text/javascript"></script>
<script src="{{base_url('assets/plugin/jquery.filer/js/jquery.filer.min.js')}}"></script>
<script src="{{base_url('assets/plugin/jquery.filer/jquery.fileuploads.init.js')}}"></script>

@endsection
@section('css')
<link href="{{base_url('assets/plugin/jquery.filer/css/jquery.filer.css')}}" rel="stylesheet" />
<link href="{{base_url('assets/plugin/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')}}" rel="stylesheet" />

@endsection