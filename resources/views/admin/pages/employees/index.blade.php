@extends('adminlte::page')

@section('title', 'Funcinários')
    
@section('content_header')
 
    <h1>Funcionários</h1>
 
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('employees.search') }}" method="post" class="form form-inline float-right">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisar funcionários" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Pesquisar</button>
            </form>
            <a href="{{ route('employees.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Novo</a>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Setor</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>
                                {{ $employee->name }}
                            </td>
                            <td>
                                {{ $employee->email }}
                            </td>
                            <td>
                                {{ $employee->sector->name }}
                            </td>
                            <td>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                </form>          
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Puxa a paginação de 10 --}}
        <div class="card-footer">
            @if (isset($filters))
                {!! $employees->appends($filters)->links() !!}
           @else
            {!! $employees->links() !!}
           @endif
        </div>
      
    </div>
@stop