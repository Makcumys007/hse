<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function uploadImage(Request $request)
   {
        $validate = $request->validate([
            'image' => 'required|file|mimetypes:image/png,image/jpeg',
        ]);
 
        $fileName = $request->video->getClientOriginalName();
        $newFileName = Str::random(15) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);
        $filePath = 'images/' . $newFileName;
        
        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($validate['image']));
 
        // File URL to access the video in frontend
        $url = Storage::disk('public')->url($filePath);
 
        if ($isFileUploaded) {
            $video = new Image();
            $video->path = $filePath;
            $video->save();
 
            return back()
            ->with('image-success','Image has been successfully uploaded.');
        }
 
        return back()
            ->with('image-error','Unexpected error occured');
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
