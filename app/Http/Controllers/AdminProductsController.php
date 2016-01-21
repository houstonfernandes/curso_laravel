<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class AdminProductsController extends Controller
{
    protected $products;
    public function __construct(Product $product)
    {
        $this->products = $product;
    }

    public function index()
    {

        //$products = $this->products->all();//todos
        $products = $this->products->paginate(12);//paginaçao
        return view('admin.products.index', compact('products'));
    }


    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('admin.products.create', compact('categories'));
    }

    public function retrieve($id)
    {
            echo $this->products->find($id)->name;
    }

    public function edit($id, Category $category)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->products->find($id);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Requests\ProductRequest $request, $id)
    {
        $product = $this->products->find($id);
        $product->update($request->all());

        return redirect()->route('admin.products.index');
    }

    public function delete($id)
    {
        $product = $this->products->find($id);
        $product->delete();

        return redirect()->route('admin.products.index');
    }

    /**
     * processar dados do post e salvar em model
     */
    public function store(Requests\ProductRequest $request)
    {
        $input = $request->all();
        $product = $this->products->fill($input);//dados do request passados para o model
//        $product->recommend = $request->input('recommend',false);//preencher checkbox caso  = false outra solucao ao hidden
//        $product->featured = $request->input('featured',false);//preencher checkbox caso  = false

        $product->save();//persiste no banco

        return redirect()->route('admin.products.index');

    }
}
