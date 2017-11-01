@extends('layouts.master')

@section('page-title','Vagas em aberto')

@section('content')

<div class="row">
    <div class="col">
    
        <h2>Company information</h2>

        <div class="card card-default no-padding">
            <div class="d-flex align-content-start">
                <div class="m-3">
                    <img src="{{$company->logo_path}}" style="width: 80px;" >
                </div>
                <div>
                    <h4>{{$company->name}}</h4>

                    <div class="d-flex align-content-start">
                        
                        <a href="//{{$company->careers_url}}" target="_blank" class="m-2 btn btn-default btn-sm btn-rounded">
                            Open Careers Page <i class="fa fa-external-link"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="card card-borderless">
            <ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
                <li class="nav-item">
                    <a class="active" href="#" data-toggle="tab" role="tab" data-target="#tab-about">
                        Company info
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab" data-target="#tab-recruiters"> 
                        Recruiters
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab" data-target="#tab-settings">
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab" data-target="#tab-log">
                        Activity log
                    </a>
                </li>
            </ul>

            <div class="tab-content"> 

                <div id="tab-about" class="tab-pane active">

                    @include('app.company.pages.about', ['company' => $company])

            	</div>

                <!-- Activities -->
                <div id="tab-log" class="tab-pane">

                    @include('app.company.pages.activities', ['company' => $company])

                </div>

                <!-- Recruiters -->
                <div id="tab-recruiters" class="tab-pane">
        			
                    @include('app.company.pages.recruiters', ['company' => $company])

                </div>

                <!-- Settings -->
                <div id="tab-settings" class="tab-pane">
                	
                    @include('app.company.pages.settings', ['company' => $company])

                </div>
            </div>
        </div>
 
    </div>
</div>
@endsection