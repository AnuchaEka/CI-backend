@extends('mt-admin.master')

 @section('content')
 <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal form-row-seperated" action="" id="form_sample_1" method="post">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-magic-wand"></i>{{$title}} </div>
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
                                                            <label class="col-md-3 control-label">{{$web->getLable('sorting')}}:
                                                                
                                                            </label>
                                                            <div class="col-md-5">
                                                                <input type="text" class="form-control"   name="slideOrder" value="@if(!empty($res->slideOrder)) {{$res->slideOrder}} @else {{$web->getPeriodeNummer(BANNER,'slideOrder')}} @endif"> </div>
                                                        </div>
                                                
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$web->getLable('link')}}:
                                                                
                                                            </label>
                                                            <div class="col-md-8">
                                                            <div style="width:100px;" class="pull-left">
                                                            <select class="form-control" name="protocol">
                                                                <option value="http://" @if($res->slideprotocol=='http://') {{'selected'}} @endif>http://</option>
                                                                <option value="https://" @if($res->slideprotocol=='https://') {{'selected'}} @endif>https://</option>
                                                            </select>
                                                            </div>
                                                            <div style="width:70%" class="pull-left">
                                                            <input  class="form-control" type="url" data-parsley-type="url"   name="slideLink" value="{{$res->slideLink}}"> 
                                                            </div>
                                                             <div class="clearfix"></div>   
                                                                <span class="help-block"> e.g: http://www.demo.com or http://demo.com </span>
                                                           </div>
                                                        </div>
                                                    
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$web->getLable('image')}}:
                                                               
                                                            </label>
                                                            <div class="col-md-8">

                                                           @if(!empty($res->slideImage))      
                                                           <div class="fileinput fileinput-new" data-provides="fileinput">
                                                               <div id="inputimage" class="fileinput-new thumbnail" style="max-width:200px;">
                                                                        <img src="{{$res->slideImage}}"  alt=""  id="image_preview"/> </div>
                                                                    <input id="image_link" name="link" type="hidden" value="{{$res->slideImage}}">
                                                                    <div>
                                                                    <a class="btn iframe-btn default" type="button" href="{{base_url('assets/filemanager/dialog.php?type=1&field_id=image_link&fldr=slideimages')}}">{{$web->getLable('choose_photo')}}</a>

                                                                    <a class="btn red" type="button" id="removeimages"  href="javascript:;">{{$web->getLable('delete_photo')}}</a>

                                                                 </div>
                                                             </div>
                                                             @else
                                                             <div class="fileinput fileinput-new" data-provides="fileinput">
                                                               <div id="inputimage" >
                                                                        <img src="" style="display:none;" alt=""  id="image_preview"/> </div>
                                                                    <input id="image_link" name="link" type="hidden" value="">
                                                                    <div>
                                                                    <a class="btn iframe-btn default" type="button" href="{{base_url('assets/filemanager/dialog.php?type=1&field_id=image_link&fldr=slideimages')}}">{{$web->getLable('choose_photo')}}</a>

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
                     