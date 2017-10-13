<div class="row">
    <div class="col-sm-12">
        <div class="bg-picture bg-picture-100" style="background: #0044aa;">
          <span class="bg-picture-overlay"></span><!-- overlay -->
          <!-- meta -->
          <div class="box-layout meta bottom">
            <div class="col-sm-6 clearfix">
              <span class="img-wrapper float-left m-r-15"><img src="{profilePhoto}" alt="" style="width:64px" class="br-radius"></span>
              <div class="media-body">
                <h3 class="text-white mb-2 m-t-10 ellipsis">{userName}</h3>
                <h5 class="text-white">
                  <ul class="list-inline">
                    <li>{profilePositionLabel}</li>
                    <li>{profileAddress}</li>
                  </ul>
                </h5>
              </div>
            </div>
          </div>
          <!--/ meta -->
        </div>
    </div>
</div>

<div class="row m-t-30">
  <div class="col-lg-12">
    <div class="list-group">
      <ul class="list-inline">
        <li>
          <a href="/recruiting/sendMessage/{profileId}" class="btn btn-default" >
            <i class="fa fa-envelope"></i> Enviar mensagem
          </a>
        </li>

        <li>
          <a href="#" class="btn btn-default" >
            <i class="fa fa-user-plus"></i> Processo seletivo
          </a>
        </li>

        <li class="float-right">
          <div class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle btn btn-primary" href="#">
              <i class="fa fa-external-link"></i> Exportar Curr&iacute;culo <span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
              <li><a href="/profiles/export/{profileId}" target="_blank">Salvar PDF</a></li>
              <li><a href="/profiles/export/{profileId}/I/anonymous" target="_blank">Salvar PDF An&ocirc;nimo</a></li>
              <!--<li class="divider"></li>-->
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

