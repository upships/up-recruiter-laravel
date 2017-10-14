@extends('layouts.master')
@section('page-title','Posicionamento Dinâmico')

@section('content')

	<h2>Posicionamento Dinâmico</h2>

	<div class="row">
	  	
	  	<div class="col-3">
	  		@include('app.data.menu')
	  	</div>
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/data/dp_type" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col" >
				                <input type="text" name="label" class="form-control" placeholder="Tipo de DP" />
				            </div>
				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($dp_types as $dp_type)
					<a class="list-group-item" href="/data/dp_type/{{$dp_type->id}}">
				        {{$dp_type->label}}
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection