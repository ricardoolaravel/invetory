@extends('adminlte::page')

@section('title', 'Cadastro de funcionários')
    
@section('content_header')
    <h1>Cadastro de Funcionarios</h1>
    @include('admin.includes.alerts')
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <label for="">Nome</label>
            <div class="form-group">
                <input type="text" name="name" class="form-control" id="" placeholder="Nome do funcionário">
            </div>

            <label for="">Email</label>
            <div class="form-group">
                <input type="email" name="email" class="form-control" id="" placeholder="Email cadastrado">
            </div>

            <div class="form-group">
                <label for="">Setor</label>
                <select class="form-control" id="" name="sector_id" placeholder="Escolha o setor">
                    @foreach ($sectors as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-dark"> <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar</button>
            </div>
        </form>
    </div>
</div>
    
@stop