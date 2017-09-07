@extends('mt-admin.master')

 @section('content')
 <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal form-row-seperated" action="" id="form_sample_1" method="post">
                                <div class="portlet light">
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
                                                            <label class="col-md-3 control-label">SMTP Server :</label>
                                                            <div class="col-md-6 tooltip-wide">
                                                                <input type="text" class="form-control maxlength-handler" name="smtp_host" maxlength="100" value="{{$res->smtp_host}}" data-toggle="tooltip" data-placement="top" data-html="true" title="That would be Ex. (smtp.yourdomain.com)">
                                                         
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">SMTP Port :</label>
                                                            <div class="col-md-6">
                                                                <input type="text" class="form-control maxlength-handler" name="smtp_port" maxlength="100" value="{{$res->smtp_port}}">
                                                         
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">SMTP Server Username  :</label>
                                                            <div class="col-md-6 tooltip-wide">
                                                                <input type="text" class="form-control maxlength-handler" name="smtp_user" maxlength="100" value="{{$res->smtp_user}}" data-toggle="tooltip" data-placement="top" data-html="true" title="Username is usually specified with<br>your email/hosting provider.">
                                                         
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">SMTP Server Password  :</label>
                                                            <div class="col-md-6 tooltip-wide">
                                                                <input type="text" class="form-control maxlength-handler" name="smtp_pass" maxlength="100" value="{{$res->smtp_pass}}" data-toggle="tooltip" data-placement="top" data-html="true" title="Password for the username above.">
                                                         
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">SMTP Authentication :
                                                                                </label>
                                                            <div class="col-md-8">
                                                                <input type="checkbox" name="status" data-on-text="{{$web->getLable('on')}}" data-off-text="{{$web->getLable('off')}}" class="make-switch"
                                                                    @if($res->smtp_active==0) {{'checked'}}
                                                                @endif data-on-color="success" data-off-color="danger">
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
 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
 @endsection 