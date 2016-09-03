<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'proveedores';

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
    protected $fillable = ['nombre', 'ruc', 'telefono', 'direccion', 'nombre_contacto'];
}
