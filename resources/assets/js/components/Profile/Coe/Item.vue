<template>
	<div class="card card-default">
		<div class="list-group list-group-flush">
			
			<div class="list-group-item">
		    	<div class="mr-2">
		    		Country
		    	</div>
		    	<div>
		    		<b>{{coe.country.name}}</b> <span v-html='coe.country.icon'></span>
		    	</div>
			</div>

			<div class="list-group-item">
		    	<div class="mr-2">
		    		Expires on
		    	</div>
		    	<div>
		    		{{coe.expiration_date}}
		    	</div>
			</div>

			<div class="list-group-item">
	      		<a :href="'/profile/coe/' + coe.id">details</a>
	      	</div>
	      	
	    </div>
	</div>
</template>

<script>
	export default {
		props: ['coe']
	}
</script>