@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('personas.lista') }}">Personas</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('personas.nuevo') }}">Nuevo</a></li>
  </ol>
  <hr>
  <div class="row">
    <div class="col-12">
      <h2>Nueva persona</h2>
      <br>
      <form action="{{ route('personas.registrar') }}" method="post">
        @csrf
        <div class="col-md-2">
          <label>Categoria</label>
          <select name="categoria" class="form-control form-control-sm border-primary border-3"  required>
            <option value="N">Natural</option>
            <option value="J">Juridica</option>
          </select>
        </div>
        <div class="col-md-2">
          <label>Documento</label>
          <input type="text" name="documento" class="form-control form-control-sm border-primary border-3" autocomplete="off">
        </div>
        <div class="col-md-4">
          <label>Nombres</label>
          <input type="text" name="nombres" class="form-control form-control-sm border-primary border-3" autocomplete="off" required>
        </div>
        <div class="col-md-6">
          <label>Direccion</label>
          <input type="text" name="direccion" class="form-control form-control-sm border-primary border-3" autocomplete="off">
        </div>
        <div class="col-md-2">
          <label>Telefono</label>
          <input type="text" name="telefono" class="form-control form-control-sm border-primary border-3" autocomplete="off">
        </div>
        <div class="col-md-2">
          <label>Tipo</label>
          <select name="tipo" class="form-control form-control-sm border-primary border-3"  required>
            <option value="C">Cliente</option>
            <option value="P">Proveedor</option>
          </select>
        </div>
        <br>
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Agregar">
      </form>
    </div>
  </div>
  <br>
@endsection