<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        if(!auth()->check()) {
            return redirect()->route('login');
        }
//      session()->forget('pagseguro_session_code');
        $this->makePagSeguroSession();
        session()->get('pagseguro_session_code');
        return view('checkout');
    }

    public function proccess(Request $request)
    {
        $reference = 'XPTO';
        //Instantiate a new direct payment request, using Credit Card
        $creditCard = new \PagSeguro\Domains\Requests\DirectPayment\CreditCard();

        /**
         * @todo Change the receiver Email
         */
        $creditCard->setReceiverEmail(env('PAGSEGURO_EMAIL'));

        // Set a reference code for this payment request. It is useful to identify this payment
        // in future notifications.
        $creditCard->setReference($reference);

        // Set the currency
        $creditCard->setCurrency("BRL");

// Add an item for this payment request

        $cartItems = session()->get('cart');

        foreach ($cartItems as $item){
            $creditCard->addItems()->withParameters(
                $reference,
                $item['name'],
                $item['amount'],
                $item['price']
            );
        }

// Set your customer information.
// If you using SANDBOX you must use an email @sandbox.pagseguro.com.br
        $dataPost = $request->all();
        $user = auth()->user();
        $email = env('PAGSEGURO_ENV') == 'sandbox' ? 'test@sandbox.pagseguro.com.br' : $user->email;
        $creditCard->setSender()->setName($user->name);
        $creditCard->setSender()->setEmail($email);

        $creditCard->setSender()->setPhone()->withParameters(
            11,
            56273440
        );

        $creditCard->setSender()->setDocument()->withParameters(
            'CPF',
            '29670090164'
        );

        $creditCard->setSender()->setHash($dataPost['hash']);

        $creditCard->setSender()->setIp('127.0.0.0');

// Set shipping information for this payment request
        $creditCard->setShipping()->setAddress()->withParameters(
            'Av. Brig. Faria Lima',
            '1384',
            'Jardim Paulistano',
            '01452002',
            'São Paulo',
            'SP',
            'BRA',
            'apto. 114'
        );

//Set billing information for credit card
        $creditCard->setBilling()->setAddress()->withParameters(
            'Av. Brig. Faria Lima',
            '1384',
            'Jardim Paulistano',
            '01452002',
            'São Paulo',
            'SP',
            'BRA',
            'apto. 114'
        );

// Set credit card token
        $creditCard->setToken($dataPost['card_token']);

// Set the installment quantity and value (could be obtained using the Installments
// service, that have an example here in \public\getInstallments.php)
        list($quantity, $installmentAmount) =  explode('|', $dataPost['installment']);
        $creditCard->setInstallment()->withParameters($quantity, $installmentAmount);

// Set the credit card holder information
        $creditCard->setHolder()->setBirthdate('01/10/1979');
        $creditCard->setHolder()->setName($dataPost['card_name']); // Equals in Credit Card

        $creditCard->setHolder()->setPhone()->withParameters(
            11,
            56273440
        );

        $creditCard->setHolder()->setDocument()->withParameters(
            'CPF',
            '29670090164'
        );

// Set the Payment Mode for this payment request
        $creditCard->setMode('DEFAULT');

        $result = $creditCard->register(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );

        var_dump($result);
    }

    private function makePagSeguroSession()
    {
        if (!session()->has('pagseguro_session_code')) {
            $sessionCode = \PagSeguro\Services\Session::create(\PagSeguro\Configuration\Configure::getAccountCredentials());
            session()->put('pagseguro_session_code',$sessionCode->getResult());
        }
    }


}
