@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Produto #{{ $product->id }}</h1>
            </div>
            <br><br><br><br>
            <div class="col-md-3">
                <img src="{{ asset("images/{$product->image}") }}" class="img-thumbnail">
            </div>
            <div class="col-md-7">
                <h2>{{ $product->name }}</h2>
                Por apenas: <h1>R$ {{ number_format($product->amount, '2', ',', '.') }}</h1>
                {!! Form::open(['url' => route('user.orders.store'), 'method' => 'post']) !!}
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <label for="">Quantidade:</label>
                <input type="number" min="0" name="quantity" required class="form-control"><br>
                <button class="btn btn-success" type="submit"><i class="fa fa-shopping-cart" aria-hidden="true"></i> &nbsp; Comprar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection