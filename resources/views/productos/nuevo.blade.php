@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('productos.lista') }}">Productos</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('productos.nuevo') }}">Nuevo</a></li>
  </ol>
  <hr>
  <div class="row">
    <div class="col-12">
      <h2>Nuevo producto</h2>
      <br>
      <form action="{{ route('productos.registrar') }}" method="post">
        @csrf
        <div class="col-md-6">
          <label>Descripción</label>
          <input type="text" name="descripcion" class="form-control form-control-sm" autocomplete="off" required>
        </div>
        <div class="col-md-2">
          <label>Medida</label>
          <select name="medida" class="form-control form-control-sm"  required>
            <option value="Unidad">Unidad</option>
            <option value="Gramos">Gramos</option>
          </select>
        </div>
        <div class="col-md-2">
          <label>Precio para venta</label>
          <input type="number" name="precio" class="form-control form-control-sm" required>
        </div>
        <br>
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Agregar">
      </form>
    </div>
  </div>
  <br>
@endsection