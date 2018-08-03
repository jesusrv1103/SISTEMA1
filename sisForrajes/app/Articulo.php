<?php

namespace sisForrajes;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
   protected $table='articulo';

   protected $primarykey='id';

   public $timestamps=false;

   public $fillable=[
   'id_Categoria',
   'codigo',
   'nombre',
   'stock',
   'descripcion',
   'imagen',
   'estado'
   ];

  protected $guarded=[
    
   ];
}
