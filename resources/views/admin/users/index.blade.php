@extends('adminlte::page')

@section('title', 'Listagem de Usuários')

@section('content_header')
    <h1>
        <a href="{{ route('users.create') }}" class="btn btn-success">Add</a>
        Usuários
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}">Dashboard</a></li>
        <li><a href="{{ route('users.index') }}" class="active">Usuários</a></li>
    </ol>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <form action="{{ route('users.search') }}" method="POST" class="form form-inline">
                @csrf

                <input type="text" name="name" value="{{ $data['name'] ?? '' }}" placeholder="Nome">
                <input type="text" name="email" value="{{ $data['email'] ?? '' }}" placeholder="E-mail">
                <button type="submit" class="btn btn-success">Pesquisar</button>
            </form>

            @if(isset($data))
                <a href="{{ route('users.index') }}">(x) Limpar Resultados da Pesquisa</a>
            @endif
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
                        <th scope="col">E-mail</th>
                        <th width="200px" scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="bad bg-yellow">
                                Editar
                            </a>
                            &nbsp;
                            <a href="{{ route('users.show', $user->id) }}" class="bad bg-gray">
                                Detalhes
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if (isset($data))
                {!! $users->appends($data)->links() !!}
            @else
                {!! $users->links() !!}
            @endif

        </div>
    </div>
@stop