<div class="row m-t-30">
  <div class="col-sm-12">
    <div class="panel panel-default p-0">
      <div class="panel-body p-0"> 
        <ul class="nav nav-tabs profile-tabs">
            <li class="active"><a data-toggle="tab" href="#start">Profissional &amp; Certificados</a></li>
            <li class=""><a data-toggle="tab" href="#applications">Candidaturas</a></li>
            <li class=""><a data-toggle="tab" href="#personal">Pessoais</a></li>
            <li class=""><a data-toggle="tab" href="#docs">Documentos Salvos</a></li>
        </ul>

        <div class="tab-content m-0"> 
          <div id="start" class="tab-pane active">

            <h1 class="">{profileFullName}</h1>

            <div class="row">
              <div class="col-lg-7 col-md-7">
                <div class="readmore" >
                  <p>
                      {profileIntroduction}
                  </p>
                </div>

                <div id="works">
                  <div class="text-muted" id="worksLoadingMessage">
                    <i class="fa fa-spinner fa-spin"></i> Carregando informa&ccedil;&otilde;es
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-5">
                <div class="list-group m-b-10 seafarerData">
                  <div class="list-group-item seafarerData">
                    <h3 class="m-b-0 list-group-item-heading">CIR</h3>

                    Categoria
                    <h4 class="m-t-0">{{$seaman_book_type->code}}</h4>

                    N&uacute;mero
                    <h4 class="m-t-0">{bookNumber}</h4>

                    Validade
                    <h4 class="m-t-0">{bookExpiration}</h4>
                  </div>

                  <div class="list-group-item officerData seafarerData">
                    Pos. Din&acirc;mico
                    <h4 class="heading m-b-0">{dpTypeLabel}</h4>
                  </div>
                  <div class="list-group-item officerData seafarerData">
                    <h3 class="m-b-0 list-group-item-heading">CoC/STCW</h3>

                    Regras STCW
                    <ul class="list-inline">
                      {cocRegulations}
                      <li class="btn btn-sm btn-default">
                        {{$stcw_regulation->regulation}} 
                      </li>
                      {/cocRegulations}
                    </ul>

                    N&uacute;mero CoC
                    <h4 class="m-t-0">{cocNumber}</h4>

                    Validade CoC
                    <h4 class="m-t-0">{cocExpiration}</h4>

                  </div>
                </div>

                <div class="list-group m-b-10">
                  <div class="list-group-item">
                    E-mail
                    <h4 class="heading m-b-0">{profileEmail}</h4>
                  </div>

                  <div class="list-group m-b-10">
                    <div class="list-group-item">
                      Telefones
                      <h4 class="heading m-b-0">
                        Celular: {profilePhone}
                      </h4>
                      Outro: {profileHomePhone}
                    </div>

                    <div class="list-group-item">
                      Ingl&ecirc;s
                      <h4 class="heading m-b-0">{profileEnglishLevelLabel}</h4>
                    </div>

                    <div class="list-group-item">
                      <a href="#" target="_blank">
                        <i class="fa fa-linkedin-square"></i> Perfil
                      </a>
                    </div>
                  </div>

                  

                  <div class="list-group m-b-10" id="certificates">
                    <div class="list-group-item">
                      <h4 class="list-group-item-heading">Certificados</h4>
                    </div>
                    <div class="list-group-item text-muted" id="certificatesLoadingMessage">
                      <i class="fa fa-spinner fa-spin"></i> Carregando certificados
                    </div>
                  </div>

                  <div class="list-group" id="education">
                    <div class="list-group-item">
                      <h4 class="list-group-item-heading">Cursos n&atilde;o-mar&iacute;timos</h4>
                    </div>
                    <div class="list-group-item text-muted" id="educationLoadingMessage">
                      <i class="fa fa-spinner fa-spin"></i> Carregando cursos
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div id="personal" class="tab-pane">

            <h2>Informa&ccedil;&otilde;es Pessoais</h2>

            <div class="row">
              <div class="col-lg-12">

                <h3 class="m-t-0 m-b-20 header-title">Dados Pessoais</h3>

                <ul class="list-unstyled">
                  <li>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 m-b-10">
                        Nascimento
                        <h4 class="m-t-0">{profileBirthday}</h4>
                      </div>
                      <div class="col-lg-6 col-md-6 m-b-10">
                        Nacionalidade
                        <h4 class="m-t-0">{profileNationality}</h4>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 m-b-10">
                        N&uacute;m. Passaporte
                        <h4 class="m-t-0">{profilePassport}</h4>
                      </div>
                      <div class="col-lg-6 col-md-6 m-b-10">
                        Validade
                        <h4 class="m-t-0">{profilePassportExpires}</h4>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 m-b-10">
                        Sexo
                        <h4 class="m-t-0">{profileGenderLabel}</h4>
                      </div>
                      <div class="col-lg-6 col-md-6 m-b-10">
                        Estado Civil
                        <h4 class="m-t-0">{profileMaritalStatusLabel}</h4>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 m-b-10">
                        Telefone residencial
                        <h4 class="m-t-0">{profileHomePhone}</h4>
                      </div>
                      <div class="col-lg-6 col-md-6 m-b-10">
                        Cidade
                        <h4 class="m-t-0">{profileCity} - {profileState}</h4>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div id="applications" class="tab-pane">

            <h2>Curr&iacute;culos enviados</h2>

            <div class="list-group m-b-10" id='applications'>
              <div class="list-group-item" id="applicationsLoadingMessage" >
                <i class="fa fa-spinner fa-spin"></i> Carregando...
              </div>
            </div>
          </div>


          <div id="docs" class="tab-pane">

            <h2>Documentos Salvos</h2>

            <div id="receivedDocumentsList" >

              <div class="list-group m-b-10">
                <div class="list-group-item">
                  <div class="row">
                    <div class="col-lg-9">
                      <div class="form-group">
                        <input class="search form-control" placeholder="Filtrar documentos..." />
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <a href="/documents/request/{profileId}" class="btn btn-primary btn-block btn-custom" >
                        Solicitar documentos
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="list-group list" >

                {receivedDocuments}
                <div class="list-group-item">
                  
                  <h4 class="list-group-item-heading receivedDocumentLabel">
                    {receivedDocumentLabel}
                  </h4>
                  
                  {receivedDocumentUserMessage}

                  <ul class="list-inline">
                    <li><i class="fa fa-circle receivedDocumentStatus-{receivedDocumentStatus}" ></i></li>
                    <li>{receivedDocumentStatusLabel}</li>
                    <li>Em {receivedDocumentDate}</li>
                    <li class="approveDeclineDocument-{receivedDocumentStatus} approveDocumentButton-{receivedDocumentStatus}" >
                      <a href="/documents/approve/{receivedDocumentId}" class="text-success">
                        <i class="fa fa-check"></i> Aprovar
                      </a>
                    </li>
                    <li class="approveDeclineDocument-{receivedDocumentStatus} declineDocumentButton-{receivedDocumentStatus}" >
                      <a href="/documents/decline/{receivedDocumentId}" class="text-danger">
                        <i class="fa fa-times"></i> Recusar
                      </a>
                    </li>
                  </ul>

                  <p>
                    <a href="/documents/view/{receivedDocumentId}" target="_blank" >
                      Ver documento <small><i class="fa fa-external-link"></i></small>
                    </a>
                  </p>

                </div>
                {/receivedDocuments}
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script id="remoteApplicationTemplate" type="text/x-jsrender">
  <div class="list-group-item">
    <h4>{{:applicationPositionLabel}}</h4>
    <ul class="list-inline">
      <li>{{:applicationCompany}}</li>
      <li>Em {{:applicationDate}}</li>
      <li>R${{:applicationSalary}}</li>
  </div>
