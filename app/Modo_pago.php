<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modo_pago extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modo_pagos';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion'];
}
