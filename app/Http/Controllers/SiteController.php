<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteCreateRequest;
use App\Http\Requests\SiteUpdateRequest;
use App\Site;
use App\AccessType;
use Illuminate\Http\Request;

class SiteController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteCreateRequest $request)
    {
        //
        auth()->user()->sites()->create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        $accessTypes = AccessType::with('accessFields')->get();

        $site = $site->with('mysqlAccesses.mysqlScripts')->first();

//        dd($site);

        return view('sites.index',compact('site','accessTypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(SiteUpdateRequest $request, Site $site)
    {
        //
        $site->name = request('name');
        $site->description = request('description');

        $site->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        //
        $site->delete();
        return back();
    }
}
