@extends('tpl.layout.master')
@section('content')
<div class="box box-info" style="border:solid green 1px;">
    <div class="box box-widget widget-user" style="margin-bottom:30px;">        
        <div class="widget-user-header bg-aqua-active">
          <h3 class="widget-user-username">重置密码</h3>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{URL::asset('/')}}bower_components/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
        </div>
    </div>
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{URL('reset/email/confirmed')}}">
      {!! csrf_field() !!}
      <input type="hidden" name="token" value="{{ $token }}">
      <input type="email" name="email" class="hidden" value="{{ $email }}">
      <div class="box-body">        
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
          <input type="password"  name="password" class="form-control" placeholder="输入新密码">
        </div>
        <br/>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
          <input type="password" name="password_confirmation" class="form-control" placeholder="确认新密码">
        </div>       
        <div class="box-footer">          
          <button type="submit" class="btn btn-info pull-right">提交</button>
        </div><!-- /.box-footer -->
    </form>
</div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
<script type="text/javascript" src="{{URL::asset('/')}}js/local.js"></script>
@stop