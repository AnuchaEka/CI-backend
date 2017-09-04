@extends('mt-admin.master')

 @section('content')
 <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal form-row-seperated" action="" id="form_sample_1" method="post">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-wrench"></i>{{$title}} </div>
                                       
                                    </div>
                                    <div class="portlet-body">
                                         @if(!empty($msg))
                                          <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                         {{$msg}} </div>
                                        @endif
       
                                        <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$web->getLable('site_title')}} :</label>
                                                            <div class="col-md-6 tooltip-wide">
                                                                <input type="text" class="form-control maxlength-handler" name="site_name"  value="{{$res->site_name}}" >
                                                         
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$web->getLable('suffix_titles')}} :</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control maxlength-handler" name="site_suffix"  value="{{$res->site_suffix}}">
                                                         
                                                            </div>
                                                        </div>

                                                 <div class="form-group">
                                                        <label class="col-md-3 control-label">{{$web->getLable('website_logo')}}:
                                                           
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
                                                        <label class="col-md-3 control-label">{{$web->getLable('website_favicon')}}:
                                                           
                                                        </label>
                                                        <div class="col-md-8">
                                                       @if(!empty($res->site_favicon))      
                                                       <div class="fileinput fileinput-new" data-provides="fileinput">
                                                           <div id="inputimage2" class="fileinput-new thumbnail" style="max-width:200px;">
                                                                    <img src="{{$res->site_favicon}}"  alt=""  id="image_preview2"/> </div>
                                                                <input id="image_link2" name="link2" type="hidden" value="{{$res->site_favicon}}">
                                                                <div>
                                                                <a class="btn iframe-btn default" type="button" href="{{base_url('assets/filemanager/dialog.php?type=1&field_id=image_link2&fldr=images')}}">{{$web->getLable('choose_photo')}}</a>

                                                                <a class="btn red" type="button" id="removeimages2"  href="javascript:;">{{$web->getLable('delete_photo')}}</a>
                                                             </div>
                                                         </div>
                                                         @else
                                                         <div class="fileinput fileinput-new" data-provides="fileinput">
                                                           <div id="inputimage2" >
                                                                    <img src="" style="display:none;" alt=""  id="image_preview2"/> </div>
                                                                <input id="image_link2" name="link2" type="hidden" value="">
                                                                <div>
                                                                <a class="btn iframe-btn default" type="button" href="{{base_url('assets/filemanager/dialog.php?type=1&field_id=image_link2&fldr=images')}}">{{$web->getLable('choose_photo')}}</a>

                                                                <a class="btn red" type="button" id="removeimages2" style="display:none;" href="javascript:;">{{$web->getLable('delete_photo')}}</a>

                                                             </div>
                                                         </div>
                                                         @endif
                                                                                                               

                                                        </div>
                                                    </div>

                                                     
                                                        <div class="form-group">
                                                        <label class="col-md-3 control-label">{{$web->getLable('language_name')}}: </label>
                                                        <div class="col-md-4">
                                                        <select class="form-control" name="txt_language">
                                                            @foreach($qrgroup as $val)
                                                            <option value="{{$val->lang_iso_id}}" @if($res->admin_lang==$val->lang_iso_id) {{'selected'}} @endif>{{$val->lang_name}}</option>
                                                            @endforeach  
                                                                        
                                                                    </select>                                   
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

                                    </div>
                                      <div class="portlet-title">

                                        <div class="actions btn-set">
                                          
                                        
                                            <button class="btn btn-success" type="submit" name="save" value="1">
                                                <i class="fa fa-check"></i> {{$web->getLable('save')}}</button>
                                                                           
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                     @endsection  
