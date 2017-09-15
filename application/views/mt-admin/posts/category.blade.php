@extends('mt-admin.master') 

@section('content')
<div class="row">
    <form class="" action="" id="form_sample_1" method="post" enctype="multipart/form-data">

    <div class="col-md-4">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        {{$web->getLable('add')}} </div>

                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>
                </div>


                <div class="portlet-body">

                    <div class="form-body">
                    <div class="form-group">
                                <label class="control-label">{{$web->getLable('sorting')}} </label>
                                <input type="text" class="form-control" name="cat_order" value="@if(!empty($resone['cat_order'])){{$resone['cat_order']}}@else{{$web->getPeriodeNummer(CATEGORY,'cat_order')}}@endif">

                            </div>
                      

                        <div class="form-group">
                                <label class="control-label">{{$web->getLable('text_name')}} </label>
                                <input type="text" class="form-control" name="cat_name" value="{{$resone['cat_name_'.$session->userdata('configlang')]}}" required>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Slug</label>
                                <input type="text" class="form-control" name="cat_slug" value="{{$resone['cat_slug_'.$session->userdata('configlang')]}}">

                            </div>
                            <div class="form-group">
                            <label class="control-label">{{$web->getLable('parent_category')}} </label>
                            <select class=" form-control" name="cat_parent">
                            <option value="0">{{$web->getLable('none')}}</option>
                            @php
                            //print_r($cat);
                            $tree = $func->buildTree($cat);
                            $func->printTree($tree,$r = 0, $p = null,$resone['cat_parent']);

                            @endphp
                        </select>
                        </div>    



                    </div>

                </div>
                <div class="portlet-title">

                    <div class="actions btn-set">

                        <button class="btn btn-success" type="submit" name="save" value="Publish">
                           <i class="fa fa-check"></i> {{$web->getLable('save')}}</button>


                    </div>
                </div>
            </div>

 
        

        </div>
        </form>


        <div class="col-md-8">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-doc"></i>{{$title}} </div>
                        <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>

                    </div>
                        <div class="actions btn-set">
                          @include('mt-admin.lang.langselect')                      
                                   
                       </div>
                    

                </div>
                <div class="portlet-body form">
                    @if(!empty($msg))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$msg}} </div>
                    @endif 
                    
                    @if(!empty($error))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$error}}
                    </div>
                    @endif
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
                            <th style="width:30%"> Slug</th>   
                            <th style="width:20%"> &nbsp;</th> 
                        </tr>
                    </thead>
                    <tbody>
              
                    @php
                            //print_r($cat);
                            $tree = $func->buildTree($res);
                            $func->printcattable($tree,$r = 0, $p = null,$resone['cat_parent']);

                     @endphp
                

                    </tbody>
                </table>
                </form>

                </div>

            </div>


        </div>

  
</div>
@endsection 

@section('script')

@endsection