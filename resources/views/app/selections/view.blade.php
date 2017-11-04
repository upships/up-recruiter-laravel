@extends('layouts.master')

@section('page-title')
	Processo Seletivo: {{$selection->label}}
@endsection

@section('content')

<div class="row">
	<div class="col">

		<h2>Processo seletivo: {{$selection->label}}</h2>

		<toolbar>
			<toolbar-item icon="clock-o" >Postada em {{$selection->date}}</toolbar-item>
			<toolbar-item icon="users" >@{{applications.length}} candidatos</toolbar-item>
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

		<div class="card card-default no-padding" v-if="selectedApplications.length > 0">
			<div class="card-header">
				<h3 class="card-title">Selecionados</h3>
			</div>
			<div class="card-block d-flex align-content-start">
				<div class="btn-group m-2" v-for="application in selectedApplications">
					<div class="btn btn-default btn-sm" >
						@{{application.profile.name}} 
					</div>

					<div class="btn btn-default btn-sm" @click="toggleSelectApplication(application.id, false)" >
						<i class="fa fa-times"></i>
					</div>
				</div>
			</div>
			<div class="card-block d-flex align-content-start">
				<button type="button" @click="messageInBulk" class="btn btn-default btn-sm mr-2" >
					<i class="fa fa-envelope-o"></i> Mensagem
				</button>

				<button type="button" @click="requestDocumentsInBulk" class="btn btn-default btn-sm mr-2" >
					<i class="fa fa-file-pdf-o"></i> Sol. documentos
				</button>

				<button type="button" @click="changeApplicationStatusInBulk" class="btn btn-default btn-sm mr-2" >
					<i class="fa fa-refresh"></i> Alterar etapa
				</button>

			</div>
		</div>

		<div class="row">
			<div class="col" v-if="applicationsOnScreening.length > 0">

				<h3 class="card-title">Em avalia&ccedil;&atilde;o</h3>

				<selection-applications>
					<selection-application v-for="application in applicationsOnScreening" :application="application" :selection_status="selection_status" :key="application.id" v-on:application:change="changeApplicationStatus" v-on:application:select="toggleSelectApplication" ></selection-application>
				</selection-applications>

			</div>

			<div class="col" v-if="applicationsOnInterviewing.length > 0">

				<h3 class="card-title">Em entrevista</h3>

				<selection-applications>
					<selection-application v-for="application in applicationsOnInterviewing" :application="application" :selection_status="selection_status" :key="application.id" v-on:application:change="changeApplicationStatus" v-on:application:select="toggleSelectApplication" ></selection-application>
				</selection-applications>

			</div>

			<div class="col" v-if="applicationsOnEmploymentOffering.length > 0">

				<h3 class="card-title">Avaliando propostas</h3>

				<selection-applications>
					<selection-application v-for="application in applicationsOnEmploymentOffering" :application="application" :selection_status="selection_status" :key="application.id" v-on:application:change="changeApplicationStatus" v-on:application:select="toggleSelectApplication" ></selection-application>
				</selection-applications>

			</div>

			<div class="col" v-if="applicationsOnHiring.length > 0">

				<h3 class="card-title">Em contrata&ccedil;&atilde;o</h3>

				<selection-applications>
					<selection-application v-for="application in applicationsOnHiring" :application="application" :selection_status="selection_status" :key="application.id" v-on:application:change="changeApplicationStatus" v-on:application:select="toggleSelectApplication" ></selection-application>
				</selection-applications>

			</div>

			<div class="col" v-if="applicationsOnOnboarding.length > 0">

				<h3 class="card-title">Em onboarding</h3>

				<selection-applications>
					<selection-application v-for="application in applicationsOnOnboarding" :application="application" :selection_status="selection_status" :key="application.id" v-on:application:change="changeApplicationStatus" v-on:application:select="toggleSelectApplication" ></selection-application>
				</selection-applications>

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

	        selection: [],
	        selection_id: {{$selection->id}},

	        selection_status: [{id: 1,label: 'Avaliação'},{id: 2,label: 'Entrevista'},{id: 3,label: 'Proposta'},{id: 4,label: 'Contratação'},{id: 5,label: 'Onboarding'},],
	    },

	    methods: {

	    	toggleSelectApplication: function(application_id, isSelected)	{

	    		var key = this.getApplicationKey(application_id);		
	    		this['applications'][key]['isSelected'] = isSelected;
	    	},

	    	getApplicationKey: function(application_id)	{

	    		return this.applications.findIndex(function(a){return a.id === application_id});
	    	},

	    	changeApplicationStatus: function(application_id, statusChange)	{

	    		var vm = this;
	    		var key = this.getApplicationKey(application_id);
	    		
	    		if(key >= 0)	{

	    			var data = {status: statusChange.status};

	    			axios.patch('/json/application/' + application_id, data).then( function()	{

	    				vm['applications'][key]['status'] = statusChange.status;

	    			});
	    		}
	    	},

	    	changeApplicationStatusInBulk: function()	{

	    		// this.applications.filter(function(application) {

	    		// });

	    	},

	    	requestDocumentsInBulk: function()	{


	    	},

	    	// selectApplication: function(application_id)	{

	    	// 	var key = this.getApplicationKey(application_id);

	    	// 	if(key)	{

	    	// 		this['applications'][key]['isSelected'] = true;
	    	// 		this.selectedApplication.push(this['applications'][key]);
	    	// 	}
    		// },

    		// deselectApplication: function(key)	{

    		// 	// Get Application ID
    		// 	var application_id = this['selectedApplication'][key]['id'];

    		// 	// Remove from list
    		// 	Vue.delete(this['selectedApplication'], key);

    		// 	// Change "isSelected"
    		// 	this['applications'][this.getApplicationKey(application_id)]['isSelected'] = false;
    		// },

    		messageInBulk: function()	{

    			// Get Selected Applications
    			var recipients = [];

    			this.applications.forEach(function(application)	{

    								if(application.isSelected)	{
    									recipients.push(application.profile.user.id);
    								}
    							});

    			// Trigger the method to send the message
    			this.sendMessage(recipients);
    		},

    		sendMessage: function(recipients)	{

    			var recipients = recipients.join(',');

    			window.location.href="/conversation/add/?selection_id=" + this.selection_id + '&recipients=' + recipients;
    		},

	    },

	    computed: {


	    	selectedApplications: function()	{

	    		var self = this;

	    		return self.applications.filter( function( application )	{

	    			if(application.isSelected == 1)	{

	    				return application;
	    			}

	    		});

	    	},

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

	        axios.get('/json/selection/' + vm.selection_id).then( function( response ) {

	        	vm.selection = response.data;
	        });

	        axios.get('/json/selection/' + vm.selection_id + '/applications').then( function( response ) {

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