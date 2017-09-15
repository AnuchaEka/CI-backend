@extends('mt-admin.master')

                @section('content')
                
                <div class="row">
                <div class="col-md-12">
                    
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-doc"></i> {{$title}} </div>
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
                            <div class="pull-right">
                                 <form action="" method="post">
                                   <input type="text" class=" form-control input-inline input-small input-sm" name="search_keyword" value="{{$_POST['search_keyword']}}">
                                         <button class="btn btn-sm default table-group-action-submit" type="submit">
                                         {{$web->getLable('search')}}</button>   
                                 </form>

                                 </div>
                                 <form class="form-horizontal form-row-seperated" action="{{base_url('mt-admin/'.$uri->segment(2).'/action')}}" method="post">       
                                <div >
                                  <select class=" form-control input-inline input-small input-sm" name="action">
                                        <option value="">--{{$web->getLable('select')}}--</option>
                                        <option value="Del">{{$web->getLable('delete')}}</option>
                                    </select>
                                    <button class="btn btn-sm default table-group-action-submit" data-toggle="confirmation"  data-popout="true" data-placement="right" data-title="{{$web->getLable('confirm_delete')}}"  data-btn-cancel-label="{{$web->getLable('no')}}" data-btn-ok-label="{{$web->getLable('yes')}}" type="submit">
                                         {{$web->getLable('apply')}}</button> 
                                  
                                </div>
          
                                <table class="table table-bordered table-checkable order-column" id="sample_2">
                                <thead>
                                    <tr>
                                        <th class="table-checkbox" style="width:10%">
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                <span></span>
                                            </label>
                                        </th>
                                        <th> {{$web->getLable('text_name')}}</th>
                                        <th> {{$web->getLable('category')}}</th>
                                        <th style="width:15%"> {{$web->getLable('status')}} </th>   
                                        <th style="width:15%"> &nbsp;</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($res as $val)
                                    <tr >
                                        <td>
                                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                <input type="checkbox" name="del[]" class="checkboxes" value="{{$val['posts_id']}}" />
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="{{base_url('mt-admin/'.$uri->segment(2).'/edit/'.$val['posts_id'])}}"> {{$val['posts_name_'.$session->userdata('configlang')]}} </a> @if($val['posts_status']=='Draft') <strong>-- {{$web->getLable('save_draft')}}</strong> @endif
                                          
                                          </td>
                                          <td>
                                            <a href="{{base_url('mt-admin/'.$uri->segment(2).'/edit/'.$val['posts_id'])}}"> {{$val['posts_name_'.$session->userdata('configlang')]}} </a> @if($val['posts_status']=='Draft') <strong>-- {{$web->getLable('save_draft')}}</strong> @endif
                                          
                                          </td>
              
                                                                  
                                        <td>
                                         @if($val['posts_active']==0)     
                                        <a href="{{base_url('mt-admin/'.$uri->segment(2).'/status/'.$val['posts_id'].'?status=1')}}" ><i class="fa fa-check  fa-2x text-success"></i></a>
                                        @else
                                        <a href="{{base_url('mt-admin/'.$uri->segment(2).'/status/'.$val['posts_id'].'?status=0')}}" ><i class="fa fa-times  fa-2x text-danger"></i></a>
                                        @endif
                                    
                                        </td>
                                      
                                  
                                        <td class="text-center">
                                           <a href="{{base_url('mt-admin/'.$uri->segment(2).'/edit/'.$val['posts_id'])}}" class="btn btn-outline btn-circle btn-xs dark">
                                              <i class="fa fa-edit"></i> {{$web->getlable('edit')}} </a>
                                           <a href="{{base_url('mt-admin/'.$uri->segment(2).'/delete/'.$val['posts_id'])}}" class="btn btn-outline btn-circle red btn-xs blue" data-toggle="confirmation"  data-popout="true" data-placement="left" data-singleton="true" data-title="{{$web->getLable('confirm_delete')}}"  data-btn-cancel-label="{{$web->getLable('no')}}" data-btn-ok-label="{{$web->getLable('yes')}}">
                                             <i class="fa fa-trash-o"></i> {{$web->getlable('delete')}} </a>   
                                        </td>
                                    </tr>
           
                                    @endforeach
                                   
                                </tbody>
                            </table>
                            </form>    
                              
                            </div>
                            </div>
                        </div>
                   
                </div>
            </div>
                  @endsection  