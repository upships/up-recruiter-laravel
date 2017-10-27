<template>
	<a :href="'/selection/' + selection.id" class='list-group-item d-flex justify-content-start' >
    	
    	<h5>{{selection.label}}</h5>

        <div class="p-2">
          <i class="fa fa-calendar-o"></i> Em {{selection.date}}
        </div>

        <div class="p-2">
          {{selection.applications_count}} <small>candidatos</small>
        </div>
  	</a>
</template>

<script>
	export default {

		props: ['selection']
	}

</script>


	