<div class="row m-b-10">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="list-group">
			<div class="list-group-item">
				<h3 class="list-group-item-heading m-b-10">
				<a href="#" data-type="select" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="positionId" data-title="Selecione a função" class="editables" data-source="/api/positions/editor" data-value='{position->id}' >{$job->position->label}</a>
				</h3>

				<ul class="list-inline">
					<li>
						<i class='fa fa-clock-o' ></i> Postada em {{$job->date}}
					</li>
					<li>
						Por {userName}
					</li>

					<li class="float-right">
						Privacidade: 
						<a href="#" data-type="select" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="jobPrivacy" data-title="Privacidade" class="editables" data-source="/api/data/privacyLevels" data-value='{jobPrivacy}' >{{$job->privacy_label}}</a>
					</li>
				</ul>
			</div>
			<div class="list-group-item">

				<ul class="list-inline">
					<li>
						<a href="/jobs/conclude/{{$job->id}}" class="btn btn-success btn-fill" ><i class='fa fa-check' ></i> Iniciar processo seletivo</a>
					</li>

					<li class="hidden-sm hidden-xs">
						<a href="/jobs/share/{{$job->id}}" class="btn btn-primary" ><i class='fa fa-share' ></i> Compartilhar</a>
					</li>

					<li>
						<a href="#cl" data-clipboard-text="https://vagasembarcado.upships.com/job/{jobSlug}" class="btn btn-default copy" title="Copiar link" >
						<i class="fa fa-clipboard"></i>
						</a>
					</li>

					<li class="float-right">
						<a href="/jobs/edit/{{$job->id}}" class="btn btn-default btn-fill" ><i class='fa fa-pencil-square-o' ></i> Editar</a>
					</li>
					
					<li class="clearfix"></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<ul class="nav nav-tabs"> 
	        <li class="active"> 
	            <a href="#candidates" data-toggle="tab" aria-expanded="true"> 
	                <i class="fa fa-users"></i> Candidatos
	            </a> 
	        </li>

	        <li class=""> 
	            <a href="#removedCandidates" data-toggle="tab" aria-expanded="true"> 
	                <i class="fa fa-user-times"></i> Candidatos eliminados
	            </a> 
	        </li>

	        <li class=""> 
	            <a href="#job" data-toggle="tab" aria-expanded="false"> 
	                <i class="fa fa-suitcase"></i> Dados da vaga
	            </a> 
	        </li>
	    </ul>
	    <div class="tab-content"> 
	        <div class="tab-pane active" id="candidates">
				<h2 class="">Candidatos</h2>

				<div class="row">
					
					<div class="col-lg-12">

						<div class="list-group m-b-10" id="selectedApplicants">
							<div class="list-group-item">
								<h3 class="list-group-item-heading" >Candidatos pr&eacute;-selecionados</h3>
								<p><span id="selectedApplicantsCounter">0</span> candidatos</p>
							</div>
							<div class="list-group-item" id="selectedApplicantsLoadingMessage">
								<i class="fa fa-spinner fa-spin"></i> Carregando candidatos pr&eacute;-selecionados
							</div>
							<div class="list-group-item" id="selectedApplicantsNoResultsMessage">
								<i class="fa fa-exclamation-triangle"></i> Nenhum candidato pr&eacute;-selecionado
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4" id="filtersArea" >
								<div class="list-group" id="notSelectedApplicantsFilters">
									<div class="list-group-item">
										<h3 class="list-group-item-heading" >Filtros</h3>
									</div>
									<!-- <div class="list-group-item" id="filtersBtnArea">
										<ul class="list-inline">
											<li>
												<button type="button" class="btn btn-default btn-block" onclick="loadProfileFilters()" id="filtersBtn" ><i class="fa fa-filters"></i> Carregar filtros
												</button>
											</li>
										</ul>
									</div> -->
									<div class="list-group-item filtersItems" id="profileFiltersBookCategories">
										<h4 class="list-group-item-heading" >Categorias CIR</h4>

										<p id="profileFiltersBookCategoriesLoadingMessage">
											<i class="fa fa-spinner fa-spin"></i> Carregando categorias CIR
										</p>
										<p id="profileFiltersBookCategoriesNoResultsMessage">
											<small class="text-muted">
											<i class="fa fa-exclamation-triangle"></i> Nenhuma categoria CIR para filtrar
											</small>
										</p>
									</div>
									<div class="list-group-item filtersItems" id="profileFiltersStcwRegulations" >
										<h4 class="list-group-item-heading" >Regras STCW</h4>

										<p id="profileFiltersStcwRegulationsLoadingMessage">
											<i class="fa fa-spinner fa-spin"></i> Carregando regras STCW
										</p>
										<p id="profileFiltersStcwRegulationsNoResultsMessage">
											<small class="text-muted">
											<i class="fa fa-exclamation-triangle"></i> Nenhuma regra STCW para filtrar
											</small>
										</p>

									</div>
									<div class="list-group-item filtersItems" id="profileFiltersStates" >
										<h4 class="list-group-item-heading" >Estados</h4>

										<p id="profileFiltersStatesLoadingMessage">
											<i class="fa fa-spinner fa-spin"></i> Carregando Estados
										</p>
										<p id="profileFiltersStatesNoResultsMessage">
											<small class="text-muted">
											<i class="fa fa-exclamation-triangle"></i> Nenhum Estado para filtrar
											</small>
										</p>

									</div>
								</div>
							</div>
							<div class="col-lg-8">						
								<div class="list-group" id="notSelectedApplicants">
									<div class="list-group-item">
										<h3 class="list-group-item-heading" >Demais candidatos</h3>
										<p><span class="visibleProfilesCounter" id="notSelectedApplicantsCounter">0</span> candidatos</p>
									</div>

									<div class="list-group-item" id="notSelectedApplicantsLoadingMessage">
										<i class="fa fa-spinner fa-spin"></i> Carregando candidatos
									</div>
									
									<div class="list-group-item" id="notSelectedApplicantsNoResultsMessage">
										<i class="fa fa-exclamation-triangle"></i> Nenhum candidato para esta vaga
									</div>

									<div class="list-group-item text-muted emptyFilterResultMessage hidden" id="notSelectedApplicantsNoFilterResultsMessage">
										<i class="fa fa-exclamation-triangle"></i> <i>Nenhum candidato com estes crit&eacute;rios</i>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="removedCandidates">
				<h2 class="">Candidatos eliminados</h2>
				<p><span id="removedCandidatesCounter">0</span> candidatos</p>

				<div class="row">
					<div class="col-lg-12">
						<div class="list-group m-b-10" id="removedApplicants">
							<div class="list-group-item" id="removedApplicantsLoadingMessage">
								<i class="fa fa-spinner fa-spin"></i> Carregando candidatos eliminados
							</div>
							<div class="list-group-item" id="removedApplicantsNoResultsMessage">
								<i class="fa fa-exclamation-triangle"></i> Nenhum candidato eliminado
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="job">

				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="list-group m-b-10">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Recrutamento</h4>

								<div class="form-group">
								Candidatura: 
									<a href="#" data-type="select" data-pk="{{$job->id}}" 
									data-url="/api/jobs/update" data-name="applicationType" 
									data-title="Recrutamento" class="editables" data-source="/api/data/applicationTypes" data-value='{applicationType}' >{applicationTypeLabel}</a>
								</div>

								<div class="form-group">
									Enviar para: <a href="#" data-type="text" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="applyTo" data-title="Envio de currículo" class="editables" >{applyTo}</a>
								</div>
							</div>

							<div class="list-group-item">
								<h4 class="list-group-item-heading">Requisito de ingl&ecirc;s</h4>

								<a href="#" data-type="select" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="jobEnglish" data-title="Selecione o nível de inglês" class="editables" data-source="/api/data/englishLevels" data-value='{jobLanguage}' >{{$job->language->label}}</a>
							</div>

							<div class="list-group-item">
								<h4>Categorias CIR</h4>

								<ul class="list-inline">
									{jobBookCategories}
									<li><u>{{$seaman_book_type->code}}</u></li>
									{/jobBookCategories}
								</ul>
							</div>
							<div class="list-group-item">
								<h4>STCW</h4>

								<ul class="list-inline">
									@foreach($job->stcw_regulations as $job_stcw_regulation)
									<li><u>{{$stcw_regulation->regulation}}</u></li>
									{/jobStcwRegulations}
								</ul>
							</div>
							<div class="list-group-item">
								<h4>Cursos &amp; Certificados</h4>

								<ul class="list-inline">
									@foreach($job->trainings as $training)
									<li>
										<button class="btn btn-default btn-sm">{{$training->label}}</button>
									</li>
									@endforeach
								</ul>
							</div>
							<div class="list-group-item">
								<h4>Experi&ecirc;ncia necess&aacute;ria</h4>

								<a href="#" data-type="text" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="jobExperience" data-title="Informe a experiência" class="editables" >{jobExperience}</a>

							</div>
							<div class="list-group-item">
								<h4>Outros</h4>

								<ul>
								{jobRequirements}
									<li>
										<a href="#" data-type="text" data-pk="{{$requirement->id}}" data-url="/api/jobs/updateRequirement" data-title="Requisito" class="editables" >{{$requirement->value}}</a>
									</li>
								{/jobRequirements}
								</ul>
							</div>
						</div>

						<div class="list-group">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Benef&iacute;cios</h4>
								
								<ul>
								@foreach($job->benefits as $benefit)
									<li>
										<a href="#" data-type="text" data-pk="{{$benefit->id}}" data-url="/api/jobs/updateBenefit" data-title="Benefício" class="editables" >{{$benefit->value}}</a>
									</li>
								{/jobBenefits}
								</ul>
							</div>
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Sal&aacute;rio</h4>
								{salary}

							</div>
						</div>
					</div>

					<div class="col-lg-6 col-md-6">
						<div class="list-group m-b-10">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Link para a vaga</h4>
								<a href="https://vagasembarcado.upships.com/job/{jobSlug}" target="_blank">
									https://vagasembarcado.upships.com/job/{jobSlug}
								</a>
							</div>
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Informa&ccedil;&otilde;es</h4>

								<a href="#" data-type="text" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="jobDescription" data-title="Descrição da vaga" class="editables" >{{$job->description}}</a>

								<h4>Escala</h4>

								<a href="#" data-type="text" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="jobSchedule" data-title="Escala" class="editables" >{{$job->rotation}}</a>

								<h4>Informa&ccedil;&otilde;es extras</h4>
								
								<a href="#" data-type="text" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="jobExtra" data-title="Informações complementares" class="editables" >{{$job->extra}}</a>

							</div>
							<div class="list-group-item">
								<h4>N&uacute;mero de vagas</h4>
								
								<a href="#" data-type="text" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="jobVacancies" data-title="Número de vagas" class="editables" >{{$job->vacancies}}}</a>

							</div>
							<div class="list-group-item">
								<h4>Embarca&ccedil;&atilde;o</h4>

								<a href="#" data-type="select" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="shipTypeLabel" data-title="Selecione a embarcação" class="editables" data-source="/api/ships/editor" data-value='{shipTypeId}' >{shipTypeLabel}</a>

							</div>
							<div class="list-group-item">
								<h4>Marcadores</h4>

								<ul class="list-inline">
									{jobFlags}
									<li>
										<button class="btn btn-default btn-sm">{flagLabel}</button>
									</li>
									{/jobFlags}
								</ul>
							</div>
							<div class="list-group-item">
								<h4>Local</h4>
								
								<a href="#" data-type="text" data-pk="{{$job->id}}" data-url="/api/jobs/update" data-name="{{$job->location}}" data-title="Informe o local" class="editables" >{{$job->location}}</a>
							</div>
						</div>

						<div class="list-group">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Mais</h4>
							</div>
							<div class="list-group-item">
								<h4 >Vaga adicionada por</h4>
								[{userId}] {userName} ({userEmail})
							</div>
						</div>
					</div>
				</div>

				<hr/>

				<ul class="list-inline">
					<li>
						<a href="/jobs/disable/{{$job->id}}" class="btn btn-warning" ><i class='fa fa-eye-slash' ></i> Desativar</a>
					</li>
					
					<li class="float-right">
						<a href="#delete" onclick="deleteJob({{$job->id}},true)" class="btn btn-danger" ><i class='fa fa-times' ></i> Excluir</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<script id="selectedApplicantsTemplate" type="text/x-jsrender" >

  	<div class='list-group-item resultsItem clearfix' id='profile-{{:profileId}}'>

	    <div class="float-right">
	      <ul class="list-inline">
	        <li class="profileLoadingIcons" id="profileLoadingIcon-{{:profileId}}">
	          <i class="fa fa-spinner fa-spin"></i>
	        </li>
	      </ul>
	    </div>

	    <h3 class="list-group-item-heading">
	      <a href="#loadProfile-{{:profileId}}" onclick="loadProfile({{:profileId}})" id="profileName-{{:profileId}}">
	      	{{:userName}}
	      </a>

	      {{if profileMatchPercent}}
	      <span class="text-success">{{:profileMatchPercent}}%</span>
	      {{/if}}
	    </h3>
	    <ul class="list-inline m-b-10">
	      <li id="profilePositionLabel-{{:profileId}}" >
	        <a href="#loadProfile-{{:profileId}}" onclick="loadProfile({{:profileId}})" id="profilePositionLabelLink-{{:profileId}}">{{:profilePositionLabel}}</a>
	      </li>
	      <li class="" >Ingl&ecirc;s {{:profileEnglishLevelLabel}}</li>
	      <li class="">{{:profileAddress}}</li>
	    </ul>

	    {{if cocRegulations}}
	    	<ul class="list-inline m-b-10">
	    		<li>Regras STCW:</li>
	    		{{for cocRegulations tmpl='#cocRegulationsTemplate'/}}
	    	</ul>
	    {{/if}}
	    
	    {{if applicationSalary}}
	    <p>
	    	<b>Pretens&atilde;o salarial:</b> {{:applicationSalary}}
	    </p>
	    {{/if}}
	    
	    {{if matchingCertificates}}
	    <ul class="list-inline m-b-10">
	      {{for matchingCertificates tmpl='#matchingCertificatesTemplate'/}}
	    </ul>
	    {{/if}}

	    <ul class="list-inline m-b-10">

			<li class="text-success">
				<div class='btn btn-default btn-sm' >Pr&eacute;-selecionado</div>
			</li>
	      
	      	<li><a href="/recruiting/sendMessage/{{:profileId}}" class="btn btn-default btn-sm" title="Enviar e-mail (nova janela)" target="_blank" ><i class="fa fa-envelope-o"></i></a></li>

	      	<li class="float-right">
				<a href="/jobs/changeApplicantStatus/{{:jobId}}/{{:applicationId}}/100" class="btn btn-warning btn-sm"><i class="fa fa-user-times"></i> Deselecionar</a>
			</li>

			<li class="float-right">
				<a href="#" onclick="removeApplicant({{:applicationId}})" class="btn btn-danger btn-sm" >
					<i class="fa fa-times"></i> Eliminar
				</a>
			</li>

	      	<li class="float-right">
	      		<a href="/profiles/view/{{:profileId}}" target="_blank" class="btn btn-default btn-sm" title="Ver perfil (nova janela)" >
	      		Perfil completo
	      		</a>
	      	</li>

	    </ul>

	    <div id="extendedProfile-{{:profileId}}"></div>
  	</div>
