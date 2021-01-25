@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')
    <h1>
        Editar Produto
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}">Produtos</a></li>
        <li><a href="{{ route('products.edit', $product->id) }}" class="active">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            @include('admin.includes.alerts')

            {{ Form::model($product, ['route' => ['products.update', $product->id], 'class' => 'form']) }}
                @method('PUT')
                @include('admin.products.partials.form')
            {{ Form::close() }}

            <!--<form action="{{ route('products.update', $product->id) }}" method="POST" class="form">
                @method('PUT')
                @include('admin.products.partials.form')
            </form>-->
        </div>
    </div>
@stop