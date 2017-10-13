<form method="post" action="/jobs/concludeAction" >
	<input type="hidden" name="jobId" value="{jobId}">

	<div class="row m-b-10">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<div class="list-group">
				<div class="list-group-item">
					<h3 class="list-group-item-heading">Iniciando processo seletivo para {jobPositionLabel}</h3>
					<ul class="list-inline">
						<li>
							<i class='fa fa-clock-o' ></i> Postada em {jobDate}
						</li>
						<li>
							<i class="fa fa-users"></i> {applicationCount} candidatos
						</li>
					</ul>
				</div>
				<div class="list-group-item">

					<ul class="list-inline">
						<li>
							<button type="submit" class="btn btn-success btn-fill btn-lg" ><i class='fa fa-check' ></i> Iniciar processo seletivo</button>
						</li>
						<li>
							<label class="cr-styled text-success">
		                    	<input type="checkbox" name="keepJobOpen" value="1" >
		                    	<i class="fa"></i> Manter vaga ativa
		                	</label>
						</li>

						<li class="pull-right">
							<a href="/jobs/view/{jobId}" class="btn btn-default btn-lg btn-fill" ><i class='fa fa-undo' ></i> Voltar</a>
						</li>

						<li class="clearfix"></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title"><i class="fa fa-check text-success"></i> Candidatos selecionados</h2>
				</div>				
				<div class="panel-body">
					<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-info-circle"></i> Caso queira eliminar algum candidato, basta desmarca-lo na lista
                    </div>

					<div class="list-group">
						{selectedApplicants}
						<div class="list-group-item">
							<ul class="list-inline">
								<li>
									<label class="cr-styled text-success">
				                    	<input type="checkbox" name="selectedApplicants[]" value="{applicationId}" checked="checked">
				                    	<i class="fa"></i> 
				                	</label>
				                </li>
				                <li>
				                	<h3 class="list-group-item-heading">
				                		<a href="/profiles/view/{profileId}" target="_blank">
				                			{applicantName}
				                		</a>
				                	</h3>
				                </li>
				            </ul>
							<ul class="list-inline">
								<li>{applicantPositionLabel}</li>
								<li>Regras STCW</li>
								<li><i class="fa fa-check text-success"></i></li>
							</ul>
						</div>
						{/selectedApplicants}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">
						<i class="fa fa-times text-danger"></i> Candidatos eliminados ou n&atilde;o-selecionados
					</h2>
				</div>
				<div class="panel-body">
					<div class="list-group">
						{rejectedApplicants}
						<div class="list-group-item">
							<h5>
								<b><a href="/profiles/view/{profileId}" target="_blank">{applicantName}</a></b>
				            </h5>
							<ul class="list-inline">
								<li>{applicantPositionLabel}</li>
								<li>Regras STCW</li>
								<li><i class="fa fa-times text-danger"></i></li>
							</ul>
						</div>
						{/rejectedApplicants}
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="list-group-item">

				<ul class="list-inline">
					<li>
						<button type="submit" class="btn btn-success btn-fill btn-lg" ><i class='fa fa-check' ></i> Iniciar processo seletivo</button>
					</li>

					<li class="pull-right">
						<a href="/jobs/view/{jobId}" class="btn btn-default btn-lg btn-fill" ><i class='fa fa-undo' ></i> Voltar</a>
					</li>

					<li class="clearfix"></li>
				</ul>
			</div>
		</div>
	</div>
</form>

<script>
$(document).ready(function()
	{
		$('.job-data-0').remove();
	});
</script>