</script>

<!-- 
<div class="list-group-item">
    <h3 class="list-group-item-heading">
		<a href="#loadProfile-{{:profileId}}" onclick="loadProfile({{:profileId}})" >
			{applicantName}
		</a>
    </h3>
	<ul class="list-inline">
		<li>{applicantPositionLabel}</li>
		<li>
			<a href="/profiles/view/{{:profileId}}" target="_blank" >Ver perfil completo</a>
		</li>
	</ul>

	<ul class="list-inline clearfix m-t-10 m-b-10">
		
	</ul>

	<div id="extendedProfile-{{:profileId}}"></div>
</div> 
-->

<script id="removedApplicantsTemplate" type="text/x-jsrender" >

	<div class='list-group-item resultsItem clearfix' id='profile-{{:profileId}}'>
	    <div class="float-right">
	      <ul class="list-inline">
	        <li class="profileLoadingIcons" id="profileLoadingIcon-{{:profileId}}">
	          <i class="fa fa-spinner fa-spin"></i>
	        </li>
	      </ul>
	    </div>

	    <h3 class="list-group-item-heading">
	      <a href="#loadProfile-{{:profileId}}" class="text-danger" onclick="loadProfile({{:profileId}})" id="profileName-{{:profileId}}">
	      	{{:userName}}
	      </a>

	      {{if profileMatchPercent}}
	      <span class="text-success">{{:profileMatchPercent}}%</span>
	      {{/if}}
	    </h3>
	    <ul class="list-inline m-b-10">
	      <li id="profilePositionLabel-{{:profileId}}" >
	        <a href="#loadProfile-{{:profileId}}" onclick="loadProfile({{:profileId}})" id="profilePositionLabelLink-{{:profileId}}">{{:profilePositionLabel}}</a>
	      </li>
	      <li class="" >Ingl&ecirc;s {{:profileEnglishLevelLabel}}</li>
	      <li class="">{{:profileAddress}}</li>
	    </ul>

	    {{if cocRegulations}}
	    	<ul class="list-inline m-b-10">
	    		<li>Regras STCW:</li>
	    		{{for cocRegulations tmpl='#cocRegulationsTemplate'/}}
	    	</ul>
	    {{/if}}

	    {{if applicationRemarks}}
	    <p>{{:applicationRemarks}}</p>
	    {{/if}}

	    {{if applicationSalary}}
	    <p>
	    	<b>Pretens&atilde;o salarial:</b> {{:applicationSalary}}
	    </p>
	    {{/if}}

	    {{if matchingCertificates}}
	    <ul class="list-inline m-b-10">
	      {{for matchingCertificates tmpl='#matchingCertificatesTemplate'/}}
	    </ul>
	    {{/if}}

	    <ul class="list-inline m-b-10">
			
	    	<li>
				<a href="/jobs/changeApplicantStatus/{{:jobId}}/{{:applicationId}}/100" class="btn btn-primary btn-sm" >
					<i class="fa fa-undo"></i> Recuperar
				</a>
			</li>
	      
	      	<li><a href="/recruiting/sendMessage/{{:profileId}}" class="btn btn-default btn-sm" title="Enviar e-mail (nova janela)" target="_blank" ><i class="fa fa-envelope-o"></i></a></li>

	      	<li class="float-right">
	      		<a href="/profiles/view/{{:profileId}}" target="_blank" class="btn btn-default btn-sm" title="Ver perfil (nova janela)" >
	      		Perfil completo
	      		</a>
	      	</li>

	    </ul>

	    <div id="extendedProfile-{{:profileId}}"></div>
  	</div>
