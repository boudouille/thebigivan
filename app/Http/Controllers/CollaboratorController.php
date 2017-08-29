<?php

namespace App\Http\Controllers;

use App\Collaborator;
use App\Http\Requests\CollaboratorRequest;
use Illuminate\Http\Request;

class CollaboratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('collabnotuser', ['only' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
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


    public function store(CollaboratorRequest $request)
    {

        Collaborator::create($request->all());
        return redirect('/projects/' . request('project_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collaborator $collaborator
     * @return \Illuminate\Http\Response
     */
    public function show(Collaborator $collaborator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collaborator $collaborator
     * @return \Illuminate\Http\Response
     */
    public function edit(Collaborator $collaborator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Collaborator $collaborator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collaborator $collaborator)
    {
        //
        $collaborator->admin = !$collaborator->admin;
        $collaborator->update();

        return back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collaborator $collaborator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collaborator $collaborator)
    {
        $collaborator->delete();
        return back();
//        var_dump(request()->all());
    }
}
