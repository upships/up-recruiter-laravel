<div class="row m-b-10">
	<div class="col-lg-12 col-md-12">

		<div class="list-group m-b-10">
			<div class="list-group-item">
				<h2 class="list-group-item-heading">Publicando vaga nas redes sociais</h2>
			</div>
			<div class="list-group-item hideAtEnd" id='loadingText'>
				<i class="fa fa-spinner fa-spin fa-2x"></i> Aguarde enquanto o conte&uacute;do &eacute; publicado nas redes sociais
			</div>

			<div class="list-group-item text-success initiallyHidden showAtEnd" >
				<i class="fa fa-check fa-2x"></i> Conte&uacute;do publicado com sucesso nas redes sociais!
			</div>			
		</div>

		<div class="list-group">

			{shareList}
			<div class="list-group-item" id='shareList-{shareQueueId}'>
				<ul class="list-inline">
					<li id='shareListWaitingIcon-{shareQueueId}'><i class="fa fa-spin fa-spinner" ></i></li>

					<li id='shareListSuccessIcon-{shareQueueId}' class="text-success initiallyHidden" ><i class="fa fa-check" ></i></li>
					<li id='shareListFailureIcon-{shareQueueId}' class="text-danger initiallyHidden"><i class="fa fa-times" ></i></li>
					
					<li><img src='{sharePhoto}' class="img-circle" style="width: 40px;"></li>
					<li>{shareName} <i class="fa fa-{shareQueueTypeTxt}-square"></i></li>
				</ul>
			</div>
			{/shareList}

			<div class="list-group-item initiallyHidden showAtEnd" id='shareComplete'>
				<a href="/jobs/view/{{$job->id}}" class="btn btn-success btn-lg" ><i class="fa fa-check"></i> Finalizar</a>
			</div>
		</div>
	</div>
</div>

<script>
function shareJob(jobId)
{
  $.getJSON('/api/sharer/byJob/' + jobId, function( data )
  {
    if(data !== null)
    {
      if(data.error === false && data.items.length > 0)
      {
        $.each(data.items,function(key,item)
        {
          var jobStatus = item.jobStatus;
          var shareQueueId = item.shareQueueId;

          console.log(shareQueueId + ' jobStatus: ' + jobStatus);

          if(jobStatus == 'success')
          {	
          	$('#shareListSuccessIcon-' + shareQueueId).show();
          }
          else if(jobStatus == 'fail')
          {
          	$('#shareListFailureIcon-' + shareQueueId).show();	
          }

          $('#shareListWaitingIcon-' + shareQueueId).hide();

        });
      }
      else
      {
        console.log('Erro ao executar fila de compartilhamento: ' + data.error);
      }
    }
    else
    {
      console.log('Fila de compartilhamento vazia.');
      $('#shareComplete').show();
    }
  }).done(function()
  {
  		$('#shareComplete').show();
  		$('.showAtEnd').show();
  		$('.hideAtEnd').hide();
  });
}

$(document).ready(function()
{
	var jobId = '{{$job->id}}';
	$('.initiallyHidden').hide();

	shareJob(jobId);
});
</script>