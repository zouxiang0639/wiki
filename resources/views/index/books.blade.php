@extends($layout)

@section('style')
    <style>
        .layui-header,.layui-side {display: none}
        .layui-body{top:0px !important;left:0px}
        .layui-layer-dir {
            box-shadow: none;
            border: 1px solid #d2d2d2;
        }
        .layui-layer-dir .layui-layer-content {
            padding: 10px;
        }
        .site-dir li {
            line-height: 26px;
            margin-left: 20px;
            overflow: visible;
            list-style-type: disc;
            font-size: 12px;
        }

    </style>
@stop
@section('content')

    <div id="content">
        {!! $html !!}
    </div>

    <div class="layui-layer layui-layer-page layui-layer-dir" id="layui-layer1" style="z-index: 19891015; top: 20px; margin-left: -15px; display: none">
        <div class="layui-layer-title" style="cursor: move;">目录</div>
        <div  class="layui-layer-content" style="max-height: 300px;">
            <ul id="title-h2" class="site-dir layui-layer-wrap" style="display: block;">

            </ul>
        </div>
        <span class="layui-layer-setwin">
            <a class="layui-layer-ico layui-layer-close layui-layer-close1" href="javascript:;">

            </a>
            </span><span class="layui-layer-resize">

        </span>
    </div>

@stop

@section('script')
     <script>
          layui.use(['layer', 'jquery', 'code'], function(){ //加载code模块
              var $ = layui.jquery;
            /*  layui.code(); //引用code方法
              layui.code({
                  elem: '.language-php' //默认值为.layui-code

              });*/

              //导航目录
              var title = '';
              $('#content h2').each(function($i){
                  var name = $(this).text();
                  title += '<li><a href="#title_' + $i+1 + '"><cite>' + name + '</cite></a></li>';
                  $(this).attr("id", 'title_' + $i+1)
              });
              $('#title-h2').html(title);
              var width = document.body.clientWidth;
              $('#layui-layer1').css("left", width - 130).show();

              $('.layui-layer-close').click(function(){
                  $("#layui-layer1").remove()
              });

          });
      </script>
@stop