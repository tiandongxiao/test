@extends('tpl.layout.master')
@section('content')

	<div class="text-center" style="color:#ccc;font-size:72px;margin-bottom: 40px;">Welcome to E-World</div>
	<a class="btn btn-lg btn-warning pull-right" href="{{ url('install/admin_config') }}">下一步</a>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop
