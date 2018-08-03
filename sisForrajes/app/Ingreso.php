<?php

namespace sisForrajes;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    protected $table='ingreso';

   protected $primarykey='id';

   public $timestamps=false;

   public $fillable=[
    'idproveedor',
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
