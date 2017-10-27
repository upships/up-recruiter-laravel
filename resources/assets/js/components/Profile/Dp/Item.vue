<template>
	<div class="card card-default no-padding">
      	<div class="list-group list-group-flush">
      		
      		<div class="list-group-item">
	      		<div class="mr-2" >Tipo:</div>
	      		<div class="mr-2" ><b>{{dp.type.label}}</b></div>
	      	</div>
	      	
	      	<div class="list-group-item" v-if="dp.expires_at">
	      		<div class="mr-2" >
	      			<div class="mr-2" >Validade:</div>
	      			<div><b>{{dp.expiration_date}}</b></div>
	      		</div>
	      	</div>

	      	<div class="list-group-item" v-if="dp.school" >
	      		<div class="mr-2" >
	      			<div class="mr-2" >Cursou em:</div>
	      			<div><b>{{dp.school}}</b></div>
	      		</div>
	      	</div>

	      	<div class="list-group-item">
	      		<a :href="'/profile/' + dp.profile_id + '/dp'">detalhes</a>
	      	</div>
	    </div>
	</div>

</template>

<script>
	export default {
		props: ['dp']
	}
</script>