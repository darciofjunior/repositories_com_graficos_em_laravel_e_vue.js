@csrf
<div class="form-group">
    <input type="text" name="name" value="{{ $user->name ?? old('name') }}" class="form-control" placeholder="Nome">
</div>
<div class="form-group">
    <input type="text" name="email" value="{{ $user->email ?? old('email') }}" class="form-control" placeholder="Email">
</div>
<div class="form-group">
    <input type="password" name="password" class="form-control" placeholder="Senha">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>