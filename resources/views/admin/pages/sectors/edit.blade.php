@extends('adminlte::page')

@section('title', 'Edição de Setor')
    
@section('content_header')
    <h1>Editar {{ $sector->name }}</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sectors.update', $sector->url) }}" method="POST" style="display: inline-block">
                @csrf
                @method('PUT')

                @include('admin.pages.sectors._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Editar</button>
                </div>

            </form>
        </div>
    </div>
@stop