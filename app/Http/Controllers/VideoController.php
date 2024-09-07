<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

 
    public function uploadVideo(Request $request)
   {
        $validate = $request->validate([
            //   'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4',
            'dashboard_title' => 'required',
        ]);
   
        $fileName = $request->video->getClientOriginalName();
        $newFileName = Str::random(15) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        $filePath = 'videos/' . $newFileName;
        
        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($validate['video']));
 
        // File URL to access the video in frontend
        $url = Storage::disk('public')->url($filePath);
 
        if ($isFileUploaded) {
            $video = new Video();
            $video->title = $newFileName;
            $video->path = $filePath;
            $video->dashboard_title = $validate['dashboard_title'];
            $video->save();
 
            return back()
            ->with('success','Video has been successfully uploaded.');
        }
 
        return back()
            ->with('error','Unexpected error occured');
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
