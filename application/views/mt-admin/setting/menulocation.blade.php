              
                @extends('mt-admin.master')

                @section('content')
                <div class="row">
                        <div class="col-md-12">
                            
                                <div class="portlet light">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-wrench"></i> {{$title}} </div>
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
                                       
                  
                                        <table class="table table-bordered  order-column" id="sample_2">
                                        <thead>
                                            <tr>
                                                <th> {{$web->getLable('text_name')}}</th>
                                                <th style="width:20%"> Key </th>
                                                <th style="width:15%"> &nbsp;</th>     
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                    $n=1;
                                             @endphp
                                            @foreach($res as $val)
                                            <tr >
            
                                                <td>
                                                    <a href="{{base_url('mt-admin/'.$uri->segment(2).'/edit/'.$val['menu_option_id'])}}"> {{$val['menu_option_name']}} </a> 
                                                    
                                                </td>
                                                <td>
                                                   {{$val['menu_option_key']}}
                                                    
                                                </td>
                                                   <td class="text-center">
                                                   <a href="{{base_url('mt-admin/'.$uri->segment(2).'/edit/'.$val['menu_option_id'])}}" class="btn btn-outline btn-circle btn-xs dark">
                                                      <i class="fa fa-edit"></i> {{$web->getlable('edit')}} </a>
                                                   <a href="{{base_url('mt-admin/'.$uri->segment(2).'/delete/'.$val['menu_option_id'])}}" class="btn btn-outline btn-circle red btn-xs blue" data-toggle="confirmation"  data-popout="true" data-placement="left" data-singleton="true" data-title="{{$web->getLable('confirm_delete')}}"  data-btn-cancel-label="{{$web->getLable('no')}}" data-btn-ok-label="{{$web->getLable('yes')}}">
                                                            <i class="fa fa-trash-o"></i> {{$web->getlable('delete')}} </a>   
                                                </td>
                                            </tr>
                                            @php
                                                    $n++;
                                                    @endphp
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
            