@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{$persona->nombre}}</h3>
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
		{!!Form::model($persona,['method'=>'PATCH','route'=>['ventas.cliente.update',$persona->id]])!!}
			{{Form::token()}}
		     <div class="row">
		     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		        	<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" required value="{{$persona->nombre}}" class="form-control" >
					</div>	
			    </div>
		      <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		        	<div class="form-group">
						<label for="direccion">Direccion</label>
						<input type="text" name="direccion"  value="{{$persona->direccion}}" class="form-control" >
					</div>	
		       </div>
		       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		        	<div class="form-group">
						<label for="tipo_documento">Documnento</label>
						<select name="tipo_documento" class="form-control">
						    @if($persona->tipo_documento=='IFE')
						     <option value="IFE" selected>IFE</option>
							<option value="CURP">CURP</option>
							<option value="Pasaporte">Pasaporte</option>
							@elseif($persona->tipo_documento=='CURP')
							<option value="IFE" >IFE</option>
							<option value="CURP" selected>CURP</option>
							<option value="Pasaporte">Pasaporte</option>
							@else
							<option value="IFE" >IFE</option>
							<option value="CURP" >CURP</option>
							<option value="Pasaporte" selected>Pasaporte</option>
							@endif
						</select>
					</div>
		      </div>
		          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		        	<div class="form-group">
						<label for="num_documento">Numero de Docuemnto:</label>
						<input type="text" name="num_documento"  value="{{$persona->num_documento}}" class="form-control" >
					</div>	
		       </div>

		        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		        	<div class="form-group">
						<label for="telefono">Telefono:</label>
						<input type="text" name="telefono"  value="{{$persona->telefono}}" class="form-control" >
					</div>	
		       </div>

		       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
		        	<div class="form-group">
						<label for="email">Email:</label>
						<input type="text" name="email"  value="{{$persona->email}}" class="form-control">
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