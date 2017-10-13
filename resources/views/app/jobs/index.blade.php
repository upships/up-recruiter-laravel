@extends('layouts.master')
@section('page-title','Vagas em aberto')

@section('content')

<div class="row">
	<div class="col-lg-12 col-md-12">
    
    <h2>Vagas em aberto</h2>
        
    <div class="card card-default">
      <div class="card-body">
        <a href="/job/add" class="btn btn-success"><i class="fa fa-plus"></i> Nova vaga</a>
        <a href="/job/disabled" class="btn btn-default float-right"><i class="fa fa-eye-slash"></i> Vagas inativas</a>
      </div>
    </div>
        
    <div class="" v-if="!jobs.loaded" >
        <i class='fa fa-spinner fa-spin' ></i> Carregando &uacute;ltimas vagas
    </div>
    <div v-else>

      <div v-if="jobs.list.length > 0">
          <div class="list-group">
              <div class="list-group-item" v-for="job in jobs.list">

                  <h4>
                      <a :href='"/job/" + job.id' >@{{job.position.label}}</a>
                  </h4>
                  <ul class='list-inline' >
                      <li class="list-inline-item" >
                          @{{job.date}}
                      </li>
                      <li class="list-inline-item" >
                          <i class='fa fa-users' ></i> @{{job.applications.count}} candidatos
                      </li>
                  
                      <li class="list-inline-item" >
                          <a :href='"/job/" + job.id + "/close"' class="btn btn-success btn-sm" >
                              <i class='fa fa-check' ></i> Iniciar sele&ccedil;&atilde;o
                          </a>
                      </li>

                      <li class="list-inline-item" >
                          <a :href='"/job/" + job.id + "/share"' class="btn btn-primary btn-sm" >
                              <i class='fa fa-linkedin-square' ></i> Compartilhar
                          </a>
                      </li>
                      <li class="list-inline-item" >
                          <div class='dropdown' >
                              <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
                                  <i class='fa fa-cog fa-lg'></i> <span class="caret"></span>
                              </a>
                              <ul class='dropdown-menu dropdown-menu-right' >
                                  <li><a :href='"/job/" + job.id + "/edit"' ><i class='fa fa-pencil-square-o'></i> Editar</a></li>
                              </ul> 
                          </div>
                      </li>
                  </ul>    

              </div>
          </div>
      </div>
      <div v-else>
          <p>Nenhuma vaga.</p>
          <p><a href="/job/add" >Clique aqui para adiconar</a></p>
      </div>
    </div>
  </div>
</div>

@endsection

@section('local-footer')

<script>

    new Vue({

        el: '#up-app',

        data: {

            jobs: {
                loaded: false,
                list: []
            },
            
        },

        beforeMount: function() {

            const self = this;

            axios.get('/api/job').then( function(response) {

                self.jobs.list = response.data;
                self.jobs.loaded = true;
            });
        },

    });
</script>

@endsection
