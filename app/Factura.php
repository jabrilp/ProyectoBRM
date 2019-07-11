<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = "factura";
    protected $primaryKey = 'fact_id';

    public function productos(){
        return $this->belongsToMany('App\Producto', 'factura_producto', 'factura_id', 'producto_id')->withPivot('fapr_cantidad');
    }
}
