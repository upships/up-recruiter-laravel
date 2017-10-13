<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="portlet">
                    <div class="portlet-body text-left">
                        <ul class="list-inline">
                            <li>
                                <img src="https://cdn.upships.com/logos/{companyLogo}" class="img-circle logo-40">
                            </li>
                            <li>
                                <h4><a href="/account">{userName}</a></h4>
                                <a href="/company/edit" >{companyName}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="mini-stat clearfix">
                    <span class="mini-stat-icon bg-pink"><i class="fa fa-user"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counterx" id="jobCandidatesCount" >0<</span>
                        Candidatos a vagas em aberto
                    </div>
                </div>
            </div>
        </div>

        <div class="list-group" id='jobsList'><!-- /primary heading -->
            <div class="list-group-item">
                <h3 class="list-group-item-heading">
                    Vagas em aberto
                </h3>
            </div>
                    
            <div class="list-group-item" id='pageLoader'>
              <i class='fa fa-spinner fa-spin' ></i> Carregando &uacute;ltimas vagas
            </div>

            <div class="list-group-item noResults">
                <i class="fa fa-times"></i> Nenhuma vaga em aberto
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="portlet"><!-- /primary heading -->
            <div class="portlet-heading">
                <h3 class="portlet-title text-dark text-uppercase">
                    Nova vaga
                </h3>
            </div>
            <div class="portlet-body text-center">
                <form method="post" action="/jobs/addBasicAction" role="form" enctype="multipart/form-data" id='newJobForm' >
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="form-group" >
                                <label for='position'>Fun&ccedil;&atilde;o</label>
                                <select class="select2" name="position" data-placeholder="Selecione uma função" required='required' >
                                <option disabled selected> -- Selecione uma fun&ccedil;&atilde;o -- </option>
                                  {positions}
                                  <option value="{positionId}" >{positionLabel}</option>
                                  {/positions}
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="form-group" >
                                <label for='shipTypeId'>Embarca&ccedil;&atilde;o</label>
                                <select class="select2" name="shipTypeId" data-placeholder="Selecione uma função" required='required' >
                                <option disabled selected> -- Selecione uma embarcação -- </option>
                                  {shipsTypes}
                                  <option value="{shipTypeId}" >{shipTypeLabel}</option>
                                  {/shipsTypes}
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="form-group" >
                              <label for="jobPrivacy" >Privacidade da vaga</label>
                              <select class="form-control" name="jobPrivacy" >
                                  <option value="1" >Aberta</option>
                                  <option value="2" >Confidencial</option>
                                  <option value="3" >Particular</option>
                              </select>
                          </div>
                        </div>
                    </div>
                    <div class="form-group" >
                        <button type="submit" class="btn btn-success">Prosseguir <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="portlet"><!-- /primary heading -->
            <div class="portlet-heading">
                <h3 class="portlet-title text-dark text-uppercase">
                    Processos seletivos em aberto
                </h3>
                <div class="portlet-widgets">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#sent-profiles-portlet" class="" aria-expanded="true"><i class="ion-minus-round"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="sent-profiles-portlet" class="panel-collapse collapse in">
                <div class="portlet-body">

                    <div class="list-group" id='openSelections'>
                        <div class="list-group-item" id='openSelectionsLoader'>
                            <i class='fa fa-spinner fa-spin' ></i> Carregando processos seletivos em aberto
                        </div>
                        <div class="list-group-item noResults">
                            <i class="fa fa-times"></i> Nenhum processo seletivo em aberto
                        </div>
                    </div>
                </div> <!-- end portlet-body -->
            </div> <!-- end portlet-collapsed -->
        </div> <!-- end portlet/Team-member -->
    </div>    
</div>

<div class="row">
    <div class="col-lg-6 col-md-6">
        <h3>Adicionar recrutador</h3>
        <form method="post" action="/company/addRecruiter" >
            
            <input type="hidden" name="companyId" value="{companyId}" />
            
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-" >
                    <div class="form-group" >
                        
                        <input type="email" class="form-control" name="email" placeholder="Email - usu&aacute;rio j&aacute; deve existir!" />
                    </div>
                </div>
                <div class="col-md-4" >
                    <button type="submit" class="btn btn-default"><i class="fa fa-plus" ></i> Adicionar</button>
                </div>
            </div>

        </form>
    </div>
</div>

<script id="jobsListTemplate" type="text/x-jsrender">

    <div class='list-group-item jobs job-status-{{:status}}' id='jobItem-{{:jobId}}'>
        <h4 class='media-heading'>
        <a  href='/jobs/view/{{:jobId}}' >{{:jobPositionLabel}}</a>
        </h4>
        <ul class='list-inline' >
            <li>
                {{:date}}
            </li>
            <li>
                <i class='fa fa-users' ></i> {{:applicationCount}} candidatos
            </li>
        </ul>

        <hr/>

        <ul class='list-inline' >
            <li>
                <a href='/jobs/conclude/{{:jobId}}' class="btn btn-success btn-sm" >
                    <i class='fa fa-check' ></i> Iniciar sele&ccedil;&atilde;o
                </a>
            </li>

            <li>
                <a href='/jobs/share/{{:jobId}}' class="btn btn-primary btn-sm" >
                    <i class='fa fa-linkedin-square' ></i> Compartilhar
                </a>
            </li>
            <li class="pull-right">
                <div class='dropdown' >
                    <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
                        <i class='fa fa-cog fa-lg'></i> <span class="caret"></span>
                    </a>
                    <ul class='dropdown-menu dropdown-menu-right' >
                        <li><a href='/jobs/edit/{{:jobId}}'><i class='fa fa-pencil-square-o'></i> Editar</a></li>
                        <li role="separator" class="divider"></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#" onclick="/jobs/disable/{{:jobId}}" ><i class='fa fa-eye-slash' ></i> Desativar</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="#" onclick="deleteJob('{{:jobId}}')" ><i class='fa fa-times' ></i> Excluir</a>
                        </li>
                    </ul> 
                </div>
            </li>
        </ul>    
    </div>
</script>

<script id="openSelectionsTemplate" type="text/x-jsrender">
    <div class="list-group-item">
      <h4 class="list-group-item-heading">
        <a href="/selections/view/{{:selectionId}}">{{:selectionPositionLabel}}</a></h4>
        <ul class="list-inline m-b-10">
            <li><i class="fa fa-clock-o"></i> Em {{:selectionDate}}</li>
            <li><i class="fa fa-users"></i> {{:selectionNumberOfApplicants}} candidatos selecionados</li>
        </ul>      
    </div>
</script>

<script>

    window.currentJobsPage = 0;
    window.currentSentProfilesPage = 0;

    $(document).ready(function(){

        $.getJSON('/api/data/stats', function( data )
            {
                if(data.error === false)
                {
                    $('#jobCandidatesCount').text(data.jobCandidatesCount);
                    $('#selectionCandidatesCount').text(data.selectionCandidatesCount);                   
                }
                else
                {
                    console.log(data);
                }
            });

        getJobs();  // Get open jobs
        getOpenSelections('#openSelections', '#openSelectionsLoader'); // Get open selections

        //var sentProfilesPage = window.currentSentProfilesPage;
        //

      });
</script>    
