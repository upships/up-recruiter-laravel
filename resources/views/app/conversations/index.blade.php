@extends('layouts.master')

@section('page-title')
	Conversas
@endsection

@section('content')

<div class="row">
	<div class="col">

		<h2>Conversas</h2>

		<div class="row">
			<div class="col">

				@foreach($conversations as $conversation)
					<div class="card card-default">
						<div class="card-header">
							<div class="card-title">
								{{count($conversation->members)}} integrantes
							</div>
							<div class="card-block">
								{{$conversation->subject}}
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