@extends('layouts.master')
@section('page-title','Dados do sistema')

@section('content')

	<h2>Tipos de documentos</h2>

	<p>
		Estes são os documentos que o Recrutador irá solicitar aos candidatos durante um processo seletivo.
	</p>

	<div class="row">
	  	
	  	<div class="col-3">
	  		@include('app.data.menu')
	  	</div>
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/data/document_type" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col" >
				                <input type="text" name="label" class="form-control" placeholder="Nome do documento" />
				            </div>
				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($document_types as $document_type)
					<a class="list-group-item" href="/data/document_type/{{$document_type->id}}">
				        {{$document_type->label}}
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection