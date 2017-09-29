@extends('mt-admin.master')

 @section('content')
 <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal form-row-seperated" action="" id="form_sample_1" method="post">
                                <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-wrench"></i>{{$title}}</div>
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
                                                            <label class="col-md-3 control-label">{{$web->getLable('text_name')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" required  name="menu_option_name" value="{{$res['menu_option_name']}}"> </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Key:
                                                                
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"  name="menu_option_key"  value="{{$res['menu_option_key']}}"> </div>
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