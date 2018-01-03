@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Produtos</h1>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Adicionar</a><br><br>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Data de cadastro</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                    <td width="80"><img src="{{ asset("images/{$product->image}") }}" width="80" height="100"></td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>R$ {{ number_format($product->amount, 2, ',', '.') }}</td>
                    <td>{{ date('d/m/Y \\à\\s H:i:s', strtotime($product->created_at)) }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
