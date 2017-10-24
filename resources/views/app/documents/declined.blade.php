<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="Curr&iacute;culo de {fullName}">
		<meta name="author" content="VagasEmbarcado.com">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Documento Recusado - VagasEmbarcado.com</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>
	<body>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h3>Documento recusado</h3>
					Processo seletivo para {{$selection->label}} na empresa {companyName}

					<hr/>

					{recruiterMessage}
					
					<hr/>

					<a href="//vagasembarcado.upships.com/recruiting/addDocuments/{receivedDocumentAccessKey}" class="btn btn-lg btn-primary" >Clique aqui para enviar novamente</a>
					
					<hr/>
					Esta mensagem foi enviada via <a href="//vagasembarcado.upships.com" >VagasEmbarcado.com</a>
				</div>
			</div>
		</div>

	</body>
</html>