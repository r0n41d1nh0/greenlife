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
		$productos = Producto::orderBy('descripcion','asc')->get();
    	return view('productos.lista',compact(['productos']));
	}

	public function nuevo()
	{
    	return view('productos.nuevo');
	}

	public function registrar(Request $request)
	{
    	Producto::create([
			'descripcion' => $request->descripcion,
			'medida' => $request->medida,
			'precio' => $request->precio
		]);
        return redirect()->route('productos.lista')->withSuccess('Operación exitosa');
	}

	public function editar($id)
	{
		$producto = Producto::find($id);
    	return view('productos.editar',compact(['producto']) );
	}

	public function actualizar(Request $request){
		$producto=Producto::find($request->id);
		$producto->descripcion = $request->descripcion;
		$producto->medida = $request->medida;
		$producto->precio = $request->precio;
	
        $producto->save(); 
		return redirect()->route('productos.editar',$producto->id)->withSuccess('Operación exitosa');
	}
}
