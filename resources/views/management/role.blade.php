@extends('layouts.table_based')

@section('content')
<div class='row'>
  <a id="btn-role-create" href="#" class='btn btn-success pull-right' 
      data-toggle="modal" data-target="#model-role-create"
      style='margin-right: 15px;margin-bottom: 15px;'>
    <i class='fa fa-plus'></i> 添加角色
  </a>
</div>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">角色列表</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="role-list" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>角色编号</th>
        <th>名称</th>
        <th>创建日期</th>
        <th>用户数量</th>
        <th>操作</th>
      </tr>
      </thead>
      <tbody id="role-list-body">
      </tbody>
      <tfoot>
      <tr>
        <th>角色编号</th>
        <th>名称</th>
        <th>创建日期</th>
        <th>用户数量</th>
        <th>操作</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>

@section('dialog-role-create')
<div class="modal fade" id="model-role-create" tabindex="-1" role="dialog" aria-labelledby="model-label-create-role">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="model-label-create-role">添加角色</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="form-role-create">
          <div class="box-body">
            <div class="form-group">
              <label for="new-role-name" class="col-sm-3 control-label">角色名称：</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="name" placeholder="username" />
              </div>
            </div>

            <div class="form-group">
              <label for="new-role-tag" class="col-sm-3 control-label">角色标识：</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="tag" placeholder="tag" />
              </div>
            </div>

            <div class="form-group">
              <label for="new-role-description" class="col-sm-3 control-label">角色说明：</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="description" placeholder="对角色的定位、功能进行说明"></textarea>
              </div>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btn-role-create-submit" type="button" class="btn btn-primary">添加</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
      </div>
    </div>
  </div>
</div>
@show

@endsection

@section('js_custom')
@parent
<script>
  var dataTableConfig = {
    "language": chinese,
    "columns": [
      { data: "id" },
      { data: "name" },
      { data: "created_at" },
      { data: "element_count" },
      { data: "buttons" }
    ],
    "columnDefs": [
      {
        "render": function(data, type, row){
          return "<button type='button' bind_role_id='" + row.id + "' class='btn btn-primary btn-role-edit'>编辑</button>&nbsp;" +
                "<button type='button' bind_role_id='" + row.id + "' class='btn btn-danger btn-role-delete'>删除</button>";
        },
        "targets": 4
      }
    ],
  };

  function delete_role_by_id(id)
  {
    $.ajax({
      type: "POST",
      url: "{{ url('management/role') }}/" + id,
      data: { 
        _method: 'delete', 
        _token : '{{ csrf_token() }}'
      },
      success: function(data){
        alert("角色删除成功！");
        update_role_list(roleList, 'all');
      },
      error: function(response) {
        var data = response.responseJSON;
        alert("角色删除失败：" + data.message);
      }
    });
  }

  function update_role_list(list, id)
  {
    $.ajax({ 
      type: "GET",
      url: "{{ url('management/role') }}/" + id,
      success: function(data){
        if (id == 'all')
        {
          list.clear();
        }
        list.rows.add(data).draw();
        $('button.btn-role-delete').each(function(){
          $(this).click(function(){
            var role_id = $(this).attr('bind_role_id');
            delete_role_by_id(role_id);
          });
        });
      }
    });
  }

  function create_role()
  {
    $.ajax({
      cache: true,
      type: "POST",
      url: "{{ url('management/role') }}",
      data: $('#form-role-create').serialize(),
      async: false,
      contentType: 'application/x-www-form-urlencoded',
      error: function(request) {
        alert("角色创建失败！");
      },
      success: function(data) {
        alert("角色创建成功！");
        // 实现局部刷新表格中的数据
        update_role_list(roleList, data.new_role_id);
        $('#model-role-create').modal('hide');
      }
    });
  }

  $(function () {
    roleList = $("#role-list").DataTable(dataTableConfig);
    update_role_list(roleList, 'all');
  });

  $('#btn-role-create-submit').click(create_role);
</script>
@endsection
