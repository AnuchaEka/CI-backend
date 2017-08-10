 @extends('mt-admin.master') @section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="" id="form_sample_1" method="post">
            <div class="portlet">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user"></i>{{$title}} </div>
                           <div class="actions btn-set">
                                           
   
                         </div>

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
                                        <label class="col-md-3 control-label">{{$web->getLable('name')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" required name="group_name" value="{{$res->groupusers_name}}">   </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('link')}}:
                                                      
                                                            </label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="group_url" value="{{$res->groupusers_url}}">                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">{{$web->getLable('permission')}}:
                                                              
                                                            </label>
                                        <div class="col-md-8">
                                            <div class="mt-checkbox-list">
                                                @php
                                                $qr=$web->getDataWhere(MENUS,array('menu_parent'=>0,'menu_status'=>'ทั้งหมด'),1);

                                                @endphp

                                                @foreach($qr as $menu)
                                                <label class="mt-checkbox mt-checkbox-outline" > {{$menu['menu_name_'.$session->userdata('configlang')]}}
                                                        <input type="checkbox" name="M[]" value="{{$menu['menu_id']}}" onclick="chked(this)">
                                                        <span></span>
                                                    </label>


                                                @php
                                                $qrsub=$web->getDataWhere(MENUS,array('menu_parent'=>$menu['menu_id'],'menu_status'=>'ทั้งหมด'),1);

                                                @endphp
                                                @if(count($qrsub)>0)
                                                @foreach($qrsub as $submenu)
                                                <label class="mt-checkbox mt-checkbox-outline level-1">{{$submenu['menu_name_'.$session->userdata('configlang')]}}
                                                        <input type="checkbox" disabled value="{{$submenu['menu_id']}}" name="S[{{$menu['menu_id']}}][]" class="S{{$menu['menu_id']}}">
                                                        <span></span>
                                                    </label>
                                               @endforeach
                                               @endif       

                                                @endforeach    
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