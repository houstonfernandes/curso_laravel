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
      //dd($productsFeatured);
      $categories = Category::all();
      return view('store.index', compact('categories', 'productsFeatured'));
  }
}
