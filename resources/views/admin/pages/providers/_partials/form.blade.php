@include('admin.includes.alerts')



<div class="form-group">
    <input type="text" name="name" class="form-control" id="" placeholder="Tipo de equipamento" value="{{ $provider->name ?? old('name')}}">
</div>
