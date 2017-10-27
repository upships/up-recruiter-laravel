<div class="row">
  	<div class="col-lg-12">
  		<div class="page-title">
	  		<h3>CIR e STCW</h3>
	  	</div>

	  	<div class="list-group">
		  	<div class="list-group-item">

				<div class="row">
					<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
						
						<div class="list-group">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Categorias CIR</h4>
							</div>
							<div class="list-group" >
								<div class="list-group-item">
						            <form method="post" action="/data/main/addBookType" role="form">
						                
									<div class="row" >
										<div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 m-b-10" >
						                    <input type="text" name="bookCategoryCode" class="form-control" placeholder="Código CIR" />
						                </div>
						                <div class="col-lg-3 col-md-5 col-xs-12 col-sm-12 m-b-10" >
						                    <input type="text" name="bookCategoryLabel" class="form-control" placeholder="Nome da categoria" />
						                </div>
						                <div class="col-lg-3 col-md-5 col-xs-12 col-sm-12 m-b-10" >
						                	<select name="bookCategoryDepartment" class="form-control">
						                		<option value="1">Conv&eacute;s</option>
						                		<option value="2">M&aacute;quinas</option>
						                		<option value="3">C&acirc;mara</option>
						                		<option value="4">Sa&uacute;de</option>
						                	</select>
						                </div>

						                <div class="col-lg-3 col-md-5 col-xs-12 col-sm-12 m-b-10" >
						                	<select name="bookCategoryType" class="form-control">
						                		<option value="1">Oficial</option>
						                		<option value="2">Guarni&ccedil;&atilde;o</option>
						                	</select>
						                </div>  

						                <div class="col-lg-2 col-md-3 col-xs-12 col-sm-12" >
											<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> CIR
											</button>
							            </div>
						            </div>
						        </form>
							</div>
								
							@foreach($seaman_book_types as $seaman_book)
								<a class="list-group-item" href="/data/main/bookCategory/{bookCategoryId}">
							        {bookCategoryFullLabel}
							        <br/>
							        <small><i>{bookCategoryDepartmentLabel}</i></small>
								</a>
							@endforeach
							</div>
						</div>
					</div>

					<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
						
						<div class="list-group">
							<div class="list-group-item">
								<h4 class="list-group-item-heading">Regras STCW</h4>
							</div>
							<div class="list-group" >
								<div class="list-group-item">
						            <form method="post" action="/data/main/addStcwRegulation" role="form">
						                
									<div class="row" >
						                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 m-b-10" >
						                	<select name="stcwRegulationChapter" class="form-control">
						                		<option>II</option>
						                		<option>III</option>
						                		<option>IV</option>
						                		<option>V</option>
						                		<option>VI</option>
						                		<option>VII</option>
						                		<option>VIII</option>
						                		<option>IV</option>
						                	</select>
						                </div>
						                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12 m-b-10" >
						                	<select name="stcwRegulationNumber" class="form-control">
						                		<option>1</option>
						                		<option>2</option>
						                		<option>3</option>
						                		<option>4</option>
						                		<option>5</option>
						                		<option>6</option>
						                		<option>7</option>
						                		<option>8</option>
						                		<option>9</option>
						                	</select>
						                </div>
						                <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12" >
											<button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Regra STCW
											</button>
							            </div>
						            </div>
						        </form>
							</div>
								
							{stcwRegulations}
								<a class="list-group-item" href="/data/main/stcwRegulation/{{$stcw_regulation->id}}">
							        {{$stcw_regulation->regulation}}
								</a>
							{/stcwRegulations}
							</div>
						</div>
					</div>					
				</div>

			</div>
		</div>
	</div>
</div>
