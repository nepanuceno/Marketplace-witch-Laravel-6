@extends('layouts.front')

@section('content')

    <div class="card text-center">
        <div class="card-header">
            Detalhes do Produto
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $product->description }}</h5>
            <p class="card-text">{{ $product->body }}</p>
            <dov class="row">
            @foreach( $product->photos as $photo)
                <div class="col-4">
                    <img src="{{ asset('storage/'.$photo->image) }}" alt="" class="img-fluid">
                </div>
            @endforeach
            </dov>

        </div>
        <div class="card-footer text-muted">
            Loja: {{ $product->store->name }}
            <img src="{{ asset('storage/'.$product->store->logo) }}" alt="" class="img-fluid img-thumbnail">
            <span class="card-text btn btn-secondary"> {{ 'R$ '. number_format($product->price, 2, ',', '.') }}</span>
            <a href="#" class="btn btn-primary">Comprar</a>
        </div>
    </div>

@endsection
