@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('productos.lista') }}">Productos</a>
    </li>
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
      <h2>Productos</h2>
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm border-primary" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Descripción</th>
              <th>Presentación</th>
              <th>Precio para venta</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($productos as $item)
            <tr>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->medida }}</td>
                <td>{{ $item->precio }}</td>
                <td><a href="{{ route('productos.editar', $item->id )}}" class="">Editar</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>

      


@endsection