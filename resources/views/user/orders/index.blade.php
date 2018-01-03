@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Meus Pedidos</h1>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td width="80">
                            <img src="{{ asset("images/{$order->product_image}") }}" width="80" height="100">
                        </td>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->user_name }}</td>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->order_user_status }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
