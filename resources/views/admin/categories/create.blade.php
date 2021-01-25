@extends('adminlte::page')

@section('title', 'Cadastrar Nova Categoria')

@section('content_header')
    <h1>
        Cadastrar Nova Categoria
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('categories.index') }}">Categorias</a></li>
        <li><a href="{{ route('categories.create') }}" class="active">Cadastrar</a></li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            @include('admin.includes.alerts')

            <form action="{{ route('categories.store') }}" method="POST" class="form">
                @include('admin.categories.partials.form')
            </form>
        </div>
    </div>
@stop