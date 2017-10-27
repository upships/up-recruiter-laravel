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

		<div class="card card-default">
			<div class="card-block">
				<form method="post" action="/conversation" id="selectedApplicantsForm" >

					{{csrf_field()}}

                	<h5 class="">Destinat&aacute;rios</h5>

                	<div class="form-group d-flex justify-content-origin">

						@foreach($users as $user)							

							<div class="btn-group">
								<input type="hidden" name="users[]" value="{{$user->id}}"  >
								<a href="/profile/{{$user->profile->id}}" class="btn btn-default text-left" target="_blank" title="{{$user->profile->position->label}}" >
									{{$user->profile->name}} 
									<small class="text-muted" >({{$user->email}})</small>
								</a>
								<!-- <a href="#removeTo-{{$user->id}}" class="btn btn-default" title="Remover destinatário" onclick="removeApplicant({{$user->id}})" >
									<i class="fa fa-times"></i>
								</a> -->
							</div>

						@endforeach

					</div>

                    <!-- <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="email" name="emailCc" class="form-control" placeholder="Cc">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="emailCcc" class="form-control" placeholder="Bcc">
                            </div>
                        </div>
                    </div> -->

                    <h5 class="">Mensagem</h5>

                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Assunto" required>
                    </div>
                    
                    <trumbowyg v-model="message" :config="config" ></trumbowyg>

                    <div class="d-flex justify-content-between">
						<button type="submit" class="btn btn-success" >Enviar e-mails</button>
						<a href="javascript:history.back()" class="btn btn-default" ><i class='fa fa-times' ></i> Cancelar</a>
					</div>

					<input type="hidden" name="message" v-model="message" >

				</form>

		</div>

	</div>
</div>

@endsection

@section('local-footer')

<script>

	new Vue({

		    el: '#up-app',

		    data: {

		    	message: null,
		    	config: {
						
						btns: [
					        
					        ['undo', 'redo'], // Only supported in Blink browsers
					        ['formatting'],
					        ['strong', 'em', 'del'],
					        ['link'],
					        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
					        ['unorderedList', 'orderedList'],
					    ]
		    	}
		    },

		});
</script>

@endsection
