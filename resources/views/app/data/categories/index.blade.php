<div class="row">
  	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

	  	<div class='card'>
		  	<div class="header">
		  		<h4 class="title">Categorias</h4>
		  	</div>
		  	<div class="content">
		        <div class="list-group" >

					<div class='list-group-item' >
						<form method="post" action="/data/main/addcat" role="form">
							<div class="input-group">
								<input type="text" name="label" class="form-control" placeholder="Nome da categoria" />
								<span class='input-group-btn'>
									<button type="submit" class="btn btn-default"><i class="fa fa-plus" ></i></button>
								</span>
							</div>
						</form>
					</div>

		            {categories}
		            <a href='#loadCat-{categoryId}' onclick="loadCategory('{categoryId}',true)" class="list-group-item categories category-{categoryId}">{categoryLabel} <i class='fa fa-arrow-right pull-right' ></i></a>
		            {/categories}		            
		    	</div>

			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id=''>

		<div class="list-group" id='loadCategoryHere'>
			<a href="#addPosition" class="list-group-item" id='addPositionTrigger'>
				<i class='fa fa-plus'></i> Adicionar posi&ccedil;&atilde;o <i class='fa fa-arrow-right pull-right' ></i>
			</a>
			<div class="list-group-item" id='categoryEditor'>
				<ul class="list-inline">
					<li>
						<a href="#deleteCategory" onclick="deleteCurrentCategory()"><i class='fa fa-times'></i> Excluir</a>
					</li>
					<li>
						<a href="#editCategory" onclick="editCurrentCategory()"><i class='fa fa-pencil-square-o'></i> Editar</a>
					</li>				
				</ul>
			</div>
			
			<div class="list-group-item" id='welcomeMessage'>
				<i class='fa fa-info-circle'></i> <span id='welcomeMessageText' >Selecione uma categoria</span>
			</div>
			<div class="list-group-item" id='categoryLoadingMessage'>
				<i class='fa fa-spinner fa-spin'></i> Carregando
			</div>

		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" id=''>
		<div class="list-group" id='loadPositionsHere'>
			<div class="list-group-item" id='positionsSearch' >
				<input type='text' name='positionsSearchInput' id='positionsSearchInput' class="form-control" placeholder='Pesquisar' >
			</div>
			<div class="list-group-item" id='positionsFilter' >
				<ul class="list-inline">
					<li>
					<button type="button" class="btn btn-default btn-sm" id='positionsFilterButton' onclick="togglePositionsWithCategory()" ><i class='fa fa-tags'></i> Sem categoria</button>
					</li>
				</ul>
			</div>
			<div class="list-group-item" id='positionsLoadingMessage'>
				<i class='fa fa-spinner fa-spin'></i> Carregando
			</div>
		</div>
	</div>	
</div>

<script id="categoryPositionsListTemplate" type="text/x-jsrender">
	<div class='list-group-item categoryPositions' id='category-{{:categoryId}}'>
		<a class='pull-right' href='#' onclick='removeFromCategory({{:positionId}})'>
		<i class='fa fa-times'></i></a>
		{{:positionLabel}}
	</div>
</script>

<script id="positionsListTemplate" type="text/x-jsrender">
	<a class='list-group-item positions position-category-{{:positionCatId}}' id='position-{{:positionId}}' href='#addToCategory' onclick='addPositionToCategory({{:positionId}})'>	
		{{:positionLabel}}

		{{if positionCategoryLabel}}
			<br>
			<small class='text-success'>Atual: {{:positionCategoryLabel}}</small>
		{{/if}}
	</a>
</script>

<script>

window.selectedCat = null;
window.showPositionsWithCategory = true;

function loadCategory(categoryId,shouldClearPositions)
{
	$('.categories').removeClass('active');
	$('.category-' + categoryId).addClass('active');
	$('.categoryPositions').remove();
	$('#categoryEditor').show();

	$.getJSON('/api/categories/categoryPositions/' + categoryId, function(data)
		{
			var categoryLabel = data.categoryLabel;
			var categoryPositions = data.categoryPositions;

			if(data.total > 0)
			{
			    var template = $.templates("#categoryPositionsListTemplate");
			    var htmlOutput = template.render(data.items);
			    $("#loadCategoryHere").append(htmlOutput);
			    $('#welcomeMessage').hide();
			}
			else
			{
				$('#welcomeMessage').show();
				$('#welcomeMessageText').text('Nenhuma posição para esta categoria');
			}

		}).done(function(){	
			window.selectedCat = categoryId;
			$('#addPositionTrigger').show();

			if(shouldClearPositions !== false)
			{
				clearPositions();
			}

			window.showPositionsWithCategory = true;
		});
}

function addPositionToCategory(positionId)
{
	var categoryId = window.selectedCat;
	$('#categoryLoadingMessage').show();

	$.getJSON('/api/positions/changeCategory/' + positionId + '/' + categoryId, function(response)
	{
		if(response.error === false)
		{
			$('#position-' + positionId).remove();
		}
	}).done(function()
	{
		$('#categoryLoadingMessage').hide();
		loadCategory(categoryId,false);
	});
}

// Limpa as posições da lista
function clearPositions()
{
	$('.positions').remove();
	$('#loadPositionsHere').hide();
}

// Carrega as posições para serem adicionadas às categorias
function listPositions()
{
	// Exibe as mensagens de "carregando"
	$('#positionsLoadingMessage').show();
	$('#loadPositionsHere').show();

	$.getJSON('/api/positions/index', function(data)
	{
		if(data.total > 0)
		{
		    var template = $.templates("#positionsListTemplate");
		    var htmlOutput = template.render(data.items);
		    $("#loadPositionsHere").append(htmlOutput);

		    // Esconde a mensagem de "carregando"
		    $('#positionsLoadingMessage').hide();

		    // Exibe barra de pesquisa e botão de filtragem de posições com/sem categoria
		    $('#positionsSearch').show();
		    $('#positionsFilter').show();

		    // Remove as posições pertencentes à categoria selecionada
		    $('.position-category-' + window.selectedCat).remove();
		}
	});	
}

// Exibe/esconde posições com categorias já definidas
function togglePositionsWithCategory()
{
	var showPositionsWithCategory = window.showPositionsWithCategory;

	switch(showPositionsWithCategory)
	{
		case true: // it's showing, so hide them
			$('.positions').not('.position-category-0').hide();
			$('#positionsFilterButton').toggleClass('active');

			window.showPositionsWithCategory = false;
		break;
		case false:
			$('.positions').not('.position-category-0').show();
			$('#positionsFilterButton').toggleClass('active');
			window.showPositionsWithCategory = true;
		break;
	}
}

function deleteCurrentCategory()
{
	var confirmationCommand = prompt('Digite EXCLUIR para confirmar');
	var selectedCat = window.selectedCat;

	if(confirmationCommand != null)
	{
		console.log('Comando confirmado, removendo categoria');

		$.getJSON('/api/categories/delete/' + window.selectedCat, function(response)
			{
				if(response.error === false)
				{
					$('.category-' + selectedCat).remove();
					startPage();
				}				
			});
	}

}

$('#addPositionTrigger').on('click', function()
	{
		listPositions();
	});

function startPage()
{
	$('#positionsLoadingMessage').hide();
	$('#categoryLoadingMessage').hide();
	$('#addPositionTrigger').hide();
	$('#positionsSearch').hide();
	$('#positionsFilter').hide();
	$('#categoryEditor').hide();
}

$(document).ready(function()
{
	startPage();
});
</script>