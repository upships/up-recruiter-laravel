<div class="row">
  <div class="col-lg-12"><h1>Adicionar usu&aacute;rio</h1></div>
</div>

<div class="panel panel-default">
	<form method="post" action="/users/add_action" role="form" >
		
		<div class="row" >
			<div class="col-md-6" >
			
				<div class="form-group" >
					<label for="email" >Email</label>
					<input type="email" class="form-control" name="email" placeholder="Email" />
				</div>
				<div class="form-group" >
					<label for="first_name" >Nome e sobrenome</label>
					
					<div class="row" >
						<div class="col-md-6" >
							<input type="text" class="form-control" name='first_name' placeholder="Primeiro nome"/>
						</div>					
						<div class="col-md-6" >
							<input type="text" class="form-control" name='last_name' placeholder="Sobrenome"/>
						</div>					
					</div>
				</div>
				<div class="form-group" >
					<label for="phone_code" >Telefone</label>
					<div class="row" >
						<div class="col-md-3" >
							<input type="text" class="form-control" name='phone_code' placeholder="DDD"/>
						</div>					
						<div class="col-md-9" >
							<input type="text" class="form-control" name='phone' placeholder="Telefone"/>
						</div>					
					</div>
				</div>
				
				<div class="form-group" >
					<label for="type" >Tipo de conta</label>
					<select name="type" class="form-control">
						<option value="0">Usu&aacute;rio comum</option>
						<option value="1">Recrutador</option>
						<option value="2">Administrador</option>
					</select>
				</div>
				
				<div class="form-group" >
					<label for="password" >Senha</label>
					<div class="row" >
						<div class="col-md-6" >
							<input type="password" class="form-control" name='password' placeholder="Senha"/>
						</div>					
						<div class="col-md-6" >
							<input type="password" class="form-control" name='password1' placeholder="Repita a senha"/>
						</div>					
					</div>

				</div>
				<div class="form-group" >
					<label for="company" >Empresa</label>
					<select class="form-control" name="company">
						<option value="0">Sem empresa</option>
						
						{companies}
							<option value="{companyId}">{companyName}</option>
						{/companies}
					</select>				
				</div>
				
				<button type="submit" class="btn btn-success">Adicionar usu&aacute;rio</button>
			</div>
		</div>
	</form>
</div>