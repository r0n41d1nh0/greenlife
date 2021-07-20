<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;


class ProductosController extends Controller
{

	public function lista()
	{
		$productos = Producto::all();
    	return view('productos.lista',compact(['productos']));
	}
}
