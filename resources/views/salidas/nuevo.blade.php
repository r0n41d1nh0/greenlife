@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('salidas.lista') }}">Salidas</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('salidas.nuevo') }}">Nuevo Pedido</a></li>
  </ol>
  <hr>
  <div class="row">
    <div class="col-12">
      <h2>Nuevo Pedido</h2>
      <br>
      <form action="{{ route('salidas.registrar') }}" method="post">
        @csrf
        <div class="col-md-4">
          <label>Cliente</label>
          <select name="persona_id" class="form-control form-control-sm selectpicker">
            <option value=''>Seleccione</option>  
            @foreach($personas as $persona)
            <option value="{{ $persona->id }}">{{ $persona->nombres }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label>Extra</label>
          <input type="number" name="costo_compra" class="form-control form-control-sm">
        </div>
        <div class="col-md-2">
          <label>Costo delivery</label>
          <input type="number" name="costo_delivery" class="form-control form-control-sm">
        </div>
        <div class="col-md-2">
          <label>Precio delivery</label>
          <input type="number" name="precio_delivery" class="form-control form-control-sm">
        </div>
        <div class="col-md-2">
          <label>Fecha</label>
          <input type="text" name="fecha" class="form-control form-control-sm" autocomplete="off">
        </div>
        <div class="col-md-2">
          <label>Fecha de Pago</label>
          <input type="text" name="fecha_pago" class="form-control form-control-sm" autocomplete="off">
        </div>
        <div class="col-md-6">
          <label>Observación</label>
          <input type="text" name="observacion" class="form-control form-control-sm" autocomplete="off">
        </div>
        <br>
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Agregar">
      </form>
    </div>
  </div>
  <br>
@endsection