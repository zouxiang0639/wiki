@extends($layout)

@section('style')
    <style>

    </style>
@stop

@section('content')
    <div style="margin: 15px 0; padding: 20px; text-align: center; background-color: #F2F2F2;">
        <form>
            <input name="k" required="" value="{!! Input::get('k') !!}" placeholder="请输入查询信息" autocomplete="off" class="layui-input" type="text">
        </form>

    </div>
    @if($list)
    <table class="layui-table">
        <colgroup>
            <col width="150">
            <col width="200">
            <col>
        </colgroup>
        <thead>
        <tr>
            <th>文件名</th>
            <th>内容</th>
        </tr>
        </thead>
        <tbody>
        @foreach($list as $item)
        <tr>
            <td><a href="{!! route('books', ['path' => $item['path'], 'keyword' => Input::get('k')]) !!}">{!! $item['file'] !!}  </a></td>
            <td>{{ $item['content'] }}</td>
        </tr>
        @endforeach

        </tbody>
    </table>
    @endif
@stop

@section('script')
    <script>


    </script>
@stop