@extends('layouts.master')
@section('page-title','Categorias CIR')

@section('content')

	<h2>Categorias CIR</h2>

	<p>
		As categorias são de acordo com a DPC e são usadas para filtrar os candidatos às vagas de emprego.
	</p>

	<div class="row">
	  	
	  	<div class="col-3">
	  		@include('app.data.menu')
	  	</div>
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/data/seaman_book_type" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col" >
				                <input type="text" name="label" class="form-control" placeholder="Categoria CIR" />
				            </div>
				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($seaman_book_types as $seaman_book_type)
					<a class="list-group-item" href="/data/seaman_book_type/{{$seaman_book_type->id}}">
				        {{$seaman_book_type->code}} {{$seaman_book_type->label}}
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection