<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Persona;


class PersonasController extends Controller
{

	public function lista()
	{
		$personas = Persona::all();
    	return view('personas.lista',compact(['personas']));
	}

	public function nuevo()
	{
    	return view('personas.nuevo');
	}

	public function registrar(Request $request)
	{
    	Persona::create([
			'categoria' => $request->categoria,
			'documento' => $request->documento,
			'nombres' => $request->nombres,
			'direccion' => $request->direccion,
			'telefono' => $request->telefono,
			'tipo' => $request->tipo
		]);
        return redirect()->route('personas.lista')->withSuccess('Operación exitosa');
	}

	public function editar($id)
	{
		$persona = Persona::find($id);
    	return view('personas.editar',compact(['persona']) );
	}

	public function actualizar(Request $request){
		$persona=Persona::find($request->id);
		$persona->categoria = $request->categoria;
		$persona->documento = $request->documento;
		$persona->nombres = $request->nombres;
		$persona->direccion = $request->direccion;
		$persona->telefono = $request->telefono;
		$persona->tipo = $request->tipo;
	
        $persona->save(); 
		return redirect()->route('personas.editar',$persona->id)->withSuccess('Operación exitosa');
	}
}
