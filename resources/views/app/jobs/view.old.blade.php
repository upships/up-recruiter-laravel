    <script type="text/x-template" id="application-list-item-template2"> 

      <div class="card card-default" >
        <div class="card-block">
          <h3>
            @{{application.profile.name}} 
            <i class="fa fa-spinner fa-spin" v-show="isLoading" ></i>
          </h3>

          <h5>
            @{{application.profile.position.label}} &middot;

            @{{application.profile.city}} <span v-html="application.profile.country.icon"></span>
          </h5>

          <p v-show="application.remarks" >
            @{{application.remarks}}
          </p>

          <p v-show="application.salary" >
            Pretens&atilde;o salarial: @{{application.salary}}
          </p>

          <div class="row">
            <div class="col" v-if="application.profile.stcw_regulations" >
              <h6>Regras STCW</h6>
              <ul class="list-inline" >
                <li class="list-inline-item" v-for="stcw_regulation in application.profile.stcw_regulations" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{stcw_regulation.stcw_regulation.regulation}}</button>
                </li>
              </ul>
            </div>
            <div class="col" v-if="application.profile.seaman_book_types" >
              <h6>Categorias CIR</h6>
              <ul class="list-inline">
                <li class="list-inline-item" v-for="seaman_book_type in application.profile.seaman_book_types" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{seaman_book_type.seaman_book_type.label}}</button>
                </li>
              </ul>
            </div>
            <div class="col" v-if="application.profile.certificates" >
              <h6>Certificados</h6>
              <ul class="list-inline" >
                <li class="list-inline-item" v-for="certificate in application.profile.certificates" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{certificate.certificate_type.label}}</button>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col" v-if="application.profile.ships" >
              <h6>Embarcações</h6>
              <ul class="list-inline" >
                <li class="list-inline-item" v-for="ship in application.profile.ships" >
                  <button type="button" class="btn btn-tag btn-tag-rounded btn-xs" >@{{ship.ship_type.label}}</button>
                </li>
              </ul>
            </div>
          </div>

        </div>
        <div class="card-block">
          <ul class="list-inline">

            <li class="list-inline-item" v-if="application.status == 666" >
              <a class="btn btn-primary btn-sm" href="javascript:;" @click="changeStatus(application.id, 0)"  >
                <i class="fa fa-thumbs-up"></i> Reativar
              </a>
            </li>
            <li class="list-inline-item" v-else>
              <a href="javascript:;" class="btn btn-danger btn-sm" @click="changeStatus(application.id, 666)" >
                <i class="fa fa-times"></i> Eliminar
              </a>
            </li>
            <li class="list-inline-item" >
              <a :href="'/conversation/add' + application.profile.id" class="btn btn-default btn-sm" title="Enviar e-mail (nova janela)" target="_blank" ><i class="fa fa-envelope-o"></i></a>
            </li>

            <li class="list-inline-item float-right">
              <a :href="'/profile/' + application.profile.id" target="_blank" class="btn btn-default btn-sm" title="Ver perfil (nova janela)" >
                Perfil completo
              </a>
            </li>

          </ul>
        </div>
      </div>
    </script>
    
@extends('layouts.master')
@section('page-title','Vaga $job->position->label')

@section('content')

<h2>Vaga {{$job->position->label}}</h2>

<ul class="list-inline">
	<li>
		<i class='fa fa-clock-o' ></i> Postada em {{$job->date}}
	</li>
	<li>
		Por {{$job->recruiter->user->name}}
	</li>

	<li class="float-right">
		Visibilidade: {{$job->privacy_label}}
	</li>
</ul>

