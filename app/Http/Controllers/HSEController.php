<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hseboard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HSEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
       //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //     
        $lastRecord = Hseboard::latest()->first();   
        return view('admin.hseboard', compact('lastRecord'));
    }

    /**l
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $req = $request->validate([
            'lost_time_injuries'            => 'required|integer',
            'medical_treatment'             => 'required|integer',
            'first_aid_cases'               => 'required|integer',
            'lost_time_injuries_free_days'  => 'required|integer',
            'safe_men_hours'                => 'required|integer',
            'running_string'                => 'required|string',
        ]);
        $result = new Hseboard();
        $result->lost_time_injuries = $validatedData['lost_time_injuries'];
        $result->medical_treatment = $validatedData['medical_treatment'];
        $result->first_aid_cases = $validatedData['first_aid_cases'];
        $result->lost_time_injuries_free_days = $validatedData['lost_time_injuries_free_days'];
        $result->safe_men_hours = $validatedData['safe_men_hours'];
        $result->running_string = $validatedData['running_string'];
        $result->user_id = Auth::user()->id;
        $result->save();


        return redirect('hseboard')->with('success','Information successfully updated!');
    }

    public function upload_video(Request $request) {

        $request->validate([
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:200000', // Ограничение на тип и размер файла
        ]);
    
        $video = $request->file('video');
        $filename = uniqid() . '.' . $video->getClientOriginalExtension(); // Генерация уникального имени файла
        $path = $video->storeAs('videos', $filename, 'public'); // Сохранение видео с новым именем в папку 'videos' в публичном хранилище
    
        return back()->with('success', 'Видео успешно загружено!')->with('path', $path);
        // return redirect('hseboard')->with('video-success','Video successfully loaded!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
