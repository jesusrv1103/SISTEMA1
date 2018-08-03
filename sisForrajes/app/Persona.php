<?php

namespace sisForrajes;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    
   protected $table='persona';

   protected $primarykey='id';

   public $timestamps=false;

   public $fillable=[
   'tipo_persona',
   'codigo',
   'nombre',
   'tipo_documento',
   'num_documento',
   'direccion',
   'telefono',
   'email'
   ];

  protected $guarded=[
    
   ];
}
