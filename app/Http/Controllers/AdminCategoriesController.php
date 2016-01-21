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
        //$categories = $this->categories->all();
        $categories = $this->categories->paginate();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function retrieve($id)
    {
            echo 'retrieve'.$id . "<br>";
            echo $this->categories->find($id)->name;
    }

    public function delete($id)
    {
            $category = $this->categories->find($id);
            $category->delete();
            return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->categories->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * processar dados do post e salvar em model
     */
    public function update(Requests\CategoryRequest $request, $id)
    {
        $category = $this->categories->find($id);
        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }
    /**
     * processar dados do post e salvar em model
     */
    public function store(Requests\CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->categories->fill($input);//dados do request passados para o model
        $category->save();//persiste no banco

        return redirect()->route('admin.categories.index');
    }

}
