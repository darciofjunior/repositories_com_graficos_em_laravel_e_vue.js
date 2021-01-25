@csrf
<div class="form-group">
    <input type="text" name="title" value="{{ $category->title ?? old('title') }}" class="form-control" placeholder="Título">
</div>
<!-- <div class="form-group">
    <input type="text" name="url" value="{{ $category->url ?? old('url') }}" class="form-control" placeholder="URL">
</div> -->
<div class="form-group">
    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Descrição">{{ $category->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>