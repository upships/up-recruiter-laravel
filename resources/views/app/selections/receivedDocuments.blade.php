<div class="row m-b-10">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="list-group">
			<div class="list-group-item">
				<h2>Listar documentos recebidos</h2>
				<ul class="list-inline">
					<li>
						Processo seletivo para {selectionPositionLabel}
					</li>
				</ul>
			</div>
			<div class="list-group-item">
				<ul class="list-inline">
					<li>
						<a href="/selections/view/{selectionId}" class="btn btn-default btn-fill" ><i class='fa fa-arrow-left' ></i> Voltar para processo</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12"> 
	    
	    <div id="receivedDocumentsList" >
	    
    	   	<!-- <div class="form-group">
				<input class="search form-control input-lg" placeholder="Filtrar candidatos..." />
			</div> -->

			<ul class="list-group list" >
				{users}
				<li class="list-group-item">

					<h3 class="list-group-item-heading userName" >{userName}</h3>

					<ul class="list-group">
						{receivedDocuments}
						<li class="list-group-item">
							<h4 class="list-group-item-heading">
								<a href="/documents/view/{receivedDocumentId}" target="_blank" >
								<i class="fa fa-circle receivedDocumentStatus-{receivedDocumentStatus}" ></i> 
								
								<span class="receivedDocumentLabel" >{receivedDocumentLabel}</span> <small><i class="fa fa-external-link"></i></small>
								</a>
							</h4>
							
							{receivedDocumentUserMessage}

							<ul class="list-inline">
								<li>{receivedDocumentStatusLabel}</li>
								<li>Em {receivedDocumentDate}</li>
								<li class="approveDeclineDocument-{receivedDocumentStatus} approveDocumentButton-{receivedDocumentStatus}" >
									<a href="/selections/approveDocument/{receivedDocumentId}" class="text-success">
										<i class="fa fa-check"></i> Aprovar
									</a>
								</li>
								<li class="approveDeclineDocument-{receivedDocumentStatus} declineDocumentButton-{receivedDocumentStatus}" >
									<a href="/selections/declineDocument/{receivedDocumentId}" class="text-danger">
										<i class="fa fa-times"></i> Recusar
									</a>
								</li>
							</ul>
						</li>
						{/receivedDocuments}
					</ul>
				</li>
				{/users}
			</ul>
		</div>
	</div>
</div>


<div class="modal fade" id="viewDocumentModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Visualizar documento</h4>
      </div>
      <div class="modal-body">
        	<div id="documentPreviewContainer"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<!--
<script id="viewDocumentTemplate" type="text/x-jsrender">
    <h3>Documento {{:receivedDocumentLabel}}</h3>
    <ul class="list-inline">
    	<li>Candidato: {{:userName}}</li>
    	<li><a href="#">Download</a></li>
    </ul>

    {{if isImage}}
    <div class="embed-responsive embed-responsive-4by3">
    	<iframe class="embed-responsive-item" src="/documents/output/{{:receivedDocumentId}}"></iframe>
    </div>
    {{/if}}

    {{if isPdf}}
    <div id="documentContainer"></div>
    {{/if}}
</script>
-->
<script>

function viewDocument(receivedDocumentId)
{
	$.getJSON('/api/documents/view/' + receivedDocumentId, function(res)
		{
			var receivedDocumentFileType = res.receivedDocumentFileType;
			var receivedDocumentFile = res.receivedDocumentFile;
			var file = '/documents/output/' + receivedDocumentId;

			if(receivedDocumentFileType == 'pdf')
			{
				res.isPdf = true;
				res.isImage = false;
			}
			else
			{
				res.isPdf = false;
				res.isImage = true;
			}

			var viewDocumentTemplate = $.templates("#viewDocumentTemplate");
    		var viewDocumentOutput = viewDocumentTemplate.render(res);
    		$("#documentPreviewContainer").append(viewDocumentOutput);

    		if(receivedDocumentFileType == 'pdf')
    		{
    			PDFObject.embed(file, "#documentContainer");
    		}
		}).done(function(){
			$('#viewDocumentModal').modal('show');
		});
}

$(document).ready(function()
	{
		$('.approveDeclineDocument-2').remove();
		$('.approveDeclineDocument-666').remove();
		$('.approveDeclineDocument-0').remove();
		
		$('.receivedDocumentStatus-0').addClass('text-muted');
		$('.receivedDocumentStatus-1').addClass('text-warning');
		$('.receivedDocumentStatus-2').addClass('text-success');
		$('.receivedDocumentStatus-666').addClass('text-danger');

		
		var options = {
		    valueNames: [ 'userName' ],
		    item: "<li><h3 class='userName' ></h3><ul><li><h4><a><i></i><span></span> <small><i></i></small></a></h4><ul><li></li><li></li><li><a><i></i></a></li><li><a><i></i></a></li></ul></li></ul></li>",
		};

		var filteredList = new List('receivedDocumentsList', options);
	});
</script>