<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='persona';
    public $timestamps=false;

    protected $fillable = ['categoria','documento','nombres','direccion','telefono','tipo'];

}
