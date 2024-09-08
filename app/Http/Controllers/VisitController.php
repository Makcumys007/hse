<?php

namespace App\Http\Controllers;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Hseboard;
use App\Models\Gateboard;
class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hseboard = Hseboard::latest()->first(); 
        $gateboard = Gateboard::latest()->first();  
        $visits = Visit::select('hostname', 'url', DB::raw('MAX(visited_at) as last_visit'))
               ->groupBy('hostname', 'url')
               ->get();
        return  view('admin.clients', compact('visits', 'hseboard', 'gateboard'));
    }

    public function getData()
{
    $data = Visit::select('hostname', 'url', DB::raw('MAX(visited_at) as last_visit'))
    ->groupBy('hostname', 'url')
    ->get();

    return response()->json($data);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
