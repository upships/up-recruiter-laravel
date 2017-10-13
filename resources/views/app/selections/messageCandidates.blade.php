<div class="page-title">
	<h3>Mensagem aos candidatos</h3>
</div>

<div class="row m-b-10">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<ul class="nav nav-tabs"> 
	        <li class="active"> 
	            <a href="#email" data-toggle="tab" aria-expanded="true"> 
	                <i class="fa fa-envelope-o"></i> E-mail
	            </a> 
	        </li>
	        <li class=""> 
	            <a href="#sms" data-toggle="tab" aria-expanded="false"> 
	                <i class="fa fa-mobile"></i> SMS
	            </a> 
	        </li>
	    </ul>
	    <div class="tab-content"> 
	        <div class="tab-pane active" id="email">
				<h2 class="">E-mail</h2>

				<form method="post" action="/selections/messageCandidatesAction" id="selectedApplicantsForm" >
					<input type="hidden" name="selectionId" value="{selectionId}" >

					<input type="hidden" name="selectionId" value="{selectionId}" >
					<input type="hidden" name="selectionPositionLabel" value="{selectionPositionLabel}" >
					
					<input type="hidden" name="companyName" value="{companyName}" >
	                                
                	<h5 class="">Destinat&aacute;rios</h5>

                	<div class="form-group">

	                    <ul class="list-inline">
							{applications}
							<li class="m-b-5">
								<input type="hidden" name="applications[{applicationId}][userId]" value="{userId}"  >
								<input type="hidden" name="applications[{applicationId}][userName]" value="{applicantName}"  >
								<input type="hidden" name="applications[{applicationId}][userEmail]" value="{applicantEmail}"  >

								<div class="btn-group">
									<a href="/profiles/view/{profileId}" class="btn btn-default btn-custom text-left" target="_blank" title="{applicantPositionLabel}" >
										{applicantName} 
										<small class="text-muted" >({applicantEmail})</small>
									</a>
									<!-- <a href="#removeTo-{applicationId}" class="btn btn-default" title="Remover destinatário" onclick="removeApplicant({applicationId})" >
										<i class="fa fa-times"></i>
									</a> -->
								</div>
							</li>
							{/applications}
						</ul>

					</div>

                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="email" name="emailCc" class="form-control" placeholder="Cc">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="emailCcc" class="form-control" placeholder="Bcc">
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <input type="text" name="emailSubject" class="form-control" placeholder="Assunto" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control fullText" name="emailMessage" placeholder="Corpo do e-mail" required></textarea>
                    </div>

                    <hr/>

                    <ul class="list-inline clearfix">
						<li><button type="submit" class="btn btn-success" >Enviar e-mails</button></li>
						<li class="pull-right">
							<a href="/selections/view/{selectionId}" class="btn btn-default" ><i class='fa fa-times' ></i> Cancelar</a>
						</li>
						<li class="clearfix"></li>
					</ul>
				</form>
			</div>
			<div class="tab-pane" id="sms">
				<form method="post" action="/selections/messageCandidatesViaSMSAction" id="msgSMS" >
				<p>Em breve</p>
				</form>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" type="text/css" href="/_includes/v2/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />	
<script type="text/javascript" src="/_includes/v2/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="/_includes/v2/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<script>

$(document).ready(function()
	{
		$('.fullText').wysihtml5();
	});
</script>