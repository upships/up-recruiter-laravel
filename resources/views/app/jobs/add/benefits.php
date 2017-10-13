<form method="post" action="/jobs/addBenefitsAction" role="form" enctype="multipart/form-data" id='newJobForm' >
  <input type="hidden" name="jobId" value="{jobId}">

  <div class="row">
    <div class="col-lg-12">
      <h3>Adicionar benef&iacute;cios</h3>

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
                <button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar &amp; Continuar</button>
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

            <li class="pull-right">
                <a class="btn btn-default btn-fill" href="/jobs/add/extra/{jobId}">Pular <i class='fa fa-angle-right'></i><i class='fa fa-angle-right'></i></a>
            </li>
            <li class="pull-right">
                <a class="btn btn-primary btn-fill" href="/jobs/add/publish/{jobId}">
                  <i class='fa fa-check'></i> Finalizar
                </a>
            </li>

          </ul>
        </div>
      </div>
      <div class="list-group m-b-10">
        <div class='list-group-item'>
        {pills}
        </div>

        <div class="list-group-item">

          <!-- conteudo -->
           
          <!-- Benefícios -->
          <h4>Benef&iacute;cios</h4>
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

          <h4>Payment</h4>

          <div class="form-group">
            <label for='jobSalaryType' >Payment type</label>
            <select name="jobSalaryType" class="form-control">
              <option value="0">Not informed</option>
              <option value="1">Request pretension</option>
              <option value="2">Daily rate</option>
              <option value="3">Monthly rate</option>
              <option value="4">Per contract</option>
            </select>
          </div>

          <div class="row" id="salary-options">
            <div class="col-lg-6">
              <div class="form-group">
                <label for='jobSalaryCurrency' >Currency</label>
                <select name="jobSalaryCurrency" class="form-control">
                  {currencies}
                  <option value="{currencyId}">{currencyCode}</option>
                  {/currencies}
                </select>
              </div>
            </div>                

            <div class="col-lg-6">
              <div class="form-group">
                <label for='jobSalaryValue' >Salary (raw value)</label>
                <input type="text" name="jobSalaryValue" class="form-control" placeholder="Ex.: 5000">
              </div>
            </div>

          </div>                 

        <!-- / fim conteudo -->

        </div>
        <div class="list-group-item">
            <button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar &amp; Continuar</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script type="text/javascript">
$(function()
  {
    $('#newJobForm').keypress(function (e) {     
      var charCode = e.charCode || e.keyCode || e.which;
      if (charCode  == 13) {
          return false;
      }
    });
  
  });
  
</script>