<div class="row">
	<div class="col-lg-12">
		<div class="list-group m-b-10">
			<div class="list-group-item">
				<div class="media">
					<div class="media-left">
						<img class="media-object img-circle logo-40" src="{userProfilePicture}" alt="{name}"/>
					</div>
					<div class="media-body">
						<h3 class="media-heading">{name}</h3>
						<ul class="list-inline">
							<li>{email}</li>
							<li><i class='fa fa-eye'></i> {userJobViewsCount} vagas</li>
							<li><i class="fa fa-send"></i> {sentProfilesCount} curr&iacute;los</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="list-group-item">
				<div>
				  <!-- Nav tabs -->
				  <ul class="nav nav-pills" role="tablist">
				    <li role="presentation" class="active"><a href="#profiles" aria-controls="profiles" role="tab" data-toggle="tab">Curr&iacute;culos</a></li>
				    <li role="presentation"><a href="#sentProfiles" aria-controls="sentProfiles" role="tab" data-toggle="tab">Envios</a></li>
				    <li role="presentation"><a href="#viewedJobs" aria-controls="viewedJobs" role="tab" data-toggle="tab">Acessos</a></li>

					<li role="presentation" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						  Mais <span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="/users/requestNewPassword/{userId}" ><i class='fa fa-key'></i> Solicitar senha</a>
							</li>
							<li>
								<a href="/users/getLoginCode/{userId}">C&oacute;digo de login</a>
							</li>
						</ul>
					</li>				    
				  </ul>
				</div>
			</div>
		</div>

		<!-- Tab panes -->
	  	<div class="tab-content">
		  	<div role="tabpanel" class="tab-pane active" id="profiles"><!-- Profile tab -->
			  	<div class="row">
			  		<div class="col">

			  			<div class="list-group m-b-10">
			  				<div class="list-group-item">
								<h3 class="list-group-item-heading">
							      	Curr&iacute;culo(s) cadastrado(s)</span>
							    </h3>
							</div>
							<div class="list-group-item">
							    <ul class="nav nav-pills" id='userProfilesList'>
							    </ul>

								<div class="loadingMessage" id='profileLoadingMessage'>
						    		<i class="fa fa-spinner fa-spin"></i> Carregando. Por favor aguarde
						    	</div>
								<div class="hideOnLoad text-danger" id='noProfileMessage'>
						    		<i class="fa fa-times"></i> Usu&aacute;rio n&atilde;o possui nenhum curr&iacute;culo cadastrado.
						    	</div>

							</div>
						</div>

					    <div id="profileContainer">
					    	
					    </div>
				  	</div>
				</div>
			</div><!-- /profile tab -->

			<div role="tabpanel" class="tab-pane" id="sentProfiles"><!-- Sent profiles tab -->

				<div class="row">
				  	<div class="col">

						<div class="list-group">
					      	<div class="list-group-item">
					      		<h3 class="list-group-item-heading">
					      			Curr&iacute;culos enviados <span class="badge">{sentProfilesCount}</span>
					      		</h3>
					      	</div>

				  			{sentProfiles}
					            <div class="list-group-item">
						            <h4 class="list-group-item-heading">
						                <a href="https://vagasembarcado.upships.com/_profiles/{profileFile}" target="_blank">
						                	{name} <i class='fa fa-external-link' ></i>
						                </a>
					              	</h4>
					                <p>{jobPosition_label} / {jobCompany_name}</p>

					                <ul class="list-inline">
					                  <li><small>Em {sentProfileDate}</small></li>
					                  <li><small>{profileLanguageLabel}</small></li>
					                </ul>
					            </div>
				  			{/sentProfiles}
				  		</div>
				   	</div>
				</div>
			</div><!-- /sent profiles tab -->
			<div role="tabpanel" class="tab-pane" id="viewedJobs"><!-- Viewed Jobs tab -->
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div class="list-group">
					      	<div class="list-group-item">
					      		<h4 class="list-group-item-heading">
					      			Vagas acessadas
					      		</h4>
					      	</div>
				  			{jobViews}
				  			<div class="list-group-item">
				  				{jobPosition_label} ({jobCompany_name})<br/>
				  				<small>Em {userActivity_date}</small>
				  			</div>
							{/jobViews}
					     </div>
					</div>
				 </div>
			</div>
		</div>
	</div>
</div>

<script id="workTemplate" type="text/x-jsrender">

	<li id='work-{{:workId}}'>
		<h4>{{:workPositionLabel}}</h4>

		<ul class="m-b-10">	
			<li>Empresa: {{:workCompanyName}}</li>
			<li>Período: {{:workStartDate}} {{if workEndDate}}a {{:workEndDate}}{{/if}} ({{:workDuration}})</li>
			{{if workShipTypeLabel}}
				<li>
				Tipo de embarcação: {{:workShipTypeLabel}}
				</li>
			{{/if}}
			{{if workShipName}}
				<li>Nome da embarca&ccedil;&atilde;o: {{:workShipName}}</li>
			{{/if}}
		</ul>
		
		{{if workText}}
		{{:workText}}
		<br/>
		{{/if}}		
	</li>

