<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;
use PHPSC\PagSeguro\Items\Item;
use \PHPSC\PagSeguro\PaymentService;


class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//usa usuario autenticado
    }

    public function place(Order $orderModel, OrderItem $orderItem, CheckoutService $checkoutService)
    {
        if(!Session::has('cart')){
            return false;
        }
        $cart = Session::get('cart');
        if($cart->getTotal() > 0) {

            $checkout = $checkoutService->createCheckoutBuilder();//pagseguro

            $order = $orderModel->create([
                'user_id' => Auth::user()->id,          ////USUARIO autenticado
                'total' => $cart->getTotal(),
                'status'=> 0
            ]);

            foreach($cart->all() as $k=>$item) {

                $checkout->addItem(new Item($k, $item['name'], number_format($item['price'], 2, '.',''), $item['qtd']));//adiciona item ao pagseguro

                $order->items()->create([//cria um OrderItem relacionando com este Order
                    'product_id' => $k,
                    'price' => $item['price'],
                    'qtd' => $item['qtd']
                ]);
            }

            $cart->clear();

            $response = $checkoutService->checkout($checkout->getCheckout());//pagseguro

         //   event(new CheckoutEvent($order)); //evento email functionou uhuuuu ok
            //return view('store.order',compact('order','cart'));
            return redirect($response->getRedirectionUrl());
        }

        $categories = Category::all();
        return view('store.order',['cart'=>'empty', 'categories' => $categories]);
    }

    public function test(CheckoutService $checkoutService)
    {

        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);

        return redirect($response->getRedirectionUrl());

    }
}
