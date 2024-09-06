<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Models\Gateboard;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class GateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {

        $currentDate = Carbon::now()->format('d.m.Y');
        $lastRecord = Gateboard::latest()->first();

        return view('gate', compact('currentDate', 'lastRecord'));
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
            
        ]);
        $result = new Gateboard(); 
        $result->lost_time_injuries_free_days = $validatedData['lost_time_injuries_free_days']; 
        $result->count_of_lti_year = $validatedData['count_of_lti_year'];
        $result->last_lti_date = $validatedData['last_lti_date'];
        $result->user_id = Auth::user()->id;
        $result->running_string = $validatedData['running_string'];
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
