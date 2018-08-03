<?php

namespace sisForrajes;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
   protected $table='detalle_ingreso';

   protected $primarykey='iddetalle_ingreso';

   public $timestamps=false;

   public $fillable=[
    'idingreso',
    'idarticulo',
    'cantidad',
    'precio_compra',
    'precio_venta'
   ];

  protected $guarded=[
    
   ];
}
