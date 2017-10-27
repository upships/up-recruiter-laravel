<!-- Search box -->

<script id="searchTemplate" type="text/x-jsrender">
  <div class='list-group-item resultsItem clearfix' id='profile-{{:profileId}}'>

    <div class="float-right">
      <ul class="list-inline">
        <li class="profileLoadingIcons" id="profileLoadingIcon-{{:profileId}}">
          <i class="fa fa-spinner fa-spin"></i>
        </li>
        
        <li id='profileSelectorBtn-{{:profileId}}'>
          <a href="#userChecker-{{:profileId}}" class="text-muted" onclick="selectProfile({{:profileId}})" >
            <i class="fa fa-check-circle-o fa-lg"></i></a>
        </li>

        <li class="profileSelectedIndicator text-success" id='profileSelectedIndicator-{{:profileId}}'>
          <a href="#removeSelectedProfile-{{:profileId}}" onclick="removeSelectedProfile({{:profileId}})" title="Remover perfil da seleção" >
            <i class="fa fa-check-circle fa-lg"></i>
          </a>
        </li>

      </ul>
    </div>

    <h3 class="list-group-item-heading">
      <a href="#loadProfile-{{:profileId}}" onclick="loadProfile({{:profileId}})" id="profileName-{{:profileId}}">{{:userName}}</a>

      {{if profileMatchPercent}}
      <span class="text-success">{{:profileMatchPercent}}%</span>
      {{/if}}
    </h3>
    <ul class="list-inline m-b-10">
      <li id="profilePositionLabel-{{:profileId}}" >
        <a href="#loadProfile-{{:profileId}}" onclick="loadProfile({{:profileId}})" id="profilePositionLabelLink-{{:profileId}}">{{:profilePositionLabel}}</a>
      </li>
      <li class="" >Ingl&ecirc;s {{:profileEnglishLevelLabel}}</li>
      <li class="">{{:profileAddress}}</li>
      <li class="text-muted float-right">Atualizou em {{:profileUpdatedAt}}</li>
    </ul>

    {{if matchingCertificates}}
    <ul class="list-inline m-b-10">
      {{for matchingCertificates tmpl='#matchingCertificatesTemplate'/}}
    </ul>
    {{/if}}

    <ul class="list-inline m-b-10">
      <li><a href="/profiles/view/{{:profileId}}" target="_blank" class="btn btn-default btn-sm" title="Ver perfil (nova janela)" >Perfil completo</a></li>
      <li>
        <a href="/selection/includeCandidates/{{:profileId}}" target="_blank" class="btn btn-default btn-sm" title="Inserir em Processo Seletivo (nova janela)" >
          <i class="fa fa-briefcase"></i></i>
        </a>
      </li>
      <!-- <li><a href="#" class="btn btn-default btn-sm" title="Adicionar a pasta" >
          <i class="fa fa-folder-open-o"></i></a>
      </li> -->
      <li><a href="/conversation/add{{:profileId}}" class="btn btn-default btn-sm" title="Enviar e-mail (nova janela)" target="_blank" ><i class="fa fa-envelope-o"></i></a></li>
      <!-- <li><a href="#" class="btn btn-default btn-sm" title="Compartilhar"><i class="fa fa-share"></i></a></li> -->
    </ul>

    <div id="extendedProfile-{{:profileId}}"></div>
  </div>
</script>

<!-- Profile extended view -->
<script id="extendedProfileTemplate" type="text/x-jsrender" >
  <div class="m-b-5 text-center">
    <a href="#hideExtendedProfile-{{:profileId}}" onclick="hideExtendedProfile({{:profileId}})" class="text-muted" >
      <i class="fa fa-angle-up"></i> Fechar
    </a>
  </div>

  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">

      <div class="list-group m-b-10">
        <div class="list-group-item">
          <h4 class="list-group-item-heading">Dados de contato</h4>
        </div>
        <div class="list-group-item">
          <span class="text-muted">E-mail</span> {{:profileEmail}}
        </div>
        <div class="list-group-item">
          <span class="text-muted">Celular</span> {{:profilePhone}}
        </div>
      </div>

      {{if profileCertificates}}
      <div class="list-group m-b-10">
        <div class="list-group-item">
          <h4 class="list-group-item-heading">Certificados</h4>

          <ul>
          {{for profileCertificates tmpl='#profileCertificatesTemplate'/}}
          </ul>
        </div>

      </div>
      {{/if}}

    </div>


    {{if profileWorks}}
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="list-group m-b-10">
        <div class="list-group-item">
          <h4 class="list-group-item-heading">Experi&ecirc;ncia profissional</h4>
        </div>
        {{for profileWorks tmpl='#profileWorksTemplate'/}}
      </div>
    </div>
    {{/if}}
  </div>

  <div class="m-t-10 text-center">
    <a href="#hideExtendedProfile-{{:profileId}}" onclick="hideExtendedProfile({{:profileId}})" class="text-muted" >
      <i class="fa fa-angle-up"></i> Fechar
    </a>
  </div>

