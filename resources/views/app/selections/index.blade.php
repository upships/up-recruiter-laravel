@extends('layouts.master')
@section('page-title','Vagas em aberto')

@section('content')

<div class="row">
  	<div class="col">

    	<div class="list-group" id='selectionsList'>
      		<div class="list-group-item">
      			<h2 class="list-group-item-heading">
      				Processos seletivos em aberto
      			</h2>
	  		</div>
	      	
        <selections-list>
            <selections-item v-for="selection in selections" :selection="selection" :key="selection.id" ></selections-item>
        </selections-list>


      </div>
	</div>
</div>
@endsection

@section('local-footer')
<script>

  new Vue({

    el: '#up-app',

    data:   {
      
      selections: []

    },

    beforeMount: function() {

      var vm = this;

      axios.get('/json/selection').then( function(response)  {

        vm.selections = response.data;

      });

    }

  });

</script>
@endsection