                @extends('mt-admin.master')

                @section('content')
<div class="row">
                        <div class="col-md-12"> 
                                <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-wrench"></i>{{$title}} </div>

                                        <div class="actions btn-set">
                                            @include('mt-admin.lang.langselect')

                                            <a href="{{base_url('mt-admin/'.$uri->segment(2).'/add')}}" class="btn default btn-secondary-outline">
                                                {{$web->getLable('add')}} <i class="fa fa-plus"></i></a>
                                    
                                           
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
                                    <div class="table-container">
                                       
                                       <form class="form-horizontal form-row-seperated" action="{{base_url('mt-admin/'.$uri->segment(2).'/action')}}" method="post">      
                                        <div style="margin-bottom:15px;">
                                          <select class=" form-control input-inline input-small input-sm" name="action">
                                                <option value="">--{{$web->getLable('select')}}--</option>
                                                <!-- <option value="save">{{$web->getLable('language_code')}}</option> -->
                                                <option value="Del">{{$web->getLable('delete')}}</option>
                                            </select>
                                             <button class="btn btn-sm default table-group-action-submit" data-toggle="confirmation"  data-popout="true" data-placement="right" data-title="{{$web->getLable('confirm_delete')}}"  data-btn-cancel-label="{{$web->getLable('no')}}" data-btn-ok-label="{{$web->getLable('yes')}}" type="submit">
                                                 {{$web->getLable('apply')}}</button> 
                                            
                                        </div>
                                        

                                        <table class="table  table-bordered table-hover table-checkable order-column"   >
                                        <thead>
                                            <tr>
                                                <th class="table-checkbox">
                                                    #
                                                </th>
                                                <th> {{$web->getLable('text_name')}} </th>
                                                <th> {{$web->getLable('link')}} </th>
                                                <th> {{$web->getLable('users')}} </th>
                                                <th style="width:15%"> &nbsp;</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            @foreach ($res as $menu)
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" name="del[]" value="{{$menu['menu_id']}}" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                               
                                                <td> <!-- <input type="text" style="width:35px;" class=" form-control input-inline input-sm" name="sorting[{{$menu['menu_id']}}]" value="{{$menu['menu_sorting']}}"> --> <a href="{{base_url('mt-admin/'.$uri->segment(2).'/edit/'.$menu['menu_id'])}}">{{$menu['menu_name_'.$session->userdata('configlang')]}}</a> </td>
                                                <td>
                                                    <a href="@if(empty($menu['menu_url']) or $menu['menu_url']=='#') {{'javascript:;'}} @else {{base_url('mt-admin/'.$menu['menu_url'])}} @endif">{{$menu['menu_url']}}</a>
                                                </td>
                                                <td>
                                                    {{$menu['menu_status']}}
                                                </td>
                                                   <td class="text-center">
                                                   <a href="{{base_url('mt-admin/'.$uri->segment(2).'/edit/'.$menu['menu_id'])}}" class="btn btn-outline btn-circle btn-xs dark">
                                                      <i class="fa fa-edit"></i> {{$web->getlable('edit')}} </a>
                                                   <a href="{{base_url('mt-admin/'.$uri->segment(2).'/delete/'.$menu['menu_id'])}}" class="btn btn-outline btn-circle red btn-xs blue" data-toggle="confirmation"  data-popout="true" data-placement="left" data-singleton="true" data-title="{{$web->getLable('confirm_delete')}}"  data-btn-cancel-label="{{$web->getLable('no')}}" data-btn-ok-label="{{$web->getLable('yes')}}">
                                                            <i class="fa fa-trash-o"></i> {{$web->getlable('delete')}} </a>   
                                                </td>
                                            </tr>
                                            @php
                                            $qr= $web->getMenu($menu['menu_id']);

                                            @endphp
                                            @if(count($qr)>0)
                                            @foreach($qr as $submenu)
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" name="del[]" value="{{$submenu['menu_id']}}" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                             
                                                <td><div style="margin-left:25px;">
                                                     <!-- <input type="text" style="width:35px;" class=" form-control input-inline input-sm" name="sorting[{{$submenu['menu_id']}}]" value="{{$submenu['menu_sorting']}}">--> <a href="{{base_url('mt-admin/'.$uri->segment(2).'/edit/'.$submenu['menu_id'])}}">-- {{$submenu['menu_name_'.$session->userdata('configlang')]}}</a> 
                                                </div></td>
                                                <td>
                                                    <a href="@if(empty($submenu['menu_url'])) {{'javascript:;'}} @else {{base_url('mt-admin/'.$submenu['menu_url'])}} @endif">{{$submenu['menu_url']}}</a>
                                                </td>
                                                 <td>
                                                     {{$submenu['menu_status']}}
                                                </td>
                                                   <td class="text-center">
                                                   <a href="{{base_url('mt-admin/'.$uri->segment(2).'/edit/'.$submenu['menu_id'])}}" class="btn btn-outline btn-circle btn-xs dark">
                                                      <i class="fa fa-edit"></i> {{$web->getlable('edit')}} </a>
                                                   <a href="{{base_url('mt-admin/'.$uri->segment(2).'/delete/'.$submenu['menu_id'])}}" class="btn btn-outline btn-circle red btn-xs blue" data-toggle="confirmation"  data-popout="true" data-placement="left" data-singleton="true" data-title="{{$web->getLable('confirm_delete')}}"  data-btn-cancel-label="{{$web->getLable('no')}}" data-btn-ok-label="{{$web->getLable('yes')}}">
                                                            <i class="fa fa-trash-o"></i> {{$web->getlable('delete')}} </a>   
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                        
                                      
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                  @endsection  