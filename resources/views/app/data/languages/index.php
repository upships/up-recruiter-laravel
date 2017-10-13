<div class="row">
	<div class="col-lg-6">
		<div class="list-group">
			<div class="list-group-item">
				<h4 class="list-group-item-heading">Idiomas</h4>
			</div>

			{languages}
			<div class="list-group-item clearfix">
				({languageId}) {languageLabel}
					
				<a href="/data/main/editlanguage/{languageId}" class="btn btn-default btn-sm pull-right" target="_blank" >
					editar
				</a>
			</div>
			{/languages}

		</div>
	</div>
</div>
