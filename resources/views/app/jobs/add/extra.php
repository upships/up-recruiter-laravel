<form method="post" action="/jobs/addExtraAction" role="form" enctype="multipart/form-data" id='newJobForm' >
  <input type="hidden" name="jobId" value="{{$job->id}}">

  <div class="row">
    <div class="col-lg-12">
      
      <h3>Adicionar informa&ccedil;&otilde;es extras</h3>

      <div class="list-group m-b-10">
          <div class="list-group-item">
            <p>Vaga para <b>{$job->position->label}</b></p>

            <ul class="list-inline">
            <li>
              <b>Requisitos</b>
              <ul>
              {jobRequirements}
                <li>{{$requirement->value}}</li>
              {/jobRequirements}
              </ul>
            </li>
            <li>
                <b>Embarca&ccedil;&atilde;o</b><br/>
                {shipTypeLabel}
            </li>
            <li>
              <b>Ingl&ecirc;s</b><br/>
              {{$job->language->label}}
            </li>
            <li>
              <b>Categorias CIR</b>
              <ul class="list-inline">
                {jobBookCategories}
                <li><u>{{$seaman_book_type->code}}</u></li>
                {/jobBookCategories}
              </ul>
            </li>
            <li>
              Regras STCW
              <ul>
              @foreach($job->stcw_regulations as $job_stcw_regulation)
                <li><u>{{$stcw_regulation->regulation}}</u></li>
              {/jobStcwRegulations}
              </ul>
            </li>
          </ul>
          </div>
          <div class="list-group-item">
              <ul class="list-inline">
                  <li>
                      <button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar &amp; Continuar</button>
                  </li>
                  <li class="float-right">
                      <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class='fa fa-ellipsis-v'></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                          <li><a href="/data" target="_blank" >Adicionar dados</a></li>
                          <li><a href="/companies/add" target="_blank" >Adicionar empresas</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="/jobs"><i class="fa fa-times"></i> Cancelar</a></li>
                        </ul>
                      </div>                        
                  </li>

                  <li class="float-right">
                      <a class="btn btn-primary btn-fill" href="/jobs/add/publish/{{$job->id}}">
                        <i class='fa fa-check'></i> Finalizar
                      </a>
                  </li>
              </ul>

          </div>
        </div>

        <div class='list-group'>
          <div class='list-group-item'>
          {pills}
          </div>
          <div class="list-group-item">          
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group" >
                    <label for="jobSchedule" >Escala</label>
                    <input type="text" name="jobSchedule" class="form-control" placeholder='Exemplo: 35x35 / 14x14' />
                </div>   

                <div class="form-group" >
                    <label for="jobLocation" >Local</label>
                    <input type="text" name="jobLocation" class="form-control" />
                </div>
          
                <div class="form-group" >
                  <label for="vacancies" >N&uacute;mero de vagas</label>
                  <div class="input-group">
                      <input type="text" name="jobVacancies" class="form-control" id="vacancies" placeholder="N&uacute;mero de vagas (se houver a informa&ccedil;&atilde;o)." />
                      <div class="input-group-addon">vagas</div>
                  </div>
                </div>

                <div class="form-group" >
                    <label for="jobExtra" >Informa&ccedil;&otilde;es extras</label>
                    <input type="text" name="jobExtra" class="form-control" />
                </div>
              </div>
              <div class="col-lg-6">
                <h4>Marcadores</h4>

                {flags}
                    <div class="form-group">
                        <label>
                            <input type="checkbox" value="{flagId}" name="flags[]">&nbsp;&nbsp;{flagLabel}
                        </label>
                    </div>
                {/flags}
              </div>
            </div>
          </div>
          <div class="list-group-item">
            <button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar &amp; Continuar</button>
        </div>
      </div>
    </div>
  </div>
</form>