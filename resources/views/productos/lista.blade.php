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
      <h2>Productos</h2>
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm" id="dataTable" width="100%" cellspacing="0">
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
    </div>
  </div>
  <br>

      


@endsection