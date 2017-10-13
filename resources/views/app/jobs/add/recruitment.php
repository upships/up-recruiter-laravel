<form method="post" action="/jobs/addRecruitmentAction" role="form" enctype="multipart/form-data" id='newJobForm' >
	<input type="hidden" name="jobId" value="{jobId}">

  <div class="row">
      <div class="col-lg-12">


          <div class="list-group m-b-10">
              <div class="list-group-item">
                  <h3 class="list-group-item-heading">2 - Processo de recrutamento</h3>
              </div>
              <div class="list-group-item">

                  <ul class="list-inline">
                      <li>
                          <button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar &amp; Continuar</button>
                      </li>
                      <li class="pull-right">
                          <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class='fa fa-ellipsis-v'></i></span>
                            </a>
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

  
<div class="row">  
  <div class="col-lg-12">
    <div class='list-group'>
      <div class='list-group-item'>
      {pills}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
          <div class="list-group-item">
                  <div>
                  <input type="hidden" name="applicationType" value="3">

                    <h3>Como os usu&aacute;rios ir&atilde;o se candidatar?</h3>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active">
                        <a href="#platform" id='applicationPlatformTrigger' aria-controls="byPlatform" role="tab" data-toggle="tab"><i class='fa fa-th'></i> Pelo site</a>
                      </li>
                      <li role="presentation">
                        <a href="#email" id='applicationEmailTrigger' aria-controls="byEmail" role="tab" data-toggle="tab"><i class='fa fa-envelope'></i> Por e-mail</a>
                      </li>
                      <li role="presentation">
                        <a href="#link" id='applicationLinkTrigger' aria-controls="byLink" role="tab" data-toggle="tab"><i class='fa fa-chrome'></i> Por link</a>
                      </li>
                      <li role="presentation">
                        <a href="#phone" id='applicationPhoneTrigger' aria-controls="byPhone" role="tab" data-toggle="tab"><i class='fa fa-phone'></i> Por telefone</a>
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
          <div class="list-group-item">
              <button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar &amp; Continuar</button>
          </div>
      </div>
  </div>
</form>


<script type="text/javascript">
$(document).ready(function(){
    $(".select2").select2({width: '100%'});
});
</script>

