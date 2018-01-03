@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Produtos</h1>
            @foreach($products as $product)
                <div class="col-md-2" style="margin-right: 35px;">
                    <a href="{{ route('user.products.show', $product->id) }}" class="btn">
                        <img src="{{ asset("images/$product->image") }}" width="200">
                    </a>
                    <div class="item">
                        <div class="text-center">
                            <strong>{{ $product->name }}</strong>
                        </div>
                        <div class="text-center" style="font-size: 20px">
                            <strong>R$ {{ number_format($product->amount, '2', ',', '.') }}</strong>
                        </div>
                        <div class="text-center">
                            <a href="{{ route('user.products.show', $product->id) }}" class="btn btn-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbsp; Comprar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
