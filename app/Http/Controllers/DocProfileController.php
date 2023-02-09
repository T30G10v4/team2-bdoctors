<?php

namespace App\Http\Controllers;

use App\Models\DocProfile;
use App\Http\Requests\StoreDocProfileRequest;
use App\Http\Requests\UpdateDocProfileRequest;

class DocProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('docProfile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('docProfile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocProfile  $docProfile
     * @return \Illuminate\Http\Response
     */
    public function show(DocProfile $docProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocProfile  $docProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(DocProfile $docProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocProfileRequest  $request
     * @param  \App\Models\DocProfile  $docProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocProfileRequest $request, DocProfile $docProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocProfile  $docProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocProfile $docProfile)
    {
        //
    }
}
