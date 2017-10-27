<template>
	<div class="card card-default no-padding">
      	<div class="list-group list-group-flush">
      		
      		<div class="list-group-item">
		    	<div class="mr-2">
		    		Nativo
		    	</div>
		    	<div>
		    		{{language.label}}
		    	</div>
			</div>
			
			<slot></slot>

		</div>
	</div>
</template>

<script>
	export default {
		props: ['language']
	}
</script>