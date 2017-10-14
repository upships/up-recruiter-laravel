@extends('layouts.master')
@section('page-title','Funções')

@section('content')

	<h2>Funções</h2>

	<div class="row">
	  	
	  	<div class="col-3">
	  		@include('app.data.menu')
	  	</div>
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/data/position" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col" >
				                <input type="text" name="label" class="form-control" placeholder="Nome da função" />
				            </div>
				            <div class="col" >
				                <input type="text" name="code" class="form-control" placeholder="Código" />
				            </div>
				            <div class="col" >
				                <select name="type" class="form-control" >
				                	<option value="1">De bordo</option>
				                	<option value="2">Onshore</option>
				                </select>
				            </div>

				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($positions as $position)
					<a class="list-group-item" href="/data/position/{{$position->id}}">
						{{$position->label}}
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection