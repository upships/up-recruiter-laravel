@extends('layouts.master')
@section('page-title')
Editar vaga {{$job->position->label}}
@endsection

@section('content')

  <form method="post" action="/job/{{$job->id}}" >
    
    {{method_field('PATCH')}}
    {{csrf_field()}}

    @if($job->status == 0)
    <input type="hidden" name="status" value="1" >
    @endif

    <div class="row">
      <div class="col">
        
        <h2>Editar vaga</h2>

        <div class="card card-default">
          <div class="card-block">

            <div class="list-inline">
              
              <li class="list-inline-item">
                <button type="submit" class="btn btn-success" >
                  @if($job->status == 0)
                    <i class='fa fa-check'></i> Publicar
                  @else
                    <i class='fa fa-save'></i> Salvar altera&ccedil;&otilde;es
                  @endif
                </button>
              </li>
              
              <li class="list-inline-item float-right" >
                <a href="/data" class="btn btn-default" target="_blank" ><i class="fa fa-database"></i> Adc. dados</a>
              </li>

              <li class="list-inline-item float-right" >
                <a href="/job/{{$job->id}}" class="btn btn-default" ><i class="fa fa-times"></i> Cancelar</a>
              </li>

              <!-- <li class="list-inline-item float-right" >
                <div class="dropdown dropdown-default">
                  <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Op&ccedil;&otilde;es
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="/data" target="_blank" >Adicionar dados</a>
                  </div>
                </div>
              </li> -->

            </div>
          </div>
        </div>
        
        <div class="card card-default">
          <div class="card-block">
            <div class="row" >
              
              @if($job->status > 0)
              
                <div class="col">

                  <div class="form-group">
                    <label for="position" >Status</label>

                    <select class="form-control" name="status" >
                        <option value="{{$job->status}}" selected>{{$job->status_label}}</option>
                        <option value="0">Inativa</option>
                        <option value="1">Ativa</option>
                        <option value="2">Encerrada</option>
                    </select>
                  
                  </div>

                </div>
              @endif

            <div class="col">
              <div class="form-group">
                <label for="visibility" >Privacidade</label>

                <select class="form-control" name="visibility" >
                    <option value="{{$job->visibility}}" selected>{{$job->visibility_label}}</option>
                    <option value="1">Aberta</option>
                    <option value="2">Confidencial</option>
                    <option value="3">Secreta</option>
                </select>
              
              </div>
            </div>
            
            <div class="col">
              <div class="form-group">
                <label>Data</label>
                <input type="text" readonly class="form-control" value="{{$job->date}}">
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="expires_at" >Validade <b>(mm/dd/yyyy)</b></label>
                <input type="text" class="form-control datepicker" name="expires_at" value="{{$job->full_expiration_date}}" >
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="card card-default my-2">
        <div class="card-block">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="position" >Fun&ccedil;&atilde;o</label>

                <select class="form-control sel2" >
                    <option value="{{$job->position->id}}">{{$job->position->label}}</option>

                    @foreach($positions as $position)
                      <option value="{{$position->id}}">{{$position->label}}</option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="ship_type" >Embarca&ccedil;&atilde;o</label>
                <select class="form-control sel2" >
                    <option value="{{$job->ship_type->id}}">{{$job->ship_type->label}}</option>
                    @foreach($ship_types as $ship_type)
                      <option value="{{$ship_type->id}}">{{$ship_type->label}}</option>
                    @endforeach
                </select>
              </div>
            </div>

            <div class="col">
                <div class="form-group">
                  <label for="location" >Local de atua&ccedil;&atilde;o</label>
                  <input class="form-control" name="location" id="location" placeholder="Ex.: Rio de Janeiro, Bacia de Santos" value="{{$job->rotation}}" >
                </div>
              </div>

          </div>
        </div>
      </div>

        <div class="card card-default my-2">
          <div class="card-block">
            
            <h3>Requisitos profissionais</h3>

            <div class="row">
              <div class="col">
                
                <h4>Experi&ecirc;ncia em embarca&ccedil;&otilde;es</h4>

                <div class="form-group">
                  <div class="input-group">    
                      <select2 :options="data.ship_types" v-model="new_property.ship_type.id">
                        <option value="0" selected>-- Embarca&ccedil;&atilde;o --</option>
                      </select2>
                      <input type="text" class="form-control" id="ship_experience" placeholder="Meses exp." v-model="new_property.ship_type.months" >
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-default" @click="addShipType" ><i class="fa fa-plus"></i></button>
                      </span>
                  </div>
                </div>

                <ul class="list-group" v-show="job.ship_types" >
                  
                  <li class="list-group-item d-flex justify-content-between" v-for="(ship_requirement, key) in job.ship_types" >
                    
                    @{{ship_requirement.ship_type.label}}

                    <span>@{{ship_requirement.months}} meses</span>

                    <a @click="deleteProperty(key, 'ship_types', 'ship_type')" title="Remover" ><i class="fa fa-times"></i></a>
                  </li>
                </ul>

              </div>
              <div class="col">
                
                <h4>Outras experi&ecirc;ncias</h4>

                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" id="new_experience" placeholder="Experiência" v-model="new_property.experience" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default" @click="addExperience" ><i class="fa fa-plus"></i></button>
                    </span>
                  </div>
                </div>

                <ul class="list-group" id='jobRequirementsList'>
                  <li class="list-group-item d-flex justify-content-between" v-for="(experience, key) in job.experiences" >
                    @{{experience.value}}
                    <a title="Apagar experiência" @click="deleteProperty(key, 'experiences', 'experience')" ><i class="fa fa-times"></i></a>
                  </li>
                </ul>

              </div>

              <div class="col">
                <h4>Outros requisitos</h4>

                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" id="new_requirement" placeholder="Requisito" v-model="new_property.requirement" >
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default" @click="addRequirement" ><i class="fa fa-plus"></i></button>
                    </span>
                  </div>
                </div>

                <ul class="list-group" id='jobRequirementsList'>
                  
                  <ul class="list-group" id='jobRequirementsList'>
                    <li class="list-group-item d-flex justify-content-between" v-for="(requirement, key) in job.requirements" >
                      @{{requirement.value}}
                      <a title="Apagar requisito" @click="deleteProperty(key, 'requirements', 'requirement')" ><i class="fa fa-times"></i></a>
                    </li>
                  </ul>
                  
                </ul>

              </div>

              <div class="col">
                
                <h5>Idiomas</h5>

                <div class="form-group">
                  <div class="input-group">
                    <select2 :options="data.languages" v-model="new_property.language.id" name="language_id" id="language_id">
                      <option value="0" selected>-- Select --</option>
                    </select2>

                    <select v-model="new_property.language.level" class="form-control" >
                      <option value="0">-- Selecione nivel --</option>
                      <option value="1">Básico</option>
                      <option value="2">Intermediário</option>
                      <option value="3">Avançado</option>
                      <option value="4">Fluente</option>
                    </select>

                    <span class="input-group-btn">
                      <button type="button" class="btn btn-default" @click="addLanguage" >
                        <i class="fa fa-plus"></i>
                      </button>
                    </span>

                  </div>
                </div>

                <ul class="list-group" v-show="job.languages" >
                  
                  <li class="list-group-item d-flex justify-content-between" v-for="(language, key) in job.languages" >
                    
                    <span v-if="language.language" >
                      @{{language.language.label}}
                    </span>

                    <span>@{{language.level_label}}</span>

                    <a @click="deleteProperty(key, 'languages', 'language')" title="Remover" ><i class="fa fa-times"></i></a>
                  </li>
                </ul>

              </div>

            </div>
          </div>
        </div>

        <div class="card card-default my-2">
          <div class="card-block">

            <h3>Requisitos de documenta&ccedil;&atilde;o</h3>

            <div class="row">

              <div class="col">
                <h4>Certificados</h4>

                <div class="form-group">
                  <div class="input-group">    
                      <select2 :options="data.certificate_types" v-model="new_property.certificate_type.id">
                        <option value="0" selected>-- Certificado --</option>
                      </select2>
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-default" @click="addCertificateType" ><i class="fa fa-plus"></i></button>
                      </span>
                  </div>
                </div>

                <ul class="list-group" >
                
                  <li class="list-group-item d-flex justify-content-between" v-for="(certificate_type, key) in job.certificate_types" >
                    
                    @{{certificate_type.certificate_type.label}}

                    <a  title="Apagar certificado" @click="deleteProperty(key, 'certificate_types', 'certificate_type')" ><i class="fa fa-times"></i></a>

                  </li>
 
                 </ul>
              </div>

              <div class="col">
                <h4>Categorias CIR</h4>

                <div class="form-group">
                  <div class="input-group">    
                      <select2 :options="data.seaman_book_types" v-model="new_property.seaman_book_type.id">
                        <option value="0" selected>-- Categoria CIR --</option>
                      </select2>
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-default" @click="addSeamanBookType" ><i class="fa fa-plus"></i></button>
                      </span>
                  </div>
                </div>

                <ul class="list-group" >

                  <li class="list-group-item d-flex justify-content-between" v-for="(seaman_book_type, key) in job.seaman_book_types" >
                    
                    @{{seaman_book_type.seaman_book_type.label}}

                    <a  title="Apagar Categoria CIR" @click="deleteProperty(key, 'seaman_book_types', 'seaman_book_type')" ><i class="fa fa-times"></i></a>

                  </li>

                </ul>
              </div>

              <div class="col">
                
                <h4>Regras STCW</h4>

                <div class="form-group">
                  <div class="input-group">    
                      <select2 :options="data.stcw_regulations" v-model="new_property.stcw_regulation.id">
                        <option value="0" selected>-- Regras STCW --</option>
                      </select2>
                      <span class="input-group-btn">
                        <button type="button" class="btn btn-default" @click="addStcwRegulation" ><i class="fa fa-plus"></i></button>
                      </span>
                  </div>
                </div>

                <ul class="list-group" >
                  
                  <li class="list-group-item d-flex justify-content-between" v-for="(stcw_regulation, key) in job.stcw_regulations" >
                      
                      @{{stcw_regulation.stcw_regulation.regulation}}

                      <a  title="Apagar Regra STCW" @click="deleteProperty(key, 'stcw_regulations', 'stcw_regulation')" ><i class="fa fa-times"></i></a>

                    </li>

                </ul>                

              </div>

            </div>
          </div>
        </div>

        <div class="card card-default my-2">
          <div class="card-block">
            <h3>Sal&aacute;rio &amp; Benef&iacute;cios</h3>

            <div class="row">
              <div class="col">
                
                <h5>Benef&iacute;cios</h5>

                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="newBenefit" id="newBenefit" placeholder="Novo benefício" v-model="new_property.benefit" >
                    <span class="input-group-btn">
                      <button type="button" @click="addBenefit" class="btn btn-default" >
                        <i class="fa fa-plus"></i>
                      </button>
                    </span>
                  </div>
                </div>

                <ul class="list-group" >
                  
                  <li class="list-group-item d-flex justify-content-between" v-for="(benefit, key) in job.benefits" >
                    @{{benefit.value}}
                    <a title="Apagar requisito" @click="deleteProperty(key, 'benefits', 'benefit')" ><i class="fa fa-times"></i></a>
                  </li>

                </ul>

              </div>
              <div class="col">
                <div class="form-group">
                  <label for="salary" >Sal&aacute;rio</label>
                  <input class="form-control" name="salary" id="salary" placeholder="Insira o salário" value="{{$job->salary}}" >
                </div>
              </div>

            </div>
          </div>

        </div>
      
        <div class="card card-default my-2">
          <div class="card-block">
            <h3>Extras</h3>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="description" >Descrição da vaga</label>
                  <textarea class="form-control" name="description" id="description" placeholder="Descrição da vaga">{{$job->description}}</textarea>
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="rotation" >Escala</label>
                  <input class="form-control" name="rotation" id="rotation" placeholder="Ex.: 28x28, 56x56" value="{{$job->rotation}}" >
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="vacancies" >N&uacute;mero de vagas</label>
                  <input class="form-control" name="vacancies" id="vacancies" placeholder="Ex.: Rio de Janeiro, Bacia de Santos" value="{{$job->vacancies}}" >
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="extra" >Informa&ccedil;&otilde;es extras</label>
                  <input class="form-control" name="extra" id="extra" placeholder="Ex.: Rio de Janeiro, Bacia de Santos" value="{{$job->extra}}" >
                </div>
              </div>
            
            </div>
          </div>
        </div>

        <div class="card card-default my-2">
          <div class="card-block">
            <ul class="list-inline">
              <li class="list-inline-item">
                <button type="submit" class="btn btn-success" >
                  @if($job->status == 0)
                    <i class='fa fa-check'></i> Publicar
                  @else
                    <i class='fa fa-save'></i> Salvar altera&ccedil;&otilde;es
                  @endif
                </button>
              </li>

              <li class="list-inline-item float-right" >
                <a href="/job/{{$job->id}}" class="btn btn-default" ><i class="fa fa-times"></i> Cancelar</a>
              </li>
            </ul>

          </div>
        </div>

      </div>
    </div>


  </form>
@endsection

@section('local-head')
  <link href="/theme/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css" media="screen">
@endsection

@section('local-footer')

<script src="/theme/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

<script>
  $(document).ready(function() {
      $(".datepicker").datepicker();
  });

  new Vue({

    el: '#up-app',

    data: {
      
      job: [],

      job_id: {{$job->id}},

      new_property: {

        ship_type: {
          id: null,
          months: null,
        },

        language: {
          id: null,
          level: null,
        },

        experience: null,
        requirement: null,
        benefit: null,

        seaman_book_type: {
          id: null,
        },

        stcw_regulation:  {
          id: null,
        },

        certificate_type: {
          id: null,
        }
      },

      data: [],

    },

    methods: {

      // List: plural, Property: singular
      deleteProperty: function(key, list, property)  {

        var item_id = this['job'][list][key]['id'];
        var self = this;

        axios.delete('/api/job_property/' + property + '/' + item_id).then( function()  {

          Vue.delete(self['job'][list], key);

        });

      },

      addShipType: function() {

        if(this.new_property.ship_type.id && this.new_property.ship_type.months > 0)  {

          var data = { ship_type_id: this.new_property.ship_type.id, job_id: this.job_id, months: this.new_property.ship_type.months };
          var self = this;

          axios.post('/api/job_property/' + self.job_id + '/ship_type', data).then( function(response)  {

            self.job.ship_types.push(response.data);

            self.new_property.ship_type.id = null;
            self.new_property.ship_type.months = null;

          });
        }
        else {
          alert('Plase select a ship type and a minimum experience time in months');
        }

      },

      addLanguage: function(key) {
        
        if(this.new_property.language.id && this.new_property.language.level > 0)  {

          var data = { language_id: this.new_property.language.id, job_id: this.job_id, level: this.new_property.language.level };
          var self = this;

          axios.post('/api/job_property/' + self.job_id + '/language', data).then( function(response)  {

            self.job.languages.push(response.data);

            self.new_property.language.id = null;
            self.new_property.language.level = null;

          });
        }
        else {
          alert('Plase select a language and a minimum level');
        }

      },

      addExperience: function() {

        if(this.new_property.experience)  {

          var data = { value: this.new_property.experience, job_id: this.job_id};
          var self = this;

          axios.post('/api/job_property/' + self.job_id + '/experience', data).then( function(response)  {

            self.job.experiences.push(response.data);

            self.new_property.experience = null;

          });
        }
        else {
          alert('Plase add some text');
        }

      },

      addRequirement: function()  {

        if(this.new_property.requirement)  {

          var data = { value: this.new_property.requirement, job_id: this.job_id};
          var self = this;

          axios.post('/api/job_property/' + self.job_id + '/requirement', data).then( function(response)  {

            self.job.requirements.push(response.data);

            self.new_property.requirement = null;

          });
        }
        else {
          alert('Plase add some text');
        }

      },

      addCertificateType: function()  {

        if(this.new_property.certificate_type.id)  {

          var data = { certificate_type_id: this.new_property.certificate_type.id, job_id: this.job_id};
          var self = this;

          axios.post('/api/job_property/' + self.job_id + '/certificate_type', data).then( function(response)  {

            self.job.certificate_types.push(response.data);
            self.new_property.certificate_type.id = null;

          });
        }
        else {
          alert('Plase select a certificate');
        }

      },

      addSeamanBookType: function() {

        if(this.new_property.seaman_book_type.id)  {

          var data = { seaman_book_type_id: this.new_property.seaman_book_type.id, job_id: this.job_id };
          var self = this;

          axios.post('/api/job_property/' + self.job_id + '/seaman_book_type', data).then( function(response)  {

            self.job.seaman_book_types.push(response.data);
            self.new_property.seaman_book_type.id = null;

          });
        }
        else {
          alert('Plase select a Seaman Book Type');
        }

      },

      addStcwRegulation: function() {

        if(this.new_property.stcw_regulation.id)  {

          var data = { stcw_regulation_id: this.new_property.stcw_regulation.id, job_id: this.job_id};
          var self = this;

          axios.post('/api/job_property/' + self.job_id + '/stcw_regulation', data).then( function(response)  {

            self.job.stcw_regulations.push(response.data);

            self.new_property.stcw_regulation.id = null;

          });
        }
        else {
          alert('Plase select a STCW Regulation');
        }


      },

      addBenefit: function()  {

        if(this.new_property.benefit)  {

          var data = { value: this.new_property.benefit, job_id: this.job_id};
          var self = this;

          axios.post('/api/job_property/' + self.job_id + '/benefit', data).then( function(response)  {

            self.job.benefits.push(response.data);

            self.new_property.benefit = null;

          });
        }
        else {
          alert('Plase add some text to the benefit');
        }

      },
    },

    beforeMount: function() {

      var self = this;

      axios.get('/api/job/' + self.job_id).then(  function(response)  {

        self.job = response.data;

      });

      axios.get('/api/job_data').then(  function(response)  {

        self.data = response.data;

      });

    }

  });


</script>

@endsection