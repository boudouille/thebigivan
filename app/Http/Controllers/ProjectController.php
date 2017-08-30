<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Project;
use App\Collaborator;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Verify that we
        $projects = Project::where('user_id', Auth::id())->with('creator')->get();
        $email = Auth::user()->email;

        $shared = Project::whereHas('collaborators', function ($q) use ($email) {
            $q->where('email', $email);
        })->get();

        return view('projects.index', compact(['projects', 'shared']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        auth()->user()->projects()->create($request->all());

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $creator = $project->creator()->first();

        $myId = Auth::id();

        if ($creator->id == $myId) {
            $admin = 1;
        } else {
            $admin = Collaborator::where('project_id', $project->id)
                ->where('email', Auth::user()->email)->first()->admin;
        }

        $sites = $project->sites()->with('creator')->orderBy('sites.updated_at','desc')->get();

//        dd($sites);

        $collaborators = $project->collaborators()->with('user')->get();
        $admins = $project->collaborators()->with('user')->where('admin',1)->get();
        $members = $project->collaborators()->with('user')->where('admin',0)->get();

        return view('projects.show', compact('project', 'collaborators', 'creator','myId','admin','admins','members','sites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        //
        $project->name = request('name');
        $project->description = request('description');

        $project->update();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
