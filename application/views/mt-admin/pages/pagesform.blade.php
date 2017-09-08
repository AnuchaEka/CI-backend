@extends('mt-admin.master') 

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="" id="form_sample_1" method="post" enctype="multipart/form-data">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-doc"></i>{{$title}} </div>
                    @if(sizeof($res)>0)
                    <div class="actions btn-set">

                        <a href="{{base_url('mt-admin/'.$uri->segment(2).'/add')}}" class="btn default btn-secondary-outline">
                                        {{$web->getLable('add')}} <i class="fa fa-plus"></i></a>


                    </div>
                    @endif

                </div>
                <div class="portlet-body">
                    @if(!empty($msg))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$msg}} </div>
                    @endif @if(!empty($error))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$error}}
                    </div>
                    @endif

                    <div class="portlet-body">

                    <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{$web->getLable('name')}} :</label>
                        <div class="col-md-6 tooltip-wide">
                            <input type="text" class="form-control" name="site_name"  value="{{$res->site_name}}" >
                     
                        </div>
                    </div>

                    <div class="form-group">
                                                <label class="col-md-3 control-label">Meta Description:</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" name="meta_description" id="txteditor">{{$res->meta_description}}</textarea>
                                                    <span class="help-block"> {{$web->getLable('max')}} 255 {{$web->getLable('chars')}} </span>
                                                </div>
                                            </div>

             <div class="form-group">
                    <label class="col-md-3 control-label">{{$web->getLable('image')}}:
                       
                    </label>
                    <div class="col-md-8">
                   @if(!empty($res->site_logo))      
                   <div class="fileinput fileinput-new" data-provides="fileinput">
                       <div id="inputimage" class="fileinput-new thumbnail" style="max-width:200px;">
                                <img src="{{$res->site_logo}}"  alt=""  id="image_preview"/> </div>
                            <input id="image_link" name="link" type="hidden" value="{{$res->site_logo}}">
                            <div>
                            <a class="btn iframe-btn default" type="button" href="{{base_url('assets/filemanager/dialog.php?type=1&field_id=image_link&fldr=images')}}">{{$web->getLable('choose_photo')}}</a>

                            <a class="btn red" type="button" id="removeimages"  href="javascript:;">{{$web->getLable('delete_photo')}}</a>
                         </div>
                     </div>
                     @else
                     <div class="fileinput fileinput-new" data-provides="fileinput">
                       <div id="inputimage" >
                                <img src="" style="display:none;" alt=""  id="image_preview"/> </div>
                            <input id="image_link" name="link" type="hidden" value="">
                            <div>
                            <a class="btn iframe-btn default" type="button" href="{{base_url('assets/filemanager/dialog.php?type=1&field_id=image_link&fldr=images')}}">{{$web->getLable('choose_photo')}}</a>

                            <a class="btn red" type="button" id="removeimages" style="display:none;" href="javascript:;">{{$web->getLable('delete_photo')}}</a>

                         </div>
                     </div>
                     @endif
                                                                           

                    </div>
                </div>

               
                    <div class="form-group">
                        <label class="col-md-3 control-label">{{$web->getLable('language_switching')}} :
                                            </label>
                        <div class="col-md-8">
                            <input type="checkbox" name="lang_switching" data-on-text="{{$web->getLable('on')}}" data-off-text="{{$web->getLable('off')}}" class="make-switch"
                                @if($res->lang_switching==0) {{'checked'}}
                            @endif data-on-color="success" data-off-color="danger">
                        </div>
                    </div>
                    
                                        
                </div>

                        <div class="panel-group accordion" id="accordion3">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2">SEO</a>
                                    </h4>
                                </div>
                                <div id="collapse_3_2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Meta Title:</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control maxlength-handler" name="meta_title" maxlength="100" value="{{$res->meta_title}}">
                                                    <span class="help-block"> {{$web->getLable('max')}} 100 {{$web->getLable('chars')}} </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Meta Keywords:</label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control maxlength-handler" rows="8" name="meta_keywords" maxlength="1000">{{$res->meta_keywords}}</textarea>
                                                    <span class="help-block"> {{$web->getLable('max')}} 1000 {{$web->getLable('chars')}} </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Meta Description:</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control maxlength-handler" rows="8" name="meta_description" maxlength="255">{{$res->meta_description}}</textarea>
                                                    <span class="help-block"> {{$web->getLable('max')}} 255 {{$web->getLable('chars')}} </span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label">{{$web->getLable('snippet_preview')}}:</label>
                                                <div class="col-md-9">
                                                    <div class="portlet light portlet-fit bordered">
                                                        <div class="portlet-title bordernone">
                                                            <div class="caption">
                                                                <div>
                                                                    <h4 class="caption-subject bold seo-font-blue uppercase" id="seotitle"><span  id="seo-title"></span> | {{$web->getDatafields(SETTING,'meta_title',array('settings_id'=>1))}}</h4>
                                                                </div>

                                                                <div>
                                                                    <span class="seo-font-green">{{base_url()}}</span><span id="seo-url"></span>
                                                                </div>

                                                                <div class="caption-seo font-grey-cascade"> {{$web->getDatafields(SETTING,'meta_description',array('settings_id'=>1))}}</div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="portlet-title">

                    <div class="actions btn-set">

                        <button type="button" onclick="window.location='{{base_url('mt-admin/'.$uri->segment(2))}}'" name="back" class="btn btn-secondary-outline">
                                                <i class="fa fa-angle-left"></i> {{$web->getLable('back')}}</button>

                        <button class="btn btn-success" type="submit" name="save" value="1">
                                                <i class="fa fa-check"></i> {{$web->getLable('save')}}</button>
                        <button class="btn btn-success" type="submit" name="save_continue" value="1">
                           <i class="fa fa-check-circle"></i> {{$web->getLable('save_continue')}}</button>

                    </div>
                </div>
            </div>
        </form>

    </div>
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
</script>
 <script src="{{base_url('assets/plugin/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
 <script src="{{base_url('assets/pages/scripts/editor.js')}}" type="text/javascript"></script>

@endsection   