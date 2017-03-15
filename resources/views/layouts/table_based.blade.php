@extends('layouts.dashboard')

@section('css_import')
@parent
  <link rel="stylesheet" href="{{ cdn_asset('datatables') }}/css/dataTables.bootstrap.css">
@endsection

@section('js_import')
@parent
<script src="{{ cdn_asset('datatables') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ cdn_asset('datatables') }}/js/dataTables.bootstrap.min.js"></script>
<script src="{{ cdn_asset('slimScroll') }}/jquery.slimscroll.min.js"></script>
<script src="{{ cdn_asset('fastclick') }}/fastclick.min.js"></script>
@endsection

@section('js_custom')
<script>
  var chinese = {
    "lengthMenu": "每页 _MENU_ 条记录",
    "zeroRecords": "暂无记录",
    "info": "第 _PAGE_ 页 ( 总共 _PAGES_ 页 )",
    "infoEmpty": "无记录",
    "infoFiltered": "(从 _MAX_ 条记录过滤)",
    "search": "搜索：",
    "paginate": {
      "first":    "首页",
      "last":     "尾页",
      "next":     "下一页",
      "previous": "上一页"
    }
  };
</script>
@endsection
