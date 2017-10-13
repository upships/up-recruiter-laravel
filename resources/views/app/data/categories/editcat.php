<div class="row">
  <div class="col-lg-12">
      <h1>Editar Categoria</h1>
    </div>
</div>

<form method="post" action="<?php echo PATH;?>/manager/system/editcat_action" role="form">
    <input type="hidden" name="categoryId" value="{categoryId}" >
    <ul class="list-group" >
        <li class="list-group-item" >
            <input type="text" name="label" class="form-control" value="{categoryLabel}" />
        </li>
        <li class="list-group-item" >
            <button type="submit" class="btn btn-success"><i class="icon-floppy-disk" ></i>Salvar</button> 
            <a href="/manager/system" class="btn btn-default" >Cancelar</a> 
            <a href="/manager/system/deletecat/{categoryId}" class="btn btn-warning float-right" >Excluir</a>
        </li>
    </ul>    
</form>

