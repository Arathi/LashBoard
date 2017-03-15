@extends('layouts.table_based')

@section('dialog-main-content')

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
