<form method="post" action="/jobs/editAction" role="form" enctype="multipart/form-data" >

<div class="row">
    <div class="col-lg-12">
      <div class="list-group">
        <div class="list-group-item">
            <h3 class="list-group-item-heading">Editar vaga {jobPositionLabel}</h3>
        </div>
        <div class="list-group-item">

            <ul class="list-inline">
                <li>
                    <button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar modifica&ccedil;&otilde;es</button>
                </li>
                <li class="pull-right">
                    <div class="btn-group">
                      <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='fa fa-ellipsis-v'></i></span>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="/config/data" target="_blank" >Adicionar dados</a></li>
                        <li><a href="/companies/add" target="_blank" >Adicionar empresas</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/jobs"><i class="fa fa-times"></i> Cancelar</a></li>
                      </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
  </div>
</div>
    <input type="hidden" name="jobId" value="{jobId}" />

    <br/>

<div class="row">
    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">

      <div class="panel panel-default">
          <div class="panel-heading">
              <h4 class="panel-title" >Dados b&aacute;sicos</h4>
          </div>
          <div class="panel-body">

              <div class="form-group" >
                  <label for="position" >T&iacute;tulo da Vaga</label>
                  <select class="form-control basicData" name="position" id="positions" >                  
                      {positions}                         
                          <option value="{allPositions_positionId}" id='jobPosition-{allPositions_positionId}' >{allPositions_positionLabel}</option>
                      {/positions}
                  </select>
              </div>

              <div class="form-group" >
                  <label for="companyId" >Empresa</label>
                  <select class="form-control basicData" name="companyId" id='companies' >
                      {companies}
                      <option value="{allCompanies_companyId}" >{allCompanies_companyName}</option>
                      {/companies}
                  </select>
              </div>
          </div>
      </div>

      <div class="panel panel-default">
          <div class="panel-heading">
              <h4 class="panel-title" >Envio de curr&iacute;culo / Dados de contato</h4>
          </div>
          <div class="panel-body">
            <div>
              <input type="hidden" name="applicationType" value="{applicationType}">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                  <a href="#platform" onclick="selectApplicationTab(3)" class="applicationTypeTrigger-3" id='applicationPlatformTrigger' aria-controls="byPlatform" role="tab" data-toggle="tab"><i class='fa fa-th'></i> Pelo site</a>
                </li>
                <li role="presentation" >
                  <a href="#email" onclick="selectApplicationTab(1)" class="applicationTypeTrigger-1" id='applicationEmailTrigger' aria-controls="email" role="tab" data-toggle="tab"><i class='fa fa-envelope'></i> E-mail</a>
                </li>
                <li role="presentation">
                  <a href="#link" id='applicationLinkTrigger' onclick="selectApplicationTab(0)" class="applicationTypeTrigger-0" aria-controls="link" role="tab" data-toggle="tab"><i class='fa fa-chrome'></i> Link</a>
                </li>
                <li role="presentation">
                  <a href="#phone" id='applicationPhoneTrigger' onclick="selectApplicationTab(2)" class="applicationTypeTrigger-2" aria-controls="phone" role="tab" data-toggle="tab"><i class='fa fa-phone'></i> Telefone</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="platform">
                  <p>
                    <h4>
                      Os usu&aacute;rios se candidatar&atilde;o atrav&eacute;s do VagasEmbarcado.com e todo o processo pode ser gerenciado pelo site, sem a necessidade de e-mails.
                    </h4>
                  </p>
                </div>
                <div role="tabpanel" class="tab-pane" id="email">
                  <p>

                    <div class="form-group" >
                      <label for='applicationEmail' >Endere&ccedil;o de e-mail</label>
                      <input type="email" name="applicationEmail" class="form-control applicationMethodField" id='applicationType-1' value="{applyTo}" >
                    </div>

                    <div class="form-group">
                      <label>
                        <input type="radio" name='applicationEmailType' value="0" checked> Assunto personalizado pelo usu&aacute;rio
                      </label>
                    </div>

                    <div class="form-group">
                      <label>
                        <input type="radio" name='applicationEmailType' id='applicationEmailSubjectToggler' value="1" > Assunto fixo
                      </label>
                    </div>                      

                    <div class="form-group hiddenCards" id='applicationEmailTitle'>
                      <label for='applicationEmailTitle' >Insira o assunto</label>
                      <input type="text" name="applicationEmailTitle" class="form-control" value="{applicationEmailTitle}">
                    </div>


                    <hr/>
                    <h5>Idioma do e-mail</h5>

                    <div class="form-group">
                      <label>
                        <input type="radio" name='applicationLanguage' value="0" > Portugu&ecirc;s
                      </label>
                    </div>

                    <div class="form-group">
                      <label>
                        <input type="radio" name='applicationLanguage' value="1" > Ingl&ecirc;s
                      </label>
                    </div>
                    
                    <div class="form-group">
                      <label>
                        <input type="radio" name='applicationLanguage' value="2" > Ambos
                      </label>
                    </div>

                    <h5>Instru&ccedil;&otilde;es para o e-mail (se houver)</h5>
                    <div class="form-group">
                      <input type="text" name="applicationInfo" class="form-control" placeholder='Ex: Enviar CV e certificados' value="{applicationInfo}">
                    </div>                          

                  </p>
                </div>
                <div role="tabpanel" class="tab-pane" id="link">
                  <p>
                    <div class="form-group" >
                      <label for="applicationLink" >Coloque apenas o link</label>
                      <input type="text" name="applicationLink" class="form-control applicationMethodField" id='applicationType-0' >
                    </div>
                  </p>
                </div>
                <div role="tabpanel" class="tab-pane" id="phone">
                  <p>
                    <div class="form-group" >
                      <label for="applicationPhone" >Insira o telefone</label>
                      <input type="text" name="applicationPhone" class="form-control applicationMethodField" id='applicationType-2' >
                    </div>
                  </p>                    
                </div>
              </div>

            </div>

          </div>
        </div>

        <h3>Mais informa&ccedil;&otilde;es</h3>

         <!-- Descrição -->
        <div class="panel panel-default">
          <div class="panel-body">

            <h4>Descri&ccedil;&atilde;o</h4>

            <div class="form-group" >
                <label for="jobDescription" >Descri&ccedil;&atilde;o da vaga</label>
                <textarea name="jobDescription" class="form-control" >{jobDescription}</textarea>
            </div>

            <h4>Requisitos</h4>

            <div class="list-group" id='jobRequisitesList'>

                <div class="hidden">
                    <div class="list-group-item jobRequisitesItem" id='requisiteOne'>
                        <div class="form-group" >
                            <label for="jobRequisites" >Requisito da vaga</label>
                            <input name="jobRequisites[]" type="text" class="form-control jobRequisiteItemInput" />                                    
                        </div>
                    </div>
                </div>

                {jobRequisites}
                <div class="list-group-item jobRequisitesItem" id='jobRequisiteItem-{jobReqId}' >
                    <a href="#deleteRequisite-{jobReqId}" onclick="$('jobRequisiteItem-{jobReqId}').remove()" class="pull-right text-danger"><i class='fa fa-times'></i></a>
                    <div class="form-group" >
                        <label for="jobRequisites" >Requisito da vaga</label>
                        <input name="jobRequisites[]" type="text" class="form-control jobRequisiteItemInput" value="{jobRequisiteValue}" />                                    
                    </div>
                </div>
                {/jobRequisites}
            </div>
            
            <hr/>

            <button type='button' class="btn btn-default btn-sm" id='addRequisiteBtn'><i class='fa fa-plus' ></i> Adicionar requisito</button>

            <h4>Benef&iacute;cios</h4>

            <div class="list-group" id='jobBenefitsList'>
                <div class="hidden">
                    <div class="list-group-item jobBenefitsItem" id='benefitOne'>
                        <div class="form-group" >
                            <label for="jobBenefits" >Benef&iacute;cio</label>
                            <input name="jobBenefits[]" type="text" class="form-control" />                                    
                        </div>
                    </div>
                </div>

                {jobBenefits}
                    <div class="list-group-item jobBenefitsItem" >
                        <div class="form-group" >
                            <label for="jobBenefits" >Benef&iacute;cio</label>
                            <input name="jobBenefits[]" type="text" class="form-control jobBenefitItemInput" value="{jobBenefitValue}" /> 
                        </div>
                    </div>
                {/jobBenefits}
            </div>

            <hr/>

            <button type='button' class="btn btn-default btn-sm" id='addBenefitBtn'><i class='fa fa-plus' ></i> Adicionar benef&iacute;cios
            </button>

            <div class="form-group" >
                <label for="jobSchedule" >Escala</label>
                <input type="text" name="jobSchedule" class="form-control" value='{jobSchedule}'/>
            </div>

            <div class="form-group" >
                <label for="jobLocation" >Local</label>
                <input type="text" name="jobLocation" class="form-control" value='{jobLocation}' />
            </div>

            <div class="form-group" >
                <label for="jobExtra" >Informa&ccedil;&otilde;es extras</label>
                <input type="text" name="jobExtra" class="form-control" value='{jobExtra}' />
            </div>

            <div class="form-group" >
                <label for="jobDate" >Data da postagem</label>
                <input type="text" name="jobDate" class="form-control jobDatepicker" id="jobDate" value="{jobDateFull}"/>
            </div>

          </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title" >Dados extras</h4>
            </div>
            <div class="panel-body">

                 <!-- Idioma (inglês) -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobLanguageHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobLanguageArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> <i class='fa fa-language'></i> Requisito de ingl&ecirc;s
                        </a>
                      </h4>
                    </div>
                    <div id="jobLanguageArea" class="panel-collapse collapse jobData in" role="tabpanel" aria-labelledby="jobLanguageHeading">
                      <div class="panel-body">

                        <div class="form-group">
                            <label>
                                <input type="radio" value="0" name="jobLanguage">&nbsp;&nbsp;N&atilde;o informado / aplic&aacute;vel
                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="radio" value="1" name="jobLanguage">&nbsp;&nbsp;B&aacute;sico
                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="radio" value="2" name="jobLanguage">&nbsp;&nbsp;Intermedi&aacute;rio
                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="radio" value="3" name="jobLanguage">&nbsp;&nbsp;Avan&ccedil;ado
                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="radio" value="4" name="jobLanguage">&nbsp;&nbsp;Fluente
                            </label>
                        </div>

                      </div>
                    </div>
                </div>



                 <!-- Marcadores -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobFlagsHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobFlagsArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> <i class='fa fa-tags'></i> Marcadores (freelance, internacional, etc.)
                        </a>
                      </h4>
                    </div>
                    <div id="jobFlagsArea" class="panel-collapse collapse jobData in" role="tabpanel" aria-labelledby="jobFlagsHeading">
                      <div class="panel-body">

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


                 <!-- Embarcação -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="shipTypeHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#shipTypeArea2" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> <i class='fa fa-ship'></i> Embarca&ccedil;&atilde;o
                        </a>
                      </h4>
                    </div>
                    <div id="shipTypeArea2" class="panel-collapse collapse jobData in" role="tabpanel" aria-labelledby="shipTypeHeading">
                      <div class="panel-body">

                        <div class="form-group">
                            <label>
                                <input type="radio" value="0" name="shipTypeId">&nbsp;&nbsp;N&atilde;o informado / aplic&aacute;vel
                            </label>
                        </div>

                        {shipsTypes}
                        <div class="form-group">
                            
                            <label>
                                <input type="radio" value="{allShips_shipTypeId}" name="shipTypeId">&nbsp;&nbsp;{allShips_shipTypeLabel}
                            </label>
                            
                        </div>
                        {/shipsTypes}

                      </div>
                    </div>
                </div>


                 <!-- Experiencia / Salario / Num. de Vagas -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobExpHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobExpArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> <i class='fa fa-money'></i> Experi&ecirc;ncia / Sal&aacute;rio / Num. de vagas
                        </a>
                      </h4>
                    </div>
                    <div id="jobExpArea" class="panel-collapse collapse jobData in" role="tabpanel" aria-labelledby="jobExpHeading">
                      <div class="panel-body">

                        <div class="form-group" >
                            <label for="name" >Experi&ecirc;ncia m&iacute;nima (Em branco: indiferente)</label>             
                            <input type="text" name="experience" class="form-control" id="experience" value='{jobExperience}' />
                        </div>

                        <div class="form-group" >
                            <label for="name" >Sal&aacute;rio (Em branco: A Combinar)</label>
                            <div class="input-group">
                                <div class="input-group-addon">R$</div>
                                <input type="text" name="sallary" class="form-control" id="sallary" value='{sallary_number}'/>
                            </div>
                        </div>

                        <div class="form-group" >
                            <label for="vacancies" >N&uacute;mero de vagas (se houver a informa&ccedil;&atilde;o)</label>    
                            <div class="input-group">
                                <input type="text" name="jobVacancies" class="form-control" id="vacancies" value='{jobVacancies}' />
                                <div class="input-group-addon">vagas</div>
                            </div>
                        </div>

                      </div>
                    </div>
                </div>

                 <!-- Cursos -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobCoursesHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobCoursesArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> <i class='fa fa-graduation-cap'></i> Cursos
                        </a>
                      </h4>
                    </div>
                    <div id="jobCoursesArea" class="panel-collapse collapse jobData in" role="tabpanel" aria-labelledby="jobCoursesHeading">
                      <div class="panel-body">

                        <ul class="list-unstyled">
                            {trainings}
                                <li>
                                    <label >
                                        <input type="checkbox" name="trainings[]" value="{trainingId}" />&nbsp;
                                        {trainingLabel} - {trainingDescription}                  
                                    </label>
                                </li>
                            {/trainings}
                        </ul>

                      </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <a href="/jobs" class="btn btn-danger" ><i class="fa fa-times"></i> Cancelar</a> {applicationType}
            </div>
        </div>
    </div>
