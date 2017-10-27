@extends('layouts.master')
@section('page-title','Vagas em aberto')

@section('content')

<div class="row">
	<div class="col">
    
    <h2>Vagas em aberto</h2>
        
    <div class="card card-default">
      <div class="card-block">
        <a href="/job/add" class="btn btn-success"><i class="fa fa-plus"></i> Nova vaga</a>
        <a href="/job/disabled" class="btn btn-default float-right"><i class="fa fa-eye-slash"></i> Vagas inativas</a>
      </div>
    </div>
        
    <div class="" v-if="!jobs.loaded" >
        <i class='fa fa-spinner fa-spin' ></i> Carregando &uacute;ltimas vagas
    </div>
    <div v-else>

      <div v-if="jobs.list.length > 0">
          
              <div class="card card-default" v-for="job in jobs.list">
                <div class="card-block">

                  <h3>
                      <a :href='"/job/" + job.id' >@{{job.position.label}}</a>
                  </h3>

                  <ul class='list-inline' >
                      <li class="list-inline-item" >
                          @{{job.created_at}}
                      </li>
                      <li class="list-inline-item" >
                          @{{job.applications_count}} candidatos
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
