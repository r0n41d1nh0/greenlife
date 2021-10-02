@extends('capas.aplicacion')
@section('content')
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Inicio</li>
  </ol>
  <div class="row">
    <div class="col-md-3">
      <div class="card border-light text-center text-white bg-info mb-3" >
        <div class="card-body">
          <h2>S/.  {{ $compras[0]->total }}</h2>
          <p class="card-text">Gastos en compras</p>
        </div>
        <div class="card-footer"><a href="{{ route('ingresos.lista') }}" class="link-light"> Mas información</a></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-light text-center text-white bg-success mb-3" >
        <div class="card-body">
          <h2>S/. {{ $salidas->sum('ganancia') + $salidas->sum('precio_delivery') + $salidas->sum('costo_compra') - $salidas->sum('costo_delivery') - $salidas->sum('costo_agencia') - $salidas->sum('costo_retorno') }}</h2>
          <p class="card-text">En ganancias</p>
        </div>
        <div class="card-footer"><a href="{{ route('salidas.lista') }}" class="link-light"> Mas información</a></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-light text-center text-white bg-warning mb-3" >
        <div class="card-body">
          <h2>S/. {{ $salidas->sum('venta_total') }}</h2>
          <p class="card-text">En Ventas</p>
        </div>
        <div class="card-footer"><a href="{{ route('salidas.lista') }}" class="link-light"> Mas información</a></div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-light text-center text-white bg-danger mb-3" >
      <div class="card-body">
          <h2>S/. {{ $salidas->sum('costo_delivery') + $salidas->sum('costo_agencia') + $salidas->sum('costo_retorno') }}</h2>
          <p class="card-text">En Costos</p>
        </div>
        <div class="card-footer"><a href="{{ route('salidas.lista') }}" class="link-light"> Mas información</a></div>
      </div>
    </div>
  </div>
@endsection