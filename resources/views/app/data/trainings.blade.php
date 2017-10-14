@extends('layouts.master')
@section('page-title','Niveis de escolaridade')

@section('content')

	<h2>Niveis de escolaridade</h2>

	<div class="row">
	  	
	  	<div class="col-3">
	  		@include('app.data.menu')
	  	</div>
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/data/training" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col" >
				                <input type="text" name="label" class="form-control" placeholder="Nome do curso" />
				            </div>

				            <div class="col" >
				                <input type="text" name="label" class="form-control" placeholder="Sigla do curso (opcional)" />
				            </div>

				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($trainings as $training)
					<a class="list-group-item" href="/data/training/{{$training->id}}">
				        {{$training->label}}
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection

<li class="list-group-item" >
		                   <form method="post" action="/data/main/addtraining" role="form">
		                   <div class="row" >
		                        <div class="col-lg-4 col-md-4 col-sm-4" >
		                            <input type="text" name="trainingLabel" class="form-control" placeholder="Sigla ou nome do curso" />
		                        </div>
		                        <div class="col-lg-5 col-md-5 col-sm-5" >
		                            <input type="text" name="description" class="form-control" placeholder="Descri&ccedil;&atilde;o" />
		                        </div>
		                        <div class="col-lg-3 col-md-3 col-sm-3" >
		                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar curso</button>
		                        </div>                               
		                   </div>
		                   </form>
		                </li>
		                
						@foreach($trainings as $training)
		                    <li class="list-group-item" >
		                        <div class="row" >
		                            <div class="col-sm-2" >
		                                <a href="/data/trainings/{{$training->id}}" class="btn btn-sm btn-default"><i class="fa fa-pencil-square-o"></i></a> {{$training->label}}
		                            </div>
		                            <div class="col-sm-6" >{{$training->description}}</div>
		                        </div>
		                    </li>
						@endforeach