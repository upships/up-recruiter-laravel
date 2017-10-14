<div style='page-break-after:always'></div>

<h3>Experi&ecirc;ncia Profissional</h3>

<div class="row">
	<div class="col-lg-12">
		<table class="table table-bordered">
			<tr>
				<th>Fun&ccedil;&atilde;o</th>
				<th>Empresa</th>
				<th>Embarca&ccedil;&atilde;o</th>
				<th>In&iacute;cio</th>
				<th>T&eacute;rmino</th>
			</tr>
			{works}
			<tr>
				<td rowspan="2">
					{{$position->label}}
				</td>
				<td rowspan="2">
					{companyName}
				</td>
				<td rowspan="2">
					{workShipTypeLabel} {workShipName}
				</td>
				<td>
					{workStartDate}
				</td>
				<td>
					{workEndDate}
				</td>
			</tr>
			<tr>
				<td colspan="2">
					{workDuration}
				</td>
			</tr>
			{/works}
		</table>

	</div>
</div>