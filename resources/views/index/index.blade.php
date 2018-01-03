@extends($layout)

@section('style')
<style>

</style>

@stop
@section('content')

{!! $html !!}

@stop

@section('script')
  {{--  <script>
        layui.use('code', function(){ //加载code模块
            layui.code(); //引用code方法
            layui.code({
                elem: '.language-php' //默认值为.layui-code

            });
        });
    </script>--}}
@stop