@extends('adminlte::page')

@section('title', 'Setores')
    
@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a  href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}" class="active">Setores</a></li>
    </ol>
    <h1>Setores</h1>
 
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('sectors.search') }}" method="post" class="form form-inline float-right">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisa de setores" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Pesquisar</button>
            </form>
            <a href="{{ route('sectors.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Novo</a>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sectors as $sector)
                        <tr>
                            <td>
                                {{ $sector->name }}
                            </td>
                            <td>
                               
                                <a href="{{ route('sectors.show', $sector->id) }}" class="btn btn-dark"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('sectors.edit', $sector->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $sectors->appends($filters)->links() !!}
               
           @else
            {!! $sectors->links() !!}
           @endif
        </div>
    </div>
@stop