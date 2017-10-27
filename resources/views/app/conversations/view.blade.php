@extends('layouts.master')

@section('page-title')
	Ver conversa
@endsection

@section('content')

<div class="row">
	<div class="col">

		<h2>Ver conversa</h2>

		<toolbar>
			
			<toolbar-item link="/conversation" icon="angle-left" >Todas as conversas</toolbar-item>

			@if($conversation->selection_id)
				<toolbar-item link="/selection/{{$conversation->selection_id}}" icon="users" >Processo seletivo</toolbar-item>
			@endif

			@if($conversation->job_id)
				<toolbar-item link="/job/{{$conversation->job_id}}" icon="suitcase" >Vaga</toolbar-item>
			@endif

		</toolbar>

		<div class="row">
			<div class="col-3">
				<h5>Integrantes</h5>

				<div class="card card-default">
					
					<div class="list-group list-group-flush">
						@foreach($conversation->members as $member)
						<div class="list-group-item d-flex justify-content-between">
							<span>
								{{$member->user->name}} 
							</span>

							@if($member->user_type == 1)
							<span>recruiter</span>
							@endif
						</div>
						@endforeach
					</div>

				</div>
			</div>
			<div class="col">
				<h5>Mensagens</h5>

				@foreach($conversation->messages as $message)
					<div class="card card-default">
						<div class="card-header">
							<div class="card-title">
								{{$message->conversation_member->user->name}} escreveu
							</div>
							<div class="card-block">
								{{$message->message}}
							</div>
						</div>
					</div>
				@endforeach


			</div>
		</div>



	</div>
</div>



@endsection

@section('local-footer')

<script>

	new Vue({

		    el: '#up-app',

		});
</script>

@endsection