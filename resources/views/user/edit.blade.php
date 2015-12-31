@extends('tpl.layout.master')
@section('content')
<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">编辑用户</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{ URL('user/'.$data['user']->id) }}" method="POST">
    <input name="_method" type="hidden" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">用户名</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control"  value="{{ $data['user']->name }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">电话号码</label>
        <div class="col-sm-10">
          <input type="text" name="display_name" class="form-control"  value="{{ $data['user']->phone }}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">电子邮箱</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control"  value="{{ $data['user']->email }}">
        </div>
      </div>
      <div class="form-group">
      @foreach($data['roles'] as $role)
        @if($role->name != 'anony_user')
          @if($data['user']->hasRole($role->name))        
          <label class="col-sm-2 control-label">          
            <input type="checkbox" name="role[]" value="{{$role->name}}" checked /> {{$role->display_name}}         
          </label>
          @else
          <label class="col-sm-2 control-label">          
            <input type="checkbox" name="role[]" value="{{$role->name}}" /> {{$role->display_name}}         
          </label>          
          @endif
        @endif
      @endforeach                                  
      </div>
      
    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-lg btn-warning pull-right">更新</button>
    </div><!-- /.box-footer -->
  </form>
</div>

@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop
