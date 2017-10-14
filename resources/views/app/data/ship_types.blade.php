@extends('layouts.master')
@section('page-title','Tipos de embarcações')

@section('content')

	<h2>Tipos de embarcações</h2>

	<div class="row">
	  	
	  	<div class="col-3">
	  		@include('app.data.menu')
	  	</div>
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/data/ship_type" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col-10" >
				                <input type="text" name="label" class="form-control" placeholder="Tipo de embarcação" />
				            </div>
				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($ship_types as $ship_type)
					<a class="list-group-item" href="/data/ship_type/{{$ship_type->id}}">
				        {{$ship_type->label}}
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection