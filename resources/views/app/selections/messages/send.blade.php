@extends('layouts.master')

@section('page-title')
	Enviar mensagem
@endsection

@section('content')

<div class="row">
	<div class="col">
		<h2>Enviar mensagem</h2>

		<toolbar>
			<toolbar-link link="javascript:history.back()" icon="times" >Cancelar</toolbar-link>
		</toolbar>

	</div>
</div>

@endsection

@section('local-footer')

<script>
	new Vue({

		    el: '#up-app'
		});
</script>

@endsection
