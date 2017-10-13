<div class="row">
	<div class="col-lg-6">
		<div class="list-group">
			<div class="list-group-item">
				<h2 class="list-group-item-heading">Definir empresa do sistema</h2>
			</div>
			<div class="list-group-item">
				<a href="/settings" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancelar</a>
			</div>
			<div class="list-group-item">
				<form method="post" action="/settings/setCompanyAction">
					<div class="form-group">
						<select name="companyId" class="form-control">
							{companies}
							<option value="{companyId}">{companyName} ({companyId})</option>
							{/companies}
						</select>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success">Definir empresa</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>