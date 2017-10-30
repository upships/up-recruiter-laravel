<div class="row">
    <div class="col">

        <h3>About the company</h3>

        <div class="my-2">
            <a href="/company/edit" class="btn btn-default" >Edit information</a>
        </div>

        <div class="card card-default no-padding">
            <div class="d-flex align-content-start">
                <div class="m-3">
                    <img src="{{$company->logo_path}}" style="width: 80px;" >
                </div>
                <div>
                    <h4>{{$company->name}}</h4>

                    <div class="d-flex align-content-start">
                        <a href="//{{$company->url}}" target="_blank" class="m-2 btn btn-default btn-sm btn-rounded">
                            Open Main Site <i class="fa fa-external-link"></i>
                        </a>

                        <a href="//{{$company->careers_url}}" target="_blank" class="m-2 btn btn-default btn-sm btn-rounded">
                            Open Careers Page <i class="fa fa-external-link"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <div class="card-card-default">
            <div class="row">
                
                <div class="col">

                    <h5>Offices</h5>

                    @foreach($company->offices as $office)
                        
                        <div class="list-group list-group-flush my-2">

                            <div class="list-group-item">
                                <h5>{{$office->label}}</h5>
                                {{$office->location}}
                            </div>

                            <div class="list-group-item">
                                <h6>Phones</h6>

                                <ul>
                                    @foreach($office->phones as $phone)
                                    <li>{{$phone->label}} - {{$phone->number}}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="list-group-item">
                                <h6>E-mails</h6>

                                <ul>
                                    @foreach($office->emails as $email)
                                    <li>{{$email->label}} - {{$email->address}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    @endforeach
                </div>

                <div class="col">

                    <h5>Other e-mails</h5>

                    <div class="list-group list-group-flush my-2">

                        <div class="list-group-item">
                            <h5>{{$office->label}}</h5>
                            {{$office->location}}
                        </div>
                    </div>

                </div>

                <div class="col">

                    <h5>Other phones</h5>
                    
                </div>

            </div>
        </div>
    </div>
</div>



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