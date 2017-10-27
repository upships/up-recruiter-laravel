<p>Prezados,</p>

<p>Envio meu curr&iacute;culo para an&aacute;lise.</p>

<p>Abaixo, segue um breve resumo das minhas qualifica&ccedil;&otilde;es profissionais, cursos e certificados.</p>

<h4>Dados Pessoais</h4>

<ul>
	<li>Nome completo: {{$profile->name}}</li>
	<li>Celular: {{$profile->phone}}</li>
	<li>Sexo: {{$profile->gender_label}}</li>
	<li>Nascimento: {{$profile->birthday}}</li>
	<li>Resid&ecirc;ncia: {profileLocation}</li>
</ul>

<h4>Educa&ccedil;&atilde;o e Certificados</h4>

<ul>
	{certificates}
	<li>
		<p><b>{certificateLabel}</b> - {certificateDescription}</p>
		Validade: {certificateExpires}
	</li>
	{/certificates}

	{education}
		<li>
			<p>{educationLabel}</p>
			{educationDescription}
		</li>
	{/education}
</ul>

<h4>Experi&ecirc;ncia Profissional</h4>

<ul>
	{works}
	<li>
		<p><b>{workPosition}</b> ({workDurationMonths} meses)</p>
		<ul>
			<li>Per&iacute;odo: {workStartDate} to {workEndDate}</li>
			<li>Empresa: {workCompanyName}</li>
			{workShipTypeLabelPrintable}
			{workShipNamePrintable}
		</ul>
	</li>
	{/works}
</ul>