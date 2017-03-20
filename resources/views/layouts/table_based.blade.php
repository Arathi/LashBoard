@extends('layouts.dashboard')

@section('css_import')
@parent
  <link rel="stylesheet" href="{{ cdn_asset('datatables') }}/css/dataTables.bootstrap.css">
@endsection

@section('content')
<div class='row'>
  <a id="btn-object-create" href="#" class='btn btn-success pull-right' 
      data-toggle="modal" data-target="#model-object-create"
      style='margin-right: 15px;margin-bottom: 15px;'>
    <i class='fa fa-user-plus'></i> 添加{{ $object_name }}
  </a>
</div>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $object_name }}列表</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="object-list" class="table table-bordered table-striped">
      <thead>
      <tr>
        @foreach ($columns as $column)
        <th>{{ $column->name }}</th>
        @endforeach
        <th>操作</th>
      </tr>
      </thead>
      <tbody id="object-list-body">
      </tbody>
      <tfoot>
      <tr>
        @foreach ($columns as $column)
        <th>{{ $column->name }}</th>
        @endforeach
        <th>操作</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>

@section('dialog-object-create')
<div class="modal fade" id="model-object-create" tabindex="-1" role="dialog" aria-labelledby="model-label-create">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="model-label-create">添加{{ $object_name }}</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="form-object-create">
          <div class="box-body">
            @yield('dialog-main-content')
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btn-object-create-submit" type="button" class="btn btn-primary">添加</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
      </div>
    </div>
  </div>
</div>
@show

@section('dialog-object-edit')
<div class="modal fade" id="model-object-edit" tabindex="-1" role="dialog" aria-labelledby="model-label-edit">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="model-label-edit">编辑{{ $object_name }}</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="form-object-edit">
          <div class="box-body">
            <input type="hidden" id="hidden-id" name="id" value="" />
            @yield('dialog-main-content')
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btn-object-edit-submit" type="button" class="btn btn-primary">保存</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
      </div>
    </div>
  </div>
</div>
@show

@endsection

@section('js_import')
@parent
<script src="{{ cdn_asset('datatables') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ cdn_asset('datatables') }}/js/dataTables.bootstrap.min.js"></script>
<script src="{{ cdn_asset('slimScroll') }}/jquery.slimscroll.min.js"></script>
<script src="{{ cdn_asset('fastclick') }}/fastclick.min.js"></script>
@endsection

@section('js_custom')
  @section('js_variables_define')
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

    var columns = [
      @foreach ($columns as $column)
      { data: "{{ $column->field }}" },
      @endforeach
      { data: "buttons" }
    ];

    var btnColumnDefine = {
      "render": function(data, type, row){
        var btnEdit = "<button type='button' bind_object_id='" + row.id + "' class='btn btn-primary btn-object-edit' data-toggle='modal' data-target='#model-object-edit'>编辑</button>";
        var btnDelete = "<button type='button' bind_object_id='" + row.id + "' class='btn btn-danger btn-object-delete'>删除</button>";
        return btnEdit + '&nbsp;' + btnDelete;
      },
      "targets": {{ count($columns) }}
    };
  </script>
  @show

  @section('js_functions_define')
  <script>
    function delete_object_by_id(id)
    {
      $.ajax({
        type: "POST",
        url: "{{ $resource_url }}/" + id,
        data: {
          _method: 'delete', 
          _token : '{{ csrf_token() }}'
        },
        success: function(data){
          alert("{{ $object_name }}删除成功！");
          update_object_list(objList, 'all');
        },
        error: function(response) {
          var data = response.responseJSON;
          alert("{{ $object_name }}删除失败：" + data.message);
        }
      });
    }

    function reset_edit_model(id)
    {
      console.log('点击编辑按钮' + id);
      $.ajax({ 
        type: "GET",
        url: "{{ $resource_url }}/" + id,
        success: function(data){
          var user = data[0];
          $('#model-object-edit #hidden-id').val(id);
          $('#model-object-edit #tb-name').val(user.name);
          $('#model-object-edit #tb-role').val(user.role_id);
          $('#model-object-edit #tb-email').val(user.email);
          $('#model-object-edit #tb-password').val();
        }
      });
    }

    function update_object_list(list, id)
    {
      $.ajax({ 
        type: "GET",
        url: "{{ $resource_url }}/" + id,
        success: function(data){
          if (id == 'all')
          {
            list.clear();
          }
          list.rows.add(data).draw();
          $('button.btn-object-delete').each(function(){
            $(this).click(function(){
              var objID = $(this).attr('bind_object_id');
              delete_object_by_id(objID);
            });
          });
          $('button.btn-object-edit').each(function(){
            $(this).click(function(){
              var objID = $(this).attr('bind_object_id');
              reset_edit_model(objID);
            });
          });
        }
      });
    }

    function create_object()
    {
      $.ajax({
        cache: true,
        type: "POST",
        url: "{{ $resource_url }}",
        data: $('#form-object-create').serialize(),
        async: false,
        contentType: 'application/x-www-form-urlencoded',
        success: function(data) {
          alert("{{ $object_name }}创建成功！");
          update_object_list(objList, data.new_record_id);
          $('#model-object-create').modal('hide');
        },
        error: function(request) {
          alert("{{ $object_name }}创建失败！");
        },
      });
    }

    function update_object()
    {
      var id = $('#model-object-edit #hidden-id').val();
      $.ajax({
        cache: true,
        type: "PUT",
        url: "{{ $resource_url }}/" + id,
        data: $('#form-object-edit').serialize(),
        async: false,
        contentType: 'application/x-www-form-urlencoded',
        success: function(data) {
          alert("{{ $object_name }}更新成功！");
          update_object_list(objList, 'all');
          $('#model-object-edit').modal('hide');
        },
        error: function(request) {
          alert("{{ $object_name }}更新失败！");
        },
      });
    }
  </script>
  @show

  @section('define_dt_conf')
  <script>
    var dataTableConfig = {
      "language": chinese,
      "columns": columns,
      "columnDefs": [
        btnColumnDefine
      ]
    };
  </script>
  @show

  @section('initialization')
  <script>
    $(function () {
      objList = $("#object-list").DataTable(dataTableConfig);
      update_object_list(objList, 'all');
    });
    $('#btn-object-edit-submit').click(update_object);
    $('#btn-object-create-submit').click(create_object);
  </script>
  @show

@endsection
