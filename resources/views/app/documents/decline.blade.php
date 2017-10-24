<div class="page-title">
	<h3>Recusar documento</h3>
</div>

<div class="row m-b-10">
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<form method="post" action="/selection/declineDocumentAction" id="selectedApplicantsForm" >
			<input type="hidden" name="randomKey" value="{randomKey}" >

			<input type="hidden" name="receivedDocumentId" value="{receivedDocumentId}" >
			<input type="hidden" name="selectionId" value="{{$selection->id}}" >
			<input type="hidden" name="selectionPositionLabel" value="{{$selection->label}}" >
			
			<input type="hidden" name="companyName" value="{companyName}" >
			<input type="hidden" name="companyEmail" value="{companyEmail}" >

			<input type="hidden" name="userName" value="{userName}" >
			<input type="hidden" name="userEmail" value="{userEmail}" >

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Destinat&aacute;rio</h3>
				</div>
				<div class="panel-body">
					<h4>{userName} <small>{userEmail}</small></h4>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Documentos recusado</h3>
				</div>
				<div class="panel-body">
					<b>{receivedDocumentLabel}</b>
		        </div>
	        </div>

	        <div class="panel panel-default">
				<h3>Mensagem ao candidato</h3>

				<div class="form-group">
					<textarea name="documentDeclinedMessage" id="documentDeclinedMessage" placeholder="Escreva uma mensagem para informar aos candidatos sobre a solicitação de documentos." class="form-control" >
					</textarea>
				</div>

				<hr/>

				<ul class="list-inline clearfix">
					<li><button type="submit" class="btn btn-success" >Solicitar novo documento</button></li>
					<li class="float-right">
						<a href="/selection/view/{{$selection->id}}" class="btn btn-default" ><i class='fa fa-times' ></i> Cancelar</a>
					</li>
					<li class="clearfix"></li>
				</ul>
			</div>

		</form>

	</div>
</div>

<script>
$(document).ready(function()
	{

		
	});
</script>