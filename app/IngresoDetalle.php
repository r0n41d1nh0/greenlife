<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngresoDetalle extends Model
{
    protected $table='ingreso_detalle';
    public $timestamps=false;

    protected $fillable = ['ingreso_id','producto_id','cantidad','precio','dimension'];

    public static function lista(){
        return IngresoDetalle::join('producto','ingreso_detalle.producto_id','=','producto.id')
                        ->select(
                            'ingreso_detalle.id',
                            'ingreso_detalle.producto_id',
                            'ingreso_detalle.cantidad',
                            'ingreso_detalle.precio',
                            'ingreso_detalle.dimension',
                            'producto.descripcion'
                            )
                        ->orderBy('ingreso_detalle.id','desc');
    }

}
