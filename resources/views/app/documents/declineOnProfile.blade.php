<div class="page-title">
	<h3>Recusar documento</h3>
</div>

<div class="row m-b-10">
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<form method="post" action="/documents/declineAction" id="selectedApplicantsForm" >
			<input type="hidden" name="randomKey" value="{randomKey}" >

			<input type="hidden" name="receivedDocumentId" value="{receivedDocumentId}" >
			
			<input type="hidden" name="companyName" value="{companyName}" >
			<input type="hidden" name="companyEmail" value="{companyEmail}" >

			<input type="hidden" name="userName" value="{{$profile->name}}" >
			<input type="hidden" name="userEmail" value="{userEmail}" >
			<input type="hidden" name="profileId" value="{{$profile->id}}" >

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Destinat&aacute;rio</h3>
				</div>
				<div class="panel-body">
					<h4>{{$profile->name}} <small>{userEmail}</small></h4>
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
						<a href="/profile/{{$profile->id}}" class="btn btn-default" ><i class='fa fa-times' ></i> Cancelar</a>
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