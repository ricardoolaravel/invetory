


<div class="form-group">
    <input type="text" name="name" class="form-control" id="" placeholder="Nome do funcionário" value="{{ $sector->name ?? old('name')}}" required>
</div>
<div class="form-group">
    <input type="mail" name="details" class="form-control" id="" placeholder="Email cadastrado" value="{{ $employ->details ?? old('details') }}" required>
</div>