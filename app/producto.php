<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'producto';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id_producto';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'precio', 'stock', 'id_categoria', 'id_proveedor', 'precio_unitario', 'precio_venta', 'descuento', 'iva'];

    
}
