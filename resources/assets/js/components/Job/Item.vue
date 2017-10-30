<template>

	<div class="card card-default" >
        <div class="card-block">

          	<h3>
              	<a :href='"/job/" + job.id' >{{job.position.label}}</a>
          	</h3>

          	<ul class='list-inline' >
              	<li class="list-inline-item" >
                  {{job.created_at}}
              	</li>
              	<li class="list-inline-item" >
                  {{job.applications_count}} candidatos
              	</li>
          	</ul>

          	<ul class='list-inline' >
              	<li class="list-inline-item" >
                  	<a :href='"/job/" + job.id + "/close"' class="btn btn-success btn-xs" >
                      	<i class='fa fa-check' ></i> Iniciar sele&ccedil;&atilde;o
                  	</a>
              	</li>

              	<li class="list-inline-item" >
	                <a :href='"/job/" + job.id + "/share"' class="btn btn-primary btn-xs" >
	                    <i class='fa fa-share' ></i> Compartilhar
	                </a>
              	</li>
              	<li class="list-inline-item" >
	                <div class="dropdown dropdown-default">
		                  <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                    Mais
		                  </button>
		                  <div class="dropdown-menu">
		                    	<a class="dropdown-item" :href='"/job/" + job.id + "/edit"'>Editar</a>
		                  </div>
	                </div>
              	</li>
          	</ul>    

     	</div>
  	</div>

</template>

<script>

	export default {

		props: ['job'],

	}

</script>