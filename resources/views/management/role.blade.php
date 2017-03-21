@extends('layouts.table_based')

@section('dialog-main-content')
<div class="form-group">
  <label for="new-user-name" class="col-sm-3 control-label">角色名：</label>
  <div class="col-sm-6">
    <input type="text" id="tb-name" class="form-control" name="name" placeholder="rolename" />
  </div>
</div>

<div class="form-group">
  <label for="new-user-email" class="col-sm-3 control-label">标记：</label>
  <div class="col-sm-6">
    <input type="text" id="tb-tag" class="form-control" name="tag" placeholder="tag" />
  </div>
</div>

<div class="form-group">
  <label for="new-user-email" class="col-sm-3 control-label">描述：</label>
  <div class="col-sm-6">
    <input type="text" id="tb-descr" class="form-control" name="description" placeholder="描述该角色的定位以及需要的功能" />
  </div>
</div>
@endsection

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
@endsection

@section('define_reset_action')
<script>
  function reset_model_elements(data, mode) {
    var modelSelector = '#model-object-' + mode;
    if (mode == 'create') {
      $(modelSelector + ' #tb-name').val("");
      $(modelSelector + ' #tb-tag').val("");
      $(modelSelector + ' #tb-descr').val("");
    }
    else if (mode == 'edit') {
      var role = data[0];
      $(modelSelector + ' #hidden-id').val(role.id);
      $(modelSelector + ' #tb-name').val(role.name);
      $(modelSelector + ' #tb-tag').val(role.tag);
      $(modelSelector + ' #tb-descr').val(role.description);
    }
  }
</script>
@endsection
