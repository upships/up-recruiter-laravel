<template>
	<div class="card card-default">
		<div class="list-group list-group-flush">
			
			<div class="list-group-item">
		    	<div class="mr-2">
		    		País
		    	</div>
		    	<div>
		    		<b>{{coc.country.name}}</b> <span v-html='coc.country.icon'></span>
		    	</div>
			</div>

			<div class="list-group-item">
		    	<div class="mr-2">
		    		Validade
		    	</div>
		    	<div>
		    		{{coc.expiration_date}}
		    	</div>
			</div>

			<div class="list-group-item">
		    	<div class="mr-2">
		    		Regras STCW
		    	</div>
		    	<div class="mr-2" v-for="regulation in coc.regulations" >
		    		{{regulation.regulation}}
		    	</div>
			</div>

			<div class="list-group-item">
	      		<a :href="'/profile/' + coc.profile_id + '/coc'">detalhes</a>
	      	</div>
	      	
	    </div>
	</div>
</template>

<script>
	export default {
		props: ['coc']
	}
</script>