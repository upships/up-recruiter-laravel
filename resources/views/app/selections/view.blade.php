@extends('layouts.master')

@section('page-title')
	Processo Seletivo: {{$selection->label}}
@endsection

@section('content')

<div class="row">
	<div class="col">

		<div class="card card-default">
			<div class="card-block">
				
				<h2>{{$selection->label}}</h2>

				<ul class="list-inline">
					<li>
						<i class='fa fa-clock-o' ></i> Postada em {{$selection->date}}
					</li>
					<li>
						<i class='fa fa-users'></i> @{{applications.length}} candidatos
					</li>
				</ul>
			</div>
			<div class="card-block">

				<ul class="list-inline">
					<li>
						<a href="/selection/{{$selection->id}}/find_candidates" class="btn btn-primary">
							<i class="fa fa-user-plus"></i> Incluir candidatos
						</a>
					</li>
					
					<li>
						<a href="/selection/{{$selection->id}}/documents" class="btn btn-default" ><i class='fa fa-file-o' ></i> Documentos recebidos</a>
					</li>

					<li class="float-right">
						<a href="/selection/{{$selection->id}}/close" class="btn btn-success btn-fill" ><i class='fa fa-check' ></i> Finalizar processo</a>
					</li>
				</ul>
			</div>
		</div>

		<h2 class="card-title">Candidatos</h2>

		<div class="row">
			<div class="col">

				<h3 class="card-title">Em avalia&ccedil;&atilde;o</h3>

				<applications-list>
					<application-list-item v-for="application in applicationsOnScreening" :application="application" :key="application.id" v-on:application:change="changeApplicationStatus" ></application-list-item>
				</applications-list>

			</div>

			<div class="col">

				<h3 class="card-title">Em entrevista</h3>

				<applications-list>
					<application-list-item v-for="application in applicationsOnInterviewing" :application="application" :key="application.id" v-on:application:change="changeApplicationStatus" ></application-list-item>
				</applications-list>

			</div>

			<div class="col">

				<h3 class="card-title">Avaliando propostas</h3>

				<applications-list>
					<application-list-item v-for="application in applicationsOnEmploymentOffering" :application="application" :key="application.id" v-on:application:change="changeApplicationStatus" ></application-list-item>
				</applications-list>

			</div>

			<div class="col">

				<h3 class="card-title">Em contrata&ccedil;&atilde;o</h3>

				<applications-list>
					<application-list-item v-for="application in applicationsOnHiring" :application="application" :key="application.id" v-on:application:change="changeApplicationStatus" ></application-list-item>
				</applications-list>

			</div>

			<div class="col">

				<h3 class="card-title">Em onboarding</h3>

				<applications-list>
					<application-list-item v-for="application in applicationsOnOnboarding" :application="application" :key="application.id" v-on:application:change="changeApplicationStatus" ></application-list-item>
				</applications-list>

			</div>
		</div>

			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="card card-default">
						<div class="card-block">
							<h3 class="card-title">Candidatos iniciais</h3>
						</div>

						
						<div class="card-block">
							<h4>
								<a href="/profile/{{$profile->id}}" target="_blank">
								@{{application.profile.name}} <br/><small>{{$application->profile->position->label}}</small>
								</a>
							</h4>

							<ul class="list-inline clearfix">
								<li>
									<label>
										<input type="checkbox" name="applicants[]" class="applicantsSelector" value="{{$application->id}}" > Selecionar
									</label>
								</li>
								<!--
								<li class="text-{applicantCompatibilityColor}">{applicantCompatibility}% compat.</li>
								-->

								<li class="float-right">
							
					                <div class='dropdown' >
					                    <a href='#' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
					                        <i class='fa fa-cog fa-lg'></i> A&ccedil;&otilde;es <span class="caret"></span>
					                    </a>
					                    <ul class='dropdown-menu dropdown-menu-right' >
					                    	<li><a href="/selection/changeCandidates/2/{{$application->id}}" class="text-info"><i class="fa fa-comments-o"></i> Entrevistar</a></li>

						                    <li role="separator" class="divider"></li>
						                    <li><a href='/selection/messageCandidates/{{$application->id}}'><i class='fa fa-envelope-o'></i> Enviar mensagem</a></li>
						                    <li><a href='/selection/requestDocuments/{{$application->id}}'><i class='fa fa-file-o'></i> Solicitar documentos</a></li>
						                    <!--
						                    <li role="separator" class="divider"></li>
						                    <li><a href="#" onclick="toggleJobStatus('{{$selection->id}}')" ><i class='fa fa-eye-slash' ></i> Desativar</a></li> -->
						                    <li role="separator" class="divider"></li>
						                    <li class="text-danger"><a href="/selection/removeCandidates/{{$application->id}}"  ><i class='fa fa-times' ></i> Desclassificar</a></li>
					                    </ul> 
					                </div>
								</li>
							</ul>
						</div>
						

					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="card card-default">
						<div class="card-block">
							<h3 class="card-title">Em entrevista</h3>
						</div>

						
						<div class="card-block">
							<h4>
								<a href="/profile/{{$profile->id}}" target="_blank">
								@{{application->profile->name}} <br/><small>{{$application->profile->position->label}}</small>
								</a>
							</h4>

							<ul class="list-inline clearfix">
								<li>
									<label>
									<input type="checkbox" name="applicants[]" class="applicantsSelector" value="{{$application->id}}" > Selecionar
									</label>
								</li>
								<!--
								<li class="text-{applicantCompatibilityColor}">{applicantCompatibility}% compat.</li>
								-->

								<li class="float-right">
							
					                <div class='dropdown' >
					                    <a href='#' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
					                        <i class='fa fa-cog fa-lg'></i> A&ccedil;&otilde;es <span class="caret"></span>
					                    </a>
					                    
					                </div>
								</li>
							</ul>
						</div>
						

					</div>	
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="card card-default">
						<div class="card-block">
							<h3 class="card-title">Em fase final</h3>
						</div>

						{applicantsSelected}
						<div class="card-block">
							<h4>
								<a href="/profile/{{$profile->id}}" target="_blank">
								@{{application->profile->name}} <br/><small>{{$application->profile->position->label}}</small>
								</a>
							</h4>

							<ul class="list-inline">
								<li>
									<input type="checkbox" name="applicants[]" class="applicantsSelector" value="{{$application->id}}" >
								</li>
								<!--<li class="text-{applicantCompatibilityColor}">{applicantCompatibility}% compat.</li>-->
								<li><a href="/selection/changeCandidates/4/{{$application->id}}" class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i> Aprovar</a></li>					
								
								<li class="float-right clearfix">
							
					                <div class='dropdown' >
					                    <a href='#' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
					                        <i class='fa fa-cog fa-lg'></i> <span class="caret"></span>
					                    </a>
					                    <ul class='dropdown-menu dropdown-menu-right' >
						                    <li><a href='/selection/messageCandidates/{{$application->id}}'><i class='fa fa-envelope-o'></i> Enviar mensagem</a></li>
						                    <li role="separator" class="divider"></li>
						                    <li><a href='/selection/requestDocuments/{{$application->id}}'><i class='fa fa-file-o'></i> Solicitar documentos</a></li>

						                    <!--
						                    <li role="separator" class="divider"></li>
						                    <li><a href="#" onclick="toggleJobStatus('{{$selection->id}}')" ><i class='fa fa-eye-slash' ></i> Desativar</a></li> -->
						                    <li role="separator" class="divider"></li>
						                    <li><a href="/selection/removeCandidates/{{$application->id}}" class="text-danger" ><i class='fa fa-times' ></i> Eliminar</a></li>
					                    </ul> 
					                </div>
								</li>
								<li class="clearfix"></li>
							</ul>
						</div>
						{/applicantsSelected}
					</div>
				</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="card card-default">
						<div class="card-block">
							<h3 class="card-block-heading text-success">Candidatos aprovados</h3>
						</div>
						<div class="card-block">
							<div class='dropdown' >
			                    <a href='#' class='btn btn-block btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
			                        Aos finalistas <span class="caret"></span>
			                    </a>
			                    <ul class='dropdown-menu dropdown-menu-right' >
				                    <li>
				                    	<a href='/selection/messageFinalCandidates/{{$application->id}}'>
				                    		<i class='fa fa-envelope-o'></i> Enviar mensagem
				                    	</a>
				                    </li>
				                    <li role="separator" class="divider"></li>
				                    <li>
				                    	<a href='/selection/requestFinalDocuments/{{$application->id}}'>
				                    		<i class='fa fa-file-o'></i> Solicitar documentos
				                    	</a>
				                    </li>
			                    </ul> 
			                </div>
				        </div>

						{applicantsApproved}
						<div class="card-block">
							<h4>@{{application->profile->name}} <br/><small>{{$application->profile->position->label}}</small></h4>

							<ul class="list-inline">
								<!--<li class="text-{applicantCompatibilityColor}">{applicantCompatibility}% compat.</li>-->
								<li>
							
					                <div class='dropdown' >
					                    <a href='#' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
					                        <i class='fa fa-cog fa-lg'></i> A&ccedil;&otilde;es <span class="caret"></span>
					                    </a>
					                    <ul class='dropdown-menu dropdown-menu-right' >
						                    <li>
						                    	<a href='/selection/messageCandidates/{{$application->id}}'>
						                    		<i class='fa fa-envelope-o'></i> Enviar mensagem
						                    	</a>
						                    </li>
						                    <li role="separator" class="divider"></li>
						                    <li>
						                    	<a href='/selection/requestDocuments/{{$application->id}}'>
						                    		<i class='fa fa-file-o'></i> Solicitar documentos
						                    	</a>
						                    </li>
					                    </ul> 
					                </div>
								</li>
							</ul>
						</div>
						{/applicantsApproved}
					</div>	
				</div>
			</div>            




        </div> 
        <div class="tab-pane" id="removed"> 
             <div class="card card-default">
				<div class="card-block">
					<h3 class="card-title">Candidatos eliminados</h3>
				</div>

				{removedApplicants}
				<div class="card-block">
					<h4>
						<a href="/profile/{{$profile->id}}" target="_blank">
						@{{application->profile->name}} <br/><small>{{$application->profile->position->label}}</small>
						</a>
					</h4>

					<ul class="list-inline">
						<li>
							<a href="/selection/changeCandidates/1/{{$application->id}}" >
								<i class="fa fa-undo"></i> Recolocar candidato
							</a>
						</li>
					</ul>
				</div>
				{/removedApplicants}
			</div>
        </div> 
    </div> 
