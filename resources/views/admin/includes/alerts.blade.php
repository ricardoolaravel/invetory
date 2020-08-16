@if ($errors->any())
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
  </div>
@endif

@if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
@endif

@if (session('accept'))
<div class="alert alert-success" role="alert">
     <strong>Sucesso!</strong>  {{ session('accept') }}
    </div>
@endif
