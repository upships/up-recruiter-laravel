@extends('admin.layouts.master')
@section('page-title','Dados do sistema')

@section('content')
	
	<h2>Dados do sistema</h2>

	<div class="row">
	  	<div class="col">

			<div class="list-group">
			    @foreach($admin_items as $item)
				    <a href="/admin/{{$item->name}}" class="list-group-item">
				        {{$item->label}}
				    </a>
			    @endforeach
			</div>

		</div>
	</div>

@endsection