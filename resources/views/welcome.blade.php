@extends('layouts.front')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card shadow-sm mb-2" style="width: 18rem">
                            @if($product->photos->count())
                                <img src="{{ asset('storage/'.$product->photos->first()->image) }}" alt="" class="bd-placeholder-img card-img-top" width="100%" height="190">
                            @else
                                <img src="{{ asset('assets/img/no-photo.jpg') }}" alt="" class="card-img-top">
                            @endif
                            <div class="card-body text-center">
                                <h2 class="card-title">{{ $product->mame }}</h2>
                                <p class="card-text">{{ $product->description }}</p>
                                <a class="btn btn-success btn-lg" href="{{ route('product.single', ['slug'=>$product->slug]) }}">Confira</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>Lojas Destaque</h2>
        </div>
        <hr>
        @foreach($stores as $store)
        <div class="col-4">
            @if($store->logo)
                <img src="{{ asset('storage/'.$store->logo) }}" alt="{{ $store->name }}" class="img-fluid">
            @else
                <img src="http://via.placeholder.com/300x260?text=Sem Logo" alt="" class="img-fluid">
            @endif
            <h3>{{ $store->name }}</h3>
            <p>{{ $store->description }}</p>
        </div>
        @endforeach
    </div>
@endsection

@section('javascript')
    <script !src="">
        $('.dropdown-toggle').dropdown()
    </script>
@endsection
