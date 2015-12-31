@extends('tpl.layout.master')
@section('content')
<div class="box box-widget">
    <div class="box-header with-border">
      <div class="user-block">
        <img class="img-circle" src="{{URL::asset('/')}}bower_components/AdminLTE/dist/img/user1-128x128.jpg" alt="user image">
        <span class="username"><a href="#">{{$role->display_name}}</a></span>
        <span class="description">{{$role->description}}</span>
      </div><!-- /.user-block -->
    </div><!-- /.box-header -->
    <div class="box-body">      
      <h3>拥有权限</h3>
    </div><!-- /.box-body -->
</div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop