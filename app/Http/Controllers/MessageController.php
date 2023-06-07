<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public $erroProcess = 'Erro ao executar ação!';
    public $successProcess = 'Ação executada com sucesso!';
    
    public $erroRegister = 'Erro ao cadastrar usuário';
    public $successRegister = 'Cadastrado com sucesso!';
    public $erroLogin = 'Login ou Senha incorretos';
}
