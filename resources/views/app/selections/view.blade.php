@extends('layouts.master')

@section('page-title')
	Processo Seletivo: {{$selection->label}}
@endsection

@section('content')

<div class="row">
	<div class="col">

		<h2>Processo seletivo: {{$selection->label}}</h2>

		<toolbar>
			<toolbar-button icon="clock-o" >Postada em {{$selection->date}}</toolbar-button>
			<toolbar-button icon="users" >@{{applications.length}} candidatos</toolbar-button>
		</toolbar>

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

		<h2 class="card-title">Candidatos</h2>

		<div class="row">
			<div class="col" v-if="applicationsOnScreening.length > 0">

				<h3 class="card-title">Em avalia&ccedil;&atilde;o</h3>

				<applications-list>
					<application-list-item v-for="application in applicationsOnScreening" :application="application" :selection_status="selection_status" :key="application.id" v-on:application:change="changeApplicationStatus" ></application-list-item>
				</applications-list>

			</div>

			<div class="col" v-if="applicationsOnInterviewing.length > 0">

				<h3 class="card-title">Em entrevista</h3>

				<applications-list>
					<application-list-item v-for="application in applicationsOnInterviewing" :application="application" :selection_status="selection_status" :key="application.id" v-on:application:change="changeApplicationStatus" ></application-list-item>
				</applications-list>

			</div>

			<div class="col" v-if="applicationsOnEmploymentOffering.length > 0">

				<h3 class="card-title">Avaliando propostas</h3>

				<applications-list>
					<application-list-item v-for="application in applicationsOnEmploymentOffering" :application="application" :selection_status="selection_status" :key="application.id" v-on:application:change="changeApplicationStatus" ></application-list-item>
				</applications-list>

			</div>

			<div class="col" v-if="applicationsOnHiring.length > 0">

				<h3 class="card-title">Em contrata&ccedil;&atilde;o</h3>

				<applications-list>
					<application-list-item v-for="application in applicationsOnHiring" :application="application" :selection_status="selection_status" :key="application.id" v-on:application:change="changeApplicationStatus" ></application-list-item>
				</applications-list>

			</div>

			<div class="col" v-if="applicationsOnOnboarding.length > 0">

				<h3 class="card-title">Em onboarding</h3>

				<applications-list>
					<application-list-item v-for="application in applicationsOnOnboarding" :application="application" :selection_status="selection_status" :key="application.id" v-on:application:change="changeApplicationStatus" ></application-list-item>
				</applications-list>

			</div>
		</div>
	</div>
</div>

@endsection

@section('local-footer')

<script type="text/x-template" id="application-list-item-template">

	<div class="card social-card share full-width" data-social="item">
		
		<div class="circle" data-toggle="tooltip" title="Label" data-container="body"></div>
			
		<div class="card-header clearfix">
			<h5 style="font-size: 16px !important;" @click="selectApplication" >
				
				@{{application.profile.name}} <i class="fa fa-spinner fa-spin" v-show="isLoading" ></i>

			</h5>
	  		<h6 class="my-2">
	  			<b>@{{application.profile.position.label}}</b>
	  		</h6>

	  		<h6>
			    <span class="location semi-bold d-flex justify-content-between ">
					@{{application.profile.city}}
					<span v-html="application.profile.country.icon"></span> 
			    </span>
	  		</h6>

		</div>
		<div class="card-description">
			
			<div class="d-flex justify-content-around">

		      	<a class="btn btn-tag btn-tag-light btn-tag-rounded" href="javascript:;" title="" @click="statusChange.isChanging = true" >
		      		<i class="fa fa-refresh"></i> Etapa
		      	</a>
			      	
		      	<a class="btn btn-tag btn-tag-light btn-tag-rounded" href="javascript:;" @click="sendMessage" title="Enviar mensagem" >
		        	<i class="fa fa-envelope"></i>
		      	</a>

		      	<a class="btn btn-tag btn-tag-light btn-tag-rounded" href="javascript:;" @click="" title="Solicitar documentos" >
		        	<i class="fa fa-file-pdf-o"></i>
		      	</a>
		  	</div>

		  	<hr/>

		  	<div class="my-2" v-show="statusChange.isChanging">
		  		<h6>Alterar etapa</h6>
			  	<div class="row" >
			  		<div class="col my-1" v-for="status in selection_status" >
			  			<button type="button" class="btn btn-default btn-xs" v-bind:class="{active: statusChange.status === status.id}" @click="statusChange.status = status.id" >
			  				@{{status.label}}
			  			</button>
			  		</div>
		        </div>
		        <div class="form-group my-2">
		        	<h6>Mensagem</h6>
		        	<textarea class="form-control" placeholder="Escreva uma mensagem (opcional)" v-model="statusChange.message" ></textarea>
		        </div>
		        <ul class="list-inline my-2" >
		        	<li class="list-inline-item">
			        	<button type="button" class="btn btn-success btn-xs" @click="changeStatus" >
			        		<i class="fa fa-check"></i> Confirmar
			        	</button>
			        </li>
			        <li class="list-inline-item float-right">
			        	<a href="javascript:;" class="text-muted" title="" @click="clearStepChange" >
			      			Cancelar
			    		</a>
			        </li>
			    </ul>
			</div>

			<div class="via">
				<ul class="list-inline d-flex justify-content-around">
					<li class="list-inline-item" >
				      	<a href="javascript:;" title="" >
				      		Perfil
				      	</a>
				    </li>
				    <li class="list-inline-item float-right" v-if="!showDetails">
						<a href="javascript:;" @click="showDetails = !showDetails" >Detalhes <i class="fa fa-angle-down"></i></a>
				    </li>
				    <li class="list-inline-item float-right" v-else>
						<a href="javascript:;" @click="showDetails = !showDetails" >Detalhes <i class="fa fa-angle-up"></i></a>
					</li>
				</ul>
			</div>

			<div v-if="showDetails">
				<h4>Detalhes</h4>
				<p v-show="application.notes" >
					@{{application.notes}}
				</p>
			  	<p v-show="application.salary" >
			    	Pretens&atilde;o salarial: @{{application.salary}}
			  	</p>
			</div>
		</div>
	</div>
