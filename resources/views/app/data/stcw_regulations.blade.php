@extends('layouts.master')
@section('page-title','Regras STCW')

@section('content')

	<h2>Regras STCW</h2>

	<div class="row">
	  	
	  	<div class="col-3">
	  		@include('app.data.menu')
	  	</div>
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/data/stcw_regulation" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col" >
				                <input type="text" name="regulation" class="form-control" placeholder="Nome da regra" />
				            </div>
				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($stcw_regulations as $stcw_regulation)
					<a class="list-group-item" href="/data/stcw_regulation/{{$stcw_regulation->id}}">
				        {{$stcw_regulation->regulation}}
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection