<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function getLogin()
    {
        $data = [
            'email'=> 'houstonfernandes@gmail.com',
            'password' => 123456
        ];


        if(Auth::attempt($data)) {
            return "logou";
        }

        if(Auth::check()) {
            return "logado";
        }
        return "falhou";
    }

    public function getLogout()
    {
        Auth::logout();
        return 'deslogou';
    }
    public function getCheck(){
        return Auth::check()? 'logado':'deslogado';
    }

    public function getEmail(){

            Mail::send('teste.email', [], function ($m){
                $m->from('houstonfernandes@gmail.com', 'CODE Commerce');
                $m->to('houstonfernandes@yahoo.com.br', 'teste name user - name')->subject('subject teste!');
            });
    }
}
