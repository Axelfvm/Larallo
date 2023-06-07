<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Users;
use Exception;

class ProjectsController extends Controller
{
    //
    private $repository_Projects;
    private $repository_Users;
    private $msg;

    public function __construct(Projects $projects = null, Users $users = null)
    {
        $this->repository_Users = $users;
        $this->repository_Projects = $projects;
        $this->msg = (new MessageController);
    }

    public function projectsMake(request $request)
    {
        $this->validate(
            $request,
            [
                'description' => 'required|min:3|max:20',
                'type' => 'required',
                'password' => 'max:10'
            ],
        );
        try {
            $type = ($request->type = 0 ? 0 : 1);
            $user = $this->repository_Users->where('email', session()->get('email'))->first();
            $cProject = [
                'iduser' => $user->id,
                'description' => $request->description,
                'type' => $type,
                'bpass' => ($request->password != null ? true : false),
                'password' => $request->password
            ];

            $this->repository_Projects->create($cProject);
        } catch (Exception $e) {
            return redirect()->back()->with('danger', $this->msg->erroProcess);
        }

        try {
            $project = $this->repository_Projects->where('iduser', $user->id)->latest()->first();
            $project->update(['idgenerated' => $this->generateIdCustom($project->id)]);
        } catch (Exception $e) {
            dd($e);
        }
        return redirect()->route('projects.list')->with('success', $this->msg->successProcess);
    }

    public function projects()
    {
        $user = $this->repository_Users->where([['email', session()->get('email')]])->first();
        $projects = $this->repository_Projects->where([['iduser', $user->id]])->latest()->paginate(10);
        return view('pages.projects', ['projects' => $projects]);
    }

    public function generateIdCustom($id)
    {
        $idcust = base64_encode($id);
        $idproject = $this->repository_Projects->where('idgenerated', $idcust)->first();
        while ($idproject != null) {
            $idcust =  base64_encode($id);
        }
        return $idcust;
    }
}