</script>

<script id="cocRegulationsTemplate" type="text/x-jsrender" >
	<li data-stcw-regulation-id="{{:stcwRegulationId}}" class="stcwRegulations" >{{:stcwRegulation}}</li>
</script>

<script id="rawCocRegulationsTemplate" type="text/x-jsrender" >
	stcwRegulations-{{:stcwRegulationId}}
</script>


<script id="rawProfileExperienceSummaryTemplate" type="text/x-jsrender" >
	{{if shipTypeId}}
	ships-{{:shipTypeId}} 
	{{/if}}

	{{if positionLabel}}
	positions-{{:positionId}}
	{{/if}}
</script>

<script id="profileExperienceSummaryTemplate" type="text/x-jsrender" >
	{{if shipTypeId}}
	<li>
		<span data-ship-type-id='{{:shipTypeId}}' class="ships" >{{:shipTypeLabel}}</span>
	</li>
	{{/if}}
</script>

<script id="notSelectedApplicantsTemplate" type="text/x-jsrender" >

	<div class="list-group-item profiles resultsItem clearfix 
		
		profileStates-{{:profileState}}
		bookCategories-{{:bookCategoryCode}}

		{{if cocRegulations}}
	    	{{for cocRegulations tmpl='#rawCocRegulationsTemplate'/}}
	    {{/if}}

	    {{if profileWorks}}
	    	{{for profileWorks tmpl='#rawProfileExperienceSummaryTemplate'/}}
	    {{/if}}

	    profileEnglishLevel-{{:profileEnglishLevel}}

		"

		id='profile-{{:profileId}}'>

	    <div class="float-right">
	      <ul class="list-inline">
	        <li class="profileLoadingIcons" id="profileLoadingIcon-{{:profileId}}">
	          <i class="fa fa-spinner fa-spin"></i>
	        </li>
	      </ul>
	    </div>

	    <h3 class="list-group-item-heading">
	      <a href="#loadProfile-{{:profileId}}" onclick="loadProfile({{:profileId}})" id="profileName-{{:profileId}}">
	      	{{:userName}} 

	      	{{if bookCategoryCode}}
	      	(<span class="bookCategories">{{:bookCategoryCode}}</span>)
	      	{{/if}}
	      </a>

	      {{if profileMatchPercent}}
	      <span class="text-success">{{:profileMatchPercent}}%</span>
	      {{/if}}
	    </h3>
	    <ul class="list-inline m-b-10">
	      <li id="profilePositionLabel-{{:profileId}}" >
	        <a href="#loadProfile-{{:profileId}}" onclick="loadProfile({{:profileId}})" id="profilePositionLabelLink-{{:profileId}}">{{:profilePositionLabel}}</a> 
	      </li>
	      <li class="" >Ingl&ecirc;s {{:profileEnglishLevelLabel}}</li>
	      <li class="">
	      	{{if profileCity}}
	      	<span class="cities">{{:profileCity}}</span>
	      	{{/if}}

	      	{{if profileState}}
	      	 - <span class="states">{{:profileState}}</span>
	      	{{/if}}

	      </li>
	    </ul>

	    {{if profileWorks}}
	    	<ul class="list-inline m-b-10">
	    		<li>Embarca&ccedil;&otilde;es:</li>
	    		{{for profileWorks tmpl='#profileExperienceSummaryTemplate'/}}
	    	</ul>
	    {{/if}}

	    {{if cocRegulations}}
	    	<ul class="list-inline m-b-10">
	    		<li>Regras STCW:</li>
	    		{{for cocRegulations tmpl='#cocRegulationsTemplate'/}}
	    	</ul>
	    {{/if}}

	    {{if applicationSalary}}
		    <p>
		    	<b>Pretens&atilde;o salarial:</b> {{:applicationSalary}}
		    </p>
	    {{/if}}

	    {{if applicationRemarks}}
	    <p>{{:applicationRemarks}}</p>
	    {{/if}}

	    {{if matchingCertificates}}
	    <ul class="list-inline m-b-10">
	      {{for matchingCertificates tmpl='#matchingCertificatesTemplate'/}}
	    </ul>
	    {{/if}}

	    <ul class="list-inline m-b-10">
			
	    	<li>
				<a href="/jobs/changeApplicantStatus/{{:jobId}}/{{:applicationId}}/101" class="btn btn-primary btn-sm" >
					<i class="fa fa-thumbs-up"></i> Pr&eacute;-selecionar
				</a>
			</li>
			<li class="float-right">
				<a href="#" onclick="removeApplicant({{:applicationId}})" class="btn btn-danger btn-sm" >
					<i class="fa fa-times"></i> Eliminar
				</a>
			</li>
	      
	      	<li><a href="/recruiting/sendMessage/{{:profileId}}" class="btn btn-default btn-sm" title="Enviar e-mail (nova janela)" target="_blank" ><i class="fa fa-envelope-o"></i></a></li>

	      	<li class="float-right">
	      		<a href="/profiles/view/{{:profileId}}" target="_blank" class="btn btn-default btn-sm" title="Ver perfil (nova janela)" >
	      		Perfil completo
	      		</a>
	      	</li>

	    </ul>

	    <div id="extendedProfile-{{:profileId}}"></div>
  	</div>
