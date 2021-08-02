@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('salidas.lista') }}">Salidas</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('salidas.nuevo') }}">Nuevo Pedido</a></li>
  </ol>
  <hr>
  @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Pedidos</h2>
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm border-primary" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Cliente</th>
              <th class="col-1">Extra</th>
              <th class="col-1">Costo delivery</th>
              <th class="col-1">Precio delivery</th>
              <th class="col-1">Ganacia x Prod.</th>
              <th class="col-1">Ganacia Total</th>
              <th>Fecha</th>
              <th>Fecha de Pago</th>
              <th>Observación</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($salidas as $item)
            <tr>
                <td>{{ $item->nombres }}</td>
                <td>{{ $item->costo_compra }}</td>
                <td>{{ $item->costo_delivery }}</td>
                <td>{{ $item->precio_delivery }}</td>
                <td>{{ $item->ganancia }}</td>
                <td>{{ $item->ganancia + $item->precio_delivery + $item->costo_compra - $item->costo_delivery }}</td>
                <td>{{ $item->fecha }}</td>
                <td>{{ $item->fecha_pago }}</td>
                <td>{{ $item->observacion }}</td>
                <td><a href="{{ route('salidas.editar', $item->id )}}" class="">Editar</a> / <a href="{{ route('salidas.detalle.lista', $item->id ) }}" class="">Productos</a></td>
                <td>
                  @if($item->confirmado != 1)
                  <form action="{{ route('salidas.confirmar') }}" method="post" onsubmit="return confirm('¿Está seguro de realizar esta acción?');">
                    @csrf
                    <input type="hidden" name="salida_id" value="{{ $item->id }}">
                    <button class="btn btn-outline-success btn-sm">Confirmar</button>
                  </form>
                  @endif
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <br>

      


@endsection