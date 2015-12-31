@extends('admin.layout.master')
@section('css')
<!-- fullCalendar 2.2.5-->
<link rel="stylesheet" href="{{URL::asset('/')}}bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="{{URL::asset('/')}}bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.print.css" media="print">
@stop

@section('content')
<div class="row">
    <div class="col-md-3">
      <div class="box box-solid">
        <div class="box-header with-border">
          <h4 class="box-title">拖至日历设置时间</h4>
        </div>
        <div class="box-body">
          <!-- the events -->
          <div id="external-events">
            <div class="external-event bg-green">去旅个游</div>
            <div class="external-event bg-yellow">去学习</div>
            <div class="external-event bg-aqua">打地鼠</div>
            <div class="external-event bg-light-blue">啃脚丫</div>
            <div class="external-event bg-red">吃小吃</div>
            <div class="checkbox">
              <label for="drop-remove">
                <input type="checkbox" id="drop-remove">
                拖放后删除
              </label>
            </div>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /. box -->
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">创建新事件</h3>
        </div>
        <div class="box-body">
          <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
            <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
            <ul class="fc-color-picker" id="color-chooser">
              <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
              <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
            </ul>
          </div><!-- /btn-group -->
          <div class="input-group">
            <input id="new-event" type="text" class="form-control" placeholder="事件标题">
            <div class="input-group-btn">
              <button id="add-new-event" type="button" class="btn btn-primary btn-flat">创建</button>
            </div><!-- /btn-group -->
          </div><!-- /input-group -->
        </div>
      </div>
    </div><!-- /.col -->
    <div class="col-md-9">
      <div class="box box-primary">
        <div class="box-body no-padding">
          <!-- THE CALENDAR -->
          <div id="calendar">
          </div>
        </div><!-- /.box-body -->
      </div><!-- /. box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
@stop

@section('script')
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="{{URL::asset('/')}}bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{URL::asset('/')}}bower_components/AdminLTE/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/moment.min.js"></script>
<script src="{{URL::asset('/')}}bower_components/AdminLTE/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/e-calendar.js"></script>
@stop