<?php

namespace sisForrajes;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
   protected $table='detalle_venta';

   protected $primarykey='iddetalle_venta';

   public $timestamps=false;

   public $fillable=[
    'idventa',
    'idarticulo',
    'cantidad',
    'precio_venta',
    'descuento'
   ];

  protected $guarded=[
    
   ];
}
