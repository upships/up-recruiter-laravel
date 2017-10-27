<template>
	
	<div class="list-group-item">
    	<div class="mr-2">
    		{{language.language.label}}
    	</div>
    	<div>
    		{{language.level_label}}
    	</div>
	</div>

</template>

<script>
	export default {
		props: ['language']
	}
</script>