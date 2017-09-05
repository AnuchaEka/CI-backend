@extends('mt-admin.master')

@section('css')
<link href="{{base_url('assets/global/plugins/jquery-nestable/jquery.nestable.css')}}" rel="stylesheet" type="text/css" />
@endsection

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
                            
                                        <div class="row">
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Nestable List 1</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Option 1</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;">Option 2</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 3</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">Option 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body ">
                                    <div class="dd" id="nestable_list_1">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="1">
                                                <div class="dd-handle"> Item 1 </div>
                                            </li>
                                            <li class="dd-item" data-id="2">
                                                <div class="dd-handle"> Item 2 </div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="3">
                                                        <div class="dd-handle"> Item 3 </div>
                                                    </li>
                                                    <li class="dd-item" data-id="4">
                                                        <div class="dd-handle"> Item 4 </div>
                                                    </li>
                                                    <li class="dd-item" data-id="5">
                                                        <div class="dd-handle"> Item 5 </div>
                                                        <ol class="dd-list">
                                                            <li class="dd-item" data-id="6">
                                                                <div class="dd-handle"> Item 6 </div>
                                                            </li>
                                                            <li class="dd-item" data-id="7">
                                                                <div class="dd-handle"> Item 7 </div>
                                                            </li>
                                                            <li class="dd-item" data-id="8">
                                                                <div class="dd-handle"> Item 8 </div>
                                                            </li>
                                                        </ol>
                                                    </li>
                                                    <li class="dd-item" data-id="9">
                                                        <div class="dd-handle"> Item 9 </div>
                                                    </li>
                                                    <li class="dd-item" data-id="10">
                                                        <div class="dd-handle"> Item 10 </div>
                                                    </li>
                                                </ol>
                                            </li>
                                            <li class="dd-item" data-id="11">
                                                <div class="dd-handle"> Item 11 </div>
                                            </li>
                                            <li class="dd-item" data-id="12">
                                                <div class="dd-handle"> Item 12 </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Nestable List 2</span>
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="" class="reload"> </a>
                                        <a href="" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="dd" id="nestable_list_2">
                                        <ol class="dd-list">
                                            <li class="dd-item" data-id="13">
                                                <div class="dd-handle"> Item 13 </div>
                                            </li>
                                            <li class="dd-item" data-id="14">
                                                <div class="dd-handle"> Item 14 </div>
                                            </li>
                                            <li class="dd-item" data-id="15">
                                                <div class="dd-handle"> Item 15 </div>
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="16">
                                                        <div class="dd-handle"> Item 16 </div>
                                                    </li>
                                                    <li class="dd-item" data-id="17">
                                                        <div class="dd-handle"> Item 17 </div>
                                                    </li>
                                                    <li class="dd-item" data-id="18">
                                                        <div class="dd-handle"> Item 18 </div>
                                                    </li>
                                                </ol>
                                            </li>
                                        </ol>
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
        <script src="../assets/global/plugins/jquery-nestable/jquery.nestable.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/ui-nestable.js" type="text/javascript"></script>
        @endsection  