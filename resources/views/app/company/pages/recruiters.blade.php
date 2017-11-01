<div class="row">
	<div class="col-4">
		<h4>Add recruiter</h4>

		<div class="card card-default no-padding">
			<div class="card-block">
				
				<form method="post" action="/company/recruiter" >
					{{csrf_field()}}
					
					<div class="input-group input-group-sm" >
						<input type="email" class="form-control form-control-sm" name="email" placeholder="Recruiter e-mail" />
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-plus" ></i> Add</button>
						</span>
					</div>
					<span class="form-text">The reruiter will receive an e-mail so they can set up their account.</span>
				</form>

			</div>
		</div>
	</div>
	<div class="col">
		<h4>Current recruiters</h4>

		<div class="card card-default no-padding">
			
			@foreach($company->recruiters as $recruiter)
				<div class="card-block">
					<h5>{{$recruiter->user->name}}</h5>
					{{$recruiter->user->email}}
				</div>
			@endforeach
		</div>
	</div>
</div>