<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\ProjectsController;

class PagesController extends Controller
{
    //
    public function index()
    {
        return view('pages.index');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function projectsMake()
    {
        return view('pages.projectmake');
    }
}
