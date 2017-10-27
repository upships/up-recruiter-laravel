<div class="row">
	<div class="col col-sm-12 col-xs-12">
		
		<div class="list-group">
			<div class="list-group-item">
				<h3 class="list-group-item-heading">Pastas de perfis</h3>
			</div>
			<div class="list-group" >
				<div class="list-group-item">
		        	<ul class="list-inline">
		        		<li><a href="/profiles" class="btn btn-default">
		        				<i class="fa fa-angle-left"></i> Banco de Talentos
		        			</a>
		        		</li>
		        	</ul>
		        </div>
				<div class="list-group-item">
		            <form method="post" action="/profiles/addFolderAction" role="form">
		                
					<div class="row" >
						<div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" >
		                    <input type="text" name="profileFolderName" class="form-control" placeholder="Nome da lista" />
		                </div>
		                <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4" >
							<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i></button>
			            </div>
		            </div>
		        </form>
			</div>
				
			{folders}
				<a href="/profiles/viewFolder/{profileFolderId}" class="list-group-item">
			        <h4 class="list-group-item-heading">{profileFolderName}</h4>
			        <small class="text-muted">Criada em {profileFolderCreatedAt}</small>
			    </a>
			{/folders}
			</div>
		</div>
	</div>
</div>