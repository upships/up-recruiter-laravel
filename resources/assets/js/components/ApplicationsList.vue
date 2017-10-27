<template>
	<div class="feed" >
		<div class="day">
		  	<div class="row">
		    	<slot></slot>
		  	</div>
		</div>
	</div>
</template>

<script>

	export default {

		props: {

            filters: {
                        default: function() { return []; }
                     },
          },

          mounted: function() {

              // Compare filters
          },
	}


</script>