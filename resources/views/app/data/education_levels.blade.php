@extends('layouts.master')
@section('page-title','Nível de escolaridade')

@section('content')

	<h2>Nível de escolaridade</h2>

	<div class="row">
	  	
	  	<div class="col-3">
	  		@include('app.data.menu')
	  	</div>
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/data/education_level" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col-10" >
				                <input type="text" name="label" class="form-control" placeholder="Nível educacional" />
				            </div>
				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($education_levels as $education_level)
					<a class="list-group-item" href="/data/education_level/{{$education_level->id}}">
				        {{$education_level->label}}
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection