@extends('layouts.master')
@section('page-title','Tipos de certificados')

@section('content')

	<h2>Tipos de certificados</h2>

	<div class="row">
	  	
	  	<div class="col-3">
	  		@include('app.data.menu')
	  	</div>
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/data/certificate_type" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col" >
				                <input type="text" name="label" class="form-control" placeholder="Nome do certificado" />
				            </div>
				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($certificate_types as $certificate_type)
					<a class="list-group-item" href="/data/certificate_type/{{$certificate_type->id}}">
				        {{$certificate_type->code}} {{$certificate_type->label}}
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection