<div class="page-title">
	<h3 class="title" >Dados do sistema</h3>
</div>

<div class="row">
  	<div class="col-lg-12">

	  	<!-- Nav tabs -->
	  	<ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active">
		    	<a href="#pos" aria-controls="positions" role="tab" data-toggle="tab">Fun&ccedil;&otilde;es</a>
		    </li>

		    <!-- <li role="presentation" >
		    	<a href="#ships" aria-controls="ships" role="tab" data-toggle="tab">Navios</a>
		    </li> -->

		    <li role="presentation">
		    	<a href="#crs" aria-controls="trainings" role="tab" data-toggle="tab">Cursos</a>
		    </li>

		    <li role="presentation">
		    	<a href="#documents" aria-controls="trainings" role="tab" data-toggle="tab">Tipos De Documentos</a>
		    </li>
	  	</ul>

		<!-- Tab panes -->
		<div class="tab-content">

		    <div role="tabpanel" class="tab-pane active" id="pos">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						
						<div class="list-group">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Fun&ccedil;&otilde;es</h4>
							</div>
				            <div class="list-group-item" >
								<form method="post" action="/data/main/addposition" role="form">
									
									<div class="row space-bottom" >
										<div class="col-sm-8" >
											<input type="text" name="positionLabel" class="form-control" placeholder="Nome da fun&ccedil;&atilde;o" />
										</div>
										<div class="col-sm-4" >
											<button type="submit" class="btn btn-success btn-block" >Adicionar</button>
										</div>
									</div>
								</form>
				            </div>
								<!-- fim: adicionar nova categoria -->
				            {positions}
				            <a class="list-group-item" href="/data/main/editposition/{positionId}" >
								{positionLabel} [{positionId}]
				            </a>
				            {/positions}
				        </div>
					</div>
				</div>
		    </div><!-- Posicoes tab panel -->

		    <!-- <div role="tabpanel" class="tab-pane" id="ships">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
						<div class="list-group">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Navios</h4>
							</div>
							<div class="list-group" >
								<div class="list-group-item">
						            <form method="post" action="/data/main/addShipType" role="form">
						                
									<div class="row" >
										<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" >
						                    <input type="text" name="positionLabel" class="form-control" placeholder="Tipo de navio" />
						                </div>
						                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" >
											<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i></button>
							            </div>
						            </div>
						        </form>
							</div>
								
							{shipsTypes}					
								<a class="list-group-item" href="/data/main/editShipType/{shipTypeId}">
							        {shipTypeLabel}
								</a>
							{/shipsTypes}
							</div>
						</div>
					</div>
				</div>
		    </div><!-- Ships tab panel -->
		    		
		    <div role="tabpanel" class="tab-pane" id="crs">
		        <ul class="list-group" >

		            <!-- adicionar novo curso -->	

		               <li class="list-group-item" >
		                   <form method="post" action="/data/main/addtraining" role="form">
		                   <div class="row" >
		                        <div class="col-lg-4 col-md-4 col-sm-4" >
		                            <input type="text" name="positionLabel" class="form-control" placeholder="Sigla ou nome do curso" />
		                        </div>
		                        <div class="col-lg-5 col-md-5 col-sm-5" >
		                            <input type="text" name="description" class="form-control" placeholder="Descri&ccedil;&atilde;o" />
		                        </div>
		                        <div class="col-lg-3 col-md-3 col-sm-3" >
		                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar curso</button>
		                        </div>                               
		                   </div>
		                   </form>
		                </li>
		                
						{trainings}
		                    <li class="list-group-item" >
		                        <div class="row" >
		                            <div class="col-sm-2" >
		                                <a href="/data/main/edittraining/{trainingId}" class="btn btn-sm btn-default"><i class="fa fa-pencil-square-o"></i></a> {trainingLabel}
		                            </div>
		                            <div class="col-sm-6" >{trainingDescription}</div>
		                        </div>
		                    </li>
						{/trainings}                    
		        </ul>    
		    </div>

		    <div role="tabpanel" class="tab-pane" id="documents">
		    	
				<div class="list-group" >
					<div class="list-group-item">
			            <form method="post" action="/data/main/addDocumentType" role="form">
			                
						<div class="row" >
							<div class="col-sm-10" >
			                    <input type="text" name="documentTypeLabel" class="form-control" placeholder="Nome do documento" />
			                </div>
			                <div class="col-sm-2" >
								<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar</button>
				            </div>
			            </div>
			        </form>
					</div>
					
				{documentTypes}
					<a class="list-group-item" href="/data/main/editDocumentType/{documentTypeId}">
				        {documentTypeLabel}
					</a>
				{/documentTypes}
				</div>
		    </div>
		</div>
	</div>
</div>
		
