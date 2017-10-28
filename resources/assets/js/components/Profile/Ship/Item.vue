<template>

	<div class="btn btn-default mr-2" >
		{{ship.ship_type.label}}
	</div>
	
</template>

<script>
  export default {

  	props: ['ship']
  }
</script>