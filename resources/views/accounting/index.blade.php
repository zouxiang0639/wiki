@extends($layout)

@section('style')

@stop
@section('content')
    <blockquote class="layui-elem-quote">
        <button class="layui-btn layui-btn-fluid">导入Excel</button>
    </blockquote>
    <div id="content">
        <table class="layui-table">
            <colgroup>
                <col width="150">
                <col width="200">
                <col>
            </colgroup>
            <thead>
            <tr>
                <th>时间</th>
                <th>收支类型</th>
                <th>账目分类</th>
                <th>金额</th>
                <th>账户</th>
                <th>账本</th>
                <th>备注</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>贤心</td>
                <td>2016-11-29</td>
                <td>人生就像是一场修行</td>
                <td>贤心</td>
                <td>2016-11-29</td>
                <td>人生就像是一场修行</td>
                <td>人生就像是一场修行</td>
            </tr>

            </tbody>
        </table>
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

@stop