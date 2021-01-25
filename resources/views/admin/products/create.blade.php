@extends('adminlte::page')

@section('title', 'Cadastrar Novo Produto')

@section('content_header')
    <h1>
        Cadastrar Novo Produto
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('products.index') }}">Produtos</a></li>
        <li><a href="{{ route('products.create') }}" class="active">Cadastrar</a></li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            @include('admin.includes.alerts')

            <!--<form action="{{ route('products.store') }}" method="POST" class="form">
                @include('admin.products.partials.form')
            </form>-->

            {{ Form::open(['route' => 'products.store', 'class' => 'form']) }}
                @include('admin.products.partials.form')
            {{ Form::close() }}
        </div>
    </div>
@stop