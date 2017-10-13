<div class="page-title">
	<h1 class="title">Editar logo e imagem de fundo</h1>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			
			<h2>Logo</h2>

			<form method="post" action="/company/editLogoAction" role="form" enctype="multipart/form-data" >	<div class="row">

				<div class="row">
			    	<div class="col-lg-4">
				        <h4>Logo antiga</h4>

				        <img src="//cdn.upships.com/logos/{companyLogo}" class="img-responsive">

				    </div>
				    <div class="col-lg-8">
				    	<h4>Nova logo</h4>

				    	<div class="form-group" >
							<label for="logo" >Logo</label>
							<input type="file" class="form-control" name="logo" />
						</div>

						<div class="form-group" >
							<button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar logo</button>
						</div>
					</div>
				</div>
			</form>

			<h2>Imagem de fundo</h2>

			<form method="post" action="/company/editImageAction" role="form" enctype="multipart/form-data" >	<div class="row">

				<div class="row">
			    	<div class="col-lg-12">
				        <h3>Imagem atual</h3>

				        <img src="//vagasembarcado.upships.com/_assets/companies/images/{companyImage}" class="img-responsive">

				    </div>
				</div>

				<div class="row">
				    <div class="col-lg-12">
				    	<h4>Nova imagem</h4>

				    	<div class="form-group" >
							<label for="logo" >Logo</label>
							<input type="file" class="form-control" name="logo" />
						</div>

						<div class="form-group" >
							<button class="btn btn-success btn-fill"><i class='fa fa-save'></i> Salvar logo</button>
						</div>
					</div>
				</div>
			</form>

			<hr/>

			<ul class="list-inline">
		        <li class="">
		            <li><a href="/company" class="btn btn-default"><i class="fa fa-times"></i> Cancelar</a></li>
		        </li>
		    </ul>
		</div>
	</div>
</div>