<div class="row">
	<div class="col-lg-6">
		<div class="list-group">
			<div class="list-group-item">
				<h2 class="list-group-item-heading">Configura&ccedil;&otilde;es do sistema</h2>
			</div>
			<div class="list-group-item">
				<a href="/settings/setCompany" class="btn btn-default">Definir empresa do sistema</a>
			</div>
			<div class="list-group-item">
			<table class="table">
				<thead>
					<tr>
						<th>CHAVE</th>
						<th>VALOR</th>
						<th>EXTRA</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					{settings}
					<tr>
						<td>{key}</td>
						<td>{value}</td>
						<td>{extra}</td>
						<td>
							<a href="/settings/editSetting/{settingId}"><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
					{/settings}
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>