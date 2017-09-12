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
                            <label class="control-label">{{$web->getLable('name')}}</label>

                            <input type="text" class="form-control" name="page_name" id="page_name" required autocomplete="off" value="{{$res['page_name_'.$session->userdata('configlang')]}}">

                        </div>

                        <div class="form-group">
                            <label class="control-label">{{$web->getLable('detail')}}</label>
                            <textarea class="form-control" name="page_content" id="txteditor">{{$res['page_content_'.$session->userdata('configlang')]}}</textarea>

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
                                            <h4 class="caption-subject bold seo-font-blue" id="seotitle"><span id="seo-title">@if(!empty($seo->meta_keyword)) {{$seo->meta_keyword}}  @else {{$res['page_name_'.$session->userdata('configlang')]}} @endif</span> | {{$web->getDatafields(SETTING,'meta_title',array('settings_id'=>1))}}</h4>
                                        </div>

                                        <div>
                                            <span class="seo-font-green">{{base_url()}}</span><span id="seo-url">{{$res['page_slug_'.$session->userdata('configlang')]}}/</span>
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
                                <input type="text" class="form-control" name="page_order" value="@if(!empty($res['page_order'])) {{$res['page_order']}} @else {{$web->getPeriodeNummer(PAGE,'page_order')}} @endif">

                            </div>


                        <div class="form-group">
                            <label class="control-label">{{$web->getLable('status')}} </label>
                            <div>
                                <input type="checkbox" name="status" data-on-text="{{$web->getLable('on')}}" data-off-text="{{$web->getLable('off')}}" class="make-switch"
                                    @if($res['active']==0) {{'checked'}} @endif data-on-color="success"
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
                        {{$web->getLable('image')}} </div>

                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>
                </div>


                <div class="portlet-body">

                    <div class="form-body">
                        <div class="form-group">
                            @if(!empty($res['page_image']))
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div id="inputimage" class="fileinput-new thumbnail" style="max-width:200px;">
                                    <img src="{{$res['page_image']}}" alt="" id="image_preview" /> </div>
                                <input id="image_link" name="link" type="hidden" value="{{$res['page_image']}}">
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

        </div>

        <input type="hidden" name="seo_link" id="seo-link">

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

    $("#page_name").keyup(function (e) {
        $('#seo-url').html(slugify($(this).val()) + '/');
        $('#seo-link').val(slugify($(this).val()));
        $('#seo-title').html($(this).val());
        //    alert($(this).val());
    });

    $("#meta_title").keyup(function (e) {
        if($(this).val()==''){
            $('#seo-title').html($('#page_name').val());   
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

<script src="{{base_url('assets/plugin/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<script src="{{base_url('assets/pages/scripts/editor.js')}}" type="text/javascript"></script>
<script src="{{base_url('assets/pages/scripts/components-code-css.js')}}" type="text/javascript"></script>

@endsection