</div>

<hr/>

<p class="text-center">
	<small>
		<a href="#delete" onclick="deleteJob({{$selection->id}},true)" class="text-danger" >
			<i class='fa fa-times' ></i> Excluir processo seletivo
		</a>
		<br/>
		(requer confirma&ccedil;&atilde;o posterior)
	</small>
</p>


@endsection

@section('local-footer')

<script type="text/x-template" id="application-list-item-template">

	<div class="card social-card share full-width" data-social="item">
		
		<div class="circle" data-toggle="tooltip" title="Label" data-container="body"></div>
			
		<div class="card-header clearfix">
			<h5 style="font-size: 16px !important;" >
				@{{application.profile.name}} <i class="fa fa-spinner fa-spin" v-show="isLoading" ></i>
			</h5>
	  		<h6>@{{application.profile.position.label}} 
			    <span class="location semi-bold"><i
			        class="fa fa-map-marker"></i> @{{application.profile.city}} <span v-html="application.profile.country.icon"></span>
			    </span>
	  		</h6>
		</div>
		<div class="card-description">

			<p v-show="application.notes" >
				@{{application.notes}}
			</p>

		  	<p v-show="application.salary" >
		    	Pretens&atilde;o salarial: @{{application.salary}}
		  	</p>

		  	<div v-if="showDetails">
			  	<div class="row" >
			    	<div class="col" v-if="application.profile.stcw_regulations" >
			      		<h6>Regras STCW</h6>
			      		
			      		<ul class="list-inline" >
					        <li class="list-inline-item" v-for="stcw_regulation in application.profile.stcw_regulations" >
					          <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{stcw_regulation.stcw_regulation.regulation}}</button>
					        </li>
			    	  	</ul>
			    	</div>
			    	<div class="col" v-if="application.profile.seaman_book_types" >
			      		<h6>Categorias CIR</h6>
			      		
			      		<ul class="list-inline">
					        <li class="list-inline-item" v-for="seaman_book_type in application.profile.seaman_book_types" >
					          <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{seaman_book_type.seaman_book_type.label}}</button>
					        </li>
			      		</ul>
			    	</div>
			    	<div class="col" v-if="application.profile.certificates" >
				      	<h6>Certificados</h6>
				      	<ul class="list-inline" >
				        	<li class="list-inline-item" v-for="certificate in application.profile.certificates" >
				          		<button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{certificate.certificate_type.label}}</button>
				        	</li>
				      	</ul>
				    </div>
				</div>
			  	<div class="row">
				    <div class="col" v-if="application.profile.ships" >
				      	<h6>Embarcações</h6>
				      	<ul class="list-inline" >
					        <li class="list-inline-item" v-for="ship in application.profile.ships" >
					          	<button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{ship.ship_type.label}}</button>
					        </li>
				      	</ul>
				    </div>
			  	</div>
			</div>
			<div v-else>

			</div>
	  
		</div>
	
		<div class="card-footer clearfix">
	  
		  	<ul class="list-inline">
		    
			    <li class="list-inline-item" v-if="application.status == 666" >
			      	<a class="btn btn-primary btn-sm" href="javascript:;" @click="changeStatus(application.id, 0)"  >
			        	<i class="fa fa-thumbs-up"></i> Reativar
			      	</a>
			    </li>
			    <li class="list-inline-item" v-else>
			      	<a href="javascript:;" class="btn btn-danger btn-sm" @click="changeStatus(application.id, 666)" >
			        	<i class="fa fa-times"></i> Eliminar
			      	</a>
			    </li>

			    <li class="list-inline-item" >
			      	<a :href="'/recruiting/sendMessage/' + application.profile.id" class="btn btn-default btn-sm" title="Enviar e-mail (nova janela)" target="_blank" ><i class="fa fa-envelope-o"></i></a></li>

			    <li class="list-inline-item float-right">
			      	<a :href="'/profile/' + application.profile.id" target="_blank" class="btn btn-default btn-sm" title="Ver perfil (nova janela)" >
			      		Perfil completo
			      	</a>
			    </li>

		  	</ul>

		</div>
	</div>
