@extends('tpl.layout.master')
@section('content')
<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">新增Page</h3>
  </div><!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" action="{{ URL('page') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box-body">
      <div class="form-group">
        <label for="title" class="col-sm-2 control-label">标题</label>
        <div class="col-sm-10">
          <input type="text" name="title" class="form-control" id="title">
        </div>
      </div>
      <div class="form-group">
        <label for="slug" class="col-sm-2 control-label">简介</label>
        <div class="col-sm-10">
          <input type="text" name="slug" class="form-control" id="slug">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">内容</label>
        <div class="col-sm-10">
            <textarea name="body" rows="10" class="form-control" required="required"></textarea>
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