@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('personas.lista') }}">Personas</a>
    </li>
    <li class="breadcrumb-item">{{ $persona->nombres }}</li>
    <li class="breadcrumb-item"><a href="{{ route('personas.nuevo') }}">Nuevo</a></li>
  </ol>
  <hr>
  @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Editar persona</h2>
      <br>
      <form action="{{ route('personas.actualizar') }}" method="post">
        @csrf
        <div class="col-md-2">
          <label>Categoria</label>
          <select name="categoria" class="form-control form-control-sm border-primary border-3"  required>
            <option value="N" @if($persona->categoria=="N") selected @endif >Natural</option>
            <option value="J" @if($persona->categoria=="J") selected @endif >Juridica</option>
          </select>
        </div>
        <div class="col-md-2">
          <label>Documento</label>
          <input type="text" name="documento" class="form-control form-control-sm border-primary border-3" autocomplete="off" value="{{ $persona->documento }}" >
        </div>
        <div class="col-md-4">
          <label>Nombres</label>
          <input type="text" name="nombres" class="form-control form-control-sm border-primary border-3" autocomplete="off" value="{{ $persona->nombres }}" required>
        </div>
        <div class="col-md-6">
          <label>Direccion</label>
          <input type="text" name="direccion" class="form-control form-control-sm border-primary border-3" autocomplete="off" value="{{ $persona->direccion }}">
        </div>
        <div class="col-md-2">
          <label>Telefono</label>
          <input type="text" name="telefono" class="form-control form-control-sm border-primary border-3" autocomplete="off" value="{{ $persona->telefono }}">
        </div>
        <div class="col-md-2">
          <label>Tipo</label>
          <select name="tipo" class="form-control form-control-sm border-primary border-3"  required>
            <option value="C" @if($persona->tipo=="C") selected @endif >Cliente</option>
            <option value="P" @if($persona->tipo=="P") selected @endif >Proveedor</option>
          </select>
        </div>
        <br>
        <input type="hidden" name="id" value="{{ $persona->id }}" >
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Actualizar">
      </form>
    </div>
  </div>
  <br>
@endsection