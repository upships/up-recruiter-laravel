<template>
	<div class="card card-default no-padding">
      	<div class="card-block">
      		
      		<div class="d-flex align-content-start">
		    	<div class="btn btn-tag btn-tag-light btn-tag-rounded mr-2">
		    		Native: {{language.label}}
		    	</div>

				<slot></slot>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['language']
	}
</script>