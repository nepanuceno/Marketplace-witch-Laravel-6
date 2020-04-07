<?php

namespace App\Http\Controllers;

use App\Payment\PagSeguro\CreditCard;
use Illuminate\Http\Request;
use function foo\func;

class CheckoutController extends Controller
{
    public function index()
    {
        if(!auth()->check()) {
            return redirect()->route('login');
        }
//      session()->forget('pagseguro_session_code');
        $this->makePagSeguroSession();

        $cartItems = array_map(function ($line){
            return $line['amount'] * $line['price'];
        }, session()->get('cart'));

        $cartItems = array_sum($cartItems);

//        dd($cartItems);

        session()->get('pagseguro_session_code');
        return view('checkout', compact('cartItems'));
    }

    public function proccess(Request $request)
    {

        try {
            $cartItems = session()->get('cart');
            $reference = 'XPTO';
            $user = auth()->user();

            $creditCardPayment = new CreditCard( $cartItems, $user, $request->all(), $reference);
            $result = $creditCardPayment->doPayment();

            $userOrder = [
                'reference' => $reference,
                'pagseguro_code' => $result->getCode(),
                'pagseguro_status' => $result->getStatus(),
                'items' => serialize($cartItems),
                'store_id' => 41,
            ];

            $user->orders()->create($userOrder);

            session()->forget('cart');
            session()->forget('pagseguro_session_code');

            return response()->json(
                [
                    'data' => [
                        'status' => true,
                        'message' => 'Pedido criado com sucesso!'
                    ]
                ]
            );


        } catch (\Exception $e){
            return response()->json([
                    'data' => [
                        'status' => false,
                        'message' => $e->getMessage(),
                        'order' => $reference
                    ]
            ],401);
        }

    }

    public function thanks()
    {
        return view('thanks');
    }



    private function makePagSeguroSession()
    {
        if (!session()->has('pagseguro_session_code')) {
            $sessionCode = \PagSeguro\Services\Session::create(\PagSeguro\Configuration\Configure::getAccountCredentials());
            session()->put('pagseguro_session_code',$sessionCode->getResult());
        }
    }


}
