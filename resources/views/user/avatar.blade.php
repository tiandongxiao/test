@extends('tpl.layout.master')
@section('content')
    <div class="box box-info" style="border:solid #cccccc 1px;">
        <div class="box box-widget widget-user" style="margin-bottom:30px;">
            <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username">欢迎小伙伴加入</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle" src="{{ Auth::user()->avatar }}" alt="User Avatar">
            </div>
        </div>
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{ URL('user/avatar') }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="file" name="avatar" class="form-control" placeholder="选择头像">
                </div>
                <hr/>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">上传头像</button>
                </div><!-- /.box-footer -->
        </form>
    </div>
@stop
@section('script')
    <script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop