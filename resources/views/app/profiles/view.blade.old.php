@extends('layouts.master')

@section('page-title')
  Processo Seletivo: {{$selection->label}}
@endsection

@section('content')

<div class="row">
  <div class="col">
      
    <h3>{{$profile->name}}</h3>
        
    <ul class="list-inline">
      <li>{{$profile->position->label}}</li>
      <li>{{$profile->address}}</li>
    </ul>
    
    <toolbar>
      <toolbar-item link="/conversation/add?recipient={{$profile->user->id}}" icon="envelope" >Enviar mensagem</toolbar-item>
      <toolbar-item link="/profile/{{$profile->user->id}}/add_to_selection" icon="plus" >Incluir em Sele&ccedil;&atilde;o</toolbar-item>

      <div class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle btn btn-primary" href="#">
          <i class="fa fa-external-link"></i> Exportar Curr&iacute;culo <span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">
          <li><a href="/profiles/export/{{$profile->id}}" target="_blank">Salvar PDF</a></li>
          <li><a href="/profiles/export/{{$profile->id}}/I/anonymous" target="_blank">Salvar PDF An&ocirc;nimo</a></li>
        </ul>
      </div>

    </toolbar>

      <div class="panel panel-default">
        <div class="panel-block"> 

          <ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
            <li class="nav-item">
              <a class="active" data-toggle="tab" role="tab" data-target="#tab-start" href="#">Profissional &amp; Certificados</a>
            </li>
            <li class="nav-item">
              <a href="#" data-toggle="tab" role="tab" data-target="#tab-applications">Candidaturas</a>
            </li>
            <li class="nav-item">
              <a href="#" data-toggle="tab" role="tab" data-target="#tab-personal">Dados Pessoais</a>
            </li>
            <li class="nav-item">
              <a href="#" data-toggle="tab" role="tab" data-target="#tab-documents">Documentos</a>
            </li>
          </ul>

            <div class="tab-content"> 
              <div id="start" class="tab-pane active">

                <div class="row">
                  <div class="col-lg-7 col-md-7">
                    <div class="readmore" >
                      <p>
                          {{$profile->introduction}}
                      </p>
                    </div>

                    <div id="works">
                      <div class="text-muted" id="worksLoadingMessage">
                        <i class="fa fa-spinner fa-spin"></i> Carregando informa&ccedil;&otilde;es
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5 col-md-5">
                    <div class="list-group seafarerData">
                      <div class="list-group-item seafarerData">
                        <h3 class="m-b-0 list-group-item-heading">CIR</h3>

                        @foreach($seaman_book_types as $seaman_book)
                          <h4 class="m-t-0">{{$seaman_book->seaman_book_type->code}}</h4>

                          N&uacute;mero
                          <h4 class="m-t-0">{{$seaman_book->number}}</h4>

                          Validade
                          <h4 class="m-t-0">{{$seaman_book->expiration_date}}</h4>
                        @endforeach
                      </div>

                      <div class="list-group-item officerData seafarerData">
                        @foreach($dps as $dp)
                          Pos. Din&acirc;mico
                          <h4 class="heading m-b-0">{{$dp->dp_type->label}}</h4>
                        @endforeach
                      </div>
                      <div class="list-group-item officerData seafarerData">
                        <h3 class="m-b-0 list-group-item-heading">CoC/STCW</h3>

                        Regras STCW
                        <ul class="list-inline">
                          @foreach($stcw_regulations as $stcw_regulation)
                          <li class="btn btn-sm btn-default">
                            {{$stcw_regulation->stcw_regulation->regulation}} 
                          </li>
                          @endforeach
                        </ul>

                        N&uacute;mero CoC
                        <h4 class="m-t-0">{{$profile->coc->number}}</h4>

                        Validade CoC
                        <h4 class="m-t-0">{{$profile->coc->expiration_date}}</h4>

                      </div>
                    </div>

                    <div class="card card-default">
                        <div class="list-group list-group-flush" >
                      <div class="list-group-item">
                        E-mail
                        <h4 class="heading m-b-0">{{$profile->user->email}}</h4>
                      </div>

                      <div class="card card-default">
                        <div class="list-group list-group-flush" >
                        <div class="list-group-item">
                          Telefones
                          <h4 class="heading m-b-0">
                            Celular: {{$profile->phone}}
                          </h4>
                          Outro: {{$profile->land_phone}}
                        </div>

                        <!-- <div class="list-group-item">
                          Ingl&ecirc;s
                          <h4 class="heading m-b-0">{profileEnglishLevelLabel}</h4>
                        </div> -->

                        <!-- <div class="list-group-item">
                          <a href="#" target="_blank">
                            <i class="fa fa-linkedin-square"></i> Perfil
                          </a>
                        </div> -->
                      </div>

                      <h4>Certificados</h4>

                      <profile-certificates>
                        <profile-certificates-item v-for="certificate as profile.certificates" :certificate="certificate" :key="certificate.id" ></profile-certificate>
                      </profile-certificates>

                      <profile-education>
                        <profile-education-item v-for="education as profile.educations" :certificate="education" :key="education.id" ></profile-education-item>
                      </profile-education>

                    </div>
                  </div>
                </div>
              </div>

              <div id="personal" class="tab-pane">

                <h2>Informa&ccedil;&otilde;es Pessoais</h2>

                <div class="row">
                  <div class="col">

                    <h3 class="header-title">Dados Pessoais</h3>

                    <ul class="list-unstyled">
                      <li>
                        <div class="row">
                          <div class="col">
                            Nascimento
                            <h4 class="m-t-0">{{$profile->birthday}}</h4>
                          </div>
                          <div class="col">
                            Nacionalidade
                            <h4 class="m-t-0">{{$profile->country_of_nationality->name}}</h4>
                          </div>
                        </div>
                      </li>
                      <li>
                        @foreach($passports as $passport)
                          <div class="row">  
                              <div class="col">
                                  N&uacute;m. Passaporte
                                  <h4 class="m-t-0">{{$passport->number}}</h4>
                              </div>
                              <div class="col">
                                Validade
                                <h4 class="m-t-0">{{$passport->expiration_date}}</h4>
                              </div>
                          </div>
                          @endforeach
                      </li>
                      <li>
                        <div class="row">
                          <div class="col">
                            Sexo
                            <h4 class="m-t-0">{{$profile->gender_label}}</h4>
                          </div>
                          <div class="col">
                            Estado Civil
                            <h4 class="m-t-0">{{$profile->marital_status_label}}</h4>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="row">
                          <div class="col">
                            Telefone residencial
                            <h4 class="m-t-0">{{$profile->land_phone}}</h4>
                          </div>
                          <div class="col">
                            Cidade
                            <h4 class="m-t-0">{{$profile->city}} - {{$profile->state}}</h4>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              
              <div id="applications" class="tab-pane">

                <h2>Candidaturas</h2>

                <div class="card card-default">
                  <div class="list-group list-group-flush" >
                  </div>
                </div>

              </div>

              <div id="docs" class="tab-pane">

                <h2>Documentos</h2>

                <div id="receivedDocumentsList" >

                  <div class="card card-default">
                    <div class="list-group list-group-flush" >
                      <div class="list-group-item">
                        <div class="row">
                          <div class="col-lg-9">
                            <div class="form-group">
                              <input class="search form-control" placeholder="Filtrar documentos..." />
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <a href="/documents/request/{{$profile->id}}" class="btn btn-primary btn-block btn-custom" >
                              Solicitar documentos
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                      
                  <h3>Documentos Solicitados</h3>

                  @foreach($profile->document_requests as $document_request)

                  <div class="card card-default">
                    <div class="card-block">
                      
                      <h4>
                        {{$profile->document_request->label}}
                      </h4>
                      
                      <p>{{$document_request->message}}</p>
                    </div>

                    <div class="card-footer">
                      <div class="d-flex justify-content-around" >
                        <div class="mr-2" ><i class="fa fa-circle" ></i></div>
                        <div class="mr-2" >{{$document_request->status_label}}</div>
                        <div class="mr-2" >Em {{$document_request->date}}</div>

                        <div class="mr-2" >
                          <a href="/document_request/{{$document_request->id}}/approve" class="text-success">
                            <i class="fa fa-check"></i> Aprovar
                          </a>
                        </div>

                        <div class="mr-2" >
                          <a href="/document_request/{{$document_request->id}}/decline" class="text-danger">
                            <i class="fa fa-times"></i> Recusar
                          </a>
                        </div>
                        <div class="mr-2" >
                          <a href="/document_reques/{{$document_request->id}}" target="_blank" >
                            Ver document_requesto <small><i class="fa fa-external-link"></i></small>
                          </a>
                        </div>
                      </div>
                    </div>
                  @endforeach

                  <h3>Documentos</h3>

                  @foreach($profile->documents as $document)

                  <div class="card card-default">
                    <div class="card-block">

                      <h4>
                        {{$profile->document->label}}
                      </h4>

                      <div class="d-flex justify-content-around" >
                        <div class="mr-2" >Em {{$document->date}}</div>
                        <div class="mr-2">
                          <a href="/document/{{$document->id}}" target="_blank" >
                            Ver documento <small><i class="fa fa-external-link"></i></small>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  @endforeach

                </div>
              </div>
            </div>
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
  var profileId = '{{$profile->id}}';

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