@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('ingresos.lista') }}">Compras</a>
    </li>
    <li class="breadcrumb-item">{{ $ingreso->id }}_{{ $ingreso->fecha }}_{{ $proveedor->nombres}}</li>
    <li class="breadcrumb-item"><a href="{{ route('ingresos.nuevo') }}">Nuevo</a></li>
  </ol>
  <hr>
  @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Editar compra</h2>
      <br>
      <form action="{{ route('ingresos.actualizar') }}" method="post">
        @csrf
        <div class="col-md-2">
          <label>Fecha</label>
          <input type="text" name="fecha" class="form-control form-control-sm border-primary border-3" autocomplete="off" value="{{ $ingreso->fecha }}" required>
        </div>
        <div class="col-md-4">
          <label>Proveedor</label>
          <select name="persona_id" class="form-control form-control-sm border-primary border-3" required>
            <option value="">Seleccione</option>  
            @foreach($personas as $persona)
            <option value="{{ $persona->id }}" @if($persona->id==$ingreso->persona_id) selected @endif >{{ $persona->nombres }}</option>
            @endforeach
          </select>
        </div>
        <br>
        <input type="hidden" name="id" value="{{ $ingreso->id }}" >
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Actualizar">
      </form>
    </div>
  </div>
  <br>
@endsection