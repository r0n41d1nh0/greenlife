<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Vida Verde</title>


    <!-- Bootstrap core CSS -->
	<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	<style>
		.dropdown-menu {
		font-size: 12px;
		}
		.table {
		font-size: 13px;
		}
		.table td,th{
		padding: 0.25rem !important;
		vertical-align: middle !important;
		}

		.breadcrumb {
		box-shadow: 1px 1px #d5d4d4;
		background: #eeeded;
		border: 1px solid #eeeded;
		border-radius: 5px;
		padding: 0 5px 0 10px !important;
		font-size: 16px;
		line-height:2em;
		}

  </style>
  @yield('content.css')
  </head>
	<body>
    
	<main>
	  <div class="container">
		<header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
		  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
			<span class="fs-4 text-success">VIDA VERDE</span>
		  </a>

		  <ul class="nav nav-pills">
			<li class="nav-item"><a href="{{ route('inventario.lista') }}" class="nav-link">Stock</a></li>
			<li class="nav-item"><a href="{{ route('ingresos.lista') }}" class="nav-link">Compras</a></li>
			<li class="nav-item"><a href="{{ route('salidas.lista') }}" class="nav-link">Ventas</a></li>
			<li class="nav-item"><a href="{{ route('productos.lista') }}" class="nav-link">Productos</a></li>
			<li class="nav-item"><a href="{{ route('personas.lista') }}" class="nav-link">Personas</a></li>
		  </ul>
		</header>

        @yield('content')

	  </div>

	</main>


    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	@yield('content.js')
      
  </body>
</html>
