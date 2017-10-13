<h3>Ver arquivo</h3>

<div id="documentContainer">
</div>

<script>
$(function()
	{
		var documentType = '{receivedDocumentFileType}';
		var documentFile = "/documents/output/{receivedDocumentId}";

		if(documentType == 'pdf')
		{
			PDFObject.embed(documentFile, "#documentContainer");
		}
		else if(documentType == 'png' || documentType == 'jpg' || documentType == 'jpeg')
		{
			// Embed image file
			var embedCode = '<div class="embed-responsive embed-responsive-4by3"><iframe class="embed-responsive-item" src="' + documentFile + '"></iframe></div>';

			$('#documentContainer').html(embedCode);
		}
	});
</script>