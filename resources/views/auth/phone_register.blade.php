@extends('tpl.layout.master')
@section('content')
<div class="box box-info" style="border:solid green 1px;">
    <div class="box box-widget widget-user" style="margin-bottom:30px;">        
        <div class="widget-user-header bg-aqua-active">
          <h3 class="widget-user-username">欢迎小伙伴加入</h3>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{URL::asset('/')}}bower_components/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
        </div>
    </div>
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{URL('/register')}}">
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
        <div class="form-group">
          <div class="col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control" placeholder="输入图形验证码" name="cpt">
            </div>
          </div>
          <div class="col-sm-2">
            <img src="{{ url('tool/cpt') }}" onclick="this.src='{{ url('tool/cpt')}}?r='+Math.random();" alt="">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control" placeholder="输入手机验证码" name="vcode">
            </div>
          </div>
          <div class="col-sm-2">
            <button id="get_vcode" type="button" class="btn btn-sm btn-danger">获取手机验证码</button>
          </div>
        </div>
        <div class="box-footer">
          <a class="btn btn-default text-info" href="{{URL('/register/email')}}">邮箱注册</a>
          <button type="submit" class="btn btn-info pull-right">注册</button>
        </div><!-- /.box-footer -->
    </form>
</div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
<script type="text/javascript" src="{{URL::asset('/')}}js/local.js"></script>
@stop