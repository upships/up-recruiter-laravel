@extends('layouts.master')
@section('page-title','Vagas em aberto')

@section('content')
  
  <h2>Modificar vaga</h2>

  <form method="post" action="/job/{{$job->id}}" >
    
    {{method_field('PATCH')}}
    {{csrf_field()}}

    <div class="row">
      <div class="col">

        <div class="card card-default">
          <div class="card-block">

            @if($job->status == 0)
              <a class="btn btn-success" href='/job/{{$job->id}}/activate' >
                <i class='fa fa-send'></i> Publicar vaga
              </a>
            @else

              <a class="btn btn-default" href='/job/{{$job->id}}' >
                <i class='fa fa-angle-left'></i> Finalizar
              </a>

            @endif

              <div class="float-right">
                <div class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='fa fa-ellipsis-v'></i></span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="/data" target="_blank" >Adicionar dados</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/job"><i class="fa fa-times"></i> Cancelar</a></li>
                  </ul>
                </div>
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
                        <option value="{{$job->status}}">{{$job->status_label}}</option>
                        <option value="0">Inativa</option>
                        <option value="1">Ativa</option>
                        <option value="2">Encerrada</option>
                    </select>
                  
                  </div>

                </div>
              @endif

            <div class="col">
              <div class="form-group">
                <label for="privacy" >Privacidade</label>

                <select class="form-control" name="privacy" >
                    <option value="{{$job->privacy}}">{{$job->privacy_label}}</option>
                    <option value="1">Aberta</option>
                    <option value="2">Confidencial</option>
                    <option value="3">Secreta</option>
                </select>
              
              </div>
            </div>
            
            <div class="col">
              <small class="text-muted">Data</small>
              <h4>{{$job->date}}</h4>
            </div>

            <div class="col">
              <div class="form-group">
                <label for="privacy" >Validade</label>
                <input type="date" class="form-control" name="expiration_date" value="{{$job->expiration_date}}" >
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

                <select class="form-control select2" >
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

                <select class="form-control select2" >
                    
                    <option value="{{$job->ship_type->id}}">{{$job->ship_type->label}}</option>

                    @foreach($ship_types as $ship_type)
                      <option value="{{$ship_type->id}}">{{$ship_type->label}}</option>
                    @endforeach

                </select>
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

                <ul class="list-group" >
                  @foreach($job->ship_requirements as $ship_requirement)
                  <li class="list-group-item" id="jobRequirement-{{$ship_requirement->id}}" >
                    <a href="#djr" class="float-right" title="Apagar requisito" @click="deleteShipRequirement({{$ship_requirement->id}})" ><i class="fa fa-times"></i></a>
                    
                    {{$ship_requirement->type->label}}

                    <span class="float-right">{{$ship_requirement->months}} meses</span>

                  </li>
                  @endforeach
                </ul>

                <h4>Inserir requisito de embarca&ccedil;&atilde;o</h4>
                
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="ship_type" >Embarca&ccedil;&atilde;o</label>
                      <select class="form-control select2" >
                        @foreach($ship_types as $ship_type)
                          <option value="{{$ship_type->id}}">{{$ship_type->label}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-group">
                      <label for="ship_experience" >Tempo (em n&uacute;mero de meses)</label>
                      <input type="text" class="form-control" id="ship_experience" placeholder="Ex.: 12" >
                    </div>
                  </div>
                </div>

              </div>

              <div class="col">
                <h4>Outros</h4>

                <ul class="list-group" id='jobRequirementsList'>
                  @foreach($job->requirements as $requirement)
                  <li class="list-group-item" id="jobRequirement-{{$requirement->id}}" >
                    <a href="#djr" class="float-right" title="Apagar requisito" @click="deleteRequirement({{$requirement->id}})" ><i class="fa fa-times"></i></a>
                    
                    {{$requirement->label}}
                  </li>
                  @endforeach
                </ul>

                <h4>Inserir requisito de experi&ecirc;ncia</h4>
                
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="new_requirement" >Requisito</label>
                      <input type="text" class="form-control" id="new_requirement" >
                    </div>
                  </div>
                </div>

              </div>

              <div class="col">
                <p><small class="text-muted">Ingl&ecirc;s</small></p>

                <div class="form-group">
                  <label for="privacy" >N&iacute;vel de ingl&ecirc;s</label>

                  <select class="form-control" name="english_level" >
                      <option value="{{$job->english_level}}">{{$job->english_level_label}}</option>
                      <option value="0">Not required</option>
                      <option value="1">Basic</option>
                      <option value="2">Intermediate</option>
                      <option value="3">Advanced</option>
                      <option value="4">Fluent</option>
                  </select>
                </div>

              </div>

            </div>
          </div>
        </div>

        <div class="card card-default my-2">
          <div class="card-block">
            <h3>Requisitos de documenta&ccedil;&atilde;o</h3>

            <div class="row">

              <div class="col">
                <p><small class="text-muted">Certificados</small></p>

                <ul class="list-group" >
                {@foreach($job->trainings as $training)}
                  <li class="list-group-item" id="jobTraining-{{$training->id}}" >
                    <a href="#djt" class="float-right" title="Apagar certificado" @click="deleteTraining({{$training->id}})" ><i class="fa fa-times"></i></a>
                    {{$training->label}}
                  </li>
                {@endforeach}
                </ul>

                <br/>

                <p><small class="text-muted">Inserir novo certificado</small></p>

                <div class="form-group">
                  
                  <select id="trainingsSelector" v-bind="newTraining" class="select2" >
                    
                    <option id='trainings0' value="0">Novo certificado</option>

                    @foreach($trainings as $training)
                        <option value="{{$training->id}}" >{{$training->label}} - {{$training->description}}</option>
                    @endforeach
                  </select>

                </div>

                <button type="button" @click="insertTraining" class="btn btn-default btn-xs" >
                  <i class="fa fa-plus"></i> certificado
                </button>

                <a href="#" class="float-right" @click="createTraining" >Criar certificado</a>
              </div>

              <div class="col">
                <p><small class="text-muted">Categorias CIR</small></p>

                <ul class="list-group" id='jobBookCategories'>
                  @foreach($job->seaman_book_types as $job_seaman_book_type)
                    <li class="card-block" id="jobBookCategory-{{$job_seaman_book_type->id}}" >
                      <a href="#djt" class="float-right" title="Apagar certificado" @click="deleteJobBookCategory({{$job_seaman_book_type->id}})" ><i class="fa fa-times"></i></a>
                      {{$job_seaman_book_type->type->code}}
                    </li>
                  @endforeach
                </ul>

                <br/>
                <p><small class="text-muted">Inserir categoria CIR</small></p>

                <div class="form-group">
                  <select  class="select2" >
                    <option id='bookCategories0' value="0">Categorias CIR</option>

                    {@foreach($seaman_book_types as $seaman_book_type)}
                        <option value="{{bookCategoryId}}" >{{$seaman_book_type->code}}</option>
                    {@endforeach}
                  </select>
                </div>

                <button type="button" @click="insertJobBookCategory({{$job->id}})" class="btn btn-default btn-xs" >
                  <i class="fa fa-plus"></i> cat. CIR
                </button>

              </div>
              <div class="col">
                
                <p><small class="text-muted">Regras STCW</small></p>

                <ul class="list-group" >
                  {@foreach($job->stcw_regulations as $job_stcw_regulation)}
                    <li class="card-block" id="jobStcwRegulation-{{$job_stcw_regulation->id}}" >
                      <a href="#djt" class="float-right" title="Apagar certificado" @click="deleteJobStcwRegulation({{$job_stcw_regulation->id}})" ><i class="fa fa-times"></i></a>
                      {{$job_stcw_regulation->regulation}}
                    </li>
                  @endforeach
                </ul>

                <br/>
                <p><small class="text-muted">Inserir regra STCW</small></p>

                <div class="form-group">
                  <select id="stcwRegulationsSelector" >
                    <option value="0">Regras STCW</option>

                    @foreach($stcw_regulations as $stcw_regulation)
                        <option value="{{$stcw_regulation->id}}" >{{$stcw_regulation->regulation}}</option>
                    @endforeach
                  </select>
                </div>

                <button type="button" @click="insertJobStcwRegulation" class="btn btn-default btn-xs" >
                  <i class="fa fa-plus"></i> STCW
                </button>

              </div>

            </div>
          </div>
        </div>

        <div class="card card-default my-2">
          <div class="card-block">
            <h3>Sal&aacute;rio &amp; Benef&iacute;cios</h3>

            <div class="row">
              <div class="col">
                
                <p><small class="text-muted">Benef&iacute;cios</small></p>

                <ul class="list-group" id='jobBenefitsList'>
                  {@foreach($job->benefits as $benefit)}
                  <li class="card-block" id="jobBenefit-{{$benefit->id}}" >
                    <a href="#djr" class="float-right" title="Apagar requisito" @click="deleteBenefit({{$benefit->id}})" ><i class="fa fa-times"></i></a>
                    {{$benefit->value}}
                  </li>
                  @endforeach
                </ul>

                <br/>
                <p><small class="text-muted">Inserir novo benef&iacute;cio</small></p>

                <div class="input-group">
                  <input type="text" class="form-control" name="newBenefit" id="newBenefit" placeholder="Novo benefício" >
                  <span class="input-group-btn">
                    <button type="button" @click="insertBenefit" class="btn btn-default" >
                      <i class="fa fa-plus"></i> benef&iacute;cio
                    </button>
                  </span>
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
                  <label for="location" >Local de atua&ccedil;&atilde;o</label>
                  <input class="form-control" name="location" id="location" placeholder="Ex.: Rio de Janeiro, Bacia de Santos" value="{{$job->rotation}}" >
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
            <button type="submit" class="btn btn-success" >Salvar altera&ccedil;&otilde;es</button>
            <a href="/job/{{$job->id}}" class="btn btn-default float-right" ><i class="fa fa-reload"></i> Voltar</a>
          </div>
        </div>

      </div>
    </div>


  </form>
@endsection
