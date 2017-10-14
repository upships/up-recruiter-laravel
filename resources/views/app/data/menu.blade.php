<?php

$data_types = 	(object)	[
								(object) ['name' => 'certificate_type', 'label' => 'Tipos de certificados'],
								(object) ['name' => 'country', 'label' => 'Países'],
								(object) ['name' => 'currency', 'label' => 'Moedas'],
								(object) ['name' => 'document_type', 'label' => 'Tipos de documentos'],
								(object) ['name' => 'dp_type', 'label' => 'Posicionamento dinâmico'],

								(object) ['name' => 'education_level', 'label' => 'Niveis de escolaridade'],
								(object) ['name' => 'language', 'label' => 'Idiomas'],
								(object) ['name' => 'position', 'label' => 'Funções'],
								(object) ['name' => 'seaman_book_type', 'label' => 'Categorias CIR'],
								(object) ['name' => 'ship_department', 'label' => 'Departamentos da embarcação'],
								(object) ['name' => 'ship_type', 'label' => 'Tipos de embarcações'],
								(object) ['name' => 'stcw_regulation', 'label' => 'Regras STCW'],
								(object) ['name' => 'training', 'label' => 'Treinamentos'],
							];

?>

<div class="list-group">
    @foreach($data_types as $type)
    <a href="/data/{{$type->name}}" class="list-group-item">
        {{$type->label}}
    </a>
    @endforeach
</div>