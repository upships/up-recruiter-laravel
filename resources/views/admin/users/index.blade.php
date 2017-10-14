@extends('admin.layouts.master')
@section('page-title','Países')

@section('content')

	<h2>Países</h2>

	<div class="row">
	  	
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/admin/user" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col" >
				                <input type="text" name="name" class="form-control" placeholder="Name" required/>
				            </div>

							<div class="col" >
				                <input type="email" name="email" class="form-control" placeholder="Email" required/>
				            </div>
				            <div class="col" >
				            	<select name="company_id" class="form-control" >
				            		<option value="" >-- Select one --</option>
				            		@foreach($companies as $company)
				            		<option value="{{$company->id}}" >{{$company->name}}</option>
				            		@endforeach
				            	</select>
				            </div>
				            <div class="col-2" >
				            	<div class="checkbox">
					              <input id="is_recruiter" name="is_recruiter" type="checkbox" value="1" checked="checked">
					              <label for="is_recruiter">Recruiter</label>
					            </div>
				            </div>
				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Add</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($users as $user)
					<a class="list-group-item" href="/admin/user/{{$user->id}}">
				        {{$user->name}} ({{$user->email}})

				        @if($user->company)
				        	<br/>
				       		Company: {{$user->company->name}}
				        @endif
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection