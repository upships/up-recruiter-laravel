<!-- carrega os scripts necessarios -->
<script src="<?php echo PATH ;?>/_includes/jqueryui/jquery-ui.js"></script>
<link rel="stylesheet" href="<?php echo PATH ;?>/_includes/jqueryui/jquery-ui.css">
		

<!-- configura os estilos -->

	<style type="text/css">
	
	</style>

<!-- carrega a função -->

<script type="text/javascript">
	$(function() {
		$("#sortable").sortable();
		$("#sortable").disableSelection();
	});
	</script>


  <a href="<?php echo PATH ;?>/manager/data" class="btn btn-sm btn-default" >Cancelar</a>
  
<p><i>Clique no item desejado e arraste-o at&eacute; a posi&ccedil;&atilde;o desejada.</i></p>

<form method="post" action="<?php echo PATH ;?>/manager/data/reorder_action" >

<ul id="sortable" class="list-group">

{opcoes}
	<li class="list-group-item" >
		{label}		
		<input type='hidden' name='dados[]' value='{jiid}' >
		</li>
	</li>
{/opcoes} 

</ul>

<p><input type="submit" value="Reordenar os Dados"  class='btn' /></p>

</form>
