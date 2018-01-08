@extends('layouts.master')
@section('page-title','Ranks')

@section('content')

	<h2>Ranks</h2>

  <div class="row">

    <div class="col-3">
      @include('app.data.menu')
    </div>
    <div class="col">

      <div class="list-group" >
        <div class="list-group-item">

          <form method="post" action="/data/rank" >

            {{csrf_field()}}

            <div class="row" >
              <div class="col" >
                <input type="text" name="label" class="form-control" placeholder="Rank label" />
              </div>
              <div class="col" >
                <input type="text" name="code" class="form-control" placeholder="Code" />
              </div>
              <div class="col-2" >
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus" ></i> Add</button>
              </div>
            </div>
          </form>
        </div>

        @foreach($ranks as $rank)
          <a class="list-group-item" href="/data/rank/{{$rank->id}}">
            {{$rank->label}}
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endsection
