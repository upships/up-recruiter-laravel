<div style='page-break-after:always'></div>

<h3>Dados mar&iacute;timos</h3>

<div class="row">
	<div class="col-lg-12">
		<table class="table table-bordered">
			<tr>
				<th colspan="3">CIR</th>
			</tr>
			<tr>
				<th>N&uacute;mero</th>
				<th>Validade</th>
				<th>Categoria</th>
			</tr>
			<tr>
				<td>{{$seaman_book->number}}</td>
				<td>{{$seaman_book->expiration_date}}</td>
				<td>{{$seaman_book_type->code}}</td>
			</tr>
			<tr>
				<td colspan="3">
				Obs.: {bookRemarks}
				</td>
			</tr>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">	
		<table class="table table-bordered">
			<tr>
				<th colspan="3">STCW</th>
			</tr>
			<tr>
				<th>N&uacute;mero</th>
				<th>Validade</th>
				<th>Regras</th>
			</tr>
			<tr>
				<td>{{$profile->coc->number}}</td>
				<td>{{$profile->coc->expiration_date}}</td>
				<td>{cocRegulationsInline}</td>
			</tr>
			<tr>
				<td colspan="3">Obs.: {cocRemarks}</td>
			</tr>
		</table>
	</div>
</div>