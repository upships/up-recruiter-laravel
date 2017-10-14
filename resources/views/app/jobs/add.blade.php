@extends('layouts.master')
@section('page-title','Vagas em aberto')

@section('content')
	
	<h2>Adicionar nova vaga</h2>

	<form method="post" action="/job" >
		
		{{csrf_field()}}

		<div class="card card-default">
			<div class="card-block">
				<div class="row">
				  	<div class="col">
					    <div class="form-group">
					      <label for="position" >Fun&ccedil;&atilde;o</label>

					      <select class="form-control select2" name="position_id" >
					          <option value="">-- Selecione uma função --</option>

					          @foreach($positions as $position)
					            <option value="{{$position->id}}">{{$position->label}}</option>
					          @endforeach
					      </select>
					    </div>
					</div>

				  	<div class="col">
					    <div class="form-group">
					      <label for="ship_type" >Embarca&ccedil;&atilde;o</label>

					      <select class="form-control select2" name="ship_type_id" >
					          
					          <option value="">-- Selecione um tipo de embarcação --</option>

					          @foreach($ship_types as $ship_type)
					            <option value="{{$ship_type->id}}">{{$ship_type->label}}</option>
					          @endforeach

					      </select>
					    </div>
				  	</div>
				</div>
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-success" >Continuar</button>

				<a href="/job" class="btn btn-default float-right" >Cancelar</a>
			</div>
		</div>
	</form>
@endsection