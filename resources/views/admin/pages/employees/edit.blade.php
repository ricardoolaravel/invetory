@extends('adminlte::page')

@section('title', 'Cadastro de funcionários')
    
@section('content_header')
    <h1>Editar {{ $employee->name }}</h1>
    @include('admin.includes.alerts')
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('employee.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="">Nome</label>
            <div class="form-group">
                <input type="text" name="name" class="form-control" id="" value="{{ $employee->name }}">
            </div>

            <label for="">Email</label>
            <div class="form-group">
                <input type="email" name="email" class="form-control" id="" value="{{ $employee->email }}">
            </div>

            <div class="form-group">
                <label for="">Setor</label>
                <select class="form-control" id="" name="sector_id" placeholder="Escolha o setor">
                    <option selected value="{{ $employee->sector->id }}">{{ $employee->sector->name }}</option>
                    @foreach ($sectors as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-dark"> <i class="fa fa-plus" aria-hidden="true"></i>Editar</button>
            </div>
        </form>
    </div>
</div>
    
@stop