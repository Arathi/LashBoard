@extends('layouts.table_based')

@section('dialog-main-content')
<div class="form-group">
  <label for="new-user-name" class="col-sm-3 control-label">用户名：</label>
  <div class="col-sm-6">
    <input type="text" id="tb-name" class="form-control" name="name" placeholder="username" />
  </div>
</div>

<div class="form-group">
  <label for="new-user-roleid" class="col-sm-3 control-label">角色：</label>
  <div class="col-sm-6">
    <select class="form-control" id="combo-role" name="role_id">
      @foreach($roles as $role)
      <option value='{{ $role->id }}'>{{ $role->name }}</option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group">
  <label for="new-user-email" class="col-sm-3 control-label">E-Mail：</label>
  <div class="col-sm-6">
    <input type="text" id="tb-email" class="form-control" name="email" placeholder="email" />
  </div>
</div>

<div class="form-group">
  <label for="new-user-password" class="col-sm-3 control-label">密码：</label>
  <div class="col-sm-6">
    <input type="password" id="tb-password" class="form-control" name="password" placeholder="password" />
  </div>
</div>
@endsection

@section('define_dt_conf')
<script>
  var dataTableConfig = {
    "language": chinese,
    "columns": columns,
    "columnDefs": [
      {
        "render": function(data, type, row){
          var avatar = (row.avatar == undefined) ? "{{ config('app.default_avatar', asset('img/avatar.png')) }}" : row.avatar;
          return "<img width=34 height=34 src='" + avatar + "'/>";
        },
        "targets": 1
      },
      btnColumnDefine
    ]
  };
</script>
@endsection

@section('define_reset_action')
<script>
  function reset_model_elements(data, mode) {
    var modelSelector = '#model-object-' + mode;
    if (mode == 'create') {
      $(modelSelector + ' #tb-name').val("");
      $(modelSelector + " #combo-role").val({{ $default_role_id }});
      $(modelSelector + ' #tb-email').val("");
      $(modelSelector + ' #tb-password').val("");
    }
    else if (mode == 'edit') {
      var user = data[0];
      $(modelSelector + ' #hidden-id').val(user.id);
      $(modelSelector + ' #tb-name').val(user.name);
      $(modelSelector + " #combo-role").val(user.role_id);
      $(modelSelector + ' #tb-email').val(user.email);
      $(modelSelector + ' #tb-password').val("");
    }
  }
</script>
@endsection
