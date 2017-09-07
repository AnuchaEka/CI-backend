@extends('mt-admin.master') 

@section('css')
 <link href="{{base_url('assets/pages/css/blog.css')}}" rel="stylesheet" type="text/css" /> 
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal form-row-seperated" action="" id="form_sample_1" method="post" enctype="multipart/form-data">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-doc"></i>{{$title}} </div>
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
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$msg}} </div>
                    @endif @if(!empty($error))
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> {{$error}}
                    </div>
                    @endif

                    <div class="portlet-body">
                    <div class="panel-group accordion" id="accordion3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle accordion-toggle-styled" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_1"> Collapsible Group Item #1 </a>
                                </h4>
                            </div>
                            <div id="collapse_3_1" class="panel-collapse in">
                                <div class="panel-body">
                                    <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                        </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_2"> Collapsible Group Item #2 </a>
                                </h4>
                            </div>
                            <div id="collapse_3_2" class="panel-collapse collapse">
                                <div class="panel-body" style="height:200px; overflow-y:auto;">
                                    <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                        </p>
                                    <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                    <p>
                                        <a class="btn blue" href="ui_tabs_accordions_navs.html#collapse_3_2" target="_blank"> Activate this section via URL </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_3"> Collapsible Group Item #3 </a>
                                </h4>
                            </div>
                            <div id="collapse_3_3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                        Brunch 3 wolf moon tempor. </p>
                                    <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                    <p>
                                        <a class="btn green" href="ui_tabs_accordions_navs.html#collapse_3_3" target="_blank"> Activate this section via URL </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle accordion-toggle-styled collapsed" data-toggle="collapse" data-parent="#accordion3" href="#collapse_3_4"> Collapsible Group Item #4 </a>
                                </h4>
                            </div>
                            <div id="collapse_3_4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                    <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                                        Brunch 3 wolf moon tempor. </p>
                                    <p> Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut. </p>
                                    <p>
                                        <a class="btn red" href="ui_tabs_accordions_navs.html#collapse_3_4" target="_blank"> Activate this section via URL </a>
                                    </p>
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