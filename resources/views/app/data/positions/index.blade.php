<div class="row">
	<div class="col-lg-12">

		<div class="list-group">
			<div class="list-group-item">
				<h3 class="list-group-item-heading">Fun&ccedil;&otilde;es</h3>
			</div>
			<div class="list-group-item">
				<form method="post" action="/data/positions/addAction" role="form">						
					<div class="row space-bottom" >
						<div class="col-sm-6" >
							<input type="text" name="positionLabel" class="form-control" placeholder="Nome da fun&ccedil;&atilde;o" />
						</div>
						<div class="col-sm-3" >
							<button type="submit" class="btn btn-success btn-block" >Adicionar</button>
						</div>
						<div class="col-sm-3" >
							<a href="/data/positions/filter" class="btn btn-default">
								Filtrar fun&ccedil;&otilde;es
							</a>
						</div>
					</div>
				</form>
			</div>
			<div class="list-group-item" >
				<div class="row">
					<div class="col-lg-6 col-md-8 col-sm-12">
						<div class="list-group">
				            {positions}
				            <a class="list-group-item" href="/data/positions/edit/{positionId}" >
								{positionLabel} / {positionEnglishLabel}
				            </a>
				            {/positions}
				        </div>
				   	</div>
				</div>
		    </div>
		</div>
	</div>
</div>