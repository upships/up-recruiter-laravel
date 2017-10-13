<div class="row">
	<div class="col-lg-12" id="salaries">
		
		<h3>Pretens&otilde;es salariais</h3>

		<div class="list-group m-b-5">
			<div class="list-group-item" >
				<input class="search form-control" placeholder="Filtrar por funções.." />
			</div>
		</div>

		<div class="list-group list">
            {salaries}
            <div class="list-group-item" >
            	<h4 class="positionLabel">{positionLabel}</h4>

				<ul class="list-inline clearfix">
					
				    <li class="lead">
					    R$ {averageMean}
				    </li>
				    <li class="text-muted">
					    <small>De R$ {lowerMean} a R$ {higherMean}</small>
				    </li>
				</ul>
			</div>
            {/salaries}
		</div>
    </div>
</div>

<script>
$(function()
	{
			var options = {
		    	valueNames: [ 'positionLabel' ]
			};

			var filteredList = new List('salaries', options);
	});
</script>