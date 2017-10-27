<form method="post" action="/job/concludeMessagesAction" >
	<input type="hidden" name="jobId" value="{{$job->id}}">
	<input type="hidden" name="companyName" value="{companyName}">
	<input type="hidden" name="companyEmail" value="{companyEmail}">
	<input type="hidden" name="jobPositionLabel" value="{$job->position->label}">
	<input type="hidden" name="selectionId" value="{{$selection->id}}">

	<div class="row m-b-10">
		<div class="col col-sm-12 col-xs-12">

			<div class="list-group">
				<div class="list-group-item">
					<h3 class="list-group-item-heading">Mensagem aos candidatos a {$job->position->label}</h3>
				</div>
				<div class="list-group-item">

					<ul class="list-inline">
						<li>
							<button type="submit" class="btn btn-success btn-fill btn-lg" >
								<i class='fa fa-send' ></i> Enviar mensagens e prosseguir</button>
						</li>

						<li class="float-right">
							<a href="/selection/view/{{$selection->id}}" class="btn btn-default btn-lg btn-fill" >
								N&atilde;o enviar <i class='fa fa-angle-right' ></i><i class='fa fa-angle-right' ></i>
							</a>
						</li>

						<li class="clearfix"></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col col-sm-12 col-xs-12">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Mensagem a ser enviada aos <span class="text-success" >selecionados</span></h2>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 m-b-10">
							<div class="form-group">
								<textarea name="applicationSuccessMessage" id="applicationSuccessMessage" placeholder="Escreva uma mensagem para informar que os candidatos foram selecionados para a fase seguinte. NÃO coloque o nome, apenas a mensagem direta." class="form-control" ></textarea>
							</div>
							
							<p>
								{NOME} - Nome do candidato, 
								{VAGA} - Vaga a que est&aacute; se candidatando
							</p>
							
							<br/>

							<div class="form-group">
								<label class="cr-styled">
					                <input type="checkbox" name="sendApplicationSuccessMessage" value="1" >
					                <i class="fa"></i> 
					                Confirmar envio de mensagem aos selecionados
					            </label>
					        </div>
					    </div>
					    <div class="col-lg-6 col-md-6 col-sm-12 m-b-10">
							<div class="list-group">
								<div class="list-group-item">
									<h4 class="list-group-item-heading">Receber&atilde;o a mensagem</h4>
								</div>
								
								{selectedApplicants}
								<div class="list-group-item">
									<input type="hidden" name="selectedApplicants[{userId}][applicantName]" value="{{$application->profile->name}}">
									<input type="hidden" name="selectedApplicants[{userId}][applicantEmail]" value="{applicantEmail}">

									<label>
										<input type="checkbox" name="selectedApplicants[{userId}][userId]" value="{userId}" checked> 
										 	{{$application->profile->name}} / {{$application->id}}
									</label>
									
									<ul class="list-inline">
										<li>
											<a href="/profile/{{$profile->id}}" target="_blank" title="Ver perfil">
												Ver Perfil
											</a>
										</li>
										<li>{{$application->profile->position->label}}</li>
									</ul>
								</div>
								{/selectedApplicants}
							</div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col col-sm-12 col-xs-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Mensagem a ser enviada aos <span class="text-danger" >eliminados</span></h2>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
								<textarea name="applicationFailedMessage" id="applicationFailedMessage" placeholder="Escreva uma mensagem para informar que os candidatos foram selecionados para a fase seguinte. NÃO coloque o nome, apenas a mensagem direta." class="form-control" ></textarea>
							</div>
							<p>
								{NOME} - Nome do candidato, 
								{VAGA} - Vaga a que est&aacute; se candidatando
							</p>

							<br/>

							<div class="form-group">
								<label class="cr-styled">
					                <input type="checkbox" name="sendApplicationFailedMessage" value="1" >
					                <i class="fa"></i> 
					                Confirmar enviao de mensagem aos selecionados
					            </label>
					        </div>
					    </div>
					    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
					    	<div class="list-group">
								<div class="list-group-item">
									<h4 class="list-group-item-heading">Receber&atilde;o esta mensagem</h4>
								
								</div>

								{rejectedApplicants}
								<div class="list-group-item">
									<input type="hidden" name="selectedApplicants[{userId}][applicantName]" value="{{$application->profile->name}}">
									<input type="hidden" name="selectedApplicants[{userId}][applicantEmail]" value="{applicantEmail}">
	
									<label>
										<input type="checkbox" name="rejectedApplicants[]" value="{userId}" checked> 
										 	{{$application->profile->name}} / {{$application->id}}
									</label>
							
									<ul class="list-inline">
										<li>
											<a href="/profile/{{$profile->id}}" target="_blank">
												Ver perfil
											</a>
										</li>
										<li>{{$application->profile->position->label}}</li>
									</ul>
								</div>
								{/rejectedApplicants}
									
								</div>
							</div>
					    </div>
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
						<button type="submit" class="btn btn-success btn-fill btn-lg" >
							<i class='fa fa-send' ></i> Enviar mensagens e prosseguir
						</button>
					</li>

					<li class="float-right">
							<a href="/applications/view/{{$application->id}}" class="btn btn-default btn-lg btn-fill" >
								N&atilde;o enviar <i class='fa fa-angle-right' ></i><i class='fa fa-angle-right' ></i>
							</a>
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
		
	});
</script>