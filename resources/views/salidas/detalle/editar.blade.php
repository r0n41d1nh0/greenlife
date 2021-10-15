@extends('capas.aplicacion')
@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('salidas.lista') }}">Ventas</a>
    </li>
    <li class="breadcrumb-item">{{ $salida->id }}_{{ $salida->fecha }}_{!! is_null($salida->persona_id) ?  $salida->observacion : $salida->nombres !!}</li>
    <li class="breadcrumb-item"><a href="{{ route('salidas.detalle.lista', $salida->id ) }}">Detalle</a></li>
    <li class="breadcrumb-item">{{ $item->producto }}</li>
  </ol>

  <hr>
  @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Detalle de venta</h2>
      @if($salida->confirmado != 1)
        <br>
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-sm border-primary" >
            <thead>
                <tr class="text-center">
                <th class="col-1">Prov.</th>
                <th class="col-1">Fec. Ingreso</th>
                <th class="col-1">Producto</th>
                <th>Dimensión</th>
                <th class="col-1">Cant. comprada</th>
                <th class="col-1">Costo compra</th>
                <th class="col-1">Cant. separada</th>
                <th class="col-1">Cant. vendida</th>
                <th class="col-1" style="background-color:#D3D5DA">Cant. disponible</th>
                <th class="col-1">Cant.</th>
                <th class="col-1">Sustrato</th>
                <th class="col-1">P. Venta</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $item->proveedor }}</td>
                    <td>{{ $item->fecha_ingreso }}</td>
                    <td>{{ $item->producto }}</td>
                    <td>{{ $item->dimension }}</td>
                    <td>{{ $item->cantidad_ingresada }}</td>
                    <td>{{ $item->costo }}</td>
                    <td>{{ $item->cantidad_separada }}</td>
                    <td>{{ $item->cantidad_salida - $item->cantidad_separada }}</td>
                    <td style="background-color:#D3D5DA">{{ $item->cantidad_ingresada - $item->cantidad_salida }}</td>
                    <td><input type="number" name="cantidad" class="form-control form-control-sm border border-primary border-3" value="{{ $detalle->cantidad }}" min="1" max="{{ $item->cantidad_ingresada - $item->cantidad_salida }}" autocomplete="off" form="{{ $item->id }}" required></td>
                    <td><input type="number" name="sustrato" class="form-control form-control-sm border border-primary border-3" step="any" value="{{ $detalle->sustrato }}" autocomplete="off" form="{{ $item->id }}" required></td>
                    <td><input type="number" name="precio_venta" class="form-control form-control-sm border border-primary border-3" step="any" value="{{ $detalle->precio_venta }}" autocomplete="off" form="{{ $item->id }}" required></td>
                    <td>
                    <form action="{{ route('salidas.detalle.actualizar') }}" method="post" id="{{ $item->id }}" onsubmit="return confirm('¿Está seguro de realizar esta acción?');">
                        @csrf
                        <input type="hidden" name="id" value="{{ $detalle->id }}">
                        <button class="btn btn-primary btn-sm btn-confirm">Actualizar</button>
                    </form>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
      @endif
    </div>
  </div>
  <br>

      


@endsection