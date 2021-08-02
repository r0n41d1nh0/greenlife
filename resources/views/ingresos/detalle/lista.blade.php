@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ route('ingresos.lista') }}">Ingresos</a>
    </li>
    <li class="breadcrumb-item">{{ $ingreso->id }}_{{ $ingreso->fecha }}_{{ $ingreso->nombres}}</li>
    <li class="breadcrumb-item"><a href="{{ route('ingresos.detalle.lista', $ingreso->id ) }}">Detalle</a></li>
  </ol>
  <hr>
  @if(Session::has('success'))
    <div class="alert alert-success">
      {{Session::get('success')}}
    </div>
  @endif
  <div class="row">
    <div class="col-12">
      <h2>Detalle de ingreso</h2>
      <form action="{{ route('ingresos.detalle.registrar') }}" method="post">
        @csrf
        <div class="col-md-4">
          <label>Producto</label>
          <select name="producto_id" class="form-control form-control-sm selectpicker" required>
            <option value="">Seleccione</option>  
            @foreach($productos as $producto)
            <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <label>Cantidad</label>
          <input type="number" name="cantidad" class="form-control form-control-sm" autocomplete="off" required>
        </div>
        <div class="col-md-2">
          <label>Precio</label>
          <input type="number" name="precio" class="form-control form-control-sm" autocomplete="off" required>
        </div>
        <div class="col-md-2">
          <label>Dimensión</label>
          <input type="text" name="dimension" class="form-control form-control-sm" autocomplete="off" required>
        </div>
        <br>
        <input type="hidden" name="ingreso_id" value="{{ $ingreso->id }}">
        <input type="submit" class="btn btn-primary btn-sm btn-confirm" value="Agregar">
      </form>
      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-sm border-primary" >
          <thead>
            <tr>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Precio</th>
              <th>Dimensión</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($detalles as $item)
            <tr>
                <td>{{ $item->descripcion }}</td>
                <td>{{ $item->cantidad }}</td>
                <td>{{ $item->precio }}</td>
                <td>{{ $item->dimension }}</td>
                <td>
                  <form action="{{ route('ingresos.detalle.borrar') }}" method="post" onsubmit="return confirm('¿Está seguro de realizar esta acción?');">
                    @csrf
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <input type="hidden" name="ingreso_id" value="{{ $ingreso->id }}">
                    <button class="btn btn-outline-primary btn-sm btn-confirm">Borrar</button>
                  </form>
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