<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table='inventario';
    public $timestamps=false;

    protected $fillable = ['producto_id','cantidad'];

    public static function lista(){
        return Inventario::join('producto','inventario.producto_id','=','producto.id')
                        ->select(
                            'inventario.id',
                            'inventario.producto_id',
                            'inventario.cantidad',
                            'producto.descripcion',
                            'producto.precio'
                            )
                        ->where('inventario.cantidad','>','0')
                        ->orderBy('inventario.id','desc');
    }

}
