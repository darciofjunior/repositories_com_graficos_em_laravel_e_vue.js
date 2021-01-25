@extends('adminlte::page')

@section('title', 'Relatório Mensal de Vendas')

@section('content_header')
    <h1>
        Vue.js
    </h1>
@stop

@section('content')
    <div class="content row">
        <div class="box box-success">
            <div class="box-body">

                <reports-months-component></reports-months-component>

            </div>
        </div>
    </div>
@stop

@push('js')
    <script src="{{ url('js/app.js') }}"></script>
@endpush
