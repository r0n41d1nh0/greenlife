@extends('capas.aplicacion')
@section('content.css')
<link href="{{ asset('vendor/bootstrap/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
@endsection
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('salidas.lista') }}">Ventas</a>
    </li>
    <li class="breadcrumb-item">{{ $salida->id }}_{{ $salida->fecha }}_{!! is_null($cliente) ?  $salida->observacion : $cliente->nombres !!}</li>
    <li class="breadcrumb-item"><a href="{{ route('salidas.nuevo') }}">Nueva Venta</a></li>
  </ol>
  <hr>
  @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Editar Venta</h2>
      <br>
      <form action="{{ route('salidas.actualizar') }}" method="post">
        @csrf
        <div class="col-md-4">
          <label>Cliente</label>
          <select name="persona_id" class="form-control form-control-sm border-primary border-3">
            <option value="">Seleccione</option>  
            @foreach($personas as $persona)
            <option value="{{ $persona->id }}" @if($persona->id==$salida->persona_id) selected @endif >{{ $persona->nombres }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label>Extra</label>
          <input type="number" name="costo_compra" step="any" class="form-control form-control-sm border-primary border-3" value="{{ $salida->costo_compra }}">
        </div>
        <div class="col-md-2">
          <label>Costo delivery</label>
          <input type="number" name="costo_delivery" step="any" class="form-control form-control-sm border-primary border-3" value="{{ $salida->costo_delivery }}">
        </div>
        <div class="col-md-2">
          <label>Costo agencia</label>
          <input type="number" name="costo_agencia" step="any" class="form-control form-control-sm border-primary border-3" value="{{ $salida->costo_agencia }}">
        </div>
        <div class="col-md-2">
          <label>Costo traslado</label>
          <input type="number" name="costo_retorno" step="any" class="form-control form-control-sm border-primary border-3" value="{{ $salida->costo_retorno }}">
        </div>
        <div class="col-md-2">
          <label>Precio delivery</label>
          <input type="number" name="precio_delivery" step="any" class="form-control form-control-sm border-primary border-3" value="{{ $salida->precio_delivery }}">
        </div>
        <div class="col-md-2">
          <label>Fecha</label>
          <input type="text" name="fecha" class="form-control form-control-sm border-primary border-3 datepicker" autocomplete="off" value="{{ $salida->fecha }}">
        </div>
        <div class="col-md-2">
          <label>Fecha de Pago</label>
          <input type="text" name="fecha_pago" class="form-control form-control-sm border-primary border-3 datepicker" autocomplete="off" value="{{ $salida->fecha_pago }}">
        </div>
        <div class="col-md-2">
          <label>Medio de Pago</label>
          <select name="medio_pago" class="form-control form-control-sm border-primary border-3" >
            <option value=""></option>
            <option value="Efectivo" @if($salida->medio_pago=="Efectivo") selected @endif >Efectivo</option>
            <option value="Yape" @if($salida->medio_pago=="Yape") selected @endif >Yape</option>
            <option value="Plin" @if($salida->medio_pago=="Plin") selected @endif >Plin</option>
            <option value="BCP" @if($salida->medio_pago=="BCP") selected @endif >BCP</option>
            <option value="Scotiabank" @if($salida->medio_pago=="Scotiabank") selected @endif >Scotiabank</option>
            <option value="BBVA" @if($salida->medio_pago=="BBVA") selected @endif >BBVA</option>
          </select>
        </div>
        <div class="col-md-6">
          <label>Observación</label>
          <input type="text" name="observacion" class="form-control form-control-sm border-primary border-3" autocomplete="off" value="{{ $salida->observacion }}">
        </div>
        <br>
        <input type="hidden" name="id" value="{{ $salida->id }}" >
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Actualizar">
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