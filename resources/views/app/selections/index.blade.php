<div class="row">
  	<div class="col-lg-12 col-md-12">

    	<div class="list-group" id='selectionsList'>
      		<div class="list-group-item">
      			<h2 class="list-group-item-heading">
      				Processos seletivos em aberto
      			</h2>
	  		</div>
	      	
        <div class="list-group-item" id='pageLoader'>
          <i class='fa fa-spinner fa-spin' ></i> Carregando dados
        </div>
      </div>
	</div>
</div>

<!-- templates -->
<script id="selectionsListTemplate" type="text/x-jsrender">

  <a href="/selection/view/{{:selectionId}}" class='list-group-item selections selection-status-{{:status}}' id='selection-{{:jobId}}'>
    <div class="row">
      <div class="col-lg-9">
        <h3>{{:selectionPositionLabel}}</h3>
        <ul class='list-inline' >
          <li>
             <i class="fa fa-calendar-o"></i> Em {{:selectionDate}}</li>
          </li>
        </ul>
      </div>
      <div class="col-lg-3">
        <h2>{{:selectionNumberOfApplicants}} <small>candidatos</small></h2>
      </div>
    </div>
  </a>
</script>

<script>

  window.currentselectionsPage = 0;

  $(document).ready(function(){

    var page = window.currentselectionsPage;

    console.log('Carregando vagas - página: ' + page);

    getOpenSelections('#selectionsList', '#pageLoader');

    $('#searchResultsMessage').hide();

  });
</script>