<form method="post" action="/jobs/add_action" role="form" enctype="multipart/form-data" id='newJobForm' >
<div class="row">
    <div class="col-lg-12">

        <div class="list-group m-b-10">
            <div class="list-group-item">
                <h3 class="list-group-item-heading">Adicionar oferta de emprego</h3>
            </div>
            <div class="list-group-item">

                <ul class="list-inline">
                    <li>
                        <button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar</button>
                    </li>
                    <li class="pull-right">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                </ul>

            </div>
        </div>

    </div>
</div>


  <input type='hidden' name='jobStatus' value="1" >

<div class="row">
    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">

        <div class="list-group m-b-10">
            <div class="list-group-item">
                <h4 class="list-group-item-heading">Dados b&aacute;sicos</h4>
            </div>
            <div class="list-group-item">

                <div class="form-group" >
                    <label for="position" >Fun&ccedil;&atilde;o</label>

                    <select class="select2" name="position" data-placeholder="Selecione uma função" required='required' >
                      <option disabled selected> -- Selecione uma fun&ccedil;&atilde;o -- </option>
                        {positions}                         
                        <option value="{positionId}" >{positionLabel}</option>
                        {/positions}
                    </select>
                </div>

                <div class="form-group" >
                    <label for="companyId" >Empresa</label>
                    <select class="select2" name="companyId" data-placeholder="Selecione uma empresa" required='required'>
                      <option disabled selected> -- Selecione uma empresa -- </option>    
                        {companies}
                        <option value="{companyId}" >{companyName}</option>
                        {/companies}
                    </select>
                </div>
              </div>
            </div>

            <div class="list-group m-b-10">
                <div class="list-group-item">
                    <h4 class="list-group-item-heading">Envio de curr&iacute;culo / Dados de contato</h4>
                </div>
                <div class="list-group-item">

                  <div>
                  <input type="hidden" name="applicationType" value="1">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#email" id='applicationEmailTrigger' aria-controls="home" role="tab" data-toggle="tab"><i class='fa fa-envelope'></i> E-mail</a></li>
                      <li role="presentation"><a href="#link" id='applicationLinkTrigger' aria-controls="profile" role="tab" data-toggle="tab"><i class='fa fa-chrome'></i> Link</a></li>                  
                      <li role="presentation"><a href="#phone" id='applicationPhoneTrigger' aria-controls="settings" role="tab" data-toggle="tab"><i class='fa fa-phone'></i> Telefone</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane active" id="email">
                        <p>

                          <div class="form-group" >
                            <label for='applicationEmail' >Endere&ccedil;o de e-mail</label>
                            <input type="email" name="applicationEmail" class="form-control applicationMethodField" >
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
                            <input type="text" name="applicationEmailTitle" class="form-control" placeholder='Ex: Código da vaga'>
                          </div>

                          <hr/>
                          <h5>Idioma do e-mail</h5>

                          <div class="form-group">
                            <label>
                              <input type="radio" name='applicationLanguage' value="0" checked> Portugu&ecirc;s
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
                            <input type="text" name="applicationInfo" class="form-control" placeholder='Ex: Enviar CV e certificados'>
                          </div>

                        </p>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="link">
                        <p>
                          <div class="form-group" >
                            <label for="applicationLink" >Coloque apenas o link</label>
                            <input type="text" name="applicationLink" class="form-control applicationMethodField" id='applicationLink' >
                          </div>
                        </p>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="phone">
                        <p>
                          <div class="form-group" >
                            <label for="applicationPhone" >Insira o telefone</label>
                            <input type="text" name="applicationPhone" class="form-control applicationMethodField" id='applicationPhone' >
                          </div>
                        </p>                    
                      </div>
                    </div>

                  </div>

                </div>
              </div>

        <div class="list-group m-b-10">
            <div class="list-group-item">
                <h4 class="list-group-item-heading">Mais informa&ccedil;&otilde;es</h4>
            </div>
            <div class="list-group-item">

                
                 <!-- Descrição -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobDescriptionHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobDescriptionArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> Descri&ccedil;&atilde;o
                        </a>
                      </h4>
                    </div>
                    <div id="jobDescriptionArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobDescriptionHeading">
                      <div class="panel-body">
                        <div class="form-group" >
                            <label for="jobDescription" >Descri&ccedil;&atilde;o da vaga</label>
                            <textarea name="jobDescription" class="form-control" ></textarea>
                        </div>
                      </div>
                    </div>
                </div>

                 <!-- Requisitos -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobRequisitesHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobRequisitesArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> Requisitos
                        </a>
                      </h4>
                    </div>
                    <div id="jobRequisitesArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobRequisitesHeading">

                        <div class="list-group" id='jobRequisitesList'>

                            <div class="list-group-item jobRequisitesItem" id='requisiteOne'>
                                <div class="form-group" >
                                    <label for="jobRequisites" >Requisito da vaga</label>
                                    <input name="jobRequisites[]" type="text" class="form-control jobRequisiteItemInput" />                                    
                                </div>
                            </div>
                        </div>
                        
                        <br/>

                        <button type='button' class="btn btn-default btn-sm" id='addRequisiteBtn'><i class='fa fa-plus' ></i> Adicionar requisito</button>
                        

                    </div>
                </div>

                 <!-- Benefícios -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobBenefitsHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobBenefitsArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> Benef&iacute;cios
                        </a>
                      </h4>
                    </div>
                    <div id="jobBenefitsArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobBenefitsHeading">

                        <div class="list-group" id='jobBenefitsList'>

                            <div class="list-group-item jobBenefitsItem" id='benefitOne'>
                                <div class="form-group" >
                                    <label for="jobBenefits" >Benef&iacute;cio</label>
                                    <input name="jobBenefits[]" type="text" class="form-control jobBenefitItemInput" />                                    
                                </div>
                            </div>
                        </div>

                        <br/>

                        <button type='button' class="btn btn-default btn-sm" id='addBenefitBtn'><i class='fa fa-plus' ></i> Adicionar benef&iacute;cios</button>
                    </div>
                </div>
                
                 <!-- Escala -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobScheduleHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobScheduleArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> Escala
                        </a>
                      </h4>
                    </div>
                    <div id="jobScheduleArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobScheduleHeading">
                      <div class="panel-body">
                        <div class="form-group" >
                            <label for="jobSchedule" >Escala</label>
                            <input type="text" name="jobSchedule" class="form-control" placeholder='Exemplo: 35x35 / 14x14' />
                        </div>
                      </div>
                    </div>
                </div>

                 <!-- Local -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobLocationHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobLocationArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> Local
                        </a>
                      </h4>
                    </div>
                    <div id="jobLocationArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobLocationHeading">
                      <div class="panel-body">
                        <div class="form-group" >
                            <label for="jobLocation" >Local</label>
                            <input type="text" name="jobLocation" class="form-control" />
                        </div>
                      </div>
                    </div>
                </div>

                 <!-- Extra -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobExtraHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobExtraArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> Informa&ccedil;&otilde;es extras
                        </a>
                      </h4>
                    </div>
                    <div id="jobExtraArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobExtraHeading">
                      <div class="panel-body">
                        <div class="form-group" >
                            <label for="jobExtra" >Informa&ccedil;&otilde;es extras</label>
                            <input type="text" name="jobExtra" class="form-control" />
                        </div>
                      </div>
                    </div>
                </div>

                 <!-- Data da postagem -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobDateHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobDateArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> Data da postagem (hoje {today})
                        </a>
                      </h4>
                    </div>
                    <div id="jobDateArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobDateHeading">
                      <div class="panel-body">
                        <div class="form-group" >
                            <label for="jobDate" >Data da postagem</label>
                            <input type="text" name="jobDate" class="form-control" id="jobDate" value="{today}"/>
                        </div>
                      </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">

        <div class="list-group m-b-10">
            <div class="list-group-item">
                <h4 class="list-group-item-heading"><span class='fa fa-linkedin-square pull-right'></span> <span class='pull-right fa fa-facebook-square'></span> Texto das redes sociais</h4>
            </div>
            <div class="list-group-item">
                <div class="form-group" >
                    <label for="jobDate" >Coment&aacute;rio para postagem</label>
                    <input type="text" name="socialComment" class="form-control" id="linkedinComment" required/>
                </div>
                <div class="form-group" >
                    <label><input type="checkbox" name="shareOnNetworks" value="1" checked="checked"> Compartilhar nas redes sociais</label>
                </div>
            </div>
        </div>

        <div class="list-group m-b-10">
            <div class="list-group-item">
                <h4 class="list-group-item-heading">Dados extras</h4>
            </div>
            <div class="list-group-item">

                 <!-- Idioma (inglês) -->
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="jobLanguageHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobLanguageArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> <i class='fa fa-language'></i> Requisito de ingl&ecirc;s
                        </a>
                      </h4>
                    </div>
                    <div id="jobLanguageArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobLanguageHeading">
                      <div class="panel-body">

                        <div class="form-group">
                            <label>
                                <input type="radio" value="0" name="jobLanguage" checked>&nbsp;&nbsp;N&atilde;o informado / aplic&aacute;vel
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
                    <div id="jobFlagsArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobFlagsHeading">
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
                    <div class="panel-heading" role="tab" id="jobTypeHeading">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse"  href="#jobTypeArea" aria-expanded="false" aria-controls="collapseOne">
                          <i class='fa fa-angle-down'></i> <i class='fa fa-ship'></i> Embarca&ccedil;&atilde;o
                        </a>
                      </h4>
                    </div>
                    <div id="jobTypeArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobTypeHeading">
                      <div class="panel-body">

                        <div class="form-group" id='' >
                            <label>Embarca&ccedil;&atilde;o</label>
                            <select name="shipTypeId" id='shipTypeSelector' class="select2" data-placeholder="Selecione uma embarcação">

                              <option value="0">N&atilde;o informado / aplic&aacute;vel</option>

                              {shipsTypes}
                              <option value="{shipTypeId}" >{shipTypeLabel}</option>
                              {/shipsTypes}
                            </select>

                        </div>
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
                    <div id="jobExpArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobExpHeading">
                      <div class="panel-body">

                        <div class="form-group" >
                            <label for="name" >Experi&ecirc;ncia m&iacute;nima (Em branco: indiferente)</label>             
                            <input type="text" name="experience" class="form-control" id="experience" placeholder="Experi&ecirc;ncia necess&aacute;ria (se houver)" />
                        </div>

                        <div class="form-group" >
                            <label for="name" >Sal&aacute;rio (Em branco: A Combinar)</label>
                            <div class="input-group">
                                <div class="input-group-addon">R$</div>
                                <input type="text" name="sallary" class="form-control" id="sallary" placeholder="Deixar em branco para A Combinar"/>
                            </div>
                        </div>

                        <div class="form-group" >
                            <label for="vacancies" >N&uacute;mero de vagas (se houver a informa&ccedil;&atilde;o)</label>    
                            <div class="input-group">
                                <input type="text" name="jobVacancies" class="form-control" id="vacancies" placeholder="N&uacute;mero de vagas (se houver a informa&ccedil;&atilde;o)." />
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
                    <div id="jobCoursesArea" class="panel-collapse collapse" role="tabpanel" aria-labelledby="jobCoursesHeading">
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
        <div class="list-group m-b-10">
            <div class="list-group-item">
              <ul class="list-inline clearfix">
                <li><button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar</button></li>
                <li class="pull-right">
                  <a href="/jobs" class="btn btn-danger" ><i class="fa fa-times"></i> Cancelar</a>
                </li>
              </ul>
            </div>
        </div>
    </div>
