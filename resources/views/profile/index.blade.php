@extends('tpl.layout.master')
@section('content')
<div class="box box-widget">
    <div class="box-header with-border">
      <div class="user-block">
        <img class="img-circle" src="{{URL::asset('/')}}bower_components/AdminLTE/dist/img/user1-128x128.jpg" alt="user image">
        <span class="username"><a href="#">{{$user->name}}</a></span>
        <span class="description">{{$user->email}}</span>
      </div><!-- /.user-block -->
    </div><!-- /.box-header -->
    <div class="box-body">      
      <h3>所属角色</h3>
      @foreach($user->roles as $role)
        {{$role->display_name}}
      @endforeach
    </div><!-- /.box-body -->
    <div class="box-body">      
      <h3>详细档案</h3>
      <p>{{ !is_null($user->profile)? $user->profile->realname:'XXX' }}</p>
    </div><!-- /.box-body -->       
</div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop