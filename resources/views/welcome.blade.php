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
@endsection