</script>

<script id="worksTemplate" type="text/x-jsrender">
    <div class="media">
      <div class="media-left">
        <img class="media-object logo-64 img-circle" style="width: 64px;" src="//cdn.upships.com/logos/{{:companyLogo}}">
      </div>
      <div class="media-body">
        <h4 class="media-heading">{{:positionLabel}}</h4>
        <ul class="list-unstyled">
            <li>Empresa: {{:companyName}}</li>
            <li>
              Per&iacute;odo: 
              {{if currentWork}}
                Emprego atual, in&iacute;cio em {{:workStartDate}} ({{:workDurationMonths}} meses)
              {{/if}}

              {{if !currentWork}}
                {{:workDurationMonths}} meses
                <br>
                <small>De {{:workStartDate}} a {{:workEndDate}}</small>
              {{/if}}
            </li>
          
            {{if shipTypeId}}
            <li>
              Tipo de Embarca&ccedil;&atilde;o: {{:workShipTypeLabel}}&nbsp;
            </li>

            {{/if}}

            {{if workShipName}}
              <li>Nome: <b>{{:workShipName}}</b></li>
            {{/if}}
        </ul>
      </div>
    </div>
</script>

<script id="certificatesTemplate" type="text/x-jsrender">
  <div class="list-group-item">
      <h4 class="list-group-item-heading">{{:certificateLabel}} [{{:certificateId}}]</h4>

      <ul class="list-inline">
        {{if certificateExpires}}
          <li><b>Val:</b> {{:certificateExpires}}</li>
        {{/if}}

        {{if certificateSchool}}
          <li><b>Cursou em:</b> {{:certificateSchool}}</li>
        {{/if}}
      </ul>
      
      {{if certificateRemarks}}
        <p><b>Observa&ccedil;&otilde;es:</b> {{:certificateRemarks}}</p>
      {{/if}}
  </div>
</script>

<script id="educationTemplate" type="text/x-jsrender">
  <div class="list-group-item">
      <h4 class="list-group-item-heading" >{{:educationLabel}}</h4>
      {{:educationRemarks}}
      
      <ul>
          {{if educationIssued}}
            <li><b>Emitido em:</b> {{:educationIssued}}</li>
          {{/if}}

          {{if educationExpires}}
          <li><b>Validade:</b> {{:educationExpires}}</li>
          {{/if}}

          {{if educationSchool}}
            <li><b>Cursou em:</b> {{:educationSchool}}</li>
          {{/if}}
      </ul>
  </div>
