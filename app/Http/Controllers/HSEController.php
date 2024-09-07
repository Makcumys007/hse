<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hseboard;
use App\Models\User;
use App\Models\Video;
use App\Models\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\App;

class HSEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $currentDate = Carbon::now()->format('d.m.Y');
        $lastRecord = Hseboard::latest()->first();
        $images = Image::orderBy('created_at', 'desc')->take(5)->get();
        if ($lastRecord->video_option == 0) {
            $videoQuery = Video::where('dashboard_title', 'hse')->latest();
        } else {
            $videoQuery = Video::where('dashboard_title', 'hse')->inRandomOrder();
        }

        if ($videoQuery->exists()) {
            $video = $videoQuery->first()->path;
        } else {
            // Обработка случая, когда видео не найдено
            $video = null;
        }
        return view('hse', compact('currentDate', 'lastRecord', 'video', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     */
   

    public function create()
    {
       
        $lastRecord = Hseboard::latest()->first();   
        return view('admin.hseboard', compact('lastRecord'));
    }

    /**l
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'lost_time_injuries'            => 'required|integer',
            'medical_treatment'             => 'required|integer',
            'first_aid_cases'               => 'required|integer',
            'lost_time_injuries_free_days'  => 'required|integer',
            'safe_men_hours'                => 'required|integer',
            'running_string'                => 'required|string',
            'refresh_page_time'             => 'required|integer',
            'video_option'                  => 'required',
        ]);
        $result = new Hseboard();
        $result->lost_time_injuries = $validatedData['lost_time_injuries'];
        $result->medical_treatment = $validatedData['medical_treatment'];
        $result->first_aid_cases = $validatedData['first_aid_cases'];
        $result->lost_time_injuries_free_days = $validatedData['lost_time_injuries_free_days'];
        $result->safe_men_hours = $validatedData['safe_men_hours'];
        $result->running_string = $validatedData['running_string'];
        $result->refresh_page_time = $validatedData['refresh_page_time'];
        $result->video_option = $validatedData['video_option'];
        $result->user_id = Auth::user()->id;
        $result->save();


        return back()->with('success','Information successfully updated!');
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
