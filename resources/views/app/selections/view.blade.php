<div class="row m-b-10">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="list-group">
			<div class="list-group-item">
				<h2>{selectionPositionLabel}</h2>
				<ul class="list-inline">
					<li>
						<i class='fa fa-clock-o' ></i> Postada em {selectionDate}
					</li>
					<li>
						<i class='fa fa-users'></i> {selectionNumberOfApplicants} candidatos
					</li>
				</ul>
			</div>
			<div class="list-group-item">

				<ul class="list-inline clearfix">
					<li>
						<a href="/selections/findCandidates/{selectionId}" class="btn btn-primary">
							<i class="fa fa-user-plus"></i> Incluir candidatos
						</a>
					</li>
					
					<li>
						<a href="/selections/receivedDocuments/{selectionId}" class="btn btn-default" ><i class='fa fa-file-o' ></i> Documentos recebidos</a>
					</li>

					<li class="pull-right">
						<a href="/selections/finish/{selectionId}" class="btn btn-success btn-fill" ><i class='fa fa-check' ></i> Finalizar processo</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="col-lg-12"> 
    <ul class="nav nav-tabs"> 
        <li class="active"> 
            <a href="#selected" data-toggle="tab" aria-expanded="true"> 
                <i class="fa fa-user"></i> Selecionados
            </a> 
        </li>
        <li class=""> 
            <a href="#removed" data-toggle="tab" aria-expanded="false"> 
                <i class="fa fa-user-times"></i> Eliminados
            </a> 
        </li>
    </ul>
    <div class="tab-content"> 
        <div class="tab-pane active" id="selected"> 

			<div class="row m-b-10" id="actionsBar">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="panel panel-info panel-color">
						<div class="panel-heading">
							<h4 class="panel-title">Com candidatos marcados:</h4>
						</div>
						<div class="panel-body">
							<ul class="list-inline">
								<li><a href="#" onclick="selectedApplicantsAction('remove', 0)" class="btn btn-default"><i class="fa fa-times"></i> Desclassificar</a></li>

								<li class="dropdown">
									<button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-exchange"></i> Alterar status <span class="caret"></span>
									</button>

									<ul class="dropdown-menu">
										<li>
											<a href="#chg1" onclick="selectedApplicantsAction('change',1)" >
											<i class="fa fa-users"></i> Primeira fase</a>
										</li>
										<li>
											<a href="#chg2" onclick="selectedApplicantsAction('change', 2)" >
											<i class="fa fa-comments-o"></i> Em entrevista</a>
										</li>
										<li>
											<a href="#chg3" onclick="selectedApplicantsAction('change', 3)" ><i class="fa fa-thumbs-up"></i> Fase final</a>
										</li>
										<li>
											<a href="#chg3" onclick="selectedApplicantsAction('change', 4)" ><i class="fa fa-thumbs-up"></i> Aprovados</a>
										</li>
									</ul>
								</li>

								<li><a href="#" onclick="selectedApplicantsAction('message', 0)" class="btn btn-default"><i class="fa fa-envelope"></i> Enviar mensagem</a></li>
								<li><a href="#" onclick="selectedApplicantsAction('documents', 0)" class="btn btn-default"><i class="fa fa-file-o"></i> Solicitar documentos</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="list-group">
						<div class="list-group-item">
							<h3 class="list-group-item-heading">Candidatos iniciais</h3>
						</div>

						{applicants}
						<div class="list-group-item">
							<h4>
								<a href="/profiles/view/{profileId}" target="_blank">
								{applicantName} <br/><small>{applicantPositionLabel}</small>
								</a>
							</h4>

							<ul class="list-inline clearfix">
								<li>
									<label>
										<input type="checkbox" name="applicants[]" class="applicantsSelector" value="{applicationId}" > Selecionar
									</label>
								</li>
								<!--
								<li class="text-{applicantCompatibilityColor}">{applicantCompatibility}% compat.</li>
								-->

								<li class="pull-right">
							
					                <div class='dropdown' >
					                    <a href='#' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
					                        <i class='fa fa-cog fa-lg'></i> A&ccedil;&otilde;es <span class="caret"></span>
					                    </a>
					                    <ul class='dropdown-menu dropdown-menu-right' >
					                    	<li><a href="/selections/changeCandidates/2/{applicationId}" class="text-info"><i class="fa fa-comments-o"></i> Entrevistar</a></li>

						                    <li role="separator" class="divider"></li>
						                    <li><a href='/selections/messageCandidates/{applicationId}'><i class='fa fa-envelope-o'></i> Enviar mensagem</a></li>
						                    <li><a href='/selections/requestDocuments/{applicationId}'><i class='fa fa-file-o'></i> Solicitar documentos</a></li>
						                    <!--
						                    <li role="separator" class="divider"></li>
						                    <li><a href="#" onclick="toggleJobStatus('{jobId}')" ><i class='fa fa-eye-slash' ></i> Desativar</a></li> -->
						                    <li role="separator" class="divider"></li>
						                    <li class="text-danger"><a href="/selections/removeCandidates/{applicationId}"  ><i class='fa fa-times' ></i> Desclassificar</a></li>
					                    </ul> 
					                </div>
								</li>
							</ul>
						</div>
						{/applicants}
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="list-group">
						<div class="list-group-item">
							<h3 class="list-group-item-heading">Em entrevista</h3>
						</div>

						{applicantsInterview}
						<div class="list-group-item">
							<h4>
								<a href="/profiles/view/{profileId}" target="_blank">
								{applicantName} <br/><small>{applicantPositionLabel}</small>
								</a>
							</h4>

							<ul class="list-inline clearfix">
								<li>
									<label>
									<input type="checkbox" name="applicants[]" class="applicantsSelector" value="{applicationId}" > Selecionar
									</label>
								</li>
								<!--
								<li class="text-{applicantCompatibilityColor}">{applicantCompatibility}% compat.</li>
								-->

								<li class="pull-right">
							
					                <div class='dropdown' >
					                    <a href='#' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
					                        <i class='fa fa-cog fa-lg'></i> A&ccedil;&otilde;es <span class="caret"></span>
					                    </a>
					                    <ul class='dropdown-menu dropdown-menu-right' >
					                    	<li><a href='/selections/messageCandidates/{applicationId}'><i class='fa fa-thumbs-up'></i> Aprovar p/ fase final</a></li>

					                    	<li role="separator" class="divider"></li>

						                    <li><a href='/selections/messageCandidates/{applicationId}'><i class='fa fa-envelope-o'></i> Enviar mensagem</a></li>
						                    <li><a href='/selections/requestDocuments/{applicationId}'><i class='fa fa-file-o'></i> Solicitar documentos</a></li>

						                    <!--
						                    <li role="separator" class="divider"></li>
						                    <li><a href="#" onclick="toggleJobStatus('{jobId}')" ><i class='fa fa-eye-slash' ></i> Desativar</a></li> -->
						                    <li role="separator" class="divider"></li>
						                    <li class="text-danger"><a href="/selections/removeCandidates/{applicationId}"  ><i class='fa fa-times' ></i> Desclassificar</a></li>
					                    </ul> 
					                </div>
								</li>
							</ul>
						</div>
						{/applicantsInterview}
					</div>	
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="list-group">
						<div class="list-group-item">
							<h3 class="list-group-item-heading">Em fase final</h3>
						</div>

						{applicantsSelected}
						<div class="list-group-item">
							<h4>
								<a href="/profiles/view/{profileId}" target="_blank">
								{applicantName} <br/><small>{applicantPositionLabel}</small>
								</a>
							</h4>

							<ul class="list-inline">
								<li>
									<input type="checkbox" name="applicants[]" class="applicantsSelector" value="{applicationId}" >
								</li>
								<!--<li class="text-{applicantCompatibilityColor}">{applicantCompatibility}% compat.</li>-->
								<li><a href="/selections/changeCandidates/4/{applicationId}" class="btn btn-success btn-sm"><i class="fa fa-check-square-o"></i> Aprovar</a></li>					
								
								<li class="pull-right clearfix">
							
					                <div class='dropdown' >
					                    <a href='#' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
					                        <i class='fa fa-cog fa-lg'></i> <span class="caret"></span>
					                    </a>
					                    <ul class='dropdown-menu dropdown-menu-right' >
						                    <li><a href='/selections/messageCandidates/{applicationId}'><i class='fa fa-envelope-o'></i> Enviar mensagem</a></li>
						                    <li role="separator" class="divider"></li>
						                    <li><a href='/selections/requestDocuments/{applicationId}'><i class='fa fa-file-o'></i> Solicitar documentos</a></li>

						                    <!--
						                    <li role="separator" class="divider"></li>
						                    <li><a href="#" onclick="toggleJobStatus('{jobId}')" ><i class='fa fa-eye-slash' ></i> Desativar</a></li> -->
						                    <li role="separator" class="divider"></li>
						                    <li><a href="/selections/removeCandidates/{applicationId}" class="text-danger" ><i class='fa fa-times' ></i> Eliminar</a></li>
					                    </ul> 
					                </div>
								</li>
								<li class="clearfix"></li>
							</ul>
						</div>
						{/applicantsSelected}
					</div>
				</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="list-group">
						<div class="list-group-item">
							<h3 class="list-group-item-heading text-success">Candidatos aprovados</h3>
						</div>
						<div class="list-group-item">
							<div class='dropdown' >
			                    <a href='#' class='btn btn-block btn-default dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
			                        Aos finalistas <span class="caret"></span>
			                    </a>
			                    <ul class='dropdown-menu dropdown-menu-right' >
				                    <li>
				                    	<a href='/selections/messageFinalCandidates/{applicationId}'>
				                    		<i class='fa fa-envelope-o'></i> Enviar mensagem
				                    	</a>
				                    </li>
				                    <li role="separator" class="divider"></li>
				                    <li>
				                    	<a href='/selections/requestFinalDocuments/{applicationId}'>
				                    		<i class='fa fa-file-o'></i> Solicitar documentos
				                    	</a>
				                    </li>
			                    </ul> 
			                </div>
				        </div>

						{applicantsApproved}
						<div class="list-group-item">
							<h4>{applicantName} <br/><small>{applicantPositionLabel}</small></h4>

							<ul class="list-inline">
								<!--<li class="text-{applicantCompatibilityColor}">{applicantCompatibility}% compat.</li>-->
								<li>
							
					                <div class='dropdown' >
					                    <a href='#' class='btn btn-default btn-sm dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
					                        <i class='fa fa-cog fa-lg'></i> A&ccedil;&otilde;es <span class="caret"></span>
					                    </a>
					                    <ul class='dropdown-menu dropdown-menu-right' >
						                    <li>
						                    	<a href='/selections/messageCandidates/{applicationId}'>
						                    		<i class='fa fa-envelope-o'></i> Enviar mensagem
						                    	</a>
						                    </li>
						                    <li role="separator" class="divider"></li>
						                    <li>
						                    	<a href='/selections/requestDocuments/{applicationId}'>
						                    		<i class='fa fa-file-o'></i> Solicitar documentos
						                    	</a>
						                    </li>
					                    </ul> 
					                </div>
								</li>
							</ul>
						</div>
						{/applicantsApproved}
					</div>	
				</div>
			</div>            




        </div> 
        <div class="tab-pane" id="removed"> 
             <div class="list-group">
				<div class="list-group-item">
					<h3 class="list-group-item-heading">Candidatos eliminados</h3>
				</div>

				{removedApplicants}
				<div class="list-group-item">
					<h4>
						<a href="/profiles/view/{profileId}" target="_blank">
						{applicantName} <br/><small>{applicantPositionLabel}</small>
						</a>
					</h4>

					<ul class="list-inline">
						<li>
							<a href="/selections/changeCandidates/1/{applicationId}" >
								<i class="fa fa-undo"></i> Recolocar candidato
							</a>
						</li>
					</ul>
				</div>
				{/removedApplicants}
			</div>
        </div> 
    </div> 