</script>

<script id="extrasTemplate" type="text/x-jsrender">
  <div class="list-group-item">
      <h4 class="list-group-item-heading" >{{:extrasLabel}}</h4>

      <ul>
          {{if extrasDate}}
          <li><b>Data:</b> {{:extrasDate}}</li>
          {{/if}}

          {{if extrasDescription}}
            <li>{{:extrasDescription}}</li>
          {{/if}}
      </ul>
  </div>
</script>

<script type="text/javascript" src="/_includes/readmore-js/readmore.min.js"></script>

<script>

function loadWorks(profileId)
{
  $.getJSON('/api/profiles/works/' + profileId, function( result ){
    
    var data = result.items;
    var template = $.templates("#worksTemplate");
    var htmlOutput = template.render(data);
    $("#works").append(htmlOutput);

  }).done(function()
  {
    $('#worksLoadingMessage').hide();
  });
}

function loadCertificates(profileId)
{
  $.getJSON('/api/profiles/certificates/' + profileId, function( result ){
    
    var data = result.items;
    var template = $.templates("#certificatesTemplate");
    var htmlOutput = template.render(data);
    $("#certificates").append(htmlOutput);

  }).done(function()
  {
    $('#certificatesLoadingMessage').hide();
  });
}

function loadEducation(profileId)
{
  $.getJSON('/api/profiles/education/' + profileId, function( result ){
    
    var data = result.items;
    
    if(data.total > 0)  {
      var template = $.templates("#educationTemplate");
      var htmlOutput = template.render(data);
      $("#education").append(htmlOutput);
    }
    else {
      $("#education").remove(); 
    }

  }).done(function()
  {
    $('#educationLoadingMessage').hide();
  });
}

function loadLanguages(profileId)
{

}

function loadExtras(profileId)
{
  $.getJSON('/api/profiles/extras/' + profileId, function( result ){
    
    var data = result.items;
    var template = $.templates("#extrasTemplate");
    var htmlOutput = template.render(data);
    $("#extras").append(htmlOutput);

  }).done(function()
  {
    $('#extrasLoadingMessage').hide();
  });
}

$(function()
{
  var profileId = '{profileId}';

  loadWorks(profileId);
  loadCertificates(profileId);
  loadEducation(profileId);
  loadExtras(profileId);

  isSeafarerCheck(profileId);

  // Load job applications
  $.getJSON('/api/profiles/applications/' + profileId, function( result ){
    
    var data = result.items;
    var template = $.templates("#remoteApplicationTemplate");
    var htmlOutput = template.render(data);
    $("#applications").append(htmlOutput);

  }).done(function()
  {
    $('#applicationsLoadingMessage').hide();
  });


  $('.readmore').readmore(
    {
      moreLink: '<a href="#" class="btn btn-sm btn-default m-5"><i class="fa fa-angle-down"></i> <u>Continuar lendo</u></a>',
      lessLink: '<a href="#" class="btn btn-sm btn-default m-5"><i class="fa fa-angle-up"></i> <u>Fechar</u></a>',
      collapsedHeight: 250,
    }
  );

  $('.approveDeclineDocument-2').remove();
  $('.approveDeclineDocument-666').remove();
  $('.approveDeclineDocument-0').remove();
  
  $('.receivedDocumentStatus-0').addClass('text-muted');
  $('.receivedDocumentStatus-1').addClass('text-warning');
  $('.receivedDocumentStatus-2').addClass('text-success');
  $('.receivedDocumentStatus-666').addClass('text-danger');

  
  var options = {
      valueNames: [ 'receivedDocumentLabel' ],
  };

  var filteredList = new List('receivedDocumentsList', options);

});


</script>