</div>


</form>

<script>

$(document).ready(function(){
    
    $('.hiddenCards').hide();

    // Verifica se a vaga possui requisitos, benefícios e marcadores
    var jobHasRequisites = '{jobHasRequisites}';
    var jobHasBenefits = '{jobHasBenefits}';
    var jobHasFlags = '{jobHasFlags}';

    if(jobHasBenefits == '')
    {
        $('#jobBenefitsList').append("<div class='list-group-item' >Nenhum benef&iacute;cio informado</div>");
    }

    if(jobHasRequisites == '')
    {
        $('#jobRequisitesList').append("<div class='list-group-item' >Nenhum requisito informado</div>");
    }

    // seleciona a Função atual
    selectCurrentPosition('{positionId}');

    // seleciona a Empresa atual
    selectCurrentCompany('{companyId}');

    // seleciona o requisito de idioma
    selectEnglishRequisite('{jobLanguage}');

    // Seleciona os marcadores
    selectFlags('{jobFlagsInline}');

    // Seleciona a embarcação
    selectShip('{shipTypeId}');

    // Seleciona os cursos exigidos
    selectCourses('{job_trainingsInline}');

    // Seleciona a aba inicial do tipo de candidatura
    selectInitialTab('{applicationType}');

    // Seleciona o idioma de envio de currículo
    selectApplicationLanguage('{applicationLanguage}');

    // Seleciona o tipo de e-mail a ser enviado
    selectApplicationEmailType('{applicationEmailType}');
}); 
</script>