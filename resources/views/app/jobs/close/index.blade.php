@extends('layouts.master')
@section('page-title','Encerrar vaga')

@section('content')

<form method="post" action="/job/{{$job->id}}/close" >

	{{csrf_field()}}
	{{method_field('PATCH')}}

	<div class="row">
		<div class="col">

			<h2>Encerrar vaga</h2>
			<h3>Iniciando processo seletivo para {{$job->position->label}}</h3>

			<div class="card card-default">
				<div class="card-block">

					<ul class="list-inline">
						<li class="list-inline-item" >
							<button type="submit" class="btn btn-success btn-lg" ><i class='fa fa-check' ></i> Iniciar processo seletivo</button>
						</li>

						<li class="list-inline-item float-right">
							<a href="/job/{{$job->id}}" class="btn btn-default btn-lg btn-fill" ><i class='fa fa-undo' ></i> Cancelar</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">

			<h3><i class="fa fa-check text-success"></i> Candidatos selecionados</h3>

			<div class="card card-default">

				<div class="card-header">
					<div class="card-title" >Mensagem aos selecionados</div>
				</div>
				<div class="card-block">	
					<div class="form-group">
						<label for="qualified_subject" >Assunto</label>
						<input type="text" id="qualified_subject" class="form-control" placeholder="Insira um assunto" value="Atualização sobre candidatura" name="qualified[message][subject]" >
					</div>

					<div class="form-group">
						<label for="qualified_message" >Mensagem</label>
						<textarea class="form-control" id="qualified_message" placeholder="Escreva um texto" name="qualified[message][message]" ></textarea>
					</div>
				</div>
			</div>

			<div class="card card-default">

				<div class="list-group list-group-flush">
					
					<div class="list-group-item flex-column align-items-start" v-for="application in qualifiedApplications" >
						<input type="hidden" name="qualified[applications][]" :value="application.id" checked="checked">

				    	<h6 class="">
	                		<a :href="'/profile/' + application.profile.id" target="_blank" class="text-success" >
	                			@{{application.profile.name}}
	                		</a>
	                	</h6>

	                	<span>@{{application.profile.position.label}}</span>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="col">

			<h3><i class="fa fa-times text-danger"></i> Candidatos eliminados</h3>

			<div class="card card-default">
				<div class="card-header">
					<h3 class="card-title" >Mensagem aos eliminados</h3>
				</div>
				<div class="card-block">
					<div class="form-group">
						<label for="eliminated_subject" >Assunto</label>
						<input type="text" class="form-control" id="eliminated_subject" placeholder="Insira um assunto" value="Atualização sobre candidatura" name="eliminated[message][subject]" >
					</div>

					<div class="form-group">
						<label for="eliminated_message" >Mensagem</label>
						<textarea class="form-control" id="eliminated_message" placeholder="Escreva um texto" name="eliminated[message][message]" ></textarea>
					</div>
				</div>
			</div>

			<div class="card card-default">

				<div class="list-group list-group-flush">

					<div class="list-group-item flex-column align-items-start" v-for="application in eliminatedApplications" >

						<input type="hidden" name="eliminated[applications][]" :value="application.id" checked="checked">
	                	
	                	<h5 class="">
	                		<a :href="'/profile/' + application.profile.id" target="_blank" class="text-danger" >
	                			@{{application.profile.name}}
	                		</a>
	                	</h5>

			            <span>@{{application.profile.position.label}}</span>
			            
					</div>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection

@section('local-footer')

<script>

	$(document).ready(function() {
			
			new Vue({

		    el: '#up-app',
		    data: {

		    	applications: [],

		        job_id: {{$job->id}},
		    },

		    computed: {

		    	qualifiedApplications: function()	{

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
		    },

		    beforeMount: function() {

		        const vm = this;

		        axios.get('/api/job/' + vm.job_id + '/applications').then( function( response ) {

		            vm.applications = response.data;
		        });
		    },

		    methods: {

		    }

		});

	});

</script>
@endsection
