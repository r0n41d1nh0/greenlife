<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table='ingreso';
    public $timestamps=false;

    protected $fillable = ['persona_id','fecha'];

    public static function lista(){
        return Ingreso::join('persona','ingreso.persona_id','=','persona.id')
                        ->select(
                            'ingreso.id',
                            'ingreso.persona_id',
                            'ingreso.fecha',
                            'persona.nombres'
                            )
                        ->orderBy('ingreso.id','desc');
    }

}
