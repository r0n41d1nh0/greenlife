<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
    protected $table='kardex';
    public $timestamps=false;

    protected $fillable = ['producto_id','cantidad','tipo','cantidad_inventario'];

}
