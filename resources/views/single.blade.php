@extends('layouts.front')

@section('content')

    <div class="col-md-12 rounded bg-dark">
        <div class="row border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-static">
            <div class="col p-4 d-flex flex-column position-static">
                <h1 class="display-4 font-italic">{{ $product->store->name }}</h1>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="{{ asset('storage/'.$product->store->logo) }}" width="200" height="auto">
            </div>
        </div>
    </div>

    <div class="card text-center">
        <div class="card-header">
            Detalhes do Produto
        </div>
        <div class="row">
            <div class="col-md-9 copl-xs-12 col-sm-8">

                <div class="card-body">
                    <h5 class="card-title">{{ $product->description }}</h5>
                    <p class="card-text">{{ $product->body }}</p>
                    <div class="row">
                    @foreach( $product->photos as $photo)
                        <div class="col-4">
                            <img src="{{ asset('storage/'.$photo->image) }}" alt="" class="img-fluid">
                        </div>
                    @endforeach
                    </div>
                </div>

            </div>
            <div class="col-md-2 col-xs-12 shadow p-3 mb-2 mt-2 bg-white">


                <div class="row">
                    <div class="col-12">
                        <label for="preco-total"><h3>Preço:</h3> </label>
                        <h2><span class="card-text badge badge-secondary" id="preco-total"></span></h2>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="form-row">
                        <div class="form-group">
                            <form action="{{ route('cart.add') }}" method="post">
                                @csrf
                                <label for="">Quant.</label>
                                <input type="number" name="product[amount]" id="quantidade" min="1" class="col-md-8 col-xs-4" value="1">
                                <input type="hidden" name="product[name]" value="{{ $product->name }}">
                                <input type="hidden" name="product[slug]" value="{{ $product->slug }}">
                                <input type="hidden" name="product[price]" id="preco" value="{{ $product->price }}">
                                <button type="submit" class="btn btn-danger btn-lg mt-2">Comprar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted position-relative">

        </div>
    </div>
@section('javascript')
    <script !src="">
        function NumberToMoney(value)
        {
            let $value = value*1;
            let $result = $value.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            return $result;
        }

        let quant = document.querySelector("#quantidade");
        let preco = document.querySelector("#preco").value * 1;
        let precoTotal = document.querySelector("#preco-total");
        let total = 0;

        if(quant.value == 1) {
            precoTotal.innerHTML ="R$ " + NumberToMoney(preco);
        }

        quant.addEventListener('change', function(){
            let total = this.value*preco;
            precoTotal.innerHTML ="R$ " + NumberToMoney(total);
        });
    </script>
@endsection
@endsection
