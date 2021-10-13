@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('salidas.lista') }}">Ventas</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('salidas.nuevo') }}">Nueva venta</a></li>
  </ol>
  <hr>
  @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Ventas</h2>
      <br>
      <div class="table-responsive">
        <table class="table table-bordered table-condensed table-sm border-primary" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Cliente</th>
              <th>Fecha</th>
              <th>Fecha de Pago</th>
              <th>Medio de Pago</th>
              <th>Observación</th>
              <th class="col-1">Extra<br>D</th>
              <th class="col-1">Costo delivery<br>A</th>
              <th class="col-1">Costo agencia<br>B</th>
              <th class="col-1">Precio delivery<br>C</th>
              <th class="col-1" style="background-color:#D3D5DA">Ganacia por pedido</th>
              <th class="col-1" style="background-color:#D3D5DA">Ganacia por delivery<br>C-(A+B)+E</th>
              <th class="col-1">Ganacia Total</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($salidas as $item)
            <tr>
                <td>{{ $item->nombres }}</td>
                
                <td class="col-1">{{ $item->fecha }}</td>
                <td class="col-1">{{ $item->fecha_pago }}</td>
                <td class="col-1">{{ $item->medio_pago }}</td>
                <td>{{ $item->observacion }}</td>
                <td class="col-1">{{ $item->costo_compra }}</td>
                <td class="col-1">{{ $item->costo_delivery }}</td>
                <td class="col-1">{{ $item->costo_agencia }}</td>
                <td class="col-1">{{ $item->precio_delivery }}</td>
                <td class="col-1" style="background-color:#D3D5DA">{{ $item->ganancia }}</td>
                <td class="col-1" style="background-color:#D3D5DA">{{ $item->precio_delivery + $item->costo_compra - $item->costo_delivery - $item->costo_agencia - $item->costo_retorno}}</td>
                <td class="col-1">{{ $item->ganancia + $item->precio_delivery + $item->costo_compra - $item->costo_delivery - $item->costo_agencia - $item->costo_retorno}}</td>
                <td><a href="{{ route('salidas.editar', $item->id )}}" class="">Editar</a> / <a href="{{ route('salidas.detalle.lista', $item->id ) }}" class="">Productos</a></td>
                <td>
                  @if($item->confirmado != 1)
                  <form action="{{ route('salidas.confirmar') }}" method="post" onsubmit="return confirm('¿Está seguro de realizar esta acción?');">
                    @csrf
                    <input type="hidden" name="salida_id" value="{{ $item->id }}">
                    <button class="btn btn-success btn-sm">Confirmar</button>
                  </form>
                  @endif
                </td>
                <td>
                  @if($item->confirmado != 1)
                  <form action="{{ route('salidas.borrar') }}" method="post" onsubmit="return confirm('¿Está seguro de realizar esta acción?');">
                    @csrf
                    <input type="hidden" name="salida_id" value="{{ $item->id }}">
                    <button class="btn btn-primary btn-sm">Borrar</button>
                  </form>
                  @endif
                </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <th colspan="5">Total</th>
            <td>{{ $salidas->sum('costo_compra') }}</td>
            <td>{{ $salidas->sum('costo_delivery') }}</td>
            <td>{{ $salidas->sum('costo_agencia') }}</td>
            <td>{{ $salidas->sum('precio_delivery') }}</td>
            <td>{{ $salidas->sum('ganancia') }}</td>
            <td>{{ $salidas->sum('precio_delivery') + $salidas->sum('costo_compra') - $salidas->sum('costo_delivery') - $salidas->sum('costo_agencia') }}</td>
            <td>{{ $salidas->sum('ganancia') + $salidas->sum('precio_delivery') + $salidas->sum('costo_compra') - $salidas->sum('costo_delivery') - $salidas->sum('costo_agencia') }}</td>
            <td colspan="3"></td>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <br>

      


@endsection