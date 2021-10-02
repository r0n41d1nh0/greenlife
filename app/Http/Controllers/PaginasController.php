<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Salida;

class PaginasController extends Controller
{

  public function home()
	{
		$compras = DB::table('ingreso_detalle')->select(DB::raw('sum(precio*cantidad) total'))->get();		
		$salidas = Salida::lista()->get();

		return view('paginas.home',compact(['compras','salidas']));

	}
}
