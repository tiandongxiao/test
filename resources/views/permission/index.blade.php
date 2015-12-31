@extends('tpl.layout.master')
@section('content')
<div class="box">
	<div class="box-header with-border">
	  <a href="{{ url('permission/create') }}" class="btn btn-lg btn-warning" >新增权限</a>
	</div><!-- /.box-header -->
	<div class="box-body">
	  <table class="table table-bordered text-center">
	    <tbody><tr>
	      <th>权限名称</th>
	      <th>权限明码</th>
	      <th>权限描述</th>
	      <th>操作</th>
	      <th>操作</th>	      
	      @foreach($roles as $role)
	      <th class="text-center">{{$role->display_name}}</th>
	      @endforeach	      
	    </tr>
	    @foreach($permissions as $permission)
	    <tr>
	      <td><a href="{{ url('permission/'.$permission->id) }}" class="btn btn-info">{{ $permission->display_name }}</a></td>
	      <td>{{$permission->name}}</td>
	      <td>{{$permission->description}}</td>	      
	      <td>
	      	<a href="{{ url('permission/'.$permission->id.'/edit') }}" class="btn btn-success">编辑</a>      	
	      </td>	      
	      <td>
            <form action="{{ url('permission/'.$permission->id) }}" method="POST">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">删除</button>
            </form>	      	
	      </td>
	      @foreach($roles as $role)
	      	@if($role->perms->find($permission->id))
	      	<td>Y</td>
	      	@else
	      	<td></td>
	      	@endif
	      @endforeach	      	      
	    </tr>
	    @endforeach
	  </tbody></table>
	</div><!-- /.box-body -->
</div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop