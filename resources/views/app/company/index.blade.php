<div class="row">
    <div class="col">
        <div class="bg-picture" style="background-image:url('{companyImageFull}')">
          <span class="bg-picture-overlay"></span><!-- overlay -->
          <!-- meta -->
          <div class="box-layout meta bottom">
            <div class="col-sm-6 clearfix">
              <span class="img-wrapper float-left m-r-15"><img src="{companyLogoThumbFull}" alt="" style="width:64px" class="br-radius"></span>
              <div class="media-body">
                <h2 class="text-white mb-2 m-t-10 ellipsis">{companyName}</h2>
              </div>
            </div>
            <div class="col-sm-6">
            
              

            </div>
          </div>
          <!--/ meta -->
        </div>
    </div>
</div>

<div class="row m-t-30">
    <div class="col-sm-12">
        <div class="panel panel-default p-0">
            <div class="panel-body p-0"> 
                <ul class="nav nav-tabs profile-tabs">
                    <li class="active"><a data-toggle="tab" href="#about">Informa&ccedil;&otilde;es</a></li>
                    <li class=""><a data-toggle="tab" href="#log">Registro de Atividades</a></li>
                    <li class=""><a data-toggle="tab" href="#recruiters">Recrutadores</a></li>
                    <li class=""><a data-toggle="tab" href="#settings">Configura&ccedil;&otilde;es</a></li>
                </ul>

                <div class="tab-content m-0"> 

                    <div id="about" class="tab-pane active">
                    	<h1>Informa&ccedil;&otilde;es da empresa</h1>
						<ul class="list-inline">
					  		<li>
					  			<a href="https://vagasembarcado.upships.com/companies/view/{companyId}" class="btn btn-custom btn-default" target="_blank">Ver no VagasEmbarcado <i class='fa fa-external-link' ></i></a>
					  		</li>
					  		<li>
					  			<a href="/company/edit/{companyId}" class="btn btn-custom btn-default"><i class="fa fa-edit"></i> Editar Informa&ccedil;&otilde;es</a> 
					  		</li>
					  		<li>
					  			<a href="/company/editLogo" class="btn btn-custom btn-default"><i class="fa fa-picture-o"></i> Alterar logo &amp; imagem</a>
					  		</li>
					  	</ul>

					  	<hr/>

                    	<div class="profile-desk">
                            <h3>Texto introdut&oacute;rio</h3>
                            
                            <p>
                                {companyInfo}
                            </p>

                            <a href="/company/edit">Editar</a>

                            <h3>Informa&ccedil;&otilde;es de contato</h3>

                    
                            <table class="table table-condensed">
                                <tbody>
                                	<tr>
                                        <td><b>ID</b></td>
                                        <td class="ng-binding">
                                            {companyId}
										</td>
                                    </tr>
                                    <tr>
                                        <td><b>Site</b></td>
                                        <td>
                                        <a href="{companySite}" target="_blank" class="ng-binding">
                                            {companySite}
                                        </a></td>
                                    </tr>
                                    <tr>
                                        <td><b>Email principal</b></td>
                                        <td class="ng-binding">
                                            {companyEmail}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Telefone principal</b></td>
                                        <td class="ng-binding">{companyPhone}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Localiza&ccedil;&atilde;o</b></td>
                                        <td class="ng-binding">{companyLocation}</td>
                                    </tr>
                                </tbody>
                            </table>		                        	
                    	</div> <!-- end profile-desk -->
                	</div> <!-- about-me -->


                    <!-- Activities -->
                    <div id="log" class="tab-pane">
                    	<h3 class="text-muted">Em breve</h3>
                    </div>

                    <!-- Recruiters -->
                    <div id="recruiters" class="tab-pane">
						<h1>Recrutadores</h1>

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

                    </div>

                    <!-- Settings -->
                    <div id="settings" class="tab-pane">
                    	<h3>LinkedIn &amp; Facebook</h3>

                    </div>
                </div>
 
            </div> 
        </div>
    </div>
</div>

<script>
// Render company Information
$(function()
{

});

</script>
