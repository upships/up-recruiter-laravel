<template>

	<div class="list-group-item" >
		{{ship.ship_type.label}}
	</div>
	
</template>

<script>
  export default {

  	props: ['ship']

  }
</script>