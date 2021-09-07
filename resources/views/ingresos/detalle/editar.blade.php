@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('ingresos.lista') }}">Compras</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('ingresos.detalle.lista', $ingreso->id ) }}">{{ $ingreso->id }}_{{ $ingreso->fecha }}_{{ $ingreso->nombres}}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('ingresos.detalle.editar', $ingreso_detalle->id ) }}">{{ $producto->descripcion }}</a></li>
  </ol>
  <hr>
  @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Detalle de compra</h2>
      <form action="{{ route('ingresos.detalle.actualizar') }}" method="post">
        @csrf
        <div class="col-md-4">
          <label>Producto</label>
          <select name="producto_id" class="form-control form-control-sm border-primary border-3" required>
            <option value="">Seleccione</option>  
            @foreach($productos as $producto)
            <option value="{{ $producto->id }}" @if($ingreso_detalle->producto_id == $producto->id) selected @endif >{{ $producto->descripcion }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label>Cantidad</label>
          <input type="number" name="cantidad" class="form-control form-control-sm border-primary border-3" autocomplete="off" value="{{ $ingreso_detalle->cantidad }}" required>
        </div>
        <div class="col-md-2">
          <label>Precio</label>
          <input type="number" name="precio" step="any" class="form-control form-control-sm border-primary border-3" autocomplete="off" value="{{ $ingreso_detalle->precio }}" required>
        </div>
        <div class="col-md-2">
          <label>Dimensión</label>
          <input type="text" name="dimension" class="form-control form-control-sm border-primary border-3" autocomplete="off" value="{{ $ingreso_detalle->dimension }}" required>
        </div>
        <br>
        <input type="hidden" name="ingreso_id" value="{{ $ingreso->id }}">
        <input type="hidden" name="id" value="{{ $ingreso_detalle->id }}">
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Actualizar">
      </form>
    </div>
  </div>
  <br>

@endsection