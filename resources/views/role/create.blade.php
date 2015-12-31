@extends('tpl.layout.master')
@section('content')
<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">新增角色</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{ URL('role') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
      <div class="form-group">
        <label class="col-sm-2 control-label">机读名称</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">显示名称</label>
        <div class="col-sm-10">
          <input type="text" name="display_name" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">角色描述</label>
        <div class="col-sm-10">
            <textarea name="description" rows="2" class="form-control" required="required"></textarea>
        </div>
      </div>      
    </div><!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-lg btn-warning pull-right">创建</button>
    </div><!-- /.box-footer -->
  </form>
</div>

@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop