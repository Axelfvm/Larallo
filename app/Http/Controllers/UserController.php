<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function register(request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'pass' => 'required|min:6',
            'fullname' => 'required|min:14',
        ]);

        try {
            $user = ['email' => $request->email, 'password' => $request->password, 'fullname' => $request->fullname];
            
        } catch (Exception $e) {
        }
    }
}
