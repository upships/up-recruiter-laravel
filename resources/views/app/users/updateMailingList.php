<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="header">
      	<h4 class="title">
      		Atualizar usu&aacute;rios na SendinBlue
      	</h4>
        <p class="category">
          <i class='fa fa-users'></i> Total de <span id='usersTotal' >0</span> usu&aacute;rios
        </p>
      </div>
      <div class="content">
      <ul class="list-group" id='usersList'>

      </ul>
      </div>

    </div>
  </div>
</div>



<script id="usersListTemplate" type="text/x-jsrender">
<li class="list-group-item">
{{:first_name}} {{:last_name}} ({{:email}}) <span class='text-muted' id='userStatus-{{:userId}}' ><i class='fa fa-check'></i></span>
</li>
</script>

<script>

$.getJSON('/api/users/listall', function(data)
  {
    var users = data.items;

    var template = $.templates("#usersListTemplate");
    var htmlOutput = template.render(users);
    $("#usersList").append(htmlOutput);
    

    $.each(users, function(key,user)
      {
          var userEmail = user.email;
          var firstName = user.first_name;
          var lastName = user.last_name;
          var userId = user.userId;

          var userData = '';
          

      });

  });


</script>