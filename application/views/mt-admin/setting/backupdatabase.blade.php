              
                @extends('mt-admin.master')

                @section('content')
                <div class="row">
                        <div class="col-md-12">
                            
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-wrench"></i> {{$title}} </div>
                                        <div class="actions btn-set">
                                            <a href="{{base_url('mt-admin/'.$uri->segment(2).'/backupDB')}}" target="_blank" class="btn default btn-secondary-outline">
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
                                                <th class="table-checkbox"  style="width:10%" >
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes" />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th> {{$web->getLable('name')}} </th>
                                                <th> {{$web->getLable('date')}} </th>
                                                <th style="width:15%"> &nbsp;</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($res as $val)
                                            <tr >
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" name="del[]" class="checkboxes" value="{{$val->id}}" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <a href="{{base_url('mt-admin/'.$uri->segment(2).'/download/'.base64_encode($val->backup_filename))}}"> {{$val->backup_filename}} </a> 
                                                    
                                                  </td>
                                             
                                                <td>
                                                   {{$func->sysDatetime($val->backup_date)}}
                                                </td>
                                               
                                                <td class="text-center">
                                                   <a href="{{base_url('mt-admin/'.$uri->segment(2).'/download/'.base64_encode($val->backup_filename))}}" class="btn btn-outline btn-circle btn-xs dark">
                                                      <i class="fa fa-edit"></i> {{$web->getlable('download')}} </a>
                                                   <a href="{{base_url('mt-admin/'.$uri->segment(2).'/delete/'.$val->id)}}" class="btn btn-outline btn-circle red btn-xs blue" data-toggle="confirmation"  data-popout="true" data-placement="left" data-singleton="true" data-title="{{$web->getLable('confirm_delete')}}"  data-btn-cancel-label="{{$web->getLable('no')}}" data-btn-ok-label="{{$web->getLable('yes')}}">
                                                            <i class="fa fa-trash-o"></i> {{$web->getlable('delete')}} </a>   
                                                </td>
                                            </tr>
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
            