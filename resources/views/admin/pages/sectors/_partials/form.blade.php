@include('admin.includes.alerts')



<div class="form-group">
    <input type="text" name="name" class="form-control" id="" placeholder="Nome do setor" value="{{ $sector->name ?? old('name')}}">
</div>
<div class="form-group">
    <input type="text" name="details" class="form-control" id="" placeholder="Detalhes do setor" value="{{ $sector->details ?? old('details') }}">
</div>