@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('productos.lista') }}">Productos</a>
    </li>
    <li class="breadcrumb-item">{{ $producto->descripcion }}</li>
    <li class="breadcrumb-item"><a href="{{ route('productos.nuevo') }}">Nuevo</a></li>
  </ol>
  <hr>
  @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Editar producto</h2>
      <br>
      <form action="{{ route('productos.actualizar') }}" method="post">
        @csrf
        <div class="col-md-6">
          <label>Descripción</label>
          <input type="text" name="descripcion" class="form-control form-control-sm border-primary border-3" autocomplete="off" value="{{ $producto->descripcion }}" required>
        </div>
        <div class="col-md-2">
          <label>Medida</label>
          <select name="medida" class="form-control form-control-sm border-primary border-3"  required>
            <option value="Unidad" @if($producto->medida=="Unidad") selected @endif >Unidad</option>
            <option value="Gramos" @if($producto->medida=="Gramos") selected @endif >Gramos</option>
          </select>
        </div>
        <div class="col-md-2">
          <label>Precio para venta</label>
          <input type="number" name="precio" class="form-control form-control-sm border-primary border-3" value="{{ $producto->precio }}" required>
        </div>
        <br>
        <input type="hidden" name="id" value="{{ $producto->id }}" >
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Actualizar">
      </form>
    </div>
  </div>
  <br>
@endsection