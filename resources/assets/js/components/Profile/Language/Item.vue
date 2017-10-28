<template>
	
	<div class="btn btn-default mr-2">
    	{{language.language.label}} ({{language.level_label}})
	</div>

</template>

<script>
	export default {
		props: ['language']
	}
</script>