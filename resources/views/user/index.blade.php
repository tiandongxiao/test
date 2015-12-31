@extends('tpl.layout.master')
@section('content')
<div class="box">
	<div class="box-header with-border">
	  <a href="{{ url('user/create') }}" class="btn btn-lg btn-info" >新增用户</a>
	</div><!-- /.box-header -->
	<div class="box-body">
	  <table class="table table-bordered">
	    <tbody><tr>
	      <th style="width: 10px">#</th>
	      <th>用户名</th>
	      <th>手机号码</th>
	      <th>电子邮箱</th>
	      <th>角色</th>
	      <th style="width: 40px"><a>操作</a></th>
	      <th style="width: 40px"><a>操作</a></th>	      
	    </tr>
	    @foreach($users as $user)
	    <tr>
	      <td>{{ $user->id }}</td>
	      <td><a href="{{ url('user/'.$user->id) }}">{{ $user->name }}</a></td>
	      <td>{{ $user->phone }}</td>
	      <td>{{ $user->email }}</td>
	      <td>
	      	@foreach($user->roles as $role)
	      	<span>{{$role->display_name}}</span>
	      	@endforeach
	      </td>
	      <td>
	      	<a href="{{ url('user/'.$user->id.'/edit') }}" class="btn btn-success">编辑</a>      	
	      </td>	      
	      <td>
            <form action="{{ url('user/'.$user->id) }}" method="POST">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">删除</button>
            </form>	      	
	      </td>	      
	    </tr>
	    @endforeach
	  </tbody></table>
	</div><!-- /.box-body -->

	<div class="box-footer clearfix">
		<div class="pull-right">
			{!! $users->render() !!}
		</div>
	</div>
</div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop