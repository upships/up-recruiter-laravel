<form method="post" action="/selection/insertCandidatesAction" id="includeCandidateForm" >
	<div class="row m-b-10">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2>Inserir candidatos a processo seletivo</h2>
			<ul class="list-inline m-b-10">
				<li>
					Selecione o processo desejado na lista abaixo
				</li>
			</ul>

			<div class="list-group">
				<div class="list-group-item">

					<ul class="list-inline clearfix">
						<li>
							<button type="submit" name="submitIncludeCandidate" class="btn btn-success" >
								Inserir candidatos
							</button>
						</li>
						<li class="float-right">
							<a href="javascript:history.go(-1)" class="btn btn-default" >
								<i class='fa fa-times' ></i> Cancelar
							</a>
						</li>
						<li class="clearfix"></li>
					</ul>
				</div>

				<div class="list-group-item">

					<div class="row m-b-10">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="list-group">
								<div class="list-group-item">
									<h3 class="list-group-item-heading">Candidatos</h3>
									Ser&atilde;o inclu&iacute;dos no processo seletivo
								</div>

								{profiles}
								<div class="list-group-item">
									<h4 class="list-group-item-heading">{userName}</h4>
									{profilePositionLabel}

									<input type="hidden" name="newCandidates[][userId]" value="{userId}">
								</div>
								{/profiles}
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="list-group">
								<div class="list-group-item">
									<h3 class="list-group-item-heading">Processos seletivos ativos</h3>
								</div>
								{selections}
								<div class="list-group-item">
									<div class="form-group">
										<div class="radio">
								            <label class="cr-styled" for="selection-{{$selection->id}}">
								                <input type="radio" id="selection-{{$selection->id}}" name="selectionId" value="{{$selection->id}}"> 
								                <i class="fa"></i> 
								                {{$selection->label}}
								                <small class="text-muted">Em {{$selection->date}}</small>
								            </label>
								        </div>
									</div>
								</div>
								{/selections}
							</div>
						</div>
					</div>
				</div>

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