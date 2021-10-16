<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Salida;
use App\SalidaDetalle;
use App\IngresoDetalle;
use App\Persona;
use App\Producto;
use App\Inventario;
use App\Kardex;

class SalidasController extends Controller
{
    public function lista()
	{
		$salidas = Salida::lista()->get();
    	return view('salidas.lista',compact(['salidas']));
	}

    public function nuevo()
	{
        $personas = Persona::where('tipo','C')->get();
    	return view('salidas.nuevo',compact(['personas']));
	}

	public function registrar(Request $request)
	{
    	Salida::create([
			'persona_id' => $request->persona_id,
            'costo_compra' => $request->costo_compra,
            'costo_delivery' => $request->costo_delivery,
			'costo_agencia' => $request->costo_agencia,
			'precio_delivery' => $request->precio_delivery,
			'fecha' => $request->fecha,
            'fecha_pago' => $request->fecha_pago,
			'medio_pago' => $request->medio_pago,
            'observacion' => $request->observacion
		]);
        return redirect()->route('salidas.lista')->withSuccess('Operación exitosa');
	}

	public function editar($id)
	{
		$salida = Salida::find($id);
		$personas = Persona::where('tipo','C')->get();
		$cliente = Persona::find($salida->persona_id);
    	return view('salidas.editar',compact(['salida','personas','cliente']) );
	}

	public function actualizar(Request $request){
		$salida=Salida::find($request->id);
		$salida->persona_id = $request->persona_id;
        $salida->costo_compra = $request->costo_compra;
        $salida->costo_delivery = $request->costo_delivery;
		$salida->costo_agencia = $request->costo_agencia;
		$salida->precio_delivery = $request->precio_delivery;
		$salida->fecha = $request->fecha;
        $salida->fecha_pago = $request->fecha_pago;
		$salida->medio_pago = $request->medio_pago;
        $salida->observacion = $request->observacion;
	
        $salida->save(); 
		return redirect()->route('salidas.editar',$salida->id)->withSuccess('Operación exitosa');
	}

	public function lista_detalle($id,Request $request)
	{
		$ingreso_detalle=[];
		$salida = Salida::lista()->where('salida.id',$id)->first();
		$detalles = SalidaDetalle::lista()->where('salida_detalle.salida_id',$id)->get();
		$productos = Inventario::lista()->get();
		if (isset($request->producto)) {
			$ingreso_detalle = IngresoDetalle::lista_sin_salida_completa()->where('ingreso_detalle.producto_id',$request->producto)->get();
		}
    	return view('salidas.detalle.lista',compact(['salida','productos','ingreso_detalle','detalles']));
	}

	public function registrar_detalle(Request $request)
	{
    	$salida_detalle = SalidaDetalle::create([
			'salida_id' => $request->salida_id,
			'producto_id' => $request->producto_id,
			'cantidad' => $request->cantidad,
			'costo' => $request->costo,
			'sustrato' => $request->sustrato,
			'precio_venta' => $request->precio_venta,
			'ingreso_detalle_id' => $request->ingreso_detalle_id
		]);

		
        return redirect()->route('salidas.detalle.lista',$salida_detalle->salida_id )->withSuccess('Operación exitosa');
	}

	public function borrar_detalle(Request $request){
		SalidaDetalle::where('id',$request->id)->delete();
		return redirect()->route('salidas.detalle.lista',$request->salida_id )->withSuccess('Operación exitosa');
	}

	public function confirmar(Request $request){
		$detalles = SalidaDetalle::lista()->where('salida_detalle.salida_id',$request->salida_id)->get();

		foreach($detalles as $detalle){
			$cantidad_inicial=0;
			$inventario = Inventario::where('producto_id',$detalle->producto_id)->first();
			$cantidad_inicial = $inventario->cantidad;
			$inventario->cantidad = $inventario->cantidad - $detalle->cantidad;
			$inventario->save();

			Kardex::create([
				'producto_id' => $detalle->producto_id,
				'cantidad' => $detalle->cantidad,
				'tipo' => 'S',
				'cantidad_inventario' => $cantidad_inicial
			]);
		}

		$salida=Salida::find($request->salida_id);
		$salida->confirmado=1;
		$salida->save();
		return redirect()->route('salidas.lista')->withSuccess('Operación exitosa');
	}

	public function borrar(Request $request)
	{
		$salida=Salida::find($request->salida_id);
		if($salida->confirmado==1){
			return redirect()->route('salidas.lista')->withErrors('Salida fue confirmada');
		}

		SalidaDetalle::where('salida_id',$request->salida_id)->delete();

		$salida->delete();
		return redirect()->route('salidas.lista')->withSuccess('Operación exitosa');
	}

	public function editar_detalle($id)
	{
		$detalle = SalidaDetalle::find($id);
		$salida = Salida::lista()->where('salida.id',$detalle->salida_id)->first();
		$item = IngresoDetalle::lista_ingresos()->where('ingreso_detalle.id',$detalle->ingreso_detalle_id)->first();
	
    	return view('salidas.detalle.editar',compact(['salida','item','detalle']));
	}

	public function actualizar_detalle(Request $request){

		$detalle = SalidaDetalle::find($request->id);
		$detalle->cantidad = $request->cantidad;
		$detalle->sustrato = $request->sustrato;
		$detalle->precio_venta = $request->precio_venta;
		$detalle->save();
		return redirect()->route('salidas.detalle.lista',$detalle->salida_id )->withSuccess('Operación exitosa');
	}
}