<div class="row">
  <div class="col-lg-12">
      <h2>Editar Posi&ccedil;&atilde;o</h2>
    </div>
</div>

<form method="post" action="/data/positions/editAction" role="form" enctype="multipart/form-data">

    <input type="hidden" name="positionId" value="{positionId}" >
    <div class="row" >
        <div class="col-lg-8 col-md-8 col-sm-12" >
        
            <ul class="list-group" >
                <li class="list-group-item" >
                    <div class="form-group">
                        <positionLabel for='positionLabel'>Nome da fun&ccedil;&atilde;o</positionLabel>
                        <input type="text" name="positionLabel" id="positionLabel" class="form-control" placeholder="Nome da posi&ccedil;&atilde;o" value="{positionLabel}" />
                    </div>

                    <div class="form-group">
                        <positionLabel for='positionEnglishLabel'>Nome da fun&ccedil;&atilde;o em Ingl&ecirc;s</positionLabel>
                        <input type="text" name="positionEnglishLabel" id="positionEnglishLabel" class="form-control" placeholder="Nome da fun&ccedil;&atilde;o em ingl&ecirc;s" value="{positionEnglishLabel}" />
                    </div>                    
                </li>
                <li class="list-group-item" >
                    <div class="form-group" >
                        <positionLabel for="positionImage" >Imagem</positionLabel>
                        <input type="file" name="positionImage" class="form-control" />
                    </div>
                </li>        
                <li class="list-group-item" >
                   <button type="submit" class="btn btn-success"><i class="icon-floppy-disk" ></i> Salvar</button> 
                   <a href="/data" class="btn btn-default" >Cancelar</a>

                   <a href="/data/deleteposition/{positionId}" class="btn btn-warning pull-right" >Excluir</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12" >
            <h4>Imagem atual</h4>
            
            <img src="//vagasembarcado.upships.com/_images/jobs/{positionImage}" class="img-responsive" >
        </div>
    </div>
            
</form>
