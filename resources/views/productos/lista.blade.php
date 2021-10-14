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
  @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div class="alert alert-danger">{{ $error }}</div>
      @endforeach
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Productos</h2>
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm border-primary" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>Descripción</th>
              <th>Presentación</th>
              <th>Precio para venta</th>
              <th class="col-1"></th>
              <th class="col-1"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($productos as $item)
            <tr>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->medida }}</td>
                <td>{{ $item->precio }}</td>
                <td><a href="{{ route('productos.editar', $item->id )}}" class="btn btn-primary btn-sm">Editar</a></td>
                <th>
                  <form action="{{ route('productos.borrar') }}" method="post" onsubmit="return confirm('¿Está seguro de realizar esta acción?');">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <button class="btn btn-primary btn-sm">Borrar</button>
                  </form>
                </th>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>

      


@endsection