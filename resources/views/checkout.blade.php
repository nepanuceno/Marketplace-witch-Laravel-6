@extends('layouts.front')

@section('content')

    <div class="container">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dados para Pagamento</h2>
                    <hr>
                </div>
            </div>


            <form action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Número do Cartão</label>
                            <input type="text" name="card_number" id="card_number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 form-group">
                        <label for="">Mês</label>
                        <input type="text" name="card_month" id="card_month" class="form-control">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Ano</label>
                        <input type="text" name="card_year" id="card_year" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Cód. Seguraça</label>
                        <input type="text" name="card_cvv" id="card_cvv" class="form-control">
                    </div>
                </div>

                <button class="btn btn-success">Confirmar Compra</button>
            </form>
        </div>
    </div>

@endsection
