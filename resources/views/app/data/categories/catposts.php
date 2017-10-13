<div class="row">
  <div class="col-lg-12"><h1>Categorias, Postos e Dados</h1></div>
</div>

<p><a href="<?php echo PATH;?>/manager/data" class="btn btn-theme btn-sm" >Dados</a></p>

<div class="row" >
	<div class="col-md-4" >
		<h3>Categorias</h3>
						
				<div class="row" >
					<ul class="list-group" >
						
						
							
						<li class="list-group-item">
							<div class="row" >
								<div class="col-sm-offset-1 col-sm-10" >
									<form method="post" action="<?php echo PATH;?>/manager/system/addcat" role="form">
										<div class="row" >
											<div class="input-group">
												<input type="text" name="label" class="form-control" placeholder="Nome da categoria" />
												<span class="input-group-btn">
													<button type="submit" class="btn btn-theme form-control"><i class="icon-plus" ></i>Adicionar</button>
												</span>							
											</div>									
										</div>
									</form>
								</div>					
							</div>		
						</li>
						
					{categories}					
						<li class="list-group-item">
							
							<span class="badge bg-white"><a href="#"><i class="icon-pencil"></i></a></span>
								{categoryLabel}
						</li>
					{/categories}
					</ul>
				
				</div>
	</div>
	<div class="col-md-8" >
		<h3>Posi&ccedil;&otilde;es</h3>
		
		<div class="panel panel-default" >
			<div class="panel-body" >
				
				<!-- adicionar nova categoria -->
				
				<form method="post" action="<?php echo PATH;?>/manager/system/addposition" role="form">
					
					<div class="row space-bottom" >
						<div class="col-sm-8" >
							<input type="text" name="label" class="form-control" placeholder="Nome da posi&ccedil;&atilde;o" />
						</div>
						<div class="col-sm-4" >
							<input type="text" name="code" class="form-control" placeholder="C&oacute;digo" />
						</div>
					</div>
					<hr />
					<div class="row" >
						<div class="col-sm-8" >
							<input type="text" name="name" class="form-control" placeholder="Nome - tudo min&uacute;sculo" />
						</div>
						<div class="col-sm-4" >
							<button type="submit" class="btn btn-theme"><i class="icon-plus" ></i>Adicionar</button>
						</div>
					</div>
					
					<hr />
				</form>
				
				<!-- fim: adicionar nova categoria -->
				{positions}
				<div class="row" >
					<div class="col-sm-8" >{positionLabel}</div>
					<div class="col-sm-4" >
						<a href="#" class="btn btn-sm btn-default"><i class="icon-pencil"></i></a>
					</div>
				</div>
				{/positions}
			</div>
		</div>
		
	</div>
</div>