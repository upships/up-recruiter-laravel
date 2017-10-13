<form method="post" action="/selections/finish/{selectionId}" id="finishSelectionForm" >

	<div class="row m-b-10">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

			

			<div class="list-group">
				<div class="list-group-item">
					<h2>Finalizar processo seletivo</h2>
					
					<ul class="list-inline clearfix">					
						<li class="float-right">
							<a href="javascript:history.go(-1)" class="btn btn-default" ><i class='fa fa-times' ></i> Cancelar</a>
						</li>
						<li class="clearfix"></li>
					</ul>

				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="list-group">
				<div class="list-group-item">
					<h3 class="list-group-item-heading">Candidatos finalistas</h3>
					Estes candidatos ser&atilde;o adicionados &aacute; sua lista de Tripulantes
				</div>

				{applicants}
				<div class="list-group-item">
					<h4 class="list-group-item-heading">{applicantName}</h4>
					{applicantPositionLabel}

					<input type="hidden" name="applicants[]" value="{applicationId}">
				</div>
				{/applicants}
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="list-group">
				<div class="list-group-item">
					<h3 class="list-group-item-heading">Tripula&ccedil;&otilde;es</h3>
				</div>
				{crewLists}
				<div class="list-group-item">
					<div class="form-group">
						<div class="radio">
				            <label class="cr-styled" for="crew-{crewListCode}">
				                <input type="radio" id="crew-{crewListCode}" name="crewListCode" value="{crewListCode}"> 
				                <i class="fa"></i> 
				                {crewListLabel}
				            </label>
				        </div>
					</div>
				</div>
				{/crewLists}

				<div class="list-group-item">
					<div class="form-group">
						<label for='newCrew'>Nova tripula&ccedil;&atilde;o</label>
						<input type="text" name="newCrew" placeholder="Nome da nova tripulação" class="form-control">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row m-t-10">
		<div class="col-lg-12">
			<div class="list-group">
				<div class="list-group-item">
					<button type="submit" name="submitIncludeCandidate" class="btn btn-success" >
						Inserir candidatos
					</button>
				</div>
			</div>
		</div>
	</div>

</form>

<script>


$(document).ready(function()
	{
		
	});
</script>