</script>

<script id="certificatesTemplate" type="text/x-jsrender">
	<li id='certificate-{{:certificateId}}'>

		<h4>{{:certificateLabel}}</h4>

		<ul class="m-b-10">
			{{if certificateSchool}}
			<li>Institui&ccedil;&atilde;o: {{:certificateSchool}}</li>
			{{/if}}

			{{if certificateIssued}}
			<li>Emiss&atilde;o: {{:certificateIssued}}
			{{/if}}

			{{if certificateExpires}}
			<li>Validado at&eacute;: {{:certificateExpires}}
			{{/if}}
		</ul>
		
		{{if certificateRemarks}}
			{{:certificateRemarks}}
		{{/if}}
	</li>
</script>

<script id="educationTemplate" type="text/x-jsrender">
	<li id='education-{{:educationId}}'>

		<h4 class="list-group-item-heading">{{:educationLabel}}</h4>

		<ul class="m-b-10">
			{{if educationSchool}}
			<li>Institui&ccedil;&atilde;o: {{:educationSchool}}</li>
			{{/if}}

			{{if educationStartDate}}
			<li>In&iacute;cio: {{:educationStartDate}}
			{{/if}}

			{{if educationEndDate}}
			<li>Conclus&atilde;o: {{:educationEndDate}}
			{{/if}}


			{{if educationIssued}}
			<li>Emiss&atilde;o: {{:educationIssued}}
			{{/if}}
			{{if educationExpires}}
			<li>Validado at&eacute;: {{:educationExpires}}
			{{/if}}

		</ul>
		
		{{if educationExtra}}
			{{:educationExtra}}
		{{/if}}
	</li>
</script>

<script id="languagesTemplate" type="text/x-jsrender">
	<li id='language-{{:profileLanguageId}}'>

		<h4>{{:languageLabel}}</h4>

		<ul>
			{{if languageSchool}}
				<li>Institui&ccedil;&atilde;o: {{:languageSchool}}</li>
			{{/if}}
			{{if languageStartDate}}
				<li>Per&iacute;odo: {{:languageStartDate}} {{if languageEndDate}}a {{:languageEndDate}}{{/if}} ({{:languageDuration}})</li>
			{{/if}}

			<li>N&iacute;vel: {{:languageLevelLabel}}
		</ul>
	</li>
</script>

<script id="extrasTemplate" type="text/x-jsrender">
	<li id='extras-{{:extrasId}}'>
		<h4 class="list-group-item-heading">{{:extrasLabel}}</h4>

		<ul>
			{{if extrasDate}}
				<li>Data: {{:extrasDate}}</li>
			{{/if}}
		</ul>

		{{if extrasDescription}}
			{{:extrasDescription}}
		{{/if}}
	</li>
</script>

<script id="profileTemplate" type="text/x-jsrender">
	<div class="list-group m-b-10">

		<div class="list-group-item">
			<div class="row">
		    	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 m-b-5">
					<h3 class="list-group-item-heading">Curr&iacute;culo {{:profileLabel}}</h3>
					<ul class="list-inline">
		            	<li>Idioma {{:profileLanguageLabel}}</li>
		            	<li>Criado em {{:profileCreatedAt}}</li>
					</ul>
		        </div>
		        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right">
		        	<!--
		        	<ul class="list-inline">
		        		<li><h4 class="list-group-item-heading">12 ENVIOS</h4></li>
						<li>
							<a href="/profiles/forward/{{:profileId}}" class="btn btn-success btn-lg">
								<i class="fa fa-send"></i> Enviar
							</a>
						</li>
					</ul>-->
		        </div>
		  	</div>
		</div>
		<div class="list-group-item">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 m-b-10 text-left">
					<h5 class="list-group-item-heading">Dados de contato</h5>
					<ul class="list-unstyled">
						<li><b>Endere&ccedil;o:</b> {{:profileAddress}}</li>
						
						<li><b>Telefone celular:</b> {{:profileCellPhone}}</li>
						<li><b>Outro n&uacute;mero:</b> {{:profilePhone}}</li>
						<li><a href='{{:profileLinkedIn}}' class="hasLinkedIn-{{:hasLinkedIn}}" target="_blank" >Perfil no LinkedIn <i class="fa fa-external-link"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12 m-b-10 text-left">
					<h5 class="list-group-item-heading">Informa&ccedil;&otilde;es pessoais</h5>

					<ul class="list-unstyled">
						<li><b>Nascimento</b>: {{:birthday}}</li>
						<li><b>Nacionalidade</b>: {{:country_of_nationality}}</li>
						<li><b>Passaporte</b>: {{:passport}}</li>
						<li><b>Estado civil</b>: {{:maritalStatusLabel}}</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="list-group-item">
			{{if profileIntroduction}}
				<h5 class="list-group-item-heading">Texto introdut&oacute;rio</h5>
				{{:profileIntroduction}}
			{{/if}}

			{{if profileObjective}}
				<h3>Objetivo</h3>
				{{:profileObjective}}
			{{/if}}
		</div>
		<div class="list-group-item">

		{{if profileWorks}}
			<h3><i class="fa fa-briefcase"></i> Experi&ecirc;ncia Profissional</h3>

			<ul class="list-unstyled" id="work">
				<li class="loadingMessage">
					<i class="fa fa-spinner fa-spin"></i> Carregando...
				</li>
				{{for profileWorks tmpl='#workTemplate'/}}
			</ul>
		{{/if}}

		{{if profileCertificates}}
			<h3><i class="fa fa-graduation-cap"></i> Cursos &amp; Certificados</h3>

			<ul class="list-unstyled" id="certificates">
				<li class="loadingMessage">
					<i class="fa fa-spinner fa-spin"></i> Carregando...
				</li>

				{{for profileCertificates tmpl='#certificatesTemplate'/}}
			</ul>
		{{/if}}

		{{if profileEducation}}
			<h3><i class="fa fa-graduation-cap"></i> Educa&ccedil;&atilde;o</h3>

			<ul class="list-unstyled" id="education">
				<li class="loadingMessage">
					<i class="fa fa-spinner fa-spin"></i> Carregando...
				</li>
				{{for profileEducation tmpl='#educationTemplate'/}}
			</ul>
		{{/if}}

		{{if profileLanguages}}
			<h3><i class="fa fa-language"></i> Idiomas</h3>

			<ul class="list-unstyled" id="languages">
				<li class="loadingMessage">
					<i class="fa fa-spinner fa-spin"></i> Carregando...
				</li>
			</ul>

			{{for profileLanguages tmpl='#languagesTemplate'/}}
		{{/if}}

		{{if profileExtras}}
			<h3 class="list-group-item-heading"><i class="fa fa-info"></i> Outras informa&ccedil;&otilde;es</h3>

			<ul class="list-unstyled" id="extras">
				<li class="loadingMessage">
					<i class="fa fa-spinner fa-spin"></i> Carregando...
				</li>

				{{for profileExtras tmpl='#extrasTemplate'/}}
			</ul>
		{{/if}}

		</div>
	</div>
