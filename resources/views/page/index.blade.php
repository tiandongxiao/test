@extends('tpl.layout.master')
@section('content')
<div class="box">
	<div class="box-header with-border">
	  <a href="{{ url('page/create') }}" class="btn btn-lg btn-info" >新增</a>
	</div><!-- /.box-header -->
	<div class="box-body">
	  <table class="table table-bordered">
	    <tbody><tr>
	      <th style="width: 10px">#</th>
	      <th>标题</th>
	      <th>概要内容</th>
	      <th style="width: 40px"><a>链接</a></th>
	      <th style="width: 40px"><a>操作</a></th>
	      <th style="width: 40px"><a>操作</a></th>
	    </tr>
	    @foreach($pages as $page)
	    <tr>
	      <td>{{ $page->id }}</td>
	      <td>{{ $page->title }}</td>
	      <td>{{ $page->slug }}</td>
	      <td><a href="{{ url('page/'.$page->id) }}" class="btn btn-info"> 查看页面</a></td>
	      <td>
	      	<a href="{{ url('page/'.$page->id.'/edit') }}" class="btn btn-success">编辑</a>      	
	      </td>	      
	      <td>
            <form action="{{ url('page/'.$page->id) }}" method="POST" style="display: inline;">
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
	  <ul class="pagination pagination-sm no-margin pull-right">
	    <li><a href="#">«</a></li>
	    <li><a href="#">1</a></li>
	    <li><a href="#">2</a></li>
	    <li><a href="#">3</a></li>
	    <li><a href="#">»</a></li>
	  </ul>
	</div>
</div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop