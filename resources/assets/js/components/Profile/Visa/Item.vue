<template>
	
	<div class="list-group-item">
    	<div class="mr-2">
    		{{visa.country.name}}
    	</div>
    	<div>
    		{{visa.type}}
    	</div>
    	<div>
    		{{visa.expiration_date}}
    	</div>
	</div>

</template>

<script>
	export default {
		props: ['visa']
	}
</script>