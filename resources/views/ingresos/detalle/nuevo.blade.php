@extends('capas.aplicacion')
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
          <input type="text" name="fecha" class="form-control form-control-sm border-primary border-3" autocomplete="off" required>
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
        <input type="submit" class="btn btn-primary btn-sm" value="Agregar">
      </form>
    </div>
  </div>
  <br>
@endsection