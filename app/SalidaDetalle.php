<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalidaDetalle extends Model
{
    protected $table='salida_detalle';
    public $timestamps=false;

    protected $fillable = ['salida_id','producto_id','cantidad','costo','precio_venta','ingreso_detalle_id'];

    public static function lista(){
        return SalidaDetalle::join('producto','salida_detalle.producto_id','=','producto.id')
                        ->select(
                            'salida_detalle.id',
                            'salida_detalle.salida_id',
                            'salida_detalle.producto_id',
                            'salida_detalle.cantidad',
                            'salida_detalle.costo',
                            'salida_detalle.precio_venta',
                            'salida_detalle.ingreso_detalle_id',
                            'producto.descripcion',
                            'producto.precio'
                            )
                        ->orderBy('salida_detalle.id','desc');
    }

}
