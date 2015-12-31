@extends('tpl.layout.master')

@section('content')
    <div class="content">
        <div class="title">Welcome Home</div>
    </div>
@stop
@section('script')
<script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
@stop