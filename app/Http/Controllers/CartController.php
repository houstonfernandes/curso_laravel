<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Product;
use CodeCommerce\Cart;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    private $cart;
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $cart = $this->getCart();
        return view('store.cart', ['cart' => $cart]);
    }

    public function add($id){
        $cart = $this->getCart();
        $product = Product::find($id);
        $img = $product->images->first();
        if($img)//caminho da imagem
            $imgPath = url('uploads/' .$img->id . '.' . $img->extension);
        else
            $imgPath = url('images/no-img.jpg');


        $cart->add($product->id, $product->name, $product->price, $imgPath);
        Session::set('cart', $cart);
        return redirect()->route('store.cart');
    }

    public function delete($id){
        $cart = $this->getCart();
        $cart->delete($id);
        Session::set('cart', $cart);
        return redirect()->route('store.cart');
    }

    public function edit($id, $qtd){
        $cart = $this->getCart();
        $cart->edit($id,$qtd);
        Session::set('cart', $cart);
        return redirect()->route('store.cart');
    }

    /**
     * busca o carrinho da sessao ou cria novo
     * @return Cart
     */
    private function getCart()
    {
        if (Session::has('cart'))
            $cart = Session::get('cart');
        else
            $cart = $this->cart;
        return $cart;
    }

}
