@extends('layouts.master')

@section('page-title')
	Perfil: {{$profile->label}}
@endsection

@section('content')

<div class="row">
	<div class="col">
      	
      	<div class="card card-default no-padding">
      		<div class="card-block">
    			
    			<h2>{{$profile->name}}</h2>
        		
        		<ul class="list-inline my-2">
			      	<li class="list-inline-item" >{{$profile->user->email}}</li>
			      	<li class="list-inline-item" >{{$profile->phone}}</li>
			    </ul>

			    <ul class="list-inline my-2">
			      	<li class="list-inline-item" >{{$profile->position->label}}</li>
			      	<li class="list-inline-item" >{{$profile->location}}</li>
			      	<li class="list-inline-item" >{{$profile->gender_label}}</li>
			    </ul>
    			
    			<div class="my-2">
		      		<toolbar-item link="/conversation/add?recipient={{$profile->user->id}}" icon="envelope" >Enviar mensagem</toolbar-item>
		      		<toolbar-item link="/profile/{{$profile->user->id}}/add_to_selection" icon="plus" >Incluir em Sele&ccedil;&atilde;o</toolbar-item>

		      		<div class="dropdown dropdown-default">
                        <button class="btn btn-tag btn-tag-light btn-tag-rounded dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-external-link"></i> Exportar 
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" :href='"/profile/" + profile.id + "/export"'>Salvar PDF</a>
                            <a class="dropdown-item" :href='"/profile/" + profile.id + "/export?mode=anonymous"'>Salvar PDF An&ocirc;nimo</a>
                        </div>
                    </div>
			    </div>
			</div>
		</div>

      	<div class="panel panel-default">
        	
        	<div class="panel-block"> 

	          	<ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
		            <li class="nav-item">
		              <a class="active" data-toggle="tab" role="tab" data-target="#tab-start" href="#">Profissional &amp; Certificados</a>
		            </li>

		            <li class="nav-item">
		              <a href="#" data-toggle="tab" role="tab" data-target="#tab-personal">Dados Pessoais</a>
		            </li>

		            <li class="nav-item">
		              <a href="#" data-toggle="tab" role="tab" data-target="#tab-documents">Documentos</a>
		            </li>

		            <li class="nav-item">
		              <a href="#" data-toggle="tab" role="tab" data-target="#tab-applications">Candidaturas</a>
		            </li>
		            
	          	</ul>

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

			           	<h3>Informações marítimas</h3>

			           	<div class="row" >
			           		<div class="col">
			           			<h4>Certificado de Compet&ecirc;ncia</h4>

			           			<profile-coc :coc="profile.coc" ></profile-coc>
			           		</div>
			           		
			           		<div class="col">
			           			<h4>CIR</h4>

			           			<div class="row" >
			           				@foreach($profile->seaman_books as $seaman_book)
			           				<div class="col" >
			           					
			           					<profile-seaman-books>
			           						<profile-seaman-book v-for="seaman_book in profile.seaman_books" :seaman_book="seaman_book" :key="seaman_book.id" ></profile-seaman-book>
			           					</profile-seaman-books>

			           				</div>
			           				@endforeach
			           			</div>
			           		</div>
			           		
			           		@if($profile->dp)
			           			@foreach($profile->dp as $dp)
				           		<div class="col">
				           			<h4>Posicionamento Din&acirc;mico</h4>

				           			<profile-dp>
				           				<profile-dp-item v-for="dp in profile.dp" :dp="dp" :key="dp.id" ></profile-dp-item>
				           			</profile-dp>
				           		</div>
				           		@endforeach
			           		@endif

			           		<div class="col">
			           			<h4>Idiomas</h4>

			           			<profile-languages :native="profile.native_language" >
			           				<profile-language v-for="language in profile.languages"  :language="language" :key="language.id" ></profile-language>
			           			</profile-languages>
			           		</div>

			           		@if($profile->ships)

				           		<div class="col">
				           			<h4>Experi&ecirc;ncia em embarcações</h4>

				           			<profile-ships>
				           				<profile-ship v-for="ship in profile.ships" :dp="ship" :key="ship.id" ></profile-ship>
				           			</profile-ships>
				           		</div>
			           		@endif
			           	</div>

			           	<div class="row">
	                  		<div class="col">

	                  			<h3>Experi&ecirc;ncia profissional</h3>

	                  			<profile-works>
	                  				<profile-work v-for="work in profile.works" :work="work" :key="work.id" ></profile-work>
	                  			</profile-works>

	                  		</div>
	                  		<div class="col">
	                  			
	                  			<h3>Certificados</h3>

	                  			<profile-certificates>
	                  				<profile-certificate v-for="certificate in profile.certificates" :certificate="certificate" :key="certificate.id" ></profile-certificate>
	                  			</profile-certificates>

	                  			<h3>Formação</h3>

	                  			<profile-education>
			                        <profile-education-item v-for="education in profile.education" :education="profile.education" :key="education.id" ></profile-education-item>
			                    </profile-education>

	                  		</div>
	                  	</div>
	                </div>

	              	<div id="tab-personal" class="tab-pane">

	                	<h2>Informa&ccedil;&otilde;es Pessoais</h2>

		                <div class="row">
		                  	<div class="col">

		                    	<h3 class="header-title">Dados Pessoais</h3>

			                    <ul class="list-unstyled">
			                      	<li>
				                        <div class="row">
				                          	<div class="col">
				                            Nascimento
				                            <h4 class="m-t-0">{{$profile->birthday}}</h4>
				                          	</div>
				                          	<div class="col">
				                            Nacionalidade
				                            <h4 class="m-t-0">{{$profile->nationality->name}}</h4>
				                          	</div>
				                        </div>
			                      	</li>
			                      	@if($profile->passports)
				                      	<li>
				                        @foreach($profile->passports as $passport)
				                          	<div class="row">  
				                              	<div class="col">
				                                  	N&uacute;m. Passaporte
				                                  	<h4 class="m-t-0">{{$passport->number}}</h4>
				                              	</div>
				                              	<div class="col">
				                                	Validade
				                                	<h4 class="m-t-0">{{$passport->expiration_date}}</h4>
				                              	</div>
				                          	</div>
				                        @endforeach
				                      	</li>
				                    @endif
			                      	<li>
				                        <div class="row">
				                          	<div class="col">
				                            Sexo
				                            <h4 class="m-t-0">{{$profile->gender_label}}</h4>
				                          	</div>
				                          	<div class="col">
				                            Estado Civil
				                            <h4 class="m-t-0">{{$profile->marital_status_label}}</h4>
				                          	</div>
				                        </div>
			                      	</li>
			                      	<li>
				                        <div class="row">
				                          	<div class="col">
				                            Telefone residencial
				                            <h4 class="m-t-0">{{$profile->land_phone}}</h4>
				                          	</div>
				                          	<div class="col">
				                            Cidade
				                            <h4 class="m-t-0">{{$profile->city}} - {{$profile->state}}</h4>
				                          	</div>
				                        </div>
			                      	</li>
			                    </ul>
		                	</div>
		                </div>
		            </div>
	              
			        <div id="tab-applications" class="tab-pane">

		                <h2>Candidaturas</h2>

		                <div class="card card-default">
		                	<div class="list-group list-group-flush" >
		                  	</div>
		                </div>

		            </div>

			        <div id="tab-documents" class="tab-pane">

		                <h2>Documentos</h2>
						
						<a href="/documents/request/{{$profile->id}}" class="btn btn-primary btn-block btn-custom" >
				            Solicitar documentos
				        </a>
							
						@if($profile->document_requests)

      						<h3>Documentos Solicitados</h3>

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
				                        <div class="mr-2" >Em {{$document_request->date}}</div>

				                        <div class="mr-2" >
					                        <a href="/document_request/{{$document_request->id}}/approve" class="text-success">
					                        	<i class="fa fa-check"></i> Aprovar
					                        </a>
				                        </div>

				                        <div class="mr-2" >
				                        	<a href="/document_request/{{$document_request->id}}/decline" class="text-danger">
				                            	<i class="fa fa-times"></i> Recusar
				                          	</a>
				                        </div>
				                        <div class="mr-2" >
				                        	<a href="/document_reques/{{$document_request->id}}" target="_blank" >
				                            	Ver document_requesto <small><i class="fa fa-external-link"></i></small>
				                          	</a>
				                        </div>
			                      	</div>
			                	</div>
			                </div>
			                @endforeach
			            @endif

			            @if($profile->documents)
						
    						<h3>Documentos</h3>

			                @foreach($profile->documents as $document)

			                <div class="card card-default">
			                    <div class="card-block">

				                    <h4>
				                        {{$document->label}}
				                    </h4>

				                    <div class="d-flex justify-content-around" >
				                        
				                        <div class="mr-2" >Em {{$document->date}}</div>

				                        <div class="mr-2">
				                          	<a href="/document/{{$document->id}}" target="_blank" >
				                            	Ver documento <small><i class="fa fa-external-link"></i></small>
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


@endsection

@section('local-footer')


<script>

new Vue({
	el: '#up-app',

	data: {

		profile: [],
		profile_id: {{$profile->id}}
	},

	beforeMount: function()	{

		var vm = this;

		axios.get('/profile/' + vm.profile_id).then( function(response)	{

			vm.profile = response.data;

		});
	}
});
</script>

@endsection