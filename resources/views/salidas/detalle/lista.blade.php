@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('salidas.lista') }}">Salidas</a>
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
      <h2>Detalle de pedido</h2>
      @if($salida->confirmado != 1)
      <form action="{{ route('salidas.detalle.lista', $salida->id ) }}" method="get">
        
        <div class="col-md-4">
          <label>Producto</label>
          <select name="producto" class="form-control form-control-sm selectpicker" required>
            <option value="">Seleccione</option>  
            @foreach($productos as $producto)
            <option value="{{ $producto->producto_id }}">{{ $producto->descripcion }}</option>
            @endforeach
          </select>
        </div>
        <br>
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Buscar">
      </form>
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm" >
          <thead>
            <tr>
              <th>Proveedor</th>
              <th>Fecha Ingreso</th>
              <th>Producto</th>
              <th>Dimension</th>
              <th>Cant. ingresada</th>
              <th>Costo</th>
              <th>Cant. despachada</th>
              <th>Cant.</th>
              <th>P. Venta</th>
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
                <td><input type="number" name="cantidad" class="form-control form-control-sm" value="1" autocomplete="off" form="{{ $item->id }}" required></td>
                <td><input type="number" name="precio_venta" class="form-control form-control-sm" value="{{ $item->precio_venta }}" autocomplete="off" form="{{ $item->id }}" required></td>
                <td>
                  <form action="{{ route('salidas.detalle.registrar') }}" method="post" id="{{ $item->id }}" onsubmit="return confirm('¿Está seguro de realizar esta acción?');">
                    @csrf
                    <input type="hidden" name="ingreso_detalle_id" value="{{ $item->id }}">
                    <input type="hidden" name="salida_id" value="{{ $salida->id }}">
                    <input type="hidden" name="producto_id" value="{{ $item->producto_id }}">
                    <input type="hidden" name="costo" value="{{ $item->costo }}">
                    <button class="btn btn-outline-primary btn-sm btn-confirm">Agregar a Pedido</button>
                  </form>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm" >
          <thead>
            <tr>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Costo</th>
              <th>Precio de Venta</th>
              <th>Ganancia</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($detalles as $item)
            <tr>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->cantidad }}</td>
                <td>{{ $item->costo }}</td>
                <td>{{ $item->precio_venta }}</td>
                <td>{{ $item->precio_venta - $item->costo}}</td>
                <td>
                  @if($salida->confirmado != 1)
                  <form action="{{ route('salidas.detalle.borrar') }}" method="post" onsubmit="return confirm('¿Está seguro de realizar esta acción?');">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <input type="hidden" name="salida_id" value="{{ $salida->id }}">
                    <button class="btn btn-outline-primary btn-sm btn-confirm">Borrar</button>
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