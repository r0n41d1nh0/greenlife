<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Inventario;


class InventarioController extends Controller
{

	public function lista()
	{
		$productos = Inventario::lista()->where('inventario.cantidad','>',0)->orderBY('producto.descripcion','asc')->get();
    	return view('inventario.lista',compact(['productos']));
	}

}
