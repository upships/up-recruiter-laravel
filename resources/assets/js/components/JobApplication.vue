<template>

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

				<p v-show="application.remarks" >
					@{{application.remarks}}
				</p>

		  	<p v-show="application.salary" >
		    	Pretens&atilde;o salarial: @{{application.salary}}
		  	</p>

		  	<div class="row">
		    	<div class="col" v-if="application.profile.stcw_regulations" >
		      		<h6>Regras STCW</h6>
		      		
		      		<ul class="list-inline" >
				        <li class="list-inline-item" v-for="stcw_regulation in application.profile.stcw_regulations" >
				          <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{stcw_regulation.stcw_regulation.regulation}}</button>
				        </li>
		    	  	</ul>
		    	</div>
		    	<div class="col" v-if="application.profile.seaman_books" >
		      		<h6>Categorias CIR</h6>
		      		
		      		<ul class="list-inline">
				        <li class="list-inline-item" v-for="seaman_book in application.profile.seaman_books" >
				          <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{seaman_book.seaman_book_type.label}}</button>
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
</template>

<script>
	
	export default {

		props: {
		        
		        application: { required: true },
		    },
		      
		    data: function()  {

		        return {
		          isLoading: false,
		        };
		    },

		methods: {

		        changeStatus: function(application_id, status)  {

		          this.$emit('application:change', application_id, status);

		        }

		    },

	}

</script>