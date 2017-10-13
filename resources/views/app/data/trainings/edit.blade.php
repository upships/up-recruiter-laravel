<div class="row">
  <div class="col-lg-12">
      <h1>Editar Curso</h1>
    </div>
</div>

<form method="post" action="/data/trainings/editAction" role="form">

    <input type="hidden" name="trainingId" value="{{$training->id}}" >
    <ul class="list-group" >
        <li class="list-group-item" >
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for='label'>Sigla do curso</label>
                        <input type="text" name="label" id="label" class="form-control" value="{{$training->label}}" />
                    </div>
                    <div class="form-group">
                        <label for='description'>Nome do curso</label>
                        <input type="text" name="description" id="description" class="form-control" value="{{$training->description}}" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for='englishLabel'>Sigla do curso em ingl&ecirc;s</label>
                        <input type="text" name="englishLabel" id="englishLabel" class="form-control" value="{trainingEnglishLabel}" />
                    </div>
                    <div class="form-group">
                        <label for='englishDescription'>Nome do curso em ingl&ecirc;s</label>
                        <input type="text" name="englishDescription" id="englishDescription" class="form-control" value="{trainingEnglishDescription}" />
                    </div>
                </div>
            </div>
        </li>    
        <li class="list-group-item" >
            <button type="submit" class="btn btn-success"><i class="icon-floppy-disk" ></i>Salvar</button> 
            <a href="/manager/system" class="btn btn-default" >Cancelar</a> 
            <a href="/manager/system/deletetraining/{{$training->id}}" class="btn btn-warning float-right" >Excluir</a>
        </li>
    </ul>    
</form>

