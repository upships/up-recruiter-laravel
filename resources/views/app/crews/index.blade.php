<div class="row">
  	<div class="col">

    	<div class="list-group" id='crewsList'>
      		<div class="list-group-item">
      			<h2 class="list-group-item-heading">
      				Tripula&ccedil;&otilde;es
      			</h2>
	  		</div>
	      	
        <div class="list-group-item" id='pageLoader'>
          <i class='fa fa-spinner fa-spin' ></i> Carregando dados
        </div>
      </div>
	</div>
</div>

<script src='/_includes/js/crews.js' ></script>

<!-- template -->
<script id="crewsListTemplate" type="text/x-jsrender">

  <a href="/crews/view/{{:crewListCode}}" class='list-group-item crews' id='crewList-{{:crewListCode}}'>
    <h3>{{:crewListLabel}}</h3>
    <ul class='list-inline' >
      <li><b>{{:crewMembersCount}}</b> tripulantes</li>
    </ul>

    <small class="text-muted">Criada em {{:createdAt}}</small>
  </a>
</script>

<script>

  var currentPage = 0;

  $(document).ready(function(){

    getCrews('#crewsList', '#pageLoader');

    $('#searchResultsMessage').hide();

  });
</script>