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
       
                                        <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Meta Title:</label>
                                                            <div class="col-md-10">
                                                                <input type="text" class="form-control maxlength-handler" name="meta_title" maxlength="100" value="{{$res->meta_title}}">
                                                                <span class="help-block"> {{$web->getLable('max')}} 100 {{$web->getLable('chars')}} </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Meta Keywords:</label>
                                                            <div class="col-md-10">
                                                                <textarea class="form-control maxlength-handler" rows="8" name="meta_keywords" maxlength="1000">{{$res->meta_keywords}}</textarea>
                                                                <span class="help-block"> {{$web->getLable('max')}} 1000 {{$web->getLable('chars')}} </span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Meta Description:</label>
                                                            <div class="col-md-10">
                                                                <textarea class="form-control maxlength-handler" rows="8" name="meta_description" maxlength="255">{{$res->meta_description}}</textarea>
                                                                <span class="help-block"> {{$web->getLable('max')}} 255 {{$web->getLable('chars')}} </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                    </div>
                                      <div class="portlet-title">

                                        <div class="actions btn-set">
                                          
                                        
                                            <button class="btn btn-success" type="submit" name="save" value="1">
                                                <i class="fa fa-check"></i> {{$web->getLable('save')}}</button>
                                                                           
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                     @endsection  
  @section('script')
<script src="{{base_url('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
<script>
      $('.maxlength-handler').maxlength({
            limitReachedClass: "label label-danger",
            alwaysShow: true,
            threshold: 5
        });
</script>
 
@endsection   