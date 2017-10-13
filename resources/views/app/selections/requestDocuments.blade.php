<div class="page-title">
	<h3>Solicitar documentos</h3>
</div>

<div class="row m-b-10">
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<form method="post" action="/selections/requestDocumentsAction" id="selectedApplicantsForm" >
			<input type="hidden" name="selectionId" value="{selectionId}" >

			<input type="hidden" name="selectionId" value="{selectionId}" >
			<input type="hidden" name="selectionPositionLabel" value="{selectionPositionLabel}" >
			
			<input type="hidden" name="companyName" value="{companyName}" >
			<input type="hidden" name="companyEmail" value="{companyEmail}" >

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Destinat&aacute;rios</h3>
				</div>
				<div class="panel-body">
					<ul class="list-unstyled">
						{applications}
						<li class="m-b-5">
							<input type="hidden" name="applications[{applicationId}][userId]" value="{userId}"  >
							<input type="hidden" name="applications[{applicationId}][userName]" value="{applicantName}"  >
							<input type="hidden" name="applications[{applicationId}][userEmail]" value="{applicantEmail}"  >

							<input type="hidden" name="applications[{applicationId}][profileId]" value="{profileId}"  >

							{applicantName} <small class="text-muted" >{applicantPositionLabel}</small>
						</li>
						{/applications}
					</ul>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Documentos solicitados</h3>
				</div>
				<div class="panel-body">
					{documentTypes}
					<div class="form-group">
		                <label class="cr-styled">
		                    <input type="checkbox" name="documentTypes[]" value="{documentTypeId}">
		                    <i class="fa"></i> 
		                    {documentTypeLabel}
		                </label>
		            </div>
		            {/documentTypes}

		            <div id="customDocument">

		            </div>

		            <button type="button" onclick="newCustomDocument()" class="btn btn-default btn-sm"><i class="fa fa-plus"></i> Outro documento </button>
		        </div>
	        </div>

	        <div class="panel panel-default">
				<h3>Mensagem aos candidatos</h3>

				<div class="form-group">
					<textarea name="documentRequestMessage" id="documentRequestMessage" placeholder="Escreva uma mensagem para informar aos candidatos sobre a solicitação de documentos." class="form-control" >
Prezado(a) {NOME}, 

Para dar prosseguimento no processo seletivo para {VAGA}, solicitamos que nos envie os documentos listados abaixo.

Para tal, basta clicar no link abaixo e efetuar o upload dos itens necessários.
					</textarea>
				</div>

				<hr/>

				<ul class="list-inline clearfix">
					<li><button type="submit" class="btn btn-success" >Solicitar documentos</button></li>
					<li class="float-right">
						<a href="/selections/view/{selectionId}" class="btn btn-default" ><i class='fa fa-times' ></i> Cancelar</a>
					</li>
					<li class="clearfix"></li>
				</ul>
			</div>

		</form>

	</div>
</div>

<script id="customDocumentTemplate" type="text/x-jsrender">
	<div class="form-group clearfix" id="customDocumentTypeContainer-{{:itemId}}" >
		<a href="#deleteItem-{{:itemId}}" onclick="deleteCustomDocument('{{:itemId}}')" title="Remover" class="float-right" >
			<small>
				<i class="fa fa-times"></i> Remover
			</small>
		</a>

		<label for='customDocumentType-{{:itemId}}'>Nome do documento</label>
		<input type="text" name="customDocumentTypes[]" id="customDocumentType-{{:itemId}}" class="form-control" >
	</div>
</script>

<script>

function newCustomDocument()
{
	var target = '#customDocument';
	var randomNumber = Math.floor(Math.random() * 10000 * Math.random());
	var data = {itemId: randomNumber};

	var template = $.templates(target + "Template");
	var htmlOutput = template.render(data);
	$(target).append(htmlOutput);
}

function deleteCustomDocument(itemId)
{
	$('#customDocumentTypeContainer-' + itemId).remove();
}

$(document).ready(function()
	{

		
	});
</script>