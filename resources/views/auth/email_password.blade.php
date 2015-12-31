@extends('tpl.layout.master')
@section('content')
<div class="box box-info" style="border:solid green 1px;">
	<div class="box box-widget widget-user" style="margin-bottom:30px;">	    
	    <div class="widget-user-header bg-aqua-active">
	      <h3 class="widget-user-username">你心里果然没有我</h3>
	    </div>
	    <div class="widget-user-image">
	      <img class="img-circle" src="{{URL::asset('/')}}bower_components/AdminLTE/dist/img/user4-128x128.jpg" alt="User Avatar">
	    </div>
	</div>
	<!-- form start -->
	<form class="form-horizontal" action="{{URL('reset/email')}}" method="POST">
	  {!! csrf_field() !!}
	  <div class="box-body">
		<div class="input-group">
	      <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	      <input type="email" class="form-control" placeholder="邮箱" name="email">
        </div>
	  </div><!-- /.box-body -->
	  <div class="box-footer">
	    <button type="submit" class="btn btn-info pull-right">发送密码邮件</button>
	  </div><!-- /.box-footer -->
	</form>
</div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop