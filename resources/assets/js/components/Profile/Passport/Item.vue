<template>
	
	<div class="list-group-item">
    	<div class="mr-2">
    		{{passport.country.name}}
    	</div>
    	<div>
    		{{passport.expiration_date}}
    	</div>
	</div>

</template>

<script>
	export default {
		props: ['passport']
	}
</script>