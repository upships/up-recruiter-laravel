@extends('layouts.master')

@section('page-title','Vagas em aberto')

@section('content')

<div class="row">
  <div class="col">
  	<h2>Edit Company information</h2>

  	<div class="card card-default">
  		<div class="card-block">

			<form method="post" action="/company" role="form" enctype="multipart/form-data" >

				{{csrf_field()}}

				{{method_field('PATCH')}}

				<div class="form-group" >
					<label for="name" >Nome</label>
					<input type="text" class="form-control" name="name" value="{{$company->name}}" />
				</div>

				<div class="form-group" >
					<label for="url" >Main site</label>
					<input type="text" class="form-control" name="url" value="{{$company->url}}" />
				</div>

				<div class="form-group" >
					<label for="logo_file" >Colored logo</label>
					<input type="file" class="form-control" name="logo_file" />
				</div>

				<div class="form-group" >
					<label for="logo_white_file" >White logo</label>
					<input type="file" class="form-control" name="logo_white_file" />
				</div>

        <div class="form-group" >
					<label for="favicon_file" >Favicon</label>
					<input type="file" class="form-control" name="favicon_file" />
				</div>

				<div class="my-3 d-flex justify-content-between">
					<div>
						<button type="submit" class="btn btn-success">
							<i class="fa fa-save" ></i> Save changes
						</button>
					</div>
					<div>
						<a href='/company' class="btn btn-default">
							<i class="fa fa-times" ></i> Cancelar
						</a>
					</div>
				</div>

			</form>
		</div>
	</div>
</div>

@endsection
