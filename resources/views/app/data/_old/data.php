<div class="row">
  <div class="col-lg-12"><h1>Gerenciamento de dados</h1></div>
</div>

<form method="post" action="<?php echo PATH;?>/manager/data/add_action" role="form" >
<div class="panel panel-default" >
	<div class="panel-heading" >
		<h3 class="panel-title" >Adicionar tipo de dado de emprego</h3>
	</div>
	<div class="panel-body" >
		<div class="row" >
			<div class="col-md-3" >
				<div class="form-group" >
					<label for='name'>Nome</label>
					<input type="text" class="form-control" name="name" placeholder="Nome" />
				</div>
			</div>
			<div class="col-md-3" >
				<div class="form-group" >
					<label for='label'>R&oacute;tulo</label>
					<input type="text" class="form-control" name="label" placeholder="R&oacute;tulo" />				
				</div>
			</div>
			<div class="col-md-3" >
				<div class="form-group" >
					<label for='type'>Tipo</label>
					<select name="type" class="form-control" >
						<option value="0">Text</option>
						<option value="1">Textarea</option>
					</select>
				</div>
			</div>
			<div class="col-md-3" >
				<div class="form-group" >
					<label for='extra'>Extra</label>
					<input type="text" class="form-control" name="extra" placeholder="Extra" />				
				</div>
			</div>
		</div>
	</div>
	<div class="panel-footer" >
		<button type="submit" class="btn btn-default btn-sm">Adicionar</button>
	</div>
</div>
</form>

<table class="table">
	<tr>
		<th>JIID</th>
		<th>Ordem</th>
		<th>Nome</th>
		<th>R&oacute;tulo</th>
		<th>&nbsp;</th>
	</tr>
	
	{jobs_info}	
	<tr>
		<td>{jiid}</td>
		<td>{ji_order}</td>
		<td>{ji_name}</td>
		<td>{ji_label}</td>
		<td>
			<div class="btn-group" >
				<a href="<?php echo PATH;?>/manager/data/edit/{jiid}" class="btn btn-default btn-xs" ><i class="icon-pencil" ></i></a>
				<a href="<?php echo PATH;?>/manager/data/delete/{jiid}" class="btn btn-warning btn-xs" ><i class="icon-remove" ></i></a>
			</div>
		</td>
	</tr>
	
	{/jobs_info}
</table>

<a href="<?php echo PATH;?>/manager/data/reorder" class="btn btn-sm btn-default" >Reordenar dados</a>
