@extends('tpl.layout.master')
@section('content')
<div class="box box-info" style="border:solid green 1px;">
    <div class="box box-widget widget-user" style="margin-bottom:30px;">        
        <div class="widget-user-header bg-aqua-active">
          <h3 class="widget-user-username">你又把我给忘了...</h3>
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="{{URL::asset('/')}}bower_components/AdminLTE/dist/img/user9-128x128.jpg" alt="User Avatar">
        </div>
    </div>
    <!-- form start -->
    <form class="form-horizontal" method="POST" action="{{URL('reset')}}">
      {!! csrf_field() !!}
      <div class="box-body">
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-phone"></i></span>
          <input type="text" class="form-control" placeholder="手机号码" name="phone">
        </div>
        <br/>
        <div class="form-group">
          <div class="col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" class="form-control" placeholder="输入验证码" name="vcode">
            </div>
          </div>
          <div class="col-sm-2">             
            <button type="button" class="btn btn-sm btn-danger" id="get_vcode">获取验证码</button>
          </div>
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