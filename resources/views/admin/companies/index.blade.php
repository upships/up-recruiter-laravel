@extends('admin.layouts.master')
@section('page-title','Companies')

@section('content')

	<h2>Companies</h2>

	<div class="row">
	  	
	  	<div class="col">

		  	<div class="list-group" >
				<div class="list-group-item">
			        
			        <form method="post" action="/admin/company" >
			            
			            {{csrf_field()}}

						<div class="row" >
							<div class="col" >
				                <input type="text" name="name" class="form-control" placeholder="Name" required/>
				            </div>

							<div class="col" >
				                <input type="file" name="logo" class="form-control" placeholder="Choose a logo" />
				            </div>

				            <div class="col-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Add</button>
				            </div>
				        </div>
			    	</form>
				</div>
				
				@foreach($companies as $company)
					<a class="list-group-item" href="/admin/company/{{$company->id}}">
				        <p>{{$company->name}}</p>
					</a>
				@endforeach
			</div>
		</div>
	</div>
@endsection