@extends('capas.aplicacion')
@section('content.css')
<link href="{{ asset('vendor/bootstrap/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('ingresos.lista') }}">Compras</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('ingresos.lista') }}">Nuevo</a></li>
  </ol>
  <hr>
  <div class="row">
    <div class="col-12">
      <h2>Nueva compra</h2>
      <br>
      <form action="{{ route('ingresos.registrar') }}" method="post">
        @csrf
        <div class="col-md-2">
          <label>Fecha</label>
          <input type="text" name="fecha" class="form-control form-control-sm border-primary border-3 datepicker" autocomplete="off" required>
        </div>
        <div class="col-md-4">
          <label>Proveedor</label>
          <select name="persona_id" class="form-control form-control-sm border-primary border-3" required>
            <option value="">Seleccione</option>  
            @foreach($personas as $persona)
            <option value="{{ $persona->id }}">{{ $persona->nombres }}</option>
            @endforeach
          </select>
        </div>
        <br>
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Agregar">
      </form>
    </div>
  </div>
  <br>
@endsection
@section('content.js')
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap-datepicker.es.min.js') }}"></script>
  <script>
    $('.datepicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        language: "es",
        todayHighlight: true
    });
  </script>
@endsection