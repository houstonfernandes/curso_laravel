<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\User;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class AdminUsersController extends Controller
{
    private $users;
    public function __construct(User $user){
        $this->users = $user;
    }

    public function index()
    {
        //$users = $this->users->all();
        $users = $this->users->paginate(3);//paginaçao
        return view('admin.users.index', compact('users'));
    }
/*
    public function create()
    {
        return view('admin.users.create');
    }

    public function retrieve($id)
    {
            echo 'retrieve'.$id . "<br>";
            echo $this->users->find($id)->name;
    }

    public function delete($id)
    {
            $user = $this->users->find($id);
            $user->delete();
            return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $user = $this->users->find($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * processar dados do post e salvar em model
    public function update(Requests\UserRequest $request, $id)
    {
        $user = $this->users->find($id);
        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }
     */
    /**
     * processar dados do post e salvar em model

    public function store(Requests\CategoryRequest $request)
    {
        $input = $request->all();
        $category = $this->categories->fill($input);//dados do request passados para o model
        $category->save();//persiste no banco

        return redirect()->route('admin.categories.index');
    }
*/
}
