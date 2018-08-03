<?php

namespace sisForrajes;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
   protected $table='categoria';

   protected $primarykey='id';

   public $timestamps=false;

   public $fillable=[
   'nombre',
   'descripcion',
   'condicion'
   ];

  protected $guarded=[
    
   ];

}
