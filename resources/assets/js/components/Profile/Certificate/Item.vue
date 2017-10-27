<template>
  	<div class="card card-default no-padding">
      	<div class="card-block">

      		<h4>{{certificate.certificate_type.label}}</h4>

	    	<div class="d-flex align-content-start">
	        	
	        	<div class="mr-2" v-if="certificate.issue_date">
	        		<b>Emiss&atilde;o:</b> {{certificate.issue_date}}
	        	</div>

	        	<div class="mr-2" v-if="certificate.expiration_date">
	        		<b>Validade:</b> {{certificate.expiration_date}}
	        	</div>

	        	<div class="mr-2" v-if="certificate.school">
	        		<b>Centro de treinamento:</b> {{certificate.school}}
	        	</div>
	        </div>

        	<div class="my-2" v-if="certificate.remarks">
        		<b>Notas:</b> {{certificate.remarks}}
        	</div>
        	
        </div>
  	</div>
</template>

<script>
  export default {

  	props: ['certificate']

  }
</script>