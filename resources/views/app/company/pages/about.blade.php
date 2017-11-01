<div class="row">
    <div class="col">

        <h3>About the company</h3>

        <div class="my-3">
            <a href="/company/edit" class="btn btn-default btn-rounded mr-2" >Edit information</a>
            <a href="/company/careers" class="btn btn-default btn-rounded" >Careers Page settings</a>
        </div>

        <div class="card card-default no-padding">
            <div class="card-block">
                <h5>Website</h5>
                {{$company->url}}
            </div>
        </div>

        <div class="row">
            
            <div class="col pl-0">

                <h5>Offices</h5>

                @foreach($company->offices as $office)
                    <div class="card card-default no-padding">
                        
                        <div class="card-block">

                            <h5>{{$office->label}}</h5>
                            {{$office->location}}
                        </div>

                        <div class="card-block">
                            <h6 class="small">Phones</h6>

                            <ul>
                                @foreach($office->phones as $phone)
                                <li>{{$phone->label}} - {{$phone->number}}</li>
                                @endforeach
                            </ul>

                            <form method="post" action="/company/phone" >
                                
                                {{csrf_field()}}

                                <input type="hidden" name="office_id" value="{{$office->id}}" >

                                <input type="hidden" name="country_code" value="{{$office->country->phone_code}}" >

                                <div class="input-group input-group-sm">
                                    <input type="text" name="label" placeholder="Label" class="form-control form-control-sm" >
                                    <input type="text" name="number" placeholder="Number" class="form-control form-control-sm" >
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default btn-xs" >
                                            <i class="fa fa-plus"></i> Save
                                        </button>
                                    </span>
                                </div>

                            </form>

                                
                        </div>

                        <div class="card-block">
                            <h6 class="small">E-mails</h6>

                            <ul>
                                @foreach($office->emails as $email)
                                <li>{{$email->label}} - {{$email->address}}</li>
                                @endforeach
                            </ul>

                            <form method="post" action="/company/email" >
                                
                                {{csrf_field()}}

                                <input type="hidden" name="office_id" value="{{$office->id}}" >

                                <div class="input-group input-group-sm">
                                    <input type="text" name="label" placeholder="Label" class="form-control form-control-sm" >
                                    <input type="text" name="address" placeholder="Email address" class="form-control form-control-sm" >
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default btn-xs" >
                                            <i class="fa fa-plus"></i> Save
                                        </button>
                                    </span>
                                </div>

                            </form>
                        </div>
                    </div>

                @endforeach
            </div>

            <div class="col">

                <h5>Other e-mails</h5>

                <div class="card card-default">

                    @foreach($company->other_emails as $email)
                        <div class="card-block">
                            <span>{{$email->label}}</span>
                            <h6 class="small">{{$email->address}}</h6>
                        </div>
                    @endforeach

                    <div class="card-block">
                        
                        <form method="post" action="/company/email" >     
                            {{csrf_field()}}

                            <div class="input-group input-group-sm">
                                <input type="text" name="label" placeholder="Label" class="form-control form-control-sm" >
                                <input type="text" name="address" placeholder="Email address" class="form-control form-control-sm" >
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default btn-xs" >
                                        <i class="fa fa-plus"></i> Save
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                <h5>Other phones</h5>
                
                <div class="card card-default">

                    @foreach($company->other_phones as $phones)
                        <div class="card-block">
                            <span>{{$phone->label}}</span>
                            <h6 class="small">{{$phone->phone}}</h6>
                        </div>
                    @endforeach

                    <div class="card-block">
                        
                        <form method="post" action="/company/phone" >     
                            
                            {{csrf_field()}}

                            <div class="input-group input-group-sm">
                                <input type="text" name="label" placeholder="Label" class="form-control form-control-sm" >
                                <input type="text" name="country_code" placeholder="Country" class="form-control form-control-sm" >
                                <input type="text" name="number" placeholder="Number" class="form-control form-control-sm" >
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default btn-xs" >
                                        <i class="fa fa-plus"></i> Save
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>