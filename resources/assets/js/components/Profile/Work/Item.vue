<template>

	<div class="card card-default no-padding">
      	<div class="card-block">

    		<h4>{{work.position.label}}</h4>

    		<div class="d-flex align-content-start">
	        	
	        	<div class="mr-2">
	        		Empresa: {{work.company_name}}
	        	</div>

	        	<div class="mr-2">
	        		Per&iacute;odo: 

	        		<span v-if="work.is_current">Emprego atual, in&iacute;cio em {{work.start_date}} ({{work.duration}} meses)</span>
	        		<span v-else>De {{work.start_date}} a {{work.end_date}} ({{work.duration}} meses)</span>
	        	</div>
	        </div>
				
			<div v-if="work.ships.length > 0" >
				
				<h5>Embarca&ccedil;&otilde;es:</h5>
				
				<div class="d-flex align-content-start" >
					<div class="mr-2" v-for="ship in work.ships" >
						{{ship.ship_type.label}} <span v-if="ship.name">({{ship.name}})</span>
					</div>
				</div>
			
			</div>

		</div>
    </div>

</template>

<script>
  export default {

  	props: ['work']

  }
</script>