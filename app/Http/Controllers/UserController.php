<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class UserController extends Controller
{
    //

    private $repository_Users;
    private $msg;

    function __construct(User $user)
    {
        $this->repository_Users = $user;
        $this->msg = (new MessageController);
    }

    function register(request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6',
                'fullname' => 'required',
            ],
            [
                'email.required' => 'Email necessário para proseguir',
                'email.email' => 'Campo tipo Email',
                'email.unique' => 'Email informado não disponível',
                'password.required' => 'Senha necessária para proseguir',
                'password.min:6' => 'Campo senha minímo 6 caracteres',
                'fullname.required' => 'Campo nome completo necessário',
            ]
        );

        try {
            $user = ['email' => $request->email, 'password' => Crypt::encrypt($request->password), 'fullname' => $request->fullname];
            $this->repository_Users->create($user);
        } catch (Exception $e) {
            return redirect()->back()->with('danger', $this->msg->erroRegister);
        }
        return redirect()->back()->with('success', $this->msg->successRegister);
    }

    function login(request $request)
    {
    }
}
