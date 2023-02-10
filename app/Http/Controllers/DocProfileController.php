<?php

namespace App\Http\Controllers;

use App\Models\DocProfile;
use App\Http\Requests\StoreDocProfileRequest;
use App\Http\Requests\UpdateDocProfileRequest;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DocProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specializations = Specialization::all();

        return view('docProfile.create', compact('specializations'));
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

        //se c'è il file nel request si creerà una cartella nella quale andrà l'immagine in request, che verrà rinominata
        if ($request->hasFile('photo')) {

            $path = Storage::put('profile_image', $request->photo);
            //salviamo poi il file ottenuto in form_data
            $form_data['photo'] = $path;
            // dd($form_data);
        }



        $form_data['user_id'] = Auth::id();

        $docProfile = DocProfile::create($form_data);

        if ($request->has('users')) {
            $docProfile->users()->attach($request->users);
        }

        if ($request->has('specializations')) {
            $docProfile->specializations()->attach($form_data['specializations']);
        }



        return redirect()->route('docProfile.show', $docProfile->id)->with('message', 'Il tuo nuovo progetto è stato creato');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocProfile  $docProfile
     * @return \Illuminate\Http\Response
     */
    public function show(DocProfile $docProfile)
    {
        $users = Auth::user();
        // dd($docProfile);
        return view('docProfile.show', compact('docProfile', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocProfile  $docProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(DocProfile $docProfile)
    {
        $specializations = Specialization::all();
        return view('docProfile.edit', compact('docProfile', 'specializations'));
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
        $form_data = $request->validated();
        // $form_data['slug'] = Project::generateSlug($form_data['title']);

        // if ($request->hasFile('cover_image')) {
        //     //se esiste un file precedente eliminarlo 
        //     if ($project->cover_image) {
        //         Storage::delete($project->cover_image);
        //     }
        //     $path = Storage::put('project_images', $request->cover_image);
        //     $form_data['cover_image'] = $path;
        // }

        $docProfile->update($form_data);

        if ($request->has('specializations')) {
            $docProfile->specializations()->sync($form_data['specializations']);
        } else {

            $docProfile->specializations()->sync([]);
        }

        // i doppi appici per il tempalte literal
        return redirect()->route('docProfile.show', $docProfile->id)->with('message', "Hai aggiornato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocProfile  $docProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocProfile $docProfile)
    {
        $docProfile->specializations()->detach();
        $docProfile->delete();
        return redirect()->route('dashboard')->with('message', "il profilo è stato cancellato");
    }
}
