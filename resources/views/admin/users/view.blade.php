@extends('admin.layouts.master')
@section('page-title','$user->name')

@section('content')

	<h2>{{$user->name}}</h2>

	@if($user->company)
		<p>{{$user->company->name}}</p>
	@endif
		
	<div class="row">
  		<div class="col-6">

	  		<div class="card card-default" >
				<div class="card-block">
		        	
		        	<form method="post" action="/admin/user/{{$user->id}}" >
		        		{{csrf_field()}}
    					{{method_field('PATCH')}}

						<div class="form-group" >
							<label for="name">Name</label>
				            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$user->name}}" required/>
				        </div>

				        <div class="form-group" >
							<label for="email">Email</label>
				            <input type="email" name="email" class="form-control" placeholder="Email" value="{{$user->email}}" required/>
				        </div>

				        <div class="form-group" >
							<label for="name">Name</label>
				            <select name="company_id" class="form-control" >
				            	@if($user->company)
								<option value="{{$user->company->id}}" >{{$user->company->name}}</option>
								@endif
			            		<option value="" >-- Select another --</option>
			            		@foreach($companies as $company)
			            		<option value="{{$company->id}}" >{{$company->name}}</option>
			            		@endforeach
			            	</select>
				        </div>
						
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-save" ></i> Save
						</button>
					</form>
				</div>
				@if($user->recruiter)
				<div class="card-block">
					<form method="post" action="/admin/recruiter/{{$user->recruiter->id}}" >
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<button type="submit" class="btn btn-danger btn-sm" >Remove company</button>
					</form>
				</div>
				@endif
			</div>
		</div>
	</div>

	

@endsection