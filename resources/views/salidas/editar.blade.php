@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('salidas.lista') }}">Salidas</a>
    </li>
    <li class="breadcrumb-item">{{ $salida->id }}_{{ $salida->fecha }}_{!! is_null($cliente) ?  $salida->observacion : $cliente->nombres !!}</li>
    <li class="breadcrumb-item"><a href="{{ route('salidas.nuevo') }}">Nuevo</a></li>
  </ol>
  <hr>
  @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Editar pedido</h2>
      <br>
      <form action="{{ route('salidas.actualizar') }}" method="post">
        @csrf
        <div class="col-md-4">
          <label>Cliente</label>
          <select name="persona_id" class="form-control form-control-sm selectpicker" required>
            <option value="">Seleccione</option>  
            @foreach($personas as $persona)
            <option value="{{ $persona->id }}" @if($persona->id==$salida->persona_id) selected @endif >{{ $persona->nombres }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label>Costo de compra</label>
          <input type="number" name="costo_compra" class="form-control form-control-sm" value="{{ $salida->costo_compra }}">
        </div>
        <div class="col-md-2">
          <label>Costo delivery</label>
          <input type="number" name="costo_delivery" class="form-control form-control-sm" value="{{ $salida->costo_delivery }}">
        </div>
        <div class="col-md-2">
          <label>Precio delivery</label>
          <input type="number" name="precio_delivery" class="form-control form-control-sm" value="{{ $salida->precio_delivery }}">
        </div>
        <div class="col-md-2">
          <label>Fecha</label>
          <input type="text" name="fecha" class="form-control form-control-sm" autocomplete="off" value="{{ $salida->fecha }}">
        </div>
        <div class="col-md-2">
          <label>Fecha de Pago</label>
          <input type="text" name="fecha_pago" class="form-control form-control-sm" autocomplete="off" value="{{ $salida->fecha_pago }}">
        </div>
        <div class="col-md-6">
          <label>Observación</label>
          <input type="text" name="observacion" class="form-control form-control-sm" autocomplete="off" value="{{ $salida->observacion }}">
        </div>
        <br>
        <input type="hidden" name="id" value="{{ $salida->id }}" >
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Actualizar">
      </form>
    </div>
  </div>
  <br>
@endsection