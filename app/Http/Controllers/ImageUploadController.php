<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function imageUrl(Request $request)
    {
        
dd($request->hasFile('upload'));
         if ($request->hasFile('upload')) {
                // Get filename with extention 
                $filenamewithExt = $request->file('upload')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
                // Get just Extention
                $extention = $request->file('upload')->getClientOriginalExtension();
                // Filename to store
                $filenameToStore = $filename.'_'.time().'.'.$extention;
                // Upload Image
                $path = $request->file('upload')->storeAs('storage/photos', $filenameToStore);

                $url = asset('storage/photos/'. $filenameToStore);

                return response()->json(['fileName' => $filenameToStore, 'uploaded' => 1, 'url' => $url ]);

            }
    }
}
