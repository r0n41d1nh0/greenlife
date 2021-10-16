<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Ingreso;
use App\IngresoDetalle;
use App\Persona;
use App\Producto;
use App\Inventario;
use App\Kardex;
use App\SalidaDetalle;

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
    	$ingreso = Ingreso::create([
			'persona_id' => $request->persona_id,
			'fecha' => $request->fecha
		]);
		return redirect()->route('ingresos.detalle.lista',$ingreso->id )->withSuccess('Operación exitosa');
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
		$detalles = IngresoDetalle::lista()->where('ingreso_detalle.ingreso_id',$id)->get();
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

		$inventarios = Inventario::where('producto_id',$ingreso_detalle->producto_id)->get();
		if (count($inventarios)>0 ){
			$inventario = $inventarios->first();
			$cantidad_inicial = $inventario->cantidad;
			$inventario->cantidad = $inventario->cantidad + $ingreso_detalle->cantidad;
			$inventario->save();
		} else {
			Inventario::create([
				'producto_id' => $request->producto_id,
				'cantidad' => $request->cantidad
			]);
			$cantidad_inicial = 0;
		}

		Kardex::create([
			'producto_id' => $request->producto_id,
			'cantidad' => $request->cantidad,
			'tipo' => 'I',
			'cantidad_inventario' => $cantidad_inicial
		]);

        return redirect()->route('ingresos.detalle.lista',$ingreso_detalle->ingreso_id )->withSuccess('Operación exitosa');
	}

	public function borrar_detalle(Request $request){

		if(SalidaDetalle::where('ingreso_detalle_id',$request->id)->count() > 0) {
			return redirect()->route('ingresos.detalle.lista',$request->ingreso_id )->withErrors('No es posible borrar, el producto tiene movimientos de salida');
		}

		$ingreso_detalle = IngresoDetalle::find($request->id);
		$inventario = Inventario::where('producto_id',$ingreso_detalle->producto_id)->first();
		$cantidad_inicial = $inventario->cantidad;
		$inventario->cantidad = $inventario->cantidad - $ingreso_detalle->cantidad;
		$inventario->save();

		Kardex::create([
			'producto_id' => $ingreso_detalle->producto_id,
			'cantidad' => $ingreso_detalle->cantidad,
			'tipo' => 'R',
			'cantidad_inventario' => $cantidad_inicial
		]);

		IngresoDetalle::where('id',$request->id)->delete();
		return redirect()->route('ingresos.detalle.lista',$request->ingreso_id )->withSuccess('Operación exitosa');
	}

	public function editar_detalle($id)
	{
		$ingreso_detalle = IngresoDetalle::find($id);
		$ingreso = Ingreso::find($ingreso_detalle->ingreso_id);
		$productos = Producto::all();
		$producto = Producto::find($ingreso_detalle->producto_id);
    	return view('ingresos.detalle.editar',compact(['ingreso','ingreso_detalle','productos','producto']));
	}

	public function actualizar_detalle(Request $request)
	{
		if(SalidaDetalle::where('ingreso_detalle_id',$request->id)->count() > 0) {
			return redirect()->route('ingresos.detalle.lista',$request->ingreso_id )->withErrors('No es posible actualizar, el producto tiene movimientos de salida');
		}

		$ingreso_detalle = IngresoDetalle::find($request->id);
		$inventario = Inventario::where('producto_id',$ingreso_detalle->producto_id)->first();
		$cantidad_inicial = $inventario->cantidad;
		$inventario->cantidad = $inventario->cantidad - $ingreso_detalle->cantidad;
		$inventario->save();

		Kardex::create([
			'producto_id' => $ingreso_detalle->producto_id,
			'cantidad' => $ingreso_detalle->cantidad,
			'tipo' => 'R',
			'cantidad_inventario' => $cantidad_inicial
		]);

		IngresoDetalle::where('id',$request->id)->delete();

    	$ingreso_detalle = IngresoDetalle::create([
			'ingreso_id' => $request->ingreso_id,
			'producto_id' => $request->producto_id,
			'cantidad' => $request->cantidad,
			'precio' => $request->precio,
			'dimension' => $request->dimension
		]);

		$inventarios = Inventario::where('producto_id',$ingreso_detalle->producto_id)->get();
		if (count($inventarios)>0 ){
			$inventario = $inventarios->first();
			$cantidad_inicial = $inventario->cantidad;
			$inventario->cantidad = $inventario->cantidad + $ingreso_detalle->cantidad;
			$inventario->save();
		} else {
			Inventario::create([
				'producto_id' => $request->producto_id,
				'cantidad' => $request->cantidad
			]);
			$cantidad_inicial = 0;
		}

		Kardex::create([
			'producto_id' => $request->producto_id,
			'cantidad' => $request->cantidad,
			'tipo' => 'I',
			'cantidad_inventario' => $cantidad_inicial
		]);

        return redirect()->route('ingresos.detalle.lista',$ingreso_detalle->ingreso_id )->withSuccess('Operación exitosa');
	}

}
