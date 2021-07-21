@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('personas.lista') }}">Personas</a>
    </li>
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
      <h2>Personas</h2>
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Categoria</th>
              <th>Documento</th>
              <th>Nombres</th>
              <th>Dirección</th>
              <th>Teléfono</th>
              <th>Tipo</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($personas as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>@if($item->categoria=="N") Natural @else Juridica @endif</td>
                <td>{{ $item->documento }}</td>
                <td>{{ $item->nombres }}</td>
                <td>{{ $item->direccion }}</td>
                <td>{{ $item->telefono }}</td>
                <td>@if($item->tipo=="C") Cliente @else Proveedor @endif</td>
                <td><a href="{{ route('personas.editar', $item->id )}}" class="">Editar</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>

      


@endsection