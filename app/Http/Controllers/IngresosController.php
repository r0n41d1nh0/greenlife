<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Ingreso;
use App\IngresoDetalle;
use App\Persona;
use App\Producto;

class IngresosController extends Controller
{

	public function lista()
	{
		$ingresos = Ingreso::lista()->get();
    	return view('ingresos.lista',compact(['ingresos']));
	}

	public function nuevo()
	{
        $personas = Persona::where('tipo','P')->get();
    	return view('ingresos.nuevo',compact(['personas']));
	}

	public function registrar(Request $request)
	{
    	Ingreso::create([
			'persona_id' => $request->persona_id,
			'fecha' => $request->fecha
		]);
        return redirect()->route('ingresos.lista')->withSuccess('Operación exitosa');
	}

	public function editar($id)
	{
		$ingreso = Ingreso::find($id);
		$personas = Persona::where('tipo','P')->get();
		$proveedor = Persona::find($ingreso->persona_id);
    	return view('ingresos.editar',compact(['ingreso','personas','proveedor']) );
	}

	public function actualizar(Request $request){
		$ingreso=Ingreso::find($request->id);
		$ingreso->persona_id = $request->persona_id;
		$ingreso->fecha = $request->fecha;
	
        $ingreso->save(); 
		return redirect()->route('ingresos.editar',$ingreso->id)->withSuccess('Operación exitosa');
	}

	public function lista_detalle($id)
	{
		$ingreso = Ingreso::lista()->where('ingreso.id',$id)->first();
		$detalles = IngresoDetalle::lista()->get();
		$productos = Producto::all();
    	return view('ingresos.detalle.lista',compact(['ingreso','productos','detalles']));
	}

	public function registrar_detalle(Request $request)
	{
    	$ingreso_detalle = IngresoDetalle::create([
			'ingreso_id' => $request->ingreso_id,
			'producto_id' => $request->producto_id,
			'cantidad' => $request->cantidad,
			'precio' => $request->precio,
			'dimension' => $request->dimension
		]);

        return redirect()->route('ingresos.detalle.lista',$ingreso_detalle->ingreso_id )->withSuccess('Operación exitosa');
	}

	public function borrar_detalle(Request $request){
		IngresoDetalle::where('id',$request->id)->delete();
		return redirect()->route('ingresos.detalle.lista',$request->ingreso_id )->withSuccess('Operación exitosa');
	}
}
