<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Models\Gateboard;
use App\Models\Video;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;


class GateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {

        

        $currentDate = Carbon::now()->format('d.m.Y');
        $lastRecord = Gateboard::latest()->first();
        $last_lti_date = Carbon::parse($lastRecord->last_lti_date)->format('d.m.Y');

        if ($lastRecord->video_option == 0) {
            $video = Video::where('dashboard_title', 'gate')->latest()->first()->path;
        } else {
            $video = Video::where('dashboard_title', 'gate')->inRandomOrder()->first()->path;
        }

        return view('gate', compact('currentDate', 'last_lti_date', 'lastRecord', 'video'));
    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function create()
    {
        //     
        $lastRecord = Gateboard::latest()->first();   
        return view('admin.gateboard', compact('lastRecord'));
    }

    /**l
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'lost_time_injuries_free_days'  => 'required|integer',
            'count_of_lti_year'             => 'required|integer',
            'running_string'                => 'required|string',
            'last_lti_date'                 => 'required|date',
            'refresh_page_time'             => 'required|integer',
            'video_option'                   => 'required',
            
        ]);
        $result = new Gateboard(); 
        $result->lost_time_injuries_free_days = $validatedData['lost_time_injuries_free_days']; 
        $result->count_of_lti_year = $validatedData['count_of_lti_year'];
        $result->last_lti_date = $validatedData['last_lti_date'];
        $result->user_id = Auth::user()->id;
        $result->running_string = $validatedData['running_string'];
        $result->refresh_page_time = $validatedData['refresh_page_time'];
        $result->video_option = $validatedData['video_option'];
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
