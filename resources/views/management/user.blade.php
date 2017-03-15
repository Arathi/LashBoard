@extends('layouts.dashboard')

@section('css_custom')
<link rel="stylesheet" href="{{ cdn_asset('datatables') }}/css/dataTables.bootstrap.css">
@endsection

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
<script src="{{ cdn_asset('datatables') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ cdn_asset('datatables') }}/js/dataTables.bootstrap.min.js"></script>
<script src="{{ cdn_asset('slimScroll') }}/jquery.slimscroll.min.js"></script>
<script src="{{ cdn_asset('fastclick') }}/fastclick.min.js"></script>

<script>
  var dataTableConfig = {
    "language": {
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
      },
    },
    "columns": [
      { data: "id" },
      { data: "avatar" },
      { data: "email" },
      { data: "name" },
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
          // return "<a id='btn-edit-" + row.id + "' bind_user_id='" + row.id + "' href='#' class='btn btn-primary btn-user-edit'>编辑</a>" +
          //      "<a id='btn-delete-" + row.id + "' bind_user_id='" + row.id + "' href='#' class='btn btn-danger btn-user-delete'>删除</a>";
          return "<button type='button' bind_user_id='" + row.id + "' class='btn btn-primary btn-user-edit'>编辑</button>&nbsp;" +
                "<button type='button' bind_user_id='" + row.id + "' class='btn btn-danger btn-user-delete'>删除</button>";
        },
        "targets": 6
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
            // console.log('点击用户' + user_id + '的删除按钮');
            delete_user_by_id(user_id);
          });
        });
      }
    });
  }

  function create_user()
  {}

  $(function () {
    userList = $("#user-list").DataTable(dataTableConfig);
    update_user_list(userList, 'all');
  });

  $('#btn-user-create').click(function(){
  });

  $('#btn-user-create-submit').click(function(){
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
        // TODO 实现局部刷新表格中的数据
        // location.reload();
        update_user_list(userList, data.new_user_id);
        $('#model-user-create').modal('hide');
      }
    });
  });

</script>
@endsection
