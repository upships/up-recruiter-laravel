@extends('layouts.master')

@section('page-title')
	Vaga {{$job->position->label}}
@endsection

@section('content')

	<div class="row">
		<div class="col">
			<div class="card card-borderless no-padding">
				<div class="card-block">

					<h3>
						{{$job->position->label}}
					</h3>

					<div class="row">
						<div class="col">
							<h6>Status</h6>
							{{$job->status_label}}
						</div>

						<div class="col">
							<h6>Visibilidade</h6>
							{{$job->visibility_label}}
						</div>

						<div class="col">
							<h6>Dura&ccedil;&atilde;o</h6>
							De {{$job->date}} a {{$job->expiration_date}}
						</div>

						<div class="col">
							<h6>Adicionada por</h6>
							<a href="/recruiter/{{$job->recruiter->id}}" >
								{{$job->recruiter->user->name}}
							</a>
						</div>
						@if($job->ship_type)
						<div class="col">
							<h6>Embarca&ccedil;&atilde;o</h6>
							{{$job->ship_type->label}}
						</div>
						@endif
					</div>
				</div>
				<div class="card-footer">
					<ul class="list-inline my-2">
						<li class="list-inline-item">
							<a href="/job/{{$job->identifier}}/close" class="btn btn-success" >Encerrar vaga</a>
						</li>

						<li class="list-inline-item">
							<a href="/job/{{$job->identifier}}/edit" class="btn btn-default" >Editar</a>
						</li>

						<li class="list-inline-item float-right">
							<a class="btn btn-default" href="{{$job->company->link}}/job/{{$job->getSlug()}}" target="_blank">
								Link <i class="fa fa-external-link"></i>
							</a>
						</li>
					</ul>
				</div>

			</div>

			<div class="card card-borderless">
			    <ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
			        <li class="nav-item">
			          <a class="active" data-toggle="tab" role="tab" data-target="#tab-candidates" href="#">Candidatos</a>
			        </li>
			        <li class="nav-item">
			          <a href="#" data-toggle="tab" role="tab" data-target="#tab-job-info">Dados da vaga</a>
			        </li>
			    </ul>

		    	<div class="tab-content">
		        	<div class="tab-pane active" id="tab-candidates">

		          		<div class="row">

							<div class="col-3" >

								<h3>Filtros</h3>

								<div class="card card-default" v-if="activeFilters.length > 0">
									<div class="list-group list-group-flush">
										<div class="list-group-item">
											<h4>Filtros ativos</h4>
										</div>

										<div class="list-group-item" v-for="(ac, key) in activeFilters" >
										@{{filtersMeta[ac.key]['label']}}: @{{ac.value}} <a href="#" @click="deleteFilter(key)" >x</a>
										</div>
									</div>
								</div>

								<div v-if="filters.length > 0" >

									<div class="card card-default" v-for="(filter, key) in filters" >
										<div class="list-group list-group-flush">
											<div class="list-group-item">
												<h4 class="mb-1" >@{{filter.label}}</h4>
											</div>

											<a href="javascript:;" class="list-group-item list-group-item-action" v-for="(value, valueKey) in filter.values" @click="triggerFilter(key, valueKey)" >
												@{{value.label}}
											</a>
										</div>
									</div>

								</div>
							</div>
							<div class="col">
								<h3>
				            		Candidatos
				            		<span class="badge badge-secondary">@{{visibleApplications.length}}</span>
				          		</h3>

				          		<ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
							        <li class="nav-item">
							          <a class="active" data-toggle="tab" role="tab" data-target="#tab-candidates-available" href="#">
							          	Dispon&iacute;veis <span class="badge badge-secondary">@{{availableApplications.length}}</span>
							          </a>
							        </li>
							        <li class="nav-item">
							          <a href="#" data-toggle="tab" role="tab" data-target="#tab-candidates-eliminated">
							          	Eliminados <span class="badge badge-secondary">@{{eliminatedApplications.length}}</span>
							          </a>
							        </li>
							    </ul>

							    <div class="tab-content">
		        					<div class="tab-pane active" id="tab-candidates-available">

		        						<div v-if="availableApplications.length > 0" >
							          		<applications-list filters="filters" >
							          			<job-application v-for="application in availableApplications" :application="application" :key="application.id" v-on:application:change="changeApplicationStatus" ></job-application>
							          		</applications>
							          	</div>
							          	<div v-else>
							          		<h5><i class="fa fa-info-circle"></i> Nenhum candidato dispon&iacute;vel</h5>
							          	</div>

						          	</div>
						          	<div class="tab-pane" id="tab-candidates-eliminated">

						          		<div v-if="eliminatedApplications.length > 0" >
							          		<applications-list filters="filters" >
							          			<job-application v-for="application in eliminatedApplications" :application="application" :key="application.id" v-on:application:change="changeApplicationStatus"></job-application>
							          		</applications>
							          	</div>
							          	<div v-else>
							          		<h5><i class="fa fa-info-circle"></i> Nenhum candidato eliminado</h5>
							          	</div>

						          	</div>
						        </div>
							</div>
						</div>
		        	</div>
		        	<div class="tab-pane " id="tab-job-info">
			        	<h3>
			          		<span class="semi-bold">Dados da vaga</span>
			        	</h3>

			        	@if($job->description)
							{{$job->description}}
						@endif

			        	<div class="row">
							<div class="col-lg-6 col-md-6">

								<h4>Requisitos</h4>

								<div class="card card-default m-b-10">

									@if($job->seaman_book_types)

										<div class="card-block">
											<h5>Categorias CIR</h5>

											<ul class="list-inline">
												@foreach($job->seaman_book_types as $job_seaman_book_type)
													<li>
														<button class="btn btn-default btn-sm">{{$job_seaman_book_type->seaman_book_type->label}}</button>
													</li>
												@endforeach
											</ul>
										</div>
									@endif

									@if($job->stcw_regulations)
										<div class="card-block">
											<h5>Regras STCW</h5>

											<ul class="list-inline">
												@foreach($job->stcw_regulations as $job_stcw_regulation)
													<li><button class="btn btn-default btn-sm">{{$job_stcw_regulation->stcw_regulation->regulation}}</button></li>
												@endforeach
											</ul>
										</div>
									@endif

									@if($job->certificate_types)
										<div class="card-block">
											<h5>Cursos &amp; Certificados</h5>

											<ul class="list-inline">
												@foreach($job->certificate_types as $certificate_type)
												<li>
													<button class="btn btn-default btn-sm">{{$certificate_type->certificate_type->label}}</button>
												</li>
												@endforeach
											</ul>
										</div>
									@endif

									@if($job->ship_types)

										<div class="card-block">
											<h5>Experi&ecirc;ncia em embarca&ccedil;&otilde;es</h5>

											<ul>
											@foreach($job->ship_types as $ship_type)
												<li>{{$ship_type->ship_type->label}}</li>
											@endforeach
											</ul>
										</div>
									@endif

									@if($job->experiences)

										<div class="card-block">

											<h5>Outras experi&ecirc;ncias</h5>

											<ul>
											@foreach($job->experiences as $experience)
												<li>{{$experience->value}}</li>
											@endforeach
											</ul>
										</div>
									@endif

									@if($job->requirements)

										<div class="card-block">
											<h5>Outros requisitos</h5>

											<ul>
											@foreach($job->requirements as $requirement)
												<li>
													{{$requirement->value}}</a>
												</li>
											@endforeach
											</ul>
										</div>
									@endif

									@if($job->languages)

										<div class="card-block">
											<h5 class="">Idiomas</h4>

											<ul>
												@foreach($job->languages as $language)
													<li>
														{{$language->language->label}}: {{$language->level_label}}
													</li>
												@endforeach
											</ul>
										</div>
									@endif

								</div>
							</div>

							<div class="col-lg-6 col-md-6">

								<h4>Outras informa&ccedil;&otilde;es</h4>

								@if($job->rotation)
								<div class="card card-default">
									<div class="card-block">
										<h4>Escala</h4>

										{{$job->rotation}}
									</div>
								</div>
								@endif

								@if($job->extra)
								<div class="card card-default">
									<div class="card-block">
										<h4>Informa&ccedil;&otilde;es extras</h4>

										{{$job->extra}}

									</div>
								</div>
								@endif

								@if($job->vacancies)
								<div class="card card-default">
									<div class="card-block">
										<h4>N&uacute;mero de vagas</h4>

										{{$job->vacancies}}

									</div>
								</div>
								@endif

								@if($job->location)
								<div class="card card-default">
									<div class="card-block">
										<h4>Local</h4>

										{{$job->location}}
									</div>
								</div>
								@endif

								@if($job->salary)
								<div class="card card-default">
									<div class="card-block">
										<h4>Remunera&ccedil;&atilde;o</h4>

										{{$job->salary}}
									</div>
								</div>
								@endif

							</div>
						</div>

						<ul class="list-inline">
							<li class="list-inline-item" >
								<a href="/job/disable/{{$job->identifier}}" class="btn btn-warning" ><i class='fa fa-eye-slash' ></i> Desativar</a>
							</li>

							<li class="list-inline-item float-right">
								<a href="#delete" onclick="deleteJob({{$job->identifier}},true)" class="btn btn-danger" ><i class='fa fa-times' ></i> Excluir</a>
							</li>
						</ul>
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

	    	applications: [],

	        activeFilters: [],

	        filters: [],

	        filtersMeta: {
	        				book: {

	        					label: 'Categorias CIR',
	        					name: 'book',
	        				},

	        				stcw: {

	        					label: 'STCW',
	        					name: 'stcw',
	        				},

	        				location: {

	        					label: 'Localização',
	        					name: 'location',
	        				},

	        				english: {

	        					label: 'Inglês',
	        					name: 'english',
	        				},

	        				// ships: {
	        				// 	label: 'Embarcação',
	        				// 	name: 'ship',
	        				// 	items: {}
	        				// },
	        			},

	        job: [],

	        job_id: '{{$job->identifier}}',
	    },

	    watch: {

	        searchParameter: function (val) {

	            // this.flagParameter = null;

	            // var self = this;

	            // this.visibleItems = this.certificates.filter( function(certificate) {

	            //     if(self.searchParameter)   {

	            //         // Search by name

	            //         return certificate.label.toLowerCase().indexOf( self.searchParameter.toLowerCase() ) >= 0;
	            //     }

	            //     else {

	            //         return certificate;
	            //     }
	            // });
	        }
	    },

	    computed: {

	    	availableApplications: function()	{

	    		var self = this;

	    		return self.applications.filter( function( application )	{

	    			if(application.status == 0)	{

	    				return application;
	    			}

	    		});

	    	},

	    	eliminatedApplications: function()	{

	    		var self = this;

	    		return self.applications.filter( function( application )	{

	    			if(application.status == 666)	{

	    				return application;
	    			}

	    		});

	    	},

	        visibleApplications: function()	{

	        	var self = this;

	        	if(self.activeFilters.length > 0)	{

	        		return self.applications.filter( function(application) {

		        		for(i = 0; i < self.activeFilters.length; i++)	{

		        			var ac = self.activeFilters[i];

		        			if(profile['filterableAttributes'][ac.key].findIndex( function(k) {return k === ac.value;}) >= 0)	{

		        				return profile;
		        			}

		        		}

		        	});
	        	}

	        	return self.applications;
	        }
	    },

	    filters: {

	    	filterTypeLabel: function( filterType )	{

	    		var self = this;

	    		return filterType;

	    		// var label = this['filtersMeta']['book']['label'];

	    		// return typeof label === 'string' ? label : filterType;
	    	},

	    	filterItemLabel: function (filterItemId, filterType)	{

	    		return this['filtersMeta'][filterType][filterItemId]['label'];
	    	}

	    },

	    beforeMount: function() {

	        const vm = this;

	        axios.get('/json/job/' + vm.job_id).then( function( response ) {

	        	vm.job = response.data;
	        	vm.filters = vm.job.filters;
	        });

	        axios.get('/json/job/' + vm.job_id + '/applications').then( function( response ) {

	            // Go through each profile, get their filterableAttributes and return to the Filters array

	            var applications = response.data.map( function(application)	{

	            	application.profile.filterableAttributes = {book: [], stcw: [], english: [], location: []};

	            	// // CIR: book

	            	// 	// Check if item already exists

	            	// var filterItemKey = application.profile.bookCategoryCode;

	            	// if(typeof filterItemKey === 'string')	{

		            // 	if( vm.filters.book.findIndex( function(item) {return item === filterItemKey}) < 0)	{

		            // 		vm['filtersMeta']['book'][filterItemKey] = {label: application.profile.bookCategoryCode, id: application.profile.bookCategoryId};
		            // 		vm.filters.book.push(filterItemKey);
		            // 	}

		            // 	application.profile.filterableAttributes.book.push(filterItemKey);
		            // }

		            // var filterItemKey = application.profile.profileState;

	            	// if(typeof filterItemKey === 'string')	{

		            // 	if( vm.filters.location.findIndex( function(item) {return item === filterItemKey}) < 0)	{

		            // 		vm['filtersMeta']['location'][filterItemKey] = {label: application.profile.profileState, id: application.profile.profileState};
		            // 		vm.filters.location.push(filterItemKey);
		            // 	}

		            // 	application.profile.filterableAttributes.location.push(filterItemKey);
		            // }

		            // // STCW: stcw

	            	// if(typeof application.profile.cocRegulations !== 'undefined')	{

		            // 	application.profile.cocRegulations.map( function(regulation) {

			           //  	var filterItemKey = regulation.stcwRegulationCode;

			           //  	if(typeof filterItemKey === 'string')	{

				          //   	if( vm.filters.stcw.findIndex( function(item) {return item === filterItemKey}) < 0)	{

				          //   		vm['filtersMeta']['stcw'][filterItemKey] = {label: regulation.stcwRegulation, id: regulation.stcwRegulationCode};
				          //   		vm.filters.stcw.push(filterItemKey);
				          //   	}
				          //   }

				          //   application.profile.filterableAttributes.stcw.push(filterItemKey);

		            // 	});
		            // }

		            // // Inglês: english

		            // 	var filterItemKey = application.profile.profileEnglishLevel;

		            // 	if(typeof filterItemKey === 'string')	{

			           //  	if( vm.filters.english.findIndex( function(item) {return item === filterItemKey}) < 0)	{

			           //  		vm['filtersMeta']['english'][filterItemKey] = {label: application.profile.profileEnglishLevelLabel, id: filterItemKey};
			           //  		vm.filters.english.push(filterItemKey);
			           //  	}

			           //  	application.profile.filterableAttributes.english.push(filterItemKey);
			           //  }

			        return application;

	            	// Embarcação: ship

	            	// if(typeof item.workExperience !== 'undefined')	{

	            	// 	item.workExperience.map( function(work) {

	            	// 		if(typeof work.workShips !== 'undefined')	{
		            // 			work.workShips.map( function(ship) {

		            // 				key = ship.workShipTypeName;

		            // 				if(typeof key !== 'undefined' && typeof vm['filters']['ship']['items'][key] === 'undefined' && key.length > 0)	{

				          //   		//console.log('State key: ' + item.profileState + ' | ' + key);

				          //   		vm['filters']['ship']['items'][key] = 	{
			           //  														label: ship.workShipTypeLabel,
			           //  														id: ship.workShipTypeName,
				          //   												};
				          //   		}

		            // 			});
		            // 		}
		            // 	});
	            	// }

	            });

	            vm.applications = applications;
	        });
	    },

	    mounted: function()	{

	    },

	    methods: {

	    	notify: function(message, type)	{

	    	},

	        deleteFilter: function(key)	{

	        	this.activeFilters.splice(key, 1);
	        },

	        triggerFilter: function(key, value)	{

	    		this.activeFilters.push({key: key, value: value});
	    	},

	    	changeApplicationStatus: function(application_id, status)	{

	    		var vm = this;
	    		var key = this.applications.findIndex( function(a){ return a.id === application_id });

	    		if(key >= 0)	{

	    			var data = {status: status};

	    			axios.patch('/json/application/' + application_id, data).then( function()	{

	    				vm['applications'][key]['status'] = status;

	    			});
	    		}
	    	}
	    }

	});
</script>
@endsection
