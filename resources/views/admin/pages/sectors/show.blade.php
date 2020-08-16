@extends('adminlte::page')

@section('title', "Detalhes de {$sector->name}")

@section('content_header')
    <h1><b>{{ $sector->name }}</b></h1>
    <div id="app">
      @include('messages.flash-message')
    
    
        @yield('content')
    </div>
@stop

 
 
  



@section('content')
  <div class="card">
      <div class="card-header">
          <b>{{ $sector->name }}</b>
      </div>
      <div class="card-body">
          <p>
              {{ $sector->details }}
          </p>
      </div>
      <div class="card-footer">
        <a href="{{ route('sectors.edit', $sector->id) }}" class="btn btn-warning"><i class="fas fa-edit"> Editar</i></a>
          <form action="{{ route('sectors.destroy', $sector->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Excluir</button>
        </form>          
      </div>
  </div>
@stop