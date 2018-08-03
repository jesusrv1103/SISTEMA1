<?php

namespace sisForrajes\Http\Controllers;

use Illuminate\Http\Request;
use sisForrajes\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use sisForrajes\Http\Requests\VentaFormRequest;
use sisForrajes\Venta;
use sisForrajes\DetalleVenta;
use sisForrajes\Http\Controllers\Controller;


use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class VentaController extends Controller
{
    public function  __construct()
	{
        $this->middleware('auth');
	}
    public function index(Request $request)
    {
      if($request)
      {
      	$query=trim($request->get('searchText'));
      	$ventas=DB::table('venta as v')
      	->join('persona as p','v.idcliente','=','p.id')
      	->join('detalle_venta as dv','v.id','=','dv.idventa')
      	->select('v.id','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta')
      		->where('v.num_comprobante','LIKE','%'.$query.'%')
      		->orderBy('v.id','desc')
      		->groupBy('v.id','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado')
      		->paginate(7);
      		return view('ventas.venta.index',["ventas"=>$ventas,"searchText"=>$query]);
      }
    }

     public function create()
    {
     $personas=DB::table('persona')->where('tipo_persona','=','Cliente')->get();
     $articulos = DB::table('articulo as art')
      ->join('detalle_ingreso as di','art.id','=',
      'di.idarticulo')
            ->select(DB::raw('CONCAT(art.codigo, " ",art.nombre) AS articulo'),'art.id','art.stock',DB::raw('avg(di.precio_venta) as precio'))
            ->where('art.estado','=','Activo')
            ->where('art.stock','>','0')
            ->groupBy('articulo','art.id','art.stock')
            ->get();
        return view("ventas.venta.create",["personas"=>$personas,"articulos"=>$articulos]);
    }

       public function store (VentaFormRequest $request)
    {
 
         DB::beginTransaction();
         $venta=new Venta;
         $venta->idcliente=$request->get('idcliente');
         $venta->tipo_comprobante=$request->get('tipo_comprobante');
         $venta->serie_comprobante=$request->get('serie_comprobante');
         $venta->num_comprobante=$request->get('num_comprobante');
         $venta->total_venta=$request->get('total_venta');
          $mytime=Carbon::now('America/Mexico_City');
        $venta->fecha_hora=$mytime->toDateTimeString();
         $venta->impuesto='16';
         $venta->estado='A';
         $venta->save();
          $ven =$venta->id;
         
         $idarticulo = $request->get('idarticulo');
         $cantidad = $request->get('cantidad');
         $descuento = $request->get('descuento');
         $precio_venta = $request->get('precio_venta');

         $cont = 0;

         while($cont < count($idarticulo)){
             $detalle = new DetalleVenta();
             $detalle->idventa= $ven;
             $detalle->idarticulo= $idarticulo[$cont];
             $detalle->cantidad= $cantidad[$cont];
             $detalle->descuento= $descuento[$cont];
             $detalle->precio_venta= $precio_venta[$cont];
             $detalle->save();

        

             $cont=$cont+1;            
        
}
         DB::commit();

     

        return Redirect::to('ventas/venta');
    }
    public function  show($id)
    {
    	$venta=DB::table('venta as v')
      	->join('persona as p','v.idcliente','=','p.id')
      	->join('detalle_venta as dv','v.id','=','dv.idventa')
      	->select('v.id','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta')
      		->where('v.id','=',$id)
      		->first();

      		$detalles=DB::table('detalle_venta as d')
      		->join('articulo as a','d.idarticulo','=','a.id')
      		->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
      		->where('d.idventa','=',$id)
          ->get();
      		return view("ventas.venta.show",["venta"=>$venta,"detalles"=>$detalles]);
    }


     public function  pdf($id)
    {
      $venta=DB::table('venta as v')
        ->join('persona as p','v.idcliente','=','p.id')
        ->join('detalle_venta as dv','v.id','=','dv.idventa')
        ->select('v.id','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta')
          ->where('v.id','=',$id)
          ->first();
          $detalles=DB::table('detalle_venta as d')
          ->join('articulo as a','d.idarticulo','=','a.id')
          ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
          ->where('d.idventa','=',$id)
          ->get();
          $view=\View::make("ventas.venta.pdf",["venta"=>$venta,"detalles"=>$detalles])->render();
           $pdf =\App::make('dompdf.wrapper');
           $pdf->loadHTML($view);
        return $pdf->stream('invoice');

    }


  
  
    public function destroy($id)
    {
    	$venta=Venta::findOrFail($id);
    	$venta->Estado='C';
    	$venta->update();
    	return Redirect::to('ventas/venta');
    }



  
   
}