</script>

<script>

var jobId = {{$job->id}};

function removeApplicant(applicationId)	{
	var response = prompt('Type the following to confirm: ' + applicationId);

	if(response == applicationId)	{
		window.location.href = '/jobs/changeApplicantStatus/' + jobId + '/' + applicationId + '/666';
	}
}

$(document).on('change', '.profileFilters', function() {

	var profileFilter = new ProfileFilter(this.value);

	if(this.checked)	{
		// Item has been selected, then adds it to the list of active filters
		profileFilter.activate();
	}
	else {
		// Item has been deselected, then removes it from the list of active filters
		profileFilter.deactivate();
	}

	// Run filter

	parseFilters();

	// var selectedFilters = $('.profileFilters:checked').map( function() {
		
	// 	return this.value;

	// }).get();

	// var notSelectedFilters = $('.profileFilters:not(:checked)').map( function() {
		
	// 	return this.value;

	// }).get();

	// parseSelectedFilters(selectedFilters, notSelectedFilters);
});

// $(document).on('change', '.profileFiltersBookCategoriesItems', function() {

// 	var selectedBookCategories = $('.profileFiltersBookCategoriesItems:checked').map( function() {
		
// 		return this.value;

// 	}).get();

// 	var notSelectedBookCategories = $('.profileFiltersBookCategoriesItems:not(:checked)').map( function() {
		
// 		return this.value;

// 	}).get();

// 	filterByBookCategories(selectedBookCategories, notSelectedBookCategories);
// });

$(document).ready(function()
	{

		var visibleProfilesTarget = '#notSelectedApplicantsCounter';

		$('.job-data-0').remove();

		// Selected applicants
		loadJobApplications(jobId, 101, '#selectedApplicants');

		// Not selected
		loadJobApplications(jobId, 100, '#notSelectedApplicants');

		// Removed
		loadJobApplications(jobId, 666, '#removedApplicants');

		// Hide filters items
		$('.filtersItems').hide();
	});
</script>