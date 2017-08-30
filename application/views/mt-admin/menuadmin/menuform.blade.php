 @extends('mt-admin.master')

 @section('content')
 <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal form-row-seperated" action="" id="form_sample_1" method="post">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-wrench"></i>{{$title}} </div>
                                            @if(sizeof($res)>0)
                                                    <div class="actions btn-set">
                                                            
                                                                <a href="{{base_url('mt-admin/'.$uri->segment(2).'/add')}}" class="btn default btn-secondary-outline">
                                                                    {{$web->getLable('add')}} <i class="fa fa-plus"></i></a>
                                                        
                                                            
                                                </div>    
                                                @endif
                                            <div class="actions btn-set">
                                             @include('mt-admin.lang.langselect')
   
                                        </div>
                                        
                                       
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
                                                            <label class="col-md-3 control-label">{{$web->getLable('name')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" required  name="menu_name" value="{{$res['menu_name_'.$session->userdata('configlang')]}}"> </div>
                                                        </div>
                                                
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Slug:
                                                                
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"  name="menu_slug" value="{{$res['menu_url']}}"> 
                                                                <span class="help-block"> “slug” คือการเขียนชื่อเว็บใหม่ให้เป็น URL-friendly ดังนั้นจะถูกเขียนออกมาในรูปตัวอักษรตัวเล็ก และมีเพียงตัวอักษร, ตัวเลข, และ hyphens (ขีดกลาง) </span>
                                                                </div>
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Icon Font:
                                                               
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"   name="menu_icon" value="{{$res['menu_icon']}}"> 
                                                                 <!-- <span class="help-block">get Font Awesome</span> -->
                                                                </div>
                                                        </div>

                                                               <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$web->getLable('permission')}}:
                                                               
                                                            </label>
                                                            <div class="col-md-8">
                                                                
                                                                    <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="permission" id="permission1" value="ผู้ดูแลระบบ" @if($res['menu_status']=='ผู้ดูแลระบบ') {{'checked'}} @endif > ผู้ดูแลระบบ
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="permission" id="permission2" value="ทั้งหมด" @if($res['menu_status']=='ทั้งหมด') {{'checked'}} @endif @if(empty($res['menu_status'])) {{'checked'}} @endif> ทั้งหมด
                                                                    <span></span>
                                                                </label>
                                                               
                                                            </div>
                                                                 <!-- <span class="help-block">get Font Awesome</span> -->
                                                                </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$web->getLable('category')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-3">
                                                                <select class="form-control" name="menu_parent">
                                                                    <option value="0">{{$web->getLable('none')}}</option>
                                                                    @foreach($resmenu as $menu)

                                                                    <option value="{{$menu['menu_id']}}" @if($res['menu_parent']==$menu['menu_id']) {{'selected'}} @endif>{{$menu['menu_name_'.$session->userdata('configlang')]}}</option>
                                                                    <!-- <option class="lavel-1">-- Option 3</option> -->
                                                                    @endforeach
                                                                   
                                                                </select> 
                                                                
                                                                </div>
                                                        </div>
                                                      
                                                       
                                                        <div class="form-group">
                                                        <label class="col-md-3 control-label">{{$web->getLable('active')}}:
                                                            </label>
                                                            <div class="col-md-8">
                                                                  <input type="checkbox" name="status" data-on-text="{{$web->getLable('on')}}" data-off-text="{{$web->getLable('off')}}" class="make-switch" @if($res['active']==0) {{'checked'}} @endif data-on-color="success" data-off-color="danger">
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
