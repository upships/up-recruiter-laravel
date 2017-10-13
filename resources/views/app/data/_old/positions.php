<form method="post" action="/data/positions/filterPositionsAction">

<div class="row">
	<div class="col-lg-6">
		<div class="list-group">
			<div class="list-group-item">
				<h4 class="list-group-item-heading">Fun&ccedil;&otilde;es</h4>
			</div>
			<!-- fim: adicionar nova categoria -->

			<div class="list-group-item">
				{allPositions}
				<div class="form-group">
					<label>
						<input type="checkbox" name="oldPositions[]" value="{position->id}" > [{position->id}] {positionLabel} 
					</label> <a href="/data/positions/editposition/{position->id}" class="btn btn-default btn-sm" target="_blank" >editar</a>
				</div>
				{/allPositions}
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
			<div class="list-group">
				<div class="list-group-item">
					<select name="position" class="select2">
						{positions}
						<option value="{position->id}" >[{position->id}] {positionLabel}</option>
						{/positions}
					</select>
				</div>
				<div class="list-group-item">
					<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script type="text/javascript">
$(document).ready(function(){
    $('.hiddenCards').hide();
    $(".select2").select2({width: '100%'});
});
</script>