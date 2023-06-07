<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Users;

class ProjectsController extends Controller
{
    //
    private $repository_Projects;
    private $repository_Users;

    public function __construct(Projects $projects = null, Users $users = null)
    {
        $this->repository_Users = $users;
        $this->repository_Projects = $projects;
    }

    public function projectsMake(request $request)
    {
        $this->validate(
            $request,
            [
                'description' => 'required|min:3|max:20',
                'type' => 'required',
                'password' => 'required|min:3|max:10'
            ],
        );

        
    }

    public function projects()
    {
        $user = $this->repository_Users->where([['email', session()->get('email')]])->first();
        $projects = $this->repository_Projects->where([['iduser', $user->id]])->latest()->paginate(10);
        return view('pages.projects', ['projects' => $projects]);
    }
}
