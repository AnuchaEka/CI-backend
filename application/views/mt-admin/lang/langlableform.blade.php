 @extends('mt-admin.master')

 @section('content')
 <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal form-row-seperated" action="" id="form_sample_1" method="post">
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-wrench"></i>{{$title}} </div>
                                       
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
                                                            <label class="col-md-3 control-label">{{$web->getLable('language_name')}}:
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" required @if(!empty($res['name'])) {{'readonly'}} @endif  name="langlable_name" value="{{$res['name']}}"> </div>
                                                        </div>


                                                    @foreach($reslang as $rslable)
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">{{$rslable->lang_name}}:
                                                                
                                                            </label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control"  name="lang_code[{{$rslable->lang_iso}}]"  value="{{$res['lang_'.$rslable->lang_iso]}}"> </div>
                                                        </div>
                                                   @endforeach     
                                                       
                      
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