</script>

<!-- Matching certificates template -->
<script id="matchingCertificatesTemplate" type="text/x-jsrender" >
    <li class="profileCertificates training-{{:trainingId}} certificate-is-expired-{{:certificateExpiredBin}}">
      {{:certificateLabel}}
    </li>
</script>

<!-- Certificates list item -->
<script id="profileCertificatesTemplate" type="text/x-jsrender" >
  <li class="profileCertificates training-{{:trainingId}} certificate-is-expired-{{:certificateExpiredBin}}">
    <b>{{:certificateLabel}}</b> 
    {{if certificateExpiresFull}}
    <br/>
    <small class="text-muted">Validade: {{:certificateExpiresFull}}</small>
    {{/if}}
  </li>
</script>

<script id="profileWorksTemplate" type="text/x-jsrender" >
  <div class="list-group-item profileWorkExperiences">
      <b class="lead">{{:positionLabel}}</b><br/>
      Empresa {{:companyName}}<br/>
      De {{:workStartDate}} a {{:workEndDate}}

      {{if workShipTypeLabel}}
        <br/>
        {{:workShipTypeLabel}}
      {{/if}}
  </div>
</script>
<!-- Experience -->

<script id="profileExperienceTemplate" type="text/x-jsrender" >
  <div class="list-group-item clearfix" id="experience-item-{{:itemId}}">
    <a href="#deleteXp" onclick="deleteExperience({{:itemId}})" class="float-right" title="Remover" >
      <i class="fa fa-times"></i>
    </a>

    {{if positionLabel}}
      <h4 class="list-group-item-heading">{{:positionLabel}}</h4>
    {{/if}}

    {{if shipTypeId}}
      Embarca&ccedil;&atilde;o: <b>{{:shipTypeLabel}}</b>
    {{/if}}

    {{if duration}}
      <br/>Experi&ecirc;ncia: <b>{{:duration}}</b> meses
    {{/if}}

    <input type="hidden" name="experiences[]" class="workExperienceFields" value="{{:positionId}}-{{:shipTypeId}}-{{:duration}}" >

  </div>
</script>

<!-- Positions list -->
<script id="positionsListItemTemplate" type="text/x-jsrender" >
  <option value="{{:positionId}}">{{:positionLabel}}</option>
</script>


<!-- Selected profile item -->
<script id="selectedProfilesItemTemplate" type="text/x-jsrender" >
  <div class="list-group-item" id="selectedProfileItem-{{:profileId}}">

    <a href="#removeSelectedProfile-{{:profileId}}" onclick="removeSelectedProfile({{:profileId}})" class="float-right text-muted" title="Remover Perfil desta pasta">
      <i class="fa fa-times"></i>
    </a>

    <h4 class="list-group-item-heading">{{:profileName}}</h4>
    <i>{{:profilePositionLabel}}</i>
  </div>
</script>

<!-- Profiles lists -->

<script id="profileFoldersTemplate" type="text/x-jsrender" >
      {{for works tmpl='#profileWorksTemplate'/}}    
</script>



<script id="profileFoldersListTemplate" type="text/x-jsrender" >
  <li>
      <a href="/profiles/viewFolder/{{:profileFolderId}}">
        {{:profileFolderName}}<br/>
        <small class="text-muted"><i>Por {{:recruiterName}} em {{:profileFolderCreatedAt}}</i></small>
      </a>
  </li>
</script>

<script id="profileFoldersAreaTemplate" type="text/x-jsrender" >
  <a class="list-group-item profileFoldersListItem" onclick="addProfilesToList({{:profileFolderId}})">
    {{:profileFolderName}}<br/>
    <small class="text-muted"><i>Por {{:recruiterName}} em {{:profileFolderCreatedAt}}</i></small>
  </a>
</script>

