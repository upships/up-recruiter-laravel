<div class="page-title p-b-10">
  <h3 class="title">Banco de Talentos</h3>
</div>

<!-- <div class="list-group m-b-10">
  <div class="list-group-item" >
    <ul class="list-inline">
      <li>
          <a href="/profiles/folders" class="btn btn-default" title="Ver pastas">
            <i class="fa fa-bars"></i> Pastas de perfis
          </a>
      </li>
    </ul>
  </div>
</div>
 -->
<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-12 m-b-10">
  <div class="list-group m-b-10">
    <div class="list-group-item">
      <h3 class="list-group-item-heading">Filtros</h3>
    </div>
    <div class="list-group-item">
      <h4>Fun&ccedil;&atilde;o / Categoria CIR</h4>

      <div class="form-group">
        <div class="radio-inline">
            <label class="cr-styled" for="searchForBook">
                <input type="radio" id="searchForBook" name="searchType" value="1" checked> 
                <i class="fa"></i> 
                Categoria CIR
            </label>
        </div>
        <div class="radio-inline">
            <label class="cr-styled" for="searchForPid">
                <input type="radio" id="searchForPid" name="searchType" value="2"> 
                <i class="fa"></i> 
                Por fun&ccedil;&atilde;o 
            </label>
        </div>
      </div>

      <div class="form-group seafarerSearchItems">
        <label for="bookCategoryId" class="control-label">Categorias CIR</label>
        <select class="select2" multiple data-placeholder="Selecione cat. CIR..." name="bookCategoryId" id="bookCategoryId">
          <option value="">Selecione uma categoria</option>
          @foreach($seaman_book_types as $seaman_book)
          <option value="{bookCategoryId}">{{$seaman_book_type->code}} - {bookCategoryLabel}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group nonSeafarerSearchItems">
        <label for="positionId" class="control-label">Fun&ccedil;&atilde;o</label>
        <select class="onshorePositions" multiple data-placeholder="Selecione uma função..." name="positionId" id="positionId">
          <option value="">Selecione uma função</option>
        </select>
      </div>
    </div>
    <div class="list-group-item">
      <h4>Certificados</h4>

      <div class="form-group">
        <label for='requiredCertificates' class="control-label">Certificados</label>
        <select class="select2" multiple data-placeholder="Selecione um certificado..." name="requiredCertificates" id="requiredCertificates">
          <option value="">Nenhum</option>
          @foreach($trainings as $training)
          <option value="{{$training->id}}">{{$training->label}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="list-group-item">

      <h4>Outros</h4>

      <div class="form-group">
        <label for="englishLevel" class="control-label">Ingl&ecirc;s m&iacute;nimo</label>
        <select name="englishLevel" id="englishLevel" class="form-control">
            <option value="0">Nenhum</option>
            <option value="1">B&aacute;sico</option>
            <option value="2">Intermedi&aacute;rio</option>
            <option value="3">Avan&ccedil;ado / Fluente</option>
        </select>
      </div>
    </div>
    
    <!-- <div class="list-group-item">
      <h4>Experi&ecirc;ncia profissional</h4>

      <div id="experience-list" class="list-group m-b-10">
      </div>

      <p>
        <a href="#new-experience-btn" class="btn btn-default btn-block" onclick="newExperience()" >
          <i class="fa fa-plus"></i> Adicionar experi&ecirc;ncia
        </a>
      </p>

      <div class="list-group" id="new-experience-form">
        <div class="list-group-item">


          <div class="form-group">
            <label for="workPid" class="control-label">Fun&ccedil;&atilde;o</label>
            <select class="insertPositions new-experience-selectors" data-placeholder="Selecione uma função..." name="workPid" id="workPid">
                <option value="">Nenhum</option>
            </select>
          </div>

        </div>
        <div class="list-group-item">
          <div class="form-group">
            <label for="duration">Experi&ecirc;ncia na fun&ccedil;&atilde;o (meses)</label>
            <div id="experience-spinner">
              <div class="input-group" style="width:150px;">
                <input type="text" name="duration" id="duration" class="spinner-input form-control" maxlength="4" >
                <div class="spinner-buttons input-group-btn">
                    <button type="button" class="btn btn-default spinner-up">
                        <i class="fa fa-angle-up"></i>
                    </button>
                    <button type="button" class="btn btn-default spinner-down">
                        <i class="fa fa-angle-down"></i>
                    </button>
                </div>
              </div>
            </div>
            <span class="help-block">
              Em meses
            </span>
          </div>
        </div>

        <div class="list-group-item">
          <div class="form-group">
            <label for="shipTypeId" class="control-label">Embarca&ccedil;&atilde;o</label>
            <select class="select2 new-experience-selectors" data-placeholder="Selecione uma embarcação..." name="shipTypeId" id="shipTypeId">
              <option value="">Nenhum</option>
              {ships}
              <option value="{shipTypeId}">{{$job->ship_type->label}}</option>
              {/ships}
            </select>
          </div>
        </div>
        <div class="list-group-item">
          <button type="button" onclick="insertWorkExperience()" class="btn btn-primary" >Incluir experi&ecirc;ncia</button>
        </div>
      </div>
      </div> -->
      
      <div class="list-group-item">
        <!-- <form method="post" action="/json/profiles/filter" target="_blank" > -->
        <!-- </form> -->

        <button type="button" onclick="filter();" class="btn btn-success" ><i class="fa fa-search"></i> Buscar talentos</button> <span class="filterLoadingMessage"><i class="fa fa-spinner fa-spin"></i> Carregando.. </span>
      </div>
    </div>

    <div class="list-group" id="selectedProfiles" >

      <div class="list-group-item" id="selectedProfilesToolbar" > 
        <ul class="list-inline" >
          <li>
              <a href="#addProfilesToList" onclick="selectProfileFolder()" class="btn btn-primary" title="Adicionar a uma pasta">
                <i class="fa fa-folder-open-o"></i>
              </a>
          </li>
          <li>
              <a href="#messageSelectedProfiles" onclick="messageSelectedProfiles()" class="btn btn-primary" title="Enviar mensagem">
                <i class="fa fa-comments"></i>
              </a>
          </li>

          <li>
              <a href="#addProfilesToJobCampaign" onclick="addProfilesToJobCampaign()" class="btn btn-primary" title="Adicionar a processo seletivo">
                <i class="fa fa-briefcase"></i>
              </a>
          </li>
        </ul>
      </div>

    </div>
  </div>

  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <div class="list-group m-b-10" >
      <div class="list-group-item">
        <div class="form-group">
            <input type="text" class="form-control" id="nameSearch" placeholder="Pesquisar por nome" >
            <span class="filterLoadingMessage"><i class="fa fa-spinner fa-spin"></i> Carregando.. </span>
        </div>
      </div>
    </div>

    <div class="list-group" id="searchResults">
    
      <div class="list-group-item">

        <div class='dropdown float-right' >
          <a href='#' class='dropdown-toggle btn btn-default' data-toggle='dropdown' aria-haspopup='true' aria-expanded='true' >
              <i class='fa fa-folder-open-o'></i> Pastas <span class="caret"></span>
          </a>
          <ul class='dropdown-menu dropdown-menu-right' id="profileFoldersList" >
              <li style="padding: 5px;">
                  <form method="post" action="/profiles/addFolderAction" class="form" target="_blank" >
                    <div class="input-group">
                      <input type="text" name="profileFolderName" class="form-control input-sm" placeholder="Nome da pasta" />
                      <span class="input-group-btn">
                        <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-plus" ></i></button>
                      </span>
                    </div>
                  </form>
              </li>
              <li id="profileFoldersListLoadingMessage"><a href="#"><i class="fa fa-spinner fa-spin"></i> Carregando</a></li>
          </ul>
        </div>

        <h3 class="list-group-item-heading">Perfis</h3>
        <p>Resultados: <span id='matchingProfilesCount' >0</span></p>
      </div>

      <div class="list-group-item filterLoadingMessage" >
        <i class="fa fa-spinner fa-spin"></i> Carregando resultados...
      </div>

      <div class="list-group-item list-group-item-danger noResultsMessage" >
        <p class="lead"><i class="fa fa-exclamation-triangle"></i> Nenhum perfil encontrado. Tente outros crit&eacute;rios</p>
      </div>

    </div>
  </div><!-- /profiles column -->
</div><!-- row -->

<script type="text/javascript" src="/_includes/v2/assets/spinner/spinner.min.js"></script>
<script>

/*

  array bookCategories
  array stcwRegulations

  array workExperience (positionId,shipTypeId,workDuration)
  array certificates
  int   profileEnglishLevel

  str   profileCity (later)

*/

// Initiate the selectedProfiles Object
var selectedProfiles = new Object();

$('input[name="searchType"]').change(function()
{
    var searchType = parseInt($( this ).val());
    setSearchType(searchType);
});

function setSearchType(searchType)
{
    if(searchType === undefined)
    {
      var searchType = 1;
    }

    switch(searchType)
    {
      case 1:
        $('.seafarerSearchItems').show();
        $('.nonSeafarerSearchItems').hide();
      break;

      case 2:
        $('.seafarerSearchItems').hide();
        $('.nonSeafarerSearchItems').show();
      break;
    }
}

function insertWorkExperience()
{
  var experienceItems = [];

  var positionId = $('#workPid').val();

  if(positionId.length > 0)
  {
    var positionLabel = $('#workPid option[value="' + positionId + '"').text();
  }
  else
  {
    var positionLabel = null;
  }

  var duration = $('#duration').val();
  if(duration == '0')
  {
    duration = null;
  }

  var shipTypeId = $('#shipTypeId').val();

  if(shipTypeId.length > 0)
  {
    var shipTypeLabel = $('#shipTypeId option[value="' + shipTypeId + '"').text();
  }
  else
  {
    var shipTypeLabel = null;
  }

  if(positionId || shipTypeId) {

    // Add items to array
    experienceItems.push(positionId);
    experienceItems.push(shipTypeId);
    experienceItems.push(duration);

    var experienceItemsInline = experienceItems.join('-');

    // Insert 

    var itemIdDecimal = Math.random() * 1000;
    var itemId = Math.floor(itemIdDecimal);

    var options = {positionId: positionId, positionLabel: positionLabel, duration: duration, shipTypeId: shipTypeId, shipTypeLabel: shipTypeLabel, itemId: itemId};

    var template = $.templates("#profileExperienceTemplate");
    var htmlOutput = template.render(options);
    $("#experience-list").append(htmlOutput);

    // Hide form
    $('#new-experience-form').hide('slow');

    // Reset values
    $(".new-experience-selectors").val(null).trigger('change');
    $("#duration").val('0');
  }
  else {
    alert('You have to select at least one position or ship type');
  }
}

function deleteExperience(itemId)
{
  $("#experience-item-" + itemId).remove();
}

function filter()
{
    $('.filterLoadingMessage').show();

    // Object containing the requirements of the request
    var request = {};
    var initialRequest = {};  // Request to list basic matching profiles (all from position or book category)

    loadedProfiles = {};

    // Get values of work experience

    var experiences = $('input[name="experiences[]"]')
    
    .map(function(m, res)
    {
      return $(this).val();
    })
    .get().join();

    if(experiences.length > 0)
    {
      request.experiences = experiences;
    }

    $('.resultsItem').remove();

    // Search type
    var searchType = $('input[name="searchType"]:checked').val();

    // Get book categories
    var bookCategoriesArr = $('#bookCategoryId').val();
    if(bookCategoriesArr !== null && searchType == '1')
    {
      var bookCategories = arrayToObj(bookCategoriesArr);
      request.bookCategories = bookCategories;
      initialRequest.bookCategories = bookCategories;
    }

    var positionIdsArr = $('#positionId').val();
    if(positionIdsArr !== null && searchType == 2)
    {
      var positionIds = arrayToObj(positionIdsArr);
      request.positionIds = positionIds;
      initialRequest.positionIds = positionIds;
    }

    var requiredCertificatesArr = $('#requiredCertificates').val();

    if(requiredCertificatesArr !== null)
    {
      var requiredCertificates = arrayToObj(requiredCertificatesArr);
      //requirements['certificates'] = requiredCertificates;

      request.requiredCertificates = requiredCertificates;
    }

    // Language
    var englishLevel = $('#englishLevel').val();

    if(englishLevel > 0)
    {
      request.englishLevel = englishLevel;
    }

    $.post('/json/profiles/getProfiles', initialRequest, function(res)
      {
          return res;

      }).done(function(rawProfiles) {
          
          if(rawProfiles.profiles.length > 0) {

            request.profiles = rawProfiles.profiles;
            
            $. post('/json/profiles/filter', request, function(matchingProfiles){
                return matchingProfiles;
            })
            .done(function(res){
                
                var template = $.templates("#searchTemplate");
                var htmlOutput = template.render(res.matchingProfiles);

                $("#searchResults").append(htmlOutput);

                $('.filterLoadingMessage').hide();
                $('.noResultsMessage').hide();

                $('.profileSelectedIndicator').hide();
                $('#matchingProfilesCount').text(res.matchingProfiles.length);

                // Hide profile loading icons
                $('.profileLoadingIcons').hide();
            });
          }
          else {
            $('.filterLoadingMessage').hide();
            $('.noResultsMessage').show();
          }

        // $('#matchingProfilesCount').text(res.matchingProfilesCount);

        // if(requiredCertificates != undefined && requiredCertificates.length > 0)
        // {
        //     $.each(requiredCertificates, function(key,trainingId)
        //     {
        //         console.log("Matching training: " + trainingId);

        //         $('.training-' + trainingId).addClass('text-success');
        //     });
        // }

        // $('.certificate-is-expired-1').addClass('text-warning');

        

      });
}

function getPositions()
{
    $.getJSON('/json/positions/index', function(res)
      {
          var template = $.templates("#positionsListItemTemplate");
          var htmlOutput = template.render(res.items);
          $(".insertPositions").append(htmlOutput);
      }).done(function()
      {
          jQuery(".insertPositions").select2({
              width: '100%'
          });
      });


      $.getJSON('/json/positions/onshore', function(res)
      {
          var template = $.templates("#positionsListItemTemplate");
          var htmlOutput = template.render(res.items);
          $(".onshorePositions").append(htmlOutput);
      }).done(function()
      {
          jQuery(".onshorePositions").select2({
              width: '100%'
          });
      });
}

function newExperience()
{
    $('#new-experience-form').show('slow');
}


function selectProfile(profileId) {
  
  var profileName = $('#profileName-' + profileId).text();
  var profilePositionLabel = $('#profilePositionLabel-' + profileId).text();

  var data = {profileName: profileName, profilePositionLabel: profilePositionLabel, profileId: profileId}

  var template = $.templates("#selectedProfilesItemTemplate");
  var htmlOutput = template.render(data);

  $("#selectedProfiles").append(htmlOutput);
  
  $('#profile-' + profileId).addClass('list-group-item-success');
  
  $('#profileSelectorBtn-' + profileId).hide();
  $('#profileSelectedIndicator-' + profileId).show();

  selectedProfiles[profileId] = data;

  toggleSelectedProfilesToolbar();
}

function removeSelectedProfile(profileId) {
  
  $('#selectedProfileItem-' + profileId).remove();
  $('#profile-' + profileId).removeClass('list-group-item-success');

  $('#profileSelectorBtn-' + profileId).show();
  $('#profileSelectedIndicator-' + profileId).hide();

  delete selectedProfiles[profileId];

  toggleSelectedProfilesToolbar();
}


function toggleSelectedProfilesToolbar() {
  var length = Object.keys(selectedProfiles).length;
    
  if(length > 0) {
      $('#selectedProfilesToolbar').show();
  }
  else {
    $('#selectedProfilesToolbar').hide();  
  }
}

// function loadProfile(profileId) {

//   var isLoaded = loadedProfiles[profileId];

//   if(isLoaded)  {

//       $('#extendedProfile-' + profileId).show('slow');
//   }
//   else {

//     $('#profileLoadingIcon-' + profileId).show();

//     $.getJSON('/json/profiles/view/' + profileId + '/full', function(response) {
//         return response;
//     }).done(function( data )  {

//         var template = $.templates("#extendedProfileTemplate");
//         var htmlOutput = template.render(data);

//         $('#extendedProfile-' + profileId).html(htmlOutput);

//         $('#profileLoadingIcon-' + profileId).hide();
//     });

//     loadedProfiles[profileId] = true;
//   }

//   $('#profile-' + profileId).addClass('shadow');
// }

// function hideExtendedProfile(profileId) {
//   $('#extendedProfile-' + profileId).hide('slow');
//   //$('#profile-' + profileId).removeClass('active');
//   $('#profile-' + profileId).removeClass('shadow');
// }

function selectedProfilesInline() {
    var profiles = [];

  for (var p in selectedProfiles) {
    if(selectedProfiles.hasOwnProperty(p)) {
      profiles.push(selectedProfiles[p]['profileId']);
    }
  }

  return profiles.join('-');
}

function messageSelectedProfiles()  { 
  var profiles = selectedProfilesInline();
  var messageWindow = window.open('/conversation/add' + profiles, '_blank');
  messageWindow.focus();
}

function addProfilesToJobCampaign() {
  var profiles = selectedProfilesInline();
  var messageWindow = window.open('/selection/includeCandidates/' + profiles, '_blank');
  messageWindow.focus();
}

// $.Notification.autoHideNotify('success', 'top right', 'TITLE','TEXT');

function addProfilesToNewList() {
  var profileFolderName = $('input[name="newProfileFolderName"]').val();

  if(profileFolderName.length > 0) {
      var data = {profileFolderName: profileFolderName};

      $.post('/json/profiles/addFolder', data, function(response)  {
          return response;
      }).done( function(data) {
          if(data.error === false)  {
              addProfilesToList(data.profileFolderId);
          }
          else {
            $.Notification.autoHideNotify('success', 'top right', 'Failed to add a new list', data.message);
          }
      });
  }
}

function addProfilesToList(profileFolderId) {
    
    $('#profileFoldersAreaWorkingMessage').show();

    var data = {profiles: selectedProfiles};

    $.post('/json/profiles/addToFolder/' + profileFolderId, data, function(response) {
      return response;
    }).done(function(data)  {

          if(data.error === false)  {
              // Alert user that the profiles have been added to the list
              $.Notification.autoHideNotify('success', 'top right', 'Success','The profiles you selected have been added to the folder');

              // Close the modal
              $('#profileFoldersModal').modal('hide');
              $('#profileFoldersAreaWorkingMessage').hide();
          }
          else {
              $.Notification.autoHideNotify('error', 'top right', 'Operation failed', data.message);
          }

          $('.profileFoldersListItem').remove();
    });

}

function selectProfileFolder()  {

    $('#profileFoldersModal').modal();

    $('#profileFoldersModal').on('shown.bs.modal', function (event) {
  
      $('#profileFoldersAreaWorkingMessage').hide();

      var modal = $(this);
      loadFolders('#profileFoldersArea');
  });
}

function renderProfiles(profiles)  {

    $('.resultsItem').remove();

    if(profiles.length > 0) {
      
      var template = $.templates("#searchTemplate");
      var htmlOutput = template.render(profiles);
      $("#searchResults").append(htmlOutput);

      $('.noResultsMessage').hide();
      $('.profileSelectedIndicator').hide();
      
      $('#matchingProfilesCount').text(profiles.length);

      // Hide profile loading icons
      $('.profileLoadingIcons').hide();
    }
    else {
      
      $('.noResultsMessage').show();
    }

    $('.filterLoadingMessage').hide();
}

$(document).ready(function()
{
    $('#nameSearch').on('keyup', function() {

          $('.resultsItem').remove();
          $('.filterLoadingMessage').show();

          var name = $('#nameSearch').val();
          console.log(name);

          if(name.length > 3) {

            var data = {name: name};

              $.post('/json/profiles/searchByName', data, function(response) {
                  
                  return response;

              }).done(function(response) {

                  console.log(response);

                  if(response.total > 0)  {

                      renderProfiles(response.items);
                  }

              });
          }
    });

  $('.searchLoader').hide();

  // Load positions
  getPositions();

  // Set search type: 1 - seafarer, 2 - non-seafarer
  setSearchType();

  // Load profile folders
  loadFolders('#profileFoldersList');

  //filter();

  $('#experience-spinner').spinner({value:0, min: 0, max: 2000});
  $('#new-experience-form').hide();

  $.getJSON('/json/profiles/index', function(response) {
    return response;
  }).done( function(data) {
      
      var template = $.templates("#searchTemplate");
      var htmlOutput = template.render(data.items);      
      $("#searchResults").append(htmlOutput);
      
      $('.filterLoadingMessage').hide();
      $('.noResultsMessage').hide();

      $('.profileSelectedIndicator').hide();
      $('.profileLoadingIcons').hide();
      $('#matchingProfilesCount').text(data.items.length);
  });

  toggleSelectedProfilesToolbar();

  /*
  // Select position
  var positionId = '{{$position->id}}';
  var duration = '{duration}';
  var shipTypeId = '{shipTypeId}';

  if(positionId != '')
  {
    $('#positionId').val(positionId).trigger('change');
  }

  $('#duration').val(duration);

  if(shipTypeId != '')
  {
    $('#shipTypeId').val(shipTypeId).trigger('change');
  }*/
});
</script>