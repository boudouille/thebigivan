<?php

namespace App\Http\Controllers;

use App\AccessField;
use Illuminate\Http\Request;

class AccessFieldController extends Controller
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccessField $accessField
     * @return \Illuminate\Http\Response
     */
    public function show(AccessField $accessField)
    {
        $typeId = request('access_type_id');
        $typeName = request('access_type_name');
        $site = request('site');
        $connectionRoute = $this->accessRouteTest($typeName.'_test');

        $accessFields = AccessField::where('access_type_id',$typeId)->orderBy('id','asc')->get();

        return view('accesses.fields', compact('typeId', 'typeName', 'accessFields','connectionRoute','site'));
    }

    public function accessRouteTest($access)
    {
        return route($access);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccessField $accessField
     * @return \Illuminate\Http\Response
     */
    public function edit(AccessField $accessField)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\AccessField $accessField
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AccessField $accessField)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccessField $accessField
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccessField $accessField)
    {
        //
    }


}
