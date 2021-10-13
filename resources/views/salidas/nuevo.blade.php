@extends('capas.aplicacion')
@section('content.css')
<link href="{{ asset('vendor/bootstrap/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('salidas.lista') }}">Ventas</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('salidas.nuevo') }}">Nueva Venta</a></li>
  </ol>
  <hr>
  <div class="row">
    <div class="col-12">
      <h2>Nueva Venta</h2>
      <br>
      <form action="{{ route('salidas.registrar') }}" method="post">
        @csrf
        <div class="col-md-4">
          <label>Cliente</label>
          <select name="persona_id" class="form-control form-control-sm border-primary border-3">
            <option value=''>Seleccione</option>  
            @foreach($personas as $persona)
            <option value="{{ $persona->id }}">{{ $persona->nombres }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label>Extra</label>
          <input type="number" name="costo_compra" step="any" class="form-control form-control-sm border-primary border-3">
        </div>
        <div class="col-md-2">
          <label>Costo delivery</label>
          <input type="number" name="costo_delivery" step="any" class="form-control form-control-sm border-primary border-3">
        </div>
        <div class="col-md-2">
          <label>Costo agencia</label>
          <input type="number" name="costo_agencia" step="any" class="form-control form-control-sm border-primary border-3">
        </div>
        <div class="col-md-2">
          <label>Costo retorno</label>
          <input type="number" name="costo_retorno" step="any" class="form-control form-control-sm border-primary border-3">
        </div>
        <div class="col-md-2">
          <label>Precio delivery</label>
          <input type="number" name="precio_delivery" step="any" class="form-control form-control-sm border-primary border-3">
        </div>
        <div class="col-md-2">
          <label>Fecha</label>
          <input type="text" name="fecha" class="form-control form-control-sm border-primary border-3 datepicker" autocomplete="off">
        </div>
        <div class="col-md-2">
          <label>Fecha de Pago</label>
          <input type="text" name="fecha_pago" class="form-control form-control-sm border-primary border-3 datepicker" autocomplete="off">
        </div>
        <div class="col-md-2">
          <label>Medio de Pago</label>
          <select name="medio_pago" class="form-control form-control-sm border-primary border-3" >
            <option value=""></option>
            <option value="Efectivo">Efectivo</option>
            <option value="Yape">Yape</option>
            <option value="Plin">Plin</option>
            <option value="BCP">BCP</option>
            <option value="Scotiabank">Scotiabank</option>
            <option value="BBVA">BBVA</option>
          </select>
        </div>
        <div class="col-md-6">
          <label>Observación</label>
          <input type="text" name="observacion" class="form-control form-control-sm border-primary border-3" autocomplete="off">
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