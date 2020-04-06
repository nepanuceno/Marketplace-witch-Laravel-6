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
                            <label for="">Nome Igual está no Cartão<span class="brand"></span></label>
                            <input type="text" name="card_name" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Número do Cartão <span class="brand"></span></label>
                            <input type="text" name="card_number" class="form-control">
                            <input type="hidden" name="card_brand">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 form-group">
                        <label for="">Mês</label>
                        <input type="text" name="card_month" class="form-control">
                    </div>
                    <div class="col-md-2 form-group">
                        <label for="">Ano</label>
                        <input type="text" name="card_year" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 form-group">
                        <label for="">Cód. Seguraça</label>
                        <input type="text" name="card_cvv" class="form-control">
                    </div>
                </div>

                <div class="row d-none">
                    <div class="col-md-4 form-group">
                        <label for="">Opções de Parcelamento</label>
                        <select name="installments_options" id="installments_options" class="installments_selected">

                        </select>
                    </div>
                </div>

                <div class="row d-none total">
                    <div class="col-12">
                        <h3>Total <span class="badge badge-secondary valor_total"></span></h3>
                    </div>
                </div>
                <hr class="mt-5">
                <button class="btn btn-success btn-lg processCheckout">Confirmar Compra</button>
            </form>
        </div>
    </div>

@endsection


@section('javascript')

    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="{{ asset('js/jquery-ajax.min.js') }}"></script>
    <script !src="">
        function NumberToMoney(value)
        {
            let $value = value*1;
            let $result = $value.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            return $result;
        }
    </script>
    <script !src="">
        const sessionId = '{{ session()->get('pagseguro_session_code') }}';
        PagSeguroDirectPayment.setSessionId(sessionId);
    </script>

    <script>
        let cardNumber = document.querySelector('input[name=card_number]');
        let spanBrand = document.querySelector('span.brand');
        let installments_options = document.querySelector('#installments_options');
        let installments_options_div = document.querySelector('.row.d-none');

        cardNumber.addEventListener('keyup', function(){
            if(cardNumber.value.length >= 6) {
                PagSeguroDirectPayment.getBrand({
                cardBin: cardNumber.value.substr(0,6),
                    success: function(res) {
                        //console.log(res, 'Sucesso');
                        let imgLlag = `<img src="https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${res.brand.name}.png">`;
                        spanBrand.innerHTML = imgLlag;

                        document.querySelector('input[name=card_brand]').value = res.brand.name;

                        getInstallments(20000, res.brand.name);
                    },
                    error: function (err) {
                        console.log(err, "Deu erro no cartão, ou a sessão expirou!");
                    },
                    complete: function (res) {
                        //console.log(res, 'Completo');
                    }
                });
            }
        });

        let submitButton = document.querySelector('button.processCheckout');

        submitButton.addEventListener('click', function (event) {
            event.preventDefault();
            PagSeguroDirectPayment.createCardToken({
                cardNumber: document.querySelector('input[name=card_number]').value,
                brand: document.querySelector('input[name=card_brand]').value,
                cvv: document.querySelector('input[name=card_cvv]').value,
                expirationMonth: document.querySelector('input[name=card_month]').value,
                expirationYear: document.querySelector('input[name=card_year]').value,
                success: function (res) {
                    console.log("TOKEN: ",res);
                    processPayment(res.card.token)
                },
                error: function () {

                },
                complet: function () {

                }
            });
        });


        function processPayment(token) {
            let data = {
                card_token: token,
                hash: PagSeguroDirectPayment.getSenderHash(),
                installment: document.querySelector('.installments_selected').value,
                card_name: document.querySelector('input[name=card_name]').value,
                _token: '{{ csrf_token() }}'
            };
            $.ajax({
                type: 'POST',
                url:'{{ route("checkout.proccess") }}',
                data: data,
                dataType:'json',

                success: function(res){
                    console.log(res);
                },
                error: function (res) {
                    console.log('ERROR:', res);
                }
            });
        }

        function getInstallments(amount, brand)
        {
            PagSeguroDirectPayment.getInstallments({
                amount: amount,
                brand: brand,
                masInstallmentNoInterest: 0,
                success: function (res) {
                    //console.log(res.installments[brand]);
                    installments_options_div.classList.remove("d-none");

                    var aux='';
                    res.installments[brand].forEach(function(item){
                        console.log(item);

                        aux += `<option data-valor="${item.installmentAmount} "value="${item.quantity }|${item.installmentAmount}">${item.quantity}X de R$ ${NumberToMoney(item.installmentAmount)} com o Total de <strong>${ "R$ "+NumberToMoney(item.totalAmount) } </strong></option>`
                    });

                    console.log("OPTION: ",aux);

                    installments_options.innerHTML = aux;

                    var valor ='';
                        installments_options.addEventListener('change', function(){
                        valor = installments_options[installments_options.selectedIndex].getAttribute('data-valor');
                        console.log(valor);

                        document.querySelector('.total').classList.remove('d-none');
                        document.querySelector('.valor_total').innerHTML = "R$ "+NumberToMoney(valor);
                    });
                },
                error: function () {

                },
                complet: function () {

                }
            });
        }
    </script>
@endsection
