<template>

	<div class="card social-card share full-width" data-social="item">
					
		<div class="card-header clearfix" @click="toggleSelection" >

			<a href="javascript:;" class="float-right" >
				<span class="fa-stack" :class="{'text-success': application.isSelected}" >
				  	<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-check fa-stack-1x fa-inverse"></i>
				</span>
			</a>

			<h5 style="font-size: 16px !important;" >
				
				{{application.profile.name}} <i class="fa fa-spinner fa-spin" v-show="isLoading" ></i>

			</h5>
	  		<h6 class="my-2">
	  			<b>{{application.profile.position.label}}</b>
	  		</h6>

	  		<h6>
			    <span class="location semi-bold d-flex justify-content-start ">
					<span class="mr-2" v-html="application.profile.country.icon"></span>
					{{application.profile.city}}
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
			  				{{status.label}}
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
				      	<a :href="'/profile/' + application.profile.id" title="Ver Perfil" >
				      		Ver Perfil
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
					{{application.notes}}
				</p>
			  	<p v-show="application.salary" >
			    	Pretens&atilde;o salarial: {{application.salary}}
			  	</p>
			</div>
		</div>
	</div>
</template>

<script>

export default {

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
	      		}
	    }
	  },

	methods: {

	  	sendMessage: function()	{

	  				var recipients = this.application.profile.user_id;

	    			window.location.href="/conversation/add?selection_id=" + this.application.selection_id + '&recipients=' + recipients;
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

	    toggleSelection: function()	{

	    	this.application.isSelected = !this.application.isSelected;
			this.$emit('application:select', this.application.id, this.application.isSelected);
	    },

	},

}

</script>