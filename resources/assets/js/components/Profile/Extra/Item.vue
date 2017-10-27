<template>
	<div class="card card-default no-padding">
      	<div class="card-block">
      	
	      	<h4>{{extra.label}}</h4>
	      	
	      	<p>{{extra.description}}</p>

	      	<div class="d-flex align-content-start">
		        	
	        	<div class="mr-2" v-if="extra.has_dates">
	        		
	        		<b>Datas:</b> 

	        		<span v-if="extra.start_year">{{extra.start_year}}</span>
	        		<span v-if="extra.end_year"> a {{extra.end_year}}</span>
	        	</div>
	        	
			</div>
		</div>
	</div>

</template>

<script>
	export default {

	}
</script>