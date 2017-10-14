@extends('layouts.master')
@section('page-title','Funções')

@section('content')
    
    <h2>{{$position->label}}</h2>

    <div class="card card-default">
        <div class="card-block">
            <form method="post" action="/data/position/{{$position->id}}" >
                {{csrf_field()}}
                {{method_field('PATCH')}}

                <div class="form-group">
                    <label for='label'>Nome da fun&ccedil;&atilde;o</label>
                    <input type="text" name="label" id="label" class="form-control" placeholder="Nome" value="{{$position->label}}" />
                </div>

                <div class="form-group">
                    <label for='label'>Código da fun&ccedil;&atilde;o</label>
                    <input type="text" name="code" id="code" class="form-control" placeholder="Código" value="{{$position->code}}" />
                </div>

                <div class="form-group">
                    <label for='type'>Nome da fun&ccedil;&atilde;o</label>
                    <select name="type" class="form-control" >
                        <option value="1" @if($position->type == 1)selected @endif>De bordo</option>
                        <option value="2" @if($position->type == 2)selected @endif>Onshore</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success"><i class="icon-floppy-disk" ></i> Salvar</button>
            </form>
        </div>
    </div>

    <div class="card card-default">
        <div class="card-block">
            <form method="post" action="/data/position/{{$position->id}}" >
                {{csrf_field()}}
                {{method_field('DELETE')}}

                <button type="submit" class="btn btn-danger btn-sm"><i class="icon-trash" ></i> Apagar</button>
            </form>
        </div>
    </div>
@endsection
