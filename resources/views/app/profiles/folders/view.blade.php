<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
		<div class="list-group">
			<div class="list-group-item">
				<h4 class="list-group-item-heading">Pasta {profileFolderName}</h4>
			</div>
			<div class="list-group" >
				<div class="list-group-item">
		        	<ul class="list-inline">
		        		<li><a href="/profiles/folders" class="btn btn-default">
		        				<i class="fa fa-angle-left"></i> Pastas de perfis
		        			</a>
		        		</li>
		        		<li>
		        			<a href="#/profiles/editFolder/{profileFolderId}" class="btn btn-default">Editar</a>
		        		</li>

		        		<li class="float-right">
		        			<a href="#deleteFolder" onclick="removeFolder({profileFolderId})" class="btn btn-danger"><i class="fa fa-times"></i> Apagar</a>
		        		</li>
		        	</ul>
				</div>
				
			{folderItems}
				<div class="list-group-item">
					<span class="float-right">
						<a href="#removeItemFromFolder" onclick="removeFolderItem({profileFolderItemId})" class="text-muted" title="Remover perfil da lista">
							<i class="fa fa-times"></i>
						</a>
					</span>

					<h4 class="list-group-item-heading">
			        	<a href="/profiles/view/{profileId}" target="_blank"><b>{userName}</b></a><br/>
			        </h4>
			        <p>{profilePositionLabel}</p>

			        <small><i>Adicionado em {profileFolderItemAddedAt}</i></small>
			    </div>
			{/folderItems}
			</div>
		</div>
	</div>
</div>

<script>
function removeFolderItem(profileFolderItemId)	{
	
	var res = prompt('Type the following number to confirm the operation: ' + profileFolderItemId);

	if(res == profileFolderItemId)	{
		window.location.href = '/profiles/removeFromFolder/' + profileFolderItemId;
	}
}

function removeFolder(profileFolderId)	{
	
	var confirmDeletion = confirm('Are you sure you want to delete this folder? All items will be permanently lost! Additional confirmation will be required.');

	if(confirmDeletion)	{
		var res = prompt('Type the following number to confirm the operation: ' + profileFolderId);

		if(res == profileFolderId)	{
			window.location.href = '/profiles/removeFolder/' + profileFolderId;
		}
	}
}
</script>