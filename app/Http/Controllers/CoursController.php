<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cours;
use App\Image;
use App\Time;
use App\Titres;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class CoursController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cours::all();
        return view('cours.index')->with('cours', $cours); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cours.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //enregistrer l'image
        // $file = $request->file("video");
        // $extension = $file->getClientOriginalExtension();
        // Storage::disk('public')->put($time.'.'.$extension,  File::get($file));
        $cours = new Cours;
        $cours->titre      = $request->input('titre');
        $cours->url_video      = "....";//$time.'.'.$extension;
        $cours->save();

        // redirect
        return redirect('/cours/'.$cours->id.'/edit');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.show')->with('cours', $cours); 
    }

    public function getVideo($cours_id)
    {
        $url_video = Cours::findOrFail($cours_id);
        $url_video = $url_video->url_video;
        $path = storage_path("app/public/video.m4v");//. $url_video);

        if(!File::exists($path)) {
            dd($path);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cours = Cours::findOrFail($id);
        return view('cours.edit')->with('cours', $cours); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dump($request->input('titre'));die;
    }


    //ajoute une image et son titre et son temps de début dans la base
    public function addImage(Request $request, $id)
    {

        $time = time();

        $image = new Image;
        $file = $request->file("image");
        $extension = $file->getClientOriginalExtension();
        Storage::disk('public')->put($request->input("id").'/'.$time.'.'.$extension,  File::get($file));

        $image->url_image = $request->input("id").'/'.$time.'.'.$extension;
        $image->cours_id = $request->input("id");
        $image->save();


        //enregistrement du titre
        $titre = new Titres;
        $titre->titre = $request->input("titre");
        $titre->cours_id = $request->input("id");
        $titre->image_id = $image->id;
        $titre->save();

        //enregistrement du temps
        $time = new Time;
        $time->time = $request->input("time");
        $time->cours_id = $request->input("id");
        $time->image_id = $image->id;
        $time->save();


        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "supprimer";
    }

}
