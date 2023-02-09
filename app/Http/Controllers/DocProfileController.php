<?php

namespace App\Http\Controllers;

use App\Models\DocProfile;
use App\Http\Requests\StoreDocProfileRequest;
use App\Http\Requests\UpdateDocProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DocProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        // $docProfile = DocProfile::where('user_id', '=', $userId);
        $docProfile = DocProfile::all();
        dd($docProfile);
        return view('docProfile.index', compact('docProfile'));
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
        $form_data = $request->validated();
        // $form_data['slug'] = DocProfile::generateSlug($form_data['id']);


        // if ($request->hasFile('cover_image')) {

        //     $path = Storage::put('project_images', $request->cover_image);
        //     $form_data['cover_image'] = $path;

        // }

        $form_data['user_id'] = Auth::id();

        $docProfile = DocProfile::create($form_data);

        if ($request->has('users')) {
            $docProfile->users()->attach($request->users);
        }



        return redirect()->route('docProfile.index')->with('message', 'Il tuo nuovo progetto è stato creato');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocProfile  $docProfile
     * @return \Illuminate\Http\Response
     */
    public function show(DocProfile $docProfile)
    {
        return view('docProfile.show', compact('docProfile'));
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
