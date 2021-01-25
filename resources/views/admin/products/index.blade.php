@extends('adminlte::page')

@section('title', 'Listagem de Produtos')

@section('content_header')
    <h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">Add</a>
        Produtos
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}" class="active">Produtos</a></li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
                @csrf

                <select name="category" class="form-control">
                    <option value="" style="color:red">Categorias</option>
                    @foreach ($categories as $id => $category)
                        <option value="{{ $id }}"   @if(isset($filters['category']) && $filters['category'] == $id)
                                                        selected
                                                    @endif
                        >{{ $category }}</option>
                    @endforeach

                </select>

                <input type="text" name="name" value="{{ $filters['name'] ?? '' }}" placeholder="Nome">
                <input type="text" name="price" value="{{ $filters['price'] ?? '' }}" placeholder="Preço">
                <button type="submit" class="btn btn-success">Pesquisar</button>
            </form>
        </div>
    </div>

    <div class="box box-success">
        <div class="box-body">

            @include('admin.includes.alerts')

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Preço</th>
                        <th width="200px" scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="bad bg-yellow">
                                Editar
                            </a>
                            &nbsp;
                            <a href="{{ route('products.show', $product->id) }}" class="bad bg-gray">
                                Detalhes
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if (isset($filters))
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
            @endif

        </div>
    </div>
@stop