<template>
	
	<div class="card card-default no-padding">
      	<div class="card-block">
      	
	      	<h4>{{education.label}}</h4>
	      	
	      	<p>{{education.description}}</p>

	      	<div class="d-flex align-content-start">
		        	
	        	<div class="mr-2" v-if="education.has_dates">
	        		<b>Data:</b> 

	        		<span v-if="education.start_year">{{education.start_year}}</span>
	        		<span v-if="education.end_year"> a {{education.end_year}}</span>
	        	</div>

	        	<div class="mr-2" v-if="education.school">
			    	Institui&ccedil;&atilde;o: {{education.school}}
			    </div>
			</div>
		</div>
	</div>

</template>

<script>
	export default {
		props: ['education']
	}
</script>