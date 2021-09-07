@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('ingresos.lista') }}">Compras</a>
    </li>
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
      <h2>Compras</h2>
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm border-primary" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Fecha</th>
              <th>Proveedor</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($ingresos as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->fecha }}</td>
                <td>{{ $item->nombres }}</td>
                <td><a href="{{ route('ingresos.editar', $item->id )}}" class="">Editar</a> / <a href="{{ route('ingresos.detalle.lista', $item->id ) }}" class="">Productos</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>

      


@endsection