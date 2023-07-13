<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecture = Lecture::all();
        return response()->json(['data' => $lecture]);
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
    
    public function store(Request $request)
    {
        
        $lecture = Lecture::create([
            'name' =>$request->name,
            'nip' =>$request->nip,
            'email' =>$request->email,
            'phone_number' =>$request->phone_number,
            'faculty' =>$request->faculty,
            'major' =>$request->major,
            'program_study' =>$request->program_study
        ]);

        if($request->file){
            $fileName = $this->generateRandomString();
            $extension = $request->file->extension();


            Storage::putFileAs('image', $request->file , $fileName.'.'.$extension);
        }
        $request['image'] = $fileName.'.'.$extension;
        return response()->json(['data' => "Data created success"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $lecture->name = $request->name;
        $lecture->nip = $request->nip;
        $lecture->image = $request->image;
        $lecture->email = $request->email;
        $lecture->phone_number = $request->phone_number;
        $lecture->faculty = $request->faculty;
        $lecture->major = $request->major;
        $lecture->program_study = $request->program_study;
        $lecture->save();
        return response()->json(['data' => "Data created success"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return response()->json(['data' => "Data created success"]);
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