</div>


</form>

<script>
/*
$('#today').jobDatepicker({
    format: "dd/mm/yyyy",
    startDate: "24/08/2014",
    language: "pt-BR",
    orientation: "bottom auto",
    autoclose: true,
    todayHighlight: true
});

$('#jobExpires').jobDatepicker({
    format: "dd/mm/yyyy",
    startDate: "24/08/2014",
    language: "pt-BR",
    orientation: "bottom auto",
    autoclose: true,
    todayHighlight: true
});
*

$('#addRequisiteBtn').click( function()
{
    $('#requisiteOne').clone().find('.jobRequisiteItemInput').val('').end().appendTo('#jobRequisitesList');
    
    var tempId = Math.ceil(Math.random() * 100);

    console.log('Nova ID é ' + tempId);

    $('.jobRequisitesItem').last().attr('id', 'item' + tempId);
    $('.jobRequisitesItemRemover').last().attr('id',tempId);
});

$('#addBenefitBtn').click( function()
{
    $('#benefitOne').clone().find('.jobBenefitItemInput').val('').end().appendTo('#jobBenefitsList');
    
    var tempId = Math.ceil(Math.random() * 100);

    console.log('Nova ID é ' + tempId);

    $('.jobBenefitsItem').last().attr('id', 'item' + tempId);
    $('.jobBenefitsItemRemover').last().attr('id',tempId);
});*/

</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.hiddenCards').hide();
    $(".select2").select2({width: '100%'});
});
</script>

