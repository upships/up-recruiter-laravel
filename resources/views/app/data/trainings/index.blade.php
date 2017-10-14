<div class="row">
	<div class="col-lg-12">

		<div class="list-group">
			<div class="list-group-item">
				<h3 class="list-group-item-heading">Cursos</h3>
			</div>
			<div class="list-group-item">
				<form method="post" action="/data/trainings/addAction" role="form">						
                   <div class="row" >
                        <div class="col-lg-4 col-md-4 col-sm-4" >
                            <input type="text" name="label" class="form-control" placeholder="Sigla ou nome do curso" />
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5" >
                            <input type="text" name="description" class="form-control" placeholder="Descri&ccedil;&atilde;o" />
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3" >
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Adicionar curso</button>
                        </div>
                   </div>
				</form>
			</div>
			<div class="list-group-item" >
				<div class="row">
					<div class="col-lg-6 col-md-8 col-sm-12">
						<div class="list-group">
				            @foreach($trainings as $training)
		                    <a href="/data/trainings/edit/{{$training->id}}" class="list-group-item" >
								(PT) {{$training->label}} - {{$training->description}} <br/>
								(EN) {trainingEnglishLabel} - {trainingEnglishDescription}
							</a>
						@endforeach
				        </div>
				   	</div>
				</div>
		    </div>
		</div>
	</div>
</div>