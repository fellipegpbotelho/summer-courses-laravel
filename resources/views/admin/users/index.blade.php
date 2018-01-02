@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Usuários</h1>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>Data de cadastro</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->cpf }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ date('d/m/Y \\à\\s H:i:s', strtotime($user->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@endsection
