<div class="row">
	<div class="col-lg-12 col-md-12">

      <form method="post" action="/jobs/disableInBatch">
    	<div class="list-group" id='jobsList'>
    		<div class="list-group-item">
    			<h2 class="list-group-item-heading">
    				Vagas em aberto
    			</h2>
    		</div>
        	
        <div class="list-group-item">
          <ul class="list-inline">
            <li><a href="/jobs/add" class="btn btn-success"><i class="fa fa-plus"></i> Nova vaga</a></li>
            <li class="pull-right">
              <a href="/jobs/disabled" class="btn btn-default"><i class="fa fa-eye-slash"></i> Vagas inativas</a>
            </li>
          </ul>
        </div>
        <!-- <div class="list-group-item">
          <div class="row form-group">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
              <a href="/jobs/add" class="btn btn-primary btn-block" >
                <i class="fa fa-plus" ></i> Nova vaga
              </a>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
              <div class="input-group">
                  <input class="form-control" type="text" name="search" id='jobsSearch' placeholder='Pesquisar' >
                  <span class='input-group-btn'>
                    <button type='button' id='jobsSearchBtn' class='btn btn-default'><i class='fa fa-search'></i></button>
                  </span>
                </div>
            </div>
          </div>
        </div> -->
        <div class="list-group-item" id='pageLoader'>
          <i class='fa fa-spinner fa-spin' ></i> Carregando dados
        </div>
        <div class="list-group-item" id='searchResultsMessage'>
          <i class='fa fa-info-circle' ></i> Nenhum resultado encontrado
        </div>
      </div>

      <div class="text-right m-t-10 m-b-10" >
        <button type="submit" class="btn btn-warning btn-sm" >Desativar vagas selecionadas</button>
      </div>
    </form>
  </div>
</div>

      <!-- templates -->
<script id="jobsListTemplate" type="text/x-jsrender">

  <div class='list-group-item jobs job-jobStatus-{{:jobStatus}}' id='jobItem-{{:jobId}}'>

  	<ul class='list-inline pull-right' >
  		<li>
  			<a href='/jobs/share/{{:jobId}}' class="btn btn-default btn-sm" ><i class='fa fa-share' ></i> Compartilhar</a>
  		</li>  	
  		<li>
	  		<div class='dropdown' >
	  			<a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
	  				<i class='fa fa-cog fa-lg'></i> <span class="caret"></span>
	  			</a>
	  			<ul class='dropdown-menu dropdown-menu-right' >
            <li><a href='/jobs/conclude/{{:jobId}}'><i class='fa fa-pencil-square-o'></i> Iniciar processo</a></li>
            <li role="separator" class="divider"></li>
		        <li><a href='/jobs/edit/{{:jobId}}'><i class='fa fa-pencil-square-o'></i> Editar</a></li>
		        <!--
		        <li role="separator" class="divider"></li>
		        <li><a href="#" onclick="toggleJobStatus('{{:jobId}}')" ><i class='fa fa-eye-slash' ></i> Desativar</a></li> -->
		        <li role="separator" class="divider"></li>
		        <li><a href="#" onclick="deleteJob('{{:jobId}}')" ><i class='fa fa-times' ></i> Excluir</a></li>
	  			</ul> 
	  		</div>
  		</li>
    </ul>
    
    <h3 class='list-group-item-heading'>
      <a  href='/jobs/view/{{:jobId}}' >{{:jobPositionLabel}}</a>
    </h3>
    <ul class='list-inline' >
      <li>
        <label><input type="checkbox" name="jobsToDisable[]" value="{{:jobId}}"> Desativar</label>
      </li>
      <li>
      	<i class='fa fa-clock-o'></i> Postada em {{:jobDate}}
      </li>
      <li>
      	<i class='fa fa-users' ></i> {{:applicationCount}} candidatos
      </li>
    </ul>
  </div>
</script>

<script>
  $('#jobsSearchBtn').on('click',function(r)
    {
      var query = $('#jobsSearch').val();

      $('.jobs').remove();

      if(query.length > 1)
      {
	      $('#pageLoader').show();
	      $.getJSON('/api/jobs/search/' + query, function(data)
	        {
	          if(data.total > 0)
	          {
	            searchJobs(data.items);
	          }
	          else
	          {
	            $('#searchResultsMessage').show();
	            var page = window.currentPage;
	            getJobs(page);
	          }
	        }).done(function(){
	          $('#pageLoader').hide();
	        });
	    }
	    else
	    {
	    	$('#pageLoader').hide();
	    	$('#searchResultsMessage').hide();
			var page = window.currentPage;
	        getJobs(page);	    	
	    }
    });

  window.currentJobsPage = 0;

  $(document).ready(function(){

    var page = window.currentJobsPage;

    console.log('Carregando vagas - página: ' + page);

    getJobs();

    $('#searchResultsMessage').hide();

  });
</script>
