<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table='salida';
    public $timestamps=false;

    protected $fillable = ['persona_id','costo_compra','costo_delivery','precio_delivery','fecha','fecha_pago','observacion','confirmado'];

    public static function lista(){
        return Salida::leftjoin('vw_salida_ganancia','salida.id','=','vw_salida_ganancia.id')
                        ->leftjoin('persona','salida.persona_id','=','persona.id')
                        ->select(
                            'salida.id',
                            'salida.persona_id',
                            'salida.costo_compra',
                            'salida.costo_delivery',
                            'salida.precio_delivery',
                            'salida.fecha',
                            'salida.fecha_pago',
                            'salida.observacion',
                            'salida.confirmado',
                            'persona.nombres',
                            'vw_salida_ganancia.costo_total',
                            'vw_salida_ganancia.venta_total',
                            'vw_salida_ganancia.sustrato_total',
                            'vw_salida_ganancia.ganancia'
                            )
                        ->orderBy('salida.id','desc');
    }

}
