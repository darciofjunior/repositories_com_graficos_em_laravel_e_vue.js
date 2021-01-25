@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>
        Editar Categoria: {{ $category->title }}
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li><a href="{{ route('categories.edit', $category->id) }}" class="active">Editar</a></li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            @include('admin.includes.alerts')

            <form action="{{ route('categories.update', $category->id) }}" method="POST" class="form">
                <input type="hidden" name="_method" value="PUT">
                @include('admin.categories.partials.form')
            </form>
        </div>
    </div>
@stop