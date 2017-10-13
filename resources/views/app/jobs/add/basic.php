<form method="post" action="/jobs/addBasicAction" role="form" enctype="multipart/form-data" id='newJobForm' >
  <div class="row">

    <div class="col-lg-12">

      <div class="list-group m-b-10">
          <div class="list-group-item">
              <h3 class="list-group-item-heading">Adicionar oferta de emprego</h3>
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
    <div class="list-group">
      <div class="list-group-item">
        <h3 class="list-group-item-heading">Dados B&aacute;sicos</h3>
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

          <h4>Embarca&ccedil;&atilde;o (se houver)</h4>
          
          <div class="form-group" >
              <label>Embarca&ccedil;&atilde;o</label>
              <select name="shipTypeId" id='shipTypeSelector' class="select2" data-placeholder="Selecione uma embarcação">

                <option value="0">N&atilde;o informado / aplic&aacute;vel</option>

                {shipsTypes}
                <option value="{shipTypeId}" >{shipTypeLabel}</option>
                {/shipsTypes}
              </select>
          </div>

          <div class="form-group" >
              <label for="jobPrivacy" >Privacidade da vaga</label>
              <select class="form-control" name="jobPrivacy" >
                  <option value="1" >Aberta</option>
                  <option value="2" >Confidencial</option>
                  <option value="3" >Particular</option>
              </select>
          </div>
          <small><i><b>Aberta</b> - ser&aacute; exibida no site normalmente, <b>Confidencial</b> - o nome da empresa ser&aacute; preservado, <b>Particular</b> - n&atilde;o ser&aacute; exibida no site</i></small>


          <h4>Descri&ccedil;&atilde;o da vaga (se houver)</h4>

          <div class="form-group" >
              <label for="jobDescription" >Descri&ccedil;&atilde;o da vaga</label>
              <textarea name="jobDescription" class="form-control" ></textarea>
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
    $('.hiddenCards').hide();
    $(".select2").select2({width: '100%'});
});
</script>

