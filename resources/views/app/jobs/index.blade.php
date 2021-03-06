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

        <jobs-list>
        	<jobs-item v-for="job in jobs.list" :job="job" :key="job.identifier" ></jobs-item>
        </jobs-list>

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

            axios.get('/json/job').then( function(response) {

                self.jobs.list = response.data;
                self.jobs.loaded = true;
            });
        },

    });
</script>

@endsection
