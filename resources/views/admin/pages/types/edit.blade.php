@extends('adminlte::page')

@section('title', 'Edição de Tipo')
    
@section('content_header')
    <h1>Editar {{ $type->name }}</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('types.update', $type->id) }}" method="POST" style="display: inline-block">
                @csrf
                @method('PUT')

                @include('admin.pages.types._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-reply" aria-hidden="true"></i> Editar</button>
                </div>

            </form>
        </div>
    </div>
@stop