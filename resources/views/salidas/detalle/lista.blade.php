@extends('capas.aplicacion')
@section('content')

  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('salidas.lista') }}">Ventas</a>
    </li>
    <li class="breadcrumb-item">{{ $salida->id }}_{{ $salida->fecha }}_{!! is_null($salida->persona_id) ?  $salida->observacion : $salida->nombres !!}</li>
    <li class="breadcrumb-item"><a href="{{ route('salidas.detalle.lista', $salida->id ) }}">Detalle</a></li>
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
      <form action="{{ route('salidas.detalle.lista', $salida->id ) }}" method="get">
        
        <div class="col-md-4">
          <label>Producto</label>
          <select name="producto" class="form-control form-control-sm border border-primary border-3" required>
            <option value="">Seleccione</option>  
            @foreach($productos as $producto)
            <option value="{{ $producto->producto_id }}">{{ $producto->descripcion }}</option>
            @endforeach
          </select>
        </div>
        <br>
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Buscar">
      </form>
      @empty($ingreso_detalle)
      @else
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm border-primary" >
          <thead>
            <tr>
              <th>Prov.</th>
              <th>Fec. Ingreso</th>
              <th>Producto</th>
              <th>Dimensión</th>
              <th class="col-1">Cant. comprada</th>
              <th class="col-1">Costo compra</th>
              <th class="col-1">Cant. separada</th>
              <th class="col-1">Cant. disponible</th>
              <th class="col-1">Cant.</th>
              <th class="col-1">Sustrato</th>
              <th class="col-1">P. Venta</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($ingreso_detalle as $item)
            <tr>
                <td>{{ $item->proveedor }}</td>
                <td>{{ $item->fecha_ingreso }}</td>
                <td>{{ $item->producto }}</td>
                <td>{{ $item->dimension }}</td>
                <td>{{ $item->cantidad_ingresada }}</td>
                <td>{{ $item->costo }}</td>
                <td>{{ $item->cantidad_salida }}</td>
                <td>{{ $item->cantidad_ingresada - $item->cantidad_salida }}</td>
                <td><input type="number" name="cantidad" class="form-control form-control-sm border border-primary border-3" value="1" min="1" max="{{ $item->cantidad_ingresada - $item->cantidad_salida }}" autocomplete="off" form="{{ $item->id }}" required></td>
                <td><input type="number" name="sustrato" class="form-control form-control-sm border border-primary border-3" step="any" value="0" autocomplete="off" form="{{ $item->id }}" required></td>
                <td><input type="number" name="precio_venta" class="form-control form-control-sm border border-primary border-3" step="any" value="{{ $item->precio_venta }}" autocomplete="off" form="{{ $item->id }}" required></td>
                <td>
                  <form action="{{ route('salidas.detalle.registrar') }}" method="post" id="{{ $item->id }}" onsubmit="return confirm('¿Está seguro de realizar esta acción?');">
                    @csrf
                    <input type="hidden" name="ingreso_detalle_id" value="{{ $item->id }}">
                    <input type="hidden" name="salida_id" value="{{ $salida->id }}">
                    <input type="hidden" name="producto_id" value="{{ $item->producto_id }}">
                    <input type="hidden" name="costo" value="{{ $item->costo }}">
                    <button class="btn btn-primary btn-sm btn-confirm">Agregar a Pedido</button>
                  </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endempty
      @endif
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm border-primary" >
          <thead>
            <tr>
              <th>Producto</th>
              <th class="col-1">Cantidad</th>
              <th class="col-1">Costo</th>
              <th class="col-1">Costo Total</th>
              <th class="col-1">Sustrato</th>
              <th class="col-1">Sustrato Total</th>
              <th class="col-1">P. Venta</th>
              <th class="col-1">Venta Total</th>
              <th class="col-1">Ganancia</th>
              <th class="col-1"></th>
              <th class="col-1"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($detalles as $item)
            <tr>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->cantidad }}</td>
                <td>{{ $item->costo }}</td>
                <td>{{ $item->costo*$item->cantidad }}</td>
                <td>{{ $item->sustrato }}</td>
                <td>{{ $item->sustrato*$item->cantidad }}</td>
                <td>{{ $item->precio_venta }}</td>
                <td>{{ $item->precio_venta*$item->cantidad }}</td>
                <td>{{ $item->precio_venta*$item->cantidad - $item->costo*$item->cantidad - $item->sustrato*$item->cantidad }}</td>
                <td></td>
                <td>
                  @if($salida->confirmado != 1)
                  <form action="{{ route('salidas.detalle.borrar') }}" method="post" onsubmit="return confirm('¿Está seguro de realizar esta acción?');">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <input type="hidden" name="salida_id" value="{{ $salida->id }}">
                    <button class="btn btn-primary btn-sm btn-confirm">Borrar</button>
                  </form>
                  @endif
                </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>Total</th>
              <td>{{ $detalles->sum('cantidad') }}</td>
              <td>{{ $detalles->sum('costo') }}</td>
              <th>{{ $salida->costo_total }}</th>
              <td>{{ $detalles->sum('sustrato') }}</td>
              <th>{{ $salida->sustrato_total }}</th>
              <td>{{ $detalles->sum('precio_venta') }}</td>
              <th>{{ $salida->venta_total }}</th>
              <th>{{ $salida->ganancia }}</th>
              <th></th>
              <th></th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <br>

      


@endsection