@extends('adminlte::page')

@section('title', 'Marcas')
    
@section('content_header')
 
    <h1>Marcas e Fabricantes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            @include('admin.includes.alerts')

            <div class="container">
                <div class="row">
                    <div class="col-sm">
                     
                        <a href="{{ route('providers.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Novo</a>

                    </div>
                    <div class="col-sm">
                        
                        <p class="small">Marcas cadastradas: {{ $providers->count() }}</p>
                   
                    </div>

                    <div class="col-sm">
                        <form action="{{ route('providers.search') }}" method="post" class="form form-inline float-right">
                            @csrf
                            <input type="text" name="filter" placeholder="Pesquisar tipos" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                            <button type="submit" class="btn btn-dark">Pesquisar</button>
                        </form> 

                    </div>
                </div>
            </div>
            
           
            
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Fabricante</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($providers as $provider)
                    <tr>
                        <td>
                            {{ $provider->name }}
                        </td>
                        <td>
                            <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('providers.destroy', $provider->id) }}" method="post" style="display: inline-block">
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
                {!! $providers ?? '' ?? ''->appends($filters)->links() !!}
           @else
            {!! $providers ?? '' ?? ''->links() !!}
           @endif
        </div>
      
    </div>
@stop