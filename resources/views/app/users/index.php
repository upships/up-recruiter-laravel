<div class="list-group" id='usersList' >
    <div class="list-group-item">
      <h2 class="list-group-item-heading">Gerenciamento de usu&aacute;rios</h2>
    </div>
    <div class="list-group-item">

      <div class="row">
        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3" > 
          <a href="#" onclick="changeUserPage('previous')" class="btn btn-primary btn-block previousPageButton" ><i class="fa fa-arrow-left" ></i></a>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-3 col-xs-3" >
          <a href="#" onclick="changeUserPage('next')" class="btn btn-primary btn-block nextPageButton" ><i class="fa fa-arrow-right" ></i></a>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 col-lg-offset-6 col-md-offset-6">
          <a href="/users/add" class="btn btn-primary btn-fill btn-block" ><i class="fa fa-user-plus" ></i> Usu&aacute;rio</a>
        </div>                
      </div>

    </div>
    <div class="list-group-item">
      <ul class="list-inline">
          
        <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class='fa fa-sort-alpha-asc'></i> <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">Mostrar todos</a></li>
                <li role="separator" class="divider"></li>                      
                <li><a href="#" onclick="setFirstLetter('a')" >A</a></li>
                <li><a href="#" onclick="setFirstLetter('b')" >B</a></li>
                <li><a href="#" onclick="setFirstLetter('c')" >C</a></li>
                <li><a href="#" onclick="setFirstLetter('d')" >D</a></li>
                <li><a href="#" onclick="setFirstLetter('e')" >E</a></li>
                <li><a href="#" onclick="setFirstLetter('f')" >F</a></li>
                <li><a href="#" onclick="setFirstLetter('g')" >G</a></li>
                <li><a href="#" onclick="setFirstLetter('h')" >H</a></li>
                <li><a href="#" onclick="setFirstLetter('i')" >I</a></li>
                <li><a href="#" onclick="setFirstLetter('j')" >J</a></li>
                <li><a href="#" onclick="setFirstLetter('k')" >K</a></li>
                <li><a href="#" onclick="setFirstLetter('l')" >L</a></li>
                <li><a href="#" onclick="setFirstLetter('m')" >M</a></li>
                <li><a href="#" onclick="setFirstLetter('n')" >N</a></li>
                <li><a href="#" onclick="setFirstLetter('o')" >O</a></li>
                <li><a href="#" onclick="setFirstLetter('p')" >P</a></li>
                <li><a href="#" onclick="setFirstLetter('q')" >Q</a></li>
                <li><a href="#" onclick="setFirstLetter('r')" >R</a></li>
                <li><a href="#" onclick="setFirstLetter('s')" >S</a></li>
                <li><a href="#" onclick="setFirstLetter('t')" >T</a></li>
                <li><a href="#" onclick="setFirstLetter('u')" >U</a></li>
                <li><a href="#" onclick="setFirstLetter('w')" >W</a></li>
                <li><a href="#" onclick="setFirstLetter('v')" >V</a></li>
                <li><a href="#" onclick="setFirstLetter('x')" >X</a></li>
                <li><a href="#" onclick="setFirstLetter('y')" >Y</a></li>
                <li><a href="#" onclick="setFirstLetter('z')" >Z</a></li>
              </ul>
            </div>
          </li>
          <li>
            <button class="btn btn-primary btn-block" id='orderChange'><i class='fa fa-sort-alpha-asc'></i> Alfabética</button>
          </li>
          <li>
            <p class='form-control-static' >Mostrando de <span id='currentUsersCountFrom'>0</span> a <span id='currentUsersCountTo'>0</span></p>
          </li>
      </ul>
    </div>
    <div class="list-group-item">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="input-group">
              <input class="form-control" type="text" name="search" id='userSearch' placeholder='Pesquisar' >
              <span class='input-group-btn' >
                <button class="btn btn-default" id='userSearchBtn' type="button"><i class='fa fa-search'></i></button>
              </span>
            </div>
        </div>
      </div>
    </div>
    
    <div class="list-group-item" id='pageLoader'>
      <i class='fa fa-spinner fa-spin' ></i> Carregando dados
    </div>
    <div class="list-group-item" id='searchResultsMessage'>
      <i class='fa fa-info-circle' ></i> Nenhum resultado encontrado
    </div>
</div>

<!-- Templates -->
<script id="usersListTemplate" type="text/x-jsrender">
  <div class='list-group-item users'>
    <div class="btn-group pull-right">
      <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class='fa fa-cog'></i> <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li><a href='/users/edit/{{:userId}}'><i class='fa fa-pencil-square-o'></i> Editar</a></li>
        <li role="separator" class="divider"></li>                      
        <li><a href="#" onclick="deleteUser('{{:userId}}')" ><i class='fa fa-user-times' ></i> Excluir</a></li>
        <li><a href="/users/getLoginCode/{{:userId}}">C&oacute;digo de login</a></li>
      </ul>
    </div>

    <div class='media'>
      <div class='media-left' >
        <a  href='/users/view/{{:userId}}' >
          <img src='{{:userProfilePicture}}' class='img-circle media-object logo-80' >
        </a>
      </div>
      <div class='media-body' >
          <h4 class='media-heading'>
            <a  href='/users/view/{{:userId}}' >{{:name}}</a>
          </h4>
          <ul class='list-inline'>
            <li>
              <a  href='/users/view/{{:userId}}' >{{:email}}</a>
            </li>
            <li>
              <i class='fa fa-user-plus'></i> <i class='fa fa-clock'></i> {{:joined}}
            </li>
            <li>
              <i class='fa fa-sign-in'></i> {{:lastLogin}}
            </li>
            <li>
              {{:fbuserId}}
            </li>
            <li>
              <i class='fa fa-eye'></i> {{:jobViews}}
            </li>            
        </a>
      </div>
    </div>
  </div>
</script>

<script>

  window.currentPage = 0;
  window.userListOrder = 'joined-DESC';
  window.userListOrderCount = 0;

  $('#userSearchBtn').on('click',function(r)
    {
      var query = $('#userSearch').val();

      $('.jobs').remove();

      if(query.length > 1)
      {
        $('#pageLoader').show();

        $.getJSON('/api/users/search/' + query, function(data)
          {
            if(data.total > 0)
            {
              searchUsers(data.items);
            }
            else
            {
              $('#searchResultsMessage').show();
              var page = window.currentPage;
              getJUsers(page);
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
        getUsers(page);        
      }
    });

  $('#orderChange').on('click', function()
  {
    var userListOrderCount = window.userListOrderCount;

    console.log('userListOrderCount = ' + userListOrderCount);

    if(userListOrderCount == 0)
    {
      var newText = "<i class='fa fa-calendar-o' ></i> Data de cadastro";
      $('#orderChange').html(newText);

      window.userListOrder = 'first_name-ASC';
      window.userListOrderCount = 1;
      window.currentPage = 0;

      console.log('carregando novos usuários por ordem ');

      getUsers(0);
    }
    else
    {
      var newText = "<i class='fa fa-sort-alpha-asc' ></i> Alfabética";
      $('#orderChange').html(newText);

      window.userListOrderCount = 0;
      window.userListOrder = 'joined-DESC';
      window.currentPage = 0;
      getUsers(0);
    }

  });


  $(document).ready(function(){

    var page = window.currentPage;

    console.log('Carregando lista de usuários - página: ' + page);

    getUsers(page);
  });
</script>
