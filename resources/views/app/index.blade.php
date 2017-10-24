@extends('layouts.master')
@section('page-title','Início')

@section('content')

    <div class="row">
        <div class="col">
            <div class="card card-default">
                <div class="card-block">
                    <ul class="list-inline">
                        <li>
                            <img src="{{auth()->user()->company->logo}}" class="img-circle logo-40">
                        </li>
                        <li>
                            <h4><a href="/account">{{auth()->user()->name}}</a></h4>
                            <a href="/company/edit" >{{auth()->user()->company->name}}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card card-default">
                <div class="card-block">
                    
                    <h3>Vagas em aberto</h3>

                    <div class="" v-if="!jobs.loaded" >
                        <i class='fa fa-spinner fa-spin' ></i> Carregando &uacute;ltimas vagas
                    </div>
                    <div v-else>

                        <div v-if="jobs.list.length > 0">
                            
                            <div class="card card-default" v-for="job in jobs.list">
                                <div class="card-block">
                                    <h4>
                                        <a :href='"/job/" + job.id' >@{{job.position.label}}</a>
                                    </h4>
                                    <ul class='list-inline' >
                                        <li class="list-inline-item" >
                                            @{{job.date}}
                                        </li>
                                        <li class="list-inline-item" >
                                            <i class='fa fa-users' ></i> @{{job.applications_count}} candidatos
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
                                                <i class='fa fa-linkedin-square' ></i> Compartilhar
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

        </div>
        <div class="col">

            <div class="card card-default"><!-- /primary heading -->
                <div class="card-header">
                    <h3>
                        Nova vaga
                    </h3>
                </div>
                <div class="card-block">
                    <form method="post" action="/job" role="form"  >
                        {{csrf_field()}}

                        <div class="form-group" >
                            <label for='position'>Fun&ccedil;&atilde;o</label>
                            <select class="full-width select2" name="position_id" data-placeholder="Selecione uma função" required='required' >
                            <option disabled selected> -- Selecione uma fun&ccedil;&atilde;o -- </option>
                              @foreach($positions as $position)
                              <option value="{{$position->id}}" >{{$position->label}}</option>
                              @endforeach
                            </select>
                        </div>
                            
                        <div class="form-group" >
                            <label for='ship_type_id'>Embarca&ccedil;&atilde;o</label>
                            <select class="full-width select2" name="ship_type_id" data-placeholder="Selecione uma função" required='required' >
                            <option disabled selected> -- Selecione uma embarcação -- </option>
                              @foreach($ship_types as $ship_type)
                              <option value="{{$ship_type->id}}" >{{$ship_type->label}}</option>
                              @endforeach
                            </select>
                        </div>
                            
                        <div class="form-group" >
                          <label for="privacy" >Privacidade da vaga</label>
                          <select class="form-control" name="privacy" >
                              <option value="1" >Aberta</option>
                              <option value="2" >Confidencial</option>
                              <option value="3" >Particular</option>
                          </select>
                        </div>

                        <div class="form-group" >
                            <button type="submit" class="btn btn-success">Prosseguir <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card card-default"><!-- /primary heading -->
                <div class="card-header">
                    <h3>
                        Processos seletivos em aberto
                    </h3>
                </div>
                <div class="card-block">
                    
                    <div class="" v-if="!selections.loaded" >
                        <i class='fa fa-spinner fa-spin' ></i> Carregando &uacute;ltimas vagas
                    </div>
                    <div v-else>

                        <div v-if="selections.list.length > 0">
                            <div class="list-group">
                                <div class="list-group-item" v-for="selection in selections.list">
                                    <h4 class="list-group-item-heading">
                                    <a :href="'/selection/' + selection.id">@{{selection.position.label}}</a></h4>
                                    <ul class="list-inline m-b-10">
                                        <li><i class="fa fa-clock-o"></i> Em @{{selection.date}}</li>
                                        <li><i class="fa fa-users"></i> @{{selection.applications_count}} candidatos no processo</li>
                                    </ul>  
                                </div>
                            </div>
                        </div>

                        <div v-else>
                            <p>Nenhum processo seletivo.</p>
                            <p><a href="/job/add" >Clique aqui para adiconar uma vaga</a></p>
                        </div>

                    </div>
                </div>
            </div>  
        </div>    
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6">
            <h3>Adicionar recrutador</h3>
            <form method="post" action="/company/recruiter" >
                
                {{csrf_field()}}
                
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-" >
                        <div class="form-group" >
                            <input type="text" class="form-control" name="name" placeholder="Nome" required/>
                        </div>

                        <div class="form-group" >
                            <input type="email" class="form-control" name="email" placeholder="Email" required/>
                        </div>
                    </div>
                    <div class="col-md-4" >
                        <button type="submit" class="btn btn-default"><i class="fa fa-plus" ></i> Adicionar</button>
                    </div>
                </div>
            </form>
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

            selections: {
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

            axios.get('/api/selection').then( function(response) {

                self.selections.list = response.data;
                self.selections.loaded = true;
            });
        },


    });
</script>

@endsection