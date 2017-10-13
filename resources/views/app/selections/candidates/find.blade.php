<div class="row m-b-10">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="list-group">
			<div class="list-group-item">
				<h2>Inserir candidato</h2>
				<ul class="list-inline">
					<li>
						Sele&ccedil;&atilde;o para <b>{selectionPositionLabel}</b>
					</li>
				</ul>
			</div>
			<div class="list-group-item">

				<ul class="list-inline clearfix">					
					<li class="float-right">
						<a href="/selections/view/{selectionId}" class="btn btn-default" ><i class='fa fa-times' ></i> Cancelar</a>
					</li>
					<li class="clearfix"></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<form method="post" action="/selections/insertCandidatesAction" id="includeCandidateForm" >
	<input type="hidden" name="selectionId" value="{selectionId}" >

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
			<div class="list-group">
				<div class="list-group-item">
					<h3 class="list-group-item-heading">E-mail do candidato</h3>
					O usu&aacute;rio dever&aacute; estar cadastrado no VagasEmbarcado.com
				</div>
				<div class="list-group-item">
					<div class="form-group">
						<label for="email" >E-mail</label>
						<input type="email" name="newCandidates[][email]" id="email" class="form-control">
					</div>
				</div>

				<div class="list-group-item">
					<button type="submit" name="submitInsertCandidate" class="btn btn-success" >
						Inserir candidato
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