</div>

<hr/>

<p class="text-center">
	<small>
		<a href="#delete" onclick="deleteJob({selectionId},true)" class="text-danger" >
			<i class='fa fa-times' ></i> Excluir processo seletivo
		</a>
		<br/>
		(requer confirma&ccedil;&atilde;o posterior)
	</small>
</p>


<form method="post" action="" id="selectedApplicantsForm" >
	<input type="hidden" name="selectionId"  value="{selectionId}" >
	<div id="selectedApplicantsList">
	</div>
</form>


<!-- Document preview modal -->



<script>

function selectedApplicantsAction(actionType, applicationStatus)
{
	var formAction = '';

	switch(actionType)
	{
		case 'remove':
			formUrl = 'removeCandidates';
		break;

		case 'change':
			formUrl = 'changeCandidates/' + applicationStatus;
		break;

		case 'message':
			formUrl = 'messageCandidates';
		break;

		case 'documents':
			formUrl = 'requestDocuments';
		break;
	}

	$('#selectedApplicantsForm').attr('action', '/selections/' + formUrl).submit();
}

$(document).ready(function()
	{
		$('#actionsBar').hide();

		$('.selection-data-0').remove();

		$('.applicantsSelector').change(function()
			{
				var applicationId = $( this ).val();
				
				if(this.checked === true)
				{
					var item = '<input type="hidden" name="selectedApplicant[]" id="selectedApplicant-' + applicationId + '" class="selectedApplicantsListItem" value="' + applicationId + '" >';
					$('#selectedApplicantsList').append(item);
				}
				else
				{
					$('#selectedApplicant-' + applicationId).remove();
				}

				var totalCandidates = $('input[name="applicants[]"]:checked').length;
				$('#numberOfSelectedCandidates').text(totalCandidates);

				if(totalCandidates > 0)
				{
					$('#actionsBar').show();
				}
				else
				{
					$('#actionsBar').hide();
				}
			});
	});
</script>