<div class="modal fade" tabindex="-1" role="dialog" id="profileFoldersModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Adicionar perfis a uma pasta</h4>
      </div>
      <div class="modal-body">
          
        <div class="list-group" id="profileFoldersArea">
          <div class="list-group-item">
            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <input type="text" name="newProfileFolderName" id="newProfileFolderName" placeholder="Nova pasta" class="form-control" >
                </div>
              </div>
              <div class="col-sm-4">
                <button type="button" name="newProfileFolderBtn" onclick="addProfilesToNewList()" class="btn btn-success">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
          </div>

          <div class="list-group-item" id="profileFoldersAreaLoadingMessage">
            <i class="fa fa-spinner fa-spin"></i> Loading profiles folders
          </div>

          <div class="list-group-item" id="profileFoldersAreaWorkingMessage">
            <i class="fa fa-spinner fa-spin"></i> Adding profiles to selected list
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- <div class="col-lg-4 m-b-10">
            <div class="list-group">
              <div class="list-group-item">
                <h3 class="list-group-item-heading">Filtros</h3>
              </div>
              <div class="list-group-item"> -->
                <!-- <h4>Cursos</h4>
                <p><i>Selecione os cursos para filtrar candidatos</i></p>

                {jobTrainingsx}
                <div class="form-group">
                  <label class="cr-styled">
                            <input type="checkbox" name="trainings[]" value="{jcr_id}" class="trainingsItem">
                            <i class="fa"></i> 
                            {jtrainingLabel}
                        </label>
                    </div>
                @endforeach -->

                <!-- 
                <h4>Experi&ecirc;ncia</h4>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for=''>Dura&ccedil;&atilde;o (meses)</label>
                      <div class="spinner">
                                          <div class="input-group input-small">
                                              <input type="text" class="spinner-input form-control" maxlength="3" readonly="">
                                              <div class="spinner-buttons input-group-btn btn-group-vertical">
                                                  <button type="button" class="btn spinner-up btn-xs btn-default">
                                                      <i class="fa fa-angle-up"></i>
                                                  </button>
                                                  <button type="button" class="btn spinner-down btn-xs btn-default">
                                                      <i class="fa fa-angle-down"></i>
                                                  </button>
                                              </div>
                                          </div>
                                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">Fun&ccedil;&atilde;o</label>
                      <select name="" class="select2" >
                        <option value="">1 Oficial de Náutica</option>
                        <option value="">Imediato</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">

                    <div class="form-group">
                      <label for="">Tipo de embarca&ccedil;&atilde;o</label>
                      <select name="" class="select2" >
                        <option value="">---</option>
                        <option value="">AHTS</option>
                        <option value="">PSV</option>
                      </select>
                    </div>

                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="">DP</label>
                      <select name="" class="select2" >
                        <option value="">---</option>
                        <option value="">DP B&aacute;sico</option>
                        <option value="">DP Limited</option>
                        <option value="">DP Unlimited</option>
                      </select>
                    </div>
                  </div>
                </div>

                <button type="button" id="addFilter" class="btn btn-success">Filtrar candidatos</button> -->
              <!-- </div>
            </div>
          </div> -->

<!-- Profile filtering system templates -->

<script id="profileFiltersStatesTemplate" type="text/x-jsrender" >
{{if profileState}}
  <div class="form-group">
      <label class="cr-styled">
          <input type="checkbox" class="profileFilters" value="profileStates-{{:profileState}}" >
          <i class="fa"></i> 
          {{:profileState}} <span class="badge">{{:total}}</span>
      </label>
  </div>
{{/if}}
</script>

<script id="profileFiltersBookCategoriesTemplate" type="text/x-jsrender" >
{{if bookCategoryCode}}
  <div class="form-group">
      <label class="cr-styled">
          <input type="checkbox" class="profileFilters" value="bookCategories-{{:bookCategoryCode}}" >
          <i class="fa"></i> 
          {{:bookCategoryCode}} <span class="badge">{{:total}}</span>
      </label>
  </div>
{{/if}}
</script>

<script id="profileFiltersStcwRegulationsTemplate" type="text/x-jsrender" >
{{if stcwRegulation}}
  <div class="form-group">
      <label class="cr-styled">
          <input type="checkbox" class="profileFilters" value="stcwRegulations-{{:stcwRegulationId}}" >
          <i class="fa"></i> 
          {{:stcwRegulation}} <span class="badge">{{:total}}</span>
      </label>
  </div>
{{/if}}
</script>
