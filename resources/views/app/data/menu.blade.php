<?php

$data_types = 	(object)	[
									(object) [
										(object) ['name' => 'certificate_type', 'label' => 'Certificate types'],
										(object) ['name' => 'dp_type', 'label' => 'Dynamic Positioning'],
										(object) ['name' => 'position', 'label' => 'Positions'],
										(object) ['name' => 'rank', 'label' => 'Ranks'],
										(object) ['name' => 'training', 'label' => 'Trainings']
									],
									(object) [
										(object) ['name' => 'ship_type', 'label' => 'Types of ships'],
										(object) ['name' => 'ship_department', 'label' => 'Ship departments']
									],
									(object) [
										(object) ['name' => 'stcw_regulation', 'label' => 'STCW Regulations'],
										(object) ['name' => 'seaman_book_type', 'label' => 'Seaman book types']
									],
									(object) [
										(object) ['name' => 'country', 'label' => 'Countries'],
										(object) ['name' => 'currency', 'label' => 'Currencies'],
										(object) ['name' => 'language', 'label' => 'Languages'],
									],
									(object) [
										(object) ['name' => 'document_type', 'label' => 'Document types'],
										(object) ['name' => 'education_level', 'label' => 'Education levels']
									]
							];

?>

@foreach($data_types as $data_type_group)
	<div class="list-group my-2">
	  @foreach($data_type_group as $type)
		  <a href="/data/{{$type->name}}" class="list-group-item">
		      {{$type->label}}
		  </a>
	  @endforeach
	</div>
@endforeach
