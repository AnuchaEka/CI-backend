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
                                         @if(!empty($error))
                                           <div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                         {{$error}} </div>
                                        @endif
                            
                                        <div class="tabbable-bordered" >
                                        
                                            <div class="tab-content" style="border:none;">
                                                <div class="tab-pane active" id="tab_general">
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$web->getLable('language_name')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" required  name="lang_name" value="{{$res->lang_name}}"> </div>
                                                        </div>
                                                
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$web->getLable('language_code')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" data-parsley-maxlength="2" data-parsley-minlength="2" class="form-control" required name="lang_code" data-parsley-pattern="^[a-z]{2}$" value="{{$res->lang_iso}}"> </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$web->getLable('country')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" name="lang_country" required value="{{$res->country}}"> </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$web->getLable('national_flag')}}:
                                                               
                                                            </label>
                                                            <div class="col-md-8">

                                                           @if(!empty($res->lang_img))      
                                                           <div class="fileinput fileinput-new" data-provides="fileinput">
                                                               <div id="inputimage" class="fileinput-new thumbnail" style="max-width:200px;">
                                                                        <img src="{{$res->lang_img}}"  alt=""  id="image_preview"/> </div>
                                                                    <input id="image_link" name="link" type="hidden" value="{{$res->lang_img}}">
                                                                    <div>
                                                                    <a class="btn iframe-btn default" type="button" href="{{base_url('assets/filemanager/dialog.php?type=1&field_id=image_link')}}">{{$web->getLable('choose_photo')}}</a>

                                                                    <a class="btn red" type="button" id="removeimages"  href="javascript:;">{{$web->getLable('delete_photo')}}</a>

                                                                 </div>
                                                             </div>
                                                             @else
                                                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                                               <div id="inputimage" >
                                                                        <img src="" style="display:none;" alt=""  id="image_preview"/> </div>
                                                                    <input id="image_link" name="link" type="hidden" value="">
                                                                    <div>
                                                                    <a class="btn iframe-btn default" type="button" href="{{base_url('assets/filemanager/dialog.php?type=1&field_id=image_link')}}">{{$web->getLable('choose_photo')}}</a>

                                                                    <a class="btn red" type="button" id="removeimages" style="display:none;" href="javascript:;">{{$web->getLable('delete_photo')}}</a>

                                                                 </div>
                                                             </div>
                                                             @endif
                                                                                                                   
  
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                        <label class="col-md-3 control-label">{{$web->getLable('active')}}:
                                                            </label>
                                                            <div class="col-md-8">
                                                                  <input type="checkbox" name="status" data-on-text="{{$web->getLable('on')}}" data-off-text="{{$web->getLable('off')}}" class="make-switch" @if($res->active==0) {{'checked'}} @endif data-on-color="success" data-off-color="danger">
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="lang_oldcode" value="{{$res->lang_iso}}">
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
                     