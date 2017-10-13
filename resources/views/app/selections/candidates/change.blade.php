<div class="row m-b-10">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="list-group">
			<div class="list-group-item">
				<h2>Modificar status de candidatos</h2>
				<ul class="list-inline">
					<li>
						Sele&ccedil;&atilde;o para <b>{selectionPositionLabel}</b>
					</li>
				</ul>
			</div>
			<div class="list-group-item">

				<ul class="list-inline clearfix">					
					<li class="pull-right">
						<a href="/selections/view/{selectionId}" class="btn btn-default" ><i class='fa fa-times' ></i> Cancelar</a>
					</li>
					<li class="clearfix"></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<form method="post" action="/selections/changeCandidatesAction" id="selectedApplicantsForm" >
<input type="hidden" name="selectionId" value="{selectionId}" >
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="list-group">
				<div class="list-group-item">
					<h3 class="list-group-item-heading">Candidatos</h3>
				</div>
				<div class="list-group-item">
					<div class="form-group">
						<label for="applicationStatus">
							Status do(s) candidato(s)
						</label> 
						<select name="applicationStatus" id="applicationStatus" class="form-control" >
							<option value="0">-- Selecione uma op&ccedil;&atilde;o --</option>
							<option value="1">Selecionados Fase Inicial</option>
							<option value="2">Selecionados Para Entrevistas</option>
							<option value="3">Selecionados Para Fase Final</option>
							<option value="4">Aceitos No Processo</option>
						</select>
					</div>
				</div>
				{applications}
				<div class="list-group-item">
					<h4>{applicantName} <br/><small>{applicantPositionLabel}</small></h4>
					<input type="hidden" name="applications[]" value="{applicationId}">
				</div>
				{/applications}

				<div class="list-group-item">
					<button type="submit" name="submitChangeCandidates" class="btn btn-success" >
						Salvar modifica&ccedil;&otilde;es
					</button>
				</div>
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">E-mail aos candidatos</span></h2>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<textarea name="applicationChangeMessage" id="applicationChangeMessage" placeholder="Escreva uma mensagem para informar que os candidatos foram selecionados para uma nova fase. NÃO coloque o nome, apenas a mensagem direta." class="form-control" ></textarea>
					</div>
					<p class="text-danger">
						<i class="fa fa-info-circle"></i> <b>N&Atilde;O</b> coloque o nome, escreva apenas a mensagem!
					</p>

					<br/>

					<div class="form-group">
						<label class="cr-styled">
		                    <input type="checkbox" name="sendApplicationChangeMessage" value="1" >
		                    <i class="fa"></i> 
		                    Enviar mensagem via e-mail aos candidatos
		                </label>
		            </div>

				</div>
			</div>

		</div>
	</div>

</form>

<script>


$(document).ready(function()
	{
		var applicationStatus = '{applicationStatus}';
		$('#applicationStatus option[value=' + applicationStatus + ']').attr('selected','selected');
	});
</script>