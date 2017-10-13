<form method="post" action="/data/filterLanguagesAction">

<div class="row">
	<div class="col-lg-6">
		<div class="list-group">
			<div class="list-group-item">
				<h4 class="list-group-item-heading">Idiomas</h4>
			</div>

			<div class="list-group-item">
				{allLanguages}
				<div class="form-group">
					<label>
						<input type="checkbox" name="oldLanguages[]" value="{languageId}" > [{languageId}] {languageLabel} 
					</label> <a href="/data/editlanguage/{languageId}" class="btn btn-default btn-sm" target="_blank" >editar</a>
				</div>
				{/allLanguages}
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div data-spy="affix" data-offset-top="60" data-offset-bottom="200">
			<div class="list-group">
				<div class="list-group-item">
					<select name="language" class="select2">
						{languages}
						<option value="{languageId}" >[{languageId}] {languageLabel}</option>
						{/languages}
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