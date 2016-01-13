<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $categories;
    public function __construct(Category $category){
        $this->categories = $category;
    }
    public function index()
    {
        echo "category - index";
    }
    public function listar()
    {
        $categories = $this->categories->all();
        return view('admin.category.list', compact('categories'));

    }
}
