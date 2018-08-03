@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar articulo: {{$articulo->nombre}}</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		   </div>
		 </div>
		{!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->id], 'files'=>'true'])!!}
			{{Form::token()}}
			<div class="row">
		     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		        	<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" required value="{{$articulo->nombre}}" class="form-control" >
					</div>	
		      </div>
		    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		     	  <div class="form-group">
		     	  	 <label>Categoria</label>
		     	  	 <select name="id_Categoria" class="form-control">
		     	  	 	@foreach($categorias as $cat)
		     	  	 	@if($cat->id==$articulo->id_Categoria)
		     	  	 	<option value="{{$cat->id}}" selected>
		     	  	 		{{$cat->nombre}}
		     	  	 	</option>
		     	  	 	@else
		     	  	 	<option value="{{$cat->id}}">
		     	  	 		{{$cat->nombre}}
		     	  	 	</option>
		     	  	 	@endif
		     	  	 	@endforeach
		     	  	 </select>
		     	  </div>
		     </div>
		     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		     		<div class="form-group">
						<label for="codigo">Codigo</label>
						<input type="text" name="codigo" required value="{{$articulo->codigo}}" class="form-control" ">
					</div>	
		     </div>
		      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		     	 <div class="form-group">
		     		<label for="stock">Stock</label>
		     		<input type="text" name="stock" required value="{{$articulo->stock}}" class="form-control" >
		     	 </div>
		     </div>
             <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
               <div class="form-group">
		     		<label for="Descripcion">Descripcion</label>
		     		<input type="text" name="descripcion" required value="{{$articulo->descripcion}}"" class="form-control" >
		     	</div>
		   	  </div>

		   	  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		   	    <div class="form-group">
		     	<label for="imagen">Imagen</label>
		     	<input type="file" name="imagen" class="form-control">
		     	@if(($articulo->imagen)!="")
		     	 <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="150px" width="150px">
		     	@endif
		     </div>
		     </div>
		      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
              <div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
		     </div>
		    </div>
			{!!Form::close()!!}
		
@endsection