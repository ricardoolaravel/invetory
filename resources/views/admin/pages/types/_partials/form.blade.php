@include('admin.includes.alerts')



<div class="form-group">
    <input type="text" name="name" class="form-control" id="" placeholder="Fabricante ou Marca" value="{{ $type->name ?? old('name')}}">
</div>
