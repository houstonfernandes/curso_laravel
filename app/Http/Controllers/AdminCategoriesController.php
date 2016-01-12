<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminCategoriesController extends Controller
{
    private $categories;
    public function __construct(Category $category){
        $this->categories = $category;
    }

    public function index()
    {
        $categories = $this->categories->all();
        return view('category_list', compact('categories'));
    }

    public function create()
    {
        echo"create category";
    }

    public function retrieve($id)
    {
        try{
            if($id==null)
                throw new Exception('Id não informado!');
            echo 'retrieve'.$id . "<br>";
            echo $this->categories->find($id)->name;
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
    }}
