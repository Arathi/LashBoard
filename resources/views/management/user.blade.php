@extends('layouts.table_based')

@section('content')
<div class='row'>
  <a id="btn-user-create" href="#" class='btn btn-success pull-right' 
      data-toggle="modal" data-target="#model-user-create"
      style='margin-right: 15px;margin-bottom: 15px;'>
    <i class='fa fa-user-plus'></i> 添加用户
  </a>
</div>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">用户列表</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="user-list" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>UID</th>
        <th>头像</th>
        <th>邮箱</th>
        <th>用户名</th>
        <th>角色</th>
        <th>注册日期</th>
        <th>最后活跃</th>
        <th>操作</th>
      </tr>
      </thead>
      <tbody id="user-list-body">
      </tbody>
      <tfoot>
      <tr>
        <th>UID</th>
        <th>头像</th>
        <th>邮箱</th>
        <th>用户名</th>
        <th>角色</th>
        <th>注册日期</th>
        <th>最后活跃</th>
        <th>操作</th>
      </tr>
      </tfoot>
    </table>
  </div>
  <!-- /.box-body -->
</div>

@section('dialog-user-create')
<div class="modal fade" id="model-user-create" tabindex="-1" role="dialog" aria-labelledby="model-label-create-user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="model-label-create-user">添加用户</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="form-user-create">
          <div class="box-body">
            <div class="form-group">
              <label for="new-user-name" class="col-sm-3 control-label">用户名：</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="name" placeholder="username" />
              </div>
            </div>

            <div class="form-group">
              <label for="new-user-roleid" class="col-sm-3 control-label">角色：</label>
              <div class="col-sm-6">
                <select class="form-control" name="role_id">
                  @foreach($roles as $role)
                  <option value='{{ $role->id }}'>{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="new-user-email" class="col-sm-3 control-label">E-Mail：</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="email" placeholder="email" />
              </div>
            </div>

            <div class="form-group">
              <label for="new-user-password" class="col-sm-3 control-label">密码：</label>
              <div class="col-sm-6">
                <input type="password" class="form-control" name="password" placeholder="password" />
              </div>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button id="btn-user-create-submit" type="button" class="btn btn-primary">添加</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
      </div>
    </div>
  </div>
</div>
@show

@section('dialog-user-edit')
<div class="modal fade" id="model-user-edit" tabindex="-1" role="dialog" aria-labelledby="model-label-edit-user">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="model-label-create-user">编辑用户</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="form-user-create">
          <div class="box-body">
            <input type="hidden" name="id" value="" />

            <div class="form-group">
              <label for="new-user-name" class="col-sm-3 control-label">用户名：</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="name" placeholder="username" />
              </div>
            </div>

            <div class="form-group">
              <label for="new-user-roleid" class="col-sm-3 control-label">角色：</label>
              <div class="col-sm-6">
                <select class="form-control" name="role_id">
                  @foreach($roles as $role)
                  <option value='{{ $role->id }}'>{{ $role->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="new-user-email" class="col-sm-3 control-label">E-Mail：</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="email" placeholder="email" />
              </div>
            </div>

            <div class="form-group">
              <label for="new-user-password" class="col-sm-3 control-label">密码：</label>
              <div class="col-sm-6">
                <input type="password" class="form-control" name="password" placeholder="password" />
              </div>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          </div>
          
        </form>
      </div>
      <div class="modal-footer">
        <button id="btn-user-edit-submit" type="button" class="btn btn-primary">添加</button>
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
      { data: "avatar" },
      { data: "email" },
      { data: "name" },
      { data: "role_name" },
      { data: "created_at" },
      { data: "updated_at" },
      { data: "buttons" }
    ],
    "columnDefs": [
      {
        "render": function(data, type, row){
          var avatar = (row.avatar == undefined) ? "{{ config('app.default_avatar', asset('img/avatar.png')) }}" : row.avatar;
          return "<img width=34 height=34 src='" + avatar + "'/>";
        },
        "targets": 1
      },
      {
        "render": function(data, type, row){
          return "<button type='button' bind_user_id='" + row.id + "' class='btn btn-primary btn-user-edit'>编辑</button>&nbsp;" +
                "<button type='button' bind_user_id='" + row.id + "' class='btn btn-danger btn-user-delete'>删除</button>";
        },
        "targets": 7
      }
    ]
  };

  function delete_user_by_id(id)
  {
    $.ajax({
      type: "POST",
      url: "{{ url('management/user') }}/" + id,
      data: { 
        _method: 'delete', 
        _token : '{{ csrf_token() }}'
      },
      success: function(data){
        alert("用户删除成功！");
        update_user_list(userList, 'all');
      },
      error: function(response) {
        var data = response.responseJSON;
        alert("用户删除失败：" + data.message);
      }
    });
  }

  function update_user_list(list, id)
  {
    $.ajax({ 
      type: "GET",
      url: "{{ url('management/user') }}/" + id,
      success: function(data){
        if (id == 'all')
        {
          list.clear();
        }
        list.rows.add(data).draw();
        $('button.btn-user-delete').each(function(){
          $(this).click(function(){
            var user_id = $(this).attr('bind_user_id');
            delete_user_by_id(user_id);
          });
        });
      }
    });
  }

  function create_user()
  {
    $.ajax({
      cache: true,
      type: "POST",
      url: "{{ url('management/user') }}",
      data: $('#form-user-create').serialize(),
      async: false,
      contentType: 'application/x-www-form-urlencoded',
      error: function(request) {
        alert("用户创建失败！");
      },
      success: function(data) {
        alert("用户创建成功！");
        // 实现局部刷新表格中的数据
        update_user_list(userList, data.new_user_id);
        $('#model-user-create').modal('hide');
      }
    });
  }

  $(function () {
    userList = $("#user-list").DataTable(dataTableConfig);
    update_user_list(userList, 'all');
  });

  $('#btn-user-create-submit').click(create_user);

</script>
@endsection