</script>

<script id="profilesListTemplate" type="text/x-jsrender">
	<li role="presentation" class="profilesListItem" id='profilesListItem-{{:profileId}}'>
		<a href='#loadProfile-{{:profileId}}' onclick="loadProfile({{:profileId}})">{{:profileLabel}}</a>
	</li>
</script>

<script>

function loadProfile(profileId)
{
	console.log('Carregando currículo ' + profileId);
  	
  	$.getJSON('/json/profiles/view/' + profileId, function( result ){
    
    console.log('Curriculo carregado, seguem os dados');
    console.log(result);

	var profileTemplate = $.templates("#profileTemplate");
    var profileOutput = profileTemplate.render(result);
    $("#profileContainer").html(profileOutput);

    /*
    var profileWorks = result.profileWorks;
    var profileCertificates = result.profileCertificates;
    var profileEducation = result.profileEducation;
    var profileLanguages = result.profileLanguages;
    var profileExtras = result.profileExtras;

    console.log(profileWorks);

    var workTemplate = $.templates("#workTemplate");
    var workOutput = workTemplate.render(profileWorks);
    $("#work").append(workOutput);

    var certificatesTemplate = $.templates("#certificatesTemplate");
    var certificatesOutput = certificatesTemplate.render(profileCertificates);
    $("#certificates").append(certificatesOutput);

    var educationTemplate = $.templates("#educationTemplate");
    var educationOutput = educationTemplate.render(profileEducation);
    $("#education").append(educationOutput);

    var languagesTemplate = $.templates("#languagesTemplate");
    var languagesOutput = languagesTemplate.render(profileLanguages);
    $("#languages").append(languagesOutput);

    var extrasTemplate = $.templates("#extrasTemplate");
    var extrasOutput = extrasTemplate.render(profileExtras);
    $("#extras").append(extrasOutput);
    */
    
  }).done(function(){
  	$('.loadingMessage').hide();

  	$('.profilesListItem').removeClass('active');
  	$('#profilesListItem-' + profileId).addClass('active');
  });
};

function listProfiles(userId)
{
	$.getJSON('/json/profiles/listByUser/' + userId, function( result ){
    	
    	var total = result.total;

    	if(total > 0)
	    {
		    console.log('Carregando lista de currículos');
			var profilesListTemplate = $.templates("#profilesListTemplate");
		    var profilesListOutput = profilesListTemplate.render(result.items);
		    $("#userProfilesList").append(profilesListOutput);    		
    	}
    	else
    	{
    		console.log('Nenhum curriculo encontrado.');
    	}

    });	
}

$(function()
{
	$('.hideOnLoad').hide();

	var profileId = '{firstProfileId}';
	var userId = '{userId}';

	if(profileId != '')
	{
		loadProfile(profileId);
	}
	else
	{
		console.log('Nenhum curriculo encontrado');
		$('#noProfileMessage').show();
		$('#profileLoadingMessage').hide();
	}
	
	listProfiles(userId);
});
</script>