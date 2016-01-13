<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Product;
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
        $products = $this->products->all();
        //echo Route::currentRouteName();
        echo route('admin.products.list');//teste exibe rota de categories
        //echo route('admin.products.list');//nao funciona
        return view('admin.product.list', compact('products'));
        //
    }


    public function create()
    {
        echo"create product";
    }

    public function retrieve($id)
    {
        try{
            if($id==null)
                throw new Exception('Id não informado!');
            echo 'retrieve'.$id . "<br>";
            echo $this->products->find($id)->name;
        }
        catch( Exception $e){
            echo $e->getMessage();
        }
    }

    public function update($id)
    {
        try {
            if ($id == null)
                throw new Exception('Id não informado!');
            echo 'update' . $id;

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            if ($id == null)
                throw new Exception('Id não informado!');
            echo 'delete' . $id . "<br>";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * processar dados do post e salvar em model
     */
    public function store()
    {

    }
}
