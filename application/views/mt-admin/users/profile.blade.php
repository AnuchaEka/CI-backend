        @extends('mt-admin.master')

        @section('content')

                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN PROFILE SIDEBAR -->
                            
                            @if(!empty($msg))
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$msg}} </div>
                            @endif @if(!empty($error))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$error}}
                            </div>
                            @endif

                                @php
                                $id = $authen->userid();
                                $user = $web->getDataOne(USERS,array('id'=>$id)); 
                                @endphp

                            <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet ">
                                
                                    <!-- SIDEBAR USERPIC -->
                                    <div class="profile-userpic">
                                        <img src="{{base_url('assets/profiles/'.$user->avatar)}}" class="img-responsive" alt=""> </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> {{$user->name}} {{$user->lastname}} </div>
                                        @if($user->group_id==0)
                                        <div class="profile-usertitle-job"> Administrator </div>
                                        @else
                                        <div class="profile-usertitle-job"> {{$web->getDatafields(GROUPS,'groupusers_name',array('groupusers_id'=>$user->group_id))}} </div>

                                        @endif
                                    </div>
                                    <div class="portlet light ">
                           
                     
                                    <div>
      
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-envelope-o"></i>
                                            <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                        </div>
                                        <div class="margin-top-20 profile-desc-link">
                                            <i class="fa fa-phone"></i>
                                            <a href="tel:{{$user->phone}}">{{$user->phone}}</a>
                                        </div>
                                        
                                    </div>
                                </div>

                                   

                                </div>
                                <!-- END PORTLET MAIN -->
                                <!-- PORTLET MAIN -->
                                
                                <!-- END PORTLET MAIN -->
                            </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light ">
                                            <div class="portlet-title tabbable-line">
                                  
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">{{$web->getLable('profile')}}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_2" data-toggle="tab">{{$web->getLable('change-avatar')}}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_3" data-toggle="tab">{{$web->getLable('change-password')}}</a>
                                                    </li>
                                                  
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        <form role="form" action="{{base_url('mt-admin/profile/editprofile')}}" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label class="control-label">{{$web->getLable('name')}}</label>
                                                                <input type="text" class="form-control" name="txt_name" required value="{{$user->name}}">  </div>
                                                            <div class="form-group">
                                                                <label class="control-label">{{$web->getLable('lastname')}}</label>
                                                                <input type="text" class="form-control" name="txt_lastname" required value="{{$user->lastname}}">  </div>
                                                            <div class="form-group">
                                                                <label class="control-label">{{$web->getLable('email')}}</label>
                                                                <input type="email" class="form-control" name="txt_email" required value="{{$user->email}}">  </div>
                                                            <div class="form-group">
                                                                <label class="control-label">{{$web->getLable('tel')}}</label>
                                                                <input type="text" class="form-control" name="txt_tel" required value="{{$user->phone}}" data-parsley-type="digits">  </div>
                                                            <div class="form-group">
                                                                <label class="control-label">{{$web->getLable('address')}}</label>
                                                                <textarea rows="5" class="form-control" name="txt_address">{{$user->address}}</textarea> </div>
                                                            <div class="form-group">
                                                                <label class="control-label">{{$web->getLable('gender')}}</label>
                                                                <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                        <input type="radio" name="txt_gender" id="gender1" value="male" @if($user->gender=='male') {{'checked'}} @else {{'checked'}} @endif> {{$web->getLable('male')}}
                                                                        <span></span>
                                                                    </label>
                                                                    <label class="mt-radio">
                                                                        <input type="radio" name="txt_gender" id="gender2" value="female" @if($user->gender=='female') {{'checked'}} @endif> {{$web->getLable('female')}}
                                                                        <span></span>
                                                                    </label>
                                                            </div>
                                                            </div>
                                               
                                                            <div class="margiv-top-10">
                                                            <button class="btn btn-success" type="submit" name="save" value="1">
                                                <i class="fa fa-check"></i> {{$web->getLable('save')}}</button>
                                                             
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                                    <!-- CHANGE AVATAR TAB -->
                                                    <div class="tab-pane" id="tab_1_2">
                                            
                                                            <form role="form" action="{{base_url('mt-admin/profile/editavatar')}}" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                               
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> 
                                                             
                                                            
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
                                                            <div class="margin-top-10">
                                                            <button class="btn btn-success" type="submit" name="save" value="1">
                                                            <i class="fa fa-check"></i> {{$web->getLable('save')}}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE AVATAR TAB -->
                                                    <!-- CHANGE PASSWORD TAB -->
                                                    <div class="tab-pane" id="tab_1_3">
                                                    <form role="form" action="{{base_url('mt-admin/profile/editpassword')}}" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label class="control-label">{{$web->getLable('current-password')}}</label>
                                                                <input type="password" class="form-control"  required name="txt_currentpassword" value="">     </div>
                                                            <div class="form-group">
                                                                <label class="control-label">{{$web->getLable('password')}}</label>
                                                                <input type="password" data-parsley-minlength="6" class="form-control"  required name="txt_password" id="txt_password" value="">     </div>
                                                            <div class="form-group">
                                                                <label class="control-label">{{$web->getLable('confirm_password')}}</label>
                                                                <input type="password" class="form-control" data-parsley-minlength="6"  required name="txt_confirmpass" data-parsley-equalto="#txt_password" value=""> </div>
                                                            <div class="margin-top-10">
                                                            <button class="btn btn-success" type="submit" name="save" value="1">
                                                            <i class="fa fa-check"></i> {{$web->getLable('change-password')}}</button>
                                                         
                                                                
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- END CHANGE PASSWORD TAB -->
                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE CONTENT -->
                        </div>
                    </div>


        @endsection  