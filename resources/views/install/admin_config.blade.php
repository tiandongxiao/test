@extends('tpl.layout.master')
@section('content')
<div class="box box-info" style="border:solid green 1px;">
    <div class="box box-widget widget-user" style="margin-bottom:30px;">        
        <div class="widget-user-header bg-aqua-active">
          <h3 class="widget-user-username">管理员设置</h3>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{URL::asset('/')}}bower_components/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
        </div>
    </div>
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{ URL('install/admin_config') }}">
      {!! csrf_field() !!}
      <div class="box-body">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
          <input type="text" class="form-control" placeholder="手机号码" name="phone">
        </div>
        <br/>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
          <input type="password" class="form-control" placeholder="设置密码" name="password">
        </div>
        <br/>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
          <input type="password" class="form-control" placeholder="确认密码" name="password_confirmation">
        </div>
        <br/>

        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
          <input type="email" class="form-control" placeholder="电子邮箱" name="email">
        </div>
        <br/>        
      
        <div class="box-footer">          
          <button type="submit" class="btn btn-info pull-right">创建</button>
        </div><!-- /.box-footer -->
    </form>
</div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop