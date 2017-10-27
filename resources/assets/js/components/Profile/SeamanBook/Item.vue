<template>
  	<div class="card card-default no-padding">
      	<div class="list-group list-group-flush">

      		<div class="list-group-item" >
      			<div class="mr-2" >
      				Pa&iacute;s
      			</div>
      			<div class="mr-2" >
      				<b>{{seaman_book.country.name}}</b>
      			</div>
      		</div>

      		<div class="list-group-item" >
      			<div class="mr-2" >
      				Tipo
      			</div>
      			<div class="mr-2" >
      				<b>{{seaman_book.seaman_book_type.label}}</b>
      			</div>
      		</div>

      		<div class="list-group-item" >
      			<div class="mr-2" >
      				Validade
      			</div>
      			<div class="mr-2" >
      				<b>{{seaman_book.expiration_date}}</b>
      			</div>
      		</div>

      		<div class="list-group-item">
	      		<a :href="'/profile/seaman_book/' + seaman_book.id">detalhes</a>
	      	</div>
	      	
        </div>
  	</div>
</template>

<script>
  export default {

  	props: ['seaman_book']

  }
</script>