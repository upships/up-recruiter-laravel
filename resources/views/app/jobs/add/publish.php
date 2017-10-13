<form method="post" action="/jobs/publishAction" role="form" enctype="multipart/form-data" id='newJobForm' >
  <input type="hidden" name="jobId" value="{jobId}">

  <div class="row">
    <div class="col-lg-12">
      <h3>Publicar vaga</h3>

      <div class="list-group m-b-10">
        <div class="list-group-item">
          <p>Vaga para <b>{jobPositionLabel}</b></p>

          <ul class="list-inline">
            <li>
              <b>Requisitos</b>
              <ul>
              {jobRequisites}
                <li>{jobRequisiteValue}</li>
              {/jobRequisites}
              </ul>
            </li>
            <li>
                <b>Embarca&ccedil;&atilde;o</b><br/>
                {shipTypeLabel}
            </li>
            <li>
              <b>Ingl&ecirc;s</b><br/>
              {jobLanguageLabel}
            </li>
            <li>
              <b>Categorias CIR</b>
              <ul class="list-inline">
                {jobBookCategories}
                <li><u>{bookCategoryCode}</u></li>
                {/jobBookCategories}
              </ul>
            </li>
            <li>
              Regras STCW
              <ul>
              {jobStcwRegulations}
                <li><u>{stcwRegulation}</u></li>
              {/jobStcwRegulations}
              </ul>
            </li>
          </ul>
        </div>
        <div class="list-group-item">

          <ul class="list-inline">
            <li>
                <button class="btn btn-primary btn-fill btn-lg"><i class='fa fa-send'></i> Publicar</button>
            </li>
            <li class="pull-right">
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
          </ul>
        </div>
      </div>

      <div class='list-group'>
        <div class='list-group-item'>
        {pills}
        </div>

        <div class="list-group-item">

          <!-- conteudo -->
          <div class="row">
            <div class="col-md-6">

              <p>Selecione os perfis que deseja publicar esta vaga.</p>

              <div class="list-group m-b-10">

                <div class="list-group-item">
                  <label>
                    <input type="checkbox" name="shareWithUs" value="1" checked> <img src="/_images/logo.png" class="img-circle" style="width: 30px;"> VagasEmbarcado.com <i class="fa fa-linkedin-square"></i>&nbsp;<i class="fa fa-facebook-square"></i>
                  </label>
                </div>

                <div class="list-group-item">
                  <label>
                    <input type="checkbox" name="linkedInCompanies[]" value="{companyId}" checked> <img src="https://cdn.upships.com/logos/{companyLogo}" class="img-circle" style="width: 30px;"> {companyName} (sua empresa) <i class="fa fa-linkedin-square"></i>
                  </label>
                </div>

                {linkedInUsers}
                <div class="list-group-item">
                  <label class="lnkAccessToken-{hasAccessToken}">
                    <input type="checkbox" class="lnkAccessTokenInput-{hasAccessToken}" name="linkedInUsers[]" value="{lnkUid}" checked> <img src="{lnkPhoto}" class="img-circle" style="width: 30px;"> {lnkName} ({lnkEmail}) <i class="fa fa-linkedin-square"></i>
                  </label>
                </div>
                {/linkedInUsers}
              </div>

            </div>
            <div class="col-md-6">
                
              <div class="form-group" >
                <label for="socialComment" >Texto para compartilhamento</label>
                <input type="text" name="socialComment" class="form-control" id="linkedinComment" placeholder="Texto para compartilhamento" />
              </div>

              <div class="form-group" >
                <label for="jobDate" >Data da postagem</label>
                <input type="text" name="jobDate" class="form-control" id="jobDate" value="{today}"/>
              </div>

              <div class="form-group" >
                <label for="jobDate" >Data de validade (padr&atilde;o: 14 dias)</label>
                <input type="text" name="jobExpires" class="form-control" id="jobDate" value="{jobExpires}"/>
              </div>
            </div>
          </div>
        </div>
        <div class="list-group-item">
            <button class="btn btn-primary btn-lg btn-fill"><i class='fa fa-send'></i> Publicar</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
$(document).ready(function()
{

  $('.lnkAccessToken-0').addClass('text-danger');
  $('.lnkAccessTokenInput-0').remove();

});
</script>