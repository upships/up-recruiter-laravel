<div class="row">
  	<div class="col-lg-12 col-md-12">

    	<div class="list-group" id='crewMembers'>
      		<div class="list-group-item">
      			<h2 class="list-group-item-heading">
      				Tripula&ccedil;&atilde;o {crewListLabel}
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
<script id="crewMembersTemplate" type="text/x-jsrender">

  <a href="/crews/member/{{:crewMemberCode}}" class='list-group-item crewMembers' id='crewMember-{{:crewMemberCode}}'>
    <h3>{{:userName}}</h3>
    <ul class='list-inline' >
      <li>{{:profilePositionLabel}}</li>
      <li>Entrou em {{:joinDate}}</li>
    </ul>
  </a>
</script>

<script>

  var currentPage = 0;

  $(document).ready(function(){

    getCrewMembers('{crewListCode}','#crewMembers', '#pageLoader');

    $('#searchResultsMessage').hide();

  });
</script>