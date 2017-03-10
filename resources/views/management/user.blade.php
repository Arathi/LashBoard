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
        <th>用户名</th>
        <th>注册日期</th>
        <th>最后活跃</th>
        <th>操作</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><img width=34 height=34 src="{{ $user->avatar or config('app.default_avatar', asset('img/avatar.png')) }}"></td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td>
          <a id='btn-edit-{{$user->id}}' href='#' class='btn btn-primary btn-user-edit'>编辑</a>
          <a id='btn-delete-{{$user->id}}' href='#' class='btn btn-danger btn-user-delete'>删除</a>
        </td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
        <th>UID</th>
        <th>头像</th>
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

@endsection

@section('js_custom')
<script src="{{ cdn_asset('datatables') }}/js/jquery.dataTables.min.js"></script>
<script src="{{ cdn_asset('datatables') }}/js/dataTables.bootstrap.min.js"></script>
<script src="{{ cdn_asset('slimScroll') }}/jquery.slimscroll.min.js"></script>
<script src="{{ cdn_asset('fastclick') }}/fastclick.min.js"></script>

<script>
  var chinese = {
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
    }
  };
  $(function () {
    $("#user-list").DataTable(chinese);
  });
  $('#btn-user-create').click(function(){
    console.log("点击添加按钮");
  });
  $('#btn-user-create-submit').click(function(){
    console.log("点击提交按钮");
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
      }
    });
  });
</script>
@endsection
