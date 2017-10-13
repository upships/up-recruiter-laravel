<form method="post" action="/jobs/addRequirementsAction" role="form" enctype="multipart/form-data" id='addJobRequirementsForm' >
  <input type="hidden" name="jobId" value="{{$job->id}}">

  <div class="row">
    <div class="col-lg-12">
      <h3>Adicionar requisitos</h3>

      <div class="list-group m-b-10">
        <div class="list-group-item">
            <p>Vaga para {$job->position->label}</p>

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
                <button type="button" onclick="submitForm()" class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar &amp; Continuar</button>
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
                <a class="btn btn-default btn-fill" href="/jobs/add/benefits/{{$job->id}}">Pular <i class='fa fa-angle-right'></i><i class='fa fa-angle-right'></i></a>
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

        <!-- conteudo -->
          <h4>Requisitos de Ingl&ecirc;s</h4>

          <!-- Idioma (inglês) -->
          
          <div class="form-group">
            <ul class="list-inline">
              <li>
                <label>
                    <input type="radio" value="0" name="jobEnglish" checked>&nbsp;&nbsp;N&atilde;o informado / aplic&aacute;vel
                </label>
              </li>
                <label>
                    <input type="radio" value="1" name="jobEnglish">&nbsp;&nbsp;B&aacute;sico
                </label>
              </li>
              <li>
                <label>
                    <input type="radio" value="2" name="jobEnglish">&nbsp;&nbsp;Intermedi&aacute;rio
                </label>
              </li>
              <li>
                <label>
                    <input type="radio" value="3" name="jobEnglish">&nbsp;&nbsp;Avan&ccedil;ado
                </label>
              </li>
              <li>
               <label>
                    <input type="radio" value="4" name="jobEnglish">&nbsp;&nbsp;Fluente
                </label>
              </li>
            </ul>
          </div>
        </div>

        <div class="list-group-item">
          <div id="requirements"></div>

          <div class="row">
            <div class="col-lg-4 m-b-10">
              <h4>Categorias CIR</h4>

              <select name='bookCategories' id="bookCategories" class="select2" multiple="multiple" data-placeholder="Choose a book category">
                  <option value="#">&nbsp;</option>
                  @foreach($seaman_book_types as $seaman_book_type)
                      <option value="{bookCategoryId}">{{$seaman_book_type->code}} - {bookCategoryLabel}</option>
                  @endforeach
              </select>
            </div>

            <div class="col-lg-4 m-b-10">
              <h4>Regras STCW</h4>

              <select name='stcwRegulations' id="stcwRegulations" class="select2" multiple="multiple" data-placeholder="Choose a STCW regulation">
                  <option value="#">&nbsp;</option>
                  {stcwRegulations}
                      <option value="{{$stcw_regulation->id}}">{stcwRegulationChapter} - {{$stcw_regulation->regulation}}</option>
                  {/stcwRegulations}
              </select>
            </div>

            <div class="col-lg-4 m-b-10">
              <h4>Certificados</h4>
              
              <select name='certificates' id="certificates" class="select2" multiple="multiple" data-placeholder="Choose a certificate">
                <option value="#">&nbsp;</option>

                {trainings}
                    <option value="{{$training->id}}" >{{$training->label}} {{$training->description}}</option>
                {/trainings}
              </select>
            </div>
          </div>
        </div>

        <div class="list-group-item">
          <div class="row">
            <div class="col-lg-6">
              <h4>Experi&ecirc;ncia</h4>

              <div class="form-group" >
                  <label for="name" >Experi&ecirc;ncia m&iacute;nima (Em branco: indiferente)</label>             
                  <input type="text" name="experience" class="form-control" id="experience" placeholder="Experi&ecirc;ncia necess&aacute;ria (se houver)" />
              </div> 
            </div>
            <div class="col-lg-6">
              <h4>Outros requisitos</h4>

              <div class="list-group" id='jobRequirementsList'>

                  <div class="list-group-item jobRequirementsItem" id='requirementOne'>
                      <div class="form-group" >
                          <label for="jobRequirements" >Requisito da vaga</label>
                          <input name="jobRequirements[]" type="text" class="form-control jobRequirementItemInput">                              
                      </div>
                  </div>
              </div>
              
              <br/>

              <button type='button' class="btn btn-default btn-sm" id='addRequirementBtn'><i class='fa fa-plus' ></i> Adicionar requisito</button>
            </div>
          </div>
        </div>
        <div class="list-group-item">
            <button type="button" onclick="submitForm()" class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar &amp; Continuar</button>
        </div>
      </div>
    </div>
  </div>
</form>


<script type="text/javascript">

function submitForm() {

  // Insert book categories, STCW regulations and certificates

  // Get book categories
    var bookCategoriesArr = $('#bookCategories').val();

    if(bookCategoriesArr) {
      document.getElementById('requirements').innerHTML += bookCategoriesArr.map(function(v) {
          return '<input type="hidden" value="' + v + '" name="selectedBookCategories[]" >';
      }).join('');
    }

    // Get STCW Regulations
    var stcwRegulationsArr = $('#stcwRegulations').val();

    if(stcwRegulationsArr) {
      document.getElementById('requirements').innerHTML += stcwRegulationsArr.map(function(v) {
          return '<input type="hidden" value="' + v + '" name="selectedStcwRegulations[]" >';
      }).join('');
    }

    // Get Certificates
    var certificatesArr = $('#certificates').val();

    if(certificatesArr) {
      document.getElementById('requirements').innerHTML += certificatesArr.map(function(v) {
          return '<input type="hidden" value="' + v + '" name="selectedCertificates[]" >';
      }).join('');
    }  

    document.getElementById('addJobRequirementsForm').submit();
}

$(document).ready(function(){
    $('.hiddenCards').hide();
    $(".select2").select2({width: '100%'});

    $('#newJobForm').keypress(function (e) {     
    var charCode = e.charCode || e.keyCode || e.which;
    if (charCode  == 13) {
        return false;
    }
});
});
</script>

