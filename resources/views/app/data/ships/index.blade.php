<div class="row">
	<div class="col col-sm-12 col-xs-12">
		
		<div class="list-group">
			<div class="list-group-item">
				<h3 class="list-group-item-heading">Tipos de navios</h3>
			</div>
			<div class="list-group" >
				<div class="list-group-item">
		            <form method="post" action="/data/ship" role="form">
		                
					<div class="row" >
						<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" >
		                    <input type="text" name="label" class="form-control" placeholder="Tipo de navio" />
		                </div>
		                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" >
							<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i></button>
			            </div>
		            </div>
		        </form>
			</div>
				
			{ships}
				<div class="list-group-item">
			        {{$job->ship_type->label}}

			        <ul class="list-inline">
			        	<li>
			        		<a class="" href="/data/ships/edit/{shipTypeId}">
			        			editar
			        		</a>
			        	</li>
			        	<!-- <li>
			        		<a class="" href="/data/ships/convert/{shipTypeId}">
			        			marcar principal
			        		</a>
			        	</li> -->
			        </ul>
				</div>
			{/ships}
			</div>
		</div>
	</div>
</div>