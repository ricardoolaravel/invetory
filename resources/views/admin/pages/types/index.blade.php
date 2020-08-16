@extends('adminlte::page')

@section('title', 'Tipo de Equipamento')
    
@section('content_header')
 
    <h1>Tipo de Equipamento</h1>
 
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')
            <form action="{{ route('types.search') }}" method="post" class="form form-inline float-right">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisar tipos" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Pesquisar</button>
            </form>
            <a href="{{ route('types.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Novo</a>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Tipo de Equipamento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($types as $type)
                    <tr>
                        <td>
                            {{ $type->name }}
                        </td>
                        <td>
                            <a href="{{ route('types.edit', $type->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('types.destroy', $type->id) }}" method="post" style="display: inline-block">
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
                {!! $types ?? '' ?? ''->appends($filters)->links() !!}
           @else
            {!! $types ?? '' ?? ''->links() !!}
           @endif
        </div>
      
    </div>
@stop