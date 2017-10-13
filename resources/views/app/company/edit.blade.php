<div class="row">
  <div class="col-lg-12"><h1>Editar dados da empresa</h1></div>
</div>

<div class="panel panel-default">
	<div class="panel-body">

		<form method="post" action="/company/editAction" role="form" >
			<input type="hidden" name="companyId" value="{companyId}" >
			<div class="row" >
				<div class="col-md-12" >
				
					<div class="form-group" >
						<label for="companyName" >Nome</label>
						<input type="text" class="form-control" name="companyName" value="{companyName}" />
					</div>

					<div class="form-group" >
						<label for="companyEmail" >Email principal</label>
						<input type="companyEmail" class="form-control" name="companyEmail" value="{companyEmail}" />
					</div>

					<div class="form-group" >
						<label for="companyPhone_code" >Telefone</label>
						<input type="text" class="form-control" companyName='companyPhone' data-mask="99-9999-9999" value="{companyPhone}" />
					</div>

					<div class="form-group" >
						<label for="companyCountry" >Pa&iacute;s de origem</label>
						<input type="text" class="form-control" name="companyCountry" value="{companyCountry}" />
					</div>

					<div class="form-group" >
						<label for="location" >Localiza&ccedil;&atilde;o</label>
						<input type="text" class="form-control" name="location" value="{companyLocation}" />
					</div>

					<div class="form-group" >
						<label for="companySite" >Site</label>
						<input type="text" class="form-control" name="companySite" value="{companySite}" />
					</div>

					<div class="form-group" >
						<label for="companyInfo" >Texto sobre a empresa</label>
						<textarea name="companyInfo" class="form-control">{companyInfo}</textarea>
					</div>
					
					<ul class="list-inline">
						<li>
							<button type="submit" class="btn btn-success"><i class="icon-checkbox-checked" ></i>Concluir</button>
						</li>
						<li class="float-right">
							<a href='/company' class="btn btn-default"><i class="icon-cancel-circle" ></i>Cancelar</a>
						</li>
						<li class="clearfix"></li>
					</ul>
				</div>
			</div>
		</form>
	</div>
</div>