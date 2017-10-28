<template>

	<div class="btn btn-tag btn-tag-light btn-tag-rounded mr-2" >
		{{ship.ship_type.label}}
	</div>
	
</template>

<script>
  export default {

  	props: ['ship']
  }
</script>