<div class="row">
	<div class="col">

		<div class="card card-default">
			<div class="card-block">
			
				<ul class="list-inline">
					<li>
						<a href="/job/{{$job->id}}/conclude" class="btn btn-success btn-fill" ><i class='fa fa-check' ></i> Iniciar processo seletivo</a>
					</li>

					<li class="hidden-sm hidden-xs">
						<a href="/job/{{$job->id}}/share/" class="btn btn-primary" ><i class='fa fa-share' ></i> Compartilhar</a>
					</li>

					<li>
						<a href="#cl" data-clipboard-text="https://vagasembarcado.upships.com/job/{{$job->slug}}" class="btn btn-default copy" title="Copiar link" >
						<i class="fa fa-clipboard"></i>
						</a>
					</li>

					<li class="float-right">
						<a href="/job/{{$job->id}}/edit" class="btn btn-default btn-fill" ><i class='fa fa-pencil-square-o' ></i> Editar</a>
					</li>
					
					<li class="clearfix"></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">

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
								<h4 class="list-group-item-heading">Requisito de ingl&ecirc;s</h4>
								{{$job->language_label}}</a>
							</div>

							<div class="list-group-item">
								<h4>Categorias CIR</h4>

								@if($job->book_cate)

									<ul class="list-inline">
										@foreach($job->seaman_book_types as $job_seaman_book_type) 
											<li>
												<u>{{$job_seaman_book_type->type->code}}</u>
											</li>
										@endforeach
									</ul>
								@endif
							</div>
							<div class="list-group-item">
								<h4>STCW</h4>

								@if($job->stcw_regulation)
								<ul class="list-inline">
									@foreach($job->stcw_regulations as $job_stcw_regulation)
										<li><u>{{$stcw_regulation->regulation}}</u></li>
									@endforeach
								</ul>
								@endif
							</div>
							<div class="list-group-item">
								<h4>Cursos &amp; Certificados</h4>

								@if($job->trainings)
								<ul class="list-inline">
									@foreach($job->trainings as $training)
									<li>
										<button class="btn btn-default btn-sm">{{$training->label}}</button>
									</li>
									@endforeach
								</ul>
								@endif
							</div>
							<div class="list-group-item">
								<h4>Experi&ecirc;ncia necess&aacute;ria</h4>

								@if($job->experiences)
									<ul>
									@foreach($job->experiences as $experience)
										<li>{{$experience->value}}</li>
									@endforeach
									</ul>
								@endif
							</div>
							<div class="list-group-item">
								<h4>Outros</h4>

								@if($job->requirements)
									<ul>
									@foreach($job->requirements as $requirement)
										<li>
											{{$requirement->value}}</a>
										</li>
									@endforeach
									</ul>
								@endif
							</div>
						</div>

						<div class="list-group">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Benef&iacute;cios</h4>
								
								@if($job->benefits)
									<ul>
									@foreach($job->benefits as $benefit)
										<li>
											{{$benefit->value}}
										</li>
									@endforeach
									</ul>
								@endif
							</div>
							<!-- <div class="list-group-item">
								<h4 class="list-group-item-heading">Sal&aacute;rio</h4>
								{salary}

							</div> -->
						</div>
					</div>

					<div class="col-lg-6 col-md-6">
						<div class="list-group m-b-10">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Link para a vaga</h4>
								<a href="https://vagasembarcado.upships.com/job/{{$job->slug}}" target="_blank">
									https://vagasembarcado.upships.com/job/{{$job->slug}}
								</a>
							</div>
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Informa&ccedil;&otilde;es</h4>

								{{$job->description}}

								<h4>Escala</h4>

								{{$job->rotation}}</a>

								<h4>Informa&ccedil;&otilde;es extras</h4>
								
								{{$job->extra}}</a>

							</div>
							<div class="list-group-item">
								<h4>N&uacute;mero de vagas</h4>
								
								{{$job->vacancies}}}</a>

							</div>
							<div class="list-group-item">
								<h4>Embarca&ccedil;&atilde;o</h4>

								{{$job->ship_type->label}}

							</div>
							
							<div class="list-group-item">
								<h4>Local</h4>
								
								{{$job->location}}</a>
							</div>
						</div>

						<div class="list-group">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Mais</h4>
							</div>
							<div class="list-group-item">
								<h4 >Vaga adicionada por</h4>
								[{{$job->recruiter->user->id}}] {{$job->recruiter->user->name}} ({{$job->recruiter->user->email}})
							</div>
						</div>
					</div>
				</div>

				<hr/>

				<ul class="list-inline">
					<li>
						<a href="/job/disable/{{$job->id}}" class="btn btn-warning" ><i class='fa fa-eye-slash' ></i> Desativar</a>
					</li>
					
					<li class="float-right">
						<a href="#delete" onclick="deleteJob({{$job->id}},true)" class="btn btn-danger" ><i class='fa fa-times' ></i> Excluir</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

@endsection

@section('local-footer')
<script>

$(document).ready(function()
	{

		
	});
</script>

@endsection