</script>

<script>

Vue.component('application-list-item', {

  props: {
    application: { required: true },
  },
  
  data: function()  {

    return {
      isLoading: false,
    };
  },

  template: '#application-list-item-template',

  methods: {

    changeStatus: function(application_id, status)  {

      this.$emit('application:change', application_id, status);

    }

  },

});
	

new Vue({

		    el: '#up-app',
		    data: {

		    	applications: [],

		        selection: [],

		        selection_id: {{$selection->id}},
		    },

		    watch: {

		        searchParameter: function (val) {

		        }
		    },

		    computed: {

		    	applicationsOnScreening: function()	{

		    		var self = this;

		    		return self.applications.filter( function( application )	{

		    			if(application.status == 1)	{

		    				return application;
		    			}

		    		});

		    	},

		    	applicationsOnInterviewing: function()	{

		    		var self = this;

		    		return self.applications.filter( function( application )	{

		    			if(application.status == 2)	{

		    				return application;
		    			}

		    		});
		    		
		    	},

		    	applicationsOnEmploymentOffering: function()	{

		    		var self = this;

		    		return self.applications.filter( function( application )	{

		    			if(application.status == 3)	{

		    				return application;
		    			}

		    		});
		    		
		    	},

		    	applicationsOnHiring: function()	{

		    		var self = this;

		    		return self.applications.filter( function( application )	{

		    			if(application.status == 4)	{

		    				return application;
		    			}

		    		});
		    		
		    	},

		    	applicationsOnOnboarding: function()	{

		    		var self = this;

		    		return self.applications.filter( function( application )	{

		    			if(application.status == 5)	{

		    				return application;
		    			}

		    		});
		    		
		    	},
		    },

		    filters: {

		    },

		    beforeMount: function() {

		        const vm = this;

		        axios.get('/api/selection/' + vm.selection_id).then( function( response ) {

		        	vm.selection = response.data;
		        });

		        axios.get('/api/selection/' + vm.selection_id + '/applications').then( function( response ) {

		            vm.applications = response.data;
		        });
		    },

		    mounted: function()	{

		    },

		    methods: {

		    	changeApplicationStatus: function(application_id, status)	{

		    		var vm = this;
		    		var key = this.applications.findIndex( function(a){ return a.id === application_id });
		    		
		    		if(key >= 0)	{

		    			var data = {status: status};

		    			axios.patch('/api/application/' + application_id, data).then( function()	{

		    				vm['applications'][key]['status'] = status;

		    			});
		    		}
		    	}
		    }

		});

$(document).ready(function()
	{
		
	});
</script>

@endsection