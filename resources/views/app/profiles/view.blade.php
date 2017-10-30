@extends('layouts.master')

@section('page-title')
	{{$profile->name}}
@endsection

@section('content')

<div class="row">
	<div class="col">
      	
      	<div class="card card-default no-padding">
      		<div class="card-block">
    			
    			<h2>{{$profile->name}}</h2>
        		
        		<h5 class="d-flex" >
        			<span class="mr-4" >
        				{{$profile->position->label}}
        			</span>
        			<span>
        				{{$profile->location}}
        			</span>
        		</h5>

        		<div class="my-2 mb-4">
        			<toolbar-item icon="envelope-o"></i> {{$profile->user->email}}</toolbar-item>
			      	<toolbar-item icon="mobile"></i> {{$profile->phone}}</toolbar-item>
			      	<toolbar-item icon="venus-mars"></i> {{$profile->gender_label}}</toolbar-item>
			    </div>
    			
    			<div class="my-2">
		      		<toolbar-item link="/conversation/add?recipients={{$profile->user->id}}" icon="envelope" >Message</toolbar-item>
		      		<toolbar-item link="/profile/{{$profile->user->id}}/add_to_selection" icon="plus" >Add to Selection</toolbar-item>

		      		<div class="dropdown dropdown-default float-right">
                        <button class="btn btn-tag btn-tag-light btn-tag-rounded dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-external-link"></i> Export 
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" :href='"/profile/" + profile.id + "/export"'>PDF</a>
                            <a class="dropdown-item" :href='"/profile/" + profile.id + "/export?mode=anonymous"'>Anonimous PDF</a>
                        </div>
                    </div>
			    </div>
			</div>
		</div>

      	<div class="panel panel-default">
        	
        	<div class="panel-block"> 

	          	<ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
		            <li class="nav-item">
		              <a class="active" data-toggle="tab" role="tab" data-target="#tab-start" href="#">Professional &amp; Certificates</a>
		            </li>

		            <li class="nav-item">
		              <a href="#" data-toggle="tab" role="tab" data-target="#tab-personal">Personal Data</a>
		            </li>

		            <li class="nav-item">
		              <a href="#" data-toggle="tab" role="tab" data-target="#tab-documents">Documents</a>
		            </li>

		            <li class="nav-item">
		              <a href="#" data-toggle="tab" role="tab" data-target="#tab-applications">Applications</a>
		            </li>
		            
	          	</ul>

	          	<div v-if="isLoaded" >

		            <div class="tab-content"> 
		              	
		              	<div id="tab-start" class="tab-pane active">

		              		@if($profile->introduction)
		                	<div class="row" >
		                  		<div class="col">
			                      	<p>
			                          {{$profile->introduction}}
			                      	</p>
				                </div>
				            </div>
				           	@endif

				           	

					           	<h3>Seafarer Information</h3>

					           	<div class="row" >
					           		<div class="col">
					           			<h4>CoC</h4>

					           			<profile-coc :coc="profile.coc" ></profile-coc>
					           		</div>

					           		<div class="col">
					           			<h4>CoE's</h4>

					           			<profile-coes>
					           				<profile-coe v-for="coe in profile.coes" :coe="coe" :key="coe.id" ></profile-coc>
					           			</profile-coe>
					           		</div>

					           		<div class="col" v-if="profile.dp" >
					           			<h4>Dynamic Positioning</h4>

					           			<profile-dp>
					           				<profile-dp-item v-for="dp in profile.dp" :dp="dp" :key="dp.id" ></profile-dp-item>
					           			</profile-dp>
					           		</div>
					           	</div>

					           	<div class="row" >
					           		<div class="col">
					           			<h4>Seaman Book / SDB</h4>
					           					
			           					<profile-seaman-books>
			           						<profile-seaman-book v-for="seaman_book in profile.seaman_books" :seaman_book="seaman_book" :key="seaman_book.id" ></profile-seaman-book>
			           					</profile-seaman-books>
					           		</div>
					           	</div>

					           	<div class="row">

					           		<div class="col">
					           			<h4>Languages</h4>

					           			<profile-languages :language="profile.native_language" >

					           				<profile-language v-for="language in profile.languages"  :language="language" :key="language.id" ></profile-language>

					           			</profile-languages>
					           		</div>
					           	
					           		<div class="col">
					           			<h4>Experience on Ships</h4>

					           			<profile-ships>
					           				<profile-ship v-for="ship in profile.ships" :ship="ship" :key="ship.id" ></profile-ship>
					           			</profile-ships>
					           		</div>

					           	</div>

					           	<div class="row">
			                  		<div class="col">

			                  			<h3>Professional Experience</h3>

			                  			<profile-works>
			                  				<profile-work v-for="work in profile.works" :work="work" :key="work.id" ></profile-work>
			                  			</profile-works>

			                  		</div>
			                  		<div class="col">
			                  			
			                  			<h3>Certificates</h3>

			                  			<profile-certificates>
			                  				<profile-certificate v-for="certificate in profile.certificates" :certificate="certificate" :key="certificate.id" ></profile-certificate>
			                  			</profile-certificates>

			                  			<h3>Education</h3>

			                  			<profile-education>
					                        <profile-education-item v-for="education in profile.education" :education="profile.education" :key="education.id" ></profile-education-item>
					                    </profile-education>

			                  		</div>
			                  	</div>

		                </div>

		              	<div id="tab-personal" class="tab-pane">

		                	<h3>Personal Data</h3>

			                <div class="row">
			                  	<div class="col">

			                    	<h4>Basic info</h4>

			                    	<div class="card card-default no-padding">
			                    		<div class="list-group list-group-flush">
			                    			<div class="list-group-item">
			                    				<span class="mr-2">Birthday</span>
			                    				<span class="mr-2 bold">@{{profile.birth_date}} (@{{profile.age}} y/o)</span>
			                    			</div>
			                    		
			                    			<div class="list-group-item">
			                    				<span class="mr-2">Marital status</span>
			                    				<span class="mr-2 bold">@{{profile.marital_status_label}}</span>
			                    			</div>

			                    			<div class="list-group-item">
			                    				<span class="mr-2">Nationality</span>
			                    				<span class="mr-2 bold">@{{profile.nationality.name}} <span v-html="profile.nationality.icon"></span></span>
			                    			</div>
			                    		</div>
			                    	</div>
			                    </div>

				                <div class="col">

				                	<h4>Contact info</h4>

				                    <div class="card card-default no-padding">
			                    		<div class="list-group list-group-flush">
			                    			<div class="list-group-item" >
			                    				<span>Email: @{{profile.user.email}}</span>
			                    			</div>
			                    			<div class="list-group-item" >
			                    				<span>Modile: @{{profile.phone}}</span>
			                    			</div>
			                    			<div class="list-group-item" >
			                    				<span>Other phone: @{{profile.other_phone}}</span>
			                    			</div>
			                    		</div>
			                    	</div>
			                    </div>
			                    <div class="col">
			                    	<h4>Location</h4>

				                    <div class="card card-default no-padding">
			                    		<div class="list-group list-group-flush">
			                    			<div class="list-group-item" >
			                    				<span>@{{profile.address}}</span>
			                    			</div>

			                    			<div class="list-group-item" >
			                    				<span>@{{profile.city}} - @{{profile.state}}</span>
			                    			</div>

			                    			<div class="list-group-item" >
			                    				<span><i v-html="profile.country.icon"></i>  @{{profile.country.name}}</span>
			                    			</div>
			                    		</div>
			                    	</div>
			                	</div>
			                </div>

			                <div class="row">
			                  	
			                  	<div class="col" >

			                    	<h4>Passports</h4>

			                    	<div class="card card-default no-padding">
			                    		<div class="list-group list-group-flush">
			                    			<div class="list-group-item" v-for="passport in profile.passports" >
			                    				<span><i v-html="passport.country.icon"></i> @{{passport.country.name}}</span>
			                    				<span>Expires @{{passport.expiration_date}}</span>
			                    			</div>
			                    		</div>
			                    	</div>
			                    </div>
			                    <div class="col" >
			                    	<div v-if="profile.visas" >

			                    		<h4>Visas</h4>

				                    	<div class="card card-default no-padding">
				                    		<div class="list-group list-group-flush">
				                    			<div class="list-group-item" v-for="visa in profile.visas" >
				                    				<span><i v-html="visa.country.icon"></i> @{{visa.country.name}}</span>
				                    				<span>Expires @{{visa.expiration_date}}</span>
				                    				<span>Type @{{visa.type}}</span>
				                    			</div>
				                    		</div>
				                    	</div>
				                    </div>
				                </div>
				            </div>

			            </div>
		              
				        <div id="tab-applications" class="tab-pane">

			                <h2>Applications</h2>

			                <div class="card card-default">
			                	<div class="list-group list-group-flush" >
			                  	</div>
			                </div>

			            </div>

				        <div id="tab-documents" class="tab-pane">

			                <h2>Documents</h2>
							
							<a href="/documents/request/{{$profile->id}}" class="btn btn-primary" >
					            Request document
					        </a>
								
							@if($profile->document_requests)

	      						<h3>Requested documents</h3>

			                  	@foreach($profile->document_requests as $document_request)

			                  	<div class="card card-default">
				                    
				                    <div class="card-block">
				                      
				                      	<h4>{{$profile->document_request->label}}</h4>
				                      
				                      	<p>{{$document_request->message}}</p>

				                    </div>

				                    <div class="card-footer">
				                      	<div class="d-flex justify-content-around" >
					                        <div class="mr-2" ><i class="fa fa-circle" ></i></div>
					                        <div class="mr-2" >{{$document_request->status_label}}</div>
					                        <div class="mr-2" >On {{$document_request->date}}</div>

					                        <div class="mr-2" >
						                        <a href="/document_request/{{$document_request->id}}/approve" class="text-success">
						                        	<i class="fa fa-check"></i> Approve
						                        </a>
					                        </div>

					                        <div class="mr-2" >
					                        	<a href="/document_request/{{$document_request->id}}/decline" class="text-danger">
					                            	<i class="fa fa-times"></i> Decline
					                          	</a>
					                        </div>
					                        <div class="mr-2" >
					                        	<a href="/document_reques/{{$document_request->id}}" target="_blank" >
					                            	View <small><i class="fa fa-external-link"></i></small>
					                          	</a>
					                        </div>
				                      	</div>
				                	</div>
				                </div>
				                @endforeach
				            @endif

				            @if($profile->documents)
							
	    						<h3>Documents</h3>

				                @foreach($profile->documents as $document)

				                <div class="card card-default">
				                    <div class="card-block">

					                    <h4>
					                        {{$document->label}}
					                    </h4>

					                    <div class="d-flex justify-content-around" >
					                        
					                        <div class="mr-2" >On {{$document->date}}</div>

					                        <div class="mr-2">
					                          	<a href="/document/{{$document->id}}" target="_blank" >
					                            	View <small><i class="fa fa-external-link"></i></small>
					                          	</a>
					                        </div>

					                    </div>
				                    </div>
				                </div>

				                @endforeach

				            @endif

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('local-footer')


<script>

new Vue({
	el: '#up-app',

	data: {

		profile: [],
		profile_id: {{$profile->id}},
		isLoaded: false
	},

	beforeMount: function()	{

		var vm = this;

		axios.get('/profile/' + vm.profile_id).then( function(response)	{

			vm.profile = response.data;
			vm.isLoaded = true;
		});
	}
});
</script>

@endsection