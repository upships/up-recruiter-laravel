<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="Curr&iacute;culo de {fullName}">
		<meta name="author" content="VagasEmbarcado.com">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Currículo - {{$profile->position->label}} - {{$profile->name}}</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<script src="https://use.fontawesome.com/29f19362d2.js"></script>

		<style type="text/css">
			.table td, th
			{
				padding: 5px;
			}

			.text-center
			{
				text-align: center;
			}
		</style>
	</head>
	<body>
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<div class="text-center">
						<h2>{{$profile->name}}</h2>
						<h4>{{$profile->position->label}}</h4>

						<hr/>

						Celular: {{$profile->phone}} &middot; 
						E-mail: {{$profile->user->email}} &middot; 
						{{$profile->city}} - {{$profile->state}}

						<hr/>

					</div>
					
					{{$profile->introduction}}

				</div>
			</div>

			<h3>Dados Pessoais</h3>

			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered">
						<tr>
							<th>Nascimento</th>
							<th>Sexo</th>
							<th>Nacionalidade</th>
							<th>Est. Civil</th>
						</tr>
						<tr>
							<td>{{$profile->birthday}}</td>
							<td>{{$profile->gender_label}}</td>
							<td>{{$profile->country_of_nationality->country->name}}</td>
							<td>{{$profile->marital_status_label}}</td>							
						</tr>
						<tr>
							<th>Passporte</th>
							<th>Validade</th>
							<th colspan="2">Febre amarela</th>
						</tr>
						<tr>
							<td>{{$passport->number}}</td>
							<td>{{$passport->expiration_date}}</td>
							<td colspan="2">
								Validade {profileYellowFeverExpires}
							</td>
						</tr>						
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<table class="table table-bordered">
						<tr>
							<th>Ingl&ecirc;s</th>
							<td>{profileEnglishLevelLabel}</td>
						</tr>
					</table>
				</div>
			</div>

			{certificates}

			{education}
			
			{works}

			{extras}

			{seafarer}

			{dp}
						
		</div>
	</body>
</html>