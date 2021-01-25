<div class="form-group">
    <input type="text" name="name" value="{{ $product->name ?? old('name') }}" class="form-control" placeholder="Nome">
</div>
<div class="form-group">
    <input type="text" name="url" value="{{ $product->url ?? old('url') }}" class="form-control" placeholder="URL">
</div>
<div class="form-group">
    <input type="text" name="price" value="{{ $product->price ?? old('price') }}" class="form-control" placeholder="Preço">
</div>
<div class="form-group">
    <select name="category_id" class="form-control">
        <option value="" style="color:red">Escolha</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                @if($category->id == $product->category_id) selected @endif
            >{{ $category->title }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Descrição">{{ $product->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>