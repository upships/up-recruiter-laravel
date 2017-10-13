<div class="row">
  	<div class="col-lg-8 col-md-8">
		<div class="list-group m-b-10">
			<div class="list-group-item">
				<h3 class="list-group-item-heading">Minha Conta</h3>
				<ul class="list-inline">
					<li>{name}</li>
					<li>{email}</li>
				</ul>
			</div>
			<div class="list-group-item">
				<ul class="list-inline">
					<li>
						<a href="/account/edit" class="btn btn-default" ><i class='fa fa-pencil'></i> Editar dados</a>
					</li>
					<li>
						<a href="/users/requestNewPassword/{userId}" class="btn btn-default" ><i class='fa fa-key'></i> Solicitar nova senha</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body">
				<h4>Dados da empresa</h4>
				<a href="/companies/view/{companyId}">
					{userCompanyName} ({companyId})
				</a>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-body">
				<h4>Redes Sociais</h4>
				
				<p>
					<a href="/linkedin/connect" class="btn btn-primary" ><i class="fa fa-linkedin"></i> Conectar LinkedIn</a>
				</p>

				<p>
					<a href="#" class="btn btn-primary disabled" ><i class="fa fa-facebook"></i> Conectar Facebook</a>
				</p>				

			</div>
		</div>
	</div>
</div>
