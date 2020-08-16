@extends('adminlte::page')

@section('title', 'Cadastro de Marcas')
    
@section('content_header')
    <h1>Cadastro de Marcas</h1>
@stop

@section('content')
  
    <div class="card">
        <div class="card-body">
            <form action="{{ route('providers.store') }}" method="POST">
                @csrf

                @include('admin.pages.types._partials.form')

                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@stop