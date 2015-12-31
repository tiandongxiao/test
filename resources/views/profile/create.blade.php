@extends('tpl.layout.master')
@section('content')
<div class="box box-info" style="border:solid green 1px;">
    <div class="box box-widget widget-user" style="margin-bottom:30px;">        
        <div class="widget-user-header bg-aqua-active">
          <h3 class="widget-user-username">创建个人档案</h3>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{URL::asset('/')}}bower_components/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
        </div>
    </div>
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{ URL('user') }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="box-body">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
          <input type="text" class="form-control" placeholder="真实姓名" name="phone">
        </div>      
      
        <div class="box-footer">          
          <button type="submit" class="btn btn-info pull-right">创建</button>
        </div><!-- /.box-footer -->
    </form>
</div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop