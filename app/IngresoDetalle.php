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
                            'ingreso_detalle.ingreso_id',
                            'ingreso_detalle.producto_id',
                            'ingreso_detalle.cantidad',
                            'ingreso_detalle.precio',
                            'ingreso_detalle.dimension',
                            'producto.descripcion'
                            )
                        ->orderBy('ingreso_detalle.id','desc');
    }

    public static function lista_sin_salida_completa(){
        return IngresoDetalle::join('vw_ingresos_sin_salida_completa','ingreso_detalle.id','=','vw_ingresos_sin_salida_completa.id')
                        ->select(
                            'ingreso_detalle.id',
                            'ingreso_detalle.producto_id',
                            'vw_ingresos_sin_salida_completa.proveedor',
                            'vw_ingresos_sin_salida_completa.fecha_ingreso',
                            'vw_ingresos_sin_salida_completa.producto',
                            'vw_ingresos_sin_salida_completa.precio_venta',
                            'vw_ingresos_sin_salida_completa.dimension',
                            'vw_ingresos_sin_salida_completa.cantidad_ingresada',
                            'vw_ingresos_sin_salida_completa.costo',
                            'vw_ingresos_sin_salida_completa.cantidad_salida',
                            'vw_ingresos_sin_salida_completa.cantidad_separada'
                            )
                        ->orderBy('ingreso_detalle.id','desc');
    }

}
