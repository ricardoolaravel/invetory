@extends('adminlte::page')

@section('title', 'Edição de Marca')
    
@section('content_header')
    <h1>Editar {{ $provider->name }}</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('providers.update', $provider->id) }}" method="POST" style="display: inline-block">
                @csrf
                @method('PUT')

                @include('admin.pages.providers._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-edit" aria-hidden="true"></i> Editar</button>
                </div>

            </form>
        </div>
    </div>
@stop