<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaProducto extends Model
{
    protected $table = "factura_producto";
    protected $primaryKey = 'fapr_id';
}
