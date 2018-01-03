@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Dashboard - Administrador</h1>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4"><a href="{{ route('admin.users.index') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Clientes</a></div>
                    <div class="col-md-4"><a href="{{ route('admin.products.index') }}"><i class="fa-product-hunt" aria-hidden="true"></i>&nbsp; Produtos</a></div>
                    <div class="col-md-4"><a href="{{ route('admin.orders.index') }}"><i class="fa fa-first-order" aria-hidden="true"></i>&nbsp; Pedidos</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
