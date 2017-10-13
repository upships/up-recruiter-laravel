<div class="row">
  	<div class="col-lg-12">
		<div class="page-title">
			<h2>Editar categoria CIR</h2>
		</div>

		<div class="panel panel-default">
			<div class="pabel-body">
		        <form method="post" action="/data/main/editBookCategoryAction" role="form">
		            <input type="hidden" name="bookCategoryId" value="{bookCategoryId}" >

		            <div class="form-group">
		            	<label for='bookCategoryCode' >Sigla</label>
		                <input type="text" name="bookCategoryCode" class="form-control" placeholder="Código CIR" value="{{$seaman_book_type->code}}" />
		            </div>

		            <div class="form-group">
		            	<label for='bookCategoryLabel' >Nome</label>
		                <input type="text" name="bookCategoryLabel" id="bookCategoryLabel" class="form-control" placeholder="Nome da categoria" value="{bookCategoryLabel}" />
		            </div>


		            <div class="form-group">
		            	<label for='bookCategoryDepartment' >Departamento</label>
		            	<select name="bookCategoryDepartment" id="bookCategoryDepartment" class="form-control">
		            		<option value="1">Conv&eacute;s</option>
		            		<option value="2">M&aacute;quinas</option>
		            		<option value="3">C&acirc;mara</option>
		            		<option value="4">Sa&uacute;de</option>
		            	</select>
		            </div>

		            <div class="form-group">
		            	<label for='bookCategoryType' >Tipo</label>
		            	<select name="bookCategoryType" id="bookCategoryType" class="form-control">
		            		<option value="1">Oficial</option>
		            		<option value="2">Guarni&ccedil;&atilde;o</option>
		            	</select>
		            </div>

		            <div class="form-group">
						<button type="submit" class="btn btn-primary">
							<i class="fa fa-save" ></i> Salvar altera&ccedil;&otilde;es
						</button>
					</div>
		    	</form>
		    </div>
		</div>
	</div>
</div>

<script>
$(document).ready(function()
	{
		var bookCategoryDepartment = '{bookCategoryDepartment}';
		var bookCategoryType = '{bookCategoryType}';

		if(bookCategoryDepartment !== undefined && bookCategoryDepartment != '')
		{
			$('#bookCategoryDepartment option[value="' + bookCategoryDepartment + '"]').attr('selected','selected');
		}
		
		if(bookCategoryType !== undefined && bookCategoryType != '')
		{
			$('#bookCategoryType option[value="' + bookCategoryType + '"]').attr('selected','selected');
		}
	});

</script>