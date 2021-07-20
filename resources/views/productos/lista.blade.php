@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('productos.lista') }}">Productos</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('productos.lista') }}">Nuevo</a></li>
  </ol>
  <div class="row">
    <div class="col-12">
      <h1>Productos</h1>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Id</th>
          <th>Descripción</th>
          <th>Presentacion</th>
          <th>Precio</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($productos as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->descripcion }}</td>
            <td>{{ $item->medida }}</td>
            <td>{{ $item->precio }}</td>
            <td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection