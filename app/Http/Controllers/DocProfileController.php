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
        //non esiste, funzione svolta dalla funzione index() di DashboardController
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docProfile = DocProfile::all();

        $curriculumProfile = null;
        foreach ($docProfile as $profile) {
            $curriculumProfile = $profile->curriculum_vitae;
        }

        $specializations = Specialization::all();

        $thereIsProfile = 0;

        return view('docProfile.create', compact('specializations', 'curriculumProfile', 'thereIsProfile'));
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



        //lo slug del profilo corrisponde al nome e cognome del dottore
        $form_data['slug'] = DocProfile::generateSlug("doc" . "-" . $request->user()->name . "-" . $request->user()->name);

        //se c'è il file nel request si creerà una cartella nella quale andrà l'immagine in request, e verrà rinominata
        if ($request->hasFile('photo')) {
            $path = Storage::put('profile_image', $request->photo);
            //salviamo poi il file ottenuto in form_data
            $form_data['photo'] = $path;
            // dd($form_data);
        }

        //Qui salvataggio del Curriculum Vitae in una cartella dedicata
        $curriculaPath = null;
        if ($request->hasFile('curriculum_vitae')) {
            $curriculaPath = $request->file('curriculum_vitae')->storeAs(
                //storeAs() permette di personalizzare il nome del file:
                //nel primo parametro creo e nomino cartella in Public/Storage in cui salvare i file
                'curricula',
                //con il secondo parametro do il nome che il file avrà nella cartella.
                //In questo caso prendo l'id user e lo concateno all'estensione del file
                Auth::id() . "." . $request->file('curriculum_vitae')->getClientOriginalExtension(),
                //nel terzo parametro indico in quale disk salvare il file
                'public'
            );
            //aggiorniamo il campo della formData con il nuovo percorso ottenuto
            $form_data['curriculum_vitae'] = $curriculaPath;
        }

        $form_data['user_id'] = Auth::id();



        $docProfile = DocProfile::create($form_data);

        // $user = User::where('id', '=', Auth::id());

        // $user->doc_profile_id = $docProfile->id; // $docProfile->id;

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
        $userId = Auth::id();
        // dd($docProfile);
        $docProfile = DocProfile::where('user_id', '=', $userId)->get();

        $thereIsProfile = null;
        foreach ($docProfile as $item) {
            $thereIsProfile = $item->id;
        }

        $collectionDocProfile = 1;

        return view('docProfile.show', compact('docProfile', 'userId', 'thereIsProfile', 'collectionDocProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocProfile  $docProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(DocProfile $docProfile)
    {
        $curriculumProfile = $docProfile->curriculum_vitae;

        $specializations = Specialization::all();

        $thereIsProfile = $docProfile->id;

        $collectionDocProfile = 0;

        return view('docProfile.edit', compact('docProfile', 'specializations', 'curriculumProfile', 'collectionDocProfile', 'thereIsProfile'));
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

        //lo slug del profilo corrisponde al nome e cognome del dottore
        $form_data['slug'] = DocProfile::generateSlug("doc" . "-" . $request->user()->name . "-" . $request->user()->name);

        //QUI gestione upload di una nuova PHOTO
        if ($request->hasFile('photo')) {
            //se esiste una photo precedente, eliminarla
            if ($docProfile->photo) {
                Storage::delete($docProfile->photo);
            }
            $path = Storage::put('profile_image', $request->photo);
            $form_data['photo'] = $path;
        }

        //QUI gestione upload di un nuovo CURRICULUM
        if ($request->hasFile('curriculum_vitae')) {
            //se esiste un curriculum precedente, eliminarlo
            if ($docProfile->curriculum_vitae) {
                Storage::delete($docProfile->curriculum_vitae);
            }
            $path = Storage::put('curricula', $request->curriculum_vitae);
            $form_data['curriculum_vitae'] = $path;
        }

        $docProfile->update($form_data);

        //QUI sincronizziamo l'insieme di specializzazioni scelte in fase di creazione con quelle in fase di edit
        if ($request->has('specializations')) {
            $docProfile->specializations()->sync($form_data['specializations']);
        } else {
            $docProfile->specializations()->sync([]);
        }

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
