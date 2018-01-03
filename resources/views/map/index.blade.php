@extends($layout)

@section('style')
    <style>
        .grid-demo {
            padding: 10px;
            line-height: 30px;
            background-color: #79C48C;
        }
        .grid-demo a {
            color: #fff;
        }
    </style>
@stop

@section('content')
    <div class="layui-row layui-col-space10">
        <div class="layui-col-md4">
            @foreach($list as $item)
                <div class="grid-demo">
                    <a target="_blank" href="{!! $item['route'] !!}">{!! $item['title'] !!}</a>
                </div>
            @endforeach
        </div>
    </div>
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
 