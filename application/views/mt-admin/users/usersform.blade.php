@extends('mt-admin.master') @section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="" id="form_sample_1" method="post" enctype="multipart/form-data">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user"></i>{{$title}} </div>
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

                    <div class="tabbable-bordered">
                        <div class="tab-content" style="border:none;">
                            <div class="tab-pane active" id="tab_general">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('username')}}:
                                          <span class="required"> * </span>
                                          </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" required name="txt_username" value="{{$res->username}}{{$input->post('txt_username')}}"  @if(!empty($res->username)) {{'readonly'}} @endif>                                            
                                        </div>
                                    </div>
                                    @if(empty($res->password))
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('password')}}:
                                         <span class="required"> * </span> 
                                         </label>
                                        <div class="col-md-8">
                                            <input type="password" data-parsley-minlength="6" class="form-control"  required name="txt_password" id="txt_password" value="">                                           
                                      
                                       </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('confirm_password')}}:
                                        <span class="required"> * </span> 
                                       </label>
                                        <div class="col-md-8">
                                            <input type="password" class="form-control" data-parsley-minlength="6"  required name="txt_confirmpass" data-parsley-equalto="#txt_password" value="">                                            
                                        </div>
                                    </div>
                                    @endif


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('name')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="txt_name" required value="{{$res->name}}{{$input->post('txt_name')}}">                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('lastname')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="txt_lastname" required value="{{$res->lastname}}{{$input->post('txt_lastname')}}">                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('email')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                        <div class="col-md-8">
                                            <input type="email" class="form-control" name="txt_email" required value="{{$res->email}}{{$input->post('txt_email')}}">                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('tel')}}:
                                             <span class="required"> * </span>
                                          </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="txt_tel" required value="{{$res->phone}}{{$input->post('txt_tel')}}" data-parsley-type="digits">                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('address')}}:
                                                              
                                                            </label>
                                        <div class="col-md-8">
                                            <textarea rows="5" class="form-control" name="txt_address">{{$res->address}}{{$input->post('txt_address')}}</textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('gender')}}:
                                                                <span class="required"> * </span>
                                        </label>
                                        <div class="col-md-8">
                                        <div class="mt-radio-inline">
                                                       <label class="mt-radio">
                                                            <input type="radio" name="txt_gender" id="gender1" value="male" @if($res->gender=='male' or $input->post('txt_gender')=='male') {{'checked'}} @else {{'checked'}} @endif> {{$web->getLable('male')}}
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" name="txt_gender" id="gender2" value="female" @if($res->gender=='female' or $input->post('txt_gender')=='female') {{'checked'}} @endif> {{$web->getLable('female')}}
                                                            <span></span>
                                                        </label>
                                                
                                        </div>                                          
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('role')}}:
                                            <span class="required"> * </span>
                                         </label>
                                        <div class="col-md-4">
                                        <select class="form-control" name="txt_groupid">
                                            @foreach($qrgroup as $val)
                                              <option value="{{$val->groupusers_id}}" @if($res->group_id==$val->groupusers_id or $input->post('txt_groupid')==$val->groupusers_id) {{'selected'}} @endif>{{$val->groupusers_name}}</option>
                                            @endforeach  
                                                        
                                                    </select>                                   
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('image')}}:
                                                               
                                        </label>
                                        <div class="col-md-8">
                                       
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    @if(!empty($res->avatar))
                                                    <img src="{{base_url('assets/profiles/'.$res->avatar)}}" alt="" /> 
                                                    @else
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                                    @endif
                                                
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                      <span class="fileinput-new"> {{$web->getLable('choose_photo')}} </span>
                                                    <span class="fileinput-exists"> {{$web->getLable('choose_photo')}} </span>
                                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg"> </span>
                                                    @if(!empty($res->avatar))
                                                    <a href="{{base_url($uri->slash_segment(1).$uri->slash_segment(2).'deletefile/'.$uri->segment(4))}}" class="btn red" data-toggle="confirmation"  data-popout="true" data-placement="right" data-title="{{$web->getLable('confirm_delete')}}"  data-btn-cancel-label="{{$web->getLable('no')}}" data-btn-ok-label="{{$web->getLable('yes')}}" > {{$web->getLable('delete_photo')}} </a>
                                                    @else
                                                    <a href="javascript:;" class="btn red  fileinput-exists" data-dismiss="fileinput"> {{$web->getLable('delete_photo')}} </a>
                                                    @endif

                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('active')}}:
                                                            </label>
                                        <div class="col-md-8">
                                            <input type="checkbox" name="status" data-on-text="{{$web->getLable('on')}}" data-off-text="{{$web->getLable('off')}}" class="make-switch"
                                                @if($res->active==0) {{'checked'}}
                                            @endif data-on-color="success" data-off-color="danger">
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