<?php

namespace sisForrajes;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
   protected $table='venta';

   protected $primarykey='idventa';

   public $timestamps=false;

   public $fillable=[
    'idcliente',
    'tipo_comprobante',
    'serie_comprobante',
    'num_comprobante',
    'fecha_hora',
    'impuesto',
    'estado'
   ];

  protected $guarded=[

    ];
    
}