</script>

<script>

Vue.component('application-list-item', {

  props: {
    application: { required: true },
    selection_status: { required: true },
  },
  
  data: function()  {

    return {
      isLoading: false,
      showDetails: false,

      statusChange: {
      	isChanging: false,
      	sendMessage: false,
      	message: null,
      	status: null,
      },

      isSelected: false,
    };
  },

  template: '#application-list-item-template',

  methods: {

  	sendMessage: function()	{

  				var recipients = this.application.profile.user_id;

    			window.location.href="/selection/" + this.application.selection_id + '/send_message?recipients=' + recipients;
    		},

  	clearStepChange: function()	{

  		this.statusChange.isChanging = false;
  		this.statusChange.status = null;
  	},

    changeStatus: function()  {

    	if(this.statusChange.status)	{
      		this.$emit('application:change', this.application.id, this.statusChange);
      	}

    },

    selectApplication: function(application_id)	{


    },

  },

});
	

new Vue({

	    el: '#up-app',
	    data: {

	    	applications: [],
	    	selectedApplications: [],

	        selection: [],
	        selection_id: {{$selection->id}},

	        selection_status: [{id: 1,label: 'Avaliação'},{id: 2,label: 'Entrevista'},{id: 3,label: 'Proposta'},{id: 4,label: 'Contratação'},{id: 5,label: 'Onboarding'},],
	    },

	    methods: {

	    	getApplicationKey: function(application_id)	{

	    		return this.applications.findIndex(function(a){return a.id === application_id}) >=0 ;
	    	},

	    	changeApplicationStatus: function(application_id, statusChange)	{

	    		var vm = this;
	    		var key = this.getApplicationKey(application_id);
	    		
	    		if(key >= 0)	{

	    			var data = {status: statusChange.status};

	    			axios.patch('/api/application/' + application_id, data).then( function()	{

	    				vm['applications'][key]['status'] = statusChange.status;

	    			});
	    		}
	    	},

	    	selectApplication: function(application_id)	{

	    		var key = this.getApplicationKey(application_id);

	    		if(key)	{

	    			this['applications'][key]['isSelected'] = true;
	    			this.selectedApplication.push(this['applications'][key]);
	    		}
    		},

    		deselectApplication: function(key)	{

    			// Get Application ID
    			var application_id = this['selectedApplication'][key]['id'];

    			// Remove from list
    			Vue.delete(this['selectedApplication'], key);

    			// Change "isSelected"
    			this['applications'][this.getApplicationKey(application_id)]['isSelected'] = false;
    		},

    		messageManyApplicants: function()	{

    			// Get Selected Applications
    			var recipients = this.selectedApplications.filter(function(application)	{
    								return application.profile.user.id;
    							});

    			// Trigger the method to send the message
    			this.sendMessage(recipients);
    		},

    		sendMessage: function(recipients)	{

    			var recipients = recipients.join(',');

    			window.location.href="/selection/" + this.selection_id + '/message?recipients=' + recipients;
    		},

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

	    beforeMount: function() {

	        const vm = this;

	        axios.get('/api/selection/' + vm.selection_id).then( function( response ) {

	        	vm.selection = response.data;
	        });

	        axios.get('/api/selection/' + vm.selection_id + '/applications').then( function( response ) {

	        	var applications = response.data.map( function(application)	{
	        		application.isSelected = false;

	        		return application;
	        	});

	            vm.applications = applications;
	        });
	    },
	});

$(document).ready(function()
	{
		
	});
</script>

@endsection