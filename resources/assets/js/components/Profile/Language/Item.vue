<template>
	
	<div class="btn btn-tag btn-tag-light btn-tag-rounded mr-2">
    	{{language.language.label}} ({{language.level_label}})
	</div>

</template>

<script>
	export default {
		props: ['language']
	}
</script>