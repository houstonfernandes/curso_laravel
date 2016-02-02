<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

class StoreController extends Controller
{
    public function index()
    {
        $productsFeatured = Product::featured()->get();
        $productsRecommended = Product::recommended()->get();
        $categories = Category::all();
        return view('store.index', compact('categories', 'productsFeatured', 'productsRecommended'));
    }

    /**
     * listar produtos por categoria
     * @param $id id da category
     */
    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $productsCategory = Product::byCategory($id)->get();
        return view('store.category', compact('categories', 'category', 'productsCategory'));
    }

    /**
     * consultar produto
     * @param $id id do produto
    */
    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('store.product', compact('categories','product'));
    }
}
