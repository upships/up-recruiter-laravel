<div class="row">
  <div class="col-lg-12">
      <h2>Editar Posi&ccedil;&atilde;o</h2>
    </div>
</div>

<form method="post" action="/data/main/editposition_action" role="form" enctype="multipart/form-data">

    <input type="hidden" name="positionId" value="{{$position->id}}" >
    <div class="row" >
        <div class="col-lg-8 col-md-8 col-sm-12" >
        
            <ul class="list-group" >
                <li class="list-group-item" >
                    <input type="text" name="label" class="form-control" placeholder="Nome da posi&ccedil;&atilde;o" value="{{$position->label}}" />
                </li>
                <li class="list-group-item" >
                    <div class="form-group" >
                        <label for="image" >Imagem</label>
                        <input type="file" name="image" class="form-control" />
                    </div>
                </li>        
                <li class="list-group-item" >
                   <button type="submit" class="btn btn-success"><i class="icon-floppy-disk" ></i> Salvar</button> 
                   <a href="/data" class="btn btn-default" >Cancelar</a>

                   <a href="/data/main/deleteposition/{{$position->id}}" class="btn btn-warning float-right" >Excluir</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12" >
            <h4>Imagem atual</h4>
            
            <img src="//cdn.upships.com/_images/job/{positionImage}" class="img-responsive" >
        </div>
    </div>
            
</form>
