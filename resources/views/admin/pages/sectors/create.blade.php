@extends('adminlte::page')

@section('title', 'Cadastro de Setores')
    
@section('content_header')
    <h1>Cadastro de Setores</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('sectors.store') }}" method="POST">
                @csrf

                @include('admin.pages.sectors._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop