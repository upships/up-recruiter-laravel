	<h1>Recruiters</h1>

	<div class="list-group">
		{recruiters}
		<div class="list-group-item">
		  <ul class="list-inline">
		  	<li>
		  		<a href="#">
		  			<img src="{recruiterPhoto}" class="img-circle logo-40">
		  		</a>
		  	</li>
			<li>
		  		<a href="#">
		  			{recruiterName}
		  		</a>
		  		<br>
		  		<small>
		  			{recruiterEmail} 
		  			<a href="/company/removeRecruiter/{recruiterUid}"><i class="fa fa-times"></i> Remover</a>
		  		</small>
		  		
		  	</li>
		  </ul>
		</div>
		{/recruiters}
	</div>

	<h3>Adicionar recrutador</h3>

	<form method="post" action="/company/addRecruiter" >
		<input type="hidden" name="companyId" value="{companyId}" />
		
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-" >
				<div class="form-group" >
					
					<input type="companyEmail" class="form-control" name="companyEmail" placeholder="Email - usu&aacute;rio j&aacute; deve existir!" />
				</div>
			</div>
			<div class="col-md-4" >
				<button type="submit" class="btn btn-default"><i class="fa fa-plus" ></i> Adicionar</button>
			</div>
		</div>
	</form>