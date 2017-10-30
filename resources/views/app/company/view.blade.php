@extends('layouts.master')

@section('page-title','Vagas em aberto')

@section('content')

<div class="row">
    <div class="col">
    
        <h2>Company information</h2>

    </div>
</div>
<div class="row m-t-30">
    <div class="col-sm-12">
        <div class="panel panel-default p-0">
            <div class="panel-body p-0">

                <ul class="nav nav-tabs profile-tabs">
                    <li class="active"><a data-toggle="tab" href="#about">Informa&ccedil;&otilde;es</a></li>
                    <li class=""><a data-toggle="tab" href="#log">Registro de Atividades</a></li>
                    <li class=""><a data-toggle="tab" href="#recruiters">Recrutadores</a></li>
                    <li class=""><a data-toggle="tab" href="#settings">Configura&ccedil;&otilde;es</a></li>
                </ul>

                <div class="tab-content m-0"> 

                    <div id="about" class="tab-pane active">

                        @include('app.company.pages.about', ['company' => $company])

                	</div>

                    <!-- Activities -->
                    <div id="log" class="tab-pane">

                        @include('app.company.pages.activities', ['company' => $company])

                    </div>

                    <!-- Recruiters -->
                    <div id="recruiters" class="tab-pane">
						
                        @include('app.company.pages.recruiters', ['company' => $company])

                    </div>

                    <!-- Settings -->
                    <div id="settings" class="tab-pane">
                    	
                        @include('app.company.pages.settings', ['company' => $company])

                    </div>
                </div>
 
            </div> 
        </div>
    </div>
</div>

@endsection