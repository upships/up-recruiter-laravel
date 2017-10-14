@extends('admin.layouts.master')
@section('page-title','Países')

@section('content')

	<h2>{{$company->name}}</h2>

	<div class="row">
	  	<div class="col-6">

            <div class="card card-default" >
				<div class="card-block">
		        	<form method="post" action="/admin/company/{{$company->id}}" >

		        		{{csrf_field()}}
		        		{{method_field('PATCH')}}

						<div class="form-group" >
							<label for="name">Name</label>
				            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$company->name}}" required/>
				        </div>

						<button type="submit" class="btn btn-primary">
							<i class="fa fa-plus" ></i> Save
						</button>
					</form>
	            </div>
	        </div>

	    	<div class="card card-default" >
				<div class="card-block">
		        	
		        	<div class="list-group" >
			        	@foreach($company->recruiters as $recruiter)
			        	<div class="list-group-item" >
							<a href="/admin/user/{{$recruiter->user->id}}">
						        {{$recruiter->user->name}} ({{$recruiter->user->email}})
							</a>

							<form method="post" action="/admin/recruiter/{{$recruiter->id}}" >
								{{csrf_field()}}
		        				{{method_field('DELETE')}}
		        				<button type="submit" class="btn btn-danger btn-sm" >remove</button>
		        			</form>
						</div>
						@endforeach
					</div>

	            </div>
	        </div>
	    </div>
	</div>
@endsection