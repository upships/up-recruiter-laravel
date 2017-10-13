<div class="row">
  <div class="col-lg-12">
      <h1>Editar Curso</h1>
    </div>
</div>

<form method="post" action="/data/main/edittraining_action" role="form">
    <input type="hidden" name="trainingId" value="{trainingId}" >
    <ul class="list-group" >
        <li class="list-group-item" >
            <input type="text" name="label" class="form-control" value="{trainingLabel}" />
        </li>
        <li class="list-group-item" >
            <input type="text" name="description" class="form-control" value="{trainingDescription}" />
        </li>    
        <li class="list-group-item" >
            <button type="submit" class="btn btn-success"><i class="icon-floppy-disk" ></i>Salvar</button> 
            <a href="/data/main" class="btn btn-default" >Cancelar</a> 
            <a href="/data/main/deletetraining/{trainingId}" class="btn btn-warning pull-right" >Excluir</a>
        </li>
    </ul>    
</form>

