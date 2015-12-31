@extends('tpl.layout.master')
@section('content')
    <div class="box box-info" style="border:solid #cccccc 1px;">
        <div class="box box-widget widget-user" style="margin-bottom:30px;">
            <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username">欢迎小伙伴加入</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle" src="{{ Auth::user()->avatar }}" alt="User Avatar">
            </div>
        </div>

        <div class="validation-errors"></div>
        <!-- form start -->
        <form id="avatar" class="form-horizontal" method="POST" action="{{ URL('user/avatar') }}" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <input type="file" name="avatar" id="image" class="form-control hidden" >
            <div class="box-footer text-center">
                <button type="submit" id="upload-avatar" class="btn btn-lg btn-info">上传头像</button>
            </div><!-- /.box-footer -->

        </form>
        <div class="span5">
            <div id="output" class="hidden"></div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{URL::asset('/')}}bower_components/AdminLTE/dist/js/app.min.js"></script>
    <script src="{{URL::asset('/')}}js/jquery.form.js"></script>
    <script>
        $(document).ready(function() {
            var options = {
                beforeSubmit:  showRequest,
                success:       showResponse,
                dataType: 'json'
            };
            $('#image').on('change', function(){
                $('#upload-avatar').html('正在上传...');
                $('#avatar').ajaxForm(options).submit();
            });
        });
        function showRequest() {
            $("#validation-errors").hide().empty();
            $("#output").css('display','none');
            return true;
        }

        function showResponse(response)  {
            if(response.success == false)
            {
                var responseErrors = response.errors;
                $.each(responseErrors, function(index, value)
                {
                    if (value.length != 0)
                    {
                        $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                    }
                });
                $("#validation-errors").show();
            } else {
                $('#user-avatar').attr('src',response.avatar);
                $('#upload-avatar').html('更换新的头像');
            }
        